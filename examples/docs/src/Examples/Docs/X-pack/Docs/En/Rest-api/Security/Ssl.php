<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Ssl
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/security/ssl.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Ssl extends SimpleExamplesTester {

    /**
     * Tag:  05f6049c677a156bdf9b83e71a3b87ed
     * Line: 80
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL80_05f6049c677a156bdf9b83e71a3b87ed()
    {
        $client = $this->getClient();
        // tag::05f6049c677a156bdf9b83e71a3b87ed[]
        // TODO -- Implement Example
        // GET /_ssl/certificates
        // end::05f6049c677a156bdf9b83e71a3b87ed[]

        $curl = 'GET /_ssl/certificates';

        // TODO -- make assertion
    }

// %__METHOD__%


}
