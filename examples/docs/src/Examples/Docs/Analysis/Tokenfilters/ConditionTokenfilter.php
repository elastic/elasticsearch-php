<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ConditionTokenfilter
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/tokenfilters/condition-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ConditionTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  59fd7082698a6b12d028105456016a66
     * Line: 22
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL22_59fd7082698a6b12d028105456016a66()
    {
        $client = $this->getClient();
        // tag::59fd7082698a6b12d028105456016a66[]
        // TODO -- Implement Example
        // PUT /condition_example
        // {
        //     "settings" : {
        //         "analysis" : {
        //             "analyzer" : {
        //                 "my_analyzer" : {
        //                     "tokenizer" : "standard",
        //                     "filter" : [ "my_condition" ]
        //                 }
        //             },
        //             "filter" : {
        //                 "my_condition" : {
        //                     "type" : "condition",
        //                     "filter" : [ "lowercase" ],
        //                     "script" : {
        //                         "source" : "token.getTerm().length() < 5"  \<1>
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::59fd7082698a6b12d028105456016a66[]

        $curl = 'PUT /condition_example'
              . '{'
              . '    "settings" : {'
              . '        "analysis" : {'
              . '            "analyzer" : {'
              . '                "my_analyzer" : {'
              . '                    "tokenizer" : "standard",'
              . '                    "filter" : [ "my_condition" ]'
              . '                }'
              . '            },'
              . '            "filter" : {'
              . '                "my_condition" : {'
              . '                    "type" : "condition",'
              . '                    "filter" : [ "lowercase" ],'
              . '                    "script" : {'
              . '                        "source" : "token.getTerm().length() < 5"  \<1>'
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
     * Line: 54
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL54_e20493a20d3992a97238b87c6930f08d()
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
