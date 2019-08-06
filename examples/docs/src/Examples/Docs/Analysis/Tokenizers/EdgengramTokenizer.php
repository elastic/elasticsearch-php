<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenizers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: EdgengramTokenizer
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/tokenizers/edgengram-tokenizer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class EdgengramTokenizer extends SimpleExamplesTester {

    /**
     * Tag:  a512e4dd8880ce0395937db1bab1d205
     * Line: 25
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL25_a512e4dd8880ce0395937db1bab1d205()
    {
        $client = $this->getClient();
        // tag::a512e4dd8880ce0395937db1bab1d205[]
        // TODO -- Implement Example
        // POST _analyze
        // {
        //   "tokenizer": "edge_ngram",
        //   "text": "Quick Fox"
        // }
        // end::a512e4dd8880ce0395937db1bab1d205[]

        $curl = 'POST _analyze'
              . '{'
              . '  "tokenizer": "edge_ngram",'
              . '  "text": "Quick Fox"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a61389da4033bd7b73a63ff2ee258125
     * Line: 106
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL106_a61389da4033bd7b73a63ff2ee258125()
    {
        $client = $this->getClient();
        // tag::a61389da4033bd7b73a63ff2ee258125[]
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
        //           "type": "edge_ngram",
        //           "min_gram": 2,
        //           "max_gram": 10,
        //           "token_chars": [
        //             "letter",
        //             "digit"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // POST my_index/_analyze
        // {
        //   "analyzer": "my_analyzer",
        //   "text": "2 Quick Foxes."
        // }
        // end::a61389da4033bd7b73a63ff2ee258125[]

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
              . '          "type": "edge_ngram",'
              . '          "min_gram": 2,'
              . '          "max_gram": 10,'
              . '          "token_chars": ['
              . '            "letter",'
              . '            "digit"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "analyzer": "my_analyzer",'
              . '  "text": "2 Quick Foxes."'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b8893e8f2b1aea4b093e0c4f037cfff7
     * Line: 224
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL224_b8893e8f2b1aea4b093e0c4f037cfff7()
    {
        $client = $this->getClient();
        // tag::b8893e8f2b1aea4b093e0c4f037cfff7[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "autocomplete": {
        //           "tokenizer": "autocomplete",
        //           "filter": [
        //             "lowercase"
        //           ]
        //         },
        //         "autocomplete_search": {
        //           "tokenizer": "lowercase"
        //         }
        //       },
        //       "tokenizer": {
        //         "autocomplete": {
        //           "type": "edge_ngram",
        //           "min_gram": 2,
        //           "max_gram": 10,
        //           "token_chars": [
        //             "letter"
        //           ]
        //         }
        //       }
        //     }
        //   },
        //   "mappings": {
        //     "properties": {
        //       "title": {
        //         "type": "text",
        //         "analyzer": "autocomplete",
        //         "search_analyzer": "autocomplete_search"
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //   "title": "Quick Foxes" \<1>
        // }
        // POST my_index/_refresh
        // GET my_index/_search
        // {
        //   "query": {
        //     "match": {
        //       "title": {
        //         "query": "Quick Fo", \<2>
        //         "operator": "and"
        //       }
        //     }
        //   }
        // }
        // end::b8893e8f2b1aea4b093e0c4f037cfff7[]

        $curl = 'PUT my_index'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "autocomplete": {'
              . '          "tokenizer": "autocomplete",'
              . '          "filter": ['
              . '            "lowercase"'
              . '          ]'
              . '        },'
              . '        "autocomplete_search": {'
              . '          "tokenizer": "lowercase"'
              . '        }'
              . '      },'
              . '      "tokenizer": {'
              . '        "autocomplete": {'
              . '          "type": "edge_ngram",'
              . '          "min_gram": 2,'
              . '          "max_gram": 10,'
              . '          "token_chars": ['
              . '            "letter"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  },'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "title": {'
              . '        "type": "text",'
              . '        "analyzer": "autocomplete",'
              . '        "search_analyzer": "autocomplete_search"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "title": "Quick Foxes" \<1>'
              . '}'
              . 'POST my_index/_refresh'
              . 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "match": {'
              . '      "title": {'
              . '        "query": "Quick Fo", \<2>'
              . '        "operator": "and"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
