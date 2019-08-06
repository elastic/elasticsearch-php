<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetTokens
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ../../x-pack/docs/en/rest-api/security/get-tokens.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetTokens extends SimpleExamplesTester {

    /**
     * Tag:  cee591c1fc70d4f180c623a3a6d07755
     * Line: 80
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL80_cee591c1fc70d4f180c623a3a6d07755()
    {
        $client = $this->getClient();
        // tag::cee591c1fc70d4f180c623a3a6d07755[]
        // TODO -- Implement Example
        // POST /_security/oauth2/token
        // {
        //   "grant_type" : "client_credentials"
        // }
        // end::cee591c1fc70d4f180c623a3a6d07755[]

        $curl = 'POST /_security/oauth2/token'
              . '{'
              . '  "grant_type" : "client_credentials"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e1337c6b76defd5a46d05220f9d9c9fc
     * Line: 115
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL115_e1337c6b76defd5a46d05220f9d9c9fc()
    {
        $client = $this->getClient();
        // tag::e1337c6b76defd5a46d05220f9d9c9fc[]
        // TODO -- Implement Example
        // POST /_security/oauth2/token
        // {
        //   "grant_type" : "password",
        //   "username" : "test_admin",
        //   "password" : "x-pack-test-password"
        // }
        // end::e1337c6b76defd5a46d05220f9d9c9fc[]

        $curl = 'POST /_security/oauth2/token'
              . '{'
              . '  "grant_type" : "password",'
              . '  "username" : "test_admin",'
              . '  "password" : "x-pack-test-password"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1873f8a8a291e6fcd6c1c83ea6928759
     * Line: 146
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL146_1873f8a8a291e6fcd6c1c83ea6928759()
    {
        $client = $this->getClient();
        // tag::1873f8a8a291e6fcd6c1c83ea6928759[]
        // TODO -- Implement Example
        // POST /_security/oauth2/token
        // {
        //     "grant_type": "refresh_token",
        //     "refresh_token": "vLBPvmAB6KvwvJZr27cS"
        // }
        // end::1873f8a8a291e6fcd6c1c83ea6928759[]

        $curl = 'POST /_security/oauth2/token'
              . '{'
              . '    "grant_type": "refresh_token",'
              . '    "refresh_token": "vLBPvmAB6KvwvJZr27cS"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
