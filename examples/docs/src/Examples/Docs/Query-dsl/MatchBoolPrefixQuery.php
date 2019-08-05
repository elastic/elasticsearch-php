<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MatchBoolPrefixQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/match-bool-prefix-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MatchBoolPrefixQuery extends SimpleExamplesTester {

    /**
     * Tag:  79c7e8a98c47fad3e96c654d34aa049a
     * Line: 13
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL13_79c7e8a98c47fad3e96c654d34aa049a()
    {
        $client = $this->getClient();
        // tag::79c7e8a98c47fad3e96c654d34aa049a[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "match_bool_prefix" : {
        //             "message" : "quick brown f"
        //         }
        //     }
        // }
        // end::79c7e8a98c47fad3e96c654d34aa049a[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "match_bool_prefix" : {'
              . '            "message" : "quick brown f"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  effc6b4784aca12691de5d5782c0384b
     * Line: 29
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL29_effc6b4784aca12691de5d5782c0384b()
    {
        $client = $this->getClient();
        // tag::effc6b4784aca12691de5d5782c0384b[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "bool" : {
        //             "should": [
        //                 { "term": { "message": "quick" }},
        //                 { "term": { "message": "brown" }},
        //                 { "prefix": { "message": "f"}}
        //             ]
        //         }
        //     }
        // }
        // end::effc6b4784aca12691de5d5782c0384b[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "should": ['
              . '                { "term": { "message": "quick" }},'
              . '                { "term": { "message": "brown" }},'
              . '                { "prefix": { "message": "f"}}'
              . '            ]'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  953aab6cbd12a4f034cf02bf34d62a72
     * Line: 61
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL61_953aab6cbd12a4f034cf02bf34d62a72()
    {
        $client = $this->getClient();
        // tag::953aab6cbd12a4f034cf02bf34d62a72[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "match_bool_prefix" : {
        //             "message": {
        //                 "query": "quick brown f",
        //                 "analyzer": "keyword"
        //             }
        //         }
        //     }
        // }
        // end::953aab6cbd12a4f034cf02bf34d62a72[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "match_bool_prefix" : {'
              . '            "message": {'
              . '                "query": "quick brown f",'
              . '                "analyzer": "keyword"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
