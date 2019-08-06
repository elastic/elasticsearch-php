<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Pipeline;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MaxBucketAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/pipeline/max-bucket-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MaxBucketAggregation extends SimpleExamplesTester {

    /**
     * Tag:  ce5d556d90d0fb077ab078e055005f3a
     * Line: 37
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL37_ce5d556d90d0fb077ab078e055005f3a()
    {
        $client = $this->getClient();
        // tag::ce5d556d90d0fb077ab078e055005f3a[]
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
        //         "max_monthly_sales": {
        //             "max_bucket": {
        //                 "buckets_path": "sales_per_month>sales" \<1>
        //             }
        //         }
        //     }
        // }
        // end::ce5d556d90d0fb077ab078e055005f3a[]

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
              . '        "max_monthly_sales": {'
              . '            "max_bucket": {'
              . '                "buckets_path": "sales_per_month>sales" \<1>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
