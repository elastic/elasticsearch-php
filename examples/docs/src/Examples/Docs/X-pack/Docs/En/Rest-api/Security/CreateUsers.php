<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: CreateUsers
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/security/create-users.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class CreateUsers extends SimpleExamplesTester {

    /**
     * Tag:  4c514b787945952a223cde8a4a09e826
     * Line: 100
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL100_4c514b787945952a223cde8a4a09e826()
    {
        $client = $this->getClient();
        // tag::4c514b787945952a223cde8a4a09e826[]
        // TODO -- Implement Example
        // POST /_security/user/jacknich
        // {
        //   "password" : "j@rV1s",
        //   "roles" : [ "admin", "other_role1" ],
        //   "full_name" : "Jack Nicholson",
        //   "email" : "jacknich@example.com",
        //   "metadata" : {
        //     "intelligence" : 7
        //   }
        // }
        // end::4c514b787945952a223cde8a4a09e826[]

        $curl = 'POST /_security/user/jacknich'
              . '{'
              . '  "password" : "j@rV1s",'
              . '  "roles" : [ "admin", "other_role1" ],'
              . '  "full_name" : "Jack Nicholson",'
              . '  "email" : "jacknich@example.com",'
              . '  "metadata" : {'
              . '    "intelligence" : 7'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
