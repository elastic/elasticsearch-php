<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cat;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Segments
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cat/segments.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Segments extends SimpleExamplesTester {

    /**
     * Tag:  6f507269ad5b31d2bb0885c1b18aac1a
     * Line: 9
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL9_6f507269ad5b31d2bb0885c1b18aac1a()
    {
        $client = $this->getClient();
        // tag::6f507269ad5b31d2bb0885c1b18aac1a[]
        // TODO -- Implement Example
        // GET /_cat/segments?v
        // end::6f507269ad5b31d2bb0885c1b18aac1a[]

        $curl = 'GET /_cat/segments?v';

        // TODO -- make assertion
    }

// %__METHOD__%


}
