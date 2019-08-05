<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ClearRolesCache
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/security/clear-roles-cache.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ClearRolesCache extends SimpleExamplesTester {

    /**
     * Tag:  ee577c4c7cc723e99569ea2d1137adba
     * Line: 39
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL39_ee577c4c7cc723e99569ea2d1137adba()
    {
        $client = $this->getClient();
        // tag::ee577c4c7cc723e99569ea2d1137adba[]
        // TODO -- Implement Example
        // POST /_security/role/my_admin_role/_clear_cache
        // end::ee577c4c7cc723e99569ea2d1137adba[]

        $curl = 'POST /_security/role/my_admin_role/_clear_cache';

        // TODO -- make assertion
    }

// %__METHOD__%


}
