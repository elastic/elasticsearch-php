<?php
/**
* Namespace class for code generation
*
* @author Enrico Zimuel (enrico.zimuel@elastic.co)
*/
declare(strict_types = 1);

namespace Elasticsearch\Util;

use Exception;

class NamespaceEndpoint
{
    const NAMESPACE_CLASS_TEMPLATE        = __DIR__ . '/template/namespace-class';
    const ENDPOINT_FUNCTION_TEMPLATE      = __DIR__ . '/template/endpoint-function';
    const ENDPOINT_FUNCTION_BOOL_TEMPLATE = __DIR__ . '/template/endpoint-function-bool';
    const EXTRACT_ARG_TEMPLATE            = __DIR__ . '/template/extract-arg';
    const SET_PARAM_TEMPLATE              = __DIR__ . '/template/setparam';

    protected $name;
    protected $endpoints = [];
    protected $endpointNames = [];
    protected $version; /* Elasticsearch version used to generate the class */

    public function __construct(string $name, string $version)
    {
        $this->name = $name;
        $this->version = $version;
    }

    public function renderClass(): string
    {
        if (empty($this->endpoints)) {
            throw new Exception("No endpoints has been added. I cannot render the class");
        }
        $class = file_get_contents(static::NAMESPACE_CLASS_TEMPLATE);
        $class = str_replace(':namespace', ucfirst($this->name) . 'Namespace', $class);

        $endpoints = '';
        foreach ($this->endpoints as $endpoint) {
            $endpoints .= $this->renderEndpoint($endpoint);
        }
        // Fix for BC in 7.2.0
        switch ($this->name) {
            case 'indices':
                $endpoints .= $this->getAliasesProxy();
                break;
            case 'tasks':
                $endpoints .= $this->tasksListProxy();
                break;
        }
        $class = str_replace(':endpoints', $endpoints, $class);

        return str_replace(':version', $this->version, $class);
    }

    public function addEndpoint(Endpoint $endpoint): NamespaceEndpoint
    {
        if (in_array($endpoint->name, $this->endpointNames)) {
            throw new Exception(sprintf(
                "The endpoint %s has been already added",
                $endpoint->namespace
            ));
        }
        $this->endpoints[] = $endpoint;
        $this->endpointNames[] = $endpoint->name;

        return $this;
    }

    protected function renderEndpoint(Endpoint $endpoint): string
    {
        $code = file_get_contents(
            $endpoint->getMethod() === ['HEAD']
            ? self::ENDPOINT_FUNCTION_BOOL_TEMPLATE
            : self::ENDPOINT_FUNCTION_TEMPLATE
        );

        $code = str_replace(':apidoc', $endpoint->renderDocParams(), $code);
        $code = str_replace(':endpoint', $this->getEndpointName($endpoint->name), $code);

        $extract = '';
        $setParams = '';
        foreach ($endpoint->getParts() as $part => $value) {
            $extract .= str_replace(':part', $part, file_get_contents(self::EXTRACT_ARG_TEMPLATE));

            $param = str_replace(':param', $part, file_get_contents(self::SET_PARAM_TEMPLATE));

            $setParams .= str_replace(':Param', $this->normalizeName($part), $param);
        }
        if (!$endpoint->isBodyNull()) {
            $extract .= str_replace(':part', 'body', file_get_contents(self::EXTRACT_ARG_TEMPLATE));

            $param = str_replace(':param', 'body', file_get_contents(self::SET_PARAM_TEMPLATE));
            $setParams .= str_replace(':Param', 'Body', $param);
        }
        $code = str_replace(':extract', $extract, $code);
        $code = str_replace(':setparam', $setParams, $code);

        if (empty($endpoint->namespace)) {
            $endpointClass = $endpoint->getClassName();
        } else {
            $endpointClass = ucfirst($endpoint->namespace) . '\\' . $endpoint->getClassName();
        }
        return str_replace(':EndpointClass', $endpointClass, $code);
    }

    protected function normalizeName(string $name): string
    {
        return str_replace('_', '', ucwords($name, '_'));
    }

    protected function getEndpointName(string $name): string
    {
        return preg_replace_callback(
            '/_(.?)/',
            function ($matches) {
                return strtoupper($matches[1]);
            },
            $name
        );
    }

    protected function getAliasesProxy(): string
    {
        return <<<'EOD'
    
    /**
     * Alias function to getAlias()
     *
     * @deprecated added to prevent BC break introduced in 7.2.0
     * @see https://github.com/elastic/elasticsearch-php/issues/940
     */
    public function getAliases(array $params = [])
    {
        return $this->getAlias($params);
    }
EOD;
    }

    protected function tasksListProxy(): string
    {
        return <<<'EOD'

    /**
     * Proxy function to list() to prevent BC break since 7.4.0
     */
    public function tasksList(array $params = [])
    {
        return $this->list($params);
    }
EOD;
    }
}
