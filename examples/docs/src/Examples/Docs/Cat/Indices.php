<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cat;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Indices
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cat/indices.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Indices extends SimpleExamplesTester {

    /**
     * Tag:  073539a7e38be3cdf13008330b6a536a
     * Line: 8
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL8_073539a7e38be3cdf13008330b6a536a()
    {
        $client = $this->getClient();
        // tag::073539a7e38be3cdf13008330b6a536a[]
        // TODO -- Implement Example
        // GET /_cat/indices/twi*?v&s=index
        // end::073539a7e38be3cdf13008330b6a536a[]

        $curl = 'GET /_cat/indices/twi*?v&s=index';

        // TODO -- make assertion
    }

    /**
     * Tag:  bef41d7201051db3bc394b164c7130ae
     * Line: 53
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL53_bef41d7201051db3bc394b164c7130ae()
    {
        $client = $this->getClient();
        // tag::bef41d7201051db3bc394b164c7130ae[]
        // TODO -- Implement Example
        // GET /_cat/indices?v&health=yellow
        // end::bef41d7201051db3bc394b164c7130ae[]

        $curl = 'GET /_cat/indices?v&health=yellow';

        // TODO -- make assertion
    }

    /**
     * Tag:  79cba7619b42c0068b90ff72a3e45153
     * Line: 72
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL72_79cba7619b42c0068b90ff72a3e45153()
    {
        $client = $this->getClient();
        // tag::79cba7619b42c0068b90ff72a3e45153[]
        // TODO -- Implement Example
        // GET /_cat/indices?v&s=docs.count:desc
        // end::79cba7619b42c0068b90ff72a3e45153[]

        $curl = 'GET /_cat/indices?v&s=docs.count:desc';

        // TODO -- make assertion
    }

    /**
     * Tag:  d5a849ddac8d7678d8460eef96e03c19
     * Line: 92
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL92_d5a849ddac8d7678d8460eef96e03c19()
    {
        $client = $this->getClient();
        // tag::d5a849ddac8d7678d8460eef96e03c19[]
        // TODO -- Implement Example
        // GET /_cat/indices/twitter?pri&v&h=health,index,pri,rep,docs.count,mt
        // end::d5a849ddac8d7678d8460eef96e03c19[]

        $curl = 'GET /_cat/indices/twitter?pri&v&h=health,index,pri,rep,docs.count,mt';

        // TODO -- make assertion
    }

    /**
     * Tag:  402de4d169bc4514e8d782bc06ac1c11
     * Line: 110
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL110_402de4d169bc4514e8d782bc06ac1c11()
    {
        $client = $this->getClient();
        // tag::402de4d169bc4514e8d782bc06ac1c11[]
        // TODO -- Implement Example
        // GET /_cat/indices?v&h=i,tm&s=tm:desc
        // end::402de4d169bc4514e8d782bc06ac1c11[]

        $curl = 'GET /_cat/indices?v&h=i,tm&s=tm:desc';

        // TODO -- make assertion
    }

// %__METHOD__%






}
