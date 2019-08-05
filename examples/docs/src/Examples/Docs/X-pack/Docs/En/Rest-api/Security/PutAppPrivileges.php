<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PutAppPrivileges
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/security/put-app-privileges.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PutAppPrivileges extends SimpleExamplesTester {

    /**
     * Tag:  4ee31fd4ea6d18f32ec28b7fa433441d
     * Line: 79
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL79_4ee31fd4ea6d18f32ec28b7fa433441d()
    {
        $client = $this->getClient();
        // tag::4ee31fd4ea6d18f32ec28b7fa433441d[]
        // TODO -- Implement Example
        // PUT /_security/privilege
        // {
        //   "myapp": {
        //     "read": {
        //       "actions": [ \<1>
        //         "data:read/*" , \<2>
        //         "action:login" ],
        //         "metadata": { \<3>
        //           "description": "Read access to myapp"
        //         }
        //       }
        //     }
        // }
        // end::4ee31fd4ea6d18f32ec28b7fa433441d[]

        $curl = 'PUT /_security/privilege'
              . '{'
              . '  "myapp": {'
              . '    "read": {'
              . '      "actions": [ \<1>'
              . '        "data:read/*" , \<2>'
              . '        "action:login" ],'
              . '        "metadata": { \<3>'
              . '          "description": "Read access to myapp"'
              . '        }'
              . '      }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ee90d1fb22b59d30da339d825303b912
     * Line: 125
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL125_ee90d1fb22b59d30da339d825303b912()
    {
        $client = $this->getClient();
        // tag::ee90d1fb22b59d30da339d825303b912[]
        // TODO -- Implement Example
        // PUT /_security/privilege
        // {
        //   "app01": {
        //     "read": {
        //       "actions": [ "action:login", "data:read/*" ]
        //     },
        //     "write": {
        //       "actions": [ "action:login", "data:write/*" ]
        //     }
        //   },
        //   "app02": {
        //     "all": {
        //       "actions": [ "*" ]
        //     }
        //   }
        // }
        // end::ee90d1fb22b59d30da339d825303b912[]

        $curl = 'PUT /_security/privilege'
              . '{'
              . '  "app01": {'
              . '    "read": {'
              . '      "actions": [ "action:login", "data:read/*" ]'
              . '    },'
              . '    "write": {'
              . '      "actions": [ "action:login", "data:write/*" ]'
              . '    }'
              . '  },'
              . '  "app02": {'
              . '    "all": {'
              . '      "actions": [ "*" ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
