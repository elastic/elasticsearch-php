<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Rest-api;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Info
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   rest-api/info.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Info extends SimpleExamplesTester {

    /**
     * Tag:  9054187cbab5c9e1c4ca2a4dba6a5db0
     * Line: 45
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL45_9054187cbab5c9e1c4ca2a4dba6a5db0()
    {
        $client = $this->getClient();
        // tag::9054187cbab5c9e1c4ca2a4dba6a5db0[]
        // TODO -- Implement Example
        // GET /_xpack
        // end::9054187cbab5c9e1c4ca2a4dba6a5db0[]

        $curl = 'GET /_xpack';

        // TODO -- make assertion
    }

    /**
     * Tag:  b11a0675e49df0709be693297ca73a2c
     * Line: 145
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL145_b11a0675e49df0709be693297ca73a2c()
    {
        $client = $this->getClient();
        // tag::b11a0675e49df0709be693297ca73a2c[]
        // TODO -- Implement Example
        // GET /_xpack?categories=build,features
        // end::b11a0675e49df0709be693297ca73a2c[]

        $curl = 'GET /_xpack?categories=build,features';

        // TODO -- make assertion
    }

    /**
     * Tag:  4ed946065faa92f9950f04e402676a97
     * Line: 153
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL153_4ed946065faa92f9950f04e402676a97()
    {
        $client = $this->getClient();
        // tag::4ed946065faa92f9950f04e402676a97[]
        // TODO -- Implement Example
        // GET /_xpack?human=false
        // end::4ed946065faa92f9950f04e402676a97[]

        $curl = 'GET /_xpack?human=false';

        // TODO -- make assertion
    }

// %__METHOD__%




}
