<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: InvalidateTokens
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/security/invalidate-tokens.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class InvalidateTokens extends SimpleExamplesTester {

    /**
     * Tag:  cee591c1fc70d4f180c623a3a6d07755
     * Line: 61
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL61_cee591c1fc70d4f180c623a3a6d07755()
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
     * Tag:  da2bb6894d95489812b653be2feeeb5b
     * Line: 73
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL73_da2bb6894d95489812b653be2feeeb5b()
    {
        $client = $this->getClient();
        // tag::da2bb6894d95489812b653be2feeeb5b[]
        // TODO -- Implement Example
        // {
        //   "access_token" : "dGhpcyBpcyBub3QgYSByZWFsIHRva2VuIGJ1dCBpdCBpcyBvbmx5IHRlc3QgZGF0YS4gZG8gbm90IHRyeSB0byByZWFkIHRva2VuIQ==",
        //   "type" : "Bearer",
        //   "expires_in" : 1200
        // }
        // end::da2bb6894d95489812b653be2feeeb5b[]

        $curl = '{'
              . '  "access_token" : "dGhpcyBpcyBub3QgYSByZWFsIHRva2VuIGJ1dCBpdCBpcyBvbmx5IHRlc3QgZGF0YS4gZG8gbm90IHRyeSB0byByZWFkIHRva2VuIQ==",'
              . '  "type" : "Bearer",'
              . '  "expires_in" : 1200'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  dbf9abc37899352751dab0ede62af2fd
     * Line: 87
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL87_dbf9abc37899352751dab0ede62af2fd()
    {
        $client = $this->getClient();
        // tag::dbf9abc37899352751dab0ede62af2fd[]
        // TODO -- Implement Example
        // DELETE /_security/oauth2/token
        // {
        //   "token" : "dGhpcyBpcyBub3QgYSByZWFsIHRva2VuIGJ1dCBpdCBpcyBvbmx5IHRlc3QgZGF0YS4gZG8gbm90IHRyeSB0byByZWFkIHRva2VuIQ=="
        // }
        // end::dbf9abc37899352751dab0ede62af2fd[]

        $curl = 'DELETE /_security/oauth2/token'
              . '{'
              . '  "token" : "dGhpcyBpcyBub3QgYSByZWFsIHRva2VuIGJ1dCBpdCBpcyBvbmx5IHRlc3QgZGF0YS4gZG8gbm90IHRyeSB0byByZWFkIHRva2VuIQ=="'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e1337c6b76defd5a46d05220f9d9c9fc
     * Line: 101
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL101_e1337c6b76defd5a46d05220f9d9c9fc()
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
     * Tag:  774740abbecda50b03d75dbff8cbe60f
     * Line: 115
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL115_774740abbecda50b03d75dbff8cbe60f()
    {
        $client = $this->getClient();
        // tag::774740abbecda50b03d75dbff8cbe60f[]
        // TODO -- Implement Example
        // {
        //   "access_token" : "dGhpcyBpcyBub3QgYSByZWFsIHRva2VuIGJ1dCBpdCBpcyBvbmx5IHRlc3QgZGF0YS4gZG8gbm90IHRyeSB0byByZWFkIHRva2VuIQ==",
        //   "type" : "Bearer",
        //   "expires_in" : 1200,
        //   "refresh_token": "vLBPvmAB6KvwvJZr27cS"
        // }
        // end::774740abbecda50b03d75dbff8cbe60f[]

        $curl = '{'
              . '  "access_token" : "dGhpcyBpcyBub3QgYSByZWFsIHRva2VuIGJ1dCBpdCBpcyBvbmx5IHRlc3QgZGF0YS4gZG8gbm90IHRyeSB0byByZWFkIHRva2VuIQ==",'
              . '  "type" : "Bearer",'
              . '  "expires_in" : 1200,'
              . '  "refresh_token": "vLBPvmAB6KvwvJZr27cS"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0c6f9c9da75293fae69659ac1d6329de
     * Line: 131
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL131_0c6f9c9da75293fae69659ac1d6329de()
    {
        $client = $this->getClient();
        // tag::0c6f9c9da75293fae69659ac1d6329de[]
        // TODO -- Implement Example
        // DELETE /_security/oauth2/token
        // {
        //   "refresh_token" : "vLBPvmAB6KvwvJZr27cS"
        // }
        // end::0c6f9c9da75293fae69659ac1d6329de[]

        $curl = 'DELETE /_security/oauth2/token'
              . '{'
              . '  "refresh_token" : "vLBPvmAB6KvwvJZr27cS"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4bc4db44b8c74610b73f21a421099a13
     * Line: 145
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL145_4bc4db44b8c74610b73f21a421099a13()
    {
        $client = $this->getClient();
        // tag::4bc4db44b8c74610b73f21a421099a13[]
        // TODO -- Implement Example
        // DELETE /_security/oauth2/token
        // {
        //   "realm_name" : "saml1"
        // }
        // end::4bc4db44b8c74610b73f21a421099a13[]

        $curl = 'DELETE /_security/oauth2/token'
              . '{'
              . '  "realm_name" : "saml1"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0280247e0cf2e561c548f22c9fb31163
     * Line: 158
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL158_0280247e0cf2e561c548f22c9fb31163()
    {
        $client = $this->getClient();
        // tag::0280247e0cf2e561c548f22c9fb31163[]
        // TODO -- Implement Example
        // DELETE /_security/oauth2/token
        // {
        //   "username" : "myuser"
        // }
        // end::0280247e0cf2e561c548f22c9fb31163[]

        $curl = 'DELETE /_security/oauth2/token'
              . '{'
              . '  "username" : "myuser"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6dd2a107bc64fd6f058fb17c21640649
     * Line: 171
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL171_6dd2a107bc64fd6f058fb17c21640649()
    {
        $client = $this->getClient();
        // tag::6dd2a107bc64fd6f058fb17c21640649[]
        // TODO -- Implement Example
        // DELETE /_security/oauth2/token
        // {
        //   "username" : "myuser",
        //   "realm_name" : "saml1"
        // }
        // end::6dd2a107bc64fd6f058fb17c21640649[]

        $curl = 'DELETE /_security/oauth2/token'
              . '{'
              . '  "username" : "myuser",'
              . '  "realm_name" : "saml1"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%










}
