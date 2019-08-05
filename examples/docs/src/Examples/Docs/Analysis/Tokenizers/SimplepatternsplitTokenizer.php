<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenizers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SimplepatternsplitTokenizer
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/tokenizers/simplepatternsplit-tokenizer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SimplepatternsplitTokenizer extends SimpleExamplesTester {

    /**
     * Tag:  5c28bb67716ed2bbe03c1d5d3733cb42
     * Line: 39
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL39_5c28bb67716ed2bbe03c1d5d3733cb42()
    {
        $client = $this->getClient();
        // tag::5c28bb67716ed2bbe03c1d5d3733cb42[]
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
        //           "type": "simple_pattern_split",
        //           "pattern": "_"
        //         }
        //       }
        //     }
        //   }
        // }
        // POST my_index/_analyze
        // {
        //   "analyzer": "my_analyzer",
        //   "text": "an_underscored_phrase"
        // }
        // end::5c28bb67716ed2bbe03c1d5d3733cb42[]

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
              . '          "type": "simple_pattern_split",'
              . '          "pattern": "_"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "analyzer": "my_analyzer",'
              . '  "text": "an_underscored_phrase"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
