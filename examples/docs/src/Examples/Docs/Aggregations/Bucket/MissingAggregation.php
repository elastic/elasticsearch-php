<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MissingAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/bucket/missing-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MissingAggregation extends SimpleExamplesTester {

    /**
     * Tag:  09dd80a4b937315d4a1aa629b22f9332
     * Line: 9
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL9_09dd80a4b937315d4a1aa629b22f9332()
    {
        $client = $this->getClient();
        // tag::09dd80a4b937315d4a1aa629b22f9332[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "products_without_a_price" : {
        //             "missing" : { "field" : "price" }
        //         }
        //     }
        // }
        // end::09dd80a4b937315d4a1aa629b22f9332[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "products_without_a_price" : {'
              . '            "missing" : { "field" : "price" }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
