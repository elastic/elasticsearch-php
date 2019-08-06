<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cluster;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: NodesHotThreads
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cluster/nodes-hot-threads.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class NodesHotThreads extends SimpleExamplesTester {

    /**
     * Tag:  77c099c97ea6911e2dd6e996da7dcca0
     * Line: 9
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL9_77c099c97ea6911e2dd6e996da7dcca0()
    {
        $client = $this->getClient();
        // tag::77c099c97ea6911e2dd6e996da7dcca0[]
        // TODO -- Implement Example
        // GET /_nodes/hot_threads
        // GET /_nodes/nodeId1,nodeId2/hot_threads
        // end::77c099c97ea6911e2dd6e996da7dcca0[]

        $curl = 'GET /_nodes/hot_threads'
              . 'GET /_nodes/nodeId1,nodeId2/hot_threads';

        // TODO -- make assertion
    }

// %__METHOD__%


}
