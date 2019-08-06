<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: FuzzyQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/fuzzy-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class FuzzyQuery extends SimpleExamplesTester {

    /**
     * Tag:  d1e20f8f8c64f8e2cadea9e5c8376504
     * Line: 19
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL19_d1e20f8f8c64f8e2cadea9e5c8376504()
    {
        $client = $this->getClient();
        // tag::d1e20f8f8c64f8e2cadea9e5c8376504[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //        "fuzzy" : { "user" : "ki" }
        //     }
        // }
        // end::d1e20f8f8c64f8e2cadea9e5c8376504[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '       "fuzzy" : { "user" : "ki" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f2f4631d427b04207285227d1ca6114d
     * Line: 32
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL32_f2f4631d427b04207285227d1ca6114d()
    {
        $client = $this->getClient();
        // tag::f2f4631d427b04207285227d1ca6114d[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "fuzzy" : {
        //             "user" : {
        //                 "value": "ki",
        //                 "boost": 1.0,
        //                 "fuzziness": 2,
        //                 "prefix_length": 0,
        //                 "max_expansions": 100
        //             }
        //         }
        //     }
        // }
        // end::f2f4631d427b04207285227d1ca6114d[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "fuzzy" : {'
              . '            "user" : {'
              . '                "value": "ki",'
              . '                "boost": 1.0,'
              . '                "fuzziness": 2,'
              . '                "prefix_length": 0,'
              . '                "max_expansions": 100'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
