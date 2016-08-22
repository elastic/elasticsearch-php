<?php

namespace Elasticsearch;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Namespaces\NamespaceBuilderInterface;
use Elasticsearch\Plugin\ErrorPlugin;
use Elasticsearch\Serializers\SmartSerializer;
use Http\Client\Common\EmulatedHttpAsyncClient;
use Http\Client\Common\HttpClientPool;
use Http\Client\Common\HttpClientPool\RandomClientPool;
use Http\Client\Common\HttpClientPoolItem;
use Http\Client\Common\Plugin\AddHostPlugin;
use Http\Client\Common\Plugin\LoggerPlugin;
use Http\Client\Common\Plugin\RetryPlugin;
use Http\Client\Common\PluginClient;
use Http\Client\HttpAsyncClient;
use Http\Discovery\Exception\NotFoundException;
use Http\Discovery\HttpAsyncClientDiscovery;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Discovery\UriFactoryDiscovery;
use Http\Message\UriFactory;
use Psr\Log\NullLogger;

/**
 * Class ClientBuilder
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Common\Exceptions
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
  */
class ClientBuilder
{

    private $retries;

    private $httpAsyncClient;

    private $hosts;

    private $serializer;

    private $logger;

    private $endpoint;
    
    private $clientPoolStrategy = RandomClientPool::class;

    private $registeredNamespacesBuilders = [];

    public function __construct()
    {
        $this->serializer = new SmartSerializer();
        $this->hosts = ['localhost:9200'];
    }

    /**
     * @return ClientBuilder
     */
    public static function create()
    {
        return new static();
    }

    /**
     * Build a new client from the provided config.  Hash keys
     * should correspond to the method name e.g. ['connectionPool']
     * corresponds to setConnectionPool().
     *
     * Missing keys will use the default for that setting if applicable
     *
     * Unknown keys will throw an exception by default, but this can be silenced
     * by setting `quiet` to true
     *
     * @param array $config hash of settings
     * @param bool $quiet False if unknown settings throw exception, true to silently
     *                    ignore unknown settings
     * @throws Common\Exceptions\RuntimeException
     * @return \Elasticsearch\Client
     */
    public static function fromConfig($config, $quiet = false)
    {
        $builder = new self;

        foreach ($config as $key => $value) {
            $method = "set$key";
            if (method_exists($builder, $method)) {
                $builder->$method($value);
                unset($config[$key]);
            }
        }

        if ($quiet === false && count($config) > 0) {
            $unknown = implode(array_keys($config));

            throw new RuntimeException("Unknown parameters provided: $unknown");
        }

        return $builder->build();
    }


    /**
     * Set the client pool strategy for selecting elasticsearch server
     *
     * @param string $clientPoolStrategy
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function setClientPoolStrategy($clientPoolStrategy)
    {
        if (!is_string($clientPoolStrategy)) {
            throw new \InvalidArgumentException("Client pool must be a class path extending HttpClientPool");
        }

        if (!is_subclass_of($clientPoolStrategy, HttpClientPool::class)) {
            throw new \InvalidArgumentException("Client pool must be a class path extending HttpClientPool");
        }

        $this->clientPoolStrategy = $clientPoolStrategy;

        return $this;
    }

    /**
     * Set the strategy to get an endpoint object
     *
     * @param callable $endpoint
     *
     * @return $this
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * Register a new namespace to Elasticsearch
     *
     * @param NamespaceBuilderInterface $namespaceBuilder
     *
     * @return $this
     */
    public function registerNamespace(NamespaceBuilderInterface $namespaceBuilder)
    {
        $this->registeredNamespacesBuilders[] = $namespaceBuilder;

        return $this;
    }

    /**
     * Add a logger to have information about requests and responses
     *
     * @param \Psr\Log\LoggerInterface $logger
     *
     * @return $this
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;

        return $this;
    }

    /**
     * Set the serializer to use for requests and responses
     *
     * @param \Elasticsearch\Serializers\SerializerInterface|string $serializer
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function setSerializer($serializer)
    {
        if (is_string($serializer)) {
            $this->serializer = new $serializer;
        } elseif (is_object($serializer)) {
            $this->serializer = $serializer;
        } else {
            throw new InvalidArgumentException('Serializer must be a class path or instantiated object implementing SerializerInterface');
        }

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
     * @param HttpAsyncClient $httpAsyncClient
     *
     * @return $this
     */
    public function setHttpAsyncClient(HttpAsyncClient $httpAsyncClient)
    {
        $this->httpAsyncClient = $httpAsyncClient;

        return $this;
    }

    /**
     * @return Client
     */
    public function build()
    {
        if (null === $this->httpAsyncClient) {
            try {
                $this->httpAsyncClient = HttpAsyncClientDiscovery::find();
            } catch (NotFoundException $exception) {
                $this->httpAsyncClient = new EmulatedHttpAsyncClient(HttpClientDiscovery::find());
            }
        }

        if (is_string($this->serializer)) {
            $this->serializer = new $this->serializer;
        }
        
        $finalClient = $this->createHttpClient();
        $requestBuilder = new MessageBuilder(MessageFactoryDiscovery::find(), $this->serializer);
        $transport = new Transport($finalClient, $requestBuilder);

        if (null === $this->endpoint) {
            $serializer = $this->serializer;

            $this->endpoint = function ($class) use ($serializer) {
                $fullPath = '\\Elasticsearch\\Endpoints\\' . $class;
                if ($class === 'Bulk' || $class === 'Msearch' || $class === 'MPercolate') {
                    return new $fullPath($serializer);
                } else {
                    return new $fullPath();
                }
            };
        }

        $registeredNamespaces = [];

        foreach ($this->registeredNamespacesBuilders as $builder) {
            /** @var $builder NamespaceBuilderInterface */
            $registeredNamespaces[$builder->getName()] = $builder->getObject($transport, $this->serializer);
        }

        return new Client($transport, $this->endpoint, $registeredNamespaces);
    }

    /**
     * @return HttpAsyncClient
     */
    private function createHttpClient()
    {
        /** @var HttpClientPool $pool */
        $pool = new $this->clientPoolStrategy;
        $uriFactory = UriFactoryDiscovery::find();
        $retries = null === $this->retries ? count($this->hosts) : $this->retries;
        $logger = null === $this->logger ? new NullLogger() : $this->logger;
        
        foreach ($this->hosts as $host) {
            $client = new PluginClient($this->httpAsyncClient, [
                new AddHostPlugin($uriFactory->createUri($host, [
                    'replace' => true
                ])),
            ]);
            
            $pool->addHttpClient(new HttpClientPoolItem($client, 0));
        }
        
        return new PluginClient($pool, [
            new ErrorPlugin(
                $this->serializer
            ),
            new RetryPlugin([
                'retries' => $retries
            ]),
            new LoggerPlugin($logger),
        ]);
    }
}
