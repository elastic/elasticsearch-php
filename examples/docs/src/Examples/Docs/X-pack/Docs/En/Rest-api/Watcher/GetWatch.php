<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Watcher;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetWatch
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/watcher/get-watch.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetWatch extends SimpleExamplesTester {

    /**
     * Tag:  e827a9040e137410d62d10bb3b3cbb71
     * Line: 34
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL34_e827a9040e137410d62d10bb3b3cbb71()
    {
        $client = $this->getClient();
        // tag::e827a9040e137410d62d10bb3b3cbb71[]
        // TODO -- Implement Example
        // GET _watcher/watch/my_watch
        // end::e827a9040e137410d62d10bb3b3cbb71[]

        $curl = 'GET _watcher/watch/my_watch';

        // TODO -- make assertion
    }

// %__METHOD__%


}
