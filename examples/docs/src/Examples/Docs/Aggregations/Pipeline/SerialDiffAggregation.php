<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Pipeline;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SerialDiffAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/pipeline/serial-diff-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SerialDiffAggregation extends SimpleExamplesTester {

    /**
     * Tag:  b4da132cb934c33d61e2b60988c6d4a3
     * Line: 64
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL64_b4da132cb934c33d61e2b60988c6d4a3()
    {
        $client = $this->getClient();
        // tag::b4da132cb934c33d61e2b60988c6d4a3[]
        // TODO -- Implement Example
        // POST /_search
        // {
        //    "size": 0,
        //    "aggs": {
        //       "my_date_histo": {                  \<1>
        //          "date_histogram": {
        //             "field": "timestamp",
        //             "calendar_interval": "day"
        //          },
        //          "aggs": {
        //             "the_sum": {
        //                "sum": {
        //                   "field": "lemmings"     \<2>
        //                }
        //             },
        //             "thirtieth_difference": {
        //                "serial_diff": {                \<3>
        //                   "buckets_path": "the_sum",
        //                   "lag" : 30
        //                }
        //             }
        //          }
        //       }
        //    }
        // }
        // end::b4da132cb934c33d61e2b60988c6d4a3[]

        $curl = 'POST /_search'
              . '{'
              . '   "size": 0,'
              . '   "aggs": {'
              . '      "my_date_histo": {                  \<1>'
              . '         "date_histogram": {'
              . '            "field": "timestamp",'
              . '            "calendar_interval": "day"'
              . '         },'
              . '         "aggs": {'
              . '            "the_sum": {'
              . '               "sum": {'
              . '                  "field": "lemmings"     \<2>'
              . '               }'
              . '            },'
              . '            "thirtieth_difference": {'
              . '               "serial_diff": {                \<3>'
              . '                  "buckets_path": "the_sum",'
              . '                  "lag" : 30'
              . '               }'
              . '            }'
              . '         }'
              . '      }'
              . '   }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
