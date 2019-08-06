<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Norms
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/params/norms.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Norms extends SimpleExamplesTester {

    /**
     * Tag:  f9d15004aba50331c595837c4546aeef
     * Line: 21
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL21_f9d15004aba50331c595837c4546aeef()
    {
        $client = $this->getClient();
        // tag::f9d15004aba50331c595837c4546aeef[]
        // TODO -- Implement Example
        // PUT my_index/_mapping
        // {
        //   "properties": {
        //     "title": {
        //       "type": "text",
        //       "norms": false
        //     }
        //   }
        // }
        // end::f9d15004aba50331c595837c4546aeef[]

        $curl = 'PUT my_index/_mapping'
              . '{'
              . '  "properties": {'
              . '    "title": {'
              . '      "type": "text",'
              . '      "norms": false'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
