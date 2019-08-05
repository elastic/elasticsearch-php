<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ElisionTokenfilter
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/tokenfilters/elision-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ElisionTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  c0fa4f18231d7495c39b62bb4e56fe50
     * Line: 15
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL15_c0fa4f18231d7495c39b62bb4e56fe50()
    {
        $client = $this->getClient();
        // tag::c0fa4f18231d7495c39b62bb4e56fe50[]
        // TODO -- Implement Example
        // PUT /elision_example
        // {
        //     "settings" : {
        //         "analysis" : {
        //             "analyzer" : {
        //                 "default" : {
        //                     "tokenizer" : "standard",
        //                     "filter" : ["elision"]
        //                 }
        //             },
        //             "filter" : {
        //                 "elision" : {
        //                     "type" : "elision",
        //                     "articles_case": true,
        //                     "articles" : ["l", "m", "t", "qu", "n", "s", "j"]
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::c0fa4f18231d7495c39b62bb4e56fe50[]

        $curl = 'PUT /elision_example'
              . '{'
              . '    "settings" : {'
              . '        "analysis" : {'
              . '            "analyzer" : {'
              . '                "default" : {'
              . '                    "tokenizer" : "standard",'
              . '                    "filter" : ["elision"]'
              . '                }'
              . '            },'
              . '            "filter" : {'
              . '                "elision" : {'
              . '                    "type" : "elision",'
              . '                    "articles_case": true,'
              . '                    "articles" : ["l", "m", "t", "qu", "n", "s", "j"]'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
