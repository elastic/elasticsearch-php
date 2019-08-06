<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PutJob
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/anomaly-detection/apis/put-job.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PutJob extends SimpleExamplesTester {

    /**
     * Tag:  9c11e238772d67dbc9d273776de9916c
     * Line: 100
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL100_9c11e238772d67dbc9d273776de9916c()
    {
        $client = $this->getClient();
        // tag::9c11e238772d67dbc9d273776de9916c[]
        // TODO -- Implement Example
        // PUT _ml/anomaly_detectors/total-requests
        // {
        //   "description" : "Total sum of requests",
        //   "analysis_config" : {
        //     "bucket_span":"10m",
        //     "detectors": [
        //       {
        //         "detector_description": "Sum of total",
        //         "function": "sum",
        //         "field_name": "total"
        //       }
        //     ]
        //   },
        //   "data_description" : {
        //     "time_field":"timestamp",
        //     "time_format": "epoch_ms"
        //   }
        // }
        // end::9c11e238772d67dbc9d273776de9916c[]

        $curl = 'PUT _ml/anomaly_detectors/total-requests'
              . '{'
              . '  "description" : "Total sum of requests",'
              . '  "analysis_config" : {'
              . '    "bucket_span":"10m",'
              . '    "detectors": ['
              . '      {'
              . '        "detector_description": "Sum of total",'
              . '        "function": "sum",'
              . '        "field_name": "total"'
              . '      }'
              . '    ]'
              . '  },'
              . '  "data_description" : {'
              . '    "time_field":"timestamp",'
              . '    "time_format": "epoch_ms"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
