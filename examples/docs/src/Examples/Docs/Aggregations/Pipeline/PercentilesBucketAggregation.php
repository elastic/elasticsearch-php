<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Pipeline;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PercentilesBucketAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/pipeline/percentiles-bucket-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PercentilesBucketAggregation extends SimpleExamplesTester {

    /**
     * Tag:  cff65c0f9fbc53c26c60abe9fb7e4044
     * Line: 38
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL38_cff65c0f9fbc53c26c60abe9fb7e4044()
    {
        $client = $this->getClient();
        // tag::cff65c0f9fbc53c26c60abe9fb7e4044[]
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
        //         "percentiles_monthly_sales": {
        //             "percentiles_bucket": {
        //                 "buckets_path": "sales_per_month>sales", \<1>
        //                 "percents": [ 25.0, 50.0, 75.0 ] \<2>
        //             }
        //         }
        //     }
        // }
        // end::cff65c0f9fbc53c26c60abe9fb7e4044[]

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
              . '        "percentiles_monthly_sales": {'
              . '            "percentiles_bucket": {'
              . '                "buckets_path": "sales_per_month>sales", \<1>'
              . '                "percents": [ 25.0, 50.0, 75.0 ] \<2>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
