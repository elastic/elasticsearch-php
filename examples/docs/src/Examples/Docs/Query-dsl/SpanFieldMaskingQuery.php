<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SpanFieldMaskingQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/span-field-masking-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SpanFieldMaskingQuery extends SimpleExamplesTester {

    /**
     * Tag:  b59861ad84352fee3e78bc869ccbe8b0
     * Line: 16
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL16_b59861ad84352fee3e78bc869ccbe8b0()
    {
        $client = $this->getClient();
        // tag::b59861ad84352fee3e78bc869ccbe8b0[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //   "query": {
        //     "span_near": {
        //       "clauses": [
        //         {
        //           "span_term": {
        //             "text": "quick brown"
        //           }
        //         },
        //         {
        //           "field_masking_span": {
        //             "query": {
        //               "span_term": {
        //                 "text.stems": "fox"
        //               }
        //             },
        //             "field": "text"
        //           }
        //         }
        //       ],
        //       "slop": 5,
        //       "in_order": false
        //     }
        //   }
        // }
        // end::b59861ad84352fee3e78bc869ccbe8b0[]

        $curl = 'GET /_search'
              . '{'
              . '  "query": {'
              . '    "span_near": {'
              . '      "clauses": ['
              . '        {'
              . '          "span_term": {'
              . '            "text": "quick brown"'
              . '          }'
              . '        },'
              . '        {'
              . '          "field_masking_span": {'
              . '            "query": {'
              . '              "span_term": {'
              . '                "text.stems": "fox"'
              . '              }'
              . '            },'
              . '            "field": "text"'
              . '          }'
              . '        }'
              . '      ],'
              . '      "slop": 5,'
              . '      "in_order": false'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
