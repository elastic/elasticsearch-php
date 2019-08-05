<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Pipeline
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/pipeline.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Pipeline extends SimpleExamplesTester {

    /**
     * Tag:  ec20b1c236955a545476eeeea747d9de
     * Line: 53
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL53_ec20b1c236955a545476eeeea747d9de()
    {
        $client = $this->getClient();
        // tag::ec20b1c236955a545476eeeea747d9de[]
        // TODO -- Implement Example
        // POST /_search
        // {
        //     "aggs": {
        //         "my_date_histo":{
        //             "date_histogram":{
        //                 "field":"timestamp",
        //                 "calendar_interval":"day"
        //             },
        //             "aggs":{
        //                 "the_sum":{
        //                     "sum":{ "field": "lemmings" } \<1>
        //                 },
        //                 "the_deriv":{
        //                     "derivative":{ "buckets_path": "the_sum" } \<2>
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::ec20b1c236955a545476eeeea747d9de[]

        $curl = 'POST /_search'
              . '{'
              . '    "aggs": {'
              . '        "my_date_histo":{'
              . '            "date_histogram":{'
              . '                "field":"timestamp",'
              . '                "calendar_interval":"day"'
              . '            },'
              . '            "aggs":{'
              . '                "the_sum":{'
              . '                    "sum":{ "field": "lemmings" } \<1>'
              . '                },'
              . '                "the_deriv":{'
              . '                    "derivative":{ "buckets_path": "the_sum" } \<2>'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  11be7655fdafcf4c1454a0e9ad8ddf63
     * Line: 83
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL83_11be7655fdafcf4c1454a0e9ad8ddf63()
    {
        $client = $this->getClient();
        // tag::11be7655fdafcf4c1454a0e9ad8ddf63[]
        // TODO -- Implement Example
        // POST /_search
        // {
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
        //                 }
        //             }
        //         },
        //         "max_monthly_sales": {
        //             "max_bucket": {
        //                 "buckets_path": "sales_per_month>sales" \<1>
        //             }
        //         }
        //     }
        // }
        // end::11be7655fdafcf4c1454a0e9ad8ddf63[]

        $curl = 'POST /_search'
              . '{'
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
              . '                }'
              . '            }'
              . '        },'
              . '        "max_monthly_sales": {'
              . '            "max_bucket": {'
              . '                "buckets_path": "sales_per_month>sales" \<1>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f3dd309ab027e86048b476b54f0d4ca1
     * Line: 121
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL121_f3dd309ab027e86048b476b54f0d4ca1()
    {
        $client = $this->getClient();
        // tag::f3dd309ab027e86048b476b54f0d4ca1[]
        // TODO -- Implement Example
        // POST /_search
        // {
        //     "aggs": {
        //         "my_date_histo": {
        //             "date_histogram": {
        //                 "field":"timestamp",
        //                 "calendar_interval":"day"
        //             },
        //             "aggs": {
        //                 "the_deriv": {
        //                     "derivative": { "buckets_path": "_count" } \<1>
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::f3dd309ab027e86048b476b54f0d4ca1[]

        $curl = 'POST /_search'
              . '{'
              . '    "aggs": {'
              . '        "my_date_histo": {'
              . '            "date_histogram": {'
              . '                "field":"timestamp",'
              . '                "calendar_interval":"day"'
              . '            },'
              . '            "aggs": {'
              . '                "the_deriv": {'
              . '                    "derivative": { "buckets_path": "_count" } \<1>'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2afc1231679898bd864d06679d9e951b
     * Line: 147
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL147_2afc1231679898bd864d06679d9e951b()
    {
        $client = $this->getClient();
        // tag::2afc1231679898bd864d06679d9e951b[]
        // TODO -- Implement Example
        // POST /sales/_search
        // {
        //   "size": 0,
        //   "aggs": {
        //     "histo": {
        //       "date_histogram": {
        //         "field": "date",
        //         "calendar_interval": "day"
        //       },
        //       "aggs": {
        //         "categories": {
        //           "terms": {
        //             "field": "category"
        //           }
        //         },
        //         "min_bucket_selector": {
        //           "bucket_selector": {
        //             "buckets_path": {
        //               "count": "categories._bucket_count" \<1>
        //             },
        //             "script": {
        //               "source": "params.count != 0"
        //             }
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::2afc1231679898bd864d06679d9e951b[]

        $curl = 'POST /sales/_search'
              . '{'
              . '  "size": 0,'
              . '  "aggs": {'
              . '    "histo": {'
              . '      "date_histogram": {'
              . '        "field": "date",'
              . '        "calendar_interval": "day"'
              . '      },'
              . '      "aggs": {'
              . '        "categories": {'
              . '          "terms": {'
              . '            "field": "category"'
              . '          }'
              . '        },'
              . '        "min_bucket_selector": {'
              . '          "bucket_selector": {'
              . '            "buckets_path": {'
              . '              "count": "categories._bucket_count" \<1>'
              . '            },'
              . '            "script": {'
              . '              "source": "params.count != 0"'
              . '            }'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
