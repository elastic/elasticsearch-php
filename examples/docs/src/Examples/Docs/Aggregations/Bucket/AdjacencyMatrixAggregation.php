<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: AdjacencyMatrixAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/bucket/adjacency-matrix-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class AdjacencyMatrixAggregation extends SimpleExamplesTester {

    /**
     * Tag:  f88cdb3a962bb6f305f4a7ccc07bc0b0
     * Line: 32
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL32_f88cdb3a962bb6f305f4a7ccc07bc0b0()
    {
        $client = $this->getClient();
        // tag::f88cdb3a962bb6f305f4a7ccc07bc0b0[]
        // TODO -- Implement Example
        // PUT /emails/_bulk?refresh
        // { "index" : { "_id" : 1 } }
        // { "accounts" : ["hillary", "sidney"]}
        // { "index" : { "_id" : 2 } }
        // { "accounts" : ["hillary", "donald"]}
        // { "index" : { "_id" : 3 } }
        // { "accounts" : ["vladimir", "donald"]}
        // GET emails/_search
        // {
        //   "size": 0,
        //   "aggs" : {
        //     "interactions" : {
        //       "adjacency_matrix" : {
        //         "filters" : {
        //           "grpA" : { "terms" : { "accounts" : ["hillary", "sidney"] }},
        //           "grpB" : { "terms" : { "accounts" : ["donald", "mitt"] }},
        //           "grpC" : { "terms" : { "accounts" : ["vladimir", "nigel"] }}
        //         }
        //       }
        //     }
        //   }
        // }
        // end::f88cdb3a962bb6f305f4a7ccc07bc0b0[]

        $curl = 'PUT /emails/_bulk?refresh'
              . '{ "index" : { "_id" : 1 } }'
              . '{ "accounts" : ["hillary", "sidney"]}'
              . '{ "index" : { "_id" : 2 } }'
              . '{ "accounts" : ["hillary", "donald"]}'
              . '{ "index" : { "_id" : 3 } }'
              . '{ "accounts" : ["vladimir", "donald"]}'
              . 'GET emails/_search'
              . '{'
              . '  "size": 0,'
              . '  "aggs" : {'
              . '    "interactions" : {'
              . '      "adjacency_matrix" : {'
              . '        "filters" : {'
              . '          "grpA" : { "terms" : { "accounts" : ["hillary", "sidney"] }},'
              . '          "grpB" : { "terms" : { "accounts" : ["donald", "mitt"] }},'
              . '          "grpC" : { "terms" : { "accounts" : ["vladimir", "nigel"] }}'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
