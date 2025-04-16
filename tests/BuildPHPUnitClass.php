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

namespace Elastic\Elasticsearch\Tests;

use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\Exception\ClientResponseException;
use Exception;
use Nette\PhpGenerator\PhpNamespace;
use PHPUnit\Framework\TestCase;
use stdClass;
use Throwable;

use function yaml_parse;

/**
 * Build a PHPUnit test class based on the Elasticsearch Test Suite specification
 * 
 * @link https://github.com/elastic/elasticsearch/tree/main/rest-api-spec/src/yamlRestTest/resources/rest-api-spec/test
 */
class BuildPHPUnitClass
{
    protected mixed $yaml;

    public function __construct(private string $filename, private string $testGroup, private string $namespace)
    {
        // parse the YAML content
        $content = file_get_contents($filename);
        $content = str_replace(' y:', " 'y':", $content); // replace y: with 'y': due the y/true conversion in YAML 1.1
        $content = str_replace(' n:', " 'n':", $content); // replace n: with 'n': due the n/false conversion in YAML 1.1
        try {
            $this->yaml = yaml_parse($content, -1, $ndocs, [
                YAML_MAP_TAG => function($value, $tag, $flags) {
                    return empty($value) ? new stdClass : $value;
                }
            ]);
        } catch (Throwable $e) {
            throw new Exception(sprintf(
                "YAML parse error file %s: %s",
                $filename,
                $e->getMessage()
            ));
        }
    }

    public function build(): ?PhpNamespace
    {
        if (!$this->yaml[0]['requires'][$this->testGroup]) {
            return null;
        }

        $className = sprintf("%sTest", $this->normalizeFileName($this->filename));
        $namespace = new PhpNamespace(sprintf("Elastic\Elasticsearch\Tests\%s", $this->namespace));

        $namespace
            ->addUse(Utility::class)
            ->addUse(Client::class)
            ->addUse(ClientResponseException::class);

        $class = $namespace->addClass($className);
        $class
            ->setFinal()
            ->setExtends(TestCase::class)
            ->addComment(sprintf('@group %s', $this->testGroup))
            ->addComment('@generated This file is generated, please do not edit'); 
        
        $class
            ->addProperty('client')
            ->setStatic(true)
            ->setPrivate()
            ->setType(Client::class);

        $class->addMethod('setUpBeforeClass')
            ->setBody("self::\$client = Utility::getClient();\n")
            ->setStatic(true)
            ->setReturnType('void');

        foreach ($this->yaml as $items) {
            foreach ($items as $key => $values) {
                switch ($key) {
                    case 'setup':
                        $class
                            ->addMethod('setUp')
                            ->setBody($this->buildBody($values))
                            ->setReturnType('void');
                        break;
                    case 'teardown':
                        $class
                            ->addMethod('tearDown')
                            ->setBody($this->buildBody($values))
                            ->setReturnType('void');
                        break;
                    case 'requires':
                        continue 2;
                    default:
                        $class
                            ->addMethod('test' . $this->normalizeClassName($key))
                            ->setBody($this->buildBody($values));
                }
            }
        }
        
        return $namespace->add($class);
    }

    protected function buildBody(array $body): string
    {
        $output = '';
        foreach ($body as $item) {
            $action = key($item);
            if (method_exists($this, $action)) {
                $output .= $this->$action(current($item));
            } else {
                throw new Exception(sprintf(
                    "I don't have the implementation of the %s feature in %s",
                    $action,
                    $this->filename
                ));
            }
        }
        return $output;
    }

    protected function normalizeFileName(string $filename): string
    {
        $number = '';
        if (preg_match('/^(\d+)_/', basename($filename, '.yml'), $matches)) {
            $number = $matches[1];
        }
        $output = preg_replace('/[0-9]/', '', basename($filename, '.yml'));
        $output = str_replace('_', '', ucwords($output, '_'));
        return ucfirst($output.$number);
    }

    protected function normalizeClassName(string $name): string
    {
        $output = str_replace(['.', ' ', ',','(',')','_', '|', '-'], '', ucwords($name, '.,_(- '));
        return ucfirst($output);
    }

    protected function normalizeFunctionName(string $name): string
    {
        return lcfirst(str_replace('_', '', ucwords($name, '_')));
    }

    /**
     * Parse the response key and returns the PHP code to
     * get the key from the $response
     * Examples:
     * parseValue('events.0.event_id') => $response['events'][0]['event_id']
     * parseValue('nodes.$master.modules') => $response['nodes'][$master]['master]]['modules']
     */
    protected function parseValue(string $var): string
    {
        if ($var === '$body') {
            return '$response->getBody()->getContents()';
        }
        if ($var[0] === '$') {
            list($first, $var) = explode('.', $var, 2);
            $output = $first;
        } else {
            $output = '$response';
        }
        foreach (explode('.', $var) as $item) {
            if (is_numeric($item)) {
                $output .= sprintf('[%d]', $item);
            } elseif (is_string($item) && !empty($item)) {
                if (substr($item, 0, 1) === '$') {
                    $output .= sprintf("[%s]", $item);
                } else {
                    $output .= sprintf('[\'%s\']', $item);
                }
            }
        }
        return $output;
    }

    protected function arrayToPhpCode(array|string|stdClass $arr): string {
        $parts = [];
    
        if (is_string($arr)) {
            return var_export($arr, true);
        }
        if ($arr instanceof stdClass) {
            return '[(object)[]]';
        }
        foreach ($arr as $key => $value) {
            // Format the key
            $formattedKey = is_numeric($key) ? $key : "'" . addslashes($key) . "'";
    
            // Handle the value recursively
            if (is_array($value)) {
                $formattedValue = $this->arrayToPhpCode($value); // recursion
            } elseif (is_string($value) && str_starts_with($value, '$')) {
                $formattedValue = $value; // treat as variable
            } else {
                $formattedValue = var_export($value, true);
            }
    
            $parts[] = "{$formattedKey} => {$formattedValue}";
        }
    
        return '[' . implode(', ', $parts) . ']';
    }

    /**
     * ----------------------------------------------------------------------------------------
     * ACTIONS FOR TESTS
     * ----------------------------------------------------------------------------------------
     */

    protected function do(array $actions): string
    {
        $output = '';
        // catch
        if (isset($actions['catch'])) {
            $catch = $actions['catch'];
            $output = "try {\n";
            unset($actions['catch']);
        }
        // headers
        if (isset($actions['headers'])) {
            // @todo implement the headers
            return "\$this->markTestSkipped('Headers feature not supported');\n";
        }
        foreach ($actions as $endpoint => $params) {
            if (is_array($params)) {
                // ignore
                if (isset($params['ignore'])) {
                    if (is_array($params['ignore'])) {
                        $ignore = implode(',', $params['ignore']);
                    } else {
                        $ignore = $params['ignore'];
                    }
                    $output = "try {\n";
                    unset($params['ignore']);
                }
            }
            $method = str_replace('.', '()->', $endpoint);
            $output .= sprintf(
                "%s\$response = self::\$client->%s(\n", 
                isset($catch) || isset($ignore) ? "\t" : '',
                $this->normalizeFunctionName($method)
            );
            $output .= sprintf(
                "%s%s", 
                isset($catch) || isset($ignore) ? "\t\t" : "\t",
                $this->arrayToPhpCode($params)
            );
            $output .= sprintf("%s\n);\n", isset($catch) || isset($ignore) ? "\t" : '');
            if (isset($ignore)) {
                $output .= "} catch (ClientResponseException \$e) {\n";
                $output .= sprintf("    if (!in_array(\$e->getResponse()->getStatusCode(), [%s])) {\n", $ignore);
                $output .= "        throw \$e;\n";
                $output .= "    }\n";
                $output .= "}\n";
                unset($ignore);
            }
            if (isset($catch)) {
                $output .= "} catch (ClientResponseException \$e) {\n";
                $output .= sprintf("\t\$this->assertMatchesRegularExpression('%s', \$e->getMessage());\n", $catch);
                $output .= "}\n";
                unset($catch);
            }
        }
        return $output;
    }

    protected function match(array $actions): string
    {
        $output = '';
        $key = $this->parseValue(key($actions));
        $value = current($actions);
        switch(gettype($value)) {
            case 'string':
                if ($value[0] === '/') {
                    $output .= sprintf("\$this->assertMatchesRegularExpression('%s', %s);\n", $value, $key);
                } elseif ($value[0] === '$') {
                    $output .= sprintf("\$this->assertEquals(%s, %s);\n", $value, $key);
                } else {
                    $output .= sprintf("\$this->assertEquals('%s', %s);\n", $value, $key);
                }
                break;
            case 'boolean':
                $output .= sprintf("\$this->assertEquals(%s, %s);\n", $value ? 'true' : 'false', $key);
                break;
            case 'integer':
                $output .= sprintf("\$this->assertEquals(%d, %s);\n", $value, $key);
                break;
            case 'double':
                $output .= sprintf("\$this->assertEquals(%f, %s);\n", $value, $key);
                break;
            case 'array':
            case 'object':
                if (empty($value)) {
                    $output .= sprintf("\$this->assertEmpty(%s);\n", $key);
                } else {
                    $output .= sprintf("\$this->assertEquals(%s, %s);\n", var_export($value, true), $key);
                }
                break;
            default:
                throw new Exception(sprintf(
                    "Type %s is not supported for %s => %s", 
                    gettype($value), 
                    $key, 
                    var_export($value, true)
                ));
        }
        return $output;
    }

    protected function set(array $actions): string
    {
        $output = '';
        foreach ($actions as $key => $value) {
            $output .= sprintf("\$%s = %s;\n", $value, $this->parseValue($key));
        }
        return $output;
    }

    /**
     * @link https://github.com/elastic/elasticsearch/tree/main/rest-api-spec/src/yamlRestTest/resources/rest-api-spec/test#is_true
     */
    protected function is_true(string $action): string
    {
        if (empty($action)) {
            return "\$this->assertEmpty(\$response->getBody()->getContents());\n";
        } elseif ('$body' === $action) {
            return "\$this->assertNotEmpty(\$response->getBody()->getContents());\n";
        } else {
            return sprintf(
                "\$this->assertTrue(isset(%s) && %s);\n", 
                $this->parseValue($action), 
                $this->parseValue($action)
            );
        }
    }

    /**
     * @link https://github.com/elastic/elasticsearch/tree/main/rest-api-spec/src/yamlRestTest/resources/rest-api-spec/test#is_false
     */
    protected function is_false(string $action): string
    {
        if (empty($action)) {
            return "\$this->assertNotEmpty(\$response->getBody()->getContents());\n";
        }
        $key = $this->parseValue($action);
        return sprintf("\$this->assertTrue(!isset(%s) || !%s);\n", $key, $key);
    }

    protected function length(array $actions): string
    {
        $key = $this->parseValue(key($actions));
        $value = current($actions);
        $output = sprintf(
            "\$_len_ = is_string(%s) ? strlen(%s) : (is_countable(%s) ? count(%s) : null);\n",
            $key,
            $key,
            $key,
            $key
        );
        $output .= sprintf("\$this->assertEquals(%d, \$_len_);\n", $value);
        return $output;
    }

    protected function gte(array $actions): string
    {
        $key = $this->parseValue(key($actions));
        $value = current($actions);
        return sprintf("\$this->assertGreaterThanOrEqual(%s, %d);\n", $key, $value);
    }

    protected function gt(array $actions): string
    {
        $key = $this->parseValue(key($actions));
        $value = current($actions);
        return sprintf("\$this->assertGreaterThan(%s, %d);\n", $key, $value);
    }

    protected function lte(array $actions): string
    {
        $key = $this->parseValue(key($actions));
        $value = current($actions);
        return sprintf("\$this->assertLessThanOrEqual(%s, %d);\n", $key, $value);
    }

    protected function lt(array $actions): string
    {
        $key = $this->parseValue(key($actions));
        $value = current($actions);
        return sprintf("\$this->assertLessThan(%s, %d);\n", $key, $value);
    }

    protected function skip(array $actions): string
    {
        // @todo to be implemented
        return '';
    }

    protected function contains(array $actions): string
    {
        $key = $this->parseValue(key($actions));
        $value = current($actions);
        if (is_array($value)) {
            return sprintf(
                "\$this->assertEquals(%s, array_intersect_assoc(%s, %s));\n",
                var_export($value, true),
                $key,
                var_export($value, true)
            );
        } elseif (is_string($value)) {
            return sprintf("\$this->assertStringContainsString('%s', %s);\n", $value, $key);
        }
        throw new Exception(sprintf(
            "I cannot parse the contains feature with key %s and value %s",
            $key,
            var_export($value, true)
        ));
    }

    protected function exists(string $action): string
    {
        return sprintf(
            "\$this->assertTrue(isset(%s));\n",
            $this->parseValue($action)
        );
    }
}