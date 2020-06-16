<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Snapshot;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class CreateRepository
 * Elasticsearch API name snapshot.create_repository
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Snapshot
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class CreateRepository extends AbstractEndpoint
{
    protected $repository;

    public function getURI(): string
    {
        $repository = $this->repository ?? null;

        if (isset($repository)) {
            return "/_snapshot/$repository";
        }
        throw new RuntimeException('Missing parameter for the endpoint snapshot.create_repository');
    }

    public function getParamWhitelist(): array
    {
        return [
            'master_timeout',
            'timeout',
            'verify'
        ];
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function setBody($body): CreateRepository
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

    public function setRepository($repository): CreateRepository
    {
        if (isset($repository) !== true) {
            return $this;
        }
        $this->repository = $repository;

        return $this;
    }
}
