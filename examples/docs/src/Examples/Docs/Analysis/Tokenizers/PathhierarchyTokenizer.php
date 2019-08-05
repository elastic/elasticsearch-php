<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenizers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PathhierarchyTokenizer
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/tokenizers/pathhierarchy-tokenizer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PathhierarchyTokenizer extends SimpleExamplesTester {

    /**
     * Tag:  dc4dcfeae8a5f248639335c2c9809549
     * Line: 12
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL12_dc4dcfeae8a5f248639335c2c9809549()
    {
        $client = $this->getClient();
        // tag::dc4dcfeae8a5f248639335c2c9809549[]
        // TODO -- Implement Example
        // POST _analyze
        // {
        //   "tokenizer": "path_hierarchy",
        //   "text": "/one/two/three"
        // }
        // end::dc4dcfeae8a5f248639335c2c9809549[]

        $curl = 'POST _analyze'
              . '{'
              . '  "tokenizer": "path_hierarchy",'
              . '  "text": "/one/two/three"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  fcc35d56dff0291bcf3663830ce99254
     * Line: 95
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL95_fcc35d56dff0291bcf3663830ce99254()
    {
        $client = $this->getClient();
        // tag::fcc35d56dff0291bcf3663830ce99254[]
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
        //           "type": "path_hierarchy",
        //           "delimiter": "-",
        //           "replacement": "/",
        //           "skip": 2
        //         }
        //       }
        //     }
        //   }
        // }
        // POST my_index/_analyze
        // {
        //   "analyzer": "my_analyzer",
        //   "text": "one-two-three-four-five"
        // }
        // end::fcc35d56dff0291bcf3663830ce99254[]

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
              . '          "type": "path_hierarchy",'
              . '          "delimiter": "-",'
              . '          "replacement": "/",'
              . '          "skip": 2'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "analyzer": "my_analyzer",'
              . '  "text": "one-two-three-four-five"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
