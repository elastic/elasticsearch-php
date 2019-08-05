<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Rollup\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: RollupCaps
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   rollup/apis/rollup-caps.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class RollupCaps extends SimpleExamplesTester {

    /**
     * Tag:  2d20c42e9664febeccaff61581605cbe
     * Line: 55
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL55_2d20c42e9664febeccaff61581605cbe()
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
     * Tag:  a00311843b5f8f3e9f7d511334a828b1
     * Line: 90
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL90_a00311843b5f8f3e9f7d511334a828b1()
    {
        $client = $this->getClient();
        // tag::a00311843b5f8f3e9f7d511334a828b1[]
        // TODO -- Implement Example
        // GET _rollup/data/sensor-*
        // end::a00311843b5f8f3e9f7d511334a828b1[]

        $curl = 'GET _rollup/data/sensor-*';

        // TODO -- make assertion
    }

    /**
     * Tag:  944806221eb89f5af2298ccdf2902277
     * Line: 160
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL160_944806221eb89f5af2298ccdf2902277()
    {
        $client = $this->getClient();
        // tag::944806221eb89f5af2298ccdf2902277[]
        // TODO -- Implement Example
        // GET _rollup/data/_all
        // end::944806221eb89f5af2298ccdf2902277[]

        $curl = 'GET _rollup/data/_all';

        // TODO -- make assertion
    }

    /**
     * Tag:  f8cb1a04c2e487ff006b5ae0e1a7afbd
     * Line: 169
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL169_f8cb1a04c2e487ff006b5ae0e1a7afbd()
    {
        $client = $this->getClient();
        // tag::f8cb1a04c2e487ff006b5ae0e1a7afbd[]
        // TODO -- Implement Example
        // GET _rollup/data/sensor-1
        // end::f8cb1a04c2e487ff006b5ae0e1a7afbd[]

        $curl = 'GET _rollup/data/sensor-1';

        // TODO -- make assertion
    }

// %__METHOD__%





}
