<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SpanContainingQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/span-containing-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SpanContainingQuery extends SimpleExamplesTester {

    /**
     * Tag:  73094e82ce3850cbb6f9d071cc8a2d14
     * Line: 11
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL11_73094e82ce3850cbb6f9d071cc8a2d14()
    {
        $client = $this->getClient();
        // tag::73094e82ce3850cbb6f9d071cc8a2d14[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "span_containing" : {
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
        // end::73094e82ce3850cbb6f9d071cc8a2d14[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "span_containing" : {'
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
