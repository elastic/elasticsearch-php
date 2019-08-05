<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Coerce
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/params/coerce.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Coerce extends SimpleExamplesTester {

    /**
     * Tag:  5c734d4a7252cc155f8dc90c4785f491
     * Line: 19
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL19_5c734d4a7252cc155f8dc90c4785f491()
    {
        $client = $this->getClient();
        // tag::5c734d4a7252cc155f8dc90c4785f491[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "number_one": {
        //         "type": "integer"
        //       },
        //       "number_two": {
        //         "type": "integer",
        //         "coerce": false
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //   "number_one": "10" \<1>
        // }
        // PUT my_index/_doc/2
        // {
        //   "number_two": "10" \<2>
        // }
        // end::5c734d4a7252cc155f8dc90c4785f491[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "number_one": {'
              . '        "type": "integer"'
              . '      },'
              . '      "number_two": {'
              . '        "type": "integer",'
              . '        "coerce": false'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "number_one": "10" \<1>'
              . '}'
              . 'PUT my_index/_doc/2'
              . '{'
              . '  "number_two": "10" \<2>'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  dad2db81c728827a782a3fefd3399849
     * Line: 60
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL60_dad2db81c728827a782a3fefd3399849()
    {
        $client = $this->getClient();
        // tag::dad2db81c728827a782a3fefd3399849[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "settings": {
        //     "index.mapping.coerce": false
        //   },
        //   "mappings": {
        //     "properties": {
        //       "number_one": {
        //         "type": "integer",
        //         "coerce": true
        //       },
        //       "number_two": {
        //         "type": "integer"
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1
        // { "number_one": "10" } \<1>
        // PUT my_index/_doc/2
        // { "number_two": "10" } \<2>
        // end::dad2db81c728827a782a3fefd3399849[]

        $curl = 'PUT my_index'
              . '{'
              . '  "settings": {'
              . '    "index.mapping.coerce": false'
              . '  },'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "number_one": {'
              . '        "type": "integer",'
              . '        "coerce": true'
              . '      },'
              . '      "number_two": {'
              . '        "type": "integer"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{ "number_one": "10" } \<1>'
              . 'PUT my_index/_doc/2'
              . '{ "number_two": "10" } \<2>';

        // TODO -- make assertion
    }

// %__METHOD__%



}
