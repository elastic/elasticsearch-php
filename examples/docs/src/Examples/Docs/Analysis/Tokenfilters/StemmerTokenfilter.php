<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: StemmerTokenfilter
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/tokenfilters/stemmer-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class StemmerTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  1ca618e7d72ec73c1064fa6eae3086d1
     * Line: 14
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL14_1ca618e7d72ec73c1064fa6eae3086d1()
    {
        $client = $this->getClient();
        // tag::1ca618e7d72ec73c1064fa6eae3086d1[]
        // TODO -- Implement Example
        // PUT /my_index
        // {
        //     "settings": {
        //         "analysis" : {
        //             "analyzer" : {
        //                 "my_analyzer" : {
        //                     "tokenizer" : "standard",
        //                     "filter" : ["lowercase", "my_stemmer"]
        //                 }
        //             },
        //             "filter" : {
        //                 "my_stemmer" : {
        //                     "type" : "stemmer",
        //                     "name" : "light_german"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::1ca618e7d72ec73c1064fa6eae3086d1[]

        $curl = 'PUT /my_index'
              . '{'
              . '    "settings": {'
              . '        "analysis" : {'
              . '            "analyzer" : {'
              . '                "my_analyzer" : {'
              . '                    "tokenizer" : "standard",'
              . '                    "filter" : ["lowercase", "my_stemmer"]'
              . '                }'
              . '            },'
              . '            "filter" : {'
              . '                "my_stemmer" : {'
              . '                    "type" : "stemmer",'
              . '                    "name" : "light_german"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
