<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cat;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Shards
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cat/shards.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Shards extends SimpleExamplesTester {

    /**
     * Tag:  7e126e2751311db60cfcbb22c9c41caa
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_7e126e2751311db60cfcbb22c9c41caa()
    {
        $client = $this->getClient();
        // tag::7e126e2751311db60cfcbb22c9c41caa[]
        // TODO -- Implement Example
        // GET _cat/shards
        // end::7e126e2751311db60cfcbb22c9c41caa[]

        $curl = 'GET _cat/shards';

        // TODO -- make assertion
    }

    /**
     * Tag:  e42e92050dd1c20262ce9e38f4b42ba0
     * Line: 37
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL37_e42e92050dd1c20262ce9e38f4b42ba0()
    {
        $client = $this->getClient();
        // tag::e42e92050dd1c20262ce9e38f4b42ba0[]
        // TODO -- Implement Example
        // GET _cat/shards/twitt*
        // end::e42e92050dd1c20262ce9e38f4b42ba0[]

        $curl = 'GET _cat/shards/twitt*';

        // TODO -- make assertion
    }

    /**
     * Tag:  7e126e2751311db60cfcbb22c9c41caa
     * Line: 63
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL63_7e126e2751311db60cfcbb22c9c41caa()
    {
        $client = $this->getClient();
        // tag::7e126e2751311db60cfcbb22c9c41caa[]
        // TODO -- Implement Example
        // GET _cat/shards
        // end::7e126e2751311db60cfcbb22c9c41caa[]

        $curl = 'GET _cat/shards';

        // TODO -- make assertion
    }

    /**
     * Tag:  7e126e2751311db60cfcbb22c9c41caa
     * Line: 85
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL85_7e126e2751311db60cfcbb22c9c41caa()
    {
        $client = $this->getClient();
        // tag::7e126e2751311db60cfcbb22c9c41caa[]
        // TODO -- Implement Example
        // GET _cat/shards
        // end::7e126e2751311db60cfcbb22c9c41caa[]

        $curl = 'GET _cat/shards';

        // TODO -- make assertion
    }

    /**
     * Tag:  25c0e66a433a0cd596e0641b752ff6d7
     * Line: 107
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL107_25c0e66a433a0cd596e0641b752ff6d7()
    {
        $client = $this->getClient();
        // tag::25c0e66a433a0cd596e0641b752ff6d7[]
        // TODO -- Implement Example
        // GET _cat/shards?h=index,shard,prirep,state,unassigned.reason
        // end::25c0e66a433a0cd596e0641b752ff6d7[]

        $curl = 'GET _cat/shards?h=index,shard,prirep,state,unassigned.reason';

        // TODO -- make assertion
    }

// %__METHOD__%






}
