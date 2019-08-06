<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenizers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ChargroupTokenizer
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/tokenizers/chargroup-tokenizer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ChargroupTokenizer extends SimpleExamplesTester {

    /**
     * Tag:  f8cafb1a08bc9b2dd5239f99d4e93f4c
     * Line: 26
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL26_f8cafb1a08bc9b2dd5239f99d4e93f4c()
    {
        $client = $this->getClient();
        // tag::f8cafb1a08bc9b2dd5239f99d4e93f4c[]
        // TODO -- Implement Example
        // POST _analyze
        // {
        //   "tokenizer": {
        //     "type": "char_group",
        //     "tokenize_on_chars": [
        //       "whitespace",
        //       "-",
        //       "\n"
        //     ]
        //   },
        //   "text": "The QUICK brown-fox"
        // }
        // end::f8cafb1a08bc9b2dd5239f99d4e93f4c[]

        $curl = 'POST _analyze'
              . '{'
              . '  "tokenizer": {'
              . '    "type": "char_group",'
              . '    "tokenize_on_chars": ['
              . '      "whitespace",'
              . '      "-",'
              . '      "\n"'
              . '    ]'
              . '  },'
              . '  "text": "The QUICK brown-fox"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
