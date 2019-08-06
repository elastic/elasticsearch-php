<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MatchPhraseQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/match-phrase-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MatchPhraseQuery extends SimpleExamplesTester {

    /**
     * Tag:  83f95657beca9bf5d8264c80c7fb463f
     * Line: 11
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL11_83f95657beca9bf5d8264c80c7fb463f()
    {
        $client = $this->getClient();
        // tag::83f95657beca9bf5d8264c80c7fb463f[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "match_phrase" : {
        //             "message" : "this is a test"
        //         }
        //     }
        // }
        // end::83f95657beca9bf5d8264c80c7fb463f[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "match_phrase" : {'
              . '            "message" : "this is a test"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  72231b7debac60c95b9869a97dafda3a
     * Line: 31
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL31_72231b7debac60c95b9869a97dafda3a()
    {
        $client = $this->getClient();
        // tag::72231b7debac60c95b9869a97dafda3a[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "match_phrase" : {
        //             "message" : {
        //                 "query" : "this is a test",
        //                 "analyzer" : "my_analyzer"
        //             }
        //         }
        //     }
        // }
        // end::72231b7debac60c95b9869a97dafda3a[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "match_phrase" : {'
              . '            "message" : {'
              . '                "query" : "this is a test",'
              . '                "analyzer" : "my_analyzer"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
