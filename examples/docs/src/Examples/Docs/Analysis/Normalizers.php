<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Normalizers
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/normalizers.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Normalizers extends SimpleExamplesTester {

    /**
     * Tag:  966ff3a4c5b61ed1a36d44c17ce06157
     * Line: 25
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL25_966ff3a4c5b61ed1a36d44c17ce06157()
    {
        $client = $this->getClient();
        // tag::966ff3a4c5b61ed1a36d44c17ce06157[]
        // TODO -- Implement Example
        // PUT index
        // {
        //   "settings": {
        //     "analysis": {
        //       "char_filter": {
        //         "quote": {
        //           "type": "mapping",
        //           "mappings": [
        //             "« => \"",
        //             "» => \""
        //           ]
        //         }
        //       },
        //       "normalizer": {
        //         "my_normalizer": {
        //           "type": "custom",
        //           "char_filter": ["quote"],
        //           "filter": ["lowercase", "asciifolding"]
        //         }
        //       }
        //     }
        //   },
        //   "mappings": {
        //     "properties": {
        //       "foo": {
        //         "type": "keyword",
        //         "normalizer": "my_normalizer"
        //       }
        //     }
        //   }
        // }
        // end::966ff3a4c5b61ed1a36d44c17ce06157[]

        $curl = 'PUT index'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "char_filter": {'
              . '        "quote": {'
              . '          "type": "mapping",'
              . '          "mappings": ['
              . '            "« => \"",'
              . '            "» => \""'
              . '          ]'
              . '        }'
              . '      },'
              . '      "normalizer": {'
              . '        "my_normalizer": {'
              . '          "type": "custom",'
              . '          "char_filter": ["quote"],'
              . '          "filter": ["lowercase", "asciifolding"]'
              . '        }'
              . '      }'
              . '    }'
              . '  },'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "foo": {'
              . '        "type": "keyword",'
              . '        "normalizer": "my_normalizer"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
