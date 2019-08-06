<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cluster;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Stats
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cluster/stats.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Stats extends SimpleExamplesTester {

    /**
     * Tag:  861f5f61409dc87f3671293b87839ff7
     * Line: 10
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL10_861f5f61409dc87f3671293b87839ff7()
    {
        $client = $this->getClient();
        // tag::861f5f61409dc87f3671293b87839ff7[]
        // TODO -- Implement Example
        // GET /_cluster/stats?human&pretty
        // end::861f5f61409dc87f3671293b87839ff7[]

        $curl = 'GET /_cluster/stats?human&pretty';

        // TODO -- make assertion
    }

    /**
     * Tag:  71c629c44bf3c542a0daacbfc253c4b0
     * Line: 233
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL233_71c629c44bf3c542a0daacbfc253c4b0()
    {
        $client = $this->getClient();
        // tag::71c629c44bf3c542a0daacbfc253c4b0[]
        // TODO -- Implement Example
        // GET /_cluster/stats/nodes/node1,node*,master:false
        // end::71c629c44bf3c542a0daacbfc253c4b0[]

        $curl = 'GET /_cluster/stats/nodes/node1,node*,master:false';

        // TODO -- make assertion
    }

// %__METHOD__%



}
