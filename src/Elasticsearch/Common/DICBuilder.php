<?php
/**
 * User: zach
 * Date: 5/31/13
 * Time: 8:26 AM
 */

namespace Elasticsearch\Common;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints;
use Elasticsearch\Namespaces\CatNamespace;
use Elasticsearch\Namespaces\ClusterNamespace;
use Elasticsearch\Namespaces\IndicesNamespace;
use Elasticsearch\Namespaces\NodesNamespace;
use Elasticsearch\Namespaces\SnapshotNamespace;
use Elasticsearch\Transport;
use Psr\Log;
use Pimple\Container as Pimple;

class DICBuilder
{
    /**
     * @var Pimple
     */
    private $dic;

    /**
     * @var array
     */
    protected $paramDefaults = array(
        'connectionClass'       => '\Elasticsearch\Connections\GuzzleConnection',
        'connectionFactoryClass'=> '\Elasticsearch\Connections\ConnectionFactory',
        'connectionPoolClass'   => '\Elasticsearch\ConnectionPool\StaticNoPingConnectionPool',
        'selectorClass'         => '\Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector',
        'serializerClass'       => '\Elasticsearch\Serializers\SmartSerializer',
        'sniffOnStart'          => false,
        'connectionParams'      => array(),
        'logging'               => false,
        'logObject'             => null,
        'logPath'               => 'elasticsearch.log',
        'logLevel'              => Log\LogLevel::WARNING,
        'logBubble'             => true,
        'logPermission'         => null,
        'traceObject'           => null,
        'tracePath'             => 'elasticsearch.log',
        'traceLevel'            => Log\LogLevel::WARNING,
        'traceBubble'           => true,
        'tracePermission'       => null,
        'guzzleOptions'         => array(),
        'connectionPoolParams'  => array(
            'randomizeHosts' => true
        ),
        'retries'               => null,
        'customNamespaces'      => array()
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
        $this->setConnectionObj();
        $this->setConnectionFactoryObj();
        $this->setSelectorObj();
        $this->setSerializerObj();
        $this->setConnectionPoolObj();

        $this->setTransportObj($hosts);


        $this->setSharedConnectionParamsObj();
        $this->setCurlMultihandle();
        $this->setGuzzleClient();
        $this->setEndpoint();

        $this->setNamespaces();


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


    private function setConnectionObj()
    {
        $this->dic['connection'] = function ($dicParams) {
            return function ($hostDetails) use ($dicParams) {
                return new $dicParams['connectionClass'](
                    $hostDetails,
                    $dicParams['connectionParamsShared'],
                    $dicParams['logObject'],
                    $dicParams['traceObject']
                );
            };
        };
    }

    private function setConnectionFactoryObj()
    {
        $this->dic['connectionFactory'] = function ($dicParams) {
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
        $this->dic['transport'] = function ($dicParams) use ($hosts) {
            return new Transport($hosts, $dicParams, $dicParams['logObject']);
        };
    }


    private function setNamespaces()
    {
        $this->dic['clusterNamespace'] = ClusterNamespace::build();
        $this->dic['indicesNamespace'] = IndicesNamespace::build();
        $this->dic['nodesNamespace'] = NodesNamespace::build();
        $this->dic['snapshotNamespace'] = SnapshotNamespace::build();
        $this->dic['catNamespace'] = CatNamespace::build();

        foreach ($this->dic['customNamespaces'] as $name => $ns) {
            $this->dic[$name] = $ns::build();
        }
    }



    private function setSharedConnectionParamsObj()
    {
        // This will inject a shared object into all connections.
        // Allows users to inject shared resources, similar to the multi-handle
        // shared above (but in their own code).
        $this->dic['connectionParamsShared'] = function ($dicParams) {
            $connectionParams = $dicParams['connectionParams'];

            // Multihandle connections need a "static", shared curl multihandle.
            if ($dicParams['connectionClass'] === '\Elasticsearch\Connections\CurlMultiConnection' || is_subclass_of($dicParams['connectionClass'], '\Elasticsearch\Connections\CurlMultiConnection')) {
                $connectionParams = array_merge(
                    $connectionParams,
                    array('curlMultiHandle' => $dicParams['curlMultiHandle'])
                );
            } elseif ($dicParams['connectionClass'] === '\Elasticsearch\Connections\GuzzleConnection' || is_subclass_of($dicParams['connectionClass'], '\Elasticsearch\Connections\GuzzleConnection')) {
                $connectionParams = array_merge(
                    $connectionParams,
                    array('guzzleClient' => $dicParams['guzzleClient'])
                );
            }

            return $connectionParams;
        };
    }


    private function setCurlMultihandle()
    {
        // Only used by some connections - won't be instantiated until used.
        $this->dic['curlMultiHandle'] = function () {
            if (extension_loaded('curl') !== true) {
                throw new RuntimeException('Curl library/extension is required for CurlMultiConnection.');
            }
            return curl_multi_init();
        };
    }

    private function setGuzzleClient()
    {
        // Only used by Guzzle connections - won't be instantiated until used.
        $this->dic['guzzleClient'] = function ($dicParams) {
            $guzzleOptions = array();
            $guzzleOptions['curl.options']['body_as_string'] = true;

            if (isset($dicParams['connectionParams']['auth']) === true) {
                $guzzleOptions['request.options']['auth'] = $dicParams['connectionParams']['auth'];
            }

            $guzzleOptions = array_merge($guzzleOptions, $dicParams['guzzleOptions']);
            $guzzle =  new \Guzzle\Http\Client(null, $guzzleOptions);

            return $guzzle;
        };
    }

    private function setEndpoint()
    {
        $dicParams = $this->dic;
        $this->dic['endpoint'] = $this->dic->protect(function ($class) use ($dicParams) {
            $fullPath = '\\Elasticsearch\\Endpoints\\'.$class;
            if ($class === 'Bulk' || $class === 'Msearch' || $class === 'MPercolate') {
                return new $fullPath($dicParams['transport'], $dicParams['serializer']);
            } else {
                return new $fullPath($dicParams['transport']);
            }
        });
    }
}//end class
