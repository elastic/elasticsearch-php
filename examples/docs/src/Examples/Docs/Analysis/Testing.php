<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Testing
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/testing.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Testing extends SimpleExamplesTester {

    /**
     * Tag:  f0d3b58abf6f2b499a38237a0e6d3498
     * Line: 9
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL9_f0d3b58abf6f2b499a38237a0e6d3498()
    {
        $client = $this->getClient();
        // tag::f0d3b58abf6f2b499a38237a0e6d3498[]
        // TODO -- Implement Example
        // POST _analyze
        // {
        //   "analyzer": "whitespace",
        //   "text":     "The quick brown fox."
        // }
        // POST _analyze
        // {
        //   "tokenizer": "standard",
        //   "filter":  [ "lowercase", "asciifolding" ],
        //   "text":      "Is this déja vu?"
        // }
        // end::f0d3b58abf6f2b499a38237a0e6d3498[]

        $curl = 'POST _analyze'
              . '{'
              . '  "analyzer": "whitespace",'
              . '  "text":     "The quick brown fox."'
              . '}'
              . 'POST _analyze'
              . '{'
              . '  "tokenizer": "standard",'
              . '  "filter":  [ "lowercase", "asciifolding" ],'
              . '  "text":      "Is this déja vu?"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  acebf0b821acfbd6089f71e0359a56d3
     * Line: 43
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL43_acebf0b821acfbd6089f71e0359a56d3()
    {
        $client = $this->getClient();
        // tag::acebf0b821acfbd6089f71e0359a56d3[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "std_folded": { \<1>
        //           "type": "custom",
        //           "tokenizer": "standard",
        //           "filter": [
        //             "lowercase",
        //             "asciifolding"
        //           ]
        //         }
        //       }
        //     }
        //   },
        //   "mappings": {
        //     "properties": {
        //       "my_text": {
        //         "type": "text",
        //         "analyzer": "std_folded" \<2>
        //       }
        //     }
        //   }
        // }
        // GET my_index/_analyze \<3>
        // {
        //   "analyzer": "std_folded", \<4>
        //   "text":     "Is this déjà vu?"
        // }
        // GET my_index/_analyze \<3>
        // {
        //   "field": "my_text", \<5>
        //   "text":  "Is this déjà vu?"
        // }
        // end::acebf0b821acfbd6089f71e0359a56d3[]

        $curl = 'PUT my_index'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "std_folded": { \<1>'
              . '          "type": "custom",'
              . '          "tokenizer": "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "asciifolding"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  },'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "my_text": {'
              . '        "type": "text",'
              . '        "analyzer": "std_folded" \<2>'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'GET my_index/_analyze \<3>'
              . '{'
              . '  "analyzer": "std_folded", \<4>'
              . '  "text":     "Is this déjà vu?"'
              . '}'
              . 'GET my_index/_analyze \<3>'
              . '{'
              . '  "field": "my_text", \<5>'
              . '  "text":  "Is this déjà vu?"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
