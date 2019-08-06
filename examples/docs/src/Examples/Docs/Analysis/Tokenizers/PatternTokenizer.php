<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenizers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PatternTokenizer
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/tokenizers/pattern-tokenizer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PatternTokenizer extends SimpleExamplesTester {

    /**
     * Tag:  1a6dbe5df488c4a16e2f1101ba8a25d9
     * Line: 29
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL29_1a6dbe5df488c4a16e2f1101ba8a25d9()
    {
        $client = $this->getClient();
        // tag::1a6dbe5df488c4a16e2f1101ba8a25d9[]
        // TODO -- Implement Example
        // POST _analyze
        // {
        //   "tokenizer": "pattern",
        //   "text": "The foo_bar_size\'s default is 5."
        // }
        // end::1a6dbe5df488c4a16e2f1101ba8a25d9[]

        $curl = 'POST _analyze'
              . '{'
              . '  "tokenizer": "pattern",'
              . '  "text": "The foo_bar_size\'s default is 5."'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  448339a39d847c4cac57a325e23c2a5a
     * Line: 127
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL127_448339a39d847c4cac57a325e23c2a5a()
    {
        $client = $this->getClient();
        // tag::448339a39d847c4cac57a325e23c2a5a[]
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
        //           "type": "pattern",
        //           "pattern": ","
        //         }
        //       }
        //     }
        //   }
        // }
        // POST my_index/_analyze
        // {
        //   "analyzer": "my_analyzer",
        //   "text": "comma,separated,values"
        // }
        // end::448339a39d847c4cac57a325e23c2a5a[]

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
              . '          "type": "pattern",'
              . '          "pattern": ","'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "analyzer": "my_analyzer",'
              . '  "text": "comma,separated,values"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  fa8d64d622b4d7fe3234924b4de4f0bf
     * Line: 217
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL217_fa8d64d622b4d7fe3234924b4de4f0bf()
    {
        $client = $this->getClient();
        // tag::fa8d64d622b4d7fe3234924b4de4f0bf[]
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
        //           "type": "pattern",
        //           "pattern": "\"((?:\\\\\"|[^\"]|\\\\\")+)\"",
        //           "group": 1
        //         }
        //       }
        //     }
        //   }
        // }
        // POST my_index/_analyze
        // {
        //   "analyzer": "my_analyzer",
        //   "text": "\"value\", \"value with embedded \\\" quote\""
        // }
        // end::fa8d64d622b4d7fe3234924b4de4f0bf[]

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
              . '          "type": "pattern",'
              . '          "pattern": "\"((?:\\\\\"|[^\"]|\\\\\")+)\"",'
              . '          "group": 1'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "analyzer": "my_analyzer",'
              . '  "text": "\"value\", \"value with embedded \\\" quote\""'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
