<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SnowballTokenfilter
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/tokenfilters/snowball-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SnowballTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  e776311ef67c972f322b669dc4ab9926
     * Line: 14
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL14_e776311ef67c972f322b669dc4ab9926()
    {
        $client = $this->getClient();
        // tag::e776311ef67c972f322b669dc4ab9926[]
        // TODO -- Implement Example
        // PUT /my_index
        // {
        //     "settings": {
        //         "analysis" : {
        //             "analyzer" : {
        //                 "my_analyzer" : {
        //                     "tokenizer" : "standard",
        //                     "filter" : ["lowercase", "my_snow"]
        //                 }
        //             },
        //             "filter" : {
        //                 "my_snow" : {
        //                     "type" : "snowball",
        //                     "language" : "Lovins"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::e776311ef67c972f322b669dc4ab9926[]

        $curl = 'PUT /my_index'
              . '{'
              . '    "settings": {'
              . '        "analysis" : {'
              . '            "analyzer" : {'
              . '                "my_analyzer" : {'
              . '                    "tokenizer" : "standard",'
              . '                    "filter" : ["lowercase", "my_snow"]'
              . '                }'
              . '            },'
              . '            "filter" : {'
              . '                "my_snow" : {'
              . '                    "type" : "snowball",'
              . '                    "language" : "Lovins"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
