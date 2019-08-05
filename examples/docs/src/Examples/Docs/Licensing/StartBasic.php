<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Licensing;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: StartBasic
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   licensing/start-basic.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class StartBasic extends SimpleExamplesTester {

    /**
     * Tag:  8699d35269a47ba867fa8cc766287413
     * Line: 43
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL43_8699d35269a47ba867fa8cc766287413()
    {
        $client = $this->getClient();
        // tag::8699d35269a47ba867fa8cc766287413[]
        // TODO -- Implement Example
        // POST /_license/start_basic
        // end::8699d35269a47ba867fa8cc766287413[]

        $curl = 'POST /_license/start_basic';

        // TODO -- make assertion
    }

    /**
     * Tag:  f58fd031597e2c3df78bf0efd07206e3
     * Line: 64
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL64_f58fd031597e2c3df78bf0efd07206e3()
    {
        $client = $this->getClient();
        // tag::f58fd031597e2c3df78bf0efd07206e3[]
        // TODO -- Implement Example
        // POST /_license/start_basic?acknowledge=true
        // end::f58fd031597e2c3df78bf0efd07206e3[]

        $curl = 'POST /_license/start_basic?acknowledge=true';

        // TODO -- make assertion
    }

// %__METHOD__%



}
