<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ilm\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PutLifecycle
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ilm/apis/put-lifecycle.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PutLifecycle extends SimpleExamplesTester {

    /**
     * Tag:  daa2d4811bec05ac4546b66bd5a615c7
     * Line: 46
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL46_daa2d4811bec05ac4546b66bd5a615c7()
    {
        $client = $this->getClient();
        // tag::daa2d4811bec05ac4546b66bd5a615c7[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "warm": {
        //         "min_age": "10d",
        //         "actions": {
        //           "forcemerge": {
        //             "max_num_segments": 1
        //           }
        //         }
        //       },
        //       "delete": {
        //         "min_age": "30d",
        //         "actions": {
        //           "delete": {}
        //         }
        //       }
        //     }
        //   }
        // }
        // end::daa2d4811bec05ac4546b66bd5a615c7[]

        $curl = 'PUT _ilm/policy/my_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "warm": {'
              . '        "min_age": "10d",'
              . '        "actions": {'
              . '          "forcemerge": {'
              . '            "max_num_segments": 1'
              . '          }'
              . '        }'
              . '      },'
              . '      "delete": {'
              . '        "min_age": "30d",'
              . '        "actions": {'
              . '          "delete": {}'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  bc5fcc40c29087a0df7b5405bb70de5c
     * Line: 74
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL74_bc5fcc40c29087a0df7b5405bb70de5c()
    {
        $client = $this->getClient();
        // tag::bc5fcc40c29087a0df7b5405bb70de5c[]
        // TODO -- Implement Example
        // {
        //   "acknowledged": true
        // }
        // end::bc5fcc40c29087a0df7b5405bb70de5c[]

        $curl = '{'
              . '  "acknowledged": true'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
