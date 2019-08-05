<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MatchQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/match-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MatchQuery extends SimpleExamplesTester {

    /**
     * Tag:  fa2fe60f570bd930d2891778c6efbfe6
     * Line: 12
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL12_fa2fe60f570bd930d2891778c6efbfe6()
    {
        $client = $this->getClient();
        // tag::fa2fe60f570bd930d2891778c6efbfe6[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "match" : {
        //             "message" : "this is a test"
        //         }
        //     }
        // }
        // end::fa2fe60f570bd930d2891778c6efbfe6[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "match" : {'
              . '            "message" : "this is a test"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6138d6919f3cbaaf61e1092f817d295c
     * Line: 42
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL42_6138d6919f3cbaaf61e1092f817d295c()
    {
        $client = $this->getClient();
        // tag::6138d6919f3cbaaf61e1092f817d295c[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "match" : {
        //             "message" : {
        //                 "query" : "this is a test",
        //                 "operator" : "and"
        //             }
        //         }
        //     }
        // }
        // end::6138d6919f3cbaaf61e1092f817d295c[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "match" : {'
              . '            "message" : {'
              . '                "query" : "this is a test",'
              . '                "operator" : "and"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5043b83a89091fa00edb341ddf7ba370
     * Line: 87
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL87_5043b83a89091fa00edb341ddf7ba370()
    {
        $client = $this->getClient();
        // tag::5043b83a89091fa00edb341ddf7ba370[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "match" : {
        //             "message" : {
        //                 "query" : "this is a testt",
        //                 "fuzziness": "AUTO"
        //             }
        //         }
        //     }
        // }
        // end::5043b83a89091fa00edb341ddf7ba370[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "match" : {'
              . '            "message" : {'
              . '                "query" : "this is a testt",'
              . '                "fuzziness": "AUTO"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0ac9916f47a2483b89c1416684af322a
     * Line: 110
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL110_0ac9916f47a2483b89c1416684af322a()
    {
        $client = $this->getClient();
        // tag::0ac9916f47a2483b89c1416684af322a[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "match" : {
        //             "message" : {
        //                 "query" : "to be or not to be",
        //                 "operator" : "and",
        //                 "zero_terms_query": "all"
        //             }
        //         }
        //     }
        // }
        // end::0ac9916f47a2483b89c1416684af322a[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "match" : {'
              . '            "message" : {'
              . '                "query" : "to be or not to be",'
              . '                "operator" : "and",'
              . '                "zero_terms_query": "all"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7f56755fb6c42f7e6203339a6d0cb6e6
     * Line: 138
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL138_7f56755fb6c42f7e6203339a6d0cb6e6()
    {
        $client = $this->getClient();
        // tag::7f56755fb6c42f7e6203339a6d0cb6e6[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //    "query": {
        //        "match" : {
        //            "message": {
        //                "query" : "ny city",
        //                "auto_generate_synonyms_phrase_query" : false
        //            }
        //        }
        //    }
        // }
        // end::7f56755fb6c42f7e6203339a6d0cb6e6[]

        $curl = 'GET /_search'
              . '{'
              . '   "query": {'
              . '       "match" : {'
              . '           "message": {'
              . '               "query" : "ny city",'
              . '               "auto_generate_synonyms_phrase_query" : false'
              . '           }'
              . '       }'
              . '   }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
