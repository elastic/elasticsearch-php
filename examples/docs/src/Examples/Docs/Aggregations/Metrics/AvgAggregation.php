<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Metrics;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: AvgAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/metrics/avg-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class AvgAggregation extends SimpleExamplesTester {

    /**
     * Tag:  d9d28e9e9d7021a72c983f8e79aa8c6c
     * Line: 10
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL10_d9d28e9e9d7021a72c983f8e79aa8c6c()
    {
        $client = $this->getClient();
        // tag::d9d28e9e9d7021a72c983f8e79aa8c6c[]
        // TODO -- Implement Example
        // POST /exams/_search?size=0
        // {
        //     "aggs" : {
        //         "avg_grade" : { "avg" : { "field" : "grade" } }
        //     }
        // }
        // end::d9d28e9e9d7021a72c983f8e79aa8c6c[]

        $curl = 'POST /exams/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "avg_grade" : { "avg" : { "field" : "grade" } }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d05bbafb8c88850879b5990119a96f5e
     * Line: 43
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL43_d05bbafb8c88850879b5990119a96f5e()
    {
        $client = $this->getClient();
        // tag::d05bbafb8c88850879b5990119a96f5e[]
        // TODO -- Implement Example
        // POST /exams/_search?size=0
        // {
        //     "aggs" : {
        //         "avg_grade" : {
        //             "avg" : {
        //                 "script" : {
        //                     "source" : "doc.grade.value"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::d05bbafb8c88850879b5990119a96f5e[]

        $curl = 'POST /exams/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "avg_grade" : {'
              . '            "avg" : {'
              . '                "script" : {'
              . '                    "source" : "doc.grade.value"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c04f4a48d0cb550a879fdc93454852de
     * Line: 63
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL63_c04f4a48d0cb550a879fdc93454852de()
    {
        $client = $this->getClient();
        // tag::c04f4a48d0cb550a879fdc93454852de[]
        // TODO -- Implement Example
        // POST /exams/_search?size=0
        // {
        //     "aggs" : {
        //         "avg_grade" : {
        //             "avg" : {
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
        // end::c04f4a48d0cb550a879fdc93454852de[]

        $curl = 'POST /exams/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "avg_grade" : {'
              . '            "avg" : {'
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
     * Tag:  91994d98e766230911b3e659b3e51f17
     * Line: 88
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL88_91994d98e766230911b3e659b3e51f17()
    {
        $client = $this->getClient();
        // tag::91994d98e766230911b3e659b3e51f17[]
        // TODO -- Implement Example
        // POST /exams/_search?size=0
        // {
        //     "aggs" : {
        //         "avg_corrected_grade" : {
        //             "avg" : {
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
        // end::91994d98e766230911b3e659b3e51f17[]

        $curl = 'POST /exams/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "avg_corrected_grade" : {'
              . '            "avg" : {'
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
     * Tag:  2ec33e09d6080723ee2013bad694f35a
     * Line: 117
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL117_2ec33e09d6080723ee2013bad694f35a()
    {
        $client = $this->getClient();
        // tag::2ec33e09d6080723ee2013bad694f35a[]
        // TODO -- Implement Example
        // POST /exams/_search?size=0
        // {
        //     "aggs" : {
        //         "grade_avg" : {
        //             "avg" : {
        //                 "field" : "grade",
        //                 "missing": 10 \<1>
        //             }
        //         }
        //     }
        // }
        // end::2ec33e09d6080723ee2013bad694f35a[]

        $curl = 'POST /exams/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "grade_avg" : {'
              . '            "avg" : {'
              . '                "field" : "grade",'
              . '                "missing": 10 \<1>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
