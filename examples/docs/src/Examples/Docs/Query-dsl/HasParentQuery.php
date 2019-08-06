<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: HasParentQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/has-parent-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class HasParentQuery extends SimpleExamplesTester {

    /**
     * Tag:  6515e74b150bbdae570e0fd3ef5ac2e5
     * Line: 27
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL27_6515e74b150bbdae570e0fd3ef5ac2e5()
    {
        $client = $this->getClient();
        // tag::6515e74b150bbdae570e0fd3ef5ac2e5[]
        // TODO -- Implement Example
        // PUT /my-index
        // {
        //     "mappings": {
        //         "properties" : {
        //             "my-join-field" : {
        //                 "type" : "join",
        //                 "relations": {
        //                     "parent": "child"
        //                 }
        //             },
        //             "tag" : {
        //                 "type" : "keyword"
        //             }
        //         }
        //     }
        // }
        // end::6515e74b150bbdae570e0fd3ef5ac2e5[]

        $curl = 'PUT /my-index'
              . '{'
              . '    "mappings": {'
              . '        "properties" : {'
              . '            "my-join-field" : {'
              . '                "type" : "join",'
              . '                "relations": {'
              . '                    "parent": "child"'
              . '                }'
              . '            },'
              . '            "tag" : {'
              . '                "type" : "keyword"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e539bfb5c73771c73acdf22fe77dde04
     * Line: 53
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL53_e539bfb5c73771c73acdf22fe77dde04()
    {
        $client = $this->getClient();
        // tag::e539bfb5c73771c73acdf22fe77dde04[]
        // TODO -- Implement Example
        // GET /my-index/_search
        // {
        //     "query": {
        //         "has_parent" : {
        //             "parent_type" : "parent",
        //             "query" : {
        //                 "term" : {
        //                     "tag" : {
        //                         "value" : "Elasticsearch"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::e539bfb5c73771c73acdf22fe77dde04[]

        $curl = 'GET /my-index/_search'
              . '{'
              . '    "query": {'
              . '        "has_parent" : {'
              . '            "parent_type" : "parent",'
              . '            "query" : {'
              . '                "term" : {'
              . '                    "tag" : {'
              . '                        "value" : "Elasticsearch"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  85d88b08243afbef45d4dcea72c9a41c
     * Line: 124
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL124_85d88b08243afbef45d4dcea72c9a41c()
    {
        $client = $this->getClient();
        // tag::85d88b08243afbef45d4dcea72c9a41c[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "has_parent" : {
        //             "parent_type" : "parent",
        //             "score" : true,
        //             "query" : {
        //                 "function_score" : {
        //                     "script_score": {
        //                         "script": "_score * doc[\'view_count\'].value"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::85d88b08243afbef45d4dcea72c9a41c[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "has_parent" : {'
              . '            "parent_type" : "parent",'
              . '            "score" : true,'
              . '            "query" : {'
              . '                "function_score" : {'
              . '                    "script_score": {'
              . '                        "script": "_score * doc[\'view_count\'].value"'
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
