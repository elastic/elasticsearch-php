<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: AsciifoldingTokenfilter
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/tokenfilters/asciifolding-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class AsciifoldingTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  0d4cb64eca426ac03110fdfd01367ee9
     * Line: 10
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL10_0d4cb64eca426ac03110fdfd01367ee9()
    {
        $client = $this->getClient();
        // tag::0d4cb64eca426ac03110fdfd01367ee9[]
        // TODO -- Implement Example
        // PUT /asciifold_example
        // {
        //     "settings" : {
        //         "analysis" : {
        //             "analyzer" : {
        //                 "default" : {
        //                     "tokenizer" : "standard",
        //                     "filter" : ["asciifolding"]
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::0d4cb64eca426ac03110fdfd01367ee9[]

        $curl = 'PUT /asciifold_example'
              . '{'
              . '    "settings" : {'
              . '        "analysis" : {'
              . '            "analyzer" : {'
              . '                "default" : {'
              . '                    "tokenizer" : "standard",'
              . '                    "filter" : ["asciifolding"]'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f0609100be8e9eb4af6cbc75d0c40ebe
     * Line: 32
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL32_f0609100be8e9eb4af6cbc75d0c40ebe()
    {
        $client = $this->getClient();
        // tag::f0609100be8e9eb4af6cbc75d0c40ebe[]
        // TODO -- Implement Example
        // PUT /asciifold_example
        // {
        //     "settings" : {
        //         "analysis" : {
        //             "analyzer" : {
        //                 "default" : {
        //                     "tokenizer" : "standard",
        //                     "filter" : ["my_ascii_folding"]
        //                 }
        //             },
        //             "filter" : {
        //                 "my_ascii_folding" : {
        //                     "type" : "asciifolding",
        //                     "preserve_original" : true
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::f0609100be8e9eb4af6cbc75d0c40ebe[]

        $curl = 'PUT /asciifold_example'
              . '{'
              . '    "settings" : {'
              . '        "analysis" : {'
              . '            "analyzer" : {'
              . '                "default" : {'
              . '                    "tokenizer" : "standard",'
              . '                    "filter" : ["my_ascii_folding"]'
              . '                }'
              . '            },'
              . '            "filter" : {'
              . '                "my_ascii_folding" : {'
              . '                    "type" : "asciifolding",'
              . '                    "preserve_original" : true'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
