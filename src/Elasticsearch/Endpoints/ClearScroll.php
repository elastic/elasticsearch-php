<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions;

/**
 * Class Clearscroll
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ClearScroll extends AbstractEndpoint
{
    /**
     * A comma-separated list of scroll IDs to clear
     *
     * @var string
     */
    private $scrollId;

    public function setScrollId(?string $scrollId): ClearScroll
    {
        if (isset($scrollId) !== true) {
            return $this;
        }

        $this->scrollId = $scrollId;

        return $this;
    }

    public function getURI(): string
    {
        $scrollId = $this->scrollId ?? null;
        if (isset($scrollId)) {
            return "/_search/scroll/$scrollId";
        }
        return "/_search/scroll";
    }

    public function setBody($body): ClearScroll
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    public function getBody()
    {
        if (isset($this->body)) {
            return $this->body;
        }
        if (\is_array($this->scrollId)) {
            return ['scroll_id' => $this->scrollId];
        }
        return ['scroll_id' => [$this->scrollId]];
    }

    public function getParamWhitelist(): array
    {
        return [];
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }
}
