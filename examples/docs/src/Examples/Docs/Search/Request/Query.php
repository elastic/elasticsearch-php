<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Query
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/request/query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Query extends SimpleExamplesTester {

    /**
     * Tag:  a8e19886f6b4792def0381c3f8cf2b5c
     * Line: 8
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL8_a8e19886f6b4792def0381c3f8cf2b5c()
    {
        $client = $this->getClient();
        // tag::a8e19886f6b4792def0381c3f8cf2b5c[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::a8e19886f6b4792def0381c3f8cf2b5c[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
