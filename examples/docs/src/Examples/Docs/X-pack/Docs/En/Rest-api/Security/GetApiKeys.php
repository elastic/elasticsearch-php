<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetApiKeys
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ../../x-pack/docs/en/rest-api/security/get-api-keys.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetApiKeys extends SimpleExamplesTester {

    /**
     * Tag:  8d3be5482270921111754772479f8676
     * Line: 51
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL51_8d3be5482270921111754772479f8676()
    {
        $client = $this->getClient();
        // tag::8d3be5482270921111754772479f8676[]
        // TODO -- Implement Example
        // POST /_security/api_key
        // {
        //   "name": "my-api-key",
        //   "role_descriptors": {}
        // }
        // end::8d3be5482270921111754772479f8676[]

        $curl = 'POST /_security/api_key'
              . '{'
              . '  "name": "my-api-key",'
              . '  "role_descriptors": {}'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  701f1fffc65e9e51c96aa60261e2eae3
     * Line: 78
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL78_701f1fffc65e9e51c96aa60261e2eae3()
    {
        $client = $this->getClient();
        // tag::701f1fffc65e9e51c96aa60261e2eae3[]
        // TODO -- Implement Example
        // GET /_security/api_key?id=VuaCfGcBCdbkQm-e5aOx
        // end::701f1fffc65e9e51c96aa60261e2eae3[]

        $curl = 'GET /_security/api_key?id=VuaCfGcBCdbkQm-e5aOx';

        // TODO -- make assertion
    }

    /**
     * Tag:  7b864d61767ab283cfd5f9b9ba784b1f
     * Line: 88
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL88_7b864d61767ab283cfd5f9b9ba784b1f()
    {
        $client = $this->getClient();
        // tag::7b864d61767ab283cfd5f9b9ba784b1f[]
        // TODO -- Implement Example
        // GET /_security/api_key?name=my-api-key
        // end::7b864d61767ab283cfd5f9b9ba784b1f[]

        $curl = 'GET /_security/api_key?name=my-api-key';

        // TODO -- make assertion
    }

    /**
     * Tag:  10d9da8a3b7061479be908c8c5c76cfb
     * Line: 97
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL97_10d9da8a3b7061479be908c8c5c76cfb()
    {
        $client = $this->getClient();
        // tag::10d9da8a3b7061479be908c8c5c76cfb[]
        // TODO -- Implement Example
        // GET /_security/api_key?realm_name=native1
        // end::10d9da8a3b7061479be908c8c5c76cfb[]

        $curl = 'GET /_security/api_key?realm_name=native1';

        // TODO -- make assertion
    }

    /**
     * Tag:  62eafc5b3ab75cc67314d5a8567d6077
     * Line: 106
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL106_62eafc5b3ab75cc67314d5a8567d6077()
    {
        $client = $this->getClient();
        // tag::62eafc5b3ab75cc67314d5a8567d6077[]
        // TODO -- Implement Example
        // GET /_security/api_key?username=myuser
        // end::62eafc5b3ab75cc67314d5a8567d6077[]

        $curl = 'GET /_security/api_key?username=myuser';

        // TODO -- make assertion
    }

    /**
     * Tag:  30abc76a39e551f4b52c65002bb6405d
     * Line: 116
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL116_30abc76a39e551f4b52c65002bb6405d()
    {
        $client = $this->getClient();
        // tag::30abc76a39e551f4b52c65002bb6405d[]
        // TODO -- Implement Example
        // GET /_security/api_key?username=myuser&realm_name=native1
        // end::30abc76a39e551f4b52c65002bb6405d[]

        $curl = 'GET /_security/api_key?username=myuser&realm_name=native1';

        // TODO -- make assertion
    }

// %__METHOD__%







}
