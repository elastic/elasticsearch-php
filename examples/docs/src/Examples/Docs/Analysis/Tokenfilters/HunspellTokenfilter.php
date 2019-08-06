<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: HunspellTokenfilter
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/tokenfilters/hunspell-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class HunspellTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  0af002734dd884f9385da6c3a4ca87a1
     * Line: 44
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL44_0af002734dd884f9385da6c3a4ca87a1()
    {
        $client = $this->getClient();
        // tag::0af002734dd884f9385da6c3a4ca87a1[]
        // TODO -- Implement Example
        // PUT /hunspell_example
        // {
        //     "settings": {
        //         "analysis" : {
        //             "analyzer" : {
        //                 "en" : {
        //                     "tokenizer" : "standard",
        //                     "filter" : [ "lowercase", "en_US" ]
        //                 }
        //             },
        //             "filter" : {
        //                 "en_US" : {
        //                     "type" : "hunspell",
        //                     "locale" : "en_US",
        //                     "dedup" : true
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::0af002734dd884f9385da6c3a4ca87a1[]

        $curl = 'PUT /hunspell_example'
              . '{'
              . '    "settings": {'
              . '        "analysis" : {'
              . '            "analyzer" : {'
              . '                "en" : {'
              . '                    "tokenizer" : "standard",'
              . '                    "filter" : [ "lowercase", "en_US" ]'
              . '                }'
              . '            },'
              . '            "filter" : {'
              . '                "en_US" : {'
              . '                    "type" : "hunspell",'
              . '                    "locale" : "en_US",'
              . '                    "dedup" : true'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
