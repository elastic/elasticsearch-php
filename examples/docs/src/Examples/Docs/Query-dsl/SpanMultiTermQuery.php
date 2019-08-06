<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SpanMultiTermQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/span-multi-term-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SpanMultiTermQuery extends SimpleExamplesTester {

    /**
     * Tag:  a22f79d01a4a625840072024feb60b46
     * Line: 12
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL12_a22f79d01a4a625840072024feb60b46()
    {
        $client = $this->getClient();
        // tag::a22f79d01a4a625840072024feb60b46[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "span_multi":{
        //             "match":{
        //                 "prefix" : { "user" :  { "value" : "ki" } }
        //             }
        //         }
        //     }
        // }
        // end::a22f79d01a4a625840072024feb60b46[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "span_multi":{'
              . '            "match":{'
              . '                "prefix" : { "user" :  { "value" : "ki" } }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  87ffa93d8de41fd0c3ea2f52378dab9c
     * Line: 29
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL29_87ffa93d8de41fd0c3ea2f52378dab9c()
    {
        $client = $this->getClient();
        // tag::87ffa93d8de41fd0c3ea2f52378dab9c[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "span_multi":{
        //             "match":{
        //                 "prefix" : { "user" :  { "value" : "ki", "boost" : 1.08 } }
        //             }
        //         }
        //     }
        // }
        // end::87ffa93d8de41fd0c3ea2f52378dab9c[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "span_multi":{'
              . '            "match":{'
              . '                "prefix" : { "user" :  { "value" : "ki", "boost" : 1.08 } }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
