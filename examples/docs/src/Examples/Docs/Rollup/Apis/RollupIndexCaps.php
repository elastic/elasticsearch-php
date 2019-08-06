<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Rollup\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: RollupIndexCaps
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   rollup/apis/rollup-index-caps.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class RollupIndexCaps extends SimpleExamplesTester {

    /**
     * Tag:  2d20c42e9664febeccaff61581605cbe
     * Line: 46
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL46_2d20c42e9664febeccaff61581605cbe()
    {
        $client = $this->getClient();
        // tag::2d20c42e9664febeccaff61581605cbe[]
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
        // end::2d20c42e9664febeccaff61581605cbe[]

        $curl = 'PUT _rollup/job/sensor'
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
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  73d1a6c5ef90b7e35d43a0bfdc1e158d
     * Line: 82
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL82_73d1a6c5ef90b7e35d43a0bfdc1e158d()
    {
        $client = $this->getClient();
        // tag::73d1a6c5ef90b7e35d43a0bfdc1e158d[]
        // TODO -- Implement Example
        // GET /sensor_rollup/_rollup/data
        // end::73d1a6c5ef90b7e35d43a0bfdc1e158d[]

        $curl = 'GET /sensor_rollup/_rollup/data';

        // TODO -- make assertion
    }

    /**
     * Tag:  642161d70dacf7d153767d37d3726838
     * Line: 155
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL155_642161d70dacf7d153767d37d3726838()
    {
        $client = $this->getClient();
        // tag::642161d70dacf7d153767d37d3726838[]
        // TODO -- Implement Example
        // GET /*_rollup/_rollup/data
        // end::642161d70dacf7d153767d37d3726838[]

        $curl = 'GET /*_rollup/_rollup/data';

        // TODO -- make assertion
    }

// %__METHOD__%




}
