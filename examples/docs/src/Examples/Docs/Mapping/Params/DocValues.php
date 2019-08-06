<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DocValues
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/params/doc-values.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DocValues extends SimpleExamplesTester {

    /**
     * Tag:  4e75503583efc222045e0be4430a2863
     * Line: 25
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL25_4e75503583efc222045e0be4430a2863()
    {
        $client = $this->getClient();
        // tag::4e75503583efc222045e0be4430a2863[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "status_code": { \<1>
        //         "type":       "keyword"
        //       },
        //       "session_id": { \<2>
        //         "type":       "keyword",
        //         "doc_values": false
        //       }
        //     }
        //   }
        // }
        // end::4e75503583efc222045e0be4430a2863[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "status_code": { \<1>'
              . '        "type":       "keyword"'
              . '      },'
              . '      "session_id": { \<2>'
              . '        "type":       "keyword",'
              . '        "doc_values": false'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
