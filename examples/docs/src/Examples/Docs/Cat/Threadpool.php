<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cat;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Threadpool
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cat/thread_pool.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Threadpool extends SimpleExamplesTester {

    /**
     * Tag:  ad88e46bb06739991498dee248850223
     * Line: 8
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL8_ad88e46bb06739991498dee248850223()
    {
        $client = $this->getClient();
        // tag::ad88e46bb06739991498dee248850223[]
        // TODO -- Implement Example
        // GET /_cat/thread_pool
        // end::ad88e46bb06739991498dee248850223[]

        $curl = 'GET /_cat/thread_pool';

        // TODO -- make assertion
    }

    /**
     * Tag:  ab5e724a4baa0cc44df33f7d62583e7f
     * Line: 98
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL98_ab5e724a4baa0cc44df33f7d62583e7f()
    {
        $client = $this->getClient();
        // tag::ab5e724a4baa0cc44df33f7d62583e7f[]
        // TODO -- Implement Example
        // GET /_cat/thread_pool/generic?v&h=id,name,active,rejected,completed
        // end::ab5e724a4baa0cc44df33f7d62583e7f[]

        $curl = 'GET /_cat/thread_pool/generic?v&h=id,name,active,rejected,completed';

        // TODO -- make assertion
    }

// %__METHOD__%



}
