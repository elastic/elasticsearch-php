<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: CreateRoles
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ../../x-pack/docs/en/rest-api/security/create-roles.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class CreateRoles extends SimpleExamplesTester {

    /**
     * Tag:  850a6d4aaf112ec1279260a2b7400a89
     * Line: 82
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL82_850a6d4aaf112ec1279260a2b7400a89()
    {
        $client = $this->getClient();
        // tag::850a6d4aaf112ec1279260a2b7400a89[]
        // TODO -- Implement Example
        // POST /_security/role/my_admin_role
        // {
        //   "cluster": ["all"],
        //   "indices": [
        //     {
        //       "names": [ "index1", "index2" ],
        //       "privileges": ["all"],
        //       "field_security" : { // optional
        //         "grant" : [ "title", "body" ]
        //       },
        //       "query": "{\"match\": {\"title\": \"foo\"}}" // optional
        //     }
        //   ],
        //   "applications": [
        //     {
        //       "application": "myapp",
        //       "privileges": [ "admin", "read" ],
        //       "resources": [ "*" ]
        //     }
        //   ],
        //   "run_as": [ "other_user" ], // optional
        //   "metadata" : { // optional
        //     "version" : 1
        //   }
        // }
        // end::850a6d4aaf112ec1279260a2b7400a89[]

        $curl = 'POST /_security/role/my_admin_role'
              . '{'
              . '  "cluster": ["all"],'
              . '  "indices": ['
              . '    {'
              . '      "names": [ "index1", "index2" ],'
              . '      "privileges": ["all"],'
              . '      "field_security" : { // optional'
              . '        "grant" : [ "title", "body" ]'
              . '      },'
              . '      "query": "{\"match\": {\"title\": \"foo\"}}" // optional'
              . '    }'
              . '  ],'
              . '  "applications": ['
              . '    {'
              . '      "application": "myapp",'
              . '      "privileges": [ "admin", "read" ],'
              . '      "resources": [ "*" ]'
              . '    }'
              . '  ],'
              . '  "run_as": [ "other_user" ], // optional'
              . '  "metadata" : { // optional'
              . '    "version" : 1'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
