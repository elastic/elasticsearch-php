<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SpanOrQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/span-or-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SpanOrQuery extends SimpleExamplesTester {

    /**
     * Tag:  b8b1c96897001708b2cfad92ac36a21f
     * Line: 11
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL11_b8b1c96897001708b2cfad92ac36a21f()
    {
        $client = $this->getClient();
        // tag::b8b1c96897001708b2cfad92ac36a21f[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "span_or" : {
        //             "clauses" : [
        //                 { "span_term" : { "field" : "value1" } },
        //                 { "span_term" : { "field" : "value2" } },
        //                 { "span_term" : { "field" : "value3" } }
        //             ]
        //         }
        //     }
        // }
        // end::b8b1c96897001708b2cfad92ac36a21f[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "span_or" : {'
              . '            "clauses" : ['
              . '                { "span_term" : { "field" : "value1" } },'
              . '                { "span_term" : { "field" : "value2" } },'
              . '                { "span_term" : { "field" : "value3" } }'
              . '            ]'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
