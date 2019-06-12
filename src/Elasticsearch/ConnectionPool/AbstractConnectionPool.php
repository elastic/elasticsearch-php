<?php

declare(strict_types = 1);

namespace Elasticsearch\ConnectionPool;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\ConnectionPool\Selectors\SelectorInterface;
use Elasticsearch\Connections\ConnectionFactoryInterface;
use Elasticsearch\Connections\ConnectionInterface;

/**
 * Class AbstractConnectionPool
 *
 * @category Elasticsearch
 * @package  Elasticsearch\ConnectionPool
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
abstract class AbstractConnectionPool implements ConnectionPoolInterface
{
    /**
     * Array of connections
     *
     * @var ConnectionInterface[]
     */
    protected $connections;

    /**
     * Array of initial seed connections
     *
     * @var ConnectionInterface[]
     */
    protected $seedConnections;

    /**
     * Selector object, used to select a connection on each request
     *
     * @var SelectorInterface
     */
    protected $selector;

    /**
     * @var array
     */
    protected $connectionPoolParams;

    /**
     * @var \Elasticsearch\Connections\ConnectionFactory
     */
    protected $connectionFactory;

    /**
     * Constructor
     *
     * @param ConnectionInterface[]      $connections          The Connections to choose from
     * @param SelectorInterface          $selector             A Selector instance to perform the selection logic for the available connections
     * @param ConnectionFactoryInterface $factory              ConnectionFactory instance
     * @param array                      $connectionPoolParams
     */
    public function __construct(array $connections, SelectorInterface $selector, ConnectionFactoryInterface $factory, array $connectionPoolParams)
    {
        $paramList = array('connections', 'selector', 'connectionPoolParams');
        foreach ($paramList as $param) {
            if (isset($$param) === false) {
                throw new InvalidArgumentException('`' . $param . '` parameter must not be null');
            }
        }

        if (isset($connectionPoolParams['randomizeHosts']) === true
            && $connectionPoolParams['randomizeHosts'] === true
        ) {
            shuffle($connections);
        }

        $this->connections          = $connections;
        $this->seedConnections      = $connections;
        $this->selector             = $selector;
        $this->connectionPoolParams = $connectionPoolParams;
        $this->connectionFactory    = $factory;
    }

    abstract public function nextConnection(bool $force = false): ConnectionInterface;

    abstract public function scheduleCheck(): void;
}
