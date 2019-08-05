<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Modules\Cluster;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Allocationfiltering
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   modules/cluster/allocation_filtering.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Allocationfiltering extends SimpleExamplesTester {

    /**
     * Tag:  281ae12918af10b6377ec760eaa844ce
     * Line: 22
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL22_281ae12918af10b6377ec760eaa844ce()
    {
        $client = $this->getClient();
        // tag::281ae12918af10b6377ec760eaa844ce[]
        // TODO -- Implement Example
        // PUT _cluster/settings
        // {
        //   "transient" : {
        //     "cluster.routing.allocation.exclude._ip" : "10.0.0.1"
        //   }
        // }
        // end::281ae12918af10b6377ec760eaa844ce[]

        $curl = 'PUT _cluster/settings'
              . '{'
              . '  "transient" : {'
              . '    "cluster.routing.allocation.exclude._ip" : "10.0.0.1"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  07474768b8f9d532b524c15e512736f4
     * Line: 61
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL61_07474768b8f9d532b524c15e512736f4()
    {
        $client = $this->getClient();
        // tag::07474768b8f9d532b524c15e512736f4[]
        // TODO -- Implement Example
        // PUT _cluster/settings
        // {
        //   "transient": {
        //     "cluster.routing.allocation.exclude._ip": "192.168.2.*"
        //   }
        // }
        // end::07474768b8f9d532b524c15e512736f4[]

        $curl = 'PUT _cluster/settings'
              . '{'
              . '  "transient": {'
              . '    "cluster.routing.allocation.exclude._ip": "192.168.2.*"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
