<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Rollup\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: RollupJobConfig
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   rollup/apis/rollup-job-config.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class RollupJobConfig extends SimpleExamplesTester {

    /**
     * Tag:  1cf5e58ea0f2ca39abfee4361207b939
     * Line: 17
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL17_1cf5e58ea0f2ca39abfee4361207b939()
    {
        $client = $this->getClient();
        // tag::1cf5e58ea0f2ca39abfee4361207b939[]
        // TODO -- Implement Example
        // PUT _rollup/job/sensor
        // {
        //     "index_pattern": "sensor-*",
        //     "rollup_index": "sensor_rollup",
        //     "cron": "*/30 * * * * ?",
        //     "page_size" :1000,
        //     "groups" : {
        //       "date_histogram": {
        //         "field": "timestamp",
        //         "fixed_interval": "60m",
        //         "delay": "7d"
        //       },
        //       "terms": {
        //         "fields": ["hostname", "datacenter"]
        //       },
        //       "histogram": {
        //         "fields": ["load", "net_in", "net_out"],
        //         "interval": 5
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
        // end::1cf5e58ea0f2ca39abfee4361207b939[]

        $curl = 'PUT _rollup/job/sensor'
              . '{'
              . '    "index_pattern": "sensor-*",'
              . '    "rollup_index": "sensor_rollup",'
              . '    "cron": "*/30 * * * * ?",'
              . '    "page_size" :1000,'
              . '    "groups" : {'
              . '      "date_histogram": {'
              . '        "field": "timestamp",'
              . '        "fixed_interval": "60m",'
              . '        "delay": "7d"'
              . '      },'
              . '      "terms": {'
              . '        "fields": ["hostname", "datacenter"]'
              . '      },'
              . '      "histogram": {'
              . '        "fields": ["load", "net_in", "net_out"],'
              . '        "interval": 5'
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
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
