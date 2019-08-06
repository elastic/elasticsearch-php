<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Flush
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/flush.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Flush extends SimpleExamplesTester {

    /**
     * Tag:  7ef5a1dfd0c9db876c0dd03d8f0fe3a7
     * Line: 13
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL13_7ef5a1dfd0c9db876c0dd03d8f0fe3a7()
    {
        $client = $this->getClient();
        // tag::7ef5a1dfd0c9db876c0dd03d8f0fe3a7[]
        // TODO -- Implement Example
        // POST twitter/_flush
        // end::7ef5a1dfd0c9db876c0dd03d8f0fe3a7[]

        $curl = 'POST twitter/_flush';

        // TODO -- make assertion
    }

    /**
     * Tag:  191c0396ef10ca408b41bbb4c7645ee7
     * Line: 42
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL42_191c0396ef10ca408b41bbb4c7645ee7()
    {
        $client = $this->getClient();
        // tag::191c0396ef10ca408b41bbb4c7645ee7[]
        // TODO -- Implement Example
        // POST kimchy,elasticsearch/_flush
        // POST _flush
        // end::191c0396ef10ca408b41bbb4c7645ee7[]

        $curl = 'POST kimchy,elasticsearch/_flush'
              . 'POST _flush';

        // TODO -- make assertion
    }

    /**
     * Tag:  94819e06e05de52c23b285346205ddaf
     * Line: 75
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL75_94819e06e05de52c23b285346205ddaf()
    {
        $client = $this->getClient();
        // tag::94819e06e05de52c23b285346205ddaf[]
        // TODO -- Implement Example
        // GET twitter/_stats?filter_path=**.commit&level=shards \<1>
        // end::94819e06e05de52c23b285346205ddaf[]

        $curl = 'GET twitter/_stats?filter_path=**.commit&level=shards \<1>';

        // TODO -- make assertion
    }

    /**
     * Tag:  da2658cc33e1a75c4b0fe96eb62740a7
     * Line: 143
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL143_da2658cc33e1a75c4b0fe96eb62740a7()
    {
        $client = $this->getClient();
        // tag::da2658cc33e1a75c4b0fe96eb62740a7[]
        // TODO -- Implement Example
        // POST twitter/_flush/synced
        // end::da2658cc33e1a75c4b0fe96eb62740a7[]

        $curl = 'POST twitter/_flush/synced';

        // TODO -- make assertion
    }

    /**
     * Tag:  fc079cd6d867c5d65b7a28de197292a4
     * Line: 239
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL239_fc079cd6d867c5d65b7a28de197292a4()
    {
        $client = $this->getClient();
        // tag::fc079cd6d867c5d65b7a28de197292a4[]
        // TODO -- Implement Example
        // POST kimchy,elasticsearch/_flush/synced
        // POST _flush/synced
        // end::fc079cd6d867c5d65b7a28de197292a4[]

        $curl = 'POST kimchy,elasticsearch/_flush/synced'
              . 'POST _flush/synced';

        // TODO -- make assertion
    }

// %__METHOD__%






}
