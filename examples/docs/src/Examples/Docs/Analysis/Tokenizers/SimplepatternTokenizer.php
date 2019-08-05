<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenizers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SimplepatternTokenizer
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/tokenizers/simplepattern-tokenizer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SimplepatternTokenizer extends SimpleExamplesTester {

    /**
     * Tag:  9ffc049d5c5a570b90d913e92f910ee4
     * Line: 38
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL38_9ffc049d5c5a570b90d913e92f910ee4()
    {
        $client = $this->getClient();
        // tag::9ffc049d5c5a570b90d913e92f910ee4[]
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
        //           "type": "simple_pattern",
        //           "pattern": "[0123456789]{3}"
        //         }
        //       }
        //     }
        //   }
        // }
        // POST my_index/_analyze
        // {
        //   "analyzer": "my_analyzer",
        //   "text": "fd-786-335-514-x"
        // }
        // end::9ffc049d5c5a570b90d913e92f910ee4[]

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
              . '          "type": "simple_pattern",'
              . '          "pattern": "[0123456789]{3}"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "analyzer": "my_analyzer",'
              . '  "text": "fd-786-335-514-x"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
