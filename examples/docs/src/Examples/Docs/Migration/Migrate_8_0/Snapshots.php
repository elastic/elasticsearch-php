<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Migration\Migrate_8_0;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Snapshots
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   migration/migrate_8_0/snapshots.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Snapshots extends SimpleExamplesTester {

    /**
     * Tag:  6458a2377155ecbdd2d3ebd0e1529201
     * Line: 20
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL20_6458a2377155ecbdd2d3ebd0e1529201()
    {
        $client = $this->getClient();
        // tag::6458a2377155ecbdd2d3ebd0e1529201[]
        // TODO -- Implement Example
        // GET _snapshot/repo1/snap1
        // end::6458a2377155ecbdd2d3ebd0e1529201[]

        $curl = 'GET _snapshot/repo1/snap1';

        // TODO -- make assertion
    }

// %__METHOD__%


}
