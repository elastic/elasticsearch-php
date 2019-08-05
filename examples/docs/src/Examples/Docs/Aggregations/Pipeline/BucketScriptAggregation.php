<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Pipeline;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: BucketScriptAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/pipeline/bucket-script-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class BucketScriptAggregation extends SimpleExamplesTester {

    /**
     * Tag:  c2d90e1c88ff5b1857ed4a5b169c9689
     * Line: 45
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL45_c2d90e1c88ff5b1857ed4a5b169c9689()
    {
        $client = $this->getClient();
        // tag::c2d90e1c88ff5b1857ed4a5b169c9689[]
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
        //                 "total_sales": {
        //                     "sum": {
        //                         "field": "price"
        //                     }
        //                 },
        //                 "t-shirts": {
        //                   "filter": {
        //                     "term": {
        //                       "type": "t-shirt"
        //                     }
        //                   },
        //                   "aggs": {
        //                     "sales": {
        //                       "sum": {
        //                         "field": "price"
        //                       }
        //                     }
        //                   }
        //                 },
        //                 "t-shirt-percentage": {
        //                     "bucket_script": {
        //                         "buckets_path": {
        //                           "tShirtSales": "t-shirts>sales",
        //                           "totalSales": "total_sales"
        //                         },
        //                         "script": "params.tShirtSales / params.totalSales * 100"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::c2d90e1c88ff5b1857ed4a5b169c9689[]

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
              . '                "total_sales": {'
              . '                    "sum": {'
              . '                        "field": "price"'
              . '                    }'
              . '                },'
              . '                "t-shirts": {'
              . '                  "filter": {'
              . '                    "term": {'
              . '                      "type": "t-shirt"'
              . '                    }'
              . '                  },'
              . '                  "aggs": {'
              . '                    "sales": {'
              . '                      "sum": {'
              . '                        "field": "price"'
              . '                      }'
              . '                    }'
              . '                  }'
              . '                },'
              . '                "t-shirt-percentage": {'
              . '                    "bucket_script": {'
              . '                        "buckets_path": {'
              . '                          "tShirtSales": "t-shirts>sales",'
              . '                          "totalSales": "total_sales"'
              . '                        },'
              . '                        "script": "params.tShirtSales / params.totalSales * 100"'
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
