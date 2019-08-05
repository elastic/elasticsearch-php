<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeleteUsers
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/security/delete-users.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeleteUsers extends SimpleExamplesTester {

    /**
     * Tag:  ffd63dd186ab81b893faec3b3358fa09
     * Line: 36
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL36_ffd63dd186ab81b893faec3b3358fa09()
    {
        $client = $this->getClient();
        // tag::ffd63dd186ab81b893faec3b3358fa09[]
        // TODO -- Implement Example
        // DELETE /_security/user/jacknich
        // end::ffd63dd186ab81b893faec3b3358fa09[]

        $curl = 'DELETE /_security/user/jacknich';

        // TODO -- make assertion
    }

// %__METHOD__%


}
