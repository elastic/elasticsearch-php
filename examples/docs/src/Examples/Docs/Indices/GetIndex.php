<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetIndex
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/get-index.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetIndex extends SimpleExamplesTester {

    /**
     * Tag:  be8f28f31207b173de61be032fcf239c
     * Line: 7
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL7_be8f28f31207b173de61be032fcf239c()
    {
        $client = $this->getClient();
        // tag::be8f28f31207b173de61be032fcf239c[]
        // TODO -- Implement Example
        // GET /twitter
        // end::be8f28f31207b173de61be032fcf239c[]

        $curl = 'GET /twitter';

        // TODO -- make assertion
    }

// %__METHOD__%


}
