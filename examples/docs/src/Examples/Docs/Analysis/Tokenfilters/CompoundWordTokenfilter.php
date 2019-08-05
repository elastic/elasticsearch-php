<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: CompoundWordTokenfilter
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/tokenfilters/compound-word-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class CompoundWordTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  349e77cfe54f857ccfdde0e47c2d7cd5
     * Line: 86
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL86_349e77cfe54f857ccfdde0e47c2d7cd5()
    {
        $client = $this->getClient();
        // tag::349e77cfe54f857ccfdde0e47c2d7cd5[]
        // TODO -- Implement Example
        // PUT /compound_word_example
        // {
        //     "settings": {
        //         "index": {
        //             "analysis": {
        //                 "analyzer": {
        //                     "my_analyzer": {
        //                         "type": "custom",
        //                         "tokenizer": "standard",
        //                         "filter": ["dictionary_decompounder", "hyphenation_decompounder"]
        //                     }
        //                 },
        //                 "filter": {
        //                     "dictionary_decompounder": {
        //                         "type": "dictionary_decompounder",
        //                         "word_list": ["one", "two", "three"]
        //                     },
        //                     "hyphenation_decompounder": {
        //                         "type" : "hyphenation_decompounder",
        //                         "word_list_path": "analysis/example_word_list.txt",
        //                         "hyphenation_patterns_path": "analysis/hyphenation_patterns.xml",
        //                         "max_subword_size": 22
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::349e77cfe54f857ccfdde0e47c2d7cd5[]

        $curl = 'PUT /compound_word_example'
              . '{'
              . '    "settings": {'
              . '        "index": {'
              . '            "analysis": {'
              . '                "analyzer": {'
              . '                    "my_analyzer": {'
              . '                        "type": "custom",'
              . '                        "tokenizer": "standard",'
              . '                        "filter": ["dictionary_decompounder", "hyphenation_decompounder"]'
              . '                    }'
              . '                },'
              . '                "filter": {'
              . '                    "dictionary_decompounder": {'
              . '                        "type": "dictionary_decompounder",'
              . '                        "word_list": ["one", "two", "three"]'
              . '                    },'
              . '                    "hyphenation_decompounder": {'
              . '                        "type" : "hyphenation_decompounder",'
              . '                        "word_list_path": "analysis/example_word_list.txt",'
              . '                        "hyphenation_patterns_path": "analysis/hyphenation_patterns.xml",'
              . '                        "max_subword_size": 22'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
