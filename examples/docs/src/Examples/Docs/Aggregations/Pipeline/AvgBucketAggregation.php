<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Pipeline;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: AvgBucketAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/pipeline/avg-bucket-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class AvgBucketAggregation extends SimpleExamplesTester {

    /**
     * Tag:  b3e8697874ed65ed6cb62f2568bcc55e
     * Line: 37
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL37_b3e8697874ed65ed6cb62f2568bcc55e()
    {
        $client = $this->getClient();
        // tag::b3e8697874ed65ed6cb62f2568bcc55e[]
        // TODO -- Implement Example
        // POST /_search
        // {
        //   "size": 0,
        //   "aggs": {
        //     "sales_per_month": {
        //       "date_histogram": {
        //         "field": "date",
        //         "calendar_interval": "month"
        //       },
        //       "aggs": {
        //         "sales": {
        //           "sum": {
        //             "field": "price"
        //           }
        //         }
        //       }
        //     },
        //     "avg_monthly_sales": {
        //       "avg_bucket": {
        //         "buckets_path": "sales_per_month>sales" \<1>
        //       }
        //     }
        //   }
        // }
        // end::b3e8697874ed65ed6cb62f2568bcc55e[]

        $curl = 'POST /_search'
              . '{'
              . '  "size": 0,'
              . '  "aggs": {'
              . '    "sales_per_month": {'
              . '      "date_histogram": {'
              . '        "field": "date",'
              . '        "calendar_interval": "month"'
              . '      },'
              . '      "aggs": {'
              . '        "sales": {'
              . '          "sum": {'
              . '            "field": "price"'
              . '          }'
              . '        }'
              . '      }'
              . '    },'
              . '    "avg_monthly_sales": {'
              . '      "avg_bucket": {'
              . '        "buckets_path": "sales_per_month>sales" \<1>'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
