<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: NamedQueriesAndFilters
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/request/named-queries-and-filters.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class NamedQueriesAndFilters extends SimpleExamplesTester {

    /**
     * Tag:  0aad4321e968effc6e6ef2b98c6c71a5
     * Line: 7
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL7_0aad4321e968effc6e6ef2b98c6c71a5()
    {
        $client = $this->getClient();
        // tag::0aad4321e968effc6e6ef2b98c6c71a5[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "bool" : {
        //             "should" : [
        //                 {"match" : { "name.first" : {"query" : "shay", "_name" : "first"} }},
        //                 {"match" : { "name.last" : {"query" : "banon", "_name" : "last"} }}
        //             ],
        //             "filter" : {
        //                 "terms" : {
        //                     "name.last" : ["banon", "kimchy"],
        //                     "_name" : "test"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::0aad4321e968effc6e6ef2b98c6c71a5[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "should" : ['
              . '                {"match" : { "name.first" : {"query" : "shay", "_name" : "first"} }},'
              . '                {"match" : { "name.last" : {"query" : "banon", "_name" : "last"} }}'
              . '            ],'
              . '            "filter" : {'
              . '                "terms" : {'
              . '                    "name.last" : ["banon", "kimchy"],'
              . '                    "_name" : "test"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
