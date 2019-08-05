<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ilm\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetLifecycle
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ilm/apis/get-lifecycle.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetLifecycle extends SimpleExamplesTester {

    /**
     * Tag:  2e7f4b9be999422a12abb680572b13c8
     * Line: 71
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL71_2e7f4b9be999422a12abb680572b13c8()
    {
        $client = $this->getClient();
        // tag::2e7f4b9be999422a12abb680572b13c8[]
        // TODO -- Implement Example
        // GET _ilm/policy/my_policy
        // end::2e7f4b9be999422a12abb680572b13c8[]

        $curl = 'GET _ilm/policy/my_policy';

        // TODO -- make assertion
    }

    /**
     * Tag:  c4c3838c118e037f476ff6eca050fddd
     * Line: 81
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL81_c4c3838c118e037f476ff6eca050fddd()
    {
        $client = $this->getClient();
        // tag::c4c3838c118e037f476ff6eca050fddd[]
        // TODO -- Implement Example
        // {
        //   "my_policy": {
        //     "version": 1, \<1>
        //     "modified_date": 82392349, \<2>
        //     "policy": {
        //       "phases": {
        //         "warm": {
        //           "min_age": "10d",
        //           "actions": {
        //             "forcemerge": {
        //               "max_num_segments": 1
        //             }
        //           }
        //         },
        //         "delete": {
        //           "min_age": "30d",
        //           "actions": {
        //             "delete": {}
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::c4c3838c118e037f476ff6eca050fddd[]

        $curl = '{'
              . '  "my_policy": {'
              . '    "version": 1, \<1>'
              . '    "modified_date": 82392349, \<2>'
              . '    "policy": {'
              . '      "phases": {'
              . '        "warm": {'
              . '          "min_age": "10d",'
              . '          "actions": {'
              . '            "forcemerge": {'
              . '              "max_num_segments": 1'
              . '            }'
              . '          }'
              . '        },'
              . '        "delete": {'
              . '          "min_age": "30d",'
              . '          "actions": {'
              . '            "delete": {}'
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
