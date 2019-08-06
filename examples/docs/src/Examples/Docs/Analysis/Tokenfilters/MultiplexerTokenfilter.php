<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MultiplexerTokenfilter
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/tokenfilters/multiplexer-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MultiplexerTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  c306212babadc14fa124b88fd8c43a6b
     * Line: 33
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL33_c306212babadc14fa124b88fd8c43a6b()
    {
        $client = $this->getClient();
        // tag::c306212babadc14fa124b88fd8c43a6b[]
        // TODO -- Implement Example
        // PUT /multiplexer_example
        // {
        //     "settings" : {
        //         "analysis" : {
        //             "analyzer" : {
        //                 "my_analyzer" : {
        //                     "tokenizer" : "standard",
        //                     "filter" : [ "my_multiplexer" ]
        //                 }
        //             },
        //             "filter" : {
        //                 "my_multiplexer" : {
        //                     "type" : "multiplexer",
        //                     "filters" : [ "lowercase", "lowercase, porter_stem" ]
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::c306212babadc14fa124b88fd8c43a6b[]

        $curl = 'PUT /multiplexer_example'
              . '{'
              . '    "settings" : {'
              . '        "analysis" : {'
              . '            "analyzer" : {'
              . '                "my_analyzer" : {'
              . '                    "tokenizer" : "standard",'
              . '                    "filter" : [ "my_multiplexer" ]'
              . '                }'
              . '            },'
              . '            "filter" : {'
              . '                "my_multiplexer" : {'
              . '                    "type" : "multiplexer",'
              . '                    "filters" : [ "lowercase", "lowercase, porter_stem" ]'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  fa9a3ef94470f3d9bd6500b65bf993d1
     * Line: 59
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL59_fa9a3ef94470f3d9bd6500b65bf993d1()
    {
        $client = $this->getClient();
        // tag::fa9a3ef94470f3d9bd6500b65bf993d1[]
        // TODO -- Implement Example
        // POST /multiplexer_example/_analyze
        // {
        //   "analyzer" : "my_analyzer",
        //   "text" : "Going HOME"
        // }
        // end::fa9a3ef94470f3d9bd6500b65bf993d1[]

        $curl = 'POST /multiplexer_example/_analyze'
              . '{'
              . '  "analyzer" : "my_analyzer",'
              . '  "text" : "Going HOME"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
