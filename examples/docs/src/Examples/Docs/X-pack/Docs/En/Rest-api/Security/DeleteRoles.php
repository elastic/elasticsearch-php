<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeleteRoles
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/security/delete-roles.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeleteRoles extends SimpleExamplesTester {

    /**
     * Tag:  cffce059425d3d21e7f9571500d63524
     * Line: 40
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL40_cffce059425d3d21e7f9571500d63524()
    {
        $client = $this->getClient();
        // tag::cffce059425d3d21e7f9571500d63524[]
        // TODO -- Implement Example
        // DELETE /_security/role/my_admin_role
        // end::cffce059425d3d21e7f9571500d63524[]

        $curl = 'DELETE /_security/role/my_admin_role';

        // TODO -- make assertion
    }

// %__METHOD__%


}
