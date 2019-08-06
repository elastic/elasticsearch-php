<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Authenticate
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ../../x-pack/docs/en/rest-api/security/authenticate.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Authenticate extends SimpleExamplesTester {

    /**
     * Tag:  55f4a15b84b724b9fbf2efd29a4da120
     * Line: 30
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL30_55f4a15b84b724b9fbf2efd29a4da120()
    {
        $client = $this->getClient();
        // tag::55f4a15b84b724b9fbf2efd29a4da120[]
        // TODO -- Implement Example
        // GET /_security/_authenticate
        // end::55f4a15b84b724b9fbf2efd29a4da120[]

        $curl = 'GET /_security/_authenticate';

        // TODO -- make assertion
    }

// %__METHOD__%


}
