<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenizers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ThaiTokenizer
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/tokenizers/thai-tokenizer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ThaiTokenizer extends SimpleExamplesTester {

    /**
     * Tag:  a1e5f3956f9a697e79478fc9a6e30e1f
     * Line: 17
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL17_a1e5f3956f9a697e79478fc9a6e30e1f()
    {
        $client = $this->getClient();
        // tag::a1e5f3956f9a697e79478fc9a6e30e1f[]
        // TODO -- Implement Example
        // POST _analyze
        // {
        //   "tokenizer": "thai",
        //   "text": "การที่ได้ต้องแสดงว่างานดี"
        // }
        // end::a1e5f3956f9a697e79478fc9a6e30e1f[]

        $curl = 'POST _analyze'
              . '{'
              . '  "tokenizer": "thai",'
              . '  "text": "การที่ได้ต้องแสดงว่างานดี"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
