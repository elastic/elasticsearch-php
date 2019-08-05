<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PutMapping
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/put-mapping.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PutMapping extends SimpleExamplesTester {

    /**
     * Tag:  bf6e261ee84680c69d46faa9ee5b2f56
     * Line: 7
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL7_bf6e261ee84680c69d46faa9ee5b2f56()
    {
        $client = $this->getClient();
        // tag::bf6e261ee84680c69d46faa9ee5b2f56[]
        // TODO -- Implement Example
        // PUT twitter \<1>
        // {}
        // PUT twitter/_mapping \<2>
        // {
        //   "properties": {
        //     "email": {
        //       "type": "keyword"
        //     }
        //   }
        // }
        // end::bf6e261ee84680c69d46faa9ee5b2f56[]

        $curl = 'PUT twitter \<1>'
              . '{}'
              . 'PUT twitter/_mapping \<2>'
              . '{'
              . '  "properties": {'
              . '    "email": {'
              . '      "type": "keyword"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  88b2e29e3251e48bfb720fa83e9eb6a3
     * Line: 37
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL37_88b2e29e3251e48bfb720fa83e9eb6a3()
    {
        $client = $this->getClient();
        // tag::88b2e29e3251e48bfb720fa83e9eb6a3[]
        // TODO -- Implement Example
        // # Create the two indices
        // PUT twitter-1
        // PUT twitter-2
        // # Update both mappings
        // PUT /twitter-1,twitter-2/_mapping \<1>
        // {
        //   "properties": {
        //     "user_name": {
        //       "type": "text"
        //     }
        //   }
        // }
        // end::88b2e29e3251e48bfb720fa83e9eb6a3[]

        $curl = '# Create the two indices'
              . 'PUT twitter-1'
              . 'PUT twitter-2'
              . '# Update both mappings'
              . 'PUT /twitter-1,twitter-2/_mapping \<1>'
              . '{'
              . '  "properties": {'
              . '    "user_name": {'
              . '      "type": "text"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9943d52ba0f75fa0eb61e944ed7cbcd9
     * Line: 70
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL70_9943d52ba0f75fa0eb61e944ed7cbcd9()
    {
        $client = $this->getClient();
        // tag::9943d52ba0f75fa0eb61e944ed7cbcd9[]
        // TODO -- Implement Example
        // PUT my_index \<1>
        // {
        //   "mappings": {
        //     "properties": {
        //       "name": {
        //         "properties": {
        //           "first": {
        //             "type": "text"
        //           }
        //         }
        //       },
        //       "user_id": {
        //         "type": "keyword"
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_mapping
        // {
        //   "properties": {
        //     "name": {
        //       "properties": {
        //         "last": { \<2>
        //           "type": "text"
        //         }
        //       }
        //     },
        //     "user_id": {
        //       "type": "keyword",
        //       "ignore_above": 100 \<3>
        //     }
        //   }
        // }
        // end::9943d52ba0f75fa0eb61e944ed7cbcd9[]

        $curl = 'PUT my_index \<1>'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "name": {'
              . '        "properties": {'
              . '          "first": {'
              . '            "type": "text"'
              . '          }'
              . '        }'
              . '      },'
              . '      "user_id": {'
              . '        "type": "keyword"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_mapping'
              . '{'
              . '  "properties": {'
              . '    "name": {'
              . '      "properties": {'
              . '        "last": { \<2>'
              . '          "type": "text"'
              . '        }'
              . '      }'
              . '    },'
              . '    "user_id": {'
              . '      "type": "keyword",'
              . '      "ignore_above": 100 \<3>'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
