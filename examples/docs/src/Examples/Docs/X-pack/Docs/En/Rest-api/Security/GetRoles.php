<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetRoles
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ../../x-pack/docs/en/rest-api/security/get-roles.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetRoles extends SimpleExamplesTester {

    /**
     * Tag:  115529722ba30b0b0d51a7ff87e59198
     * Line: 42
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL42_115529722ba30b0b0d51a7ff87e59198()
    {
        $client = $this->getClient();
        // tag::115529722ba30b0b0d51a7ff87e59198[]
        // TODO -- Implement Example
        // GET /_security/role/my_admin_role
        // end::115529722ba30b0b0d51a7ff87e59198[]

        $curl = 'GET /_security/role/my_admin_role';

        // TODO -- make assertion
    }

    /**
     * Tag:  128283698535116931dca9d16a16dca2
     * Line: 81
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL81_128283698535116931dca9d16a16dca2()
    {
        $client = $this->getClient();
        // tag::128283698535116931dca9d16a16dca2[]
        // TODO -- Implement Example
        // GET /_security/role
        // end::128283698535116931dca9d16a16dca2[]

        $curl = 'GET /_security/role';

        // TODO -- make assertion
    }

// %__METHOD__%



}
