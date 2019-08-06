<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cat;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Count
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cat/count.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Count extends SimpleExamplesTester {

    /**
     * Tag:  0a1f8ad54b1d8c9feeaceaeed16c8490
     * Line: 8
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL8_0a1f8ad54b1d8c9feeaceaeed16c8490()
    {
        $client = $this->getClient();
        // tag::0a1f8ad54b1d8c9feeaceaeed16c8490[]
        // TODO -- Implement Example
        // GET /_cat/count?v
        // end::0a1f8ad54b1d8c9feeaceaeed16c8490[]

        $curl = 'GET /_cat/count?v';

        // TODO -- make assertion
    }

    /**
     * Tag:  e7553d4bb4fd82d8f80a4d7af2624afb
     * Line: 27
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL27_e7553d4bb4fd82d8f80a4d7af2624afb()
    {
        $client = $this->getClient();
        // tag::e7553d4bb4fd82d8f80a4d7af2624afb[]
        // TODO -- Implement Example
        // GET /_cat/count/twitter?v
        // end::e7553d4bb4fd82d8f80a4d7af2624afb[]

        $curl = 'GET /_cat/count/twitter?v';

        // TODO -- make assertion
    }

// %__METHOD__%



}
