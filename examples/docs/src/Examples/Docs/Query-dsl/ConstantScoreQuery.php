<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ConstantScoreQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/constant-score-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ConstantScoreQuery extends SimpleExamplesTester {

    /**
     * Tag:  d59a084640acf2f5c51d3068d38b5fc0
     * Line: 12
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL12_d59a084640acf2f5c51d3068d38b5fc0()
    {
        $client = $this->getClient();
        // tag::d59a084640acf2f5c51d3068d38b5fc0[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "constant_score" : {
        //             "filter" : {
        //                 "term" : { "user" : "kimchy"}
        //             },
        //             "boost" : 1.2
        //         }
        //     }
        // }
        // end::d59a084640acf2f5c51d3068d38b5fc0[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "constant_score" : {'
              . '            "filter" : {'
              . '                "term" : { "user" : "kimchy"}'
              . '            },'
              . '            "boost" : 1.2'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
