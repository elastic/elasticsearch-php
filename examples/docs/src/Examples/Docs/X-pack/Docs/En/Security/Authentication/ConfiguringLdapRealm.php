<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Security\Authentication;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ConfiguringLdapRealm
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ../../x-pack/docs/en/security/authentication/configuring-ldap-realm.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ConfiguringLdapRealm extends SimpleExamplesTester {

    /**
     * Tag:  21e95d29bc37deb5689a654aa323b4ba
     * Line: 149
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL149_21e95d29bc37deb5689a654aa323b4ba()
    {
        $client = $this->getClient();
        // tag::21e95d29bc37deb5689a654aa323b4ba[]
        // TODO -- Implement Example
        // PUT /_security/role_mapping/admins
        // {
        //   "roles" : [ "monitoring" , "user" ],
        //   "rules" : { "field" : {
        //     "groups" : "cn=admins,dc=example,dc=com" \<1>
        //   } },
        //   "enabled": true
        // }
        // end::21e95d29bc37deb5689a654aa323b4ba[]

        $curl = 'PUT /_security/role_mapping/admins'
              . '{'
              . '  "roles" : [ "monitoring" , "user" ],'
              . '  "rules" : { "field" : {'
              . '    "groups" : "cn=admins,dc=example,dc=com" \<1>'
              . '  } },'
              . '  "enabled": true'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  38ffa96674b5fd4042589af0ebb0437b
     * Line: 163
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL163_38ffa96674b5fd4042589af0ebb0437b()
    {
        $client = $this->getClient();
        // tag::38ffa96674b5fd4042589af0ebb0437b[]
        // TODO -- Implement Example
        // PUT /_security/role_mapping/basic_users
        // {
        //   "roles" : [ "user" ],
        //   "rules" : { "field" : {
        //     "groups" : "cn=users,dc=example,dc=com" \<1>
        //   } },
        //   "enabled": true
        // }
        // end::38ffa96674b5fd4042589af0ebb0437b[]

        $curl = 'PUT /_security/role_mapping/basic_users'
              . '{'
              . '  "roles" : [ "user" ],'
              . '  "rules" : { "field" : {'
              . '    "groups" : "cn=users,dc=example,dc=com" \<1>'
              . '  } },'
              . '  "enabled": true'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
