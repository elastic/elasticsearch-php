<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 11:41 AM
 */

namespace ElasticSearch;

use ElasticSearch\Common\Exceptions;

/**
 * Class Client
 *
 * @category ElasticSearch
 * @package  ElasticSearch
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
     * @var array
     */
    protected $paramDefaults = array(
                                'connectionClass'       => '\ElasticSearch\Connections\Connection',
                                'connectionPoolClass'   => '\ElasticSearch\ConnectionPool\ConnectionPool',
                                'selectorClass'         => '\ElasticSearch\ConnectionPool\Selectors\RoundRobinSelector',
                                'deadPoolClass'         => '\ElasticSearch\ConnectionPool\DeadPool',
                                'nodesToHostCallback'   => 'constructHostList',
                                'serializer'            => 'JSONSerializer',
                                'sniffOnStart'          => false,
                                'sniffAfterRequests'    => false,
                                'sniffOnConnectionFail' => false,
                                'randomizeHosts'        => true,
                                'maxRetries'            => 3,
                                'deadTimeout'           => 60,
                               );

    /**
     * Client constructor
     *
     * @param null|array $hosts  Array of Hosts to connect to
     * @param array      $params Array of injectable parameters
     *
     * @throws Common\Exceptions\InvalidArgumentException
     */
    public function __construct($hosts=null, $params=array())
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
                                      'port' => (int) $host[1],
                                     );
                } else {
                    $this->hosts[] = array('host' => $host);
                }
            }
        }//end if

        $this->setParams($this->hosts, $params);
        $this->transport = $this->params['transport'];

    }//end __construct()


    /**
     * Sets up the DIC parameter object
     *
     * Merges user-specified parameters into the default list, then
     * builds a DIC to house all the information
     *
     * @param       $hosts
     * @param array $params Array of user settings
     *
     * @throws Common\Exceptions\InvalidArgumentException
     * @throws Common\Exceptions\UnexpectedValueException
     * @return void
     */
    private function setParams($hosts, $params)
    {
        if (isset($params) === false || is_array($params) !== true) {
            throw new Exceptions\InvalidArgumentException('Parameters must be an array');
        }

        // Verify that all provided parameters are 'white-listed'.
        foreach ($params as $key => $value) {
            if (array_key_exists($key, $this->paramDefaults) === false) {
                throw new Exceptions\UnexpectedValueException($key.' is not a recognized parameter');
            }
        }

        $this->params = new \Pimple();

        $params = array_merge($this->paramDefaults, $params);

        foreach ($params as $key => $value) {
            $this->params[$key] = $value;
        }

        $this->params['connection'] = function ($dicParams) {
            return function ($host, $port) use ($dicParams) {
                return new $dicParams['connectionClass']($host, $port);
            };
        };

        $this->params['selector'] = function ($dicParams) {
            return function ($connections) use ($dicParams) {
                return new $dicParams['selectorClass']($connections);
            };
        };

        $this->params['deadPool'] = function ($dicParams) {
            return new $dicParams['deadPoolClass']($dicParams['deadTime']);
        };

        // Share the ConnectionPool class as we only want one floating around.
        $this->params['connectionPool'] = $this->params->share(
            function ($dicParams) {
                return function ($connections) use ($dicParams) {
                    return new $dicParams['connectionPoolClass'](
                        $connections,
                        $dicParams['selector']($connections),
                        $dicParams['deadPool'],
                        $dicParams['randomizeHosts']);
                };
            }
        );

        // Share the Transport class as we only want one floating around.
        $this->params['transport'] = $this->params->share(
            function ($dicParams) use ($hosts) {
                return new Transport($hosts, $dicParams);
            }
        );

    }//end setParams()


}//end class
