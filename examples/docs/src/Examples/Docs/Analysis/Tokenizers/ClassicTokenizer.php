<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenizers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ClassicTokenizer
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/tokenizers/classic-tokenizer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ClassicTokenizer extends SimpleExamplesTester {

    /**
     * Tag:  c6d39d22188dc7bbfdad811a94cbcc2b
     * Line: 22
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL22_c6d39d22188dc7bbfdad811a94cbcc2b()
    {
        $client = $this->getClient();
        // tag::c6d39d22188dc7bbfdad811a94cbcc2b[]
        // TODO -- Implement Example
        // POST _analyze
        // {
        //   "tokenizer": "classic",
        //   "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog\'s bone."
        // }
        // end::c6d39d22188dc7bbfdad811a94cbcc2b[]

        $curl = 'POST _analyze'
              . '{'
              . '  "tokenizer": "classic",'
              . '  "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog\'s bone."'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  326f5bc3013c80c2ee005c676a877ecf
     * Line: 147
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL147_326f5bc3013c80c2ee005c676a877ecf()
    {
        $client = $this->getClient();
        // tag::326f5bc3013c80c2ee005c676a877ecf[]
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
        //           "type": "classic",
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
        // end::326f5bc3013c80c2ee005c676a877ecf[]

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
              . '          "type": "classic",'
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
