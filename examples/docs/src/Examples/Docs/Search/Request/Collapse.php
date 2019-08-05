<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Collapse
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   search/request/collapse.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Collapse extends SimpleExamplesTester {

    /**
     * Tag:  032f67ced3e7d106f8722432ebbd94d3
     * Line: 9
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL9_032f67ced3e7d106f8722432ebbd94d3()
    {
        $client = $this->getClient();
        // tag::032f67ced3e7d106f8722432ebbd94d3[]
        // TODO -- Implement Example
        // GET /twitter/_search
        // {
        //     "query": {
        //         "match": {
        //             "message": "elasticsearch"
        //         }
        //     },
        //     "collapse" : {
        //         "field" : "user" \<1>
        //     },
        //     "sort": ["likes"], \<2>
        //     "from": 10 \<3>
        // }
        // end::032f67ced3e7d106f8722432ebbd94d3[]

        $curl = 'GET /twitter/_search'
              . '{'
              . '    "query": {'
              . '        "match": {'
              . '            "message": "elasticsearch"'
              . '        }'
              . '    },'
              . '    "collapse" : {'
              . '        "field" : "user" \<1>'
              . '    },'
              . '    "sort": ["likes"], \<2>'
              . '    "from": 10 \<3>'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  63d36a10d9475be2e2fa73d2415e20e6
     * Line: 43
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL43_63d36a10d9475be2e2fa73d2415e20e6()
    {
        $client = $this->getClient();
        // tag::63d36a10d9475be2e2fa73d2415e20e6[]
        // TODO -- Implement Example
        // GET /twitter/_search
        // {
        //     "query": {
        //         "match": {
        //             "message": "elasticsearch"
        //         }
        //     },
        //     "collapse" : {
        //         "field" : "user", \<1>
        //         "inner_hits": {
        //             "name": "last_tweets", \<2>
        //             "size": 5, \<3>
        //             "sort": [{ "date": "asc" }] \<4>
        //         },
        //         "max_concurrent_group_searches": 4 \<5>
        //     },
        //     "sort": ["likes"]
        // }
        // end::63d36a10d9475be2e2fa73d2415e20e6[]

        $curl = 'GET /twitter/_search'
              . '{'
              . '    "query": {'
              . '        "match": {'
              . '            "message": "elasticsearch"'
              . '        }'
              . '    },'
              . '    "collapse" : {'
              . '        "field" : "user", \<1>'
              . '        "inner_hits": {'
              . '            "name": "last_tweets", \<2>'
              . '            "size": 5, \<3>'
              . '            "sort": [{ "date": "asc" }] \<4>'
              . '        },'
              . '        "max_concurrent_group_searches": 4 \<5>'
              . '    },'
              . '    "sort": ["likes"]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4f20ca49fbaac83620d4cb23fd355f3b
     * Line: 77
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL77_4f20ca49fbaac83620d4cb23fd355f3b()
    {
        $client = $this->getClient();
        // tag::4f20ca49fbaac83620d4cb23fd355f3b[]
        // TODO -- Implement Example
        // GET /twitter/_search
        // {
        //     "query": {
        //         "match": {
        //             "message": "elasticsearch"
        //         }
        //     },
        //     "collapse" : {
        //         "field" : "user", \<1>
        //         "inner_hits": [
        //             {
        //                 "name": "most_liked",  \<2>
        //                 "size": 3,
        //                 "sort": ["likes"]
        //             },
        //             {
        //                 "name": "most_recent", \<3>
        //                 "size": 3,
        //                 "sort": [{ "date": "asc" }]
        //             }
        //         ]
        //     },
        //     "sort": ["likes"]
        // }
        // end::4f20ca49fbaac83620d4cb23fd355f3b[]

        $curl = 'GET /twitter/_search'
              . '{'
              . '    "query": {'
              . '        "match": {'
              . '            "message": "elasticsearch"'
              . '        }'
              . '    },'
              . '    "collapse" : {'
              . '        "field" : "user", \<1>'
              . '        "inner_hits": ['
              . '            {'
              . '                "name": "most_liked",  \<2>'
              . '                "size": 3,'
              . '                "sort": ["likes"]'
              . '            },'
              . '            {'
              . '                "name": "most_recent", \<3>'
              . '                "size": 3,'
              . '                "sort": [{ "date": "asc" }]'
              . '            }'
              . '        ]'
              . '    },'
              . '    "sort": ["likes"]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
