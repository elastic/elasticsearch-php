<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MultiFields
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/params/multi-fields.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MultiFields extends SimpleExamplesTester {

    /**
     * Tag:  5271f4ff29bb48838396e5a674664ee0
     * Line: 10
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL10_5271f4ff29bb48838396e5a674664ee0()
    {
        $client = $this->getClient();
        // tag::5271f4ff29bb48838396e5a674664ee0[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "city": {
        //         "type": "text",
        //         "fields": {
        //           "raw": { \<1>
        //             "type":  "keyword"
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //   "city": "New York"
        // }
        // PUT my_index/_doc/2
        // {
        //   "city": "York"
        // }
        // GET my_index/_search
        // {
        //   "query": {
        //     "match": {
        //       "city": "york" \<2>
        //     }
        //   },
        //   "sort": {
        //     "city.raw": "asc" \<3>
        //   },
        //   "aggs": {
        //     "Cities": {
        //       "terms": {
        //         "field": "city.raw" \<3>
        //       }
        //     }
        //   }
        // }
        // end::5271f4ff29bb48838396e5a674664ee0[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "city": {'
              . '        "type": "text",'
              . '        "fields": {'
              . '          "raw": { \<1>'
              . '            "type":  "keyword"'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "city": "New York"'
              . '}'
              . 'PUT my_index/_doc/2'
              . '{'
              . '  "city": "York"'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "match": {'
              . '      "city": "york" \<2>'
              . '    }'
              . '  },'
              . '  "sort": {'
              . '    "city.raw": "asc" \<3>'
              . '  },'
              . '  "aggs": {'
              . '    "Cities": {'
              . '      "terms": {'
              . '        "field": "city.raw" \<3>'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  fc8097bdfb6f3a4017bf4186ccca8a84
     * Line: 75
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL75_fc8097bdfb6f3a4017bf4186ccca8a84()
    {
        $client = $this->getClient();
        // tag::fc8097bdfb6f3a4017bf4186ccca8a84[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "text": { \<1>
        //         "type": "text",
        //         "fields": {
        //           "english": { \<2>
        //             "type":     "text",
        //             "analyzer": "english"
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1
        // { "text": "quick brown fox" } \<3>
        // PUT my_index/_doc/2
        // { "text": "quick brown foxes" } \<3>
        // GET my_index/_search
        // {
        //   "query": {
        //     "multi_match": {
        //       "query": "quick brown foxes",
        //       "fields": [ \<4>
        //         "text",
        //         "text.english"
        //       ],
        //       "type": "most_fields" \<4>
        //     }
        //   }
        // }
        // end::fc8097bdfb6f3a4017bf4186ccca8a84[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "text": { \<1>'
              . '        "type": "text",'
              . '        "fields": {'
              . '          "english": { \<2>'
              . '            "type":     "text",'
              . '            "analyzer": "english"'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{ "text": "quick brown fox" } \<3>'
              . 'PUT my_index/_doc/2'
              . '{ "text": "quick brown foxes" } \<3>'
              . 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "multi_match": {'
              . '      "query": "quick brown foxes",'
              . '      "fields": [ \<4>'
              . '        "text",'
              . '        "text.english"'
              . '      ],'
              . '      "type": "most_fields" \<4>'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
