<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: OidcPrepareAuthenticationApi
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ../../x-pack/docs/en/rest-api/security/oidc-prepare-authentication-api.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class OidcPrepareAuthenticationApi extends SimpleExamplesTester {

    /**
     * Tag:  e3019fd5f23458ae49ad9854c97d321c
     * Line: 53
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL53_e3019fd5f23458ae49ad9854c97d321c()
    {
        $client = $this->getClient();
        // tag::e3019fd5f23458ae49ad9854c97d321c[]
        // TODO -- Implement Example
        // POST /_security/oidc/prepare
        // {
        //   "realm" : "oidc1"
        // }
        // end::e3019fd5f23458ae49ad9854c97d321c[]

        $curl = 'POST /_security/oidc/prepare'
              . '{'
              . '  "realm" : "oidc1"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  57dc15e5ad663c342fd5c1d86fcd1b29
     * Line: 78
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL78_57dc15e5ad663c342fd5c1d86fcd1b29()
    {
        $client = $this->getClient();
        // tag::57dc15e5ad663c342fd5c1d86fcd1b29[]
        // TODO -- Implement Example
        // POST /_security/oidc/prepare
        // {
        //   "realm" : "oidc1",
        //   "state" : "lGYK0EcSLjqH6pkT5EVZjC6eIW5YCGgywj2sxROO",
        //   "nonce" : "zOBXLJGUooRrbLbQk5YCcyC8AXw3iloynvluYhZ5"
        // }
        // end::57dc15e5ad663c342fd5c1d86fcd1b29[]

        $curl = 'POST /_security/oidc/prepare'
              . '{'
              . '  "realm" : "oidc1",'
              . '  "state" : "lGYK0EcSLjqH6pkT5EVZjC6eIW5YCGgywj2sxROO",'
              . '  "nonce" : "zOBXLJGUooRrbLbQk5YCcyC8AXw3iloynvluYhZ5"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d35c8cf7a98b3f112e1de8797ec6689d
     * Line: 105
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL105_d35c8cf7a98b3f112e1de8797ec6689d()
    {
        $client = $this->getClient();
        // tag::d35c8cf7a98b3f112e1de8797ec6689d[]
        // TODO -- Implement Example
        // POST /_security/oidc/prepare
        // {
        //   "iss" : "http://127.0.0.1:8080",
        //   "login_hint": "this_is_an_opaque_string"
        // }
        // end::d35c8cf7a98b3f112e1de8797ec6689d[]

        $curl = 'POST /_security/oidc/prepare'
              . '{'
              . '  "iss" : "http://127.0.0.1:8080",'
              . '  "login_hint": "this_is_an_opaque_string"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
