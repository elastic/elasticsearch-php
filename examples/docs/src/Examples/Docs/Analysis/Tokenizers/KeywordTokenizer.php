<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenizers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: KeywordTokenizer
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/tokenizers/keyword-tokenizer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class KeywordTokenizer extends SimpleExamplesTester {

    /**
     * Tag:  09a44b619a99f6bf3f01bd5e258fd22d
     * Line: 12
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL12_09a44b619a99f6bf3f01bd5e258fd22d()
    {
        $client = $this->getClient();
        // tag::09a44b619a99f6bf3f01bd5e258fd22d[]
        // TODO -- Implement Example
        // POST _analyze
        // {
        //   "tokenizer": "keyword",
        //   "text": "New York"
        // }
        // end::09a44b619a99f6bf3f01bd5e258fd22d[]

        $curl = 'POST _analyze'
              . '{'
              . '  "tokenizer": "keyword",'
              . '  "text": "New York"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
