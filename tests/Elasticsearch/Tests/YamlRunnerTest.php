<?php
/**
 * User: zach
 * Date: 7/22/13
 * Time: 12:59 PM
 */

namespace Elasticsearch\Tests;
use Elasticsearch;
use Elasticsearch\Common\Exceptions\AlreadyExpiredException;
use Elasticsearch\Common\Exceptions\ClientErrorResponseException;
use Elasticsearch\Common\Exceptions\Conflict409Exception;
use Elasticsearch\Common\Exceptions\Forbidden403Exception;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Elasticsearch\Common\Exceptions\NoDocumentsToGetException;
use Elasticsearch\Common\Exceptions\RoutingMissingException;
use Elasticsearch\Common\Exceptions\ServerErrorResponseException;
use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
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

    /** @var  string */
    static $esVersion;


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


    public static function setUpBeforeClass()
    {
        $host = YamlRunnerTest::getHostEnvVar();
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
        $this->client = new Elasticsearch\Client();

    }

    private function clearCluster()
    {
        echo "\n>>>CLEARING<<<\n";
        $host = YamlRunnerTest::getHostEnvVar();
        $ch = curl_init($host);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

        $response = curl_exec($ch);
        curl_close($ch);

        $ch = curl_init($host."/_template/test");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

        $response = curl_exec($ch);
        curl_close($ch);

        $this->waitForYellow();
    }

    private function assertTruthy($value)
    {
        if (!$value) {
            $this->fail("Value is not truthy: ".print_r($value, true));
        }
    }

    private function assertFalsey($value)
    {
        if ($value) {
            $this->fail("Value is not falsey: ".print_r($value, true));
        }
    }

    private function waitForYellow()
    {
        $host = YamlRunnerTest::getHostEnvVar();
        $ch = curl_init("$host/_cluster/health");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

        $response = json_decode(curl_exec($ch), true);

        $counter = 0;
        while ($response['status'] === 'red') {
            sleep(0.05);
            $response = json_decode(curl_exec($ch), true);
            ++$counter;

            if ($counter > 100) {
                echo "Aborting test due to failure in clearing cluster.\n";
                print_r($response);
                exit;
            }
        }
        curl_close($ch);
    }


    public static function provider()
    {
        $path = dirname(__FILE__).'/../../../elasticsearch-api/test/';

        $files = array();
        $objects = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($path),
            RecursiveIteratorIterator::SELF_FIRST
        );

        foreach($objects as $object) {

            /** @var FilesystemIterator $object */
            if ($object->isFile() === true && $object->getFilename() !== 'README.asciidoc' && $object->getFilename() !== 'TODO.txt') {
                $files[] = array($object->getPathInfo()->getRealPath()."/".$object->getBasename());
            }
        }

        YamlRunnerTest::recursiveSort($files);
        return $files;

    }

    private static function recursiveSort(&$array) {
        foreach ($array as &$value) {
            if (is_array($value)) YamlRunnerTest::recursiveSort($value);
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
            echo "$testFile\n";
            ob_flush();
            $this->clearCluster();

            $fileData = file_get_contents($testFile);
            $documents = array_filter(explode("---", $fileData));

            foreach ($documents as $document) {
                try {
                    $document = $this->checkForTimestamp($testFile, $document);
                    $values = $this->yaml->parse($document, false, false, false);

                    echo "   ".key($values)."\n";
                    $ret    = $this->executeTestCase($values);

                } catch (ParseException $e) {
                    printf("Unable to parse the YAML string: %s", $e->getMessage());
                }
            }
        }


    }

    private function replaceWithStash($values, $stash)
    {
        if (count($stash) === 0) {
            return $values;
        }

        if (is_array($values) === true) {
            array_walk_recursive($values, function(&$item, $key) use ($stash) {
                    if (is_string($item) === true || is_numeric($item) === true) {
                        if (array_key_exists($item, $stash) == true) {
                            $item = $stash[$item];
                        }
                    }

                });
        } elseif (is_string($values) || is_numeric($values)) {
            if (array_key_exists($values, $stash) == true) {
                $values = $stash[$values];
            }
        }


        return $values;
    }

    private function executeTestCase($test)
    {
        $stash = array();
        $response = array();
        reset($test);
        $key = key($test);

        foreach ($test[$key] as $operators) {


            foreach ($operators as $operator => $settings) {
                echo "      >$operator: ";
                if ($operator === 'do') {
                    if (key($settings) === 'catch') {

                        $expectedError = str_replace("/", "", $settings['catch']);
                        next($settings);

                        echo "(catch: $expectedError) ";
                    } else {
                        $expectedError = null;
                    }

                    $method = key($settings);
                    $hash   = $settings[$method];

                    echo "$method\n";

                    $hash = $this->replaceWithStash($hash, $stash);

                    try {
                        $response = $this->callMethod($method, $hash);

                        //$this->waitForYellow();

                        if (isset($expectedError) === true) {
                            $this->fail("Expected Exception not thrown: $expectedError");
                        }
                    } catch (Missing404Exception $exception){
                        if ($expectedError === 'missing') {
                            $this->assertTrue(true);
                        } else {
                            $this->fail($exception->getMessage());
                        }
                        $response = array();

                    } catch (Conflict409Exception $exception) {
                        if ($expectedError === 'conflict') {
                            $this->assertTrue(true);
                        } else {
                            $this->fail($exception->getMessage());
                        }
                        $response = array();

                    } catch (Forbidden403Exception $exception) {
                        if ($expectedError === 'forbidden') {
                            $this->assertTrue(true);
                        } else {
                            $this->fail($exception->getMessage());
                        }
                        $response = array();

                    } catch (\Exception $exception) {
                        if ($expectedError === null) {
                            $this->fail($exception->getMessage());
                        } elseif (preg_match("/$expectedError/", $exception->getMessage()) === 1) {
                            $this->assertTrue(true);
                        } else {
                            $this->fail($exception->getMessage());
                        }
                        $response = array();

                    }

                } elseif($operator === 'match') {

                    $expected = $settings[key($settings)];
                    if (key($settings) === '') {
                        $actual = $response;
                    } else {
                        $actual   = $this->getNestedVar($response, key($settings));

                    }

                    $expected = $this->replaceWithStash($expected, $stash);
                    $actual = $this->replaceWithStash($actual, $stash);
                    $this->assertEquals($expected, $actual);

                    echo "\n";

                } elseif ($operator === "is_true") {
                    if (empty($settings) === true) {
                        $response = $this->replaceWithStash($response, $stash);
                        $this->assertTruthy($response);

                    } else {
                        $actual = $this->getNestedVar($response, $settings);
                        $actual = $this->replaceWithStash($actual, $stash);
                        $this->assertTruthy($actual);
                    }

                    echo "\n";

                } elseif ($operator === "is_false") {
                    if (empty($settings) === true) {
                        $response = $this->replaceWithStash($response, $stash);
                        $this->assertFalse($response);
                    } else {
                        $actual = $this->getNestedVar($response, $settings);
                        $actual = $this->replaceWithStash($actual, $stash);
                        $this->assertFalsey($actual);
                    }

                    echo "\n";

                } elseif ($operator === 'set') {
                    $stash['$'.$settings[key($settings)]] = $this->getNestedVar($response, key($settings));

                    echo "\n";

                } elseif ($operator === "length") {
                    $this->assertCount($settings[key($settings)], $this->getNestedVar($response, key($settings)));
                    echo "\n";

                } elseif ($operator === "lt") {
                    $this->assertLessThan($settings[key($settings)], $this->getNestedVar($response, key($settings)));
                    echo "\n";

                } elseif ($operator === "gt") {
                    $this->assertGreaterThan($settings[key($settings)], $this->getNestedVar($response, key($settings)));
                    echo "\n";
                } elseif ($operator === "skip") {
                    $version = $settings['version'];
                    $version = str_replace(" ", "", $version);
                    $version = explode("-", $version);
                    if (version_compare(YamlRunnerTest::$esVersion, $version[0]) >= 0
                        && version_compare($version[1], YamlRunnerTest::$esVersion) >= 0) {
                        echo "Skipping: ".$settings['reason']."\n";
                        return;
                    }
                }
                ob_flush();
            }
        }
    }

    private function callMethod($method, $hash)
    {
        $ret = array();

        $methodParts = explode(".", $method);

        if (count($methodParts) > 1) {
            $methodParts[1] = $this->snakeToCamel($methodParts[1]);
            $ret = $this->client->$methodParts[0]()->$methodParts[1]($hash);
        } else {
            $method = $this->snakeToCamel($method);
            $ret = $this->client->$method($hash);
        }



        return $ret;
    }

    private function snakeToCamel($val) {
        return str_replace(' ', '', lcfirst(ucwords(str_replace('_', ' ', $val))));
    }

    private function getNestedVar(&$context, $name) {
        $pieces = preg_split('/(?<!\\\\)\./', $name);
        foreach ($pieces as $piece) {
            $piece = str_replace('\.', '.', $piece);
            if (!is_array($context) || !array_key_exists($piece, $context)) {
                // error occurred
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

    private function getTimestampRegex()
    {
        return <<<EOF
        ~
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
        ~x
EOF;
    }

}