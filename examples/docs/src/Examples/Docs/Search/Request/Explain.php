<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Explain
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/request/explain.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Explain extends SimpleExamplesTester {

    /**
     * Tag:  e405e90fe3207157d3c0f9c76c6778e8
     * Line: 7
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL7_e405e90fe3207157d3c0f9c76c6778e8()
    {
        $client = $this->getClient();
        // tag::e405e90fe3207157d3c0f9c76c6778e8[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "explain": true,
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::e405e90fe3207157d3c0f9c76c6778e8[]

        $curl = 'GET /_search'
              . '{'
              . '    "explain": true,'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
