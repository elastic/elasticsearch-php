<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: StemmerOverrideTokenfilter
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/tokenfilters/stemmer-override-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class StemmerOverrideTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  8995e7cf49c4d870aea334645b70ed13
     * Line: 22
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL22_8995e7cf49c4d870aea334645b70ed13()
    {
        $client = $this->getClient();
        // tag::8995e7cf49c4d870aea334645b70ed13[]
        // TODO -- Implement Example
        // PUT /my_index
        // {
        //     "settings": {
        //         "analysis" : {
        //             "analyzer" : {
        //                 "my_analyzer" : {
        //                     "tokenizer" : "standard",
        //                     "filter" : ["lowercase", "custom_stems", "porter_stem"]
        //                 }
        //             },
        //             "filter" : {
        //                 "custom_stems" : {
        //                     "type" : "stemmer_override",
        //                     "rules_path" : "analysis/stemmer_override.txt"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::8995e7cf49c4d870aea334645b70ed13[]

        $curl = 'PUT /my_index'
              . '{'
              . '    "settings": {'
              . '        "analysis" : {'
              . '            "analyzer" : {'
              . '                "my_analyzer" : {'
              . '                    "tokenizer" : "standard",'
              . '                    "filter" : ["lowercase", "custom_stems", "porter_stem"]'
              . '                }'
              . '            },'
              . '            "filter" : {'
              . '                "custom_stems" : {'
              . '                    "type" : "stemmer_override",'
              . '                    "rules_path" : "analysis/stemmer_override.txt"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  35e24a98b35cadd0b1b370ada79249e1
     * Line: 55
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL55_35e24a98b35cadd0b1b370ada79249e1()
    {
        $client = $this->getClient();
        // tag::35e24a98b35cadd0b1b370ada79249e1[]
        // TODO -- Implement Example
        // PUT /my_index
        // {
        //     "settings": {
        //         "analysis" : {
        //             "analyzer" : {
        //                 "my_analyzer" : {
        //                     "tokenizer" : "standard",
        //                     "filter" : ["lowercase", "custom_stems", "porter_stem"]
        //                 }
        //             },
        //             "filter" : {
        //                 "custom_stems" : {
        //                     "type" : "stemmer_override",
        //                     "rules" : [
        //                         "running => run",
        //                         "stemmer => stemmer"
        //                     ]
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::35e24a98b35cadd0b1b370ada79249e1[]

        $curl = 'PUT /my_index'
              . '{'
              . '    "settings": {'
              . '        "analysis" : {'
              . '            "analyzer" : {'
              . '                "my_analyzer" : {'
              . '                    "tokenizer" : "standard",'
              . '                    "filter" : ["lowercase", "custom_stems", "porter_stem"]'
              . '                }'
              . '            },'
              . '            "filter" : {'
              . '                "custom_stems" : {'
              . '                    "type" : "stemmer_override",'
              . '                    "rules" : ['
              . '                        "running => run",'
              . '                        "stemmer => stemmer"'
              . '                    ]'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
