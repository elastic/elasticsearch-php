<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Pipeline;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: BucketSelectorAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/pipeline/bucket-selector-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class BucketSelectorAggregation extends SimpleExamplesTester {

    /**
     * Tag:  7851d52ed462f0a1bdfd4f676e4a4363
     * Line: 48
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL48_7851d52ed462f0a1bdfd4f676e4a4363()
    {
        $client = $this->getClient();
        // tag::7851d52ed462f0a1bdfd4f676e4a4363[]
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
        //                 "sales_bucket_filter": {
        //                     "bucket_selector": {
        //                         "buckets_path": {
        //                           "totalSales": "total_sales"
        //                         },
        //                         "script": "params.totalSales > 200"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::7851d52ed462f0a1bdfd4f676e4a4363[]

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
              . '                "sales_bucket_filter": {'
              . '                    "bucket_selector": {'
              . '                        "buckets_path": {'
              . '                          "totalSales": "total_sales"'
              . '                        },'
              . '                        "script": "params.totalSales > 200"'
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
