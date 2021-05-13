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

namespace Elasticsearch\Util;

use Exception;
use JsonException;

class Endpoint
{
    const ENDPOINT_CLASS_TEMPLATE      = __DIR__ . '/template/endpoint-class';
    const ENDPOINT_BULK_CLASS_TEMPLATE = __DIR__ . '/template/endpoint-bulk-class';
    const REQUIRED_PART_TEMPLATE       = __DIR__ . '/template/required-part';
    const SET_PART_TEMPLATE            = __DIR__ . '/template/set-part';
    const SET_PART_LIST_TEMPLATE       = __DIR__ . '/template/set-part-list';
    const CHECK_OPTIONS_TEMPLATE       = __DIR__ . '/template/check-options';
    const SET_BULK_BODY_TEMPLATE       = __DIR__ . '/template/set-bulk-body';
    const DEPRECATED_PART              = __DIR__ . '/template/deprecated';
    const PHP_RESERVED_WORDS = [
        'abstract', 'and', 'array', 'as', 'break', 'callable', 'case', 'catch',
        'class', 'clone', 'const', 'continue', 'declare', 'default', 'die', 'do',
        'echo', 'else', 'elseif', 'empty', 'enddeclare', 'endfor', 'endforeach',
        'endif', 'endswitch', 'endwhile', 'eval', 'exit', 'extends', 'final',
        'for', 'foreach', 'function', 'global', 'goto', 'if', 'implements',
        'include', 'include_once', 'instanceof', 'insteadof', 'interface',
        'isset', 'list', 'namespace', 'new', 'or', 'print', 'private',
        'protected', 'public', 'require', 'require_once', 'return', 'static',
        'switch', 'throw', 'trait', 'try', 'unset', 'use', 'var', 'while', 'xor'
    ];
    // this is for backward compatibility with elasticsearch-php 7.x
    const BC_CLASS_NAME = [
        'Cat\Nodeattrs'      => 'NodeAttrs',
        'Indices\Forcemerge' => 'ForceMerge',
        'Mtermvectors'       => 'MTermVectors',
        'Termvectors'        => 'TermVectors'
    ];

    public $namespace;
    public $name;
    public $apiName;
    protected $content;
    protected $version;
    protected $buildhash;
    protected $parts = [];
    protected $requiredParts = [];
    protected $useNamespace = [];
    private $addedPartInDoc = [];
    private $properties = [];

    /**
     * @param $fileName name of the file with the API specification
     * @param $content content of the API specification in JSON
     * @param $version Elasticsearch version of the API specification
     * @param $buildhash Elasticsearch build hash of the API specification
     */
    public function __construct(
        string $fileName, 
        string $content, 
        string $version, 
        string $buildhash
    ) {
        $this->apiName = basename($fileName, '.json');
        $parts = explode('.', $this->apiName);
        if (count($parts) === 1) {
            $this->namespace = '';
            $this->name = $parts[0];
        } elseif (count($parts) === 2) {
            $this->namespace = $parts[0];
            $this->name = $parts[1];
        }
        try {
            $this->content = json_decode(
                $content,
                true,
                512,
                JSON_THROW_ON_ERROR
            );
        } catch (JsonException $e) {
            throw new Exception(sprintf(
                "The content of the endpoint is not JSON: %s\n",
                $e->getMessage()
            ));
        }
        $this->content = $this->content[$this->apiName];
        $this->version = $version;
        $this->buildhash = $buildhash;

        $this->parts = $this->getPartsFromContent($this->content);
        $this->requiredParts = $this->getRequiredParts($this->content);
    }

    public function getParts(): array
    {
        return $this->parts;
    }

    private function getPartsFromContent(array $content): array
    {
        $parts = [];
        foreach ($content['url']['paths'] as $url) {
            if (isset($url['parts'])) {
                $parts = array_merge($parts, $url['parts']);
            }
        }
        return $parts;
    }

    private function getRequiredParts(array $content): array
    {
        $required = [];
        // Get the list of required parts
        foreach ($content['url']['paths'] as $path) {
            $required[] = isset($path['parts']) ? array_keys($path['parts']) : [];
        }
        if (count($required) > 1) {
            return call_user_func_array('array_intersect', $required);
        }
        return $required;
    }

    public function getDocUrl(): string
    {
        return $this->content['documentation']['url'] ?? '';
    }

    public function renderClass(): string
    {
        if (isset($this->content['body']['serialize']) &&
            $this->content['body']['serialize'] === 'bulk') {
            $class = file_get_contents(self::ENDPOINT_BULK_CLASS_TEMPLATE);
        } else {
            $class = file_get_contents(self::ENDPOINT_CLASS_TEMPLATE);
        }
        $class = str_replace(
            ':uri',
            $this->extractUrl($this->content['url']['paths']),
            $class
        );
        $class = str_replace(
            ':params',
            $this->extractParameters(),
            $class
        );
        $class = str_replace(
            ':namespace',
            $this->namespace === ''
                ? $this->normalizeName($this->namespace)
                : '\\' . $this->normalizeName($this->namespace),
            $class
        );

        // Set the HTTP method
        $action = $this->getMethod();
        if (!empty($this->content['body']) &&
            ($action === ['GET', 'POST'] || $action === ['POST', 'GET'])) {
            $method = 'isset($this->body) ? \'POST\' : \'GET\'';
        } else {
            $method = sprintf("'%s'", reset($action));
        }
        $class = str_replace(':method', $method, $class);

        $parts = '';
        // Set parts
        if (!empty($this->content['body'])) {
            if (isset($this->content['body']['serialize']) &&
                $this->content['body']['serialize'] === 'bulk') {
                $parts .= $this->getSetBulkBody();
            } else {
                $parts .= $this->getSetPart('body');
            }
        }
        foreach ($this->parts as $part => $value) {
            if (in_array($part, ['type', 'index', 'id'])) {
                continue;
            }
            if (isset($value['type']) && $value['type'] === 'list') {
                $parts .= $this->getSetPartList($part);
            } else {
                $parts .= $this->getSetPart($part);
            }
        }
        $class = str_replace(':set-parts', $parts, $class);
        $class = str_replace(':endpoint', $this->getClassName(), $class);
        $class = str_replace(':version', $this->version, $class);
        $class = str_replace(':buildhash', $this->buildhash, $class);
        $class = str_replace(':use-namespace', $this->getNamespaces(), $class);
        $class = str_replace(':properties', $this->getProperties(), $class);

        return str_replace(':apiname', $this->apiName, $class);
    }

    public function getMethod(): array
    {
        $methods = $this->content['url']['paths'][0]['methods'];
        foreach ($this->content['url']['paths'] as $path) {
            $methods = array_intersect($methods, $path['methods']);
        }
        return $methods;
    }

    private function extractParameters(): string
    {
        if (!isset($this->content['params'])) {
            return '';
        }
        $tab12 = str_repeat(' ', 12);
        $tab8 = str_repeat(' ', 8);
        $result = '';
        foreach (array_keys($this->content['params']) as $param) {
            $result .=  "'$param',\n" . $tab12;
        }
        return "\n". $tab12 . rtrim(trim($result), ',') . "\n". $tab8;
    }

    private function getDeprecatedMessage(string $part): string
    {
        foreach ($this->content['url']['paths'] as $path) {
            if (isset($path['parts'][$part]) && isset($path['parts'][$part]['deprecated']) &&
                $path['parts'][$part]['deprecated']) {
                return $path['deprecated']['description'] ?? '';
            }
        }
        return '';
    }

    private function extractUrl(array $paths): string
    {
        $skeleton = file_get_contents(self::REQUIRED_PART_TEMPLATE);
        $checkPart = '';
        $params = '';
        $deprecated = '';

        $tab8 = str_repeat(' ', 8);
        $tab12 = str_repeat(' ', 12);

        if (!empty($this->parts)) {
            foreach ($this->parts as $part => $value) {
                if (in_array($part, $this->requiredParts)) {
                    $checkPart .= str_replace(
                        ':endpoint',
                        $this->name,
                        str_replace(':part', $part, $skeleton)
                    );
                    $this->addNamespace('Elasticsearch\Common\Exceptions\RuntimeException');
                } else {
                    $params .= sprintf("%s\$%s = \$this->%s ?? null;\n", $tab8, $part, $part);
                }
                if ($part === 'type') {
                    $deprecated .= str_replace(
                        ':msg',
                        'Specifying types in urls has been deprecated',
                        str_replace(':part', $part, file_get_contents(self::DEPRECATED_PART))
                    );
                } elseif (isset($value['deprecated']) && $value['deprecated']) {
                    $deprecated .= str_replace(
                        ':msg',
                        $this->getDeprecatedMessage($part),
                        str_replace(':part', $part, file_get_contents(self::DEPRECATED_PART))
                    );
                }
            }
        }
        $else = '';
        $urls = '';
        // Extract the paths to manage (removing deprecated path, duplicate, etc)
        $pathsToManage = $this->extractPaths($paths);

        $lastUrlReturn = false;
        foreach ($pathsToManage as $path) {
            $parts = $this->getPartsFromUrl($path);
            if (empty($parts)) {
                $else = sprintf("\n%sreturn \"%s\";", $tab8, $path);
                $lastUrlReturn = true;
                continue;
            }
            $check = '';
            if (!in_array($parts[0], $this->requiredParts)) {
                $check = sprintf("isset(\$%s)", $parts[0]);
            }
            $url = str_replace('{' . $parts[0] .'}', '$' . $parts[0], $path);
            for ($i=1; $i<count($parts); $i++) {
                $url = str_replace('{' . $parts[$i] .'}', '$' . $parts[$i], $url);
                if (in_array($parts[$i], $this->requiredParts)) {
                    continue;
                }
                $check .= sprintf("%sisset(\$%s)", empty($check) ? '' : ' && ', $parts[$i]);
            }
            // Fix for missing / at the beginning of URL
            // @see https://github.com/elastic/elasticsearch-php/pull/970
            if ($url[0] !== '/') {
                $url = '/' . $url;
            }
            if (empty($check)) {
                $urls .= sprintf("\n%sreturn \"%s\";", $tab8, $url);
                $lastUrlReturn = true;
            } else {
                $urls .= sprintf("\n%sif (%s) {\n%sreturn \"%s\";\n%s}", $tab8, $check, $tab12, $url, $tab8);
            }
        }
        if (!$lastUrlReturn) {
            $urls .= sprintf(
                "\n%sthrow new RuntimeException('Missing parameter for the endpoint %s');",
                $tab8,
                $this->apiName
            );
            $this->addNamespace('Elasticsearch\Common\Exceptions\RuntimeException');
        }
        return $checkPart . $params . $deprecated . $urls . $else;
    }

    private function removePathWithSameParts(array $paths): array
    {
        $urls = [];
        $parsed = [];
        foreach ($paths as $path) {
            if (!isset($path['parts'])) {
                $urls[] = $path['path'];
                continue;
            }
            $parts = array_keys($path['parts']);
            $exist = false;
            foreach ($parsed as $parse) {
                if ($parts == $parse) {
                    $exist = true;
                    break;
                }
            }
            if (!$exist) {
                $urls[] = $path['path'];
                $parsed[] = $parts;
            };
        }
        return $urls;
    }

    private function extractPaths(array $paths): array
    {
        $urls = $this->removePathWithSameParts($paths);
        // Order the url based on descendant length
        usort($urls, function($a,$b){
            return strlen($b)-strlen($a);
        });

        return $urls;
    }

    private function getPartsFromUrl(string $url): array
    {
        preg_match_all('#\{([a-z_]+)\}#', $url, $match);
        return $match[1];
    }

    private function addNamespace(string $namespace): void
    {
        $this->useNamespace[$namespace] = sprintf("use %s;", $namespace);
    }

    private function getNamespaces(): string
    {
        if (empty($this->useNamespace)) {
            return '';
        }
        return "\n" . implode("\n", $this->useNamespace);
    }

    private function getSetPartList(string $param): string
    {
        $setPart = file_get_contents(self::SET_PART_LIST_TEMPLATE);
        $setPart = str_replace(':endpoint', $this->getClassName(), $setPart);
        $setPart = str_replace(':part', $param, $setPart);
        $this->addProperty($param);
        return str_replace(':Part', $this->normalizeName($param), $setPart);
    }

    private function getSetPart(string $param): string
    {
        $setPart = file_get_contents(self::SET_PART_TEMPLATE);
        $setPart = str_replace(':endpoint', $this->getClassName(), $setPart);
        $setPart = str_replace(':part', $param, $setPart);
        $this->addProperty($param);
        return str_replace(':Part', $this->normalizeName($param), $setPart);
    }

    private function getSetBulkBody(): string
    {
        $setPart = file_get_contents(self::SET_BULK_BODY_TEMPLATE);
        $this->addNamespace('Elasticsearch\Common\Exceptions\InvalidArgumentException');

        return str_replace(':endpoint', $this->getClassName(), $setPart);
    }

    protected function addProperty(string $name)
    {
        if (!in_array($name, ['body', 'type', 'index', 'id'])) {
            $this->properties[$name] = sprintf("    protected \$%s;", $name);
        }
    }

    protected function getProperties(): string
    {
        if (empty($this->properties)) {
            return '';
        }
        return implode("\n", $this->properties) . "\n";
    }

    protected function normalizeName(string $name): string
    {
        return str_replace('_', '', ucwords($name, '_'));
    }

    public function getClassName(): string
    {
        if (in_array(strtolower($this->name), static::PHP_RESERVED_WORDS)) {
            return $this->normalizeName($this->name . ucwords($this->namespace));
        }
        $normalizedName = $this->normalizeName($this->name);
        $normalizedFullName = empty($this->namespace) ? $normalizedName : ucwords($this->namespace) . '\\' . $normalizedName;

        return static::BC_CLASS_NAME[$normalizedFullName] ?? $normalizedName;
    }

    public function renderDocParams(): string
    {
        $space = $this->getMaxLengthBodyPartsParams();

        $result = "\n    /**\n";
        if (isset($this->content['documentation']['description'])) {
            $result .= sprintf("     * %s\n", str_replace("\n", '', $this->content['documentation']['description']));
            $result .= "     *\n";
        }
        $result .= $this->extractPartsDescription($space);
        $result .= $this->extractParamsDescription($space);
        $result .= $this->extractBodyDescription($space);
        $result .= "     *\n";
        $result .= "     * @param array \$params Associative array of parameters\n";
        $result .= sprintf("     * @return %s\n", $this->getMethod() === ['HEAD'] ? 'bool' : 'array');

        if (isset($this->content['documentation']['url'])) {
            $result .= "     * @see {$this->content['documentation']['url']}\n";
        }
        if ($this->content['stability'] !== 'stable') {
            switch ($this->content['stability']) {
                case 'experimental':
                    $note = 'This API is EXPERIMENTAL and may be changed or removed completely in a future release';
                    break;
                case 'beta':
                    $note = 'This API is BETA and may change in ways that are not backwards compatible';
                    break;
            }
            if (isset($note)) {
                $result .= sprintf("     *\n     * @note %s\n     *\n", $note);
            }
        }
        $result .= "     */";

        return $result;
    }

    private function extractBodyDescription(int $space): string
    {
        if (isset($this->content['body']) && isset($this->content['body']['description'])) {
            return sprintf(
                "     * \$params['body']%s = (array) %s%s\n",
                str_repeat(' ', $space - 4),
                $this->content['body']['description'],
                isset($this->content['body']['required']) && $this->content['body']['required'] ? ' (Required)' : ''
            );
        }
        return '';
    }

    private function extractPartsDescription(int $space): string
    {
        $result = '';
        if (empty($this->parts)) {
            return $result;
        }
        foreach ($this->parts as $part => $values) {
            $result .= sprintf(
                "     * \$params['%s']%s = %s(%s) %s%s\n",
                $part,
                str_repeat(' ', $space - strlen($part)),
                $part ==='type' || (isset($values['deprecated']) && $values['deprecated']) ? 'DEPRECATED ' : '',
                $values['type'],
                $values['description'] ?? '',
                in_array($part, $this->requiredParts) ? ' (Required)' : ''
            );
            $this->addedPartInDoc[] = $part;
        }
        return $result;
    }

    private function extractParamsDescription(int $space): string
    {
        $result = '';
        if (!isset($this->content['params'])) {
            return $result;
        }
        foreach ($this->content['params'] as $param => $values) {
            if (in_array($param, $this->addedPartInDoc)) {
                continue;
            }
            $result .= sprintf(
                "     * \$params['%s']%s = (%s) %s%s%s%s\n",
                $param,
                str_repeat(' ', $space - strlen($param)),
                $values['type'],
                $values['description'] ?? '',
                isset($values['required']) && $values['required'] ? ' (Required)' : '',
                isset($values['options']) ? sprintf(" (Options = %s)", implode(',', $values['options'])) : '',
                isset($values['default']) ? sprintf(" (Default = %s)", $values['type'] === 'boolean' ? ($values['default'] ? 'true' : 'false') : (is_array($values['default']) ? implode(',', $values['default']) : $values['default'])) : ''
            );
        }
        return $result;
    }

    private function getMaxLengthBodyPartsParams(): int
    {
        $max = isset($this->content['body']) ? 4 : 0;
        if (!empty($this->parts)) {
            foreach ($this->parts as $name => $value) {
                $len = strlen($name);
                if ($len > $max) {
                    $max = $len;
                }
            }
        }
        if (!empty($this->content['params'])) {
            foreach ($this->content['params'] as $name => $value) {
                $len = strlen($name);
                if ($len > $max) {
                    $max = $len;
                }
            }
        }
        return $max;
    }

    public function isBodyNull(): bool
    {
        return empty($this->content['body']);
    }
}
