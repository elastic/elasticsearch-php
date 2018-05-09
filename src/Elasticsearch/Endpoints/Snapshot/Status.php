<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Snapshot;

use Elasticsearch\Common\Exceptions;

/**
 * Snapshot Status endpoint.
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Snapshot
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Status extends AbstractSnapshotEndpoint
{

    protected $baseUrl = '/_snapshot/{repository}{snapshot}/_status';

    /**
     * @throws Exceptions\RuntimeException
     */
    public function getURI(): string
    {
        if (empty($this->repository) && empty($this->snapshot)) {
            return '/_snapshot/_status';
        }

        $this->ensureRepository();

        return $this->buildUrl();
    }

    protected function buildUrlParameters(): array
    {
        $parameters = parent::buildUrlParameters();
        if (!empty($this->snapshot)) {
            $parameters['{snapshot}'] = '/'.$parameters['{snapshot}'];
        }

        return $parameters;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist(): array
    {
        return array(
            'master_timeout',
            'ignore_unavailable'
        );
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
