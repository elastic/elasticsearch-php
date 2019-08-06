<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: RankEval
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/rank-eval.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class RankEval extends SimpleExamplesTester {

    /**
     * Tag:  2a989679e4b71569e17e02db8865b685
     * Line: 151
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL151_2a989679e4b71569e17e02db8865b685()
    {
        $client = $this->getClient();
        // tag::2a989679e4b71569e17e02db8865b685[]
        // TODO -- Implement Example
        // GET /twitter/_rank_eval
        // {
        //     "requests": [
        //     {
        //         "id": "JFK query",
        //         "request": { "query": { "match_all": {}}},
        //         "ratings": []
        //     }],
        //     "metric": {
        //       "precision": {
        //         "k" : 20,
        //         "relevant_rating_threshold": 1,
        //         "ignore_unlabeled": false
        //       }
        //    }
        // }
        // end::2a989679e4b71569e17e02db8865b685[]

        $curl = 'GET /twitter/_rank_eval'
              . '{'
              . '    "requests": ['
              . '    {'
              . '        "id": "JFK query",'
              . '        "request": { "query": { "match_all": {}}},'
              . '        "ratings": []'
              . '    }],'
              . '    "metric": {'
              . '      "precision": {'
              . '        "k" : 20,'
              . '        "relevant_rating_threshold": 1,'
              . '        "ignore_unlabeled": false'
              . '      }'
              . '   }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  351775a1f73e47025463bd937948f7b4
     * Line: 194
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL194_351775a1f73e47025463bd937948f7b4()
    {
        $client = $this->getClient();
        // tag::351775a1f73e47025463bd937948f7b4[]
        // TODO -- Implement Example
        // GET /twitter/_rank_eval
        // {
        //     "requests": [
        //     {
        //         "id": "JFK query",
        //         "request": { "query": { "match_all": {}}},
        //         "ratings": []
        //     }],
        //     "metric": {
        //         "mean_reciprocal_rank": {
        //             "k" : 20,
        //             "relevant_rating_threshold" : 1
        //         }
        //     }
        // }
        // end::351775a1f73e47025463bd937948f7b4[]

        $curl = 'GET /twitter/_rank_eval'
              . '{'
              . '    "requests": ['
              . '    {'
              . '        "id": "JFK query",'
              . '        "request": { "query": { "match_all": {}}},'
              . '        "ratings": []'
              . '    }],'
              . '    "metric": {'
              . '        "mean_reciprocal_rank": {'
              . '            "k" : 20,'
              . '            "relevant_rating_threshold" : 1'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c4f013ff1a8b80c87c0265a91ed12648
     * Line: 233
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL233_c4f013ff1a8b80c87c0265a91ed12648()
    {
        $client = $this->getClient();
        // tag::c4f013ff1a8b80c87c0265a91ed12648[]
        // TODO -- Implement Example
        // GET /twitter/_rank_eval
        // {
        //     "requests": [
        //     {
        //         "id": "JFK query",
        //         "request": { "query": { "match_all": {}}},
        //         "ratings": []
        //     }],
        //     "metric": {
        //        "dcg": {
        //             "k" : 20,
        //             "normalize": false
        //        }
        //     }
        // }
        // end::c4f013ff1a8b80c87c0265a91ed12648[]

        $curl = 'GET /twitter/_rank_eval'
              . '{'
              . '    "requests": ['
              . '    {'
              . '        "id": "JFK query",'
              . '        "request": { "query": { "match_all": {}}},'
              . '        "ratings": []'
              . '    }],'
              . '    "metric": {'
              . '       "dcg": {'
              . '            "k" : 20,'
              . '            "normalize": false'
              . '       }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  12c4a9be9ffc26cdc0e9343d53c1fd5d
     * Line: 282
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL282_12c4a9be9ffc26cdc0e9343d53c1fd5d()
    {
        $client = $this->getClient();
        // tag::12c4a9be9ffc26cdc0e9343d53c1fd5d[]
        // TODO -- Implement Example
        // GET /twitter/_rank_eval
        // {
        //     "requests": [
        //     {
        //         "id": "JFK query",
        //         "request": { "query": { "match_all": {}}},
        //         "ratings": []
        //     }],
        //     "metric": {
        //        "expected_reciprocal_rank": {
        //             "maximum_relevance" : 3,
        //             "k" : 20
        //        }
        //     }
        // }
        // end::12c4a9be9ffc26cdc0e9343d53c1fd5d[]

        $curl = 'GET /twitter/_rank_eval'
              . '{'
              . '    "requests": ['
              . '    {'
              . '        "id": "JFK query",'
              . '        "request": { "query": { "match_all": {}}},'
              . '        "ratings": []'
              . '    }],'
              . '    "metric": {'
              . '       "expected_reciprocal_rank": {'
              . '            "maximum_relevance" : 3,'
              . '            "k" : 20'
              . '       }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
