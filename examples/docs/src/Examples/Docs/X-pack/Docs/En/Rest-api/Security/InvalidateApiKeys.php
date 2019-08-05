<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: InvalidateApiKeys
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/security/invalidate-api-keys.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class InvalidateApiKeys extends SimpleExamplesTester {

    /**
     * Tag:  0aff04881be21eea45375ec4f4f50e66
     * Line: 51
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL51_0aff04881be21eea45375ec4f4f50e66()
    {
        $client = $this->getClient();
        // tag::0aff04881be21eea45375ec4f4f50e66[]
        // TODO -- Implement Example
        // POST /_security/api_key
        // {
        //   "name": "my-api-key"
        // }
        // end::0aff04881be21eea45375ec4f4f50e66[]

        $curl = 'POST /_security/api_key'
              . '{'
              . '  "name": "my-api-key"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  01cc9dac719f2612a48cc1b23db7cd54
     * Line: 77
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL77_01cc9dac719f2612a48cc1b23db7cd54()
    {
        $client = $this->getClient();
        // tag::01cc9dac719f2612a48cc1b23db7cd54[]
        // TODO -- Implement Example
        // DELETE /_security/api_key
        // {
        //   "id" : "VuaCfGcBCdbkQm-e5aOx"
        // }
        // end::01cc9dac719f2612a48cc1b23db7cd54[]

        $curl = 'DELETE /_security/api_key'
              . '{'
              . '  "id" : "VuaCfGcBCdbkQm-e5aOx"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f388e571224dd6850f8c9f9f08fca3da
     * Line: 90
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL90_f388e571224dd6850f8c9f9f08fca3da()
    {
        $client = $this->getClient();
        // tag::f388e571224dd6850f8c9f9f08fca3da[]
        // TODO -- Implement Example
        // DELETE /_security/api_key
        // {
        //   "name" : "my-api-key"
        // }
        // end::f388e571224dd6850f8c9f9f08fca3da[]

        $curl = 'DELETE /_security/api_key'
              . '{'
              . '  "name" : "my-api-key"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  dde283eab92608e7bfbfa09c6482a12e
     * Line: 103
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL103_dde283eab92608e7bfbfa09c6482a12e()
    {
        $client = $this->getClient();
        // tag::dde283eab92608e7bfbfa09c6482a12e[]
        // TODO -- Implement Example
        // DELETE /_security/api_key
        // {
        //   "realm_name" : "native1"
        // }
        // end::dde283eab92608e7bfbfa09c6482a12e[]

        $curl = 'DELETE /_security/api_key'
              . '{'
              . '  "realm_name" : "native1"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e7d819634d765cde269e2669e2dc677f
     * Line: 116
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL116_e7d819634d765cde269e2669e2dc677f()
    {
        $client = $this->getClient();
        // tag::e7d819634d765cde269e2669e2dc677f[]
        // TODO -- Implement Example
        // DELETE /_security/api_key
        // {
        //   "username" : "myuser"
        // }
        // end::e7d819634d765cde269e2669e2dc677f[]

        $curl = 'DELETE /_security/api_key'
              . '{'
              . '  "username" : "myuser"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6c927313867647e0ef3cd3a37cb410cc
     * Line: 129
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL129_6c927313867647e0ef3cd3a37cb410cc()
    {
        $client = $this->getClient();
        // tag::6c927313867647e0ef3cd3a37cb410cc[]
        // TODO -- Implement Example
        // DELETE /_security/api_key
        // {
        //   "username" : "myuser",
        //   "realm_name" : "native1"
        // }
        // end::6c927313867647e0ef3cd3a37cb410cc[]

        $curl = 'DELETE /_security/api_key'
              . '{'
              . '  "username" : "myuser",'
              . '  "realm_name" : "native1"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%







}
