<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: FlushJob
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/anomaly-detection/apis/flush-job.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class FlushJob extends SimpleExamplesTester {

    /**
     * Tag:  6a9931992ce1b0c2c2c82635d32f32cd
     * Line: 72
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL72_6a9931992ce1b0c2c2c82635d32f32cd()
    {
        $client = $this->getClient();
        // tag::6a9931992ce1b0c2c2c82635d32f32cd[]
        // TODO -- Implement Example
        // POST _ml/anomaly_detectors/total-requests/_flush
        // {
        //   "calc_interim": true
        // }
        // end::6a9931992ce1b0c2c2c82635d32f32cd[]

        $curl = 'POST _ml/anomaly_detectors/total-requests/_flush'
              . '{'
              . '  "calc_interim": true'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3033133e8675524fd8f969db0625b62e
     * Line: 99
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL99_3033133e8675524fd8f969db0625b62e()
    {
        $client = $this->getClient();
        // tag::3033133e8675524fd8f969db0625b62e[]
        // TODO -- Implement Example
        // POST _ml/anomaly_detectors/total-requests/_flush
        // {
        //   "advance_time": "1514804400"
        // }
        // end::3033133e8675524fd8f969db0625b62e[]

        $curl = 'POST _ml/anomaly_detectors/total-requests/_flush'
              . '{'
              . '  "advance_time": "1514804400"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
