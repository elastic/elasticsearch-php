<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Scripting;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Engine
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   scripting/engine.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Engine extends SimpleExamplesTester {

    /**
     * Tag:  d9de409a4a197ce7cbe3714e07155d34
     * Line: 28
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL28_d9de409a4a197ce7cbe3714e07155d34()
    {
        $client = $this->getClient();
        // tag::d9de409a4a197ce7cbe3714e07155d34[]
        // TODO -- Implement Example
        // POST /_search
        // {
        //   "query": {
        //     "function_score": {
        //       "query": {
        //         "match": {
        //           "body": "foo"
        //         }
        //       },
        //       "functions": [
        //         {
        //           "script_score": {
        //             "script": {
        //                 "source": "pure_df",
        //                 "lang" : "expert_scripts",
        //                 "params": {
        //                     "field": "body",
        //                     "term": "foo"
        //                 }
        //             }
        //           }
        //         }
        //       ]
        //     }
        //   }
        // }
        // end::d9de409a4a197ce7cbe3714e07155d34[]

        $curl = 'POST /_search'
              . '{'
              . '  "query": {'
              . '    "function_score": {'
              . '      "query": {'
              . '        "match": {'
              . '          "body": "foo"'
              . '        }'
              . '      },'
              . '      "functions": ['
              . '        {'
              . '          "script_score": {'
              . '            "script": {'
              . '                "source": "pure_df",'
              . '                "lang" : "expert_scripts",'
              . '                "params": {'
              . '                    "field": "body",'
              . '                    "term": "foo"'
              . '                }'
              . '            }'
              . '          }'
              . '        }'
              . '      ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
