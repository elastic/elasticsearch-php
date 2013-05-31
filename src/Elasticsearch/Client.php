<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 11:41 AM
 */

namespace Elasticsearch;

use Elasticsearch\Common\DICBuilder;
use Elasticsearch\Common\Exceptions;
use Elasticsearch\Common\Exceptions\UnexpectedValueException;
use Elasticsearch\Endpoints;
use Elasticsearch\Namespaces\ClusterNamespace;
use Elasticsearch\Namespaces\IndicesNamespace;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\IntrospectionProcessor;

/**
 * Class Client
 *
 * @category Elasticsearch
 * @package  Elasticsearch
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Client
{

    /**
     * Holds an array of host/port tuples for the cluster
     *
     * @var array
     */
    protected $hosts;

    /**
     * @var Transport
     */
    protected $transport;

    /**
     * @var \Pimple
     */
    protected $params;

    /**
     * @var IndicesNamespace
     */
    protected $indices;

    /**
     * @var ClusterNamespace
     */
    protected $cluster;


    /**
     * Client constructor
     *
     * @param null|array $hosts  Array of Hosts to connect to
     * @param array      $params Array of injectable parameters
     *
     * @throws Common\Exceptions\InvalidArgumentException
     */
    public function __construct($hosts = null, $params = array())
    {
        if (isset($hosts) === false) {
            $this->hosts[] = array('host' => 'localhost');
        } else {
            if (is_array($hosts) === false) {
                throw new Exceptions\InvalidArgumentException('Hosts parameter must be an array of strings');
            }

            foreach ($hosts as $host) {
                if (strpos($host, ':') !== false) {
                    $host = explode(':', $host);
                    if ($host[1] === '' || is_numeric($host[1]) === false) {
                        throw new Exceptions\InvalidArgumentException('Port must be a valid integer');
                    }

                    $this->hosts[] = array(
                        'host' => $host[0],
                        'port' => (int)$host[1],
                    );
                } else {
                    $this->hosts[] = array('host' => $host);
                }
            }
        }

        $this->setParams($this->hosts, $params);
        $this->setLogging();
        $this->transport = $this->params['transport'];
        $this->indices   = $this->params['indicesNamespace'];
        $this->cluster   = $this->params['clusterNamespace'];

    }


    /**
     * Index a document
     *
     * @param string          $index  Index name
     * @param string          $type   Type name
     * @param array           $doc    Assoc array holding the doc
     * @param null|string|int $id     Optional ID for doc
     * @param null|array      $params Optional parameters
     *
     * @return array
     */
    public function index($index, $type, $doc, $id = null, $params = null)
    {
        /** @var Endpoints\Index $endpoint */
        $endpoint = $this->params['endpoint']('Index');
        $endpoint->setIndex($index)
            ->setType($type)
            ->setBody($doc)
            ->setID($id)
            ->setParams($params);

        $retValue = $endpoint->performRequest();

        return $retValue['data'];

    }


    /**
     * Get a document
     *
     * @param string     $index  Index name
     * @param string|int $id     ID for doc to get
     * @param string     $type   Type name
     * @param null|array $params Optional parameters
     *
     * @return array
     */
    public function get($index, $id, $type = '_all', $params = null)
    {
        /** @var Endpoints\Get $endpoint */
        $endpoint = $this->params['endpoint']('Get');
        $endpoint->setIndex($index)
            ->setType($type)
            ->setID($id)
            ->setParams($params);

        $retValue = $endpoint->performRequest();

        return $retValue['data'];

    }


    /**
     * Updateda document
     *
     * @param string     $index  Index name
     * @param string     $type   Type name
     * @param string|int $id     ID for doc to get
     * @param array      $body   Assoc array of the doc body
     * @param null|array $params Optional parameters
     *
     * @return array
     */
    public function update($index, $type, $id, $body, $params = null)
    {
        /** @var Endpoints\Update $endpoint */
        $endpoint = $this->params['endpoint']('Update');
        $endpoint->setIndex($index)
            ->setType($type)
            ->setID($id)
            ->setBody($body)
            ->setParams($params);

        $retValue = $endpoint->performRequest();

        return $retValue['data'];

    }


    /**
     * Delete a document
     *
     * @param string          $index  Index name
     * @param string          $type   Type name
     * @param null|string|int $id     Optional ID of doc
     * @param null|array      $params Optional params
     *
     * @internal param array|null $body Optional query to delete doc
     * @return array
     */
    public function delete($index, $type, $id, $params = null)
    {
        /** @var Endpoints\Delete $endpoint */
        $endpoint = $this->params['endpoint']('Delete');
        $endpoint->setIndex($index)
        ->setType($type)
        ->setID($id)
        ->setParams($params);

        $retValue = $endpoint->performRequest();

        return $retValue['data'];

    }


    /**
     * Search for a document
     *
     * @param string|array $query  Query to perform
     * @param null|string  $index  Optional Index name
     * @param null|string  $type   Optional Type name
     * @param null|array   $params Optional parameters
     *
     * @throws Common\Exceptions\InvalidArgumentException
     * @return array
     */
    public function search($query, $index = null, $type = null, $params = null)
    {
        /** @var Endpoints\Search $endpoint */
        $endpoint = $this->params['endpoint']('Search');
        $endpoint->setQuery($query)
            ->setIndex($index)
            ->setType($type)
            ->setParams($params);

        $retValue = $endpoint->performRequest();

        return $retValue['data'];

    }


    /**
     * Operate on the Indices Namespace of commands
     *
     * @return IndicesNamespace
     */
    public function indices()
    {
        return $this->indices;

    }


    /**
     * Operate on the Cluster namespace of commands
     *
     * @return ClusterNamespace
     */
    public function cluster()
    {
        return $this->cluster;

    }


    /**
     * Sets up the DIC parameter object
     *
     * Merges user-specified parameters into the default list, then
     * builds a DIC to house all the information
     *
     * @param array $hosts  Array of hosts
     * @param array $params Array of user settings
     *
     * @return void
     */
    private function setParams($hosts, $params)
    {
        $dicBuilder   = new DICBuilder($hosts, $params);
        $this->params = $dicBuilder->getDIC();

    }


    /**
     * Sets up the logging object
     * If a user-defined logger is not available, builds a default file logger
     *
     * @return void
     */
    private function setLogging()
    {
        // If no user-specified logger, provide a default file logger.
        if ($this->params['logObject'] === null) {
            $log       = new Logger('log');
            $handler   = new StreamHandler(
                $this->params['logPath'],
                $this->params['logLevel']
            );
            $processor = new IntrospectionProcessor();

            $log->pushHandler($handler);
            $log->pushProcessor($processor);

            $this->params['logObject'] = $log;
        }

        // Same thing, but for the Trace logger.
        if ($this->params['traceObject'] === null) {
            $trace        = new Logger('trace');
            $traceHandler = new StreamHandler(
                $this->params['tracePath'],
                $this->params['traceLevel']
            );

            $trace->pushHandler($traceHandler);

            $this->params['traceObject'] = $trace;
        }

    }


}
