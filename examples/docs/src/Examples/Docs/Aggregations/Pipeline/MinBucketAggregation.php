<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Pipeline;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MinBucketAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/pipeline/min-bucket-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MinBucketAggregation extends SimpleExamplesTester {

    /**
     * Tag:  e668549ff72fd0b9568667d1a817fc6e
     * Line: 37
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL37_e668549ff72fd0b9568667d1a817fc6e()
    {
        $client = $this->getClient();
        // tag::e668549ff72fd0b9568667d1a817fc6e[]
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
        //         "min_monthly_sales": {
        //             "min_bucket": {
        //                 "buckets_path": "sales_per_month>sales" \<1>
        //             }
        //         }
        //     }
        // }
        // end::e668549ff72fd0b9568667d1a817fc6e[]

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
              . '        "min_monthly_sales": {'
              . '            "min_bucket": {'
              . '                "buckets_path": "sales_per_month>sales" \<1>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
