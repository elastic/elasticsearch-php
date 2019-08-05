<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Metrics;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: WeightedAvgAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/metrics/weighted-avg-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class WeightedAvgAggregation extends SimpleExamplesTester {

    /**
     * Tag:  c15dead46d351f62cfc066f1ca1a24eb
     * Line: 55
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL55_c15dead46d351f62cfc066f1ca1a24eb()
    {
        $client = $this->getClient();
        // tag::c15dead46d351f62cfc066f1ca1a24eb[]
        // TODO -- Implement Example
        // POST /exams/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "weighted_grade": {
        //             "weighted_avg": {
        //                 "value": {
        //                     "field": "grade"
        //                 },
        //                 "weight": {
        //                     "field": "weight"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::c15dead46d351f62cfc066f1ca1a24eb[]

        $curl = 'POST /exams/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "weighted_grade": {'
              . '            "weighted_avg": {'
              . '                "value": {'
              . '                    "field": "grade"'
              . '                },'
              . '                "weight": {'
              . '                    "field": "weight"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4c15a4b054c7d0aaaa17deaff853bb28
     * Line: 102
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL102_4c15a4b054c7d0aaaa17deaff853bb28()
    {
        $client = $this->getClient();
        // tag::4c15a4b054c7d0aaaa17deaff853bb28[]
        // TODO -- Implement Example
        // POST /exams/_doc?refresh
        // {
        //     "grade": [1, 2, 3],
        //     "weight": 2
        // }
        // POST /exams/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "weighted_grade": {
        //             "weighted_avg": {
        //                 "value": {
        //                     "field": "grade"
        //                 },
        //                 "weight": {
        //                     "field": "weight"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::4c15a4b054c7d0aaaa17deaff853bb28[]

        $curl = 'POST /exams/_doc?refresh'
              . '{'
              . '    "grade": [1, 2, 3],'
              . '    "weight": 2'
              . '}'
              . 'POST /exams/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "weighted_grade": {'
              . '            "weighted_avg": {'
              . '                "value": {'
              . '                    "field": "grade"'
              . '                },'
              . '                "weight": {'
              . '                    "field": "weight"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e88e8c78ed50936c8b7436c90b988ddf
     * Line: 153
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL153_e88e8c78ed50936c8b7436c90b988ddf()
    {
        $client = $this->getClient();
        // tag::e88e8c78ed50936c8b7436c90b988ddf[]
        // TODO -- Implement Example
        // POST /exams/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "weighted_grade": {
        //             "weighted_avg": {
        //                 "value": {
        //                     "script": "doc.grade.value + 1"
        //                 },
        //                 "weight": {
        //                     "script": "doc.weight.value + 1"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::e88e8c78ed50936c8b7436c90b988ddf[]

        $curl = 'POST /exams/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "weighted_grade": {'
              . '            "weighted_avg": {'
              . '                "value": {'
              . '                    "script": "doc.grade.value + 1"'
              . '                },'
              . '                "weight": {'
              . '                    "script": "doc.weight.value + 1"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  cebfe0fed62091eb38b6348c89643f89
     * Line: 186
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL186_cebfe0fed62091eb38b6348c89643f89()
    {
        $client = $this->getClient();
        // tag::cebfe0fed62091eb38b6348c89643f89[]
        // TODO -- Implement Example
        // POST /exams/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "weighted_grade": {
        //             "weighted_avg": {
        //                 "value": {
        //                     "field": "grade",
        //                     "missing": 2
        //                 },
        //                 "weight": {
        //                     "field": "weight",
        //                     "missing": 3
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::cebfe0fed62091eb38b6348c89643f89[]

        $curl = 'POST /exams/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "weighted_grade": {'
              . '            "weighted_avg": {'
              . '                "value": {'
              . '                    "field": "grade",'
              . '                    "missing": 2'
              . '                },'
              . '                "weight": {'
              . '                    "field": "weight",'
              . '                    "missing": 3'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
