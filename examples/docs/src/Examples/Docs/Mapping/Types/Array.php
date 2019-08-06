<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Array
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/types/array.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Array extends SimpleExamplesTester {

    /**
     * Tag:  4d6997c70a1851f9151443c0d38b532e
     * Line: 42
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL42_4d6997c70a1851f9151443c0d38b532e()
    {
        $client = $this->getClient();
        // tag::4d6997c70a1851f9151443c0d38b532e[]
        // TODO -- Implement Example
        // PUT my_index/_doc/1
        // {
        //   "message": "some arrays in this document...",
        //   "tags":  [ "elasticsearch", "wow" ], \<1>
        //   "lists": [ \<2>
        //     {
        //       "name": "prog_list",
        //       "description": "programming list"
        //     },
        //     {
        //       "name": "cool_list",
        //       "description": "cool stuff list"
        //     }
        //   ]
        // }
        // PUT my_index/_doc/2 \<3>
        // {
        //   "message": "no arrays in this document...",
        //   "tags":  "elasticsearch",
        //   "lists": {
        //     "name": "prog_list",
        //     "description": "programming list"
        //   }
        // }
        // GET my_index/_search
        // {
        //   "query": {
        //     "match": {
        //       "tags": "elasticsearch" \<4>
        //     }
        //   }
        // }
        // end::4d6997c70a1851f9151443c0d38b532e[]

        $curl = 'PUT my_index/_doc/1'
              . '{'
              . '  "message": "some arrays in this document...",'
              . '  "tags":  [ "elasticsearch", "wow" ], \<1>'
              . '  "lists": [ \<2>'
              . '    {'
              . '      "name": "prog_list",'
              . '      "description": "programming list"'
              . '    },'
              . '    {'
              . '      "name": "cool_list",'
              . '      "description": "cool stuff list"'
              . '    }'
              . '  ]'
              . '}'
              . 'PUT my_index/_doc/2 \<3>'
              . '{'
              . '  "message": "no arrays in this document...",'
              . '  "tags":  "elasticsearch",'
              . '  "lists": {'
              . '    "name": "prog_list",'
              . '    "description": "programming list"'
              . '  }'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "match": {'
              . '      "tags": "elasticsearch" \<4>'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
