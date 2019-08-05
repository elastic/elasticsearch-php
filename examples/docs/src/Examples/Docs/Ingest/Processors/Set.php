<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ingest\Processors;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Set
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ingest/processors/set.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Set extends SimpleExamplesTester {

    /**
     * Tag:  366b29ef910f12c7fbced35f39000953
     * Line: 32
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL32_366b29ef910f12c7fbced35f39000953()
    {
        $client = $this->getClient();
        // tag::366b29ef910f12c7fbced35f39000953[]
        // TODO -- Implement Example
        // PUT _ingest/pipeline/set_os
        // {
        //   "description": "sets the value of host.os.name from the field os",
        //   "processors": [
        //     {
        //       "set": {
        //         "field": "host.os.name",
        //         "value": "{{os}}"
        //       }
        //     }
        //   ]
        // }
        // POST _ingest/pipeline/set_os/_simulate
        // {
        //   "docs": [
        //     {
        //       "_source": {
        //         "os": "Ubuntu"
        //       }
        //     }
        //   ]
        // }
        // end::366b29ef910f12c7fbced35f39000953[]

        $curl = 'PUT _ingest/pipeline/set_os'
              . '{'
              . '  "description": "sets the value of host.os.name from the field os",'
              . '  "processors": ['
              . '    {'
              . '      "set": {'
              . '        "field": "host.os.name",'
              . '        "value": "{{os}}"'
              . '      }'
              . '    }'
              . '  ]'
              . '}'
              . 'POST _ingest/pipeline/set_os/_simulate'
              . '{'
              . '  "docs": ['
              . '    {'
              . '      "_source": {'
              . '        "os": "Ubuntu"'
              . '      }'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
