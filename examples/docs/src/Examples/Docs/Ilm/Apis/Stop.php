<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ilm\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Stop
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ilm/apis/stop.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Stop extends SimpleExamplesTester {

    /**
     * Tag:  585a34ad79aee16678b37da785933ac8
     * Line: 75
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL75_585a34ad79aee16678b37da785933ac8()
    {
        $client = $this->getClient();
        // tag::585a34ad79aee16678b37da785933ac8[]
        // TODO -- Implement Example
        // POST _ilm/stop
        // end::585a34ad79aee16678b37da785933ac8[]

        $curl = 'POST _ilm/stop';

        // TODO -- make assertion
    }

    /**
     * Tag:  bc5fcc40c29087a0df7b5405bb70de5c
     * Line: 84
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL84_bc5fcc40c29087a0df7b5405bb70de5c()
    {
        $client = $this->getClient();
        // tag::bc5fcc40c29087a0df7b5405bb70de5c[]
        // TODO -- Implement Example
        // {
        //   "acknowledged": true
        // }
        // end::bc5fcc40c29087a0df7b5405bb70de5c[]

        $curl = '{'
              . '  "acknowledged": true'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
