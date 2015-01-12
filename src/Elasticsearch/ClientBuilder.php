<?php

namespace Elasticsearch;


use Elasticsearch\ConnectionPool\AbstractConnectionPool;
use Elasticsearch\ConnectionPool\Selectors\SelectorInterface;
use Elasticsearch\ConnectionPool\StaticNoPingConnectionPool;
use Elasticsearch\Connections\Connection;
use Elasticsearch\Connections\ConnectionFactory;
use Elasticsearch\Serializers\SerializerInterface;
use Elasticsearch\ConnectionPool\Selectors;

use Elasticsearch\Serializers\SmartSerializer;
use GuzzleHttp\Ring\Client\CurlMultiHandler;
use GuzzleHttp\Ring\Core;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class ClientBuilder {

    /** @var Transport */
    private $transport;

    /** @var callback */
    private $endpoint;

    /** @var  ConnectionFactory */
    private $connectionFactory;

    private $handler;

    /** @var  LoggerInterface */
    private $logger;

    /** @var  LoggerInterface */
    private $tracer;

    /** @var string */
    private $connectionPool = '\Elasticsearch\ConnectionPool\StaticNoPingConnectionPool';

    /** @var  string */
    private $serializer = '\Elasticsearch\Serializers\SmartSerializer';

    /** @var  string */
    private $selector = '\Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector';

    /** @var  array */
    private $connectionPoolArgs = [];

    /** @var array */
    private $hosts;

    /** @var  int */
    private $retries;

    /** @var bool  */
    private $sniffOnStart = false;



    /**
     * @param \Elasticsearch\Connections\ConnectionFactory $connectionFactory
     * @return $this
     */
    public function setConnectionFactory(ConnectionFactory $connectionFactory)
    {
        $this->connectionFactory = $connectionFactory;
        return $this;
    }

    /**
     * @param \Elasticsearch\ConnectionPool\AbstractConnectionPool|string $connectionPool
     * @param array $args
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setConnectionPool($connectionPool, array $args = null)
    {
        if (is_string($connectionPool)) {
            $this->connectionPool = $connectionPool;
            $this->connectionPoolArgs = $args;
        } else if (is_object($connectionPool)) {
            $this->connectionPool = $connectionPool;
        } else {
            throw new InvalidArgumentException("Serializer must be a class path or instantiated object extending AbstractConnectionPool");
        }
        return $this;
    }

    /**
     * @param callable $endpoint
     * @return $this
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * @param \Elasticsearch\Transport $transport
     * @return $this
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;
        return $this;
    }

    /**
     * @param mixed $handler
     * @return $this
     */
    public function setHandler($handler)
    {
        $this->handler = $handler;
        return $this;
    }

    /**
     * @param \Psr\Log\LoggerInterface $logger
     * @return $this
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * @param \Psr\Log\LoggerInterface $tracer
     * @return $this
     */
    public function setTracer($tracer)
    {
        $this->tracer = $tracer;
        return $this;
    }

    /**
     * @param \Elasticsearch\Serializers\SerializerInterface|string $serializer
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setSerializer($serializer)
    {
        $this->parseStringOrObject($serializer, $this->serializer, 'SerializerInterface');
        return $this;
    }

    /**
     * @param array $hosts
     * @return $this
     */
    public function setHosts($hosts)
    {
        $this->hosts = $hosts;
        return $this;
    }

    /**
     * @param int $retries
     * @return $this
     */
    public function setRetries($retries)
    {
        $this->retries = $retries;
        return $this;
    }

    /**
     * @param \Elasticsearch\ConnectionPool\Selectors\SelectorInterface|string $selector
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setSelector($selector)
    {
        $this->parseStringOrObject($selector, $this->selector, 'SelectorInterface');
        return $this;
    }

    /**
     * @param boolean $sniffOnStart
     * @return $this
     */
    public function setSniffOnStart($sniffOnStart)
    {
        $this->sniffOnStart = $sniffOnStart;
        return $this;
    }








    /**
     * @return Client
     */
    public function build()
    {
        $this->buildLoggers();

        if (is_null($this->handler)) {
            $this->handler = new CurlMultiHandler([
                'mh' => curl_multi_init()
            ]);
        }

        if (is_null($this->serializer)) {
            $this->serializer = new SmartSerializer();
        } elseif (is_string($this->serializer)) {
            $this->serializer = new $this->serializer;
        }

        if (is_null($this->connectionFactory)) {
            $connectionParams = [
                'client' => [
                    'save_to' => fopen('php://temp/maxmemory:20971520', 'w+')
                ]
            ];
            $this->connectionFactory = new ConnectionFactory($this->handler, $connectionParams, $this->serializer, $this->logger, $this->tracer);
        }

        if (is_null($this->hosts)) {
            $this->hosts = $this->getDefaultHost();
        }



        if (is_null($this->selector)) {
            $this->selector = new Selectors\RoundRobinSelector();
        } elseif (is_string($this->selector)) {
            $this->selector = new $this->selector;
        }


        $this->buildTransport();


        if (is_null($this->endpoint)) {
            $transport  = $this->transport;
            $serializer = $this->serializer;

            $this->endpoint = function ($class) use ($transport, $serializer) {
                $fullPath = '\\Elasticsearch\\Endpoints\\'.$class;
                if ($class === 'Bulk' || $class === 'Msearch' || $class === 'MPercolate') {
                    return new $fullPath($transport, $serializer);
                } else {
                    return new $fullPath($transport);
                }
            };
        }

        return new Client($this->transport, $this->endpoint);


    }


    private function buildLoggers()
    {
        if (is_null($this->logger)) {
            $this->logger = new NullLogger();
        }

        if (is_null($this->tracer)) {
            $this->tracer = new NullLogger();
        }
    }


    private function buildTransport()
    {
        $connections = $this->buildConnectionsFromHosts($this->hosts);

        if (is_string($this->connectionPool)) {
            $this->connectionPool = new $this->connectionPool(
                $connections,
                $this->selector,
                $this->connectionFactory,
                $this->connectionPoolArgs);
        } elseif (is_null($this->connectionPool)) {
            $this->connectionPool = new StaticNoPingConnectionPool(
                $connections,
                $this->selector,
                $this->connectionFactory,
                $this->connectionPoolArgs);
        }

        if (is_null($this->retries)) {
            $this->retries = count($connections) - 1;
        }

        if (is_null($this->transport)) {
            $this->transport = new Transport($this->retries, $this->sniffOnStart, $this->connectionPool, $this->logger);
        }
    }


    private function parseStringOrObject($arg, &$destination, $interface)
    {
        if (is_string($arg)) {
            $destination = new $arg;
        } else if (is_object($arg)) {
            $destination = $arg;
        } else {
            throw new InvalidArgumentException("Serializer must be a class path or instantiated object implementing $interface");
        }
    }

    /**
     * @return array
     */
    private function getDefaultHost()
    {
        return array(array('host' => 'localhost', 'port' => 9200));
    }


    /**
     * @param array $hosts
     *
     * @throws \InvalidArgumentException
     * @return \Elasticsearch\Connections\Connection[]
     */
    private function buildConnectionsFromHosts($hosts)
    {
        if (is_array($hosts) === false) {
            throw new InvalidArgumentException('Hosts parameter must be an array of strings');
        }

        $connections = [];
        foreach ($hosts as $host) {
            $host = $this->prependMissingScheme($host);
            $host = $this->extractURIParts($host);
            $connections[] = $this->connectionFactory->create($host);
        }

        return $connections;
    }

    /**
     * @param array $host
     *
     * @throws \InvalidArgumentException
     * @return array
     */
    private function extractURIParts($host)
    {
        $parts = parse_url($host);

        if ($parts === false) {
            throw new InvalidArgumentException("Could not parse URI");
        }

        if (isset($parts['port']) !== true) {
            $parts['port'] = 9200;
        }

        return $parts;
    }


    /**
     * @param string $host
     *
     * @return string
     */
    private function prependMissingScheme($host) {
        if (!filter_var($host, FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED)) {
            $host = 'http://' . $host;
        }
        return $host;
    }



}