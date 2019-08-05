<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ChangePassword
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/security/change-password.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ChangePassword extends SimpleExamplesTester {

    /**
     * Tag:  a2d14f8f1ea3efe970887f7892fdb268
     * Line: 50
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL50_a2d14f8f1ea3efe970887f7892fdb268()
    {
        $client = $this->getClient();
        // tag::a2d14f8f1ea3efe970887f7892fdb268[]
        // TODO -- Implement Example
        // POST /_security/user/jacknich/_password
        // {
        //   "password" : "s3cr3t"
        // }
        // end::a2d14f8f1ea3efe970887f7892fdb268[]

        $curl = 'POST /_security/user/jacknich/_password'
              . '{'
              . '  "password" : "s3cr3t"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
