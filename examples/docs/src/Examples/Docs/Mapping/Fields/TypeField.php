<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Fields;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: TypeField
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/fields/type-field.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class TypeField extends SimpleExamplesTester {

    /**
     * Tag:  1e867a2d4e10e70350d458a473544022
     * Line: 14
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL14_1e867a2d4e10e70350d458a473544022()
    {
        $client = $this->getClient();
        // tag::1e867a2d4e10e70350d458a473544022[]
        // TODO -- Implement Example
        // # Example documents
        // PUT my_index/_doc/1?refresh=true
        // {
        //   "text": "Document with type \'doc\'"
        // }
        // GET my_index/_search
        // {
        //   "query": {
        //     "term": {
        //       "_type": "_doc"  \<1>
        //     }
        //   },
        //   "aggs": {
        //     "types": {
        //       "terms": {
        //         "field": "_type", \<2>
        //         "size": 10
        //       }
        //     }
        //   },
        //   "sort": [
        //     {
        //       "_type": { \<3>
        //         "order": "desc"
        //       }
        //     }
        //   ],
        //   "script_fields": {
        //     "type": {
        //       "script": {
        //         "lang": "painless",
        //         "source": "doc[\'_type\']" \<4>
        //       }
        //     }
        //   }
        // }
        // end::1e867a2d4e10e70350d458a473544022[]

        $curl = '# Example documents'
              . 'PUT my_index/_doc/1?refresh=true'
              . '{'
              . '  "text": "Document with type \'doc\'"'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "term": {'
              . '      "_type": "_doc"  \<1>'
              . '    }'
              . '  },'
              . '  "aggs": {'
              . '    "types": {'
              . '      "terms": {'
              . '        "field": "_type", \<2>'
              . '        "size": 10'
              . '      }'
              . '    }'
              . '  },'
              . '  "sort": ['
              . '    {'
              . '      "_type": { \<3>'
              . '        "order": "desc"'
              . '      }'
              . '    }'
              . '  ],'
              . '  "script_fields": {'
              . '    "type": {'
              . '      "script": {'
              . '        "lang": "painless",'
              . '        "source": "doc[\'_type\']" \<4>'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
