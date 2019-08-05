<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GlobalAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/bucket/global-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GlobalAggregation extends SimpleExamplesTester {

    /**
     * Tag:  d209f2447584a37e7f1480912b40a52d
     * Line: 15
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL15_d209f2447584a37e7f1480912b40a52d()
    {
        $client = $this->getClient();
        // tag::d209f2447584a37e7f1480912b40a52d[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "query" : {
        //         "match" : { "type" : "t-shirt" }
        //     },
        //     "aggs" : {
        //         "all_products" : {
        //             "global" : {}, \<1>
        //             "aggs" : { \<2>
        //                 "avg_price" : { "avg" : { "field" : "price" } }
        //             }
        //         },
        //         "t_shirts": { "avg" : { "field" : "price" } }
        //     }
        // }
        // end::d209f2447584a37e7f1480912b40a52d[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "query" : {'
              . '        "match" : { "type" : "t-shirt" }'
              . '    },'
              . '    "aggs" : {'
              . '        "all_products" : {'
              . '            "global" : {}, \<1>'
              . '            "aggs" : { \<2>'
              . '                "avg_price" : { "avg" : { "field" : "price" } }'
              . '            }'
              . '        },'
              . '        "t_shirts": { "avg" : { "field" : "price" } }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
