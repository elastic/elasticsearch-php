<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: IndexOptions
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/params/index-options.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class IndexOptions extends SimpleExamplesTester {

    /**
     * Tag:  3a24ebb542f657420fcd8fdf3f757ce6
     * Line: 37
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL37_3a24ebb542f657420fcd8fdf3f757ce6()
    {
        $client = $this->getClient();
        // tag::3a24ebb542f657420fcd8fdf3f757ce6[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "text": {
        //         "type": "text",
        //         "index_options": "offsets"
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
        // end::3a24ebb542f657420fcd8fdf3f757ce6[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "text": {'
              . '        "type": "text",'
              . '        "index_options": "offsets"'
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
