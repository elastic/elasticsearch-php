<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: BoostingQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/boosting-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class BoostingQuery extends SimpleExamplesTester {

    /**
     * Tag:  292e4c6567378fc7b70033b53b04ce12
     * Line: 18
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL18_292e4c6567378fc7b70033b53b04ce12()
    {
        $client = $this->getClient();
        // tag::292e4c6567378fc7b70033b53b04ce12[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "boosting" : {
        //             "positive" : {
        //                 "term" : {
        //                     "text" : "apple"
        //                 }
        //             },
        //             "negative" : {
        //                  "term" : {
        //                      "text" : "pie tart fruit crumble tree"
        //                 }
        //             },
        //             "negative_boost" : 0.5
        //         }
        //     }
        // }
        // end::292e4c6567378fc7b70033b53b04ce12[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "boosting" : {'
              . '            "positive" : {'
              . '                "term" : {'
              . '                    "text" : "apple"'
              . '                }'
              . '            },'
              . '            "negative" : {'
              . '                 "term" : {'
              . '                     "text" : "pie tart fruit crumble tree"'
              . '                }'
              . '            },'
              . '            "negative_boost" : 0.5'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
