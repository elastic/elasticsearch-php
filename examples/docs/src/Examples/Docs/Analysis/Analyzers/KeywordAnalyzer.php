<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Analyzers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: KeywordAnalyzer
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/analyzers/keyword-analyzer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class KeywordAnalyzer extends SimpleExamplesTester {

    /**
     * Tag:  19ee488226d357d1576e7d3ae7a4693f
     * Line: 11
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL11_19ee488226d357d1576e7d3ae7a4693f()
    {
        $client = $this->getClient();
        // tag::19ee488226d357d1576e7d3ae7a4693f[]
        // TODO -- Implement Example
        // POST _analyze
        // {
        //   "analyzer": "keyword",
        //   "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog\'s bone."
        // }
        // end::19ee488226d357d1576e7d3ae7a4693f[]

        $curl = 'POST _analyze'
              . '{'
              . '  "analyzer": "keyword",'
              . '  "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog\'s bone."'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c1efc5cfcb3c29711bfe118f1baa28b0
     * Line: 70
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL70_c1efc5cfcb3c29711bfe118f1baa28b0()
    {
        $client = $this->getClient();
        // tag::c1efc5cfcb3c29711bfe118f1baa28b0[]
        // TODO -- Implement Example
        // PUT /keyword_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "rebuilt_keyword": {
        //           "tokenizer": "keyword",
        //           "filter": [         \<1>
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::c1efc5cfcb3c29711bfe118f1baa28b0[]

        $curl = 'PUT /keyword_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "rebuilt_keyword": {'
              . '          "tokenizer": "keyword",'
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
