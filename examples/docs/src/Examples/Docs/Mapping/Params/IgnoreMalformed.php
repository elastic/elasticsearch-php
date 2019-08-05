<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: IgnoreMalformed
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/params/ignore-malformed.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class IgnoreMalformed extends SimpleExamplesTester {

    /**
     * Tag:  56af112ba65955f3ca5ef61a199c0daa
     * Line: 16
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL16_56af112ba65955f3ca5ef61a199c0daa()
    {
        $client = $this->getClient();
        // tag::56af112ba65955f3ca5ef61a199c0daa[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "number_one": {
        //         "type": "integer",
        //         "ignore_malformed": true
        //       },
        //       "number_two": {
        //         "type": "integer"
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //   "text":       "Some text value",
        //   "number_one": "foo" \<1>
        // }
        // PUT my_index/_doc/2
        // {
        //   "text":       "Some text value",
        //   "number_two": "foo" \<2>
        // }
        // end::56af112ba65955f3ca5ef61a199c0daa[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "number_one": {'
              . '        "type": "integer",'
              . '        "ignore_malformed": true'
              . '      },'
              . '      "number_two": {'
              . '        "type": "integer"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "text":       "Some text value",'
              . '  "number_one": "foo" \<1>'
              . '}'
              . 'PUT my_index/_doc/2'
              . '{'
              . '  "text":       "Some text value",'
              . '  "number_two": "foo" \<2>'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  835faff0d2e8874b7b9693376fa7fc57
     * Line: 60
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL60_835faff0d2e8874b7b9693376fa7fc57()
    {
        $client = $this->getClient();
        // tag::835faff0d2e8874b7b9693376fa7fc57[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "settings": {
        //     "index.mapping.ignore_malformed": true \<1>
        //   },
        //   "mappings": {
        //     "properties": {
        //       "number_one": { \<1>
        //         "type": "byte"
        //       },
        //       "number_two": {
        //         "type": "integer",
        //         "ignore_malformed": false \<2>
        //       }
        //     }
        //   }
        // }
        // end::835faff0d2e8874b7b9693376fa7fc57[]

        $curl = 'PUT my_index'
              . '{'
              . '  "settings": {'
              . '    "index.mapping.ignore_malformed": true \<1>'
              . '  },'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "number_one": { \<1>'
              . '        "type": "byte"'
              . '      },'
              . '      "number_two": {'
              . '        "type": "integer",'
              . '        "ignore_malformed": false \<2>'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
