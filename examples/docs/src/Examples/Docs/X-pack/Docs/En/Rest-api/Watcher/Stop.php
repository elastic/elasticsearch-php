<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Watcher;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Stop
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ../../x-pack/docs/en/rest-api/watcher/stop.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Stop extends SimpleExamplesTester {

    /**
     * Tag:  6b1336ff477f91d4a0db0b06db546ff0
     * Line: 25
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL25_6b1336ff477f91d4a0db0b06db546ff0()
    {
        $client = $this->getClient();
        // tag::6b1336ff477f91d4a0db0b06db546ff0[]
        // TODO -- Implement Example
        // POST _watcher/_stop
        // end::6b1336ff477f91d4a0db0b06db546ff0[]

        $curl = 'POST _watcher/_stop';

        // TODO -- make assertion
    }

// %__METHOD__%


}
