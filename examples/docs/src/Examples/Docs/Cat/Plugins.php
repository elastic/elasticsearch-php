<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cat;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Plugins
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cat/plugins.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Plugins extends SimpleExamplesTester {

    /**
     * Tag:  3796d69e8339bab58e70fdde9f9c09ad
     * Line: 7
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL7_3796d69e8339bab58e70fdde9f9c09ad()
    {
        $client = $this->getClient();
        // tag::3796d69e8339bab58e70fdde9f9c09ad[]
        // TODO -- Implement Example
        // GET /_cat/plugins?v&s=component&h=name,component,version,description
        // end::3796d69e8339bab58e70fdde9f9c09ad[]

        $curl = 'GET /_cat/plugins?v&s=component&h=name,component,version,description';

        // TODO -- make assertion
    }

// %__METHOD__%


}
