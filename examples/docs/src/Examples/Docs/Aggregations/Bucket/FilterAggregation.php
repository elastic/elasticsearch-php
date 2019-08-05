<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: FilterAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/bucket/filter-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class FilterAggregation extends SimpleExamplesTester {

    /**
     * Tag:  b93ed4ef309819734f0eeea82e8b0f1f
     * Line: 9
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL9_b93ed4ef309819734f0eeea82e8b0f1f()
    {
        $client = $this->getClient();
        // tag::b93ed4ef309819734f0eeea82e8b0f1f[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "t_shirts" : {
        //             "filter" : { "term": { "type": "t-shirt" } },
        //             "aggs" : {
        //                 "avg_price" : { "avg" : { "field" : "price" } }
        //             }
        //         }
        //     }
        // }
        // end::b93ed4ef309819734f0eeea82e8b0f1f[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "t_shirts" : {'
              . '            "filter" : { "term": { "type": "t-shirt" } },'
              . '            "aggs" : {'
              . '                "avg_price" : { "avg" : { "field" : "price" } }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
