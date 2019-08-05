<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: EnableUsers
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/security/enable-users.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class EnableUsers extends SimpleExamplesTester {

    /**
     * Tag:  adf36e2d8fc05c3719c91912481c4e19
     * Line: 41
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL41_adf36e2d8fc05c3719c91912481c4e19()
    {
        $client = $this->getClient();
        // tag::adf36e2d8fc05c3719c91912481c4e19[]
        // TODO -- Implement Example
        // PUT /_security/user/jacknich/_enable
        // end::adf36e2d8fc05c3719c91912481c4e19[]

        $curl = 'PUT /_security/user/jacknich/_enable';

        // TODO -- make assertion
    }

// %__METHOD__%


}
