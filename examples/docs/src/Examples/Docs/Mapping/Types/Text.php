<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Text
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/types/text.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Text extends SimpleExamplesTester {

    /**
     * Tag:  24ea1c6cdf10165228951e562b7ec0ef
     * Line: 22
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL22_24ea1c6cdf10165228951e562b7ec0ef()
    {
        $client = $this->getClient();
        // tag::24ea1c6cdf10165228951e562b7ec0ef[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "full_name": {
        //         "type":  "text"
        //       }
        //     }
        //   }
        // }
        // end::24ea1c6cdf10165228951e562b7ec0ef[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "full_name": {'
              . '        "type":  "text"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
