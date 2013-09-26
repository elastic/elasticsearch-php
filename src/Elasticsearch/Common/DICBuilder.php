<?php
/**
 * User: zach
 * Date: 5/31/13
 * Time: 8:26 AM
 */

namespace Elasticsearch\Common;


use Elasticsearch\Client;
use Elasticsearch\Endpoints;
use Elasticsearch\Namespaces\ClusterNamespace;
use Elasticsearch\Namespaces\IndicesNamespace;
use Elasticsearch\Transport;
use Monolog\Logger;
use Pimple;

class DICBuilder
{
    /**
     * @var \Pimple
     */
    private $dic;

    /**
     * @var array
     */
    protected $paramDefaults = array(
        'connectionClass'       => '\Elasticsearch\Connections\GuzzleConnection',
        'connectionFactoryClass'=> '\Elasticsearch\Connections\ConnectionFactory',
        'connectionPoolClass'   => '\Elasticsearch\ConnectionPool\StaticConnectionPool',
        'selectorClass'         => '\Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector',
        'serializerClass'       => '\Elasticsearch\Serializers\ArrayToJSONSerializer',
        'sniffOnStart'          => false,
        'connectionParams'      => array(),
        'logObject'             => null,
        'logPath'               => 'elasticsearch.log',
        'logLevel'              => Logger::WARNING,
        'traceObject'           => null,
        'tracePath'             => 'elasticsearch.log',
        'traceLevel'            => Logger::WARNING,
        'guzzleOptions'         => array(),
        'connectionPoolParams'  => array(
            'randomizeHosts' => true
        ),
    );


    /**
     * Constructor
     *
     * @param array $hosts  Array of hosts
     * @param array $params Array of user settings
     *
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\UnexpectedValueException
     */
    public function __construct($hosts, $params)
    {

        if (isset($params) === false || is_array($params) !== true) {
            throw new Exceptions\InvalidArgumentException(
                'Parameters must be an array'
            );
        }

        $this->checkParamWhitelist($params);
        $this->createDICObject($hosts, $params);

    }


    /**
     * Get the Dependency injection container
     *
     * @return Pimple
     */
    public function getDIC()
    {
        return $this->dic;

    }


    /**
     * Verify that all parameters are whitelisted
     *
     * @param array $params Array of params
     *
     * @throws Exceptions\UnexpectedValueException
     * @return void
     */
    private function checkParamWhitelist($params)
    {
        // Verify that all provided parameters are 'white-listed'.
        foreach ($params as $key => $value) {
            if (array_key_exists($key, $this->paramDefaults) === false) {
                throw new Exceptions\UnexpectedValueException(
                    $key . ' is not a recognized parameter'
                );
            }
        }

    }


    /**
     * Create the Pimple DIC object, build the dep tree
     *
     * @param array $hosts  Array of hosts
     * @param array $params Array of user params
     *
     * @return void
     */
    private function createDICObject($hosts, $params)
    {
        $this->dic = new Pimple();

        $this->setDICParams($params);
        $this->setNonSharedDICObjects();
        $this->setSharedDICObjects($hosts);
        $this->setEndpointDICObjects();

    }


    /**
     * Set the user params inside the DIC object
     *
     * @param array $params Array of user params
     *
     * @return void
     */
    private function setDICParams($params)
    {
        $params = array_merge($this->paramDefaults, $params);

        foreach ($params as $key => $value) {
            $this->dic[$key] = $value;
        }
    }


    /**
     * NonShared DIC objects return a new obj each time
     * they are accessed
     */
    private function setNonSharedDICObjects()
    {
        $this->setConnectionObj();
        $this->setConnectionFactoryObj();
        $this->setSelectorObj();
        $this->setSerializerObj();
        $this->setConnectionPoolObj();
    }


    /**
     * Shared DIC objects reuse the same obj each time
     * they are accessed
     *
     * @param array $hosts Array of hosts
     */
    private function setSharedDICObjects($hosts)
    {
        $this->setTransportObj($hosts);
        $this->setClusterNamespaceObj();
        $this->setIndicesNamespaceObj();
        $this->setSharedConnectionParamsObj();
        $this->setCurlMultihandle();
        $this->setGuzzleClient();
    }

    private function setEndpointDICObjects()
    {
        $this->setEndpoint();
    }


    private function setConnectionObj()
    {
        $this->dic['connection'] = function ($dicParams) {
            return function ($host, $port = null) use ($dicParams) {
                return new $dicParams['connectionClass'](
                    $host,
                    $port,
                    $dicParams['connectionParamsShared'],
                    $dicParams['logObject'],
                    $dicParams['traceObject']
                );
            };
        };
    }

    private function setConnectionFactoryObj()
    {
        $this->dic['connectionFactory'] = function($dicParams) {
            return new $dicParams['connectionFactoryClass']($dicParams);
        };
    }


    private function setSelectorObj()
    {
        $this->dic['selector'] = function ($dicParams) {
            return new $dicParams['selectorClass']();
        };
    }


    private function setSerializerObj()
    {
        $this->dic['serializer'] = function ($dicParams) {
            return new $dicParams['serializerClass']();
        };
    }


    private function setConnectionPoolObj()
    {
        $this->dic['connectionPool'] = function ($dicParams) {
            return function ($connections) use ($dicParams) {
                return new $dicParams['connectionPoolClass'](
                    $connections,
                    $dicParams['selector'],
                    $dicParams['connectionFactory'],
                    $dicParams['connectionPoolParams']
                );
            };
        };
    }


    private function setTransportObj($hosts)
    {
        $this->dic['transport'] = $this->dic->share(
            function ($dicParams) use ($hosts) {
                return new Transport($hosts, $dicParams, $dicParams['logObject']);
            }
        );
    }


    private function setClusterNamespaceObj()
    {
        $this->dic['clusterNamespace'] = $this->dic->share(
            function ($dicParams) {
                /** @var Pimple $dicParams */
                return new ClusterNamespace($dicParams['transport'], $dicParams['endpoint']);
            }
        );
    }


    private function setIndicesNamespaceObj()
    {
        $this->dic['indicesNamespace'] = $this->dic->share(
            function ($dicParams) {
                /** @var Pimple $dicParams */
                return new IndicesNamespace($dicParams['transport'], $dicParams['endpoint']);
            }
        );
    }


    private function setSharedConnectionParamsObj()
    {
        // This will inject a shared object into all connections.
        // Allows users to inject shared resources, similar to the multi-handle
        // shared above (but in their own code).
        $this->dic['connectionParamsShared'] = $this->dic->share(
            function ($dicParams) {

                $connectionParams = $dicParams['connectionParams'];

                // Multihandle connections need a "static", shared curl multihandle.
                if ($dicParams['connectionClass'] === '\Elasticsearch\Connections\CurlMultiConnection') {
                    $connectionParams = array_merge(
                        $connectionParams,
                        array('curlMultiHandle' => $dicParams['curlMultiHandle'])
                    );
                } elseif ($dicParams['connectionClass'] === '\Elasticsearch\Connections\GuzzleConnection') {
                    $connectionParams = array_merge(
                        $connectionParams,
                        array('guzzleClient' => $dicParams['guzzleClient'])
                    );
                }

                return $connectionParams;
            }
        );
    }


    private function setCurlMultihandle()
    {
        // Only used by some connections - won't be instantiated until used.
        $this->dic['curlMultiHandle'] = $this->dic->share(
            function () {
                return curl_multi_init();
            }
        );
    }

    private function setGuzzleClient()
    {
        // Only used by Guzzle connections - won't be instantiated until used.
        $this->dic['guzzleClient'] = $this->dic->share(
            function ($dicParams) {
                $guzzleOptions = array(
                    'curl.options' => array(
                        'body_as_string'   => true
                    )
                );

                $guzzleOptions = array_merge($guzzleOptions, $dicParams['guzzleOptions']);
                $guzzle =  new \Guzzle\Http\Client(null,$guzzleOptions);

                return $guzzle;
            }
        );
    }

    private function setEndpoint()
    {
        $this->dic['endpoint'] = function ($dicParams) {
            return function($class) use ($dicParams) {
                $class = '\\Elasticsearch\\Endpoints\\'.$class;
                if (array_key_exists('Elasticsearch\Endpoints\BulkEndpointInterface', class_implements($class, true)) === true) {
                    return new $class($dicParams['transport'], $dicParams['serializer']);
                } else {
                    return new $class($dicParams['transport']);
                }

            };
        };
    }

}//end class
