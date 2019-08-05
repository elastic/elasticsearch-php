<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: OidcAuthenticateApi
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/security/oidc-authenticate-api.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class OidcAuthenticateApi extends SimpleExamplesTester {

    /**
     * Tag:  95b341300d31db2f573905ebeac42d89
     * Line: 45
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL45_95b341300d31db2f573905ebeac42d89()
    {
        $client = $this->getClient();
        // tag::95b341300d31db2f573905ebeac42d89[]
        // TODO -- Implement Example
        // POST /_security/oidc/authenticate
        // {
        //   "redirect_uri" : "https://oidc-kibana.elastic.co:5603/api/security/v1/oidc?code=jtI3Ntt8v3_XvcLzCFGq&state=4dbrihtIAt3wBTwo6DxK-vdk-sSyDBV8Yf0AjdkdT5I",
        //   "state" : "4dbrihtIAt3wBTwo6DxK-vdk-sSyDBV8Yf0AjdkdT5I",
        //   "nonce" : "WaBPH0KqPVdG5HHdSxPRjfoZbXMCicm5v1OiAj0DUFM"
        // }
        // end::95b341300d31db2f573905ebeac42d89[]

        $curl = 'POST /_security/oidc/authenticate'
              . '{'
              . '  "redirect_uri" : "https://oidc-kibana.elastic.co:5603/api/security/v1/oidc?code=jtI3Ntt8v3_XvcLzCFGq&state=4dbrihtIAt3wBTwo6DxK-vdk-sSyDBV8Yf0AjdkdT5I",'
              . '  "state" : "4dbrihtIAt3wBTwo6DxK-vdk-sSyDBV8Yf0AjdkdT5I",'
              . '  "nonce" : "WaBPH0KqPVdG5HHdSxPRjfoZbXMCicm5v1OiAj0DUFM"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
