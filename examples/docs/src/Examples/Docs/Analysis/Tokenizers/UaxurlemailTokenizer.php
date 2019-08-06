<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenizers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: UaxurlemailTokenizer
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/tokenizers/uaxurlemail-tokenizer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class UaxurlemailTokenizer extends SimpleExamplesTester {

    /**
     * Tag:  d12df43ffcdcd937bae9b26fb475e239
     * Line: 11
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL11_d12df43ffcdcd937bae9b26fb475e239()
    {
        $client = $this->getClient();
        // tag::d12df43ffcdcd937bae9b26fb475e239[]
        // TODO -- Implement Example
        // POST _analyze
        // {
        //   "tokenizer": "uax_url_email",
        //   "text": "Email me at john.smith@global-international.com"
        // }
        // end::d12df43ffcdcd937bae9b26fb475e239[]

        $curl = 'POST _analyze'
              . '{'
              . '  "tokenizer": "uax_url_email",'
              . '  "text": "Email me at john.smith@global-international.com"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1125986e8e55028ff4c10b5e6c7bbebb
     * Line: 94
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL94_1125986e8e55028ff4c10b5e6c7bbebb()
    {
        $client = $this->getClient();
        // tag::1125986e8e55028ff4c10b5e6c7bbebb[]
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
        //           "type": "uax_url_email",
        //           "max_token_length": 5
        //         }
        //       }
        //     }
        //   }
        // }
        // POST my_index/_analyze
        // {
        //   "analyzer": "my_analyzer",
        //   "text": "john.smith@global-international.com"
        // }
        // end::1125986e8e55028ff4c10b5e6c7bbebb[]

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
              . '          "type": "uax_url_email",'
              . '          "max_token_length": 5'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "analyzer": "my_analyzer",'
              . '  "text": "john.smith@global-international.com"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
