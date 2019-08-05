<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SearchAnalyzer
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/params/search-analyzer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SearchAnalyzer extends SimpleExamplesTester {

    /**
     * Tag:  60677e5144fed659e8417b7fa9964285
     * Line: 16
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL16_60677e5144fed659e8417b7fa9964285()
    {
        $client = $this->getClient();
        // tag::60677e5144fed659e8417b7fa9964285[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "autocomplete_filter": {
        //           "type": "edge_ngram",
        //           "min_gram": 1,
        //           "max_gram": 20
        //         }
        //       },
        //       "analyzer": {
        //         "autocomplete": { \<1>
        //           "type": "custom",
        //           "tokenizer": "standard",
        //           "filter": [
        //             "lowercase",
        //             "autocomplete_filter"
        //           ]
        //         }
        //       }
        //     }
        //   },
        //   "mappings": {
        //     "properties": {
        //       "text": {
        //         "type": "text",
        //         "analyzer": "autocomplete", \<2>
        //         "search_analyzer": "standard" \<2>
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //   "text": "Quick Brown Fox" \<3>
        // }
        // GET my_index/_search
        // {
        //   "query": {
        //     "match": {
        //       "text": {
        //         "query": "Quick Br", \<4>
        //         "operator": "and"
        //       }
        //     }
        //   }
        // }
        // end::60677e5144fed659e8417b7fa9964285[]

        $curl = 'PUT my_index'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "autocomplete_filter": {'
              . '          "type": "edge_ngram",'
              . '          "min_gram": 1,'
              . '          "max_gram": 20'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "autocomplete": { \<1>'
              . '          "type": "custom",'
              . '          "tokenizer": "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "autocomplete_filter"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  },'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "text": {'
              . '        "type": "text",'
              . '        "analyzer": "autocomplete", \<2>'
              . '        "search_analyzer": "standard" \<2>'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "text": "Quick Brown Fox" \<3>'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "match": {'
              . '      "text": {'
              . '        "query": "Quick Br", \<4>'
              . '        "operator": "and"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
