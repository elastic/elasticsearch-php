<?php
/**
 * Elasticsearch PHP Client
 *
 * @link      https://github.com/elastic/elasticsearch-php
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   https://opensource.org/licenses/MIT MIT License
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the MIT License.
 * See the LICENSE file in the project root for more information.
 */
declare(strict_types = 1);

namespace Elastic\Elasticsearch;

use Elastic\Elasticsearch\Exception\AuthenticationException;
use Elastic\Elasticsearch\Exception\ConfigException;
use Elastic\Elasticsearch\Exception\HttpClientException;
use Elastic\Elasticsearch\Exception\InvalidArgumentException;
use Elastic\Elasticsearch\Transport\Adapter\AdapterInterface;
use Elastic\Elasticsearch\Transport\Adapter\AdapterOptions;
use Elastic\Elasticsearch\Transport\RequestOptions;
use Elastic\Transport\Exception\NoAsyncClientException;
use Elastic\Transport\NodePool\NodePoolInterface;
use Elastic\Transport\Transport;
use Elastic\Transport\TransportBuilder;
use GuzzleHttp\Client as GuzzleHttpClient;
use Http\Client\HttpAsyncClient;
use Psr\Http\Client\ClientInterface;
use Psr\Log\LoggerInterface;
use ReflectionClass;

class ClientBuilder
{
    const DEFAULT_HOST = 'localhost:9200';

    /**
     * PSR-18 client
     */
    private ClientInterface $httpClient;

    /**
     * The HTTP async client
     */
    private HttpAsyncClient $asyncHttpClient;

    /**
     * PSR-3 Logger
     */
    private LoggerInterface $logger;

    /**
     * The NodelPool
     */
    private NodePoolInterface $nodePool;

    /**
     * Hosts (elasticsearch nodes)
     */
    private array $hosts;

    /**
     * Elasticsearch API key
     */
    private string $apiKey;

    /**
     * Basic authentication username
     */
    private string $username;

    /**
     * Basic authentication password
     */
    private string $password;

    /**
     * Elastic cloud Id
     */
    private string $cloudId;

    /**
     * Retries
     * 
     * The default value is calculated during the client build
     * and it is equal to the number of hosts
     */
    private int $retries;

    /**
     * SSL certificate 
     * @var array [$cert, $password] $cert is the name of a file containing a PEM formatted certificate,
     *              $password if the certificate requires a password 
     */
    private array $sslCert;

    /**
     * SSL key
     * @var array [$key, $password] $key is the name of a file containing a private SSL key,
     *              $password if the private key requires a password
     */
    private array $sslKey;

    /**
     * SSL verification
     * 
     * Enable or disable the SSL verfiication (default is true)
     */
    private bool $sslVerification = true;

    /**
     * SSL CA bundle
     */
    private string $sslCA;

    /**
     * Elastic meta header
     * 
     * Enable or disable the x-elastic-client-meta header (default is true)
     */
    private bool $elasticMetaHeader = true;

    /**
     * HTTP client options
     */
    private array $httpClientOptions = [];

    /**
     * Make the constructor final so cannot be overwritten
     */
    final public function __construct()
    {
    }

    /**
     * Create an instance of ClientBuilder
     */
    public static function create(): ClientBuilder
    {
        return new static();
    }

    /**
     * Build a new client from the provided config.  Hash keys
     * should correspond to the method name e.g. ['nodePool']
     * corresponds to setNodePool().
     *
     * Missing keys will use the default for that setting if applicable
     *
     * Unknown keys will throw an exception by default, but this can be silenced
     * by setting `quiet` to true
     *
     * @param  array $config
     * @param  bool $quiet False if unknown settings throw exception, true to silently
     *                     ignore unknown settings
     * @throws ConfigException
     */
    public static function fromConfig(array $config, bool $quiet = false): Client
    {
        $builder = new static;
        foreach ($config as $key => $value) {
            $method = "set$key";
            $reflection = new ReflectionClass($builder);
            if ($reflection->hasMethod($method)) {
                $func = $reflection->getMethod($method);
                if ($func->getNumberOfParameters() > 1) {
                    $builder->$method(...$value);
                } else {
                    $builder->$method($value);
                }
                unset($config[$key]);
            }
        }

        if ($quiet === false && count($config) > 0) {
            $unknown = implode(array_keys($config));
            throw new ConfigException("Unknown parameters provided: $unknown");
        }
        return $builder->build();
    }

    public function setHttpClient(ClientInterface $httpClient): ClientBuilder
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    public function setAsyncHttpClient(HttpAsyncClient $asyncHttpClient): ClientBuilder
    {
        $this->asyncHttpClient = $asyncHttpClient;
        return $this;
    }

    /**
     * Set the PSR-3 Logger
     */
    public function setLogger(LoggerInterface $logger): ClientBuilder
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * Set the NodePool
     */
    public function setNodePool(NodePoolInterface $nodePool): ClientBuilder
    {
        $this->nodePool = $nodePool;
        return $this;
    }

    /**
     * Set the hosts (nodes)
     */
    public function setHosts(array $hosts): ClientBuilder
    {
        $this->hosts = $hosts;
        return $this;
    }

    /**
     * Set the ApiKey
     * If the id is not specified we store the ApiKey otherwise
     * we store as Base64(id:ApiKey)
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-create-api-key.html
     */
    public function setApiKey(string $apiKey, ?string $id = null): ClientBuilder
    {
        if (empty($id)) {
            $this->apiKey = $apiKey;
        } else {
            $this->apiKey = base64_encode($id . ':' . $apiKey);
        }
        return $this;
    }

    /**
     * Set the Basic Authentication
     */
    public function setBasicAuthentication(string $username, string $password): ClientBuilder
    {
        $this->username = $username;
        $this->password = $password;
        return $this;
    }

    public function setElasticCloudId(string $cloudId)
    {
        $this->cloudId = $cloudId;
        return $this;
    }

    /**
     * Set number or retries
     * 
     * @param int $retries
     */
    public function setRetries(int $retries): ClientBuilder
    {
        if ($retries < 0) {
            throw new InvalidArgumentException('The retries number must be >= 0');
        }
        $this->retries = $retries;
        return $this;
    }

    /**
     * Set SSL certificate
     * 
     * @param string $cert The name of a file containing a PEM formatted certificate
     * @param string $password if the certificate requires a password
     */
    public function setSSLCert(string $cert, ?string $password = null): ClientBuilder
    {
        $this->sslCert = [$cert, $password];
        return $this;
    }

    /**
     * Set the Certificate Authority (CA) bundle 
     * 
     * @param string $cert The name of a file containing a PEM formatted certificate
     */
    public function setCABundle(string $cert): ClientBuilder
    {
        $this->sslCA = $cert;
        return $this;
    }

    /**
     * Set SSL key
     * 
     * @param string $key The name of a file containing a private SSL key
     * @param string $password if the private key requires a password
     */
    public function setSSLKey(string $key, ?string $password = null): ClientBuilder
    {
        $this->sslKey = [$key, $password];
        return $this;
    }

    /**
     * Enable or disable the SSL verification 
     */
    public function setSSLVerification(bool $value = true): ClientBuilder
    {
        $this->sslVerification = $value;
        return $this;
    }

    /**
     * Enable or disable the x-elastic-client-meta header
     */
    public function setElasticMetaHeader(bool $value = true): ClientBuilder
    {
        $this->elasticMetaHeader = $value;
        return $this;
    }

    public function setHttpClientOptions(array $options): ClientBuilder
    {
        $this->httpClientOptions = $options;
        return $this;
    }

    /**
     * Build and returns the Client object
     */
    public function build(): Client
    {
        // Transport builder
        $builder = TransportBuilder::create();

        // Set the default hosts if empty
        if (empty($this->hosts)) {
            $this->hosts = [self::DEFAULT_HOST];
        }
        $builder->setHosts($this->hosts);

        // Logger
        if (!empty($this->logger)) {    
            $builder->setLogger($this->logger);
        }

        // Http client
        if (!empty($this->httpClient)) {
            $builder->setClient($this->httpClient);
        }
        // Set HTTP client options
        $builder->setClient(
            $this->setOptions($builder->getClient(), $this->getConfig(), $this->httpClientOptions)
        );

        // Cloud id
        if (!empty($this->cloudId)) {
            $builder->setCloudId($this->cloudId);
        }

        // Node Pool
        if (!empty($this->nodePool)) {
            $builder->setNodePool($this->nodePool);
        }

        $transport = $builder->build();
        
        // The default retries is equal to the number of hosts
        if (empty($this->retries)) {
            $this->retries = count($this->hosts);
        }
        $transport->setRetries($this->retries);

        // Async client
        if (!empty($this->asyncHttpClient)) {
            $transport->setAsyncClient($this->asyncHttpClient);
        }
        
        // Basic authentication
        if (!empty($this->username) && !empty($this->password)) {
            $transport->setUserInfo($this->username, $this->password);
        }

        // API key
        if (!empty($this->apiKey)) {
            if (!empty($this->username)) {
                throw new AuthenticationException('You cannot use APIKey and Basic Authenication together');
            }
            $transport->setHeader('Authorization', sprintf("ApiKey %s", $this->apiKey));
        }

        /**
         * Elastic cloud optimized with gzip
         * @see https://github.com/elastic/elasticsearch-php/issues/1241 omit for Symfony HTTP Client    
         */
        if (!empty($this->cloudId) && !$this->isSymfonyHttpClient($transport)) {
            $transport->setHeader('Accept-Encoding', 'gzip');
        }

        $client = new Client($transport, $transport->getLogger());
        // Enable or disable the x-elastic-client-meta header
        $client->setElasticMetaHeader($this->elasticMetaHeader);

        return $client;
    }

    /**
     * Returns true if the transport HTTP client is Symfony
     */
    protected function isSymfonyHttpClient(Transport $transport): bool
    {
        if (false !== strpos(get_class($transport->getClient()), 'Symfony\Component\HttpClient')) {
            return true;
        }
        try {
            if (false !== strpos(get_class($transport->getAsyncClient()), 'Symfony\Component\HttpClient')) {
                return true;
            }
        } catch (NoAsyncClientException $e) {
            return false;
        }
        return false;
    }

    /**
     * Returns the configuration to be used in the HTTP client
     */
    protected function getConfig(): array
    {
        $config = [];
        if (!empty($this->sslCert)) {
            $config[RequestOptions::SSL_CERT] = $this->sslCert;
        }
        if (!empty($this->sslKey)) {
            $config[RequestOptions::SSL_KEY] = $this->sslKey;
        }
        if (!$this->sslVerification) {
            $config[RequestOptions::SSL_VERIFY] = false;
        }
        if (!empty($this->sslCA)) {
            $config[RequestOptions::SSL_CA] = $this->sslCA;
        }
        return $config;
    }

    /**
     * Set the configuration for the specific HTTP client using an adapter
     */
    protected function setOptions(ClientInterface $client, array $config, array $clientOptions = []): ClientInterface
    {
        if (empty($config) && empty($clientOptions)) {
            return $client;
        }
        $class = get_class($client);
        if (!isset(AdapterOptions::HTTP_ADAPTERS[$class])) {
            throw new HttpClientException(sprintf(
                "The HTTP client %s is not supported for custom options",
                $class
            ));
        }
        $adapterClass = AdapterOptions::HTTP_ADAPTERS[$class];
        if (!class_exists($adapterClass) || !in_array(AdapterInterface::class, class_implements($adapterClass))) {
            throw new HttpClientException(sprintf(
                "The class %s does not exists or does not implement %s",
                $adapterClass,
                AdapterInterface::class
            ));
        }
        $adapter = new $adapterClass;
        return $adapter->setConfig($client, $config, $clientOptions);
    }
}