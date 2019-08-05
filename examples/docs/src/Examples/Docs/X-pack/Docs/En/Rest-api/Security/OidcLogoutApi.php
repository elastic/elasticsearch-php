<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: OidcLogoutApi
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/security/oidc-logout-api.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class OidcLogoutApi extends SimpleExamplesTester {

    /**
     * Tag:  2a1eece9a59ac1773edcf0a932c26de0
     * Line: 34
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL34_2a1eece9a59ac1773edcf0a932c26de0()
    {
        $client = $this->getClient();
        // tag::2a1eece9a59ac1773edcf0a932c26de0[]
        // TODO -- Implement Example
        // POST /_security/oidc/logout
        // {
        //   "token" : "dGhpcyBpcyBub3QgYSByZWFsIHRva2VuIGJ1dCBpdCBpcyBvbmx5IHRlc3QgZGF0YS4gZG8gbm90IHRyeSB0byByZWFkIHRva2VuIQ==",
        //   "refresh_token": "vLBPvmAB6KvwvJZr27cS"
        // }
        // end::2a1eece9a59ac1773edcf0a932c26de0[]

        $curl = 'POST /_security/oidc/logout'
              . '{'
              . '  "token" : "dGhpcyBpcyBub3QgYSByZWFsIHRva2VuIGJ1dCBpdCBpcyBvbmx5IHRlc3QgZGF0YS4gZG8gbm90IHRyeSB0byByZWFkIHRva2VuIQ==",'
              . '  "refresh_token": "vLBPvmAB6KvwvJZr27cS"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
