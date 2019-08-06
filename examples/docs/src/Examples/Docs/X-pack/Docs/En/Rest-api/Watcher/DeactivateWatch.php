<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Watcher;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeactivateWatch
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ../../x-pack/docs/en/rest-api/watcher/deactivate-watch.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeactivateWatch extends SimpleExamplesTester {

    /**
     * Tag:  e827a9040e137410d62d10bb3b3cbb71
     * Line: 35
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL35_e827a9040e137410d62d10bb3b3cbb71()
    {
        $client = $this->getClient();
        // tag::e827a9040e137410d62d10bb3b3cbb71[]
        // TODO -- Implement Example
        // GET _watcher/watch/my_watch
        // end::e827a9040e137410d62d10bb3b3cbb71[]

        $curl = 'GET _watcher/watch/my_watch';

        // TODO -- make assertion
    }

    /**
     * Tag:  f63f6343e74bd5c844854272e746de14
     * Line: 68
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL68_f63f6343e74bd5c844854272e746de14()
    {
        $client = $this->getClient();
        // tag::f63f6343e74bd5c844854272e746de14[]
        // TODO -- Implement Example
        // PUT _watcher/watch/my_watch/_deactivate
        // end::f63f6343e74bd5c844854272e746de14[]

        $curl = 'PUT _watcher/watch/my_watch/_deactivate';

        // TODO -- make assertion
    }

// %__METHOD__%



}
