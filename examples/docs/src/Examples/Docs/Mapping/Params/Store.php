<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Store
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/params/store.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Store extends SimpleExamplesTester {

    /**
     * Tag:  ff26214b3981f7418688e4c8905d5068
     * Line: 20
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL20_ff26214b3981f7418688e4c8905d5068()
    {
        $client = $this->getClient();
        // tag::ff26214b3981f7418688e4c8905d5068[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "title": {
        //         "type": "text",
        //         "store": true \<1>
        //       },
        //       "date": {
        //         "type": "date",
        //         "store": true \<1>
        //       },
        //       "content": {
        //         "type": "text"
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //   "title":   "Some short title",
        //   "date":    "2015-01-01",
        //   "content": "A very long content field..."
        // }
        // GET my_index/_search
        // {
        //   "stored_fields": [ "title", "date" ] \<2>
        // }
        // end::ff26214b3981f7418688e4c8905d5068[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "title": {'
              . '        "type": "text",'
              . '        "store": true \<1>'
              . '      },'
              . '      "date": {'
              . '        "type": "date",'
              . '        "store": true \<1>'
              . '      },'
              . '      "content": {'
              . '        "type": "text"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "title":   "Some short title",'
              . '  "date":    "2015-01-01",'
              . '  "content": "A very long content field..."'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "stored_fields": [ "title", "date" ] \<2>'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
