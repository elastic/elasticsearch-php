<?php

declare(strict_types = 1);

namespace Elasticsearch\Tests;

use Doctrine\Common\Inflector\Inflector;
use Elasticsearch;
use Elasticsearch\Common\Exceptions\BadRequest400Exception;
use Elasticsearch\Common\Exceptions\Conflict409Exception;
use Elasticsearch\Common\Exceptions\Forbidden403Exception;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Elasticsearch\Common\Exceptions\RequestTimeout408Exception;
use Elasticsearch\Common\Exceptions\ServerErrorResponseException;
use Elasticsearch\Common\Exceptions\RoutingMissingException;
use Elasticsearch\Common\Exceptions\Unauthorized401Exception;
use GuzzleHttp\Ring\Future\FutureArrayInterface;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

/**
 * Class YamlRunnerTest
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class YamlRunnerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Symfony\Component\Yaml\Yaml Yaml parser for reading integrations tests
     */
    private $yaml;

    /**
     * @var \Elasticsearch\Client client used by elasticsearch
     */
    private $client;

    /**
     * @var string Es version
     */
    private static $esVersion;

    /**
     * @var string[] A list of supported features
     */
    private static $supportedFeatures = [
        'stash_in_path', 'warnings', 'headers'
    ];

    /**
     * @var array A mapping for endpoint when there is a reserved keywords for the method / namespace name
     */
    private static $endpointMapping = [
        'tasks' => [
            'list' => ['tasksList', 'tasks'],
        ],
    ];

    private static $skippedTests = [
        'nodes.stats/30_discovery.yml#Discovery stats' => 'Failing on ES 6.1+: nodes.$master.discovery is an empty array, expected to have cluster_state_queue field in it',
        'indices.stats/20_translog.yml#Translog retention' => 'Failing on ES 6.3+: Failed asserting that 495 is equal to <string:$creation_size> or is less than \'$creation_size\'',
        'indices.shrink/30_copy_settings.yml#Copy settings during shrink index' => 'Failing on ES 6.4+: Failed to match in test "Copy settings during shrink index". Expected [\'4\'] does not match [false] ',
    ];

    private static $skippedTestsIfPhpLessThan = [
        // Failing on ES 6.7+ only with PHP 7.0: Cannot access empty property
        'indices.put_mapping/11_basic_with_types.yml#Create index with invalid mappings' => '7.1.0',
        'indices.put_mapping/10_basic.yml#Create index with invalid mappings' => '7.1.0',
        'indices.create/11_basic_with_types.yml#Create index with invalid mappings' => '7.1.0',
        'indices.create/11_basic_with_types.yml#Create index with no type mappings' => '7.1.0',
        'indices.create/10_basic.yml#Create index with invalid mappings' => '7.1.0',
    ];
    /**
     * @var array A list of skipped test with their reasons
     */
    private static $skippedFiles = [

        'cat.nodeattrs/10_basic.yml' => 'Using java regex fails in PHP',
        'cat.nodeattrs/10_basic.yaml' => 'Using java regex fails in PHP',

        'cat.repositories/10_basic.yml' => 'Using java regex fails in PHP',
        'cat.repositories/10_basic.yaml' => 'Using java regex fails in PHP',

        'indices.shrink/10_basic.yml' => 'Shrink tests seem to require multiple nodes',
        'indices.shrink/10_basic.yaml' => 'Shrink tests seem to require multiple nodes',

        'indices.rollover/10_basic.yml' => 'Rollover test seems buggy atm',
        'indices.rollover/10_basic.yaml' => 'Rollover test seems buggy atm',

    ];

    /**
     * @var array A list of files to skip completely, due to fatal parsing errors
     */
    private static $fatalFiles = [
        'indices.create/10_basic.yml' => 'Temporary: Yaml parser doesnt support "inline" empty keys',
        'indices.create/10_basic.yaml' => 'Temporary: Yaml parser doesnt support "inline" empty keys',

        'indices.put_mapping/10_basic.yml' => 'Temporary: Yaml parser doesnt support "inline" empty keys',
        'indices.put_mapping/10_basic.yaml' => 'Temporary: Yaml parser doesnt support "inline" empty keys',

        'search/110_field_collapsing.yml' => 'Temporary: parse error, malformed inline yaml',
        'search/110_field_collapsing.yaml' => 'Temporary: parse error, malformed inline yaml',
        'range/10_basic.yml' => 'Temporary: parse error, malformed inline yaml',

        'cat.nodes/10_basic.yml' => 'Temporary: parse error, something about $body: |',
        'cat.nodes/10_basic.yaml' => 'Temporary: parse error, something about $body: |',
        'search.aggregation/180_percentiles_tdigest_metric.yml' => 'array of objects, unclear how to fix',
        'search.aggregation/190_percentiles_hdr_metric.yml' => 'array of objects, unclear how to fix',
        'search/190_index_prefix_search.yml' => 'bad yaml array syntax',
        'search.aggregation/230_composite.yml' => 'bad yaml array syntax',
        'search/30_limits.yml' => 'bad regex'

    ];

    /**
     * Return the elasticsearch host
     *
     * @return string
     */
    public static function getHost(): string
    {
        if (getenv('ES_TEST_HOST') !== false) {
            return getenv('ES_TEST_HOST');
        }

        echo 'Environment variable for elasticsearch test cluster (ES_TEST_HOST) not defined. Exiting yaml test';
        exit;
    }

    public static function setUpBeforeClass()
    {
        $host = static::getHost();
        echo "Test Host: $host\n";

        $ch = curl_init($host);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response, true);
        static::$esVersion = $response['version']['number'];
        echo "ES Version: ".static::$esVersion."\n";
    }

    public function setUp()
    {
        $this->clean();
        $this->client = Elasticsearch\ClientBuilder::create()->setHosts([self::getHost()])->build();
    }

    /**
     * @dataProvider yamlProvider
     * @group sync
     */
    public function testIntegration($testProcedure, bool $skip, $setupProcedure, $teardownProcedure, string $fileName)
    {
        if ($skip) {
            static::markTestIncomplete($testProcedure);
        }

        if (array_key_exists($fileName, static::$skippedFiles)) {
            static::markTestSkipped(static::$skippedFiles[$fileName]);
        }

        if (null !== $setupProcedure) {
            $this->processProcedure(current($setupProcedure), 'setup', $fileName);
            $this->waitForYellow();
        }

        try {
            $this->processProcedure(current($testProcedure), key($testProcedure), $fileName);
        } finally {
            if (null !== $teardownProcedure) {
                $this->processProcedure(current($teardownProcedure), 'teardown', $fileName);
                $this->waitForYellow();
            }
        }
    }

    /**
     * @dataProvider yamlProvider
     * @group async
     */
    public function testAsyncIntegration($testProcedure, bool $skip, $setupProcedure, $teardownProcedure, string $fileName)
    {
        if ($skip) {
            static::markTestIncomplete($testProcedure);
        }

        if (array_key_exists($fileName, static::$skippedFiles)) {
            static::markTestSkipped(static::$skippedFiles[$fileName]);
        }

        if (null !== $setupProcedure) {
            $this->processProcedure(current($setupProcedure), 'setup', $fileName);
            $this->waitForYellow();
        }

        try {
            $this->processProcedure(current($testProcedure), key($testProcedure), $fileName, true);
        } finally {
            if (null !== $teardownProcedure) {
                $this->processProcedure(current($teardownProcedure), 'teardown', $fileName);
                $this->waitForYellow();
            }
        }
    }

    /**
     * Process a procedure
     *
     * @param array  $procedure
     * @param string $name
     * @param string $fileName
     * @param bool   $async
     */
    public function processProcedure(array $procedure, string $name, string $fileName, bool $async = false)
    {
        $lastOperationResult = null;
        $context = [];

        if (array_key_exists("$fileName#$name", static::$skippedTests)) {
            static::markTestSkipped(static::$skippedTests["$fileName#$name"]);
        }

        foreach ($procedure as $operation) {
            $lastOperationResult = $this->processOperation($operation, $lastOperationResult, $context, $name, $async);
        }
    }

    /**
     * Process an operation
     *
     * @param object            $operation
     * @param array|string|null $lastOperationResult
     * @param array             $context
     * @param string            $testName
     * @param bool              $async
     *
     * @return mixed
     */
    public function processOperation($operation, $lastOperationResult, array &$context, string $testName, bool $async = false)
    {
        $operationName = array_keys((array)$operation)[0];

        if ('do' === $operationName) {
            return $this->operationDo($operation->{$operationName}, $lastOperationResult, $context, $testName, $async);
        }

        if ('is_false' === $operationName) {
            return $this->operationIsFalse($operation->{$operationName}, $lastOperationResult, $context, $testName);
        }

        if ('is_true' === $operationName) {
            return $this->operationIsTrue($operation->{$operationName}, $lastOperationResult, $context, $testName);
        }

        if ('match' === $operationName) {
            return $this->operationMatch($operation->{$operationName}, $lastOperationResult, $context, $testName);
        }

        if ('gte' === $operationName) {
            return $this->operationGreaterThanOrEqual($operation->{$operationName}, $lastOperationResult, $context, $testName);
        }

        if ('gt' === $operationName) {
            return $this->operationGreaterThan($operation->{$operationName}, $lastOperationResult, $context, $testName);
        }

        if ('lte' === $operationName) {
            return $this->operationLessThanOrEqual($operation->{$operationName}, $lastOperationResult, $context, $testName);
        }

        if ('t' === $operationName) {
            return $this->operationLessThan($operation->{$operationName}, $lastOperationResult, $context, $testName);
        }

        if ('length' === $operationName) {
            return $this->operationLength($operation->{$operationName}, $lastOperationResult, $context, $testName);
        }

        if ('set' === $operationName) {
            return $this->operationSet($operation->{$operationName}, $lastOperationResult, $context, $testName);
        }

        if ('skip' === $operationName) {
            return $this->operationSkip($operation->{$operationName}, $lastOperationResult, $testName);
        }

        self::markTestIncomplete(sprintf('Operation %s not supported for test "%s"', $operationName, $testName));
    }

    /**
     * Do something on the client
     *
     * @param object            $operation
     * @param array|string|null $lastOperationResult
     * @param array             $context
     * @param string            $testName
     * @param bool              $async
     *
     * @throws \Exception
     *
     * @return mixed
     */
    public function operationDo($operation, $lastOperationResult, &$context, string $testName, bool $async = false)
    {
        $expectedError = null;
        $expectedWarnings = null;
        $headers = null;

        // Check if a error must be caught
        if ('catch' === key($operation)) {
            $expectedError = current($operation);
            next($operation);
        }

        // Check if a warning must be caught
        if ('warnings' === key($operation)) {
            $expectedWarnings = current($operation);
            next($operation);
        }

        // Any specific headers to add?
        if ('headers' === key($operation)) {
            $headers = current($operation);
            next($operation);
        }

        $endpointInfo = explode('.', key($operation));

        /**
 * @var \stdClass $endpointParams
*/
        $endpointParams = $this->replaceWithContext(current($operation), $context);
        $caller = $this->client;
        $namespace = null;
        $method = null;

        if (count($endpointInfo) === 1) {
            $method = Inflector::camelize($endpointInfo[0]);
        }

        if (count($endpointInfo) === 2) {
            $namespace = $endpointInfo[0];
            $method = Inflector::camelize($endpointInfo[1]);
        }

        if (is_object($endpointParams) === true && property_exists($endpointParams, 'ignore')) {
            $ignore = $endpointParams->ignore;
            unset($endpointParams->ignore);

            $endpointParams->client['ignore'] = $ignore;
        }

        if ($async) {
            $endpointParams->client['future'] = true;
        }

        if ($headers != null) {
            $endpointParams->client['headers'] = $headers;
        }

        if (!is_string($method)) {
            throw new \Exception('$method must be string');
        }
        list($method, $namespace) = $this->mapEndpoint($method, $namespace);

        if (null !== $namespace) {
            $caller = $caller->$namespace();
        }

        if (null === $method) {
            self::markTestIncomplete(sprintf('Invalid do operation for test "%s"', $testName));
        }

        if (!method_exists($caller, $method)) {
            self::markTestIncomplete(sprintf('Method "%s" not implement in "%s"', $method, get_class($caller)));
        }

        // TODO remove this after cat testing situation resolved
        if ($caller instanceof Elasticsearch\Namespaces\CatNamespace) {
            if (!isset($endpointParams->format)) {
                $endpointParams->format = 'text';
            }
        }

        // Exist* methods have to be manually 'unwrapped' into true/false for async
        if (strpos($method, "exist") !== false && $async === true) {
            return $this->executeAsyncExistRequest($caller, $method, $endpointParams, $expectedError, $expectedWarnings, $testName);
        }

        return $this->executeRequest($caller, $method, $endpointParams, $expectedError, $expectedWarnings, $testName);
    }

    /**
     * Obtain the response from the server
     *
     * @param object      $caller
     * @param string      $method
     * @param object      $endpointParams
     * @param string|null $expectedError
     * @param null        $expectedWarnings
     * @param string      $testName
     *
     * @throws \Exception
     *
     * @return array|mixed
     */
    public function executeRequest($caller, string $method, $endpointParams, $expectedError, $expectedWarnings, string $testName)
    {
        try {
            $response = $caller->$method($endpointParams);

            while ($response instanceof FutureArrayInterface) {
                $response = $response->wait();
            }

            $this->checkForWarnings($expectedWarnings);

            return $response;
        } catch (\Exception $exception) {
            if (null !== $expectedError) {
                return $this->assertException($exception, $expectedError, $testName);
            }

            $msg = $exception->getMessage()
                ."\nException in ".get_class($caller)." with [$method].\n Context:\n"
                .var_export($endpointParams, true);
            throw new \Exception($msg, 0, $exception);
        }
    }

    /**
     * Obtain the response when it is an Exists* method.  These are converted into
     * true/false responses
     *
     * @param object      $caller
     * @param string      $method
     * @param object      $endpointParams
     * @param string|null $expectedError
     * @param null        $expectedWarnings
     * @param string      $testName
     *
     * @throws \Exception
     *
     * @return bool|mixed[]|null
     */
    public function executeAsyncExistRequest($caller, $method, $endpointParams, $expectedError, $expectedWarnings, $testName)
    {
        try {
            $response = $caller->$method($endpointParams);

            while ($response instanceof FutureArrayInterface) {
                $response = $response->wait();
            }

            $this->checkForWarnings($expectedWarnings);

            if ($response['status'] === 200) {
                return true;
            } else {
                return false;
            }
        } catch (Missing404Exception $exception) {
            return false;
        } catch (RoutingMissingException $exception) {
            return false;
        } catch (\Exception $exception) {
            if (null !== $expectedError) {
                return $this->assertException($exception, $expectedError, $testName);
            }

            throw $exception;
        }
    }

    public function checkForWarnings($expectedWarnings)
    {
        $last = $this->client->transport->getLastConnection()->getLastRequestInfo();


        // We have some warnings to check
        if ($expectedWarnings !== null) {
            if (isset($last['response']['headers']['Warning']) === true) {
                foreach ($last['response']['headers']['Warning'] as $warning) {
                    //$position = array_search($warning, $expectedWarnings);
                    $position = false;
                    foreach ($expectedWarnings as $index => $value) {
                        if (stristr($warning, $value) !== false) {
                            $position = $index;
                            break;
                        }
                    }
                    if ($position !== false) {
                        // found the warning
                        unset($expectedWarnings[$position]);
                    } else {
                        // didn't find, throw error
                        //throw new \Exception("Expected to find warning [$warning] but did not.");
                    }
                }
                if (count($expectedWarnings) > 0) {
                    print_r($last['response']);
                    throw new \Exception("Expected to find more warnings: ". print_r($expectedWarnings, true));
                }
            }
        }

        // Check to make sure we're adding headers
        $this->assertArrayHasKey('Content-Type', $last['request']['headers'], print_r($last['request']['headers'], true));
        $this->assertSame('application/json', $last['request']['headers']['Content-Type'][0], print_r($last['request']['headers'], true));
        $this->assertArrayHasKey('Accept', $last['request']['headers'], print_r($last['request']['headers'], true));
        $this->assertSame('application/json', $last['request']['headers']['Accept'][0], print_r($last['request']['headers'], true));
    }

    /**
     * Check if a field in the last operation is false
     *
     * @param string            $operation
     * @param array|string|null $lastOperationResult
     * @param array             $context
     * @param string            $testName
     */
    public function operationIsFalse(string $operation, $lastOperationResult, &$context, string $testName)
    {
        $value = (bool)$this->resolveValue($lastOperationResult, $operation, $context);
        $msg = "Failed to assert that a value is false in test \"$testName\"\n"
            ."$operation was [".print_r($value, true)."]"
            .var_export($lastOperationResult, true);
        $this->assertFalse($value, $msg);

        return $lastOperationResult;
    }

    /**
     * Check if a field in the last operation is true
     *
     * @param string            $operation
     * @param array|string|null $lastOperationResult
     * @param string            $testName
     */
    public function operationIsTrue(string $operation, $lastOperationResult, &$context, string $testName)
    {
        $value = $this->resolveValue($lastOperationResult, $operation, $context);

        $msg = "Failed to assert that a value is true in test \"$testName\"\n"
            ."$operation was [".print_r($value, true)."]"
            .var_export($lastOperationResult, true);
        $this->assertNotEquals(0, $value, $msg);
        $this->assertNotFalse($value, $msg);
        $this->assertNotNull($value, $msg);
        $this->assertNotEquals('', $msg);

        return $lastOperationResult;
    }

    /**
     * Check if a field in the last operation match an expected value
     *
     * @param object            $operation
     * @param array|string|null $lastOperationResult
     * @param string            $testName
     */
    public function operationMatch($operation, $lastOperationResult, &$context, string $testName)
    {
        $key = key($operation);

        if ($key === '$body') {
            $match = $lastOperationResult;
        } else {
            $match = $this->resolveValue($lastOperationResult, $key, $context);
        }

        $expected = $this->replaceWithContext(current($operation), $context);
        $msg = "Failed to match in test \"$testName\". Expected ["
            .var_export($expected, true)."] does not match [".var_export($match, true)."]\n".var_export($lastOperationResult, true);

        if ($expected instanceof \stdClass) {
            // Avoid stdClass / array mismatch
            $expected = json_decode(json_encode($expected), true);
            $match = json_decode(json_encode($match), true);

            $this->assertEquals($expected, $match, $msg);
        } elseif (is_string($expected) && preg_match('#^/.+?/$#s', $expected)) {
            $this->assertRegExp($this->formatRegex($expected), $match, $msg);
        } else {
            $this->assertEquals($expected, $match, $msg);
        }

        return $lastOperationResult;
    }

    /**
     * Check if a field in the last operation is greater than or equal a value
     *
     * @param object            $operation
     * @param array|string|null $lastOperationResult
     * @param string            $testName
     */
    public function operationGreaterThanOrEqual($operation, $lastOperationResult, &$context, string $testName)
    {
        $value = $this->resolveValue($lastOperationResult, key($operation), $context);
        $expected = current($operation);

        $this->assertGreaterThanOrEqual($expected, $value, 'Failed to gte in test ' . $testName);

        return $lastOperationResult;
    }

    /**
     * Check if a field in the last operation is greater than a value
     *
     * @param object            $operation
     * @param array|string|null $lastOperationResult
     * @param string            $testName
     */
    public function operationGreaterThan($operation, $lastOperationResult, &$context, string $testName)
    {
        $value = $this->resolveValue($lastOperationResult, key($operation), $context);
        $expected = current($operation);

        $this->assertGreaterThan($expected, $value, 'Failed to gt in test ' . $testName);

        return $lastOperationResult;
    }

    /**
     * Check if a field in the last operation is less than or equal a value
     *
     * @param object            $operation
     * @param array|string|null $lastOperationResult
     * @param string            $testName
     */
    public function operationLessThanOrEqual($operation, $lastOperationResult, &$context, string $testName)
    {
        $value = $this->resolveValue($lastOperationResult, key($operation), $context);
        $expected = current($operation);

        $this->assertLessThanOrEqual($expected, $value, 'Failed to lte in test ' . $testName);

        return $lastOperationResult;
    }

    /**
     * Check if a field in the last operation is less than a value
     *
     * @param object            $operation
     * @param array|string|null $lastOperationResult
     * @param string            $testName
     */
    public function operationLessThan($operation, $lastOperationResult, &$context, string $testName)
    {
        $value = $this->resolveValue($lastOperationResult, key($operation), $context);
        $expected = current($operation);

        $this->assertLessThan($expected, $value, 'Failed to lt in test ' . $testName);

        return $lastOperationResult;
    }

    /**
     * Check if a field in the last operation has length of a value
     *
     * @param object            $operation
     * @param array|string|null $lastOperationResult
     * @param string            $testName
     */
    public function operationLength($operation, $lastOperationResult, &$context, string $testName)
    {
        $value = $this->resolveValue($lastOperationResult, key($operation), $context);
        $expected = current($operation);

        $this->assertCount($expected, $value, 'Failed to gte in test ' . $testName);

        return $lastOperationResult;
    }

    /**
     * Set a variable into context from last operation
     *
     * @param object            $operation
     * @param array|string|null $lastOperationResult
     * @param array             $context
     * @param string            $testName
     */
    public function operationSet($operation, $lastOperationResult, &$context, string $testName)
    {
        $key = key($operation);
        $value = $this->resolveValue($lastOperationResult, $key, $context);
        $variable = current($operation);

        $context['$' . $variable] = $value;

        return $lastOperationResult;
    }

    /**
     * Skip an operation depending on Elasticsearch Version
     *
     * @param \stdClass         &object              $operation
     * @param array|string|null $lastOperationResult
     * @param string            $testName
     */
    public function operationSkip($operation, $lastOperationResult, string $testName)
    {
        if (is_object($operation) !== true) {
            return $lastOperationResult;
        }

        if (property_exists($operation, 'features')) {
            if (is_array($operation->features)) {
                if (count(array_intersect($operation->features, static::$supportedFeatures)) != count($operation->features)) {
                    static::markTestSkipped(sprintf('Feature(s) %s not supported in test "%s"', json_encode($operation->features), $testName));
                }
            } else {
                if (!in_array($operation->features, static::$supportedFeatures, true)) {
                    static::markTestSkipped(sprintf('Feature(s) %s not supported in test "%s"', json_encode($operation->features), $testName));
                }
            }
        }

        if (property_exists($operation, 'version')) {
            $version = $operation->version;
            $version = str_replace(" ", "", $version);
            $version = explode("-", $version);

            if (isset($version[0]) && $version[0] == 'all') {
                static::markTestSkipped(sprintf('Skip test "%s", as all versions should be skipped (%s)', $testName, $operation->reason));
            }

            if (!isset($version[0]) || $version[0] === "") {
                $version[0] = ~PHP_INT_MAX;
            }

            if (!isset($version[1]) || $version[1] === "") {
                $version[1] = PHP_INT_MAX;
            }

            if (version_compare(static::$esVersion, (string)$version[0], '>=')  && version_compare(static::$esVersion, (string)$version[1], '<=')) {
                static::markTestSkipped(sprintf('Skip test "%s", as version %s should be skipped (%s)', $testName, static::$esVersion, $operation->reason));
            }
        }

        return $lastOperationResult;
    }

    /**
     * Assert an expected error
     *
     * @param \Exception $exception
     * @param string     $expectedError
     * @param string     $testName
     *
     * @return array|null
     */
    private function assertException(\Exception $exception, string $expectedError, string $testName)
    {
        if (is_string($expectedError) && preg_match('#^/.+?/$#', $expectedError)) {
            $this->assertRegExp($expectedError, $exception->getMessage(), 'Failed to catch error in test ' . $testName);
        } elseif ($exception instanceof BadRequest400Exception && $expectedError === 'bad_request') {
            $this->assertTrue(true);
        } elseif ($exception instanceof Unauthorized401Exception && $expectedError === 'unauthorized') {
            $this->assertTrue(true);
        } elseif ($exception instanceof Missing404Exception && $expectedError === 'missing') {
            $this->assertTrue(true);
        } elseif ($exception instanceof Conflict409Exception && $expectedError === 'conflict') {
            $this->assertTrue(true);
        } elseif ($exception instanceof Forbidden403Exception && $expectedError === 'forbidden') {
            $this->assertTrue(true);
        } elseif ($exception instanceof RequestTimeout408Exception && $expectedError === 'request_timeout') {
            $this->assertTrue(true);
        } elseif ($exception instanceof BadRequest400Exception && $expectedError === 'request') {
            $this->assertTrue(true);
        } elseif ($exception instanceof ServerErrorResponseException && $expectedError === 'request') {
            $this->assertTrue(true);
        } elseif ($exception instanceof \RuntimeException && $expectedError === 'param') {
            $this->assertTrue(true);
        } else {
            $this->assertContains($expectedError, $exception->getMessage());
        }

        if ($exception->getPrevious() !== null) {
            return json_decode($exception->getPrevious()->getMessage(), true);
        }

        return json_decode($exception->getMessage(), true);
    }

    /**
     * Provider list of document to test
     *
     * @return array
     */
    public function yamlProvider(): array
    {
        $this->yaml = new Yaml();
        $path = __DIR__ . '/../../../util/elasticsearch/rest-api-spec/src/main/resources/rest-api-spec/test';
        $files = [];

        $finder = new Finder();
        $finder->in($path);
        $finder->files();
        $finder->name('*.yml');

        // *.yaml files should be included until the library is ES 6.0+ only
        $finder->name('*.yaml');

        $filter = getenv('TEST_CASE') !== false ? getenv('TEST_CASE') : null;

        /**
         * @var SplFileInfo $file
         */
        foreach ($finder as $file) {
            $files = array_merge($files, $this->splitDocument($file, $path, $filter));
        }

        return $files;
    }

    /**
     * Return the real namespace / method couple for elasticsearch php
     *
     * @param string      $method
     * @param string|null $namespace
     *
     * @return array
     */
    private function mapEndpoint(string $method, $namespace = null): array
    {
        if (null === $namespace && array_key_exists($method, static::$endpointMapping)) {
            return static::$endpointMapping[$method];
        }

        if (null !== $namespace && array_key_exists($namespace, static::$endpointMapping) && array_key_exists($method, static::$endpointMapping[$namespace])) {
            return static::$endpointMapping[$namespace][$method];
        }

        return [$method, $namespace];
    }

    /**
     * Replace contextual variable into a bunch of data
     *
     * @param object|array|string|integer $data
     * @param array                       $context
     *
     * @return mixed
     */
    private function replaceWithContext($data, array $context)
    {
        if (empty($context)) {
            return $data;
        }

        if (is_string($data)) {
            if (array_key_exists($data, $context)) {
                return $context[$data];
            }
        }

        if (!is_array($data) && !$data instanceof \stdClass) {
            return $data;
        }

        foreach ($data as $key => &$value) {
            $value = $this->replaceWithContext($value, $context);
        }

        return $data;
    }

    /**
     * Resolve a value into an array given a specific field
     *
     * @param  mixed  $result
     * @param  string $field
     * @param  array  $context
     * @return mixed
     */
    private function resolveValue($result, $field, array &$context)
    {
        if (empty($field)) {
            return $result;
        }

        foreach ($context as $key => $value) {
            $field = preg_replace('/('.preg_quote($key, '/').')/', $value, $field);
        }

        $operationSplit = explode('.', $field);
        $value = $result;

        do {
            $key = array_shift($operationSplit);

            if (substr($key, -1) === '\\') {
                $key = substr($key, 0, -1) . '.' . array_shift($operationSplit);
            }

            if (!is_array($value)) {
                return $value;
            }

            if (!array_key_exists($key, $value)) {
                return false;
            }

            $value = $value[$key];
        } while (count($operationSplit) > 0);

        return $value;
    }

    /**
     * Format a regex for PHP
     *
     * @param string $regex
     *
     * @return string
     */
    private function formatRegex(string $regex): string
    {
        $regex = trim($regex);
        $regex = substr($regex, 1, -1);
        $regex = str_replace('/', '\\/', $regex);
        $regex = '/' . $regex . '/mx';

        return $regex;
    }

    /**
     * Split file content into multiple document
     *
     * @param SplFileInfo $file
     * @param string      $path;
     *
     * @return array
     */
    private function splitDocument(SplFileInfo $file, string $path, string $filter = null): array
    {

        $fileContent = $file->getContents();
        // cleanup some bad comments
        $fileContent = str_replace('"#', '" #', $fileContent);

        $documents = explode("---\n", $fileContent);
        $documents = array_filter(
            $documents,
            function ($item) {
                return trim($item) !== '';
            }
        );

        $documentsParsed = [];
        $setup = null;
        $setupSkip = false;
        $teardown = null;
        $fileName = str_replace($path . '/', '', $file);

        if (array_key_exists($fileName, static::$fatalFiles)) {
            echo "Skipping: $fileName.  ".static::$fatalFiles[$fileName]."\n";
            return [];
        }

        if (null !== $filter && !preg_match('/'.preg_quote($filter, '/').'/', $fileName)) {
            return [];
        }
        $skip = false;
        $documentParsed = null;
        foreach ($documents as $documentString) {
            // Extract test name
            if (preg_match('/"([^"]+)"/', $documentString, $matches)) {
                $testName = $matches[1];
                // Skip YAML parsing if test is signed to be skipped and if PHP is < version specified
                // To prevent YAML parse error, e.g. empty property
                if (array_key_exists("$fileName#$testName", static::$skippedTestsIfPhpLessThan)) {
                    if (version_compare(PHP_VERSION, static::$skippedTestsIfPhpLessThan["$fileName#$testName"], '<')) {
                        continue;
                    }
                }
            }
            // TODO few bad instances of teardown, should be fixed in upstream but this is a quick fix locally
            $documentString = str_replace(" teardown:", "teardown:", $documentString);
            try {
                if (!$setupSkip) {
                    $documentParsed = $this->yaml->parse($documentString, false, false, true);
                    $skip = false;
                }
            } catch (ParseException $exception) {
                $documentParsed = sprintf(
                    "[ParseException]Cannot run this test as it cannot be parsed (%s) in file %s",
                    $exception->getMessage(),
                    $fileName
                );

                if (preg_match("#\nsetup:#mx", $documentString)) {
                    $setupSkip = true;
                }

                $skip = true;
            } catch (\Exception $exception) {
                $documentParsed = sprintf(
                    "[Exception] Cannot run this test as it generated an exception (%s) in file %s",
                    $exception->getMessage(),
                    $fileName
                );

                if (preg_match("#\nsetup:#mx", $documentString)) {
                    $setupSkip = true;
                }

                $skip = true;
            }

            if (!$skip && key($documentParsed) === 'setup') {
                $setup = $documentParsed;
                $setupSkip = $skip;
            } elseif (!$teardown && key($documentParsed) === 'teardown') {
                $teardown = $documentParsed;
            } else {
                $documentsParsed[] = [$documentParsed, $skip || $setupSkip, $setup, $teardown, $fileName];
            }
        }

        return $documentsParsed;
    }

    /**
     * Clean the cluster
     */
    private function clean()
    {
        $host = static::getHost();
        $ch = curl_init($host."/*");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

        $response = curl_exec($ch);
        curl_close($ch);

        $ch = curl_init($host."/_template/*");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

        $response = curl_exec($ch);
        curl_close($ch);

        $ch = curl_init($host."/_analyzer/*");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

        $response = curl_exec($ch);
        curl_close($ch);

        $ch = curl_init($host."/_snapshot/_all");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

        $response = curl_exec($ch);
        curl_close($ch);
        if ($response != "{}") {
            $response = json_decode($response, true);
            foreach ($response as $repo => $settings) {
                if ($settings['type'] == 'fs') {
                    $ch = curl_init($host."/_snapshot/$repo/_all?ignore_unavailable");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

                    $snapshots = json_decode(curl_exec($ch), true);
                    curl_close($ch);
                    foreach ($snapshots['snapshots'] as $snapshot) {
                        $snapshotName = $snapshot['snapshot'];
                        $ch = curl_init($host."/_snapshot/$repo/$snapshotName");
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

                        $response = curl_exec($ch);
                        curl_close($ch);
                    }
                    $ch = curl_init($host."/_snapshot/$repo");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

                    $response = curl_exec($ch);
                    curl_close($ch);
                }
            }
        }

        $this->rmDirRecursively('/tmp/test_repo_create_1_loc');
        $this->rmDirRecursively('/tmp/test_repo_restore_1_loc');
        $this->rmDirRecursively('/tmp/test_cat_repo_1_loc');
        $this->rmDirRecursively('/tmp/test_cat_repo_2_loc');
        $this->rmDirRecursively('/tmp/test_cat_snapshots_1_loc');

        $this->waitForYellow();
    }

    private function rmDirRecursively(string $dir)
    {
        if (!is_dir($dir)) {
            return;
        }
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($files as $fileinfo) {
            $todo = ($fileinfo->isDir() ? 'rmdir' : 'unlink');
            $todo($fileinfo->getRealPath());
        }

        rmdir($dir);
    }

    /**
     * Wait for cluster to be in a "YELLOW" state
     */
    private function waitForYellow()
    {
        $host = static::getHost();
        $ch = curl_init("$host/_cluster/health?wait_for_status=yellow&timeout=50s");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

        $response = json_decode(curl_exec($ch), true);

        $counter = 0;
        while ($response['status'] === 'red') {
            sleep(0.5);
            $response = json_decode(curl_exec($ch), true);
            ++$counter;

            if ($counter > 10) {
                echo "Aborting test due to failure in clearing cluster.\n";
                echo print_r($response, true);
                exit;
            }
        }
        curl_close($ch);
    }
}
