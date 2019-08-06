<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Pipeline;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: CumulativeSumAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/pipeline/cumulative-sum-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class CumulativeSumAggregation extends SimpleExamplesTester {

    /**
     * Tag:  1ae73d3fcc39bef9ddc654bb82d5d239
     * Line: 35
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL35_1ae73d3fcc39bef9ddc654bb82d5d239()
    {
        $client = $this->getClient();
        // tag::1ae73d3fcc39bef9ddc654bb82d5d239[]
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
        //                 "cumulative_sales": {
        //                     "cumulative_sum": {
        //                         "buckets_path": "sales" \<1>
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::1ae73d3fcc39bef9ddc654bb82d5d239[]

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
              . '                "cumulative_sales": {'
              . '                    "cumulative_sum": {'
              . '                        "buckets_path": "sales" \<1>'
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
