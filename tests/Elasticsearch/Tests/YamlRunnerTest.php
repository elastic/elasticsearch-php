<?php
/**
 * User: zach
 * Date: 7/22/13
 * Time: 12:59 PM
 */

namespace Elasticsearch\Tests;
use Elasticsearch;
use Elasticsearch\Common\Exceptions\ClientErrorResponseException;
use Elasticsearch\Common\Exceptions\Conflict409Exception;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Elasticsearch\Common\Exceptions\ServerErrorResponseException;
use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Parser;

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

    public function setUp()
    {
        echo "\n>>>CLEARING<<<\n";
        $ch = curl_init("http://localhost:9200/_all");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

        curl_exec($ch);
        curl_close($ch);

        $this->yaml = new Parser();
        $this->client = new Elasticsearch\Client();

        $this->waitForYellow();
    }

    private function assertTruthy($value)
    {
        if (!$value) {
            $this->fail("Value is not truthy: ".print_r($value, true));
        }
    }

    private function waitForYellow()
    {
        $ch = curl_init("http://localhost:9200/_cluster/health");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

        $response = json_decode(curl_exec($ch), true);

        while ($response['status'] === 'red') {
            sleep(0.05);
            $response = json_decode(curl_exec($ch), true);
        }
        curl_close($ch);
    }


    public static function provider()
    {
        $path = '../../../../elasticsearch-rest-api-spec/test/';

        $files = array();
        $objects = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($path),
            RecursiveIteratorIterator::SELF_FIRST
        );

        foreach($objects as $object) {

            /** @var FilesystemIterator $object */
            if ($object->isFile() === true && $object->getFilename() !== 'README.asciidoc') {
                $files[$object->getPathInfo()->getRealPath()][] = $object->getPathInfo()->getRealPath()."/".$object->getBasename();
            }
        }

        YamlRunnerTest::recursiveSort($files);
        return $files;

    }

    private static function recursiveSort(&$array) {
        foreach ($array as &$value) {
            if (is_array($value)) YamlRunnerTest::recursiveSort($value);
        }
        return asort($array);
    }


    /**
     * @dataProvider provider
     * @param array $testFile
     */
    public function testYaml($testFile)
    {
        //* @runInSeparateProcess


        echo "$testFile\n";

        $fileData = file_get_contents($testFile);
        $documents = array_filter(explode("---", $fileData));

        foreach ($documents as $document) {
            try {
                $values = $this->yaml->parse($document);


                echo "   ".key($values)."\n";
                $ret    = $this->executeTestCase($values);

            } catch (ParseException $e) {
                printf("Unable to parse the YAML string: %s", $e->getMessage());
            }
        }

    }


    private function executeTestCase($test)
    {
        if (key($test) === 'Basic multi-search') {
            echo "hi";
        }

        $stash = array();
        $response = array();
        reset($test);
        $key = key($test);

        foreach ($test[$key] as $operators) {


            foreach ($operators as $operator => $settings) {
                echo "      >$operator: ";
                if ($operator === 'do') {
                    if (key($settings) === 'catch') {

                        $expectedError = $settings['catch'];
                        next($settings);

                        echo "(catch: $expectedError) ";
                    } else {
                        $expectedError = null;
                    }

                    $method = key($settings);
                    $hash   = $settings[$method];

                    echo "$method\n";

                    array_walk_recursive($hash, function(&$item, $key) use ($stash) {
                            if (is_string($item) === true || is_numeric($item) === true) {
                                if (array_key_exists($item, $stash) == true) {
                                    $item = $stash[$item];
                                }
                            }

                        });

                    try {
                        $response = $this->callMethod($method, $hash);

                        $this->waitForYellow();

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
                        
                    }

                } elseif($operator === 'match') {

                    $expected = $settings[key($settings)];
                    if (key($settings) === '') {
                        $actual = $response;
                    } else {
                        $actual   = $this->getNestedVar($response, key($settings));
                    }

                    $this->assertEquals($expected, $actual);

                    echo "\n";

                } elseif ($operator === "is_true") {
                    if (empty($settings) === true) {
                        $this->assertTruthy($response);

                    } else {
                        $actual = $this->getNestedVar($response, $settings);
                        $this->assertTruthy($actual);
                    }

                    echo "\n";

                } elseif ($operator === "is_false") {
                    if (empty($settings) === true) {
                        $this->assertFalse($response);
                    } else {
                        $actual = $this->getNestedVar($response, $settings);
                        $this->assertTruthy($actual);
                    }

                    echo "\n";

                } elseif ($operator === 'set') {
                    //if (($response[$settings])
                    //$this->assertCount($settings[key($settings)], $response[$settings]);
                    $stash['$'.$settings[key($settings)]] = $response[key($settings)];

                    echo "\n";

                } elseif ($operator === "length") {
                    $this->assertCount($settings[key($settings)], $response[key($settings)]);
                    echo "\n";

                } elseif ($operator === "lt") {
                    $this->assertLessThan($settings[key($settings)], $response[key($settings)]);
                    echo "\n";

                } elseif ($operator === "gt") {
                    $this->assertGreaterThan($settings[key($settings)], $response[key($settings)]);
                    echo "\n";
                } elseif ($operator === "skip") {

                } else {
                    print_r($operators);
                    echo "\n";
                }
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

}