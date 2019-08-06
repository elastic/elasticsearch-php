<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Stats
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/stats.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Stats extends SimpleExamplesTester {

    /**
     * Tag:  78c4035e4fbf6851140660f6ed2a1fa5
     * Line: 12
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL12_78c4035e4fbf6851140660f6ed2a1fa5()
    {
        $client = $this->getClient();
        // tag::78c4035e4fbf6851140660f6ed2a1fa5[]
        // TODO -- Implement Example
        // GET /_stats
        // end::78c4035e4fbf6851140660f6ed2a1fa5[]

        $curl = 'GET /_stats';

        // TODO -- make assertion
    }

    /**
     * Tag:  e0b2f56c34e33ff52f8f9658be2f7ca1
     * Line: 20
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL20_e0b2f56c34e33ff52f8f9658be2f7ca1()
    {
        $client = $this->getClient();
        // tag::e0b2f56c34e33ff52f8f9658be2f7ca1[]
        // TODO -- Implement Example
        // GET /index1,index2/_stats
        // end::e0b2f56c34e33ff52f8f9658be2f7ca1[]

        $curl = 'GET /index1,index2/_stats';

        // TODO -- make assertion
    }

    /**
     * Tag:  45c55ce8b2df147cd68b8f151a36a8d8
     * Line: 78
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL78_45c55ce8b2df147cd68b8f151a36a8d8()
    {
        $client = $this->getClient();
        // tag::45c55ce8b2df147cd68b8f151a36a8d8[]
        // TODO -- Implement Example
        // # Get back stats for merge and refresh only for all indices
        // GET /_stats/merge,refresh
        // # Get back stats for type1 and type2 documents for the my_index index
        // GET /my_index/_stats/indexing?types=type1,type2
        // # Get back just search stats for group1 and group2
        // GET /_stats/search?groups=group1,group2
        // end::45c55ce8b2df147cd68b8f151a36a8d8[]

        $curl = '# Get back stats for merge and refresh only for all indices'
              . 'GET /_stats/merge,refresh'
              . '# Get back stats for type1 and type2 documents for the my_index index'
              . 'GET /my_index/_stats/indexing?types=type1,type2'
              . '# Get back just search stats for group1 and group2'
              . 'GET /_stats/search?groups=group1,group2';

        // TODO -- make assertion
    }

// %__METHOD__%




}
