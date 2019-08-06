<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Watcher;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Stats
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ../../x-pack/docs/en/rest-api/watcher/stats.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Stats extends SimpleExamplesTester {

    /**
     * Tag:  17266cee5eaaddf08e5534bf580a1910
     * Line: 74
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL74_17266cee5eaaddf08e5534bf580a1910()
    {
        $client = $this->getClient();
        // tag::17266cee5eaaddf08e5534bf580a1910[]
        // TODO -- Implement Example
        // GET _watcher/stats
        // end::17266cee5eaaddf08e5534bf580a1910[]

        $curl = 'GET _watcher/stats';

        // TODO -- make assertion
    }

    /**
     * Tag:  3ed79871d956bfb2d6d2721d7272520c
     * Line: 103
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL103_3ed79871d956bfb2d6d2721d7272520c()
    {
        $client = $this->getClient();
        // tag::3ed79871d956bfb2d6d2721d7272520c[]
        // TODO -- Implement Example
        // GET _watcher/stats?metric=current_watches
        // end::3ed79871d956bfb2d6d2721d7272520c[]

        $curl = 'GET _watcher/stats?metric=current_watches';

        // TODO -- make assertion
    }

    /**
     * Tag:  56b6b50b174a935d368301ebd717231d
     * Line: 111
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL111_56b6b50b174a935d368301ebd717231d()
    {
        $client = $this->getClient();
        // tag::56b6b50b174a935d368301ebd717231d[]
        // TODO -- Implement Example
        // GET _watcher/stats/current_watches
        // end::56b6b50b174a935d368301ebd717231d[]

        $curl = 'GET _watcher/stats/current_watches';

        // TODO -- make assertion
    }

    /**
     * Tag:  6244204213f60edf2f23295f9059f2c9
     * Line: 156
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL156_6244204213f60edf2f23295f9059f2c9()
    {
        $client = $this->getClient();
        // tag::6244204213f60edf2f23295f9059f2c9[]
        // TODO -- Implement Example
        // GET _watcher/stats/queued_watches
        // end::6244204213f60edf2f23295f9059f2c9[]

        $curl = 'GET _watcher/stats/queued_watches';

        // TODO -- make assertion
    }

// %__METHOD__%





}
