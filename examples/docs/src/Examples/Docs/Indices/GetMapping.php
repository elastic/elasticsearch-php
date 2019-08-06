<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetMapping
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/get-mapping.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetMapping extends SimpleExamplesTester {

    /**
     * Tag:  a8fba09a46b2c3524428aa3259b7124f
     * Line: 8
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL8_a8fba09a46b2c3524428aa3259b7124f()
    {
        $client = $this->getClient();
        // tag::a8fba09a46b2c3524428aa3259b7124f[]
        // TODO -- Implement Example
        // GET /twitter/_mapping
        // end::a8fba09a46b2c3524428aa3259b7124f[]

        $curl = 'GET /twitter/_mapping';

        // TODO -- make assertion
    }

    /**
     * Tag:  cf02e3d8b371bd59f0224967c36330da
     * Line: 28
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL28_cf02e3d8b371bd59f0224967c36330da()
    {
        $client = $this->getClient();
        // tag::cf02e3d8b371bd59f0224967c36330da[]
        // TODO -- Implement Example
        // GET /twitter,kimchy/_mapping
        // end::cf02e3d8b371bd59f0224967c36330da[]

        $curl = 'GET /twitter,kimchy/_mapping';

        // TODO -- make assertion
    }

    /**
     * Tag:  09cdd5ae8114c49886026fef8d00a19c
     * Line: 39
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL39_09cdd5ae8114c49886026fef8d00a19c()
    {
        $client = $this->getClient();
        // tag::09cdd5ae8114c49886026fef8d00a19c[]
        // TODO -- Implement Example
        // GET /_all/_mapping
        // GET /_mapping
        // end::09cdd5ae8114c49886026fef8d00a19c[]

        $curl = 'GET /_all/_mapping'
              . 'GET /_mapping';

        // TODO -- make assertion
    }

// %__METHOD__%




}
