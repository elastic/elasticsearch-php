<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Redirects
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   redirects.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Redirects extends SimpleExamplesTester {

    /**
     * Tag:  4ab6d3ed4f4422cee8a590040a579be5
     * Line: 408
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL408_4ab6d3ed4f4422cee8a590040a579be5()
    {
        $client = $this->getClient();
        // tag::4ab6d3ed4f4422cee8a590040a579be5[]
        // TODO -- Implement Example
        // GET _search
        // {
        //   "query": {
        //     "bool": {
        //       "must": {
        //         "match": {
        //           "text": "quick brown fox"
        //         }
        //       },
        //       "filter": {
        //         "term": {
        //           "status": "published"
        //         }
        //       }
        //     }
        //   }
        // }
        // end::4ab6d3ed4f4422cee8a590040a579be5[]

        $curl = 'GET _search'
              . '{'
              . '  "query": {'
              . '    "bool": {'
              . '      "must": {'
              . '        "match": {'
              . '          "text": "quick brown fox"'
              . '        }'
              . '      },'
              . '      "filter": {'
              . '        "term": {'
              . '          "status": "published"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
