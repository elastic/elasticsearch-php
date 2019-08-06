<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: NestedQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/nested-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class NestedQuery extends SimpleExamplesTester {

    /**
     * Tag:  ae57d3aa9075aaab34bda7655cdafabb
     * Line: 23
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL23_ae57d3aa9075aaab34bda7655cdafabb()
    {
        $client = $this->getClient();
        // tag::ae57d3aa9075aaab34bda7655cdafabb[]
        // TODO -- Implement Example
        // PUT /my_index
        // {
        //     "mappings": {
        //         "properties" : {
        //             "obj1" : {
        //                 "type" : "nested"
        //             }
        //         }
        //     }
        // }
        // end::ae57d3aa9075aaab34bda7655cdafabb[]

        $curl = 'PUT /my_index'
              . '{'
              . '    "mappings": {'
              . '        "properties" : {'
              . '            "obj1" : {'
              . '                "type" : "nested"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f9abf6c518e9ec793218c3696f5f2f8f
     * Line: 43
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL43_f9abf6c518e9ec793218c3696f5f2f8f()
    {
        $client = $this->getClient();
        // tag::f9abf6c518e9ec793218c3696f5f2f8f[]
        // TODO -- Implement Example
        // GET /my_index/_search
        // {
        //     "query": {
        //         "nested" : {
        //             "path" : "obj1",
        //             "query" : {
        //                 "bool" : {
        //                     "must" : [
        //                     { "match" : {"obj1.name" : "blue"} },
        //                     { "range" : {"obj1.count" : {"gt" : 5}} }
        //                     ]
        //                 }
        //             },
        //             "score_mode" : "avg"
        //         }
        //     }
        // }
        // end::f9abf6c518e9ec793218c3696f5f2f8f[]

        $curl = 'GET /my_index/_search'
              . '{'
              . '    "query": {'
              . '        "nested" : {'
              . '            "path" : "obj1",'
              . '            "query" : {'
              . '                "bool" : {'
              . '                    "must" : ['
              . '                    { "match" : {"obj1.name" : "blue"} },'
              . '                    { "range" : {"obj1.count" : {"gt" : 5}} }'
              . '                    ]'
              . '                }'
              . '            },'
              . '            "score_mode" : "avg"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
