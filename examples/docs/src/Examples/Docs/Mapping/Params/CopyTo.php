<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: CopyTo
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/params/copy-to.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class CopyTo extends SimpleExamplesTester {

    /**
     * Tag:  363d200a378f8c3acc6d8a77df42eba7
     * Line: 10
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL10_363d200a378f8c3acc6d8a77df42eba7()
    {
        $client = $this->getClient();
        // tag::363d200a378f8c3acc6d8a77df42eba7[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "first_name": {
        //         "type": "text",
        //         "copy_to": "full_name" \<1>
        //       },
        //       "last_name": {
        //         "type": "text",
        //         "copy_to": "full_name" \<1>
        //       },
        //       "full_name": {
        //         "type": "text"
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //   "first_name": "John",
        //   "last_name": "Smith"
        // }
        // GET my_index/_search
        // {
        //   "query": {
        //     "match": {
        //       "full_name": { \<2>
        //         "query": "John Smith",
        //         "operator": "and"
        //       }
        //     }
        //   }
        // }
        // end::363d200a378f8c3acc6d8a77df42eba7[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "first_name": {'
              . '        "type": "text",'
              . '        "copy_to": "full_name" \<1>'
              . '      },'
              . '      "last_name": {'
              . '        "type": "text",'
              . '        "copy_to": "full_name" \<1>'
              . '      },'
              . '      "full_name": {'
              . '        "type": "text"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "first_name": "John",'
              . '  "last_name": "Smith"'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "match": {'
              . '      "full_name": { \<2>'
              . '        "query": "John Smith",'
              . '        "operator": "and"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
