<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: LowercaseTokenfilter
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/tokenfilters/lowercase-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class LowercaseTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  5be6349f5da1a7a5658df1d7fdf542db
     * Line: 12
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL12_5be6349f5da1a7a5658df1d7fdf542db()
    {
        $client = $this->getClient();
        // tag::5be6349f5da1a7a5658df1d7fdf542db[]
        // TODO -- Implement Example
        // PUT /lowercase_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "standard_lowercase_example": {
        //           "type": "custom",
        //           "tokenizer": "standard",
        //           "filter": ["lowercase"]
        //         },
        //         "greek_lowercase_example": {
        //           "type": "custom",
        //           "tokenizer": "standard",
        //           "filter": ["greek_lowercase"]
        //         }
        //       },
        //       "filter": {
        //         "greek_lowercase": {
        //           "type": "lowercase",
        //           "language": "greek"
        //         }
        //       }
        //     }
        //   }
        // }
        // end::5be6349f5da1a7a5658df1d7fdf542db[]

        $curl = 'PUT /lowercase_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "standard_lowercase_example": {'
              . '          "type": "custom",'
              . '          "tokenizer": "standard",'
              . '          "filter": ["lowercase"]'
              . '        },'
              . '        "greek_lowercase_example": {'
              . '          "type": "custom",'
              . '          "tokenizer": "standard",'
              . '          "filter": ["greek_lowercase"]'
              . '        }'
              . '      },'
              . '      "filter": {'
              . '        "greek_lowercase": {'
              . '          "type": "lowercase",'
              . '          "language": "greek"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
