<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Analyzers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SimpleAnalyzer
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/analyzers/simple-analyzer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SimpleAnalyzer extends SimpleExamplesTester {

    /**
     * Tag:  1ea24f67fbbb6293d53caf2fe0c4b984
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_1ea24f67fbbb6293d53caf2fe0c4b984()
    {
        $client = $this->getClient();
        // tag::1ea24f67fbbb6293d53caf2fe0c4b984[]
        // TODO -- Implement Example
        // POST _analyze
        // {
        //   "analyzer": "simple",
        //   "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog's bone."
        // }
        // end::1ea24f67fbbb6293d53caf2fe0c4b984[]

        $curl = 'POST _analyze'
              . '{'
              . '  "analyzer": "simple",'
              . '  "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog's bone."'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  432ab6ff7cfe06988dda436907218cc5
     * Line: 137
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL137_432ab6ff7cfe06988dda436907218cc5()
    {
        $client = $this->getClient();
        // tag::432ab6ff7cfe06988dda436907218cc5[]
        // TODO -- Implement Example
        // PUT /simple_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "rebuilt_simple": {
        //           "tokenizer": "lowercase",
        //           "filter": [         \<1>
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::432ab6ff7cfe06988dda436907218cc5[]

        $curl = 'PUT /simple_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "rebuilt_simple": {'
              . '          "tokenizer": "lowercase",'
              . '          "filter": [         \<1>'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
