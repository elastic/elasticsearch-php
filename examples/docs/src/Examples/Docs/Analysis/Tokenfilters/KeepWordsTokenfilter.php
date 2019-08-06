<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: KeepWordsTokenfilter
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/tokenfilters/keep-words-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class KeepWordsTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  44cb20732770bb9a5f114a7517db774f
     * Line: 22
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL22_44cb20732770bb9a5f114a7517db774f()
    {
        $client = $this->getClient();
        // tag::44cb20732770bb9a5f114a7517db774f[]
        // TODO -- Implement Example
        // PUT /keep_words_example
        // {
        //     "settings" : {
        //         "analysis" : {
        //             "analyzer" : {
        //                 "example_1" : {
        //                     "tokenizer" : "standard",
        //                     "filter" : ["lowercase", "words_till_three"]
        //                 },
        //                 "example_2" : {
        //                     "tokenizer" : "standard",
        //                     "filter" : ["lowercase", "words_in_file"]
        //                 }
        //             },
        //             "filter" : {
        //                 "words_till_three" : {
        //                     "type" : "keep",
        //                     "keep_words" : [ "one", "two", "three"]
        //                 },
        //                 "words_in_file" : {
        //                     "type" : "keep",
        //                     "keep_words_path" : "analysis/example_word_list.txt"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::44cb20732770bb9a5f114a7517db774f[]

        $curl = 'PUT /keep_words_example'
              . '{'
              . '    "settings" : {'
              . '        "analysis" : {'
              . '            "analyzer" : {'
              . '                "example_1" : {'
              . '                    "tokenizer" : "standard",'
              . '                    "filter" : ["lowercase", "words_till_three"]'
              . '                },'
              . '                "example_2" : {'
              . '                    "tokenizer" : "standard",'
              . '                    "filter" : ["lowercase", "words_in_file"]'
              . '                }'
              . '            },'
              . '            "filter" : {'
              . '                "words_till_three" : {'
              . '                    "type" : "keep",'
              . '                    "keep_words" : [ "one", "two", "three"]'
              . '                },'
              . '                "words_in_file" : {'
              . '                    "type" : "keep",'
              . '                    "keep_words_path" : "analysis/example_word_list.txt"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
