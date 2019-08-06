<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Metrics;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ExtendedstatsAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/metrics/extendedstats-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ExtendedstatsAggregation extends SimpleExamplesTester {

    /**
     * Tag:  b1c3e5c4a1a22ac329bbdec4d0de1082
     * Line: 11
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL11_b1c3e5c4a1a22ac329bbdec4d0de1082()
    {
        $client = $this->getClient();
        // tag::b1c3e5c4a1a22ac329bbdec4d0de1082[]
        // TODO -- Implement Example
        // GET /exams/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "grades_stats" : { "extended_stats" : { "field" : "grade" } }
        //     }
        // }
        // end::b1c3e5c4a1a22ac329bbdec4d0de1082[]

        $curl = 'GET /exams/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "grades_stats" : { "extended_stats" : { "field" : "grade" } }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  eb8df98231df40c61f5feef4946b1a92
     * Line: 59
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL59_eb8df98231df40c61f5feef4946b1a92()
    {
        $client = $this->getClient();
        // tag::eb8df98231df40c61f5feef4946b1a92[]
        // TODO -- Implement Example
        // GET /exams/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "grades_stats" : {
        //             "extended_stats" : {
        //                 "field" : "grade",
        //                 "sigma" : 3 \<1>
        //             }
        //         }
        //     }
        // }
        // end::eb8df98231df40c61f5feef4946b1a92[]

        $curl = 'GET /exams/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "grades_stats" : {'
              . '            "extended_stats" : {'
              . '                "field" : "grade",'
              . '                "sigma" : 3 \<1>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  83476d04b393850da0697e1bfae58b4a
     * Line: 93
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL93_83476d04b393850da0697e1bfae58b4a()
    {
        $client = $this->getClient();
        // tag::83476d04b393850da0697e1bfae58b4a[]
        // TODO -- Implement Example
        // GET /exams/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "grades_stats" : {
        //             "extended_stats" : {
        //                 "script" : {
        //                     "source" : "doc[\'grade\'].value",
        //                     "lang" : "painless"
        //                  }
        //              }
        //          }
        //     }
        // }
        // end::83476d04b393850da0697e1bfae58b4a[]

        $curl = 'GET /exams/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "grades_stats" : {'
              . '            "extended_stats" : {'
              . '                "script" : {'
              . '                    "source" : "doc[\'grade\'].value",'
              . '                    "lang" : "painless"'
              . '                 }'
              . '             }'
              . '         }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2cf036d054901b5d7b4a84780c320f2d
     * Line: 115
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL115_2cf036d054901b5d7b4a84780c320f2d()
    {
        $client = $this->getClient();
        // tag::2cf036d054901b5d7b4a84780c320f2d[]
        // TODO -- Implement Example
        // GET /exams/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "grades_stats" : {
        //             "extended_stats" : {
        //                 "script" : {
        //                     "id": "my_script",
        //                     "params": {
        //                         "field": "grade"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::2cf036d054901b5d7b4a84780c320f2d[]

        $curl = 'GET /exams/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "grades_stats" : {'
              . '            "extended_stats" : {'
              . '                "script" : {'
              . '                    "id": "my_script",'
              . '                    "params": {'
              . '                        "field": "grade"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  533b447e1ca8c575e38ecd9b1917c17c
     * Line: 141
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL141_533b447e1ca8c575e38ecd9b1917c17c()
    {
        $client = $this->getClient();
        // tag::533b447e1ca8c575e38ecd9b1917c17c[]
        // TODO -- Implement Example
        // GET /exams/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "grades_stats" : {
        //             "extended_stats" : {
        //                 "field" : "grade",
        //                 "script" : {
        //                     "lang" : "painless",
        //                     "source": "_value * params.correction",
        //                     "params" : {
        //                         "correction" : 1.2
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::533b447e1ca8c575e38ecd9b1917c17c[]

        $curl = 'GET /exams/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "grades_stats" : {'
              . '            "extended_stats" : {'
              . '                "field" : "grade",'
              . '                "script" : {'
              . '                    "lang" : "painless",'
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
     * Tag:  44a7cf8482bdc3d1c11f4b3b35683b99
     * Line: 171
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL171_44a7cf8482bdc3d1c11f4b3b35683b99()
    {
        $client = $this->getClient();
        // tag::44a7cf8482bdc3d1c11f4b3b35683b99[]
        // TODO -- Implement Example
        // GET /exams/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "grades_stats" : {
        //             "extended_stats" : {
        //                 "field" : "grade",
        //                 "missing": 0 \<1>
        //             }
        //         }
        //     }
        // }
        // end::44a7cf8482bdc3d1c11f4b3b35683b99[]

        $curl = 'GET /exams/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "grades_stats" : {'
              . '            "extended_stats" : {'
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
