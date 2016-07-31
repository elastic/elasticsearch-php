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
    /** @var  Parser */
    private $yaml;

    /** @var  Elasticsearch\client */
    private $client;

    /** @var  Es version */
    private static $esVersion;

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
        $this->client = Elasticsearch\ClientBuilder::create()->setHosts([self::getHost()])->build();
    }

    /**
     * @dataProvider provider
     */
    public function testIntegration($testProcedure, $skip, $setupProcedure, $fileName)
    {
        if ($skip) {
            static::markTestIncomplete($testProcedure);
        }

        if (null !== $setupProcedure) {
            $this->processProcedure(current($setupProcedure), 'setup');
            $this->waitForYellow();
        }

        $this->processProcedure(current($testProcedure), key($testProcedure));
    }

    /**
     * Process a procedure
     *
     * @param $procedure
     * @param $name
     */
    public function processProcedure($procedure, $name)
    {
        $lastOperationResult = null;
        $context = [];

        foreach ($procedure as $operation) {
            $lastOperationResult = $this->processOperation($operation, $lastOperationResult, $context, $name);
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
            return $this->operationDo($operation->{$operationName}, $lastOperationResult, $context, $testName);
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

        // Check if a error must be catched
        if ('catch' === key($operation)) {
            $expectedError = current($operation);
            next($operation);
        }

        $endpointInfo = explode('.', key($operation));
        $endpointParams = $this->replaceWithContext(current($operation), $context);
        $caller = $this->client;
        $method = null;

        if (count($endpointInfo) === 1) {
            $method = Inflector::camelize($endpointInfo[0]);
        }

        if (count($endpointInfo) === 2) {
            $namespace = $endpointInfo[0];
            $method = Inflector::camelize($endpointInfo[1]);
            $caller = $caller->$namespace();
        }

        if (property_exists($endpointParams, 'ignore')) {
            $ignore = $endpointParams->ignore;
            unset($endpointParams->ignore);

            $endpointParams->client['ignore'] = $ignore;
        }

        if (null === $method) {
            self::markTestIncomplete(sprintf('Invalid do operation for test "%s"', $testName));
        }

        if (!method_exists($caller, $method)) {
            self::markTestIncomplete(sprintf('Method "%s" not implement in "%s"', $method, get_class($caller)));
        }

        try {
            return $caller->$method($endpointParams);
        } catch (\Exception $exception) {
            if (null !== $expectedError) {
                return $this->assertException($exception, $expectedError, $testName);
            }

            throw $exception;
        }
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
        static::assertFalse((bool)$this->resolveValue($lastOperationResult, $operation, $context), 'Failed to assert that a value is false in test ' . $testName);

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

        static::assertNotEquals(0, $value, 'Failed to assert that a value is true in test ' . $testName);
        static::assertNotFalse($value, 'Failed to assert that a value is true in test ' . $testName);
        static::assertNotNull($value, 'Failed to assert that a value is true in test ' . $testName);
        static::assertNotEquals('', 'Failed to assert that a value is true in test ' . $testName);

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

        if ($expected === '_description') {
        }

        if ($expected instanceof \stdClass) {
            // Avoid stdClass / array mismatch
            $expected = json_decode(json_encode($expected), true);
            $match = json_decode(json_encode($match), true);

            static::assertEquals($expected, $match, sprintf('Failed to match in test "%s"', $testName));
        } elseif (is_string($expected) && preg_match('#^/.+?/$#s', $expected)) {
            static::assertRegExp($this->formatRegex($expected), $match, sprintf('Failed to match in test "%s"', $testName));
        } else {
            static::assertEquals($expected, $match, sprintf('Failed to match in test "%s"', $testName));
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
        if (property_exists($operation, 'features')) {
            // No features supported
            static::markTestSkipped(sprintf('Feature(s) %s not supported in test "%s"', json_encode($operation->features), $testName));
        }

        if (property_exists($operation, 'version')) {
            $version = $operation->version;
            $version = str_replace(" ", "", $version);
            $version = explode("-", $version);

            if (isset($version[0]) && $version[0] == 'all') {
                static::markTestSkipped(sprintf('Skip test "%s", as all versions should be skipped (%s)', $testName, $operation->reason));
            }

            if (!isset($version[0])) {
                $version[0] = ~PHP_INT_MAX;
            }

            if (!isset($version[1])) {
                $version[1] = PHP_INT_MAX;
            }

            if (version_compare(static::$esVersion, $version[0]) >= 0 && version_compare($version[1], YamlRunnerTest::$esVersion) >= 0) {
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
    public function provider()
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

        if (is_string($data) && preg_match('/\$.+?$/', $data)) {
            if (!array_key_exists($data, $context)) {
                static::fail(sprintf('Cannot find variable %s in context', $data));
            }

            return $context[$data];
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
        $documents = explode("---\n", $fileContent);
        $documents = array_filter($documents, function ($item) {
            return trim($item) !== '';
        });

        $documentsParsed = [];
        $setup = null;
        $setupSkip = false;
        $fileName = str_replace($path . '/', '', $file);

        if (null !== $filter && !preg_match('/'.preg_quote($filter, '/').'/', $fileName)) {
            return [];
        }

        foreach ($documents as $documentString) {
            try {
                if (!$setupSkip) {
                    $documentParsed = $this->yaml->parse($documentString, false, false, true);
                    $skip = false;
                }
            } catch (ParseException $exception) {
                $documentParsed = sprintf(
                    "Cannot run this test as it cannot be parsed (%s) in file %s",
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
