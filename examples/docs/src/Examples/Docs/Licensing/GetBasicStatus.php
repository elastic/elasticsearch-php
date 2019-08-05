<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Licensing;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetBasicStatus
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   licensing/get-basic-status.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetBasicStatus extends SimpleExamplesTester {

    /**
     * Tag:  f92d2f5018a8843ffbb56ade15f84406
     * Line: 37
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL37_f92d2f5018a8843ffbb56ade15f84406()
    {
        $client = $this->getClient();
        // tag::f92d2f5018a8843ffbb56ade15f84406[]
        // TODO -- Implement Example
        // GET /_license/basic_status
        // end::f92d2f5018a8843ffbb56ade15f84406[]

        $curl = 'GET /_license/basic_status';

        // TODO -- make assertion
    }

// %__METHOD__%


}
