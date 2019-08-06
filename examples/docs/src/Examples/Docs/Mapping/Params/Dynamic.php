<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Dynamic
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/params/dynamic.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Dynamic extends SimpleExamplesTester {

    /**
     * Tag:  e65e9805b8b17f72616f099e11a5c337
     * Line: 9
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL9_e65e9805b8b17f72616f099e11a5c337()
    {
        $client = $this->getClient();
        // tag::e65e9805b8b17f72616f099e11a5c337[]
        // TODO -- Implement Example
        // PUT my_index/_doc/1 \<1>
        // {
        //   "username": "johnsmith",
        //   "name": {
        //     "first": "John",
        //     "last": "Smith"
        //   }
        // }
        // GET my_index/_mapping \<2>
        // PUT my_index/_doc/2 \<3>
        // {
        //   "username": "marywhite",
        //   "email": "mary@white.com",
        //   "name": {
        //     "first": "Mary",
        //     "middle": "Alice",
        //     "last": "White"
        //   }
        // }
        // GET my_index/_mapping \<4>
        // end::e65e9805b8b17f72616f099e11a5c337[]

        $curl = 'PUT my_index/_doc/1 \<1>'
              . '{'
              . '  "username": "johnsmith",'
              . '  "name": {'
              . '    "first": "John",'
              . '    "last": "Smith"'
              . '  }'
              . '}'
              . 'GET my_index/_mapping \<2>'
              . 'PUT my_index/_doc/2 \<3>'
              . '{'
              . '  "username": "marywhite",'
              . '  "email": "mary@white.com",'
              . '  "name": {'
              . '    "first": "Mary",'
              . '    "middle": "Alice",'
              . '    "last": "White"'
              . '  }'
              . '}'
              . 'GET my_index/_mapping \<4>';

        // TODO -- make assertion
    }

    /**
     * Tag:  4b478d9b1231513362d2fa8c766cd0a5
     * Line: 60
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL60_4b478d9b1231513362d2fa8c766cd0a5()
    {
        $client = $this->getClient();
        // tag::4b478d9b1231513362d2fa8c766cd0a5[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "dynamic": false, \<1>
        //     "properties": {
        //       "user": { \<2>
        //         "properties": {
        //           "name": {
        //             "type": "text"
        //           },
        //           "social_networks": { \<3>
        //             "dynamic": true,
        //             "properties": {}
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::4b478d9b1231513362d2fa8c766cd0a5[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "dynamic": false, \<1>'
              . '    "properties": {'
              . '      "user": { \<2>'
              . '        "properties": {'
              . '          "name": {'
              . '            "type": "text"'
              . '          },'
              . '          "social_networks": { \<3>'
              . '            "dynamic": true,'
              . '            "properties": {}'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
