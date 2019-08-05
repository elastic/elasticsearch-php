<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Index-modules\Allocation;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Filtering
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   index-modules/allocation/filtering.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Filtering extends SimpleExamplesTester {

    /**
     * Tag:  dad2d4add751fde5c39475ca709cc14b
     * Line: 54
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL54_dad2d4add751fde5c39475ca709cc14b()
    {
        $client = $this->getClient();
        // tag::dad2d4add751fde5c39475ca709cc14b[]
        // TODO -- Implement Example
        // PUT test/_settings
        // {
        //   "index.routing.allocation.include.size": "big,medium"
        // }
        // end::dad2d4add751fde5c39475ca709cc14b[]

        $curl = 'PUT test/_settings'
              . '{'
              . '  "index.routing.allocation.include.size": "big,medium"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b8b198ede3d08f315348e2a857e47773
     * Line: 68
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL68_b8b198ede3d08f315348e2a857e47773()
    {
        $client = $this->getClient();
        // tag::b8b198ede3d08f315348e2a857e47773[]
        // TODO -- Implement Example
        // PUT test/_settings
        // {
        //   "index.routing.allocation.include.size": "big",
        //   "index.routing.allocation.include.rack": "rack1"
        // }
        // end::b8b198ede3d08f315348e2a857e47773[]

        $curl = 'PUT test/_settings'
              . '{'
              . '  "index.routing.allocation.include.size": "big",'
              . '  "index.routing.allocation.include.rack": "rack1"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  28ac880057135e46b3b00c7f3976538c
     * Line: 110
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL110_28ac880057135e46b3b00c7f3976538c()
    {
        $client = $this->getClient();
        // tag::28ac880057135e46b3b00c7f3976538c[]
        // TODO -- Implement Example
        // PUT test/_settings
        // {
        //   "index.routing.allocation.include._ip": "192.168.2.*"
        // }
        // end::28ac880057135e46b3b00c7f3976538c[]

        $curl = 'PUT test/_settings'
              . '{'
              . '  "index.routing.allocation.include._ip": "192.168.2.*"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
