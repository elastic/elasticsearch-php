<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Watcher;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Start
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/watcher/start.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Start extends SimpleExamplesTester {

    /**
     * Tag:  97ea5ab17213cb1faaf6f3ea13607098
     * Line: 25
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL25_97ea5ab17213cb1faaf6f3ea13607098()
    {
        $client = $this->getClient();
        // tag::97ea5ab17213cb1faaf6f3ea13607098[]
        // TODO -- Implement Example
        // POST _watcher/_start
        // end::97ea5ab17213cb1faaf6f3ea13607098[]

        $curl = 'POST _watcher/_start';

        // TODO -- make assertion
    }

// %__METHOD__%


}
