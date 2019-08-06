<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Binary
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/types/binary.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Binary extends SimpleExamplesTester {

    /**
     * Tag:  9296dd085f411739f5b0ec80eb9b9e27
     * Line: 12
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL12_9296dd085f411739f5b0ec80eb9b9e27()
    {
        $client = $this->getClient();
        // tag::9296dd085f411739f5b0ec80eb9b9e27[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "name": {
        //         "type": "text"
        //       },
        //       "blob": {
        //         "type": "binary"
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //   "name": "Some binary blob",
        //   "blob": "U29tZSBiaW5hcnkgYmxvYg==" \<1>
        // }
        // end::9296dd085f411739f5b0ec80eb9b9e27[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "name": {'
              . '        "type": "text"'
              . '      },'
              . '      "blob": {'
              . '        "type": "binary"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "name": "Some binary blob",'
              . '  "blob": "U29tZSBiaW5hcnkgYmxvYg==" \<1>'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
