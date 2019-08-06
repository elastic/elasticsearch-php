<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ScriptQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/script-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ScriptQuery extends SimpleExamplesTester {

    /**
     * Tag:  b3aa46565d98f8a6750c571bb1c1bb8c
     * Line: 15
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL15_b3aa46565d98f8a6750c571bb1c1bb8c()
    {
        $client = $this->getClient();
        // tag::b3aa46565d98f8a6750c571bb1c1bb8c[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "bool" : {
        //             "filter" : {
        //                 "script" : {
        //                     "script" : {
        //                         "source": "doc[\'num1\'].value > 1",
        //                         "lang": "painless"
        //                      }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::b3aa46565d98f8a6750c571bb1c1bb8c[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "filter" : {'
              . '                "script" : {'
              . '                    "script" : {'
              . '                        "source": "doc[\'num1\'].value > 1",'
              . '                        "lang": "painless"'
              . '                     }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c4459f98de5decb37b8c403885f4b226
     * Line: 53
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL53_c4459f98de5decb37b8c403885f4b226()
    {
        $client = $this->getClient();
        // tag::c4459f98de5decb37b8c403885f4b226[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "bool" : {
        //             "filter" : {
        //                 "script" : {
        //                     "script" : {
        //                         "source" : "doc[\'num1\'].value > params.param1",
        //                         "lang"   : "painless",
        //                         "params" : {
        //                             "param1" : 5
        //                         }
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::c4459f98de5decb37b8c403885f4b226[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "filter" : {'
              . '                "script" : {'
              . '                    "script" : {'
              . '                        "source" : "doc[\'num1\'].value > params.param1",'
              . '                        "lang"   : "painless",'
              . '                        "params" : {'
              . '                            "param1" : 5'
              . '                        }'
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
