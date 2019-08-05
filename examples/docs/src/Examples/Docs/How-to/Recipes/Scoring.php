<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\How-to\Recipes;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Scoring
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   how-to/recipes/scoring.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Scoring extends SimpleExamplesTester {

    /**
     * Tag:  a0f15dd7fcb07bc8543fe04c2907d4b9
     * Line: 125
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL125_a0f15dd7fcb07bc8543fe04c2907d4b9()
    {
        $client = $this->getClient();
        // tag::a0f15dd7fcb07bc8543fe04c2907d4b9[]
        // TODO -- Implement Example
        // GET index/_search
        // {
        //     "query" : {
        //         "script_score" : {
        //             "query" : {
        //                 "match": { "body": "elasticsearch" }
        //             },
        //             "script" : {
        //                 "source" : "_score * saturation(doc['pagerank'].value, 10)" \<1>
        //             }
        //         }
        //     }
        // }
        // end::a0f15dd7fcb07bc8543fe04c2907d4b9[]

        $curl = 'GET index/_search'
              . '{'
              . '    "query" : {'
              . '        "script_score" : {'
              . '            "query" : {'
              . '                "match": { "body": "elasticsearch" }'
              . '            },'
              . '            "script" : {'
              . '                "source" : "_score * saturation(doc['pagerank'].value, 10)" \<1>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0dfa66a019712e413652c5eddd057ba8
     * Line: 171
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL171_0dfa66a019712e413652c5eddd057ba8()
    {
        $client = $this->getClient();
        // tag::0dfa66a019712e413652c5eddd057ba8[]
        // TODO -- Implement Example
        // GET _search
        // {
        //     "query" : {
        //         "bool" : {
        //             "must": {
        //                 "match": { "body": "elasticsearch" }
        //             },
        //             "should": {
        //                 "rank_feature": {
        //                     "field": "pagerank", \<1>
        //                     "saturation": {
        //                         "pivot": 10
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::0dfa66a019712e413652c5eddd057ba8[]

        $curl = 'GET _search'
              . '{'
              . '    "query" : {'
              . '        "bool" : {'
              . '            "must": {'
              . '                "match": { "body": "elasticsearch" }'
              . '            },'
              . '            "should": {'
              . '                "rank_feature": {'
              . '                    "field": "pagerank", \<1>'
              . '                    "saturation": {'
              . '                        "pivot": 10'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
