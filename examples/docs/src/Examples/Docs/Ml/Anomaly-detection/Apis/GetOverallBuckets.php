<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetOverallBuckets
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/get-overall-buckets.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetOverallBuckets extends SimpleExamplesTester {

    /**
     * Tag:  e48e7da65c2b32d724fd7e3bfa175c6f
     * Line: 111
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL111_e48e7da65c2b32d724fd7e3bfa175c6f()
    {
        $client = $this->getClient();
        // tag::e48e7da65c2b32d724fd7e3bfa175c6f[]
        // TODO -- Implement Example
        // GET _ml/anomaly_detectors/job-*/results/overall_buckets
        // {
        //   "overall_score": 80,
        //   "start": "1403532000000"
        // }
        // end::e48e7da65c2b32d724fd7e3bfa175c6f[]

        $curl = 'GET _ml/anomaly_detectors/job-*/results/overall_buckets'
              . '{'
              . '  "overall_score": 80,'
              . '  "start": "1403532000000"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  405db6f3a01eceacfaa8b0ed3e4b3ac2
     * Line: 157
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL157_405db6f3a01eceacfaa8b0ed3e4b3ac2()
    {
        $client = $this->getClient();
        // tag::405db6f3a01eceacfaa8b0ed3e4b3ac2[]
        // TODO -- Implement Example
        // GET _ml/anomaly_detectors/job-*/results/overall_buckets
        // {
        //   "top_n": 2,
        //   "overall_score": 50.0,
        //   "start": "1403532000000"
        // }
        // end::405db6f3a01eceacfaa8b0ed3e4b3ac2[]

        $curl = 'GET _ml/anomaly_detectors/job-*/results/overall_buckets'
              . '{'
              . '  "top_n": 2,'
              . '  "overall_score": 50.0,'
              . '  "start": "1403532000000"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
