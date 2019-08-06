<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Suggesters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Misc
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/suggesters/misc.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Misc extends SimpleExamplesTester {

    /**
     * Tag:  e194e9cbe3eb2305f4f7cdda0cf529bd
     * Line: 10
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL10_e194e9cbe3eb2305f4f7cdda0cf529bd()
    {
        $client = $this->getClient();
        // tag::e194e9cbe3eb2305f4f7cdda0cf529bd[]
        // TODO -- Implement Example
        // POST _search?typed_keys
        // {
        //   "suggest": {
        //     "text" : "some test mssage",
        //     "my-first-suggester" : {
        //       "term" : {
        //         "field" : "message"
        //       }
        //     },
        //     "my-second-suggester" : {
        //       "phrase" : {
        //         "field" : "message"
        //       }
        //     }
        //   }
        // }
        // end::e194e9cbe3eb2305f4f7cdda0cf529bd[]

        $curl = 'POST _search?typed_keys'
              . '{'
              . '  "suggest": {'
              . '    "text" : "some test mssage",'
              . '    "my-first-suggester" : {'
              . '      "term" : {'
              . '        "field" : "message"'
              . '      }'
              . '    },'
              . '    "my-second-suggester" : {'
              . '      "phrase" : {'
              . '        "field" : "message"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
