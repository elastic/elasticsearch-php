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

namespace Elastic\Elasticsearch\Util;

use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\ElasticsearchException;
use PHPUnit\Runner\Version as PHPUnitVersion;
use stdClass;

class ActionTest
{
    const TEMPLATE_ENDPOINT             = __DIR__ . '/template/test/endpoint';
    const TEMPLATE_ENDPOINT_TRY_CATCH   = __DIR__ . '/template/test/endpoint-try-catch';
    const TEMPLATE_ENDPOINT_TRY_CATCH_ARRAY = __DIR__ . '/template/test/endpoint-try-catch-array';
    const TEMPLATE_MATCH_EQUAL          = __DIR__ . '/template/test/match-equal';
    const TEMPLATE_MATCH_REGEX          = __DIR__ . '/template/test/match-regex';
    const TEMPLATE_IS_FALSE             = __DIR__ . '/template/test/is-false';
    const TEMPLATE_IS_FALSE_RESPONSE    = __DIR__ . '/template/test/is-false-response';
    const TEMPLATE_IS_TRUE              = __DIR__ . '/template/test/is-true';
    const TEMPLATE_IS_TRUE_RESPONSE     = __DIR__ . '/template/test/is-true-response';
    const TEMPLATE_IS_NULL              = __DIR__ . '/template/test/is-null';
    const TEMPLATE_LENGTH               = __DIR__ . '/template/test/length';
    const TEMPLATE_SKIP_VERSION         = __DIR__ . '/template/test/skip-version';
    const TEMPLATE_SKIP_FEATURE         = __DIR__ . '/template/test/skip-feature';
    const TEMPLATE_SKIP_XPACK           = __DIR__ . '/template/test/skip-xpack';
    const TEMPLATE_SKIP_NODE_SELECTOR   = __DIR__ . '/template/test/skip-node-selector';
    const TEMPLATE_SKIP_OSS             = __DIR__ . '/template/test/skip-oss';
    const TEMPLATE_CATCH                = __DIR__ . '/template/test/catch';
    const TEMPLATE_CATCH_UNAVAILABLE    = __DIR__ . '/template/test/catch-unavailable';
    const TEMPLATE_CATCH_REGEX          = __DIR__ . '/template/test/catch-regex';
    const TEMPLATE_SET_VARIABLE         = __DIR__ . '/template/test/set-variable';
    const TEMPLATE_TRANSFORM_AND_SET    = __DIR__ . '/template/test/transform-and-set';
    const TEMPLATE_WARNINGS             = __DIR__ . '/template/test/warnings';
    const TEMPLATE_ALLOWED_WARNINGS     = __DIR__ . '/template/test/allowed-warnings';
    const TEMPLATE_GT                   = __DIR__ . '/template/test/gt';
    const TEMPLATE_GTE                  = __DIR__ . '/template/test/gte';
    const TEMPLATE_LT                   = __DIR__ . '/template/test/lt';
    const TEMPLATE_LTE                  = __DIR__ . '/template/test/lte';

    // --- PHPUNIT 9 TEMPLATE ---
    const TEMPLATE_PHPUNIT9_MATCH_REGEX = __DIR__ . '/template/test/match-regex-9';
    const TEMPLATE_PHPUNIT9_CATCH_REGEX = __DIR__ . '/template/test/catch-regex-9';

    const TAB14                 = '              ';
    const SUPPORTED_FEATURES    = [
        'xpack', 
        'no_xpack', 
        'headers', 
        'node_selector', 
        'warnings', 
        'catch_unauthorized', 
        'transform_and_set',
        'allowed_warnings'
    ];

    private $headers = [];
    private $variables = [];
    private $skippedTest = false;
    private $output = '';
    private $phpUnitVersion;
    private $clientParams = [];

    public function __construct(array $steps)
    {
        $this->phpUnitVersion = (int) explode('.', PHPUnitVersion::id())[0];
        
        foreach ($steps as $step) {
            foreach ($step as $name => $actions) {
                if (method_exists($this, $name) && !$this->skippedTest) {
                    $this->output .= $this->$name($actions);
                }
            }
        }
    }

    private function do(array $actions): string
    {
        $vars = [
            ':endpoint'       => '',
            ':params'         => '',
            ':catch'          => '',
            ':response-check' => '',
            ':code'           => '',
            ':headers'        => '',
            ':reset-client'   => ''
        ];
        foreach ($actions as $key => $value) {
            if (method_exists($this, $key)) {
                $this->$key($value, $vars);
            } else {
                // headers
                if (!empty($this->headers)) {
                    $vars[':headers'] = $this->formatHeaders($this->headers);
                    $vars[':reset-client'] = '$this->client = Utility::getClient();';
                    $this->resetHeaders();
                }
                // Check if {} (new stdClass) is the parameter of an endpoint
                if ($value instanceof stdClass && empty(get_object_vars($value))) {
                    $params = '';
                } else {
                    $params = $this->adjustClientParams($value);
                    $params = var_export($params, true);
                    $params = $this->convertDollarValueInVariable($params); // replace '$var' or '${var}' in $var
                    $params = $this->convertStdClass($params); // convert "stdClass::__set_state(array())" in "(object)[]"
                }
                $vars[':endpoint'] = $this->convertDotToArrow($key);
                //$vars[':params']   = str_replace("\n","\n" . self::TAB14, $params);
                $vars[':params']   = $params;
            }
        }
        // ignore client parameter
        if (isset($this->clientParams['ignore'])) {
            $vars[':code'] = $this->clientParams['ignore'];
            if (is_array($vars[':code'])) {
                return YamlTests::render(self::TEMPLATE_ENDPOINT_TRY_CATCH_ARRAY, $vars);
            }
            return YamlTests::render(self::TEMPLATE_ENDPOINT_TRY_CATCH, $vars);
        }
        return YamlTests::render(self::TEMPLATE_ENDPOINT, $vars);
    }

    /**
     * Adjust the client parameters (e.g. ignore)
     */
    private function adjustClientParams($params)
    {
        if (!is_array($params)) {
            return $params;
        }
        $this->clientParams = [];
        foreach ($params as $key => $value) {
            switch($key) {
                case 'ignore':
                    $this->clientParams['ignore'] = $value;
                    unset($params[$key]);
                    break;
            }        
        }
        return $params;
    }

    /**
     * ---------- FEATURE FUNCTIONS (BEGIN) ----------
     */

    private function transform_and_set(array $action): string
    {
        $key = key($action);
        $transform = $action[$key];
        if (false !== strpos($transform, '#base64EncodeCredentials')) {
            preg_match_all('/\#base64EncodeCredentials\((\w+),(\w+)\)/', $transform, $matches);
            $param1 = $matches[1][0];
            $param2 = $matches[2][0];
            $this->variables[] = $key;
            return YamlTests::render(self::TEMPLATE_TRANSFORM_AND_SET, [
                ':var'   => $key,
                ':param' => sprintf("\$response['%s'] . ':' . \$response['%s']", $param1, $param2)
            ]);
        }
        return '';
    }

    private function set(array $action): string
    {
        $key = key($action);
        $this->variables[] = $action[$key];
        return YamlTests::render(self::TEMPLATE_SET_VARIABLE, [
            ':var'   => $action[$key],
            ':value' => $this->convertResponseField($key)
        ]);
    }

    private function warnings(array $action, array &$vars)
    {
        $vars[':response-check'] .= YamlTests::render(self::TEMPLATE_WARNINGS, [
            ':expected' => $action
        ]);
    }

    private function allowed_warnings(array $action, array &$vars)
    {
        $vars[':response-check'] .= YamlTests::render(self::TEMPLATE_ALLOWED_WARNINGS, [
            ':expected' => $action
        ]);
    }

    private function catch(string $action, array &$vars)
    {
        switch ($action) {
            case 'bad_request':
            case 'unauthorized':
            case 'forbidden':
            case 'missing':
            case 'request_timeout':
            case 'conflict':
                $expectedException = ClientResponseException::class;
                break;
            case 'request':
                $expectedException = ElasticsearchException::class;
                break;
            case 'unavailable':
                $expectedException = ElasticsearchException::class;
                $scriptException = YamlTests::render(self::TEMPLATE_CATCH_UNAVAILABLE);
                break;
            case 'param':
                $expectedException = ElasticsearchException::class;
                $scriptException = 'var_dump($response);';
                break;
            default:
                $expectedException = ElasticsearchException::class;
                $scriptException = YamlTests::render(
                    ($this->phpUnitVersion > 8) ? (self::TEMPLATE_PHPUNIT9_CATCH_REGEX) : (self::TEMPLATE_CATCH_REGEX),
                    [ ':regex' => sprintf("'%s'", addslashes($action)) ]
                );
        }
        $vars[':catch'] = YamlTests::render(self::TEMPLATE_CATCH, [
            ':exception' => $expectedException
        ]);
        $vars[':response-check'] .= $scriptException ?? '';
    }

    private function headers(array $actions, array $params)
    {
        $this->headers = $actions;
    }

    private function resetHeaders()
    {
        $this->headers = [];
    }

    private function node_selector(array $actions)
    {
        // this is an empty function since we are using only 1 node
        // @see https://github.com/elastic/elasticsearch/tree/master/rest-api-spec/src/main/resources/rest-api-spec/test#node_selector
    }

    private function match(array $actions)
    {
        $key = key($actions);
        if (null === $actions[$key]) {
            return YamlTests::render(self::TEMPLATE_IS_NULL, [
                ':value' => $this->convertResponseField($key)
            ]);
        }

        if (is_string($actions[$key]) && substr($actions[$key], 0, 1) !== '$') {
            $expected = sprintf("'%s'", addslashes($actions[$key]));
        } elseif (is_string($actions[$key]) && substr($actions[$key], 0, 2) === '${') {
            $expected = sprintf("\$%s", substr($actions[$key],2, strlen($actions[$key])-3));
        } elseif (is_bool($actions[$key])) {
            $expected = $actions[$key] ? 'true' : 'false';
        } elseif (is_array($actions[$key])) {
            $expected = $this->removeObjectFromArray($actions[$key]);
        } else {
            $expected = $actions[$key];
        }
        $vars = [
            ':expected' => $expected,
            ':value' => $this->convertResponseField($key)
        ];
        if (is_string($expected) && $this->isRegularExpression($expected)) {
            $vars[':expected'] = $this->convertJavaRegexToPhp($vars[':expected']);
            // Add /sx preg modifier to ignore whitespace
            $vars[':expected'] .= "sx";
            if ($vars[':value'] === '$response') {
                $vars[':value'] = '$response->asString()';
            }
            return YamlTests::render(
                ($this->phpUnitVersion > 8) ? (self::TEMPLATE_PHPUNIT9_MATCH_REGEX) : (self::TEMPLATE_MATCH_REGEX), 
                $vars
            );
        } elseif (is_array($expected)) {
            if ($vars[':value'] === '$response') {
                $vars[':value'] = '$response->asArray()';
            } 
        } elseif (is_bool($expected)) {
            if ($vars[':value'] === '$response') {
                $vars[':value'] = '$response->asBool()';
            } 
        }
        if ($expected instanceof stdClass && empty(get_object_vars($expected))) {
            $vars[':expected'] = '[]';
            if ($vars[':value'] === '$response') {
                $vars[':value'] = '$response->asArray()';
            } 
        }
        return YamlTests::render(self::TEMPLATE_MATCH_EQUAL, $vars);
    }

    private function is_true(string $value) 
    {
        $vars = [
            ':value' => $this->convertResponseField($value)
        ];
        if ($vars[':value'] === '$response') {
            return YamlTests::render(self::TEMPLATE_IS_TRUE_RESPONSE, $vars);
        }
        return YamlTests::render(self::TEMPLATE_IS_TRUE, $vars);
    }

    private function is_false(string $value) 
    {
        $vars = [
            ':value' => $this->convertResponseField($value)
        ];
        if ($vars[':value'] === '$response') {
            return YamlTests::render(self::TEMPLATE_IS_FALSE_RESPONSE, $vars);
        }
        return YamlTests::render(self::TEMPLATE_IS_FALSE, $vars);
    }

    private function length(array $actions)
    {
        $key = key($actions);
       
        return YamlTests::render(self::TEMPLATE_LENGTH, [
            ':expected' => (int) $actions[$key],
            ':value'    => $this->convertResponseField($key)
        ]);
    }

    private function skip(array $actions)
    {
        if (isset($actions['version']) && isset($actions['reason'])) {
            // Extract version compare constrain
            $version = explode ('-', $actions['version']);
            $version = array_map('trim', $version);
            if (empty($version[0])) {
                $version[0] = '0';
            }
            if (empty($version[1])) {
                $version[1] = sprintf("%s", PHP_INT_MAX);
            }
            if (strtolower($version[0]) === 'all' || 
               (version_compare(YamlTests::$esVersion, $version[0], '>=') && version_compare(YamlTests::$esVersion, $version[1], '<='))
            ) {
                $this->skippedTest = true;
                return YamlTests::render(self::TEMPLATE_SKIP_VERSION, [
                    ':testname'  => "__CLASS__ . '::' . __FUNCTION__",
                    ':esversion' => sprintf("'%s'", YamlTests::$esVersion),
                    ':reason'    => sprintf("'%s'", addslashes($actions['reason']))
                ]);
            }
        }
        if (isset($actions['features'])) {
            $features = (array) $actions['features'];
            foreach ($features as $feature) {
                if (!in_array($feature, self::SUPPORTED_FEATURES)) {
                    $this->skippedTest = true;
                    return YamlTests::render(self::TEMPLATE_SKIP_FEATURE, [
                        ':testname' => "__CLASS__ . '::' . __FUNCTION__",
                        ':feature'  => sprintf("'%s'", $feature)
                    ]);
                }
                switch ($feature) {
                    case 'xpack': 
                        if (YamlTests::$testSuite !== 'platinum') {
                            $this->skippedTest = true;
                            return YamlTests::render(self::TEMPLATE_SKIP_XPACK, [
                                ':testname' => "__CLASS__ . '::' . __FUNCTION__"
                            ]);
                        } 
                        break;
                    case 'no_xpack': 
                        if (YamlTests::$testSuite !== 'free') {
                            $this->skippedTest = true;
                            return YamlTests::render(self::TEMPLATE_SKIP_OSS, [
                                ':testname' => "__CLASS__ . '::' . __FUNCTION__"
                            ]);
                        } 
                        break;
                }
            }

        }
    }

    private function setup(array $actions)
    {
        return $this->do($actions);
    }

    private function teardown(array $actions)
    {
        return $this->do($actions);
    }

    private function gt(array $actions)
    {
        $key = key($actions);
        return YamlTests::render(self::TEMPLATE_GT, [
            ':expected' => $actions[$key],
            ':value' => $this->convertResponseField($key)
        ]);
    }

    private function gte(array $actions)
    {
        $key = key($actions);
        return YamlTests::render(self::TEMPLATE_GTE, [
            ':expected' => $actions[$key],
            ':value' => $this->convertResponseField($key)
        ]);
    }

    private function lt(array $actions)
    {
        $key = key($actions);
        return YamlTests::render(self::TEMPLATE_LT, [
            ':expected' => $actions[$key],
            ':value' => $this->convertResponseField($key)
        ]);
    }

    private function lte(array $actions)
    {
        $key = key($actions);
        return YamlTests::render(self::TEMPLATE_LTE, [
            ':expected' => $actions[$key],
            ':value' => $this->convertResponseField($key)
        ]);
    }

    /**
     * ---------- FEATURE FUNCTIONS (END) ----------
     */

    public function __toString(): string
    {
        return $this->output;
    }

    private function removeObjectFromArray(array $array): array
    {
        array_walk_recursive($array, function(&$value, $key) {
            if (is_object($value)) {
                $value = (array) $value;
            }
        });
        return $array;
    }

    private function convertDotToArrow(string $dot)
    {
        $result = str_replace ('.', '()->', $dot);
        $tot = strlen($result);
        for ($i = 0; $i < $tot; $i++) {
            if ($result[$i] === '_' && ($i+1) < $tot) {
                $result[$i+1] = strtoupper($result[$i+1]);
            }
        }
        return str_replace('_', '', $result);
    }
    
    private function convertResponseField(string $field): string
    {
        $output = '$response';
        if ($field === '$body' || $field === '') {
            return $output;
        }
        // if the field starts with a .$variable remove the first dot
        if (substr($field, 0, 2) === '.$') {
            $field = substr($field, 1);
        }
        # Remove \. from $field
        $field = str_replace ('\.', chr(200), $field);
        $parts = explode('.', $field);
        foreach ($parts as $part) {
            # Replace \. in $part
            $part = str_replace (chr(200), '.', $part);
            if (is_int($part)) {
                $output .= sprintf("[%d]", $part);
            } else {
                $output .= sprintf("[\"%s\"]", $part);
            }
        }
        return $output;
    }
    
    private function convertDollarValueInVariable(string $value): string
    {
        foreach ($this->variables as $var) {
            
            $value = str_replace("\${{$var}}", "\$$var", $value);
            $value = str_replace("'\$$var'", "\$$var", $value);
            if (preg_match("/'[^']*\\\${$var}[^']*',/", $value)) {
                $value = str_replace("\$$var", "' . \$$var . '", $value);
            }
        }
        return $value;
    }

    private function isRegularExpression(string $regex): bool
    {
        return preg_match("/^\'\s?\/\^?/", $regex) > 0;
    }

    private function convertJavaRegexToPhp(string $regex): string
    {
        # remove the single quote from the beginning and end of a string
        $regex = trim($regex, '\'');
        preg_match_all('/(\/\^?)(.+)(\$?\/)/sx', $regex, $matches);
        if (isset($matches[2][0])) {
            $matches[2][0] = str_replace('/', '\/', $matches[2][0]);
            return sprintf("%s%s%s", $matches[1][0], $matches[2][0], $matches[3][0]);
        }
        
        return $regex;
    }

    /**
     * Convert "stdClass::__set_state" into "(object) []"
     * @see https://www.php.net/manual/en/function.var-export.php#refsect1-function.var-export-changelog
     */
    private function convertStdClass(string $value): string
    {
        return preg_replace("/stdClass::__set_state\(array\(\s+\)\)/", '(object) []', $value);
    }

    private function formatHeaders(array $headers): string
    {
        $result = '';
        foreach ($headers as $key => $value) {
            $result .= sprintf("\$this->client->getTransport()->setHeader('%s',\"%s\");\n", $key, $value);
        }
        return $result;
    }
}