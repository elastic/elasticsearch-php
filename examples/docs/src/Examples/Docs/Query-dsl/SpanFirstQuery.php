<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SpanFirstQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/span-first-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SpanFirstQuery extends SimpleExamplesTester {

    /**
     * Tag:  020655381882d0721472a1581e06384a
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_020655381882d0721472a1581e06384a()
    {
        $client = $this->getClient();
        // tag::020655381882d0721472a1581e06384a[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "span_first" : {
        //             "match" : {
        //                 "span_term" : { "user" : "kimchy" }
        //             },
        //             "end" : 3
        //         }
        //     }
        // }
        // end::020655381882d0721472a1581e06384a[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "span_first" : {'
              . '            "match" : {'
              . '                "span_term" : { "user" : "kimchy" }'
              . '            },'
              . '            "end" : 3'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
