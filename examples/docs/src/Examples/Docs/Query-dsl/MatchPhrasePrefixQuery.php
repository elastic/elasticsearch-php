<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MatchPhrasePrefixQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/match-phrase-prefix-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MatchPhrasePrefixQuery extends SimpleExamplesTester {

    /**
     * Tag:  d071647d9248aaf6b4ecc277cd9f24b2
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_d071647d9248aaf6b4ecc277cd9f24b2()
    {
        $client = $this->getClient();
        // tag::d071647d9248aaf6b4ecc277cd9f24b2[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "match_phrase_prefix" : {
        //             "message" : "quick brown f"
        //         }
        //     }
        // }
        // end::d071647d9248aaf6b4ecc277cd9f24b2[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "match_phrase_prefix" : {'
              . '            "message" : "quick brown f"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  93fb5b3445636611e024783b06f9af93
     * Line: 30
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL30_93fb5b3445636611e024783b06f9af93()
    {
        $client = $this->getClient();
        // tag::93fb5b3445636611e024783b06f9af93[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "match_phrase_prefix" : {
        //             "message" : {
        //                 "query" : "quick brown f",
        //                 "max_expansions" : 10
        //             }
        //         }
        //     }
        // }
        // end::93fb5b3445636611e024783b06f9af93[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "match_phrase_prefix" : {'
              . '            "message" : {'
              . '                "query" : "quick brown f",'
              . '                "max_expansions" : 10'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
