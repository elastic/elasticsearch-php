<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: TokenCount
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/types/token-count.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class TokenCount extends SimpleExamplesTester {

    /**
     * Tag:  98c3d643f71c1fd71238ebb748e846e7
     * Line: 14
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL14_98c3d643f71c1fd71238ebb748e846e7()
    {
        $client = $this->getClient();
        // tag::98c3d643f71c1fd71238ebb748e846e7[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "name": { \<1>
        //         "type": "text",
        //         "fields": {
        //           "length": { \<2>
        //             "type":     "token_count",
        //             "analyzer": "standard"
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1
        // { "name": "John Smith" }
        // PUT my_index/_doc/2
        // { "name": "Rachel Alice Williams" }
        // GET my_index/_search
        // {
        //   "query": {
        //     "term": {
        //       "name.length": 3 \<3>
        //     }
        //   }
        // }
        // end::98c3d643f71c1fd71238ebb748e846e7[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "name": { \<1>'
              . '        "type": "text",'
              . '        "fields": {'
              . '          "length": { \<2>'
              . '            "type":     "token_count",'
              . '            "analyzer": "standard"'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{ "name": "John Smith" }'
              . 'PUT my_index/_doc/2'
              . '{ "name": "Rachel Alice Williams" }'
              . 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "term": {'
              . '      "name.length": 3 \<3>'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
