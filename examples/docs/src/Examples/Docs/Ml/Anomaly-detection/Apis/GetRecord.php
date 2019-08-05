<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetRecord
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/get-record.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetRecord extends SimpleExamplesTester {

    /**
     * Tag:  16337a7169486ffea5bfe185b6426b9c
     * Line: 77
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL77_16337a7169486ffea5bfe185b6426b9c()
    {
        $client = $this->getClient();
        // tag::16337a7169486ffea5bfe185b6426b9c[]
        // TODO -- Implement Example
        // GET _ml/anomaly_detectors/it-ops-kpi/results/records
        // {
        //   "sort": "record_score",
        //   "desc": true,
        //   "start": "1454944100000"
        // }
        // end::16337a7169486ffea5bfe185b6426b9c[]

        $curl = 'GET _ml/anomaly_detectors/it-ops-kpi/results/records'
              . '{'
              . '  "sort": "record_score",'
              . '  "desc": true,'
              . '  "start": "1454944100000"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
