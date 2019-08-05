<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Pipeline;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DerivativeAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/pipeline/derivative-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DerivativeAggregation extends SimpleExamplesTester {

    /**
     * Tag:  469bc2e7b9e65b3b1e38a547f63bd2f9
     * Line: 38
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL38_469bc2e7b9e65b3b1e38a547f63bd2f9()
    {
        $client = $this->getClient();
        // tag::469bc2e7b9e65b3b1e38a547f63bd2f9[]
        // TODO -- Implement Example
        // POST /sales/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "sales_per_month" : {
        //             "date_histogram" : {
        //                 "field" : "date",
        //                 "calendar_interval" : "month"
        //             },
        //             "aggs": {
        //                 "sales": {
        //                     "sum": {
        //                         "field": "price"
        //                     }
        //                 },
        //                 "sales_deriv": {
        //                     "derivative": {
        //                         "buckets_path": "sales" \<1>
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::469bc2e7b9e65b3b1e38a547f63bd2f9[]

        $curl = 'POST /sales/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "sales_per_month" : {'
              . '            "date_histogram" : {'
              . '                "field" : "date",'
              . '                "calendar_interval" : "month"'
              . '            },'
              . '            "aggs": {'
              . '                "sales": {'
              . '                    "sum": {'
              . '                        "field": "price"'
              . '                    }'
              . '                },'
              . '                "sales_deriv": {'
              . '                    "derivative": {'
              . '                        "buckets_path": "sales" \<1>'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d683ed8c4a72f82200bbad0c3921e427
     * Line: 132
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL132_d683ed8c4a72f82200bbad0c3921e427()
    {
        $client = $this->getClient();
        // tag::d683ed8c4a72f82200bbad0c3921e427[]
        // TODO -- Implement Example
        // POST /sales/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "sales_per_month" : {
        //             "date_histogram" : {
        //                 "field" : "date",
        //                 "calendar_interval" : "month"
        //             },
        //             "aggs": {
        //                 "sales": {
        //                     "sum": {
        //                         "field": "price"
        //                     }
        //                 },
        //                 "sales_deriv": {
        //                     "derivative": {
        //                         "buckets_path": "sales"
        //                     }
        //                 },
        //                 "sales_2nd_deriv": {
        //                     "derivative": {
        //                         "buckets_path": "sales_deriv" \<1>
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::d683ed8c4a72f82200bbad0c3921e427[]

        $curl = 'POST /sales/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "sales_per_month" : {'
              . '            "date_histogram" : {'
              . '                "field" : "date",'
              . '                "calendar_interval" : "month"'
              . '            },'
              . '            "aggs": {'
              . '                "sales": {'
              . '                    "sum": {'
              . '                        "field": "price"'
              . '                    }'
              . '                },'
              . '                "sales_deriv": {'
              . '                    "derivative": {'
              . '                        "buckets_path": "sales"'
              . '                    }'
              . '                },'
              . '                "sales_2nd_deriv": {'
              . '                    "derivative": {'
              . '                        "buckets_path": "sales_deriv" \<1>'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8553b0c396e9de7d841fcc6373e017e2
     * Line: 232
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL232_8553b0c396e9de7d841fcc6373e017e2()
    {
        $client = $this->getClient();
        // tag::8553b0c396e9de7d841fcc6373e017e2[]
        // TODO -- Implement Example
        // POST /sales/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "sales_per_month" : {
        //             "date_histogram" : {
        //                 "field" : "date",
        //                 "calendar_interval" : "month"
        //             },
        //             "aggs": {
        //                 "sales": {
        //                     "sum": {
        //                         "field": "price"
        //                     }
        //                 },
        //                 "sales_deriv": {
        //                     "derivative": {
        //                         "buckets_path": "sales",
        //                         "unit": "day" \<1>
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::8553b0c396e9de7d841fcc6373e017e2[]

        $curl = 'POST /sales/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "sales_per_month" : {'
              . '            "date_histogram" : {'
              . '                "field" : "date",'
              . '                "calendar_interval" : "month"'
              . '            },'
              . '            "aggs": {'
              . '                "sales": {'
              . '                    "sum": {'
              . '                        "field": "price"'
              . '                    }'
              . '                },'
              . '                "sales_deriv": {'
              . '                    "derivative": {'
              . '                        "buckets_path": "sales",'
              . '                        "unit": "day" \<1>'
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
