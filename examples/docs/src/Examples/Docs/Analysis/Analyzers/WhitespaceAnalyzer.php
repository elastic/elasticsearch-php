<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Analyzers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: WhitespaceAnalyzer
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/analyzers/whitespace-analyzer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class WhitespaceAnalyzer extends SimpleExamplesTester {

    /**
     * Tag:  262a778d754add491fbc9c721ac25bf0
     * Line: 11
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL11_262a778d754add491fbc9c721ac25bf0()
    {
        $client = $this->getClient();
        // tag::262a778d754add491fbc9c721ac25bf0[]
        // TODO -- Implement Example
        // POST _analyze
        // {
        //   "analyzer": "whitespace",
        //   "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog\'s bone."
        // }
        // end::262a778d754add491fbc9c721ac25bf0[]

        $curl = 'POST _analyze'
              . '{'
              . '  "analyzer": "whitespace",'
              . '  "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog\'s bone."'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  31aed390c30bd4f42a5c56253695e53f
     * Line: 130
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL130_31aed390c30bd4f42a5c56253695e53f()
    {
        $client = $this->getClient();
        // tag::31aed390c30bd4f42a5c56253695e53f[]
        // TODO -- Implement Example
        // PUT /whitespace_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "rebuilt_whitespace": {
        //           "tokenizer": "whitespace",
        //           "filter": [         \<1>
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::31aed390c30bd4f42a5c56253695e53f[]

        $curl = 'PUT /whitespace_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "rebuilt_whitespace": {'
              . '          "tokenizer": "whitespace",'
              . '          "filter": [         \<1>'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
