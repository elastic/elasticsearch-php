<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Ml;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetBuckets
 * Elasticsearch API name ml.get_buckets
 * Generated running $ php util/GenerateEndpoints.php 7.7
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetBuckets extends AbstractEndpoint
{
    protected $job_id;
    protected $timestamp;

    public function getURI(): string
    {
        if (isset($this->job_id) !== true) {
            throw new RuntimeException(
                'job_id is required for get_buckets'
            );
        }
        $job_id = $this->job_id;
        $timestamp = $this->timestamp ?? null;

        if (isset($timestamp)) {
            return "/_ml/anomaly_detectors/$job_id/results/buckets/$timestamp";
        }
        return "/_ml/anomaly_detectors/$job_id/results/buckets";
    }

    public function getParamWhitelist(): array
    {
        return [
            'expand',
            'exclude_interim',
            'from',
            'size',
            'start',
            'end',
            'anomaly_score',
            'sort',
            'desc'
        ];
    }

    public function getMethod(): string
    {
        return isset($this->body) ? 'POST' : 'GET';
    }

    public function setBody($body): GetBuckets
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

    public function setJobId($job_id): GetBuckets
    {
        if (isset($job_id) !== true) {
            return $this;
        }
        $this->job_id = $job_id;

        return $this;
    }

    public function setTimestamp($timestamp): GetBuckets
    {
        if (isset($timestamp) !== true) {
            return $this;
        }
        $this->timestamp = $timestamp;

        return $this;
    }
}
