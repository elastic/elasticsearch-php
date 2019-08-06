<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Security\Authentication;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ConfiguringKerberosRealm
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   ../../x-pack/docs/en/security/authentication/configuring-kerberos-realm.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ConfiguringKerberosRealm extends SimpleExamplesTester {

    /**
     * Tag:  9584b042223982e0bfde8d12d42c9705
     * Line: 155
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL155_9584b042223982e0bfde8d12d42c9705()
    {
        $client = $this->getClient();
        // tag::9584b042223982e0bfde8d12d42c9705[]
        // TODO -- Implement Example
        // POST /_security/role_mapping/kerbrolemapping
        // {
        //   "roles" : [ "monitoring_user" ],
        //   "enabled": true,
        //   "rules" : {
        //     "field" : { "username" : "user@REALM" }
        //   }
        // }
        // end::9584b042223982e0bfde8d12d42c9705[]

        $curl = 'POST /_security/role_mapping/kerbrolemapping'
              . '{'
              . '  "roles" : [ "monitoring_user" ],'
              . '  "enabled": true,'
              . '  "rules" : {'
              . '    "field" : { "username" : "user@REALM" }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
