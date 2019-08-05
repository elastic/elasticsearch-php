<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: CreateRoleMappings
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/security/create-role-mappings.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class CreateRoleMappings extends SimpleExamplesTester {

    /**
     * Tag:  23b062c157235246d7c347b9047b2435
     * Line: 104
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL104_23b062c157235246d7c347b9047b2435()
    {
        $client = $this->getClient();
        // tag::23b062c157235246d7c347b9047b2435[]
        // TODO -- Implement Example
        // POST /_security/role_mapping/mapping1
        // {
        //   "roles": [ "user"],
        //   "enabled": true, \<1>
        //   "rules": {
        //     "field" : { "username" : "*" }
        //   },
        //   "metadata" : { \<2>
        //     "version" : 1
        //   }
        // }
        // end::23b062c157235246d7c347b9047b2435[]

        $curl = 'POST /_security/role_mapping/mapping1'
              . '{'
              . '  "roles": [ "user"],'
              . '  "enabled": true, \<1>'
              . '  "rules": {'
              . '    "field" : { "username" : "*" }'
              . '  },'
              . '  "metadata" : { \<2>'
              . '    "version" : 1'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b176e0d428726705298184ef39ad5cb2
     * Line: 139
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL139_b176e0d428726705298184ef39ad5cb2()
    {
        $client = $this->getClient();
        // tag::b176e0d428726705298184ef39ad5cb2[]
        // TODO -- Implement Example
        // POST /_security/role_mapping/mapping2
        // {
        //   "roles": [ "user", "admin" ],
        //   "enabled": true,
        //   "rules": {
        //      "field" : { "username" : [ "esadmin01", "esadmin02" ] }
        //   }
        // }
        // end::b176e0d428726705298184ef39ad5cb2[]

        $curl = 'POST /_security/role_mapping/mapping2'
              . '{'
              . '  "roles": [ "user", "admin" ],'
              . '  "enabled": true,'
              . '  "rules": {'
              . '     "field" : { "username" : [ "esadmin01", "esadmin02" ] }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e60b7f75ca806f2c74927c3d9409a986
     * Line: 153
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL153_e60b7f75ca806f2c74927c3d9409a986()
    {
        $client = $this->getClient();
        // tag::e60b7f75ca806f2c74927c3d9409a986[]
        // TODO -- Implement Example
        // POST /_security/role_mapping/mapping3
        // {
        //   "roles": [ "ldap-user" ],
        //   "enabled": true,
        //   "rules": {
        //     "field" : { "realm.name" : "ldap1" }
        //   }
        // }
        // end::e60b7f75ca806f2c74927c3d9409a986[]

        $curl = 'POST /_security/role_mapping/mapping3'
              . '{'
              . '  "roles": [ "ldap-user" ],'
              . '  "enabled": true,'
              . '  "rules": {'
              . '    "field" : { "realm.name" : "ldap1" }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7a23a385a63c87cab58fd494870450fd
     * Line: 169
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL169_7a23a385a63c87cab58fd494870450fd()
    {
        $client = $this->getClient();
        // tag::7a23a385a63c87cab58fd494870450fd[]
        // TODO -- Implement Example
        // POST /_security/role_mapping/mapping4
        // {
        //   "roles": [ "superuser" ],
        //   "enabled": true,
        //   "rules": {
        //     "any": [
        //       {
        //         "field": {
        //           "username": "esadmin"
        //         }
        //       },
        //       {
        //         "field": {
        //           "groups": "cn=admins,dc=example,dc=com"
        //         }
        //       }
        //     ]
        //   }
        // }
        // end::7a23a385a63c87cab58fd494870450fd[]

        $curl = 'POST /_security/role_mapping/mapping4'
              . '{'
              . '  "roles": [ "superuser" ],'
              . '  "enabled": true,'
              . '  "rules": {'
              . '    "any": ['
              . '      {'
              . '        "field": {'
              . '          "username": "esadmin"'
              . '        }'
              . '      },'
              . '      {'
              . '        "field": {'
              . '          "groups": "cn=admins,dc=example,dc=com"'
              . '        }'
              . '      }'
              . '    ]'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5ad365ed9e1a3c26093a0f09666c133a
     * Line: 212
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL212_5ad365ed9e1a3c26093a0f09666c133a()
    {
        $client = $this->getClient();
        // tag::5ad365ed9e1a3c26093a0f09666c133a[]
        // TODO -- Implement Example
        // POST /_security/role_mapping/mapping5
        // {
        //   "role_templates": [
        //     {
        //       "template": { "source": "{{#tojson}}groups{{/tojson}}" }, \<1>
        //       "format" : "json" \<2>
        //     }
        //   ],
        //   "rules": {
        //     "field" : { "realm.name" : "saml1" }
        //   },
        //   "enabled": true
        // }
        // end::5ad365ed9e1a3c26093a0f09666c133a[]

        $curl = 'POST /_security/role_mapping/mapping5'
              . '{'
              . '  "role_templates": ['
              . '    {'
              . '      "template": { "source": "{{#tojson}}groups{{/tojson}}" }, \<1>'
              . '      "format" : "json" \<2>'
              . '    }'
              . '  ],'
              . '  "rules": {'
              . '    "field" : { "realm.name" : "saml1" }'
              . '  },'
              . '  "enabled": true'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7e5faa551f2c95ffd627da352563d450
     * Line: 236
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL236_7e5faa551f2c95ffd627da352563d450()
    {
        $client = $this->getClient();
        // tag::7e5faa551f2c95ffd627da352563d450[]
        // TODO -- Implement Example
        // POST /_security/role_mapping/mapping6
        // {
        //   "roles": [ "example-user" ],
        //   "enabled": true,
        //   "rules": {
        //     "field" : { "dn" : "*,ou=subtree,dc=example,dc=com" }
        //   }
        // }
        // end::7e5faa551f2c95ffd627da352563d450[]

        $curl = 'POST /_security/role_mapping/mapping6'
              . '{'
              . '  "roles": [ "example-user" ],'
              . '  "enabled": true,'
              . '  "rules": {'
              . '    "field" : { "dn" : "*,ou=subtree,dc=example,dc=com" }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b80e1f5b26bae4f3c2f8a604b7caaf17
     * Line: 252
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL252_b80e1f5b26bae4f3c2f8a604b7caaf17()
    {
        $client = $this->getClient();
        // tag::b80e1f5b26bae4f3c2f8a604b7caaf17[]
        // TODO -- Implement Example
        // POST /_security/role_mapping/mapping7
        // {
        //   "roles": [ "ldap-example-user" ],
        //   "enabled": true,
        //   "rules": {
        //     "all": [
        //       { "field" : { "dn" : "*,ou=subtree,dc=example,dc=com" } },
        //       { "field" : { "realm.name" : "ldap1" } }
        //     ]
        //   }
        // }
        // end::b80e1f5b26bae4f3c2f8a604b7caaf17[]

        $curl = 'POST /_security/role_mapping/mapping7'
              . '{'
              . '  "roles": [ "ldap-example-user" ],'
              . '  "enabled": true,'
              . '  "rules": {'
              . '    "all": ['
              . '      { "field" : { "dn" : "*,ou=subtree,dc=example,dc=com" } },'
              . '      { "field" : { "realm.name" : "ldap1" } }'
              . '    ]'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0d94d76b7f00d0459d1f8c962c144dcd
     * Line: 277
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL277_0d94d76b7f00d0459d1f8c962c144dcd()
    {
        $client = $this->getClient();
        // tag::0d94d76b7f00d0459d1f8c962c144dcd[]
        // TODO -- Implement Example
        // POST /_security/role_mapping/mapping8
        // {
        //   "roles": [ "superuser" ],
        //   "enabled": true,
        //   "rules": {
        //     "all": [
        //       {
        //         "any": [
        //           {
        //             "field": {
        //               "dn": "*,ou=admin,dc=example,dc=com"
        //             }
        //           },
        //           {
        //             "field": {
        //               "username": [ "es-admin", "es-system" ]
        //             }
        //           }
        //         ]
        //       },
        //       {
        //         "field": {
        //           "groups": "cn=people,dc=example,dc=com"
        //         }
        //       },
        //       {
        //         "except": {
        //           "field": {
        //             "metadata.terminated_date": null
        //           }
        //         }
        //       }
        //     ]
        //   }
        // }
        // end::0d94d76b7f00d0459d1f8c962c144dcd[]

        $curl = 'POST /_security/role_mapping/mapping8'
              . '{'
              . '  "roles": [ "superuser" ],'
              . '  "enabled": true,'
              . '  "rules": {'
              . '    "all": ['
              . '      {'
              . '        "any": ['
              . '          {'
              . '            "field": {'
              . '              "dn": "*,ou=admin,dc=example,dc=com"'
              . '            }'
              . '          },'
              . '          {'
              . '            "field": {'
              . '              "username": [ "es-admin", "es-system" ]'
              . '            }'
              . '          }'
              . '        ]'
              . '      },'
              . '      {'
              . '        "field": {'
              . '          "groups": "cn=people,dc=example,dc=com"'
              . '        }'
              . '      },'
              . '      {'
              . '        "except": {'
              . '          "field": {'
              . '            "metadata.terminated_date": null'
              . '          }'
              . '        }'
              . '      }'
              . '    ]'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  50dc35d3d8705bd62aed20a15209476c
     * Line: 328
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL328_50dc35d3d8705bd62aed20a15209476c()
    {
        $client = $this->getClient();
        // tag::50dc35d3d8705bd62aed20a15209476c[]
        // TODO -- Implement Example
        // POST /_security/role_mapping/mapping9
        // {
        //   "rules": { "field": { "realm.name": "cloud-saml" } },
        //   "role_templates": [
        //     { "template": { "source" : "saml_user" } }, \<1>
        //     { "template": { "source" : "_user_{{username}}" } }
        //   ],
        //   "enabled": true
        // }
        // end::50dc35d3d8705bd62aed20a15209476c[]

        $curl = 'POST /_security/role_mapping/mapping9'
              . '{'
              . '  "rules": { "field": { "realm.name": "cloud-saml" } },'
              . '  "role_templates": ['
              . '    { "template": { "source" : "saml_user" } }, \<1>'
              . '    { "template": { "source" : "_user_{{username}}" } }'
              . '  ],'
              . '  "enabled": true'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%










}
