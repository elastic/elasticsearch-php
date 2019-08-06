<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SearchAfter
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/request/search-after.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SearchAfter extends SimpleExamplesTester {

    /**
     * Tag:  402ee4bf8e2e386d5f9100fdaf13a6d6
     * Line: 13
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL13_402ee4bf8e2e386d5f9100fdaf13a6d6()
    {
        $client = $this->getClient();
        // tag::402ee4bf8e2e386d5f9100fdaf13a6d6[]
        // TODO -- Implement Example
        // GET twitter/_search
        // {
        //     "size": 10,
        //     "query": {
        //         "match" : {
        //             "title" : "elasticsearch"
        //         }
        //     },
        //     "sort": [
        //         {"date": "asc"},
        //         {"tie_breaker_id": "asc"}      \<1>
        //     ]
        // }
        // end::402ee4bf8e2e386d5f9100fdaf13a6d6[]

        $curl = 'GET twitter/_search'
              . '{'
              . '    "size": 10,'
              . '    "query": {'
              . '        "match" : {'
              . '            "title" : "elasticsearch"'
              . '        }'
              . '    },'
              . '    "sort": ['
              . '        {"date": "asc"},'
              . '        {"tie_breaker_id": "asc"}      \<1>'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  525ec32997125d401f9c128ca450cefa
     * Line: 57
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL57_525ec32997125d401f9c128ca450cefa()
    {
        $client = $this->getClient();
        // tag::525ec32997125d401f9c128ca450cefa[]
        // TODO -- Implement Example
        // GET twitter/_search
        // {
        //     "size": 10,
        //     "query": {
        //         "match" : {
        //             "title" : "elasticsearch"
        //         }
        //     },
        //     "search_after": [1463538857, "654323"],
        //     "sort": [
        //         {"date": "asc"},
        //         {"tie_breaker_id": "asc"}
        //     ]
        // }
        // end::525ec32997125d401f9c128ca450cefa[]

        $curl = 'GET twitter/_search'
              . '{'
              . '    "size": 10,'
              . '    "query": {'
              . '        "match" : {'
              . '            "title" : "elasticsearch"'
              . '        }'
              . '    },'
              . '    "search_after": [1463538857, "654323"],'
              . '    "sort": ['
              . '        {"date": "asc"},'
              . '        {"tie_breaker_id": "asc"}'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
