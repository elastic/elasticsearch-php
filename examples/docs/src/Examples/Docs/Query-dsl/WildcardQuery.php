<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: WildcardQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/wildcard-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class WildcardQuery extends SimpleExamplesTester {

    /**
     * Tag:  d31062ff8c015387889fed4ad86fd914
     * Line: 21
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL21_d31062ff8c015387889fed4ad86fd914()
    {
        $client = $this->getClient();
        // tag::d31062ff8c015387889fed4ad86fd914[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "wildcard": {
        //             "user": {
        //                 "value": "ki*y",
        //                 "boost": 1.0,
        //                 "rewrite": "constant_score"
        //             }
        //         }
        //     }
        // }
        // end::d31062ff8c015387889fed4ad86fd914[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "wildcard": {'
              . '            "user": {'
              . '                "value": "ki*y",'
              . '                "boost": 1.0,'
              . '                "rewrite": "constant_score"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
