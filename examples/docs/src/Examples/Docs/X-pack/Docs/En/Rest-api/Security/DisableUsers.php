<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DisableUsers
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ../../x-pack/docs/en/rest-api/security/disable-users.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DisableUsers extends SimpleExamplesTester {

    /**
     * Tag:  bb293e1bdf0c6f6d9069eeb7edc9d399
     * Line: 42
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL42_bb293e1bdf0c6f6d9069eeb7edc9d399()
    {
        $client = $this->getClient();
        // tag::bb293e1bdf0c6f6d9069eeb7edc9d399[]
        // TODO -- Implement Example
        // PUT /_security/user/jacknich/_disable
        // end::bb293e1bdf0c6f6d9069eeb7edc9d399[]

        $curl = 'PUT /_security/user/jacknich/_disable';

        // TODO -- make assertion
    }

// %__METHOD__%


}
