<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Watcher;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ActivateWatch
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ../../x-pack/docs/en/rest-api/watcher/activate-watch.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ActivateWatch extends SimpleExamplesTester {

    /**
     * Tag:  e827a9040e137410d62d10bb3b3cbb71
     * Line: 36
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL36_e827a9040e137410d62d10bb3b3cbb71()
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
     * Tag:  3477a89d869b1f7f72d50c2ca86c4679
     * Line: 69
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL69_3477a89d869b1f7f72d50c2ca86c4679()
    {
        $client = $this->getClient();
        // tag::3477a89d869b1f7f72d50c2ca86c4679[]
        // TODO -- Implement Example
        // PUT _watcher/watch/my_watch/_activate
        // end::3477a89d869b1f7f72d50c2ca86c4679[]

        $curl = 'PUT _watcher/watch/my_watch/_activate';

        // TODO -- make assertion
    }

// %__METHOD__%



}
