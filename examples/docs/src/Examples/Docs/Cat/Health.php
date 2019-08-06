<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cat;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Health
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cat/health.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Health extends SimpleExamplesTester {

    /**
     * Tag:  f8cc4b331a19ff4df8e4a490f906ee69
     * Line: 8
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL8_f8cc4b331a19ff4df8e4a490f906ee69()
    {
        $client = $this->getClient();
        // tag::f8cc4b331a19ff4df8e4a490f906ee69[]
        // TODO -- Implement Example
        // GET /_cat/health?v
        // end::f8cc4b331a19ff4df8e4a490f906ee69[]

        $curl = 'GET /_cat/health?v';

        // TODO -- make assertion
    }

    /**
     * Tag:  ccd9e2cf7181de67cf9ab0df1a02c575
     * Line: 25
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL25_ccd9e2cf7181de67cf9ab0df1a02c575()
    {
        $client = $this->getClient();
        // tag::ccd9e2cf7181de67cf9ab0df1a02c575[]
        // TODO -- Implement Example
        // GET /_cat/health?v&ts=false
        // end::ccd9e2cf7181de67cf9ab0df1a02c575[]

        $curl = 'GET /_cat/health?v&ts=false';

        // TODO -- make assertion
    }

// %__METHOD__%



}
