<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;

/**
 * Class Reindex
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ScriptsPainlessExecute extends AbstractEndpoint
{
    /**
     * @return array
     */
    public function getParamWhitelist()
    {
        return [];
    }

    /**
     * @return string
     */
    public function getURI()
    {
        return "/_scripts/painless/_execute";
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return isset($this->body) ? 'POST' : 'GET';
    }

    /**
     * @param array $body
     * @return $this
     */
    public function setBody($body)
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }
}
