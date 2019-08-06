<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cluster;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Reroute
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cluster/reroute.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Reroute extends SimpleExamplesTester {

    /**
     * Tag:  c5488b3888749d3d5b9808ab28d384eb
     * Line: 12
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL12_c5488b3888749d3d5b9808ab28d384eb()
    {
        $client = $this->getClient();
        // tag::c5488b3888749d3d5b9808ab28d384eb[]
        // TODO -- Implement Example
        // POST /_cluster/reroute
        // {
        //     "commands" : [
        //         {
        //             "move" : {
        //                 "index" : "test", "shard" : 0,
        //                 "from_node" : "node1", "to_node" : "node2"
        //             }
        //         },
        //         {
        //           "allocate_replica" : {
        //                 "index" : "test", "shard" : 1,
        //                 "node" : "node3"
        //           }
        //         }
        //     ]
        // }
        // end::c5488b3888749d3d5b9808ab28d384eb[]

        $curl = 'POST /_cluster/reroute'
              . '{'
              . '    "commands" : ['
              . '        {'
              . '            "move" : {'
              . '                "index" : "test", "shard" : 0,'
              . '                "from_node" : "node1", "to_node" : "node2"'
              . '            }'
              . '        },'
              . '        {'
              . '          "allocate_replica" : {'
              . '                "index" : "test", "shard" : 1,'
              . '                "node" : "node3"'
              . '          }'
              . '        }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
