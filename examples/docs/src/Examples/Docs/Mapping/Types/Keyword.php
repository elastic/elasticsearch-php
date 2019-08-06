<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Keyword
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/types/keyword.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Keyword extends SimpleExamplesTester {

    /**
     * Tag:  46c4b0dfb674825f9579203d41e7f404
     * Line: 20
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL20_46c4b0dfb674825f9579203d41e7f404()
    {
        $client = $this->getClient();
        // tag::46c4b0dfb674825f9579203d41e7f404[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "tags": {
        //         "type":  "keyword"
        //       }
        //     }
        //   }
        // }
        // end::46c4b0dfb674825f9579203d41e7f404[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "tags": {'
              . '        "type":  "keyword"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
