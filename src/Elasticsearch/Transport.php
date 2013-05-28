<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 9:51 PM
 */

namespace Elasticsearch;

use Elasticsearch\Common\Exceptions\MaxRetriesException;
use Elasticsearch\Common\Exceptions\TransportException;
use Elasticsearch\ConnectionPool\ConnectionPool;
use Elasticsearch\Common\Exceptions;
use Elasticsearch\Connections\ConnectionInterface;
use Elasticsearch\Serializers\SerializerInterface;
use Elasticsearch\Sniffers\Sniffer;
use Monolog\Logger;

/**
 * Class Transport
 *
 * @category Elasticsearch
 * @package  Elasticsearch
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Transport
{
    /**
     * @var \Pimple
     */
    private $params;

    /**
     * @var ConnectionPool
     */
    private $connectionPool;

    /**
     * @var array Array of seed nodes provided by the user
     */
    private $seeds = array();

    /**
     * @var int Time of the last sniff
     */
    private $lastSniff;

    /**
     * @var int Number of sniffs that were initiated due to failed requests
     */
    private $sniffsDueToFailure = 0;

    /**
     * @var bool|int False if sniffing disabled, number of seconds if enabled
     */
    private $snifferTimeout;

    /**
     * @var bool True if cluster sniffing is initiated on failed request
     */
    private $sniffOnConnectionFail;

    /**
     * @var Sniffer Sniffer object
     */
    private $sniffer;

    /**
     * @var string Transport schema used by cluster
     */
    private $transportSchema;

    /**
     * @var int Maximum number of retries before failing a request
     */
    private $maxRetries;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var Logger
     */
    private $log;


    /**
     * Transport class is responsible for dispatching requests to the
     * underlying cluster connections
     *
     * @param array   $hosts  Array of hosts in cluster
     * @param \Pimple $params DIC containing dependencies
     * @param Logger  $log    Monolog logger object
     *
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\BadMethodCallException
     */
    public function __construct($hosts, $params, $log)
    {
        $this->log = $log;

        if (is_array($hosts) !== true) {
            $this->log->addCritical('Hosts parameter must be an array');
            throw new Exceptions\InvalidArgumentException('Hosts parameter must be an array');
        }

        $this->params = $params;

        $this->snifferTimeout        = $params['snifferTimeout'];
        $this->sniffOnConnectionFail = $params['sniffOnConnectionFail'];
        $this->sniffer               = $params['sniffer']($this);
        $this->maxRetries            = $params['maxRetries'];
        $this->serializer            = $params['serializer'];
        $this->lastSniff             = time();

        $this->seeds = $hosts;
        $this->setConnections($hosts);

        if ($params['sniffOnStart'] === true) {
            $this->log->addNotice('Sniff on Start.');
            $this->sniffHosts();
        }

    }//end __construct()


    /**
     * Creates Connection objects and instantiates a ConnectionPool object
     *
     * @param array $hosts Assoc array of hosts to add to connection pool
     *
     * @return void
     */
    public function setConnections($hosts)
    {
        // Merge in the initial seed list (union not array_merge).
        $hosts = $hosts + $this->seeds;

        $connections = $this->hostsToConnections($hosts);

        $this->connectionPool  = $this->params['connectionPool']($connections);
        $this->transportSchema = $this->connectionPool->getTransportSchema();

    }//end setConnections()


    /**
     * Add a new connection to the connectionPool
     *
     * @param array $host Assoc. array describing the host:port combo
     *
     * @throws Common\Exceptions\InvalidArgumentException
     * @return void
     */
    public function addConnection($host)
    {
        if (is_array($host) !== true) {
            $this->log->addCritical('Host parameter must be an array');
            throw new Exceptions\InvalidArgumentException('Host parameter must be an array');
        }

        if (isset($host['host']) !== true) {
            $this->log->addCritical('Host must be provided in host parameter');
            throw new Exceptions\InvalidArgumentException('Host must be provided in host parameter');
        }

        if (isset($host['port']) === true && is_numeric($host['port']) === false) {
            $this->log->addCritical('Port must be numeric');
            throw new Exceptions\InvalidArgumentException('Port must be numeric');
        }

        $connection = $this->params['connection']($host['host'], $host['port']);
        $this->connectionPool->addConnection($connection);

    }//end addConnection()


    /**
     * Return an array of all connections in the ConnectionPool
     *
     * @return array
     */
    public function getAllConnections()
    {
        return $this->connectionPool->getAllConnections();

    }//end getAllConnections()


    /**
     * Returns a single connection from the connection pool
     * Potentially performs a sniffing step before returning
     *
     * @return ConnectionInterface Connection
     */
    public function getConnection()
    {
        $this->checkSnifferTimeout();
        return $this->connectionPool->getConnection();

    }//end getConnection()


    /**
     * Sniff the cluster topology through the Cluster State API
     *
     * @param bool $failure Set to true if we are sniffing
     *                      because of a failed connection
     *
     * @return void
     */
    public function sniffHosts($failure=false)
    {
        $this->lastSniff = time();

        $hosts = $this->sniffer->sniff($this->transportSchema);
        $this->setConnections($hosts);

        if ($failure === true) {
            $this->log->addNotice('Sniffing cluster state due to failure.');
            $this->sniffsDueToFailure += 1;

        } else {
            $this->log->addNotice('Sniffing cluster state.');
            $this->sniffsDueToFailure = 0;
        }

    }//end sniffHosts()


    /**
     * Marks a connection dead, or initiates a cluster resniff
     *
     * @param ConnectionInterface $connection The connection to mark as dead
     *
     * @return void
     */
    public function markDead($connection)
    {
        if ($this->sniffOnConnectionFail === true) {
            $this->sniffHosts(true);
        } else {
            $this->connectionPool->markDead($connection);
        }

    }//end markDead()


    /**
     * Perform a request to the Cluster
     *
     * @param string $method     HTTP method to use
     * @param string $uri        HTTP URI to send request to
     * @param null   $params     Optional query parameters
     * @param null   $body       Optional query body
     * @param null   $maxRetries Optional number of retries
     *
     * @throws Common\Exceptions\MaxRetriesException
     * @return array
     */
    public function performRequest($method, $uri, $params=null, $body=null, $maxRetries=null)
    {
        if (isset($maxRetries) !== true) {
            $maxRetries = $this->maxRetries;
        }

        foreach (range(1, $maxRetries) as $attempt) {
            $connection = $this->getConnection();

            if (isset($body) === true) {
                $body = $this->serializer->serialize($body);
            }

            try {
                $response = $connection->performRequest(
                    $method,
                    $uri,
                    $params,
                    $body
                );

            } catch (TransportException $e) {

                $this->log->addWarning('Transport exception, retrying.', array($e->getMessage()));

                $this->markDead($connection);
                if ($attempt === $this->maxRetries) {
                    $this->log->addError('The maxinum number of request retries has been reached');
                    throw new MaxRetriesException('The maximum number of request retries has been reached.');
                }

                // Skip the return below and continue retrying.
                continue;
            }//end try

            $data = $this->serializer->deserialize($response['text']);

            return array(
                    'status' => $response['status'],
                    'data'   => $data,
                    'info'   => $response['info'],
                   );

        }//end foreach

    }//end performRequest()


    /**
     * Convert host arrays into connections
     *
     * @param array $hosts Assoc array of host values
     *
     * @return array
     */
    private function hostsToConnections($hosts)
    {
        $connections = array();
        foreach ($hosts as $host) {
            if (isset($host['port']) === true) {
                $connections[] = $this->params['connection'](
                    $host['host'],
                    $host['port']
                );
            } else {
                $connections[] = $this->params['connection']($host['host']);
            }
        }

        return $connections;

    }//end hostsToConnections()


    /**
     * Check the sniifer timeout and perform a sniff if required
     *
     * @return void
     */
    private function checkSnifferTimeout()
    {
        if ($this->snifferTimeout !== false) {
            if (($this->lastSniff + $this->snifferTimeout) < time()) {
                $this->sniffHosts();
            }
        }

    }//end checkSnifferTimeout()


}//end class