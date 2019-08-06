<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: TermVector
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/params/term-vector.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class TermVector extends SimpleExamplesTester {

    /**
     * Tag:  325ce39f81c442a5447ce0ede550c44a
     * Line: 35
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL35_325ce39f81c442a5447ce0ede550c44a()
    {
        $client = $this->getClient();
        // tag::325ce39f81c442a5447ce0ede550c44a[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "text": {
        //         "type":        "text",
        //         "term_vector": "with_positions_offsets"
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //   "text": "Quick brown fox"
        // }
        // GET my_index/_search
        // {
        //   "query": {
        //     "match": {
        //       "text": "brown fox"
        //     }
        //   },
        //   "highlight": {
        //     "fields": {
        //       "text": {} \<1>
        //     }
        //   }
        // }
        // end::325ce39f81c442a5447ce0ede550c44a[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "text": {'
              . '        "type":        "text",'
              . '        "term_vector": "with_positions_offsets"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "text": "Quick brown fox"'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "match": {'
              . '      "text": "brown fox"'
              . '    }'
              . '  },'
              . '  "highlight": {'
              . '    "fields": {'
              . '      "text": {} \<1>'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
