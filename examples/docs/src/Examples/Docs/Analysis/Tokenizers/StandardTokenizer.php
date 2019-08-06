<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenizers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: StandardTokenizer
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/tokenizers/standard-tokenizer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class StandardTokenizer extends SimpleExamplesTester {

    /**
     * Tag:  88a08d0b15ef41324f5c23db533d47d1
     * Line: 13
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL13_88a08d0b15ef41324f5c23db533d47d1()
    {
        $client = $this->getClient();
        // tag::88a08d0b15ef41324f5c23db533d47d1[]
        // TODO -- Implement Example
        // POST _analyze
        // {
        //   "tokenizer": "standard",
        //   "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog\'s bone."
        // }
        // end::88a08d0b15ef41324f5c23db533d47d1[]

        $curl = 'POST _analyze'
              . '{'
              . '  "tokenizer": "standard",'
              . '  "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog\'s bone."'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7375d4fe72c848ee3b0a799fda8bb0f0
     * Line: 138
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL138_7375d4fe72c848ee3b0a799fda8bb0f0()
    {
        $client = $this->getClient();
        // tag::7375d4fe72c848ee3b0a799fda8bb0f0[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "my_analyzer": {
        //           "tokenizer": "my_tokenizer"
        //         }
        //       },
        //       "tokenizer": {
        //         "my_tokenizer": {
        //           "type": "standard",
        //           "max_token_length": 5
        //         }
        //       }
        //     }
        //   }
        // }
        // POST my_index/_analyze
        // {
        //   "analyzer": "my_analyzer",
        //   "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog\'s bone."
        // }
        // end::7375d4fe72c848ee3b0a799fda8bb0f0[]

        $curl = 'PUT my_index'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "my_analyzer": {'
              . '          "tokenizer": "my_tokenizer"'
              . '        }'
              . '      },'
              . '      "tokenizer": {'
              . '        "my_tokenizer": {'
              . '          "type": "standard",'
              . '          "max_token_length": 5'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "analyzer": "my_analyzer",'
              . '  "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog\'s bone."'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
