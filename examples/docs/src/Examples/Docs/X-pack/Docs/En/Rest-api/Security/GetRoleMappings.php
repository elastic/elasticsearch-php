<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetRoleMappings
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/security/get-role-mappings.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetRoleMappings extends SimpleExamplesTester {

    /**
     * Tag:  8b3a94495127efd9d56b2cd7f3eecdca
     * Line: 53
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL53_8b3a94495127efd9d56b2cd7f3eecdca()
    {
        $client = $this->getClient();
        // tag::8b3a94495127efd9d56b2cd7f3eecdca[]
        // TODO -- Implement Example
        // GET /_security/role_mapping/mapping1
        // end::8b3a94495127efd9d56b2cd7f3eecdca[]

        $curl = 'GET /_security/role_mapping/mapping1';

        // TODO -- make assertion
    }

// %__METHOD__%


}
