<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: HasChildQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/has-child-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class HasChildQuery extends SimpleExamplesTester {

    /**
     * Tag:  10239a59784c3069e0d9399d3f9a7008
     * Line: 31
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL31_10239a59784c3069e0d9399d3f9a7008()
    {
        $client = $this->getClient();
        // tag::10239a59784c3069e0d9399d3f9a7008[]
        // TODO -- Implement Example
        // PUT /my_index
        // {
        //     "mappings": {
        //         "properties" : {
        //             "my-join-field" : {
        //                 "type" : "join",
        //                 "relations": {
        //                     "parent": "child"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::10239a59784c3069e0d9399d3f9a7008[]

        $curl = 'PUT /my_index'
              . '{'
              . '    "mappings": {'
              . '        "properties" : {'
              . '            "my-join-field" : {'
              . '                "type" : "join",'
              . '                "relations": {'
              . '                    "parent": "child"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a204ff3396082b32175371c7ed8b9394
     * Line: 54
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL54_a204ff3396082b32175371c7ed8b9394()
    {
        $client = $this->getClient();
        // tag::a204ff3396082b32175371c7ed8b9394[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "has_child" : {
        //             "type" : "child",
        //             "query" : {
        //                 "match_all" : {}
        //             },
        //             "max_children": 10,
        //             "min_children": 2,
        //             "score_mode" : "min"
        //         }
        //     }
        // }
        // end::a204ff3396082b32175371c7ed8b9394[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "has_child" : {'
              . '            "type" : "child",'
              . '            "query" : {'
              . '                "match_all" : {}'
              . '            },'
              . '            "max_children": 10,'
              . '            "min_children": 2,'
              . '            "score_mode" : "min"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d7b459941dc32d790ade80a0f5712560
     * Line: 143
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL143_d7b459941dc32d790ade80a0f5712560()
    {
        $client = $this->getClient();
        // tag::d7b459941dc32d790ade80a0f5712560[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "has_child" : {
        //             "type" : "child",
        //             "query" : {
        //                 "function_score" : {
        //                     "script_score": {
        //                         "script": "_score * doc[\'click_count\'].value"
        //                     }
        //                 }
        //             },
        //             "score_mode" : "max"
        //         }
        //     }
        // }
        // end::d7b459941dc32d790ade80a0f5712560[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "has_child" : {'
              . '            "type" : "child",'
              . '            "query" : {'
              . '                "function_score" : {'
              . '                    "script_score": {'
              . '                        "script": "_score * doc[\'click_count\'].value"'
              . '                    }'
              . '                }'
              . '            },'
              . '            "score_mode" : "max"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
