<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Analysis
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Analysis extends SimpleExamplesTester {

    /**
     * Tag:  7ffee3c2a5581994fc0ea59dd106d39f
     * Line: 41
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL41_7ffee3c2a5581994fc0ea59dd106d39f()
    {
        $client = $this->getClient();
        // tag::7ffee3c2a5581994fc0ea59dd106d39f[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "title": {
        //         "type":     "text",
        //         "analyzer": "standard"
        //       }
        //     }
        //   }
        // }
        // end::7ffee3c2a5581994fc0ea59dd106d39f[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "title": {'
              . '        "type":     "text",'
              . '        "analyzer": "standard"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
