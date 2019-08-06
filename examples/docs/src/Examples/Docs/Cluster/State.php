<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cluster;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: State
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cluster/state.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class State extends SimpleExamplesTester {

    /**
     * Tag:  66642ac5f672c35e087b5e2d7c02bd06
     * Line: 22
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL22_66642ac5f672c35e087b5e2d7c02bd06()
    {
        $client = $this->getClient();
        // tag::66642ac5f672c35e087b5e2d7c02bd06[]
        // TODO -- Implement Example
        // GET /_cluster/state
        // end::66642ac5f672c35e087b5e2d7c02bd06[]

        $curl = 'GET /_cluster/state';

        // TODO -- make assertion
    }

    /**
     * Tag:  8c9017146434ad2ff4531dc8cde64c57
     * Line: 50
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL50_8c9017146434ad2ff4531dc8cde64c57()
    {
        $client = $this->getClient();
        // tag::8c9017146434ad2ff4531dc8cde64c57[]
        // TODO -- Implement Example
        // GET /_cluster/state/{metrics}
        // GET /_cluster/state/{metrics}/{indices}
        // end::8c9017146434ad2ff4531dc8cde64c57[]

        $curl = 'GET /_cluster/state/{metrics}'
              . 'GET /_cluster/state/{metrics}/{indices}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b66be1daf6c220eb66d94e708b2fae39
     * Line: 87
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL87_b66be1daf6c220eb66d94e708b2fae39()
    {
        $client = $this->getClient();
        // tag::b66be1daf6c220eb66d94e708b2fae39[]
        // TODO -- Implement Example
        // GET /_cluster/state/metadata,routing_table/foo,bar
        // end::b66be1daf6c220eb66d94e708b2fae39[]

        $curl = 'GET /_cluster/state/metadata,routing_table/foo,bar';

        // TODO -- make assertion
    }

    /**
     * Tag:  0fa220ee3fb267020382f74aa70eb1e9
     * Line: 95
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL95_0fa220ee3fb267020382f74aa70eb1e9()
    {
        $client = $this->getClient();
        // tag::0fa220ee3fb267020382f74aa70eb1e9[]
        // TODO -- Implement Example
        // GET /_cluster/state/_all/foo,bar
        // end::0fa220ee3fb267020382f74aa70eb1e9[]

        $curl = 'GET /_cluster/state/_all/foo,bar';

        // TODO -- make assertion
    }

    /**
     * Tag:  a3cfd350c73a104b99a998c6be931408
     * Line: 103
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL103_a3cfd350c73a104b99a998c6be931408()
    {
        $client = $this->getClient();
        // tag::a3cfd350c73a104b99a998c6be931408[]
        // TODO -- Implement Example
        // GET /_cluster/state/blocks
        // end::a3cfd350c73a104b99a998c6be931408[]

        $curl = 'GET /_cluster/state/blocks';

        // TODO -- make assertion
    }

// %__METHOD__%






}
