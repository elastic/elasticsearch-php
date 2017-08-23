<?php

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
use GuzzleHttp\Ring\Future\FutureArrayInterface;
use stdClass;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Parser;
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
class YamlRunnerTest extends \PHPUnit_Framework_TestCase
{
    /** @var Parser Yaml parser for reading integrations tests */
    private $yaml;

    /** @var Elasticsearch\Client client used by elasticsearch */
    private $client;

    /** @var string Es version */
    private static $esVersion;

    /** @var array A list of supported features */
    private static $supportedFeatures = [
        'stash_in_path', 'warnings', 'headers'
    ];

    /** @var array A mapping for endpoint when there is a reserved keywords for the method / namespace name */
    private static $endpointMapping = [
        'tasks' => [
            'list' => ['tasksList', 'tasks'],
        ],
    ];

    /** @var array A list of skipped test with their reasons */
    private static $skippedTest = [
        'cat.nodeattrs/10_basic.yaml' => 'Using java regex fails in PHP',
        'cat.repositories/10_basic.yaml' => 'Using java regex fails in PHP',
        'indices.shrink/10_basic.yaml' => 'Shrink tests seem to require multiple nodes',
        'indices.rollover/10_basic.yaml' => 'Rollover test seems buggy atm'
    ];

    /** @var array A list of files to skip completely, due to fatal parsing errors */
    private static $skippedFiles = [
        'indices.create/10_basic.yaml' => 'Temporary: Yaml parser doesnt support "inline" empty keys',
        'indices.put_mapping/10_basic.yaml' => 'Temporary: Yaml parser doesnt support "inline" empty keys',
        'search/110_field_collapsing.yaml' => 'Temporary: parse error, malformed inline yaml',
        'cat.nodes/10_basic.yaml' => 'Temporary: parse error, something about $body: |'
    ];

    /**
     * Return the elasticsearch host
     *
     * @return string
     */
    public static function getHost()
    {
        if (isset($_SERVER['ES_TEST_HOST']) === true) {
            return $_SERVER['ES_TEST_HOST'];
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
        $builder = Elasticsearch\ClientBuilder::create()->setHosts([self::getHost()]);
        if (version_compare(phpversion(), '5.6.6', '<') || ! defined('JSON_PRESERVE_ZERO_FRACTION')) {
            $builder->allowBadJSONSerialization();
        }
        $this->client = $builder->build();
    }

    /**
     * @dataProvider yamlProvider
     * @group sync
     */
    public function testIntegration($testProcedure, $skip, $setupProcedure, $fileName)
    {
        if ($skip) {
            static::markTestIncomplete($testProcedure);
        }

        if (array_key_exists($fileName, static::$skippedTest)) {
            static::markTestSkipped(static::$skippedTest[$fileName]);
        }

        if (null !== $setupProcedure) {
            $this->processProcedure(current($setupProcedure), 'setup');
            $this->waitForYellow();
        }

        $this->processProcedure(current($testProcedure), key($testProcedure));
    }

    /**
     * @dataProvider yamlProvider
     * @group async
     */
    public function testAsyncIntegration($testProcedure, $skip, $setupProcedure, $fileName)
    {
        if ($skip) {
            static::markTestIncomplete($testProcedure);
        }

        if (array_key_exists($fileName, static::$skippedTest)) {
            static::markTestSkipped(static::$skippedTest[$fileName]);
        }

        if (null !== $setupProcedure) {
            $this->processProcedure(current($setupProcedure), 'setup');
            $this->waitForYellow();
        }

        $this->processProcedure(current($testProcedure), key($testProcedure), true);
    }

    /**
     * Process a procedure
     *
     * @param $procedure
     * @param $name
     * @param bool $async
     */
    public function processProcedure($procedure, $name, $async = false)
    {
        $lastOperationResult = null;
        $context = [];

        foreach ($procedure as $operation) {
            $lastOperationResult = $this->processOperation($operation, $lastOperationResult, $context, $name, $async);
        }
    }

    /**
     * Process an operation
     *
     * @param      $operation
     * @param      $lastOperationResult
     * @param      $testName
     * @param array $context 
     * @param bool $async
     *
     * @return mixed
     */
    public function processOperation($operation, $lastOperationResult, &$context, $testName, $async = false)
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
     * @param      $operation
     * @param      $lastOperationResult
     * @param array $context
     * @param      $testName
     * @param bool $async
     *
     * @throws \Exception
     *
     * @return mixed
     */
    public function operationDo($operation, $lastOperationResult, &$context, $testName, $async = false)
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
     * @param $caller
     * @param $method
     * @param $endpointParams
     * @param $expectedError
     * @param $testName
     *
     * @throws \Exception
     *
     * @return array|mixed
     */
    public function executeRequest($caller, $method, $endpointParams, $expectedError, $expectedWarnings, $testName)
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
     * @param $caller
     * @param $method
     * @param $endpointParams
     * @param $expectedError
     * @param $testName
     *
     * @throws \Exception
     *
     * @return bool
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

    public function checkForWarnings($expectedWarnings) {
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
        static::assertArrayHasKey('Content-Type', $last['request']['headers'], print_r($last['request']['headers'], true));
        static::assertEquals('application/json', $last['request']['headers']['Content-Type'][0], print_r($last['request']['headers'], true));
        static::assertArrayHasKey('Accept', $last['request']['headers'], print_r($last['request']['headers'], true));
        static::assertEquals('application/json', $last['request']['headers']['Accept'][0], print_r($last['request']['headers'], true));

    }

    /**
     * Check if a field in the last operation is false
     *
     * @param $operation
     * @param $lastOperationResult
     * @param $testName
     */
    public function operationIsFalse($operation, $lastOperationResult, &$context, $testName)
    {
        $value = (bool)$this->resolveValue($lastOperationResult, $operation, $context);
        $msg = "Failed to assert that a value is false in test \"$testName\"\n"
            ."$operation was [".print_r($value, true)."]"
            .var_export($lastOperationResult, true);
        static::assertFalse($value, $msg);

        return $lastOperationResult;
    }

    /**
     * Check if a field in the last operation is true
     *
     * @param $operation
     * @param $lastOperationResult
     * @param $testName
     */
    public function operationIsTrue($operation, $lastOperationResult, &$context, $testName)
    {
        $value = $this->resolveValue($lastOperationResult, $operation, $context);

        $msg = "Failed to assert that a value is true in test \"$testName\"\n"
            ."$operation was [".print_r($value, true)."]"
            .var_export($lastOperationResult, true);
        static::assertNotEquals(0, $value, $msg);
        static::assertNotFalse($value, $msg);
        static::assertNotNull($value, $msg);
        static::assertNotEquals('', $msg);

        return $lastOperationResult;
    }

    /**
     * Check if a field in the last operation match an expected value
     *
     * @param $operation
     * @param $lastOperationResult
     * @param $testName
     */
    public function operationMatch($operation, $lastOperationResult, &$context, $testName)
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

            static::assertEquals($expected, $match, $msg);
        } elseif (is_string($expected) && preg_match('#^/.+?/$#s', $expected)) {
            static::assertRegExp($this->formatRegex($expected), $match, $msg);
        } else {
            static::assertEquals($expected, $match, $msg);
        }

        return $lastOperationResult;
    }

    /**
     * Check if a field in the last operation is greater than or equal a value
     *
     * @param $operation
     * @param $lastOperationResult
     * @param $testName
     */
    public function operationGreaterThanOrEqual($operation, $lastOperationResult, &$context, $testName)
    {
        $value = $this->resolveValue($lastOperationResult, key($operation), $context);
        $expected = current($operation);

        static::assertGreaterThanOrEqual($expected, $value, 'Failed to gte in test ' . $testName);

        return $lastOperationResult;
    }

    /**
     * Check if a field in the last operation is greater than a value
     *
     * @param $operation
     * @param $lastOperationResult
     * @param $testName
     */
    public function operationGreaterThan($operation, $lastOperationResult, &$context, $testName)
    {
        $value = $this->resolveValue($lastOperationResult, key($operation), $context);
        $expected = current($operation);

        static::assertGreaterThan($expected, $value, 'Failed to gt in test ' . $testName);

        return $lastOperationResult;
    }

    /**
     * Check if a field in the last operation is less than or equal a value
     *
     * @param $operation
     * @param $lastOperationResult
     * @param $testName
     */
    public function operationLessThanOrEqual($operation, $lastOperationResult, &$context, $testName)
    {
        $value = $this->resolveValue($lastOperationResult, key($operation), $context);
        $expected = current($operation);

        static::assertLessThanOrEqual($expected, $value, 'Failed to lte in test ' . $testName);

        return $lastOperationResult;
    }

    /**
     * Check if a field in the last operation is less than a value
     *
     * @param $operation
     * @param $lastOperationResult
     * @param $testName
     */
    public function operationLessThan($operation, $lastOperationResult, &$context, $testName)
    {
        $value = $this->resolveValue($lastOperationResult, key($operation), $context);
        $expected = current($operation);

        static::assertLessThan($expected, $value, 'Failed to lt in test ' . $testName);

        return $lastOperationResult;
    }

    /**
     * Check if a field in the last operation has length of a value
     *
     * @param $operation
     * @param $lastOperationResult
     * @param $testName
     */
    public function operationLength($operation, $lastOperationResult, &$context, $testName)
    {
        $value = $this->resolveValue($lastOperationResult, key($operation), $context);
        $expected = current($operation);

        static::assertCount($expected, $value, 'Failed to gte in test ' . $testName);

        return $lastOperationResult;
    }

    /**
     * Set a variable into context from last operation
     *
     * @param $operation
     * @param $lastOperationResult
     * @param $context
     * @param $testName
     */
    public function operationSet($operation, $lastOperationResult, &$context, $testName)
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
     * @param $operation
     * @param $lastOperationResult
     * @param $testName
     */
    public function operationSkip($operation, $lastOperationResult, $testName)
    {
        if (is_object($operation) !== true ) {
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

            if (!isset($version[1]) || $version[1] === "" ) {
                $version[1] = PHP_INT_MAX;
            }

            if (version_compare(static::$esVersion, $version[0], '>=')  && version_compare(static::$esVersion, $version[1], '<=')) {
                static::markTestSkipped(sprintf('Skip test "%s", as version %s should be skipped (%s)', $testName, static::$esVersion, $operation->reason));
            }
        }

        return $lastOperationResult;
    }

    /**
     * Assert an expected error
     *
     * @param \Exception $exception
     * @param            $expectedError
     * @param            $testName
     *
     * @return array
     */
    private function assertException(\Exception $exception, $expectedError, $testName)
    {
        if (is_string($expectedError) && preg_match('#^/.+?/$#', $expectedError)) {
            static::assertRegExp($expectedError, $exception->getMessage(), 'Failed to catch error in test ' . $testName);
        } elseif ($exception instanceof Missing404Exception && $expectedError === 'missing') {
            static::assertTrue(true);
        } elseif ($exception instanceof Conflict409Exception && $expectedError === 'conflict') {
            static::assertTrue(true);
        } elseif ($exception instanceof Forbidden403Exception && $expectedError === 'forbidden') {
            static::assertTrue(true);
        } elseif ($exception instanceof RequestTimeout408Exception && $expectedError === 'request_timeout') {
            static::assertTrue(true);
        } elseif ($exception instanceof BadRequest400Exception && $expectedError === 'request') {
            static::assertTrue(true);
        } elseif ($exception instanceof ServerErrorResponseException && $expectedError === 'request') {
            static::assertTrue(true);
        } elseif ($exception instanceof \RuntimeException && $expectedError === 'param') {
            static::assertTrue(true);
        } else {
            static::assertContains($expectedError, $exception->getMessage());
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
    public function yamlProvider()
    {
        $this->yaml = new Yaml();
        $path = __DIR__ . '/../../../util/elasticsearch/rest-api-spec/src/main/resources/rest-api-spec/test';
        $files = [];

        $finder = new Finder();
        $finder->in($path);
        $finder->files();
        $finder->name('*.yaml');

        $filter = isset($_SERVER['TEST_CASE']) ? $_SERVER['TEST_CASE'] : null;

        /** @var SplFileInfo $file */
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
    private function mapEndpoint($method, $namespace = null)
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
     * @param $data
     * @param $context
     *
     * @return mixed
     */
    private function replaceWithContext($data, $context)
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
     * @param $result
     * @param $field
     *
     * @return mixed
     */
    private function resolveValue($result, $field, &$context)
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
     * @param $regex
     *
     * @return string
     */
    private function formatRegex($regex)
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
    private function splitDocument($file, $path, $filter = null)
    {
        $fileContent = file_get_contents($file);
        // cleanup some bad comments
        $fileContent = str_replace('"#', '" #', $fileContent);

        $documents = explode("---\n", $fileContent);
        $documents = array_filter($documents, function ($item) {
            return trim($item) !== '';
        });

        $documentsParsed = [];
        $setup = null;
        $setupSkip = false;
        $fileName = str_replace($path . '/', '', $file);

        if (array_key_exists($fileName, static::$skippedFiles)) {
            echo "Skipping: $fileName.  ".static::$skippedFiles[$fileName]."\n";
            return [];
        }

        if (null !== $filter && !preg_match('/'.preg_quote($filter, '/').'/', $fileName)) {
            return [];
        }
        $skip = false;
        $documentParsed = null;
        foreach ($documents as $documentString) {
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
            } else {
                $documentsParsed[] = [$documentParsed, $skip || $setupSkip, $setup, $fileName];
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

        // TODO ewwww...
        shell_exec('rm -rf /tmp/test_repo_create_1_loc');
        shell_exec('rm -rf /tmp/test_repo_restore_1_loc');
        shell_exec('rm -rf /tmp/test_cat_repo_1_loc');
        shell_exec('rm -rf /tmp/test_cat_repo_2_loc');
        shell_exec('rm -rf /tmp/test_cat_snapshots_1_loc');

        $this->waitForYellow();
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
                $this->log("Aborting test due to failure in clearing cluster.\n");
                $this->log(print_r($response, true));
                exit;
            }
        }
        curl_close($ch);
    }
}
