<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: HasPrivileges
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/security/has-privileges.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class HasPrivileges extends SimpleExamplesTester {

    /**
     * Tag:  9684e5fa8c22a07a372feb6fc1f5f7c0
     * Line: 64
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL64_9684e5fa8c22a07a372feb6fc1f5f7c0()
    {
        $client = $this->getClient();
        // tag::9684e5fa8c22a07a372feb6fc1f5f7c0[]
        // TODO -- Implement Example
        // GET /_security/user/_has_privileges
        // {
        //   "cluster": [ "monitor", "manage" ],
        //   "index" : [
        //     {
        //       "names": [ "suppliers", "products" ],
        //       "privileges": [ "read" ]
        //     },
        //     {
        //       "names": [ "inventory" ],
        //       "privileges" : [ "read", "write" ]
        //     }
        //   ],
        //   "application": [
        //     {
        //       "application": "inventory_manager",
        //       "privileges" : [ "read", "data:write/inventory" ],
        //       "resources" : [ "product/1852563" ]
        //     }
        //   ]
        // }
        // end::9684e5fa8c22a07a372feb6fc1f5f7c0[]

        $curl = 'GET /_security/user/_has_privileges'
              . '{'
              . '  "cluster": [ "monitor", "manage" ],'
              . '  "index" : ['
              . '    {'
              . '      "names": [ "suppliers", "products" ],'
              . '      "privileges": [ "read" ]'
              . '    },'
              . '    {'
              . '      "names": [ "inventory" ],'
              . '      "privileges" : [ "read", "write" ]'
              . '    }'
              . '  ],'
              . '  "application": ['
              . '    {'
              . '      "application": "inventory_manager",'
              . '      "privileges" : [ "read", "data:write/inventory" ],'
              . '      "resources" : [ "product/1852563" ]'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
