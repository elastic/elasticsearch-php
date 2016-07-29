<?php

namespace Elasticsearch\Tests;

use Elasticsearch;
use Elasticsearch\Common\Exceptions\BadRequest400Exception;
use Elasticsearch\Common\Exceptions\Conflict409Exception;
use Elasticsearch\Common\Exceptions\Forbidden403Exception;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Elasticsearch\Common\Exceptions\RequestTimeout408Exception;
use Elasticsearch\Common\Exceptions\ServerErrorResponseException;
use FilesystemIterator;
use GuzzleHttp\Ring\Future\FutureArrayInterface;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionClass;
use Symfony\Component\Process\Exception\RuntimeException;
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

    /** @var string */
    private $log = "";

    /** @var  string */
    public static $esVersion;

    public static $testCounter = 0;

    /**
     * @return mixed
     */
    public static function getHostEnvVar()
    {
        if (isset($_SERVER['ES_TEST_HOST']) === true) {
            return $_SERVER['ES_TEST_HOST'];
        } else {
            echo 'Environment variable for elasticsearch test cluster (ES_TEST_HOST) not defined. Exiting yaml test';
            exit;
        }
    }

    private function log($text)
    {
        $this->log .= $text;
    }

    public static function setUpBeforeClass()
    {
        $host = YamlRunnerTest::getHostEnvVar();
        echo "Test Host: $host\n";

        $ch = curl_init($host);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response, true);
        YamlRunnerTest::$esVersion = $response['version']['number'];
        echo "ES Version: ".YamlRunnerTest::$esVersion."\n";
    }

    public function setUp()
    {
        $this->yaml = new Parser();
        $uri = parse_url($host = YamlRunnerTest::getHostEnvVar());

        $params['hosts'] = array($uri['host'].':'.$uri['port']);
        //$params['connectionParams']['timeout'] = 10000;
        //$params['logging'] = true;
        //$params['logLevel'] = \Psr\Log\LogLevel::DEBUG;

        $this->client = Elasticsearch\ClientBuilder::create()->setHosts($params['hosts'])->build();
        $this->log = "";
    }

    private function clearCluster()
    {
        $this->log("\n>>>CLEARING<<<\n");
        $host = YamlRunnerTest::getHostEnvVar();
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

        // TODO ewwww...
        shell_exec('rm -rf /tmp/test_repo_create_1_loc');
        shell_exec('rm -rf /tmp/test_repo_restore_1_loc');
        shell_exec('rm -rf /tmp/test_cat_repo_1_loc');
        shell_exec('rm -rf /tmp/test_cat_repo_2_loc');
        shell_exec('rm -rf /tmp/test_cat_snapshots_1_loc');

        $this->waitForYellow();
    }

    private function assertTruthy($value, $settings)
    {
        $this->log("\n         |assertTruthy($settings): ".json_encode($value)."\n");
        if (isset($value) === false || $value === 0 || $value === false || $value === null || $value === '') {
            $this->fail("Value is not truthy: ".print_r($value, true) . "\n" . $this->log);
        }
    }

    private function assertFalsey($value, $settings)
    {
        $this->log("\n         |assertFalsey($settings): ".json_encode($value)."\n");
        if (!(isset($value) === false || $value === 0 || $value === false || $value === null || $value === '' || count($value) === 0)) {
            $this->fail("Value is not falsey: ".print_r($value, true) . "\n" . $this->log);
        }
    }

    private function assertRegex($pattern, $actual)
    {
        $pattern = trim($pattern);

        // PHP doesn't like unescaped forward slashes
        $pattern = substr($pattern, 1, strlen($pattern)-2);
        $pattern = str_replace('/', '\/', $pattern);
        $pattern = "/$pattern/mx";
        $this->log("\n         |> actual: $actual\n");
        $this->log("\n         |> pattern: $pattern\n");
        $result = preg_match($pattern, $actual, $matches);
        $this->assertEquals(1, $result, $this->log);
    }

    private function waitForYellow()
    {
        $host = YamlRunnerTest::getHostEnvVar();
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

    public static function provider()
    {
        // Dirty workaround for the path change in Core
        $path = dirname(__FILE__).'/../../../util/elasticsearch/rest-api-spec/test/';
        if (file_exists($path) !== true) {
            $path = dirname(__FILE__).'/../../../util/elasticsearch/rest-api-spec/src/main/resources/rest-api-spec/test';
        }

        $files = array();
        $objects = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($path),
            RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($objects as $object) {
            /** @var FilesystemIterator $object */
            if ($object->isFile() === true && $object->getFilename() !== 'README.asciidoc' && $object->getFilename() !== 'TODO.txt') {
                $path = $object->getPathInfo()->getRealPath()."/".$object->getBasename();
                $files[] = array($path);
            }
        }

        YamlRunnerTest::recursiveSort($files);

        return $files;
    }

    private static function recursiveSort(&$array)
    {
        foreach ($array as &$value) {
            if (is_array($value)) {
                YamlRunnerTest::recursiveSort($value);
            }
        }

        return sort($array);
    }

    /**
     * @dataProvider provider
     * @group yaml
     */
    public function testYaml()
    {
        //* @runInSeparateProcess

        $files = func_get_args();

        foreach ($files as $testFile) {
            $counter = YamlRunnerTest::$testCounter;

            $this->log("--------------------------------------------------------------------------\n");
            $this->log("#$counter : $testFile\n");
            YamlRunnerTest::$testCounter += 1;

            if ($this->skipTest($testFile) === true) {
                $this->markTestSkipped('Skipped due to skip-list');
            }

            if (isset($_SERVER['TEST_CASE']) === true && !empty($_SERVER['TEST_CASE'])) {
                if ($_SERVER['TEST_CASE'] !== $testFile) {
                    $this->markTestSkipped('Skipping, these are not the tests you\'re looking for...');
                }
            }

            $fileData = file_get_contents($testFile);
            $documents = array_filter(explode("---", $fileData));

            $yamlDocs = array();
            $setup = null;

            foreach ($documents as $document) {
                try {
                    $tDoc = array();
                    $tDoc['document'] = $this->checkForTimestamp($testFile, $document);
                    $tDoc['document'] = $this->checkForList($tDoc['document']);
                    $tDoc['document'] = $this->checkForEmptyProperty($testFile, $tDoc['document']);
                    $tDoc['values'] = $this->yaml->parse($tDoc['document'], false, false, true);

                    if (key($tDoc['values']) === 'setup') {
                        $setup = $tDoc['values'];
                    } else {
                        $yamlDocs[] = $tDoc;
                    }
                } catch (ParseException $e) {
                    $this->fail(sprintf("Unable to parse the YAML string: %s in file %s", $e->getMessage(), $testFile));
                }
            }

            foreach ($yamlDocs as $doc) {
                $ts = date('c');
                $this->log("   ".key($doc['values'])." [$ts] - Future: false\n");

                $this->clearCluster();

                if ($setup !== null) {
                    try {
                        $this->executeTestCase($setup, $testFile, false);
                    } catch (SetupSkipException $e) {
                        break;  //exit this test since we skipped in the setup
                    }
                }
                $this->executeTestCase($doc['values'], $testFile, false);

                $this->log("Success\n\n");
            }
        }
    }

    /**
     * @dataProvider provider
     * @group yaml
     */
    public function testFutureModeYaml()
    {
        //* @runInSeparateProcess

        $files = func_get_args();

        foreach ($files as $testFile) {
            $this->log("$testFile\n");

            if ($this->skipTest($testFile) === true) {
                $this->markTestSkipped('Skipped due to skip-list');
            }

            if (isset($_SERVER['TEST_CASE']) === true && !empty($_SERVER['TEST_CASE'])) {
                if ($_SERVER['TEST_CASE'] !== $testFile) {
                    $this->markTestSkipped('Skipping, these are not the tests you\'re looking for...');
                }
            }

            $fileData = file_get_contents($testFile);
            $containsExist = strpos($fileData, "exists");
            $documents = array_filter(explode("---", $fileData));

            $yamlDocs = array();
            $setup = null;
            foreach ($documents as $document) {
                try {
                    $tDoc = array();
                    $tDoc['document'] = $this->checkForTimestamp($testFile, $document);
                    $tDoc['document'] = $this->checkForList($tDoc['document']);
                    $tDoc['document'] = $this->checkForEmptyProperty($testFile, $tDoc['document']);
                    $tDoc['values'] = $this->yaml->parse($tDoc['document'], false, false, true);

                    if (key($tDoc['values']) === 'setup') {
                        $setup = $tDoc['values'];
                    } else {
                        $yamlDocs[] = $tDoc;
                    }
                } catch (ParseException $e) {
                    $this->fail(sprintf("Unable to parse the YAML string: %s in file %s", $e->getMessage(), $testFile));
                }
            }

            foreach ($yamlDocs as $doc) {
                $ts = date('c');
                $this->log("   ".key($doc['values'])." [$ts] - Future: true\n");

                if ($containsExist !== false) {
                    $this->markTestSkipped('Test contains `exist`, not easily tested in async. Skipping.');
                }

                $this->clearCluster();

                if ($setup !== null) {
                    try {
                        $this->executeTestCase($setup, $testFile, false);
                    } catch (SetupSkipException $e) {
                        break;  //exit this test since we skipped in the setup
                    }
                }
                $this->executeTestCase($doc['values'], $testFile, true);
            }
        }
    }

    public static function replaceWithStash($values, $stash)
    {
        if (count($stash) === 0) {
            return $values;
        }

        if (is_array($values) === true) {
            array_walk_recursive($values, function (&$item, $key) use ($stash) {
                if (is_string($item) === true) {
                    if (array_key_exists($item, $stash) == true) {
                        $item = $stash[$item];
                    }
                } elseif (is_object($item) === true) {
                    $tItem = json_decode(json_encode($item), true);

                    // Have to make sure we don't convert empty objects ( {} ) into arrays
                    if (count($tItem) > 0) {
                        $item = YamlRunnerTest::replaceWithStash($item, $stash);
                    }
                }

            });
        } elseif (is_string($values) || is_numeric($values)) {
            if (array_key_exists($values, $stash) == true) {
                $values = $stash[$values];
            } else {
                // Couldn't find the entire value, try a substring replace
                foreach ($stash as $k => $v) {
                    $values = str_replace($k, $v, $values);
                }
            }
        } elseif (is_object($values) === true) {
            $values = json_decode(json_encode($values), true);
            $values = YamlRunnerTest::replaceWithStash($values, $stash);
        }

        return $values;
    }

    private function executeTestCase($test, $testFile, $future)
    {
        $stash = array();
        $response = array();
        reset($test);
        $key = key($test);

        foreach ($test[$key] as $operators) {
            foreach ($operators as $operator => $settings) {
                $this->log("      > $operator: ");
                if ($operator === 'do') {
                    if (key($settings) === 'catch') {
                        $catch = $this->getValue($settings, 'catch');
                        $expectedError = str_replace("/", "", $catch);
                        next($settings);

                        $this->log("(catch: $expectedError) ");
                    } else {
                        $expectedError = null;
                    }

                    $method = key($settings);
                    $hash = $this->getValue($settings, $method);

                    $this->log("\n         |$method\n");


                    $hash = YamlRunnerTest::replaceWithStash($hash, $stash);


                    try {
                        $this->log("         |".json_encode($hash)."\n");
                        ob_flush();
                        $response = $this->callMethod($method, $hash, $future);
                        $this->log("         |".json_encode($response)."\n");

                        //$this->waitForYellow();

                        if (isset($expectedError) === true) {
                            $this->fail("Expected Exception not thrown: $expectedError");
                        }
                    } catch (\Exception $exception) {
                        if ($expectedError === null) {
                            $this->fail($exception->getMessage());
                        }

                        $response = $this->handleCaughtException($exception, $expectedError);
                    }
                } elseif ($operator === 'match') {
                    $expected = $this->getValue($settings, key($settings));
                    if (key($settings) === '') {
                        $actual = $response;
                    } elseif (key($settings) === '$body') {
                        $actual = $response;
                    } else {
                        $path = YamlRunnerTest::replaceWithStash(key($settings), $stash);
                        $actual = $this->getNestedVar($response, $path);
                    }

                    $expected = YamlRunnerTest::replaceWithStash($expected, $stash);
                    $actual = YamlRunnerTest::replaceWithStash($actual, $stash);
                    if ($actual != $expected) {
                        //Holy janky batman
                        if (is_array($actual) && count($actual) == 0) {
                            $actual = (object) $actual;
                        } else {
                            $actual = json_decode(json_encode($actual));
                        }

                        $expected = json_decode(json_encode($expected));
                    }

                    if ($this->checkForRegex($expected) === true) {
                        $this->assertRegex($expected, $actual);
                    } else {
                        $this->assertEquals($expected, $actual, $this->log);
                    }

                    //$this->assertSame()

                    $this->log("\n");
                } elseif ($operator === "is_true") {
                    if (empty($settings) === true) {
                        $response = YamlRunnerTest::replaceWithStash($response, $stash);
                        $this->assertTruthy($response, $settings);
                    } else {
                        $settings = YamlRunnerTest::replaceWithStash($settings, $stash);
                        $this->log("settings after replace: ");
                        //print_r($settings);
                        $this->log("\n");
                        $actual = $this->getNestedVar($response, $settings);
                        $actual = YamlRunnerTest::replaceWithStash($actual, $stash);
                        $this->assertTruthy($actual, $settings);
                    }

                    $this->log("\n");
                } elseif ($operator === "is_false") {
                    if (empty($settings) === true) {
                        $response = YamlRunnerTest::replaceWithStash($response, $stash);
                        $this->assertFalsey($response, $settings);
                    } else {
                        $actual = $this->getNestedVar($response, $settings);
                        $actual = YamlRunnerTest::replaceWithStash($actual, $stash);
                        $this->assertFalsey($actual, $settings);
                    }

                    $this->log("\n");
                } elseif ($operator === 'set') {
                    $stashKey = $this->getValue($settings, key($settings));
                    $this->log(" $stashKey\n");
                    $stash["$$stashKey"] = $this->getNestedVar($response, key($settings));
                    $this->log("Stash updated.  Total stash now: \n");
                    //print_r($stash);
                    $this->log("\n");
                } elseif ($operator === "length") {
                    $expectedCount = $this->getValue($settings, key($settings));
                    $this->assertCount($expectedCount, $this->getNestedVar($response, key($settings)), $this->log);
                    $this->log("\n");
                } elseif ($operator === "lt") {
                    $expectedCount = $this->getValue($settings, key($settings));
                    $this->assertLessThan($expectedCount, $this->getNestedVar($response, key($settings)), $this->log);
                    $this->log("\n");
                } elseif ($operator === "gt") {
                    $expectedCount = $this->getValue($settings, key($settings));
                    $this->assertGreaterThan($expectedCount, $this->getNestedVar($response, key($settings)), $this->log);
                    $this->log("\n");
                } elseif ($operator === "skip") {
                    if (isset($settings['version']) === true) {
                        $version = $settings['version'];
                        $version = str_replace(" ", "", $version);
                        $version = explode("-", $version);

                        if (isset($version[0]) && $version[0] == 'all') {
                            $this->log("Skipping: all\n");
                            if ($key == 'setup') {
                                throw new SetupSkipException();
                            }
                            return;
                        }
                        if (!isset($version[0])) {
                            $version[0] = ~PHP_INT_MAX;
                        }
                        if (!isset($version[1])) {
                            $version[1] = PHP_INT_MAX;
                        }
                        if (version_compare(YamlRunnerTest::$esVersion, $version[0]) >= 0
                            && version_compare($version[1], YamlRunnerTest::$esVersion) >= 0) {
                            $this->log("Skipping: ".$settings['reason']."\n");

                            if ($key == 'setup') {
                                throw new SetupSkipException();
                            }

                            return;
                        }
                    } elseif (isset($settings['features']) === true) {
                        $feature = $settings['features'];
                        $whitelist = array();

                        if (array_search($feature, $whitelist) === false) {
                            $this->log("Unsupported optional feature: " . print_r($feature, true) . "\n");

                            return;
                        }
                    }
                }
            }
        }
    }

    private function handleCaughtException(\Exception $exception, $expectedError)
    {
        $reflect = new ReflectionClass($exception);
        $caught = $reflect->getShortName();
        $passed = false;


        if ($caught === 'Missing404Exception' && $expectedError === 'missing') {
            $passed = true;
        } elseif ($caught === 'Conflict409Exception' && $expectedError === 'conflict') {
            $passed = true;
        } elseif ($caught === 'Missing404Exception' && $expectedError === 'missing') {
            $passed = true;
        } elseif ($caught === 'Forbidden403Exception' && $expectedError === 'forbidden') {
            $passed = true;
        } elseif ($caught === 'RequestTimeout408Exception' && $expectedError === 'request_timeout') {
            $passed = true;
        } elseif ($caught === 'BadRequest400Exception' && $expectedError === 'request') {
            $passed = true;
        } elseif ($caught === 'ServerErrorResponseException' && $expectedError === 'request') {
            $passed = true;
        } elseif ($caught === 'RuntimeException' && $expectedError === 'param') {
            $passed = true;
        } elseif ($caught === 'Missing404Exception' && $expectedError === 'missing') {
            $passed = true;
        }

        if ($passed === false) {
            if (YamlRunnerTest::checkExceptionRegex($expectedError, $exception)) {
                $passed = true;
            } elseif ($exception->getPrevious() !== null) { // try second level
                if (YamlRunnerTest::checkExceptionRegex($expectedError, $exception->getPrevious())) {
                    $passed = true;
                }
            }
        }

        if ($passed === true) {
            $this->assertTrue(true, $this->log);
            if ($exception->getPrevious() !== null) {
                return json_decode($exception->getPrevious()->getMessage(), true);
            }
            return json_decode($exception->getMessage(), true);
        }

        //$this->fail("Tried to match exception, failed.  Exception: ".$exception->getMessage());
        throw $exception;
    }


    private static function checkExceptionRegex($expectedError, \Exception $exception)
    {
        return isset($expectedError) === true && preg_match("/$expectedError/", $exception->getMessage()) === 1;
    }

    private function callMethod($method, $hash, $future)
    {
        $ret = array();

        $methodParts = explode(".", $method);

        if (is_object($hash)) {
            $hash = json_decode(json_encode($hash), true);
        }

        if ($future === true) {
            $hash['client'] = [];
            $hash['client']['future'] = true;
        }

        if (isset($hash['ignore']) === true) {
            $hash['client']['ignore'] = $hash['ignore'];
            unset($hash['ignore']);
        }

        if (count($methodParts) > 1) {
            $methodName = $methodParts[0];
            $methodArgs = $this->snakeToCamel($methodParts[1]);
            $ret = $this->client->$methodName()->$methodArgs($hash);
        } else {
            $method = $this->snakeToCamel($method);
            $ret = $this->client->$method($hash);
        }

        if ($future && $ret instanceof FutureArrayInterface) {
            $ret = $ret->wait();
        }

        return $ret;
    }

    private function getValue($a, $key)
    {
        if (is_array($a)) {
            return $a[$key];
        } elseif (is_object($a)) {
            return $a->$key;
        } else {
            die('non-array, non-object in getValue()');
        }
    }

    private function snakeToCamel($val)
    {
        return str_replace(' ', '', lcfirst(ucwords(str_replace('_', ' ', $val))));
    }

    private function getNestedVar(&$context, $name)
    {
        $pieces = preg_split('/(?<!\\\\)\./', $name);
        foreach ($pieces as $piece) {
            $piece = str_replace('\.', '.', $piece);
            if (!is_array($context) || !array_key_exists($piece, $context)) {
                // error occurred
                $this->log("Could not find nested property [$piece] in context");//.print_r($context, true);
                $this->log("\nReturning null...");
                return null;
            }
            $context = &$context[$piece];
        }

        return $context;
    }

    /**
     * Really ugly hack until upstream Yaml date parsing is fixed
     * See: https://github.com/symfony/symfony/issues/8580
     * TODO
     *
     * @param $file
     * @param $document
     *
     * @return mixed
     */
    private function checkForTimestamp($file, $document)
    {
        $isMatch = preg_match($this->getTimestampRegex(), $document, $matches);
        if ($isMatch) {
            $newTime = new \DateTime($matches[0].'GMT');
            $document = preg_replace($this->getTimestampRegex(), $newTime->format('U') * 1000, $document);
        }

        return $document;
    }

    /**
     * Hack to rewrite the command `task.list` into `task.get`, since list is a reserved
     * word in PHP. :/
     *
     * @param $file
     * @return mixed
     */
    private function checkForList($document)
    {
        return str_replace("tasks.list", "tasks.get", $document);
    }

    private function checkForEmptyProperty($file, $document)
    {
        $pattern = "/{.*?('').*?:.*?{/";

        $document = preg_replace($pattern, '{ $body: {', $document);

        return $document;
    }

    private function checkForRegex($value)
    {
        if (is_string($value) !== true) {
            return false;
        }

        $value = trim($value);
        if (substr($value, 0, 1) === '/' && substr($value, strlen($value) - 1, 1) === '/') {
            return true;
        } else {
            return false;
        }
    }

    private function getTimestampRegex()
    {
        return <<<EOF
        ~[^"]
        (?P<year>[0-9][0-9][0-9][0-9])
        -(?P<month>[0-9][0-9]?)
        -(?P<day>[0-9][0-9]?)
        (?:(?:[Tt]|[ \t]+)
        (?P<hour>[0-9][0-9]?)
        :(?P<minute>[0-9][0-9])
        :(?P<second>[0-9][0-9])
        (?:\.(?P<fraction>[0-9]*))?
        (?:[ \t]*(?P<tz>Z|(?P<tz_sign>[-+])(?P<tz_hour>[0-9][0-9]?)
        (?::(?P<tz_minute>[0-9][0-9]))?))?)?
        [^"]~x
EOF;
    }

    private function skipTest($path)
    {
        //all_path_options
        $skipList = array(
            'cat.nodeattrs/10_basic.yaml',
            'cat.repositories/10_basic.yaml'
        );

        foreach ($skipList as $skip) {
            if (strpos($path, $skip) !== false) {
                return true;
            }
        }

        //TODO make this more generic
        if (version_compare(YamlRunnerTest::$esVersion, "1.4.0", "<")) {
            // Breaking changes in null alias
            $skipList = array(
                'indices.delete_alias/all_path_options.yaml',
                'indices.put_alias/all_path_options.yaml'
            );

            foreach ($skipList as $skip) {
                if (strpos($path, $skip) !== false) {
                    return true;
                }
            }
        }

        return false;
    }
}

class SetupSkipException extends \Exception
{
}
