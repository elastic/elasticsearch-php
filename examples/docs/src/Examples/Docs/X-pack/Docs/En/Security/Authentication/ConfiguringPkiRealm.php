<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Security\Authentication;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ConfiguringPkiRealm
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ../../x-pack/docs/en/security/authentication/configuring-pki-realm.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ConfiguringPkiRealm extends SimpleExamplesTester {

    /**
     * Tag:  70bbe14bc4d5a5d58e81ab2b02408817
     * Line: 140
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL140_70bbe14bc4d5a5d58e81ab2b02408817()
    {
        $client = $this->getClient();
        // tag::70bbe14bc4d5a5d58e81ab2b02408817[]
        // TODO -- Implement Example
        // PUT /_security/role_mapping/users
        // {
        //   "roles" : [ "user" ],
        //   "rules" : { "field" : {
        //     "dn" : "cn=John Doe,ou=example,o=com" \<1>
        //   } },
        //   "enabled": true
        // }
        // end::70bbe14bc4d5a5d58e81ab2b02408817[]

        $curl = 'PUT /_security/role_mapping/users'
              . '{'
              . '  "roles" : [ "user" ],'
              . '  "rules" : { "field" : {'
              . '    "dn" : "cn=John Doe,ou=example,o=com" \<1>'
              . '  } },'
              . '  "enabled": true'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
