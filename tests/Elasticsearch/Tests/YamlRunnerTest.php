<?php
/**
 * User: zach
 * Date: 7/22/13
 * Time: 12:59 PM
 */

namespace Elasticsearch\Tests;
use Elasticsearch;
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
        $ch = curl_init("http://localhost:9200/_all");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

        curl_exec($ch);
        curl_close($ch);

        $this->yaml = new Parser();
        $this->client = new Elasticsearch\Client();
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


        print_r($testFile);

        $fileData = file_get_contents($testFile);
        $documents = array_filter(explode("---", $fileData));

        foreach ($documents as $document) {
            try {
                $values = $this->yaml->parse($document);
                $ret    = $this->executeTestCase($values);

            } catch (ParseException $e) {
                printf("Unable to parse the YAML string: %s", $e->getMessage());
            }
        }

    }


    private function executeTestCase($test)
    {
        $stash = array();
        $response = array();
        reset($test);

        foreach ($test[key($test)] as $operators) {


            foreach ($operators as $operator => $settings) {
                if ($operator === 'do') {
                    $method = key($settings);
                    $hash   = $settings[$method];

                    try {
                        $response = $this->callMethod($method, $hash);
                    } catch (\Exception $exception) {
                        $this->fail($exception->getMessage());
                    }

                } elseif($operator === 'match') {
                    $expected = $settings[key($settings)];
                    $actual   = $response[key($settings)];
                    $this->assertEquals($expected, $actual);

                } elseif ($operator === "is_true") {
                    $actual = $response[$settings];
                    $this->assertTrue($actual);

                } elseif ($operator === "is_false") {
                    $actual = $response[$settings];
                    $this->assertFalse($actual);

                }elseif ($operator === 'set') {
                    $stash[$settings[key($settings)]] = 1;

                } else {
                    print_r($operators);
                }
            }
        }
    }

    private function callMethod($method, $hash)
    {
        $ret = array();

        $methodParts = explode(".", $method);
        try {
            if (count($methodParts) > 1) {
                $methodParts[1] = $this->snakeToCamel($methodParts[1]);
                $ret = $this->client->$methodParts[0]()->$methodParts[1]($hash);
            } else {
                $ret = $this->client->$method($hash);
            }
        } catch (\Exception $exception) {
            throw new \Exception($exception);
        }


        return $ret;
    }

    private function snakeToCamel($val) {
        return str_replace(' ', '', lcfirst(ucwords(str_replace('_', ' ', $val))));
    }

}