<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Pipeline;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: BucketSortAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/pipeline/bucket-sort-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class BucketSortAggregation extends SimpleExamplesTester {

    /**
     * Tag:  7881659b181997486731d92712fbdca9
     * Line: 51
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL51_7881659b181997486731d92712fbdca9()
    {
        $client = $this->getClient();
        // tag::7881659b181997486731d92712fbdca9[]
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
        //                 "sales_bucket_sort": {
        //                     "bucket_sort": {
        //                         "sort": [
        //                           {"total_sales": {"order": "desc"}}\<1>
        //                         ],
        //                         "size": 3\<2>
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::7881659b181997486731d92712fbdca9[]

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
              . '                "sales_bucket_sort": {'
              . '                    "bucket_sort": {'
              . '                        "sort": ['
              . '                          {"total_sales": {"order": "desc"}}\<1>'
              . '                        ],'
              . '                        "size": 3\<2>'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  541c4f4fb5959cf88423196e51c7e0ef
     * Line: 139
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL139_541c4f4fb5959cf88423196e51c7e0ef()
    {
        $client = $this->getClient();
        // tag::541c4f4fb5959cf88423196e51c7e0ef[]
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
        //                 "bucket_truncate": {
        //                     "bucket_sort": {
        //                         "from": 1,
        //                         "size": 1
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::541c4f4fb5959cf88423196e51c7e0ef[]

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
              . '                "bucket_truncate": {'
              . '                    "bucket_sort": {'
              . '                        "from": 1,'
              . '                        "size": 1'
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
