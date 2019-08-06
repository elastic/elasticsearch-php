<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cat;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Templates
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cat/templates.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Templates extends SimpleExamplesTester {

    /**
     * Tag:  289e6033c96f931844770114113cad6a
     * Line: 7
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL7_289e6033c96f931844770114113cad6a()
    {
        $client = $this->getClient();
        // tag::289e6033c96f931844770114113cad6a[]
        // TODO -- Implement Example
        // GET /_cat/templates?v&s=name
        // end::289e6033c96f931844770114113cad6a[]

        $curl = 'GET /_cat/templates?v&s=name';

        // TODO -- make assertion
    }

// %__METHOD__%


}
