<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Fields;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: IndexField
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/fields/index-field.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class IndexField extends SimpleExamplesTester {

    /**
     * Tag:  e8146b1dda248705f7fb1fb6306d9d86
     * Line: 17
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL17_e8146b1dda248705f7fb1fb6306d9d86()
    {
        $client = $this->getClient();
        // tag::e8146b1dda248705f7fb1fb6306d9d86[]
        // TODO -- Implement Example
        // # Example documents
        // PUT index_1/_doc/1
        // {
        //   "text": "Document in index 1"
        // }
        // PUT index_2/_doc/2?refresh=true
        // {
        //   "text": "Document in index 2"
        // }
        // GET index_1,index_2/_search
        // {
        //   "query": {
        //     "terms": {
        //       "_index": ["index_1", "index_2"] \<1>
        //     }
        //   },
        //   "aggs": {
        //     "indices": {
        //       "terms": {
        //         "field": "_index", \<2>
        //         "size": 10
        //       }
        //     }
        //   },
        //   "sort": [
        //     {
        //       "_index": { \<3>
        //         "order": "asc"
        //       }
        //     }
        //   ],
        //   "script_fields": {
        //     "index_name": {
        //       "script": {
        //         "lang": "painless",
        //         "source": "doc['_index']" \<4>
        //       }
        //     }
        //   }
        // }
        // end::e8146b1dda248705f7fb1fb6306d9d86[]

        $curl = '# Example documents'
              . 'PUT index_1/_doc/1'
              . '{'
              . '  "text": "Document in index 1"'
              . '}'
              . 'PUT index_2/_doc/2?refresh=true'
              . '{'
              . '  "text": "Document in index 2"'
              . '}'
              . 'GET index_1,index_2/_search'
              . '{'
              . '  "query": {'
              . '    "terms": {'
              . '      "_index": ["index_1", "index_2"] \<1>'
              . '    }'
              . '  },'
              . '  "aggs": {'
              . '    "indices": {'
              . '      "terms": {'
              . '        "field": "_index", \<2>'
              . '        "size": 10'
              . '      }'
              . '    }'
              . '  },'
              . '  "sort": ['
              . '    {'
              . '      "_index": { \<3>'
              . '        "order": "asc"'
              . '      }'
              . '    }'
              . '  ],'
              . '  "script_fields": {'
              . '    "index_name": {'
              . '      "script": {'
              . '        "lang": "painless",'
              . '        "source": "doc['_index']" \<4>'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
