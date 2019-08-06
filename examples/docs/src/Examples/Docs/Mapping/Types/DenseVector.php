<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DenseVector
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/types/dense-vector.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DenseVector extends SimpleExamplesTester {

    /**
     * Tag:  7c7b74084cc9f18b085c25a208bd1306
     * Line: 22
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL22_7c7b74084cc9f18b085c25a208bd1306()
    {
        $client = $this->getClient();
        // tag::7c7b74084cc9f18b085c25a208bd1306[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "my_vector": {
        //         "type": "dense_vector",
        //         "dims": 3  \<1>
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
        //   "my_vector" : [0.5, 10, 6]
        // }
        // PUT my_index/_doc/2
        // {
        //   "my_text" : "text2",
        //   "my_vector" : [-0.5, 10, 10]
        // }
        // end::7c7b74084cc9f18b085c25a208bd1306[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "my_vector": {'
              . '        "type": "dense_vector",'
              . '        "dims": 3  \<1>'
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
              . '  "my_vector" : [0.5, 10, 6]'
              . '}'
              . 'PUT my_index/_doc/2'
              . '{'
              . '  "my_text" : "text2",'
              . '  "my_vector" : [-0.5, 10, 10]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
