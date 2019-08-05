<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeleteRoleMappings
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/security/delete-role-mappings.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeleteRoleMappings extends SimpleExamplesTester {

    /**
     * Tag:  261480571394632db40e88fbb6c59c2f
     * Line: 38
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL38_261480571394632db40e88fbb6c59c2f()
    {
        $client = $this->getClient();
        // tag::261480571394632db40e88fbb6c59c2f[]
        // TODO -- Implement Example
        // DELETE /_security/role_mapping/mapping1
        // end::261480571394632db40e88fbb6c59c2f[]

        $curl = 'DELETE /_security/role_mapping/mapping1';

        // TODO -- make assertion
    }

// %__METHOD__%


}
