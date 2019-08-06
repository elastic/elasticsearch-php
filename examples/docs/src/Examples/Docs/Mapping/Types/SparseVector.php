<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SparseVector
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/types/sparse-vector.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SparseVector extends SimpleExamplesTester {

    /**
     * Tag:  9e9bd85e9135533e7fb8b079a6d4ae21
     * Line: 27
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL27_9e9bd85e9135533e7fb8b079a6d4ae21()
    {
        $client = $this->getClient();
        // tag::9e9bd85e9135533e7fb8b079a6d4ae21[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "my_vector": {
        //         "type": "sparse_vector"
        //       },
        //       "my_text" : {
        //         "type" : "keyword"
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //   "my_text" : "text1",
        //   "my_vector" : {"1": 0.5, "5": -0.5,  "100": 1}
        // }
        // PUT my_index/_doc/2
        // {
        //   "my_text" : "text2",
        //   "my_vector" : {"103": 0.5, "4": -0.5,  "5": 1, "11" : 1.2}
        // }
        // end::9e9bd85e9135533e7fb8b079a6d4ae21[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "my_vector": {'
              . '        "type": "sparse_vector"'
              . '      },'
              . '      "my_text" : {'
              . '        "type" : "keyword"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "my_text" : "text1",'
              . '  "my_vector" : {"1": 0.5, "5": -0.5,  "100": 1}'
              . '}'
              . 'PUT my_index/_doc/2'
              . '{'
              . '  "my_text" : "text2",'
              . '  "my_vector" : {"103": 0.5, "4": -0.5,  "5": 1, "11" : 1.2}'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
