<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: LimitTokenCountTokenfilter
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/tokenfilters/limit-token-count-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class LimitTokenCountTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  fdd46bdb2b0b0b5f8e7e502291496db8
     * Line: 20
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL20_fdd46bdb2b0b0b5f8e7e502291496db8()
    {
        $client = $this->getClient();
        // tag::fdd46bdb2b0b0b5f8e7e502291496db8[]
        // TODO -- Implement Example
        // PUT /limit_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "limit_example": {
        //           "type": "custom",
        //           "tokenizer": "standard",
        //           "filter": ["lowercase", "five_token_limit"]
        //         }
        //       },
        //       "filter": {
        //         "five_token_limit": {
        //           "type": "limit",
        //           "max_token_count": 5
        //         }
        //       }
        //     }
        //   }
        // }
        // end::fdd46bdb2b0b0b5f8e7e502291496db8[]

        $curl = 'PUT /limit_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "limit_example": {'
              . '          "type": "custom",'
              . '          "tokenizer": "standard",'
              . '          "filter": ["lowercase", "five_token_limit"]'
              . '        }'
              . '      },'
              . '      "filter": {'
              . '        "five_token_limit": {'
              . '          "type": "limit",'
              . '          "max_token_count": 5'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
