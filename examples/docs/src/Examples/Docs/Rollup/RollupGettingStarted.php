<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Rollup;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: RollupGettingStarted
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   rollup/rollup-getting-started.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class RollupGettingStarted extends SimpleExamplesTester {

    /**
     * Tag:  3acad8c67832b281b9f15349492b8328
     * Line: 32
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL32_3acad8c67832b281b9f15349492b8328()
    {
        $client = $this->getClient();
        // tag::3acad8c67832b281b9f15349492b8328[]
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
        //         "fixed_interval": "60m"
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
        // end::3acad8c67832b281b9f15349492b8328[]

        $curl = 'PUT _rollup/job/sensor'
              . '{'
              . '    "index_pattern": "sensor-*",'
              . '    "rollup_index": "sensor_rollup",'
              . '    "cron": "*/30 * * * * ?",'
              . '    "page_size" :1000,'
              . '    "groups" : {'
              . '      "date_histogram": {'
              . '        "field": "timestamp",'
              . '        "fixed_interval": "60m"'
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
     * Tag:  618c9d42284c067891fb57034a4fd834
     * Line: 116
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL116_618c9d42284c067891fb57034a4fd834()
    {
        $client = $this->getClient();
        // tag::618c9d42284c067891fb57034a4fd834[]
        // TODO -- Implement Example
        // POST _rollup/job/sensor/_start
        // end::618c9d42284c067891fb57034a4fd834[]

        $curl = 'POST _rollup/job/sensor/_start';

        // TODO -- make assertion
    }

    /**
     * Tag:  4e63a0fd56cc5d59595baa0b0721f971
     * Line: 131
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL131_4e63a0fd56cc5d59595baa0b0721f971()
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
     * Tag:  e0f8ecc665f547d5365699ab8773e298
     * Line: 189
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL189_e0f8ecc665f547d5365699ab8773e298()
    {
        $client = $this->getClient();
        // tag::e0f8ecc665f547d5365699ab8773e298[]
        // TODO -- Implement Example
        // GET /sensor_rollup/_rollup_search
        // {
        //     "size": 0,
        //     "aggregations": {
        //         "timeline": {
        //             "date_histogram": {
        //                 "field": "timestamp",
        //                 "fixed_interval": "7d"
        //             },
        //             "aggs": {
        //                 "nodes": {
        //                     "terms": {
        //                         "field": "node"
        //                     },
        //                     "aggs": {
        //                         "max_temperature": {
        //                             "max": {
        //                                 "field": "temperature"
        //                             }
        //                         },
        //                         "avg_voltage": {
        //                             "avg": {
        //                                 "field": "voltage"
        //                             }
        //                         }
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::e0f8ecc665f547d5365699ab8773e298[]

        $curl = 'GET /sensor_rollup/_rollup_search'
              . '{'
              . '    "size": 0,'
              . '    "aggregations": {'
              . '        "timeline": {'
              . '            "date_histogram": {'
              . '                "field": "timestamp",'
              . '                "fixed_interval": "7d"'
              . '            },'
              . '            "aggs": {'
              . '                "nodes": {'
              . '                    "terms": {'
              . '                        "field": "node"'
              . '                    },'
              . '                    "aggs": {'
              . '                        "max_temperature": {'
              . '                            "max": {'
              . '                                "field": "temperature"'
              . '                            }'
              . '                        },'
              . '                        "avg_voltage": {'
              . '                            "avg": {'
              . '                                "field": "voltage"'
              . '                            }'
              . '                        }'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
