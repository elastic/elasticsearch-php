<?php

namespace Elasticsearch\Endpoints\Indices;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Analyze
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Augustin Husson <husson.augustin@gmail.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Reindex extends AbstractEndpoint
{

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array();
    }

    /**
     * @return string
     */
    protected function getURI()
    {
        return '/_reindex';
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'POST';
    }

    /**
     * @param array $body
     *
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
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