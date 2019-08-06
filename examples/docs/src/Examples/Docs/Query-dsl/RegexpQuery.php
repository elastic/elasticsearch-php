<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: RegexpQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/regexp-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class RegexpQuery extends SimpleExamplesTester {

    /**
     * Tag:  618d5f3d35921d8cb7e9ccfbe9a4c3e3
     * Line: 23
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL23_618d5f3d35921d8cb7e9ccfbe9a4c3e3()
    {
        $client = $this->getClient();
        // tag::618d5f3d35921d8cb7e9ccfbe9a4c3e3[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "regexp": {
        //             "user": {
        //                 "value": "k.*y",
        //                 "flags" : "ALL",
        //                 "max_determinized_states": 10000,
        //                 "rewrite": "constant_score"
        //             }
        //         }
        //     }
        // }
        // end::618d5f3d35921d8cb7e9ccfbe9a4c3e3[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "regexp": {'
              . '            "user": {'
              . '                "value": "k.*y",'
              . '                "flags" : "ALL",'
              . '                "max_determinized_states": 10000,'
              . '                "rewrite": "constant_score"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
