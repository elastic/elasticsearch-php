<?php
/**
 * Elasticsearch PHP client
 *
 * @link      https://github.com/elastic/elasticsearch-php/
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */


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
 * @subpackage Tests
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
        'stash_in_path', 'warnings', 'headers', 'contains', 'catch_unauthorized'
    ];

    /**
     * @var array A mapping for endpoint when there is a reserved keywords for the method / namespace name
     */
    private static $endpointMapping = [
    ];

    /**
     * @var mixed[]
     */
    private static $skippedTests = [
    ];

    /**
     * @var string[]
     */
    private static $skippedTestNames = [
        'test distance_feature query on date_nanos type',
        'cluster health with closed index (pre 7.2.0)',
        'PUT mapping with typeless API on an index that has types', //
        'Test cat indices output for closed index (pre 7.2.0)' // regex issue in cat.indices/10_basic.yml
    ];

    /**
     * @var mixed[]
     */
    private static $skippedTestsIfPhpLessThan = [
    ];

    /**
     * @var array A list of skipped test with their reasons
     */
    private static $skippedFiles = [
        'cat.nodeattrs/10_basic.yml' => 'Using java regex fails in PHP',
        'cat.repositories/10_basic.yml' => 'Using java regex fails in PHP',
        'indices.rollover/10_basic.yml' => 'Rollover test seems buggy atm',
        # Xpack
        'ml/*' => 'Skipped all tests',
        'security/*' => 'Skipped all tests',
        'rollup/*' => 'Skipped all tests',
        'async_search/*' => 'Skipped all tests',
        'transform/*' => 'Skipped all tests',
        'ssl/*' => 'Skipped all tests',
        'users/*' => 'Skipped all tests',
        'api_key/*' => 'Skipped all tests',
        'data_science/*' => 'Skipped all tests',
        'change_password/*' => 'Skipped all tests',
        'token/*' => 'Skipped all tests',
        'license/*' => 'Skipped all tests',
        'deprecation/*' => 'Skipped all tests',
        'analytics/*' => 'Skipped all tests',
        'vectors/*' => 'Skipped all tests',
        'authenticate/*' => 'Skipped all tests',
        'set_security_user/*' => 'Skipped all tests',
        'xpack/*' => 'Skipped all tests',
        'graph/*' => 'Skipped all tests',
        'roles/*' => 'Skipped all tests',
        'sql/sql.yml' => 'Unknown index [test]',
        'searchable_snapshots/10_usage.yml' => 'Expected [true] does not match [false]',
        'role_mapping/30_delete.yml' => 'Missing404Exception',
        'role_mapping/20_get_missing.yml' => 'Array to string conversion',
        'roles/20_get_missing.yml' => 'Array to string conversion',
        'wildcard/10_wildcard_basic.yml' => 'Number mismatch',
        'privileges/11_builtin.yml' => 'Count mismatch',
        'constant_keyword/10_basic.yml' => 'Count mismatch',
        'flattened/20_flattened_stats.yml' => 'Setup issue. Risky error'
    ];

    /**
     * @var array A list of files to skip completely, due to fatal parsing errors
     */
    private static $fatalFiles = [
        'search/110_field_collapsing.yml' => 'Temporary: parse error, malformed inline yaml',
        'search/190_index_prefix_search.yml' => 'bad yaml array syntax',
        'search.aggregation/230_composite.yml' => 'bad yaml array syntax',
        'nodes.reload_secure_settings/10_basic.yml' => 'Malformed inline YAML string',
        # XPack
        'privileges/40_get_user_privs.yml' => 'Malformed inline YAML string',
        'privileges/20_has_application_privs.yml' => 'Malformed inline YAML string',
        'privileges/30_superuser.yml' => 'Malformed inline YAML string',
        'ml/jobs_crud.yml' => 'Malformed inline YAML string',
        'ml/custom_all_field.yml' => 'Malformed inline YAML string',
        'ml/data_frame_analytics_crud.yml' => 'Malformed inline YAML string',
    ];

    /**
     * Return the elasticsearch host
     *
     * @return string
     */
    public static function getHost(): string
    {
        $host = Utility::getHost();
        if (null == $host) {
            echo 'Environment variable TEST_SUITE (oss, xpack) not defined.';
            exit;
        }
        return $host;
    }

    public static function setUpBeforeClass()
    {
        $host = static::getHost();
        echo "Test Host: $host\n";

        $ch = curl_init($host);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $response = curl_exec($ch);
        curl_close($ch);
        if (false === $response) {
            throw new \Exception(sprintf(
                "I cannot connect to ES: %d %s",
                curl_errno($ch),
                curl_error($ch)
            ));
        }
        $response = json_decode($response, true);
        static::$esVersion = $response['version']['number'];
        echo "ES Version: ".static::$esVersion."\n";
    }

    public function setUp(): void
    {
        $this->client = Utility::getClient();
    }

    public function tearDown(): void
    {
        $this->clean();
    }

    /**
     * @dataProvider yamlProvider
     * @group        sync
     */
    public function testIntegration($testProcedure, bool $skip, $setupProcedure, $teardownProcedure, string $fileName)
    {
        if ($skip) {
            static::markTestIncomplete($testProcedure);
        }

        if (array_key_exists($fileName, static::$skippedFiles)) {
            static::markTestSkipped(static::$skippedFiles[$fileName]);
        }
        // Check for wildchar in folder/* skippedFiles
        $posSlash = strpos($fileName, '/');
        if (false !== $posSlash) {
            $folder = substr($fileName, 0, $posSlash);
            if (isset(static::$skippedFiles[$folder . '/*'])) {
                static::markTestSkipped(static::$skippedFiles[$folder . '/*']);
            }
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
     * @group        async
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

        if ('lt' === $operationName) {
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

        if ('contains' === $operationName) {
            return $this->operationContains($operation->{$operationName}, $lastOperationResult, $context, $testName);
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
            $headers = $this->formatHeaders(current($operation));
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

        return $this->executeRequest($caller, $method, (array) $endpointParams, $expectedError, $expectedWarnings, $testName);
    }

    /**
     * Obtain the response from the server
     *
     * @param object      $caller
     * @param string      $method
     * @param array       $endpointParams
     * @param string|null $expectedError
     * @param null        $expectedWarnings
     * @param string      $testName
     *
     * @throws \Exception
     *
     * @return array|mixed
     */
    public function executeRequest($caller, string $method, array $endpointParams, $expectedError, $expectedWarnings, string $testName)
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
                . "\nException in " . get_class($caller) . " with [$method].\n Context:\n"
                . var_export($endpointParams, true)
                . "\nTest name: $testName\n";
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
        $value = (bool) $this->resolveValue($lastOperationResult, $operation, $context);
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
            if (empty($key)) {
                $match = $lastOperationResult['_source'] ?? $lastOperationResult;
            } else {
                $match = $this->resolveValue($lastOperationResult, $key, $context);
            }
        }
        // Special cases for responses
        // @todo We need to investigate more about this behaviour
        switch ($testName) {
            case 'docvalue_fields with explicit format':
                if (is_array($match)) {
                    foreach ($match as $k => $v) {
                        $match[$k] = is_string($v) ? trim($v) : $v;
                    }
                }
                break;
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
        $expected = $context[current($operation)] ?? current($operation);

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
        $expected = $context[current($operation)] ?? current($operation);

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
        $expected = $context[current($operation)] ?? current($operation);

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
        $expected = $context[current($operation)] ?? current($operation);

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
            if (empty($version[0])) {
                $version[0] = '0';
            }
            if (version_compare(static::$esVersion, $version[0], '>=') &&
                version_compare(static::$esVersion, $version[1], '<=')) {
                static::markTestSkipped(sprintf(
                    "Skip test %s, as ES version %s should be skipped (%s)",
                    $testName,
                    static::$esVersion,
                    $operation->reason
                ));
            }
        }

        return $lastOperationResult;
    }

    /**
     * Check if a field in the last operation contains a value
     *
     * @param object            $operation
     * @param array|string|null $lastOperationResult
     * @param array             $context
     * @param string            $testName
     */
    public function operationContains($operation, $lastOperationResult, &$context, string $testName)
    {
        $value = $this->resolveValue($lastOperationResult, key($operation), $context);
        $expected = current($operation);

        //if (is_array($expected)) {
            $this->assertContains($expected, $value, 'Failed to contains in test ' . $testName);
        //}
        
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
        } elseif (false !== strpos($exception->getMessage(), '"status":401') && $expectedError === 'unauthorized') {
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
        $testSuite = getenv('TEST_SUITE');
        if ($testSuite === false) {
            throw new \Exception("The TEST_SUITE env does not exist");
        }
        $path = $testSuite === 'oss'
            ? __DIR__ . '/../../../util/elasticsearch/rest-api-spec/src/main/resources/rest-api-spec/test'
            : __DIR__ . '/../../../util/elasticsearch/x-pack/plugin/src/test/resources/rest-api-spec/test';

        $files = [];

        $finder = new Finder();
        $finder->in($path);
        $finder->files();
        $finder->name('*.yml');

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

        if (!is_array($data) && !($data instanceof \stdClass)) {
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

            if (strpos($key, '$') !== 0 && !array_key_exists($key, $value)) {
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

                if (in_array($testName, static::$skippedTestNames)) {
                    continue;
                }

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
                    $documentParsed = $this->yaml->parse($documentString, Yaml::PARSE_OBJECT_FOR_MAP);
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

            if (!$skip && is_array($documentParsed) && key($documentParsed) === 'setup') {
                $setup = $documentParsed;
                $setupSkip = $skip;
            } elseif (!$teardown && is_array($documentParsed) && key($documentParsed) === 'teardown') {
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
        // Delete all indices
        $this->client->indices()->delete([
            'index' => '*'
        ]);

        // Delete all template
        $this->client->indices()->deleteTemplate([
            'name' => '*'
        ]);

        if (getenv('TEST_SUITE') === 'xpack') {
            # Get all roles
            $roles = $this->client->security()->getRole();
            # Delete custom roles (metadata._reserved = 0)
            foreach ($roles as $role => $values) {
                if ($values['metadata']['_reserved'] === 0) {
                    $this->client->security()->deleteRole([
                        'name' => $role
                    ]);
                }
            }

            # Get all users
            $users = $this->client->security()->getUser();
            # Delete custom users (metadata._reserved = 0)
            foreach ($users as $user => $values) {
                if ($values['metadata']['_reserved'] === 0) {
                    $this->client->security()->deleteUser([
                        'username' => $user
                    ]);
                }
            }

            # Get all privileges
            $privileges = $this->client->security()->getPrivileges();
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
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $response = curl_exec($ch);
        if (false !== $response) {
            $response = json_decode($response, true);
        }

        $counter = 0;
        while (false !== $response && $response['status'] === 'red') {
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

    private function formatHeaders($headers): array
    {
        $result = (array) $headers;
        foreach ($result as $key => $value) {
            if (!is_array($value)) {
                $result[$key] = explode(',', $value);
            }
        }
        return $result;
    }
}
