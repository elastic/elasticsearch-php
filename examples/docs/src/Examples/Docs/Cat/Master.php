<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cat;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Master
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cat/master.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Master extends SimpleExamplesTester {

    /**
     * Tag:  45bde49f35ffae3f3dabc77a592241b4
     * Line: 8
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL8_45bde49f35ffae3f3dabc77a592241b4()
    {
        $client = $this->getClient();
        // tag::45bde49f35ffae3f3dabc77a592241b4[]
        // TODO -- Implement Example
        // GET /_cat/master?v
        // end::45bde49f35ffae3f3dabc77a592241b4[]

        $curl = 'GET /_cat/master?v';

        // TODO -- make assertion
    }

// %__METHOD__%


}
