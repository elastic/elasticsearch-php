<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PredicateTokenfilter
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/tokenfilters/predicate-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PredicateTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  10338787b66a7f93270c3b88dd6197f8
     * Line: 19
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL19_10338787b66a7f93270c3b88dd6197f8()
    {
        $client = $this->getClient();
        // tag::10338787b66a7f93270c3b88dd6197f8[]
        // TODO -- Implement Example
        // PUT /condition_example
        // {
        //     "settings" : {
        //         "analysis" : {
        //             "analyzer" : {
        //                 "my_analyzer" : {
        //                     "tokenizer" : "standard",
        //                     "filter" : [ "my_script_filter" ]
        //                 }
        //             },
        //             "filter" : {
        //                 "my_script_filter" : {
        //                     "type" : "predicate_token_filter",
        //                     "script" : {
        //                         "source" : "token.getTerm().length() > 5"  \<1>
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::10338787b66a7f93270c3b88dd6197f8[]

        $curl = 'PUT /condition_example'
              . '{'
              . '    "settings" : {'
              . '        "analysis" : {'
              . '            "analyzer" : {'
              . '                "my_analyzer" : {'
              . '                    "tokenizer" : "standard",'
              . '                    "filter" : [ "my_script_filter" ]'
              . '                }'
              . '            },'
              . '            "filter" : {'
              . '                "my_script_filter" : {'
              . '                    "type" : "predicate_token_filter",'
              . '                    "script" : {'
              . '                        "source" : "token.getTerm().length() > 5"  \<1>'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e20493a20d3992a97238b87c6930f08d
     * Line: 49
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL49_e20493a20d3992a97238b87c6930f08d()
    {
        $client = $this->getClient();
        // tag::e20493a20d3992a97238b87c6930f08d[]
        // TODO -- Implement Example
        // POST /condition_example/_analyze
        // {
        //   "analyzer" : "my_analyzer",
        //   "text" : "What Flapdoodle"
        // }
        // end::e20493a20d3992a97238b87c6930f08d[]

        $curl = 'POST /condition_example/_analyze'
              . '{'
              . '  "analyzer" : "my_analyzer",'
              . '  "text" : "What Flapdoodle"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
