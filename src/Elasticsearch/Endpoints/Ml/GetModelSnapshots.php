<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Ml;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetModelSnapshots
 * Elasticsearch API name ml.get_model_snapshots
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetModelSnapshots extends AbstractEndpoint
{
    protected $job_id;
    protected $snapshot_id;

    public function getURI(): string
    {
        if (isset($this->job_id) !== true) {
            throw new RuntimeException(
                'job_id is required for get_model_snapshots'
            );
        }
        $job_id = $this->job_id;
        $snapshot_id = $this->snapshot_id ?? null;

        if (isset($snapshot_id)) {
            return "/_ml/anomaly_detectors/$job_id/model_snapshots/$snapshot_id";
        }
        return "/_ml/anomaly_detectors/$job_id/model_snapshots";
    }

    public function getParamWhitelist(): array
    {
        return [
            'from',
            'size',
            'start',
            'end',
            'sort',
            'desc'
        ];
    }

    public function getMethod(): string
    {
        return isset($this->body) ? 'POST' : 'GET';
    }

    public function setBody($body): GetModelSnapshots
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

    public function setJobId($job_id): GetModelSnapshots
    {
        if (isset($job_id) !== true) {
            return $this;
        }
        $this->job_id = $job_id;

        return $this;
    }

    public function setSnapshotId($snapshot_id): GetModelSnapshots
    {
        if (isset($snapshot_id) !== true) {
            return $this;
        }
        $this->snapshot_id = $snapshot_id;

        return $this;
    }
}
