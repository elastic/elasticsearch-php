<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: CjkBigramTokenfilter
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/tokenfilters/cjk-bigram-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class CjkBigramTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  4a40ccf6b1a0090da8d8033b435b5b7d
     * Line: 18
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL18_4a40ccf6b1a0090da8d8033b435b5b7d()
    {
        $client = $this->getClient();
        // tag::4a40ccf6b1a0090da8d8033b435b5b7d[]
        // TODO -- Implement Example
        // PUT /cjk_bigram_example
        // {
        //     "settings" : {
        //         "analysis" : {
        //             "analyzer" : {
        //                 "han_bigrams" : {
        //                     "tokenizer" : "standard",
        //                     "filter" : ["han_bigrams_filter"]
        //                 }
        //             },
        //             "filter" : {
        //                 "han_bigrams_filter" : {
        //                     "type" : "cjk_bigram",
        //                     "ignored_scripts": [
        //                         "hiragana",
        //                         "katakana",
        //                         "hangul"
        //                     ],
        //                     "output_unigrams" : true
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::4a40ccf6b1a0090da8d8033b435b5b7d[]

        $curl = 'PUT /cjk_bigram_example'
              . '{'
              . '    "settings" : {'
              . '        "analysis" : {'
              . '            "analyzer" : {'
              . '                "han_bigrams" : {'
              . '                    "tokenizer" : "standard",'
              . '                    "filter" : ["han_bigrams_filter"]'
              . '                }'
              . '            },'
              . '            "filter" : {'
              . '                "han_bigrams_filter" : {'
              . '                    "type" : "cjk_bigram",'
              . '                    "ignored_scripts": ['
              . '                        "hiragana",'
              . '                        "katakana",'
              . '                        "hangul"'
              . '                    ],'
              . '                    "output_unigrams" : true'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
