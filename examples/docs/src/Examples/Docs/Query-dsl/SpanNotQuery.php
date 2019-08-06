<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SpanNotQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/span-not-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SpanNotQuery extends SimpleExamplesTester {

    /**
     * Tag:  4a3b37cdf27279800355ccdef0e13128
     * Line: 13
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL13_4a3b37cdf27279800355ccdef0e13128()
    {
        $client = $this->getClient();
        // tag::4a3b37cdf27279800355ccdef0e13128[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "span_not" : {
        //             "include" : {
        //                 "span_term" : { "field1" : "hoya" }
        //             },
        //             "exclude" : {
        //                 "span_near" : {
        //                     "clauses" : [
        //                         { "span_term" : { "field1" : "la" } },
        //                         { "span_term" : { "field1" : "hoya" } }
        //                     ],
        //                     "slop" : 0,
        //                     "in_order" : true
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::4a3b37cdf27279800355ccdef0e13128[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "span_not" : {'
              . '            "include" : {'
              . '                "span_term" : { "field1" : "hoya" }'
              . '            },'
              . '            "exclude" : {'
              . '                "span_near" : {'
              . '                    "clauses" : ['
              . '                        { "span_term" : { "field1" : "la" } },'
              . '                        { "span_term" : { "field1" : "hoya" } }'
              . '                    ],'
              . '                    "slop" : 0,'
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
