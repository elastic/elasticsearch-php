<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Pipeline;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: StatsBucketAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/pipeline/stats-bucket-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class StatsBucketAggregation extends SimpleExamplesTester {

    /**
     * Tag:  8a187c87964774530ef99f8962d83da5
     * Line: 36
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL36_8a187c87964774530ef99f8962d83da5()
    {
        $client = $this->getClient();
        // tag::8a187c87964774530ef99f8962d83da5[]
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
        //                 }
        //             }
        //         },
        //         "stats_monthly_sales": {
        //             "stats_bucket": {
        //                 "buckets_path": "sales_per_month>sales" \<1>
        //             }
        //         }
        //     }
        // }
        // end::8a187c87964774530ef99f8962d83da5[]

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
              . '                }'
              . '            }'
              . '        },'
              . '        "stats_monthly_sales": {'
              . '            "stats_bucket": {'
              . '                "buckets_path": "sales_per_month>sales" \<1>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
