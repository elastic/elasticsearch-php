<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Rollup\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: RollupSearch
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   rollup/apis/rollup-search.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class RollupSearch extends SimpleExamplesTester {

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
     * Tag:  4e63a0fd56cc5d59595baa0b0721f971
     * Line: 92
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL92_4e63a0fd56cc5d59595baa0b0721f971()
    {
        $client = $this->getClient();
        // tag::4e63a0fd56cc5d59595baa0b0721f971[]
        // TODO -- Implement Example
        // GET /sensor_rollup/_rollup_search
        // {
        //     "size": 0,
        //     "aggregations": {
        //         "max_temperature": {
        //             "max": {
        //                 "field": "temperature"
        //             }
        //         }
        //     }
        // }
        // end::4e63a0fd56cc5d59595baa0b0721f971[]

        $curl = 'GET /sensor_rollup/_rollup_search'
              . '{'
              . '    "size": 0,'
              . '    "aggregations": {'
              . '        "max_temperature": {'
              . '            "max": {'
              . '                "field": "temperature"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3d1cea1ad861d1ee62e5f34b84371943
     * Line: 145
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL145_3d1cea1ad861d1ee62e5f34b84371943()
    {
        $client = $this->getClient();
        // tag::3d1cea1ad861d1ee62e5f34b84371943[]
        // TODO -- Implement Example
        // GET sensor_rollup/_rollup_search
        // {
        //     "size": 0,
        //     "aggregations": {
        //         "avg_temperature": {
        //             "avg": {
        //                 "field": "temperature"
        //             }
        //         }
        //     }
        // }
        // end::3d1cea1ad861d1ee62e5f34b84371943[]

        $curl = 'GET sensor_rollup/_rollup_search'
              . '{'
              . '    "size": 0,'
              . '    "aggregations": {'
              . '        "avg_temperature": {'
              . '            "avg": {'
              . '                "field": "temperature"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  adcd760ef029f744ab59460818d2342e
     * Line: 189
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL189_adcd760ef029f744ab59460818d2342e()
    {
        $client = $this->getClient();
        // tag::adcd760ef029f744ab59460818d2342e[]
        // TODO -- Implement Example
        // GET sensor-1,sensor_rollup/_rollup_search \<1>
        // {
        //     "size": 0,
        //     "aggregations": {
        //         "max_temperature": {
        //             "max": {
        //                 "field": "temperature"
        //             }
        //         }
        //     }
        // }
        // end::adcd760ef029f744ab59460818d2342e[]

        $curl = 'GET sensor-1,sensor_rollup/_rollup_search \<1>'
              . '{'
              . '    "size": 0,'
              . '    "aggregations": {'
              . '        "max_temperature": {'
              . '            "max": {'
              . '                "field": "temperature"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
