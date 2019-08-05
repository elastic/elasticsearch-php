<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Rollup\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetJob
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   rollup/apis/get-job.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetJob extends SimpleExamplesTester {

    /**
     * Tag:  d095b422d9803c02b62c01adffc85376
     * Line: 46
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL46_d095b422d9803c02b62c01adffc85376()
    {
        $client = $this->getClient();
        // tag::d095b422d9803c02b62c01adffc85376[]
        // TODO -- Implement Example
        // GET _rollup/job/sensor
        // end::d095b422d9803c02b62c01adffc85376[]

        $curl = 'GET _rollup/job/sensor';

        // TODO -- make assertion
    }

    /**
     * Tag:  6d13e0721a7aac00adcdc5fe77198300
     * Line: 141
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL141_6d13e0721a7aac00adcdc5fe77198300()
    {
        $client = $this->getClient();
        // tag::6d13e0721a7aac00adcdc5fe77198300[]
        // TODO -- Implement Example
        // PUT _rollup/job/sensor2 \<1>
        // {
        //     "index_pattern": "sensor-*",
        //     "rollup_index": "sensor_rollup",
        //     "cron": "*/30 * * * * ?",
        //     "page_size" :1000,
        //     "groups" : {
        //       "date_histogram": {
        //         "field": "timestamp",
        //         "fixed_interval": "1h",
        //         "delay": "7d"
        //       },
        //       "terms": {
        //         "fields": ["node"]
        //       }
        //     },
        //     "metrics": [
        //         {
        //             "field": "temperature",
        //             "metrics": ["min", "max", "sum"]
        //         },
        //         {
        //             "field": "voltage",
        //             "metrics": ["avg"]
        //         }
        //     ]
        // }
        // GET _rollup/job/_all \<2>
        // end::6d13e0721a7aac00adcdc5fe77198300[]

        $curl = 'PUT _rollup/job/sensor2 \<1>'
              . '{'
              . '    "index_pattern": "sensor-*",'
              . '    "rollup_index": "sensor_rollup",'
              . '    "cron": "*/30 * * * * ?",'
              . '    "page_size" :1000,'
              . '    "groups" : {'
              . '      "date_histogram": {'
              . '        "field": "timestamp",'
              . '        "fixed_interval": "1h",'
              . '        "delay": "7d"'
              . '      },'
              . '      "terms": {'
              . '        "fields": ["node"]'
              . '      }'
              . '    },'
              . '    "metrics": ['
              . '        {'
              . '            "field": "temperature",'
              . '            "metrics": ["min", "max", "sum"]'
              . '        },'
              . '        {'
              . '            "field": "voltage",'
              . '            "metrics": ["avg"]'
              . '        }'
              . '    ]'
              . '}'
              . 'GET _rollup/job/_all \<2>';

        // TODO -- make assertion
    }

// %__METHOD__%



}
