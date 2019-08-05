<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Cluster
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cluster.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Cluster extends SimpleExamplesTester {

    /**
     * Tag:  2c602b4ee8f22cda2cdf19bad31da0af
     * Line: 56
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL56_2c602b4ee8f22cda2cdf19bad31da0af()
    {
        $client = $this->getClient();
        // tag::2c602b4ee8f22cda2cdf19bad31da0af[]
        // TODO -- Implement Example
        // # If no filters are given, the default is to select all nodes
        // GET /_nodes
        // # Explicitly select all nodes
        // GET /_nodes/_all
        // # Select just the local node
        // GET /_nodes/_local
        // # Select the elected master node
        // GET /_nodes/_master
        // # Select nodes by name, which can include wildcards
        // GET /_nodes/node_name_goes_here
        // GET /_nodes/node_name_goes_*
        // # Select nodes by address, which can include wildcards
        // GET /_nodes/10.0.0.3,10.0.0.4
        // GET /_nodes/10.0.0.*
        // # Select nodes by role
        // GET /_nodes/_all,master:false
        // GET /_nodes/data:true,ingest:true
        // GET /_nodes/coordinating_only:true
        // GET /_nodes/master:true,voting_only:false
        // # Select nodes by custom attribute (e.g. with something like `node.attr.rack: 2` in the configuration file)
        // GET /_nodes/rack:2
        // GET /_nodes/ra*:2
        // GET /_nodes/ra*:2*
        // end::2c602b4ee8f22cda2cdf19bad31da0af[]

        $curl = '# If no filters are given, the default is to select all nodes'
              . 'GET /_nodes'
              . '# Explicitly select all nodes'
              . 'GET /_nodes/_all'
              . '# Select just the local node'
              . 'GET /_nodes/_local'
              . '# Select the elected master node'
              . 'GET /_nodes/_master'
              . '# Select nodes by name, which can include wildcards'
              . 'GET /_nodes/node_name_goes_here'
              . 'GET /_nodes/node_name_goes_*'
              . '# Select nodes by address, which can include wildcards'
              . 'GET /_nodes/10.0.0.3,10.0.0.4'
              . 'GET /_nodes/10.0.0.*'
              . '# Select nodes by role'
              . 'GET /_nodes/_all,master:false'
              . 'GET /_nodes/data:true,ingest:true'
              . 'GET /_nodes/coordinating_only:true'
              . 'GET /_nodes/master:true,voting_only:false'
              . '# Select nodes by custom attribute (e.g. with something like `node.attr.rack: 2` in the configuration file)'
              . 'GET /_nodes/rack:2'
              . 'GET /_nodes/ra*:2'
              . 'GET /_nodes/ra*:2*';

        // TODO -- make assertion
    }

// %__METHOD__%


}
