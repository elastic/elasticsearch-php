<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetUsers
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ../../x-pack/docs/en/rest-api/security/get-users.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetUsers extends SimpleExamplesTester {

    /**
     * Tag:  3924ee252581ebb96ac0e60046125ae8
     * Line: 41
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL41_3924ee252581ebb96ac0e60046125ae8()
    {
        $client = $this->getClient();
        // tag::3924ee252581ebb96ac0e60046125ae8[]
        // TODO -- Implement Example
        // GET /_security/user/jacknich
        // end::3924ee252581ebb96ac0e60046125ae8[]

        $curl = 'GET /_security/user/jacknich';

        // TODO -- make assertion
    }

    /**
     * Tag:  bac6203259754d2f09c1ebeecc9ded5d
     * Line: 51
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL51_bac6203259754d2f09c1ebeecc9ded5d()
    {
        $client = $this->getClient();
        // tag::bac6203259754d2f09c1ebeecc9ded5d[]
        // TODO -- Implement Example
        // {
        //   "jacknich": {
        //     "username": "jacknich",
        //     "roles": [
        //       "admin", "other_role1"
        //     ],
        //     "full_name": "Jack Nicholson",
        //     "email": "jacknich@example.com",
        //     "metadata": { "intelligence" : 7 },
        //     "enabled": true
        //   }
        // }
        // end::bac6203259754d2f09c1ebeecc9ded5d[]

        $curl = '{'
              . '  "jacknich": {'
              . '    "username": "jacknich",'
              . '    "roles": ['
              . '      "admin", "other_role1"'
              . '    ],'
              . '    "full_name": "Jack Nicholson",'
              . '    "email": "jacknich@example.com",'
              . '    "metadata": { "intelligence" : 7 },'
              . '    "enabled": true'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  abdbc81e799e28c833556b1c29f03ba6
     * Line: 73
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL73_abdbc81e799e28c833556b1c29f03ba6()
    {
        $client = $this->getClient();
        // tag::abdbc81e799e28c833556b1c29f03ba6[]
        // TODO -- Implement Example
        // GET /_security/user
        // end::abdbc81e799e28c833556b1c29f03ba6[]

        $curl = 'GET /_security/user';

        // TODO -- make assertion
    }

// %__METHOD__%




}
