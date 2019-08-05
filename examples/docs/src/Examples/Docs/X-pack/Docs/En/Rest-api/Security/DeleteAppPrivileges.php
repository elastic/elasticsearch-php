<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeleteAppPrivileges
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/security/delete-app-privileges.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeleteAppPrivileges extends SimpleExamplesTester {

    /**
     * Tag:  ebd76a45e153c4656c5871e23b7b5508
     * Line: 42
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL42_ebd76a45e153c4656c5871e23b7b5508()
    {
        $client = $this->getClient();
        // tag::ebd76a45e153c4656c5871e23b7b5508[]
        // TODO -- Implement Example
        // DELETE /_security/privilege/myapp/read
        // end::ebd76a45e153c4656c5871e23b7b5508[]

        $curl = 'DELETE /_security/privilege/myapp/read';

        // TODO -- make assertion
    }

// %__METHOD__%


}
