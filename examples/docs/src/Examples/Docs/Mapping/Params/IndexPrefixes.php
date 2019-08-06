<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: IndexPrefixes
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/params/index-prefixes.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class IndexPrefixes extends SimpleExamplesTester {

    /**
     * Tag:  ff5d15a265855b1c11cb20ceef6a1b58
     * Line: 21
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL21_ff5d15a265855b1c11cb20ceef6a1b58()
    {
        $client = $this->getClient();
        // tag::ff5d15a265855b1c11cb20ceef6a1b58[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "body_text": {
        //         "type": "text",
        //         "index_prefixes": { }    \<1>
        //       }
        //     }
        //   }
        // }
        // end::ff5d15a265855b1c11cb20ceef6a1b58[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "body_text": {'
              . '        "type": "text",'
              . '        "index_prefixes": { }    \<1>'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b19ec4a20c19082e5c40e3b1f28bfbcb
     * Line: 42
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL42_b19ec4a20c19082e5c40e3b1f28bfbcb()
    {
        $client = $this->getClient();
        // tag::b19ec4a20c19082e5c40e3b1f28bfbcb[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "full_name": {
        //         "type": "text",
        //         "index_prefixes": {
        //           "min_chars" : 1,
        //           "max_chars" : 10
        //         }
        //       }
        //     }
        //   }
        // }
        // end::b19ec4a20c19082e5c40e3b1f28bfbcb[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "full_name": {'
              . '        "type": "text",'
              . '        "index_prefixes": {'
              . '          "min_chars" : 1,'
              . '          "max_chars" : 10'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
