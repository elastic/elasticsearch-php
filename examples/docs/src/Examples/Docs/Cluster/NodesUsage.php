<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cluster;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: NodesUsage
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cluster/nodes-usage.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class NodesUsage extends SimpleExamplesTester {

    /**
     * Tag:  488751d6f5baddadd84f6f390d910b07
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_488751d6f5baddadd84f6f390d910b07()
    {
        $client = $this->getClient();
        // tag::488751d6f5baddadd84f6f390d910b07[]
        // TODO -- Implement Example
        // GET _nodes/usage
        // GET _nodes/nodeId1,nodeId2/usage
        // end::488751d6f5baddadd84f6f390d910b07[]

        $curl = 'GET _nodes/usage'
              . 'GET _nodes/nodeId1,nodeId2/usage';

        // TODO -- make assertion
    }

// %__METHOD__%


}
