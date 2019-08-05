<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DisMaxQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/dis-max-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DisMaxQuery extends SimpleExamplesTester {

    /**
     * Tag:  fcf5a593cfe8809d98a5239ad9c82038
     * Line: 21
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL21_fcf5a593cfe8809d98a5239ad9c82038()
    {
        $client = $this->getClient();
        // tag::fcf5a593cfe8809d98a5239ad9c82038[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "dis_max" : {
        //             "queries" : [
        //                 { "term" : { "title" : "Quick pets" }},
        //                 { "term" : { "body" : "Quick pets" }}
        //             ],
        //             "tie_breaker" : 0.7
        //         }
        //     }
        // }
        // end::fcf5a593cfe8809d98a5239ad9c82038[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "dis_max" : {'
              . '            "queries" : ['
              . '                { "term" : { "title" : "Quick pets" }},'
              . '                { "term" : { "body" : "Quick pets" }}'
              . '            ],'
              . '            "tie_breaker" : 0.7'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
