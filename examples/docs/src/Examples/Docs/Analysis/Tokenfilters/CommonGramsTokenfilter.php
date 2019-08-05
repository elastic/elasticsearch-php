<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: CommonGramsTokenfilter
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/tokenfilters/common-grams-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class CommonGramsTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  dc0d7dd6fb47db03df4cb11bdb00b125
     * Line: 43
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL43_dc0d7dd6fb47db03df4cb11bdb00b125()
    {
        $client = $this->getClient();
        // tag::dc0d7dd6fb47db03df4cb11bdb00b125[]
        // TODO -- Implement Example
        // PUT /common_grams_example
        // {
        //     "settings": {
        //         "analysis": {
        //             "analyzer": {
        //                 "index_grams": {
        //                     "tokenizer": "whitespace",
        //                     "filter": ["common_grams"]
        //                 },
        //                 "search_grams": {
        //                     "tokenizer": "whitespace",
        //                     "filter": ["common_grams_query"]
        //                 }
        //             },
        //             "filter": {
        //                 "common_grams": {
        //                     "type": "common_grams",
        //                     "common_words": ["the", "is", "a"]
        //                 },
        //                 "common_grams_query": {
        //                     "type": "common_grams",
        //                     "query_mode": true,
        //                     "common_words": ["the", "is", "a"]
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::dc0d7dd6fb47db03df4cb11bdb00b125[]

        $curl = 'PUT /common_grams_example'
              . '{'
              . '    "settings": {'
              . '        "analysis": {'
              . '            "analyzer": {'
              . '                "index_grams": {'
              . '                    "tokenizer": "whitespace",'
              . '                    "filter": ["common_grams"]'
              . '                },'
              . '                "search_grams": {'
              . '                    "tokenizer": "whitespace",'
              . '                    "filter": ["common_grams_query"]'
              . '                }'
              . '            },'
              . '            "filter": {'
              . '                "common_grams": {'
              . '                    "type": "common_grams",'
              . '                    "common_words": ["the", "is", "a"]'
              . '                },'
              . '                "common_grams_query": {'
              . '                    "type": "common_grams",'
              . '                    "query_mode": true,'
              . '                    "common_words": ["the", "is", "a"]'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  817be849e2c568a21766d6ce2ffafadd
     * Line: 78
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL78_817be849e2c568a21766d6ce2ffafadd()
    {
        $client = $this->getClient();
        // tag::817be849e2c568a21766d6ce2ffafadd[]
        // TODO -- Implement Example
        // POST /common_grams_example/_analyze
        // {
        //   "analyzer" : "index_grams",
        //   "text" : "the quick brown is a fox"
        // }
        // end::817be849e2c568a21766d6ce2ffafadd[]

        $curl = 'POST /common_grams_example/_analyze'
              . '{'
              . '  "analyzer" : "index_grams",'
              . '  "text" : "the quick brown is a fox"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
