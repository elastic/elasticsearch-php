<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cat;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Nodes
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cat/nodes.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Nodes extends SimpleExamplesTester {

    /**
     * Tag:  db20adb70a8e8d0709d15ba0daf18d23
     * Line: 7
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL7_db20adb70a8e8d0709d15ba0daf18d23()
    {
        $client = $this->getClient();
        // tag::db20adb70a8e8d0709d15ba0daf18d23[]
        // TODO -- Implement Example
        // GET /_cat/nodes?v
        // end::db20adb70a8e8d0709d15ba0daf18d23[]

        $curl = 'GET /_cat/nodes?v';

        // TODO -- make assertion
    }

    /**
     * Tag:  21d3e98d911642ab3bda2657f7a06f80
     * Line: 54
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL54_21d3e98d911642ab3bda2657f7a06f80()
    {
        $client = $this->getClient();
        // tag::21d3e98d911642ab3bda2657f7a06f80[]
        // TODO -- Implement Example
        // GET /_cat/nodes?v&h=id,ip,port,v,m
        // end::21d3e98d911642ab3bda2657f7a06f80[]

        $curl = 'GET /_cat/nodes?v&h=id,ip,port,v,m';

        // TODO -- make assertion
    }

// %__METHOD__%



}
