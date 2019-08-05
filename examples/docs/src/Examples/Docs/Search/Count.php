<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Count
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   search/count.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Count extends SimpleExamplesTester {

    /**
     * Tag:  8f0511f8a5cb176ff2afdd4311799a33
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_8f0511f8a5cb176ff2afdd4311799a33()
    {
        $client = $this->getClient();
        // tag::8f0511f8a5cb176ff2afdd4311799a33[]
        // TODO -- Implement Example
        // PUT /twitter/_doc/1?refresh
        // {
        //     "user": "kimchy"
        // }
        // GET /twitter/_count?q=user:kimchy
        // GET /twitter/_count
        // {
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::8f0511f8a5cb176ff2afdd4311799a33[]

        $curl = 'PUT /twitter/_doc/1?refresh'
              . '{'
              . '    "user": "kimchy"'
              . '}'
              . 'GET /twitter/_count?q=user:kimchy'
              . 'GET /twitter/_count'
              . '{'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
