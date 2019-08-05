<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Security\Authentication;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ConfiguringActiveDirectoryRealm
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ../../x-pack/docs/en/security/authentication/configuring-active-directory-realm.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ConfiguringActiveDirectoryRealm extends SimpleExamplesTester {

    /**
     * Tag:  21e95d29bc37deb5689a654aa323b4ba
     * Line: 188
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL188_21e95d29bc37deb5689a654aa323b4ba()
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
     * Tag:  bd0d30a7683037e1ebadd163514765d4
     * Line: 202
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL202_bd0d30a7683037e1ebadd163514765d4()
    {
        $client = $this->getClient();
        // tag::bd0d30a7683037e1ebadd163514765d4[]
        // TODO -- Implement Example
        // PUT /_security/role_mapping/basic_users
        // {
        //   "roles" : [ "user" ],
        //   "rules" : { "any": [
        //     { "field" : {
        //       "groups" : "cn=users,dc=example,dc=com" \<1>
        //     } },
        //     { "field" : {
        //       "dn" : "cn=John Doe,cn=contractors,dc=example,dc=com" \<2>
        //     } }
        //   ] },
        //   "enabled": true
        // }
        // end::bd0d30a7683037e1ebadd163514765d4[]

        $curl = 'PUT /_security/role_mapping/basic_users'
              . '{'
              . '  "roles" : [ "user" ],'
              . '  "rules" : { "any": ['
              . '    { "field" : {'
              . '      "groups" : "cn=users,dc=example,dc=com" \<1>'
              . '    } },'
              . '    { "field" : {'
              . '      "dn" : "cn=John Doe,cn=contractors,dc=example,dc=com" \<2>'
              . '    } }'
              . '  ] },'
              . '  "enabled": true'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
