<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SpanTermQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/span-term-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SpanTermQuery extends SimpleExamplesTester {

    /**
     * Tag:  086b2bbc4c3bfc2310c22d10db42cb82
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_086b2bbc4c3bfc2310c22d10db42cb82()
    {
        $client = $this->getClient();
        // tag::086b2bbc4c3bfc2310c22d10db42cb82[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "span_term" : { "user" : "kimchy" }
        //     }
        // }
        // end::086b2bbc4c3bfc2310c22d10db42cb82[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "span_term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5add42087c83b7e498f8f43e91f343d4
     * Line: 24
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL24_5add42087c83b7e498f8f43e91f343d4()
    {
        $client = $this->getClient();
        // tag::5add42087c83b7e498f8f43e91f343d4[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //        "span_term" : { "user" : { "value" : "kimchy", "boost" : 2.0 } }
        //     }
        // }
        // end::5add42087c83b7e498f8f43e91f343d4[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '       "span_term" : { "user" : { "value" : "kimchy", "boost" : 2.0 } }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2a07d189553602066fefdb6b7cbdf542
     * Line: 37
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL37_2a07d189553602066fefdb6b7cbdf542()
    {
        $client = $this->getClient();
        // tag::2a07d189553602066fefdb6b7cbdf542[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "span_term" : { "user" : { "term" : "kimchy", "boost" : 2.0 } }
        //     }
        // }
        // end::2a07d189553602066fefdb6b7cbdf542[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "span_term" : { "user" : { "term" : "kimchy", "boost" : 2.0 } }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
