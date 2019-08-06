<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Metrics;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: StatsAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/metrics/stats-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class StatsAggregation extends SimpleExamplesTester {

    /**
     * Tag:  6f04f3c1afe94e03d26ff5966fd4b98d
     * Line: 11
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL11_6f04f3c1afe94e03d26ff5966fd4b98d()
    {
        $client = $this->getClient();
        // tag::6f04f3c1afe94e03d26ff5966fd4b98d[]
        // TODO -- Implement Example
        // POST /exams/_search?size=0
        // {
        //     "aggs" : {
        //         "grades_stats" : { "stats" : { "field" : "grade" } }
        //     }
        // }
        // end::6f04f3c1afe94e03d26ff5966fd4b98d[]

        $curl = 'POST /exams/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "grades_stats" : { "stats" : { "field" : "grade" } }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9ed80262680e67c629a08f6754a7c5c9
     * Line: 50
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL50_9ed80262680e67c629a08f6754a7c5c9()
    {
        $client = $this->getClient();
        // tag::9ed80262680e67c629a08f6754a7c5c9[]
        // TODO -- Implement Example
        // POST /exams/_search?size=0
        // {
        //     "aggs" : {
        //         "grades_stats" : {
        //              "stats" : {
        //                  "script" : {
        //                      "lang": "painless",
        //                      "source": "doc[\'grade\'].value"
        //                  }
        //              }
        //          }
        //     }
        // }
        // end::9ed80262680e67c629a08f6754a7c5c9[]

        $curl = 'POST /exams/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "grades_stats" : {'
              . '             "stats" : {'
              . '                 "script" : {'
              . '                     "lang": "painless",'
              . '                     "source": "doc[\'grade\'].value"'
              . '                 }'
              . '             }'
              . '         }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2ba8575100b37b85d0052d46a00ce4cd
     * Line: 71
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL71_2ba8575100b37b85d0052d46a00ce4cd()
    {
        $client = $this->getClient();
        // tag::2ba8575100b37b85d0052d46a00ce4cd[]
        // TODO -- Implement Example
        // POST /exams/_search?size=0
        // {
        //     "aggs" : {
        //         "grades_stats" : {
        //             "stats" : {
        //                 "script" : {
        //                     "id": "my_script",
        //                     "params" : {
        //                         "field" : "grade"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::2ba8575100b37b85d0052d46a00ce4cd[]

        $curl = 'POST /exams/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "grades_stats" : {'
              . '            "stats" : {'
              . '                "script" : {'
              . '                    "id": "my_script",'
              . '                    "params" : {'
              . '                        "field" : "grade"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1341888a2677cf6e1db11e6cab2dd8ce
     * Line: 96
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL96_1341888a2677cf6e1db11e6cab2dd8ce()
    {
        $client = $this->getClient();
        // tag::1341888a2677cf6e1db11e6cab2dd8ce[]
        // TODO -- Implement Example
        // POST /exams/_search?size=0
        // {
        //     "aggs" : {
        //         "grades_stats" : {
        //             "stats" : {
        //                 "field" : "grade",
        //                 "script" : {
        //                     "lang": "painless",
        //                     "source": "_value * params.correction",
        //                     "params" : {
        //                         "correction" : 1.2
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::1341888a2677cf6e1db11e6cab2dd8ce[]

        $curl = 'POST /exams/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "grades_stats" : {'
              . '            "stats" : {'
              . '                "field" : "grade",'
              . '                "script" : {'
              . '                    "lang": "painless",'
              . '                    "source": "_value * params.correction",'
              . '                    "params" : {'
              . '                        "correction" : 1.2'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7371dcfe4adb43996f4c26684318302b
     * Line: 125
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL125_7371dcfe4adb43996f4c26684318302b()
    {
        $client = $this->getClient();
        // tag::7371dcfe4adb43996f4c26684318302b[]
        // TODO -- Implement Example
        // POST /exams/_search?size=0
        // {
        //     "aggs" : {
        //         "grades_stats" : {
        //             "stats" : {
        //                 "field" : "grade",
        //                 "missing": 0 \<1>
        //             }
        //         }
        //     }
        // }
        // end::7371dcfe4adb43996f4c26684318302b[]

        $curl = 'POST /exams/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "grades_stats" : {'
              . '            "stats" : {'
              . '                "field" : "grade",'
              . '                "missing": 0 \<1>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
