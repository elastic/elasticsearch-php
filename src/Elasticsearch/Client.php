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
        $whitelist = array(
            'consistency',
            'op_type',
            'parent',
            'percolate',
            'refresh',
            'replication',
            'routing',
            'timeout',
            'timestamp',
            'ttl',
            'version',
            'version_type',
        );
        $this->checkParamWhitelist($params, $whitelist);
        $index = urlencode($index);
        $type  = urlencode($type);

        $method = 'POST';
        $uri    = "/$index/$type/";
        if ($id !== null) {
            $method = 'PUT';
            $uri .= "$id/";
        }

        $retValue = $this->transport->performRequest(
            $method,
            $uri,
            $params,
            $doc
        );

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
        $whitelist = array(
            'fields',
            'parent',
            'preference',
            'realtime',
            'refresh',
            'routing',
            'timeout',
        );
        $this->checkParamWhitelist($params, $whitelist);
        $index = urlencode($index);
        $type  = urlencode($type);
        $id    = urlencode($id);

        $method = 'GET';
        $uri    = "/$index/$type/$id/";

        $retValue = $this->transport->performRequest(
            $method,
            $uri,
            $params
        );

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
        $whitelist = array(
            'consistency',
            'parent',
            'refresh',
            'replication',
            'routing',
            'timeout',
            'version_type',
        );
        $this->checkParamWhitelist($params, $whitelist);
        $index = urlencode($index);
        $type  = urlencode($type);
        $id    = urlencode($id);

        $method = 'PUT';
        $uri    = "/$index/$type/$id/_update";

        $retValue = $this->transport->performRequest(
            $method,
            $uri,
            $params,
            $body
        );

        return $retValue['data'];

    }


    /**
     * Delete a document
     *
     * @param string          $index  Index name
     * @param string          $type   Type name
     * @param null|string|int $id     Optional ID of doc
     * @param null|array      $body   Optional query to delete doc
     * @param null|array      $params Optional params
     *
     * @return array
     * @throws Exceptions\InvalidArgumentException
     */
    public function delete($index, $type, $id = null, $body = null, $params = null)
    {
        $whitelist = array(
            'consistency',
            'fields',
            'parent',
            'refresh',
            'replication',
            'routing',
            'timeout',
            'version_type',
            'q',
        );
        $this->checkParamWhitelist($params, $whitelist);
        $index = urlencode($index);
        $type  = urlencode($type);

        $method = 'DELETE';

        // Must be delete-by-id or delete-by-query.
        if (isset($id) === true) {
            $id  = urlencode($id);
            $uri = "/$index/$type/$id/";
        } else {
            if (isset($params['q']) === true || isset($body) === true) {
                $uri = "/$index/$type/_query/";
            } else {
                throw new Exceptions\InvalidArgumentException(
                    'An ID or query must be supplied to delete'
                );
            }
        }

        $retValue = $this->transport->performRequest(
            $method,
            $uri,
            $params,
            $body
        );

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
        $whitelist = array(
            'explain',
            'fields',
            'from',
            'ignore_indices',
            'indices_boost',
            'preference',
            'routing',
            'search_type',
            'size',
            'sort',
            'source',
            'stats',
            'timeout',
            'version',
        );
        $this->checkParamWhitelist($params, $whitelist);

        $method = 'GET';
        $uri    = '/_search/';

        if (isset($index) === true) {
            $index = urlencode($index);
            $uri   = "/$index/_search/";

            if (isset($type) === true) {
                $type = urlencode($type);
                $uri  = "/$index/$type/_search/";
            }
        }

        if (is_string($query) === true) {
            $params['q'] = $query;
            $body        = null;
        } else if (is_array($query) === true) {
            $body = $query;
        } else {
            throw new Exceptions\InvalidArgumentException(
                'Query must be a string or array'
            );
        }

        $retValue = $this->transport->performRequest(
            $method,
            $uri,
            $params,
            $body
        );

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
     * Check if param is in whitelist
     *
     * @param array $params    Assoc array of parameters
     * @param array $whitelist Whitelist of keys
     *
     * @throws UnexpectedValueException
     */
    private function checkParamWhitelist($params, $whitelist)
    {
        if (isset($params) !== true) {
            return; //no params, just return.
        }

        foreach ($params as $key => $value) {
            if (array_search($key, $whitelist) === false) {
                throw new UnexpectedValueException($key . ' is not a valid parameter');
            }
        }

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
