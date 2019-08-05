<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetBucket
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/get-bucket.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetBucket extends SimpleExamplesTester {

    /**
     * Tag:  2c7fce4025e8e429e1ae8d50f5eb4b88
     * Line: 93
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL93_2c7fce4025e8e429e1ae8d50f5eb4b88()
    {
        $client = $this->getClient();
        // tag::2c7fce4025e8e429e1ae8d50f5eb4b88[]
        // TODO -- Implement Example
        // GET _ml/anomaly_detectors/it-ops-kpi/results/buckets
        // {
        //   "anomaly_score": 80,
        //   "start": "1454530200001"
        // }
        // end::2c7fce4025e8e429e1ae8d50f5eb4b88[]

        $curl = 'GET _ml/anomaly_detectors/it-ops-kpi/results/buckets'
              . '{'
              . '  "anomaly_score": 80,'
              . '  "start": "1454530200001"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
