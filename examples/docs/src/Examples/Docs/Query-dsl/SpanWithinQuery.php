<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SpanWithinQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/span-within-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SpanWithinQuery extends SimpleExamplesTester {

    /**
     * Tag:  9429e565d0b56289a10b81220660163c
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_9429e565d0b56289a10b81220660163c()
    {
        $client = $this->getClient();
        // tag::9429e565d0b56289a10b81220660163c[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "span_within" : {
        //             "little" : {
        //                 "span_term" : { "field1" : "foo" }
        //             },
        //             "big" : {
        //                 "span_near" : {
        //                     "clauses" : [
        //                         { "span_term" : { "field1" : "bar" } },
        //                         { "span_term" : { "field1" : "baz" } }
        //                     ],
        //                     "slop" : 5,
        //                     "in_order" : true
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::9429e565d0b56289a10b81220660163c[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "span_within" : {'
              . '            "little" : {'
              . '                "span_term" : { "field1" : "foo" }'
              . '            },'
              . '            "big" : {'
              . '                "span_near" : {'
              . '                    "clauses" : ['
              . '                        { "span_term" : { "field1" : "bar" } },'
              . '                        { "span_term" : { "field1" : "baz" } }'
              . '                    ],'
              . '                    "slop" : 5,'
              . '                    "in_order" : true'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
