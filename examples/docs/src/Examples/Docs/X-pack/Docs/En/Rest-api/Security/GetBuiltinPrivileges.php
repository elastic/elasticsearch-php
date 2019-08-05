<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetBuiltinPrivileges
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/security/get-builtin-privileges.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetBuiltinPrivileges extends SimpleExamplesTester {

    /**
     * Tag:  2623eb122cc0299b42fc9eca6e7f5e56
     * Line: 48
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL48_2623eb122cc0299b42fc9eca6e7f5e56()
    {
        $client = $this->getClient();
        // tag::2623eb122cc0299b42fc9eca6e7f5e56[]
        // TODO -- Implement Example
        // GET /_security/privilege/_builtin
        // end::2623eb122cc0299b42fc9eca6e7f5e56[]

        $curl = 'GET /_security/privilege/_builtin';

        // TODO -- make assertion
    }

// %__METHOD__%


}
