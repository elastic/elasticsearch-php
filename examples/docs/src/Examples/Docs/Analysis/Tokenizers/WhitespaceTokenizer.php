<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenizers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: WhitespaceTokenizer
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/tokenizers/whitespace-tokenizer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class WhitespaceTokenizer extends SimpleExamplesTester {

    /**
     * Tag:  7b9dfe5857bde1bd8483ea3241656714
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_7b9dfe5857bde1bd8483ea3241656714()
    {
        $client = $this->getClient();
        // tag::7b9dfe5857bde1bd8483ea3241656714[]
        // TODO -- Implement Example
        // POST _analyze
        // {
        //   "tokenizer": "whitespace",
        //   "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog's bone."
        // }
        // end::7b9dfe5857bde1bd8483ea3241656714[]

        $curl = 'POST _analyze'
              . '{'
              . '  "tokenizer": "whitespace",'
              . '  "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog's bone."'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
