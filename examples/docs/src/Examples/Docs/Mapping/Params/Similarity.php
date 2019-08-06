<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Similarity
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/params/similarity.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Similarity extends SimpleExamplesTester {

    /**
     * Tag:  e6e31dcdd1ca214c17e375c54069d513
     * Line: 38
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL38_e6e31dcdd1ca214c17e375c54069d513()
    {
        $client = $this->getClient();
        // tag::e6e31dcdd1ca214c17e375c54069d513[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "default_field": { \<1>
        //         "type": "text"
        //       },
        //       "boolean_sim_field": {
        //         "type": "text",
        //         "similarity": "boolean" \<2>
        //       }
        //     }
        //   }
        // }
        // end::e6e31dcdd1ca214c17e375c54069d513[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "default_field": { \<1>'
              . '        "type": "text"'
              . '      },'
              . '      "boolean_sim_field": {'
              . '        "type": "text",'
              . '        "similarity": "boolean" \<2>'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
