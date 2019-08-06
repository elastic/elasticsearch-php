<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenizers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: NgramTokenizer
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/tokenizers/ngram-tokenizer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class NgramTokenizer extends SimpleExamplesTester {

    /**
     * Tag:  39963032d423e2f20f53c4621b6ca3c6
     * Line: 21
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL21_39963032d423e2f20f53c4621b6ca3c6()
    {
        $client = $this->getClient();
        // tag::39963032d423e2f20f53c4621b6ca3c6[]
        // TODO -- Implement Example
        // POST _analyze
        // {
        //   "tokenizer": "ngram",
        //   "text": "Quick Fox"
        // }
        // end::39963032d423e2f20f53c4621b6ca3c6[]

        $curl = 'POST _analyze'
              . '{'
              . '  "tokenizer": "ngram",'
              . '  "text": "Quick Fox"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9efcafd1f28490fd658d88df7d93c66c
     * Line: 211
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL211_9efcafd1f28490fd658d88df7d93c66c()
    {
        $client = $this->getClient();
        // tag::9efcafd1f28490fd658d88df7d93c66c[]
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
        //           "type": "ngram",
        //           "min_gram": 3,
        //           "max_gram": 3,
        //           "token_chars": [
        //             "letter",
        //             "digit"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // POST my_index/_analyze
        // {
        //   "analyzer": "my_analyzer",
        //   "text": "2 Quick Foxes."
        // }
        // end::9efcafd1f28490fd658d88df7d93c66c[]

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
              . '          "type": "ngram",'
              . '          "min_gram": 3,'
              . '          "max_gram": 3,'
              . '          "token_chars": ['
              . '            "letter",'
              . '            "digit"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "analyzer": "my_analyzer",'
              . '  "text": "2 Quick Foxes."'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
