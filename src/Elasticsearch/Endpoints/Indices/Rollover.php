<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Rollover
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Rollover extends AbstractEndpoint
{
    private $alias;
    private $newIndex;

    public function setAlias(?string $alias): Rollover
    {
        if ($alias === null) {
            return $this;
        }

        $this->alias = urlencode($alias);
        return $this;
    }

    public function setNewIndex(?string $newIndex): Rollover
    {
        if ($newIndex === null) {
            return $this;
        }

        $this->newIndex = urlencode($newIndex);
        return $this;
    }

    public function setBody($body): Rollover
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    public function getURI(): string
    {
        if (isset($this->alias) !== true) {
            throw new Exceptions\RuntimeException(
                'alias name is required for Rollover'
            );
        }
        $alias = $this->alias;
        $newIndex = $this->newIndex ?? null;
        if (isset($newIndex)) {
            return "/$alias/_rollover/$newIndex";
        }
        return "/$alias/_rollover";
    }

    public function getParamWhitelist(): array
    {
        return [
            'include_type_name',
            'timeout',
            'dry_run',
            'master_timeout',
            'wait_for_active_shards'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
