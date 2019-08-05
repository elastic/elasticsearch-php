<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cluster;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: NodesStats
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cluster/nodes-stats.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class NodesStats extends SimpleExamplesTester {

    /**
     * Tag:  46157b875b3af6322b19c9fcf4668b93
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_46157b875b3af6322b19c9fcf4668b93()
    {
        $client = $this->getClient();
        // tag::46157b875b3af6322b19c9fcf4668b93[]
        // TODO -- Implement Example
        // GET /_nodes/stats
        // GET /_nodes/nodeId1,nodeId2/stats
        // end::46157b875b3af6322b19c9fcf4668b93[]

        $curl = 'GET /_nodes/stats'
              . 'GET /_nodes/nodeId1,nodeId2/stats';

        // TODO -- make assertion
    }

    /**
     * Tag:  5457c94f0039c6b95c7f9f305d0c6b58
     * Line: 72
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL72_5457c94f0039c6b95c7f9f305d0c6b58()
    {
        $client = $this->getClient();
        // tag::5457c94f0039c6b95c7f9f305d0c6b58[]
        // TODO -- Implement Example
        // # return just indices
        // GET /_nodes/stats/indices
        // # return just os and process
        // GET /_nodes/stats/os,process
        // # return just process for node with IP address 10.0.0.1
        // GET /_nodes/10.0.0.1/stats/process
        // end::5457c94f0039c6b95c7f9f305d0c6b58[]

        $curl = '# return just indices'
              . 'GET /_nodes/stats/indices'
              . '# return just os and process'
              . 'GET /_nodes/stats/os,process'
              . '# return just process for node with IP address 10.0.0.1'
              . 'GET /_nodes/10.0.0.1/stats/process';

        // TODO -- make assertion
    }

    /**
     * Tag:  573e292263dc1e6f08f4363f25018e57
     * Line: 313
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL313_573e292263dc1e6f08f4363f25018e57()
    {
        $client = $this->getClient();
        // tag::573e292263dc1e6f08f4363f25018e57[]
        // TODO -- Implement Example
        // # Fielddata summarised by node
        // GET /_nodes/stats/indices/fielddata?fields=field1,field2
        // # Fielddata summarised by node and index
        // GET /_nodes/stats/indices/fielddata?level=indices&fields=field1,field2
        // # Fielddata summarised by node, index, and shard
        // GET /_nodes/stats/indices/fielddata?level=shards&fields=field1,field2
        // # You can use wildcards for field names
        // GET /_nodes/stats/indices/fielddata?fields=field*
        // end::573e292263dc1e6f08f4363f25018e57[]

        $curl = '# Fielddata summarised by node'
              . 'GET /_nodes/stats/indices/fielddata?fields=field1,field2'
              . '# Fielddata summarised by node and index'
              . 'GET /_nodes/stats/indices/fielddata?level=indices&fields=field1,field2'
              . '# Fielddata summarised by node, index, and shard'
              . 'GET /_nodes/stats/indices/fielddata?level=shards&fields=field1,field2'
              . '# You can use wildcards for field names'
              . 'GET /_nodes/stats/indices/fielddata?fields=field*';

        // TODO -- make assertion
    }

    /**
     * Tag:  bd68666ca2e0be12f7624016317a62bc
     * Line: 355
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL355_bd68666ca2e0be12f7624016317a62bc()
    {
        $client = $this->getClient();
        // tag::bd68666ca2e0be12f7624016317a62bc[]
        // TODO -- Implement Example
        // # All groups with all stats
        // GET /_nodes/stats?groups=_all
        // # Some groups from just the indices stats
        // GET /_nodes/stats/indices?groups=foo,bar
        // end::bd68666ca2e0be12f7624016317a62bc[]

        $curl = '# All groups with all stats'
              . 'GET /_nodes/stats?groups=_all'
              . '# Some groups from just the indices stats'
              . 'GET /_nodes/stats/indices?groups=foo,bar';

        // TODO -- make assertion
    }

// %__METHOD__%





}
