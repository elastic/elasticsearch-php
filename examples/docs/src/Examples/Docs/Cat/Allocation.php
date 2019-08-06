<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cat;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Allocation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cat/allocation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Allocation extends SimpleExamplesTester {

    /**
     * Tag:  5c7ece1f30267adabdb832424871900a
     * Line: 8
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL8_5c7ece1f30267adabdb832424871900a()
    {
        $client = $this->getClient();
        // tag::5c7ece1f30267adabdb832424871900a[]
        // TODO -- Implement Example
        // GET /_cat/allocation?v
        // end::5c7ece1f30267adabdb832424871900a[]

        $curl = 'GET /_cat/allocation?v';

        // TODO -- make assertion
    }

// %__METHOD__%


}
