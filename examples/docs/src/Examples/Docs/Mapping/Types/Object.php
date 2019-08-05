<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Object
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/types/object.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Object extends SimpleExamplesTester {

    /**
     * Tag:  9bb2dc0500011e0774f4bdfebf57a7a0
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_9bb2dc0500011e0774f4bdfebf57a7a0()
    {
        $client = $this->getClient();
        // tag::9bb2dc0500011e0774f4bdfebf57a7a0[]
        // TODO -- Implement Example
        // PUT my_index/_doc/1
        // { \<1>
        //   "region": "US",
        //   "manager": { \<2>
        //     "age":     30,
        //     "name": { \<3>
        //       "first": "John",
        //       "last":  "Smith"
        //     }
        //   }
        // }
        // end::9bb2dc0500011e0774f4bdfebf57a7a0[]

        $curl = 'PUT my_index/_doc/1'
              . '{ \<1>'
              . '  "region": "US",'
              . '  "manager": { \<2>'
              . '    "age":     30,'
              . '    "name": { \<3>'
              . '      "first": "John",'
              . '      "last":  "Smith"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8e907d7533581efadf7831b05dd9f794
     * Line: 46
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL46_8e907d7533581efadf7831b05dd9f794()
    {
        $client = $this->getClient();
        // tag::8e907d7533581efadf7831b05dd9f794[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": { \<1>
        //       "region": {
        //         "type": "keyword"
        //       },
        //       "manager": { \<2>
        //         "properties": {
        //           "age":  { "type": "integer" },
        //           "name": { \<3>
        //             "properties": {
        //               "first": { "type": "text" },
        //               "last":  { "type": "text" }
        //             }
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::8e907d7533581efadf7831b05dd9f794[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": { \<1>'
              . '      "region": {'
              . '        "type": "keyword"'
              . '      },'
              . '      "manager": { \<2>'
              . '        "properties": {'
              . '          "age":  { "type": "integer" },'
              . '          "name": { \<3>'
              . '            "properties": {'
              . '              "first": { "type": "text" },'
              . '              "last":  { "type": "text" }'
              . '            }'
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
