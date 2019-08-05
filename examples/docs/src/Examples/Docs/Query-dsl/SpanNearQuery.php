<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SpanNearQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/span-near-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SpanNearQuery extends SimpleExamplesTester {

    /**
     * Tag:  35ee06bbcc1291446187f1eeaf7eed90
     * Line: 13
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL13_35ee06bbcc1291446187f1eeaf7eed90()
    {
        $client = $this->getClient();
        // tag::35ee06bbcc1291446187f1eeaf7eed90[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "span_near" : {
        //             "clauses" : [
        //                 { "span_term" : { "field" : "value1" } },
        //                 { "span_term" : { "field" : "value2" } },
        //                 { "span_term" : { "field" : "value3" } }
        //             ],
        //             "slop" : 12,
        //             "in_order" : false
        //         }
        //     }
        // }
        // end::35ee06bbcc1291446187f1eeaf7eed90[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "span_near" : {'
              . '            "clauses" : ['
              . '                { "span_term" : { "field" : "value1" } },'
              . '                { "span_term" : { "field" : "value2" } },'
              . '                { "span_term" : { "field" : "value3" } }'
              . '            ],'
              . '            "slop" : 12,'
              . '            "in_order" : false'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
