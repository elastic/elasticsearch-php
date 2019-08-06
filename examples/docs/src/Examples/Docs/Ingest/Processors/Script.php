<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ingest\Processors;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Script
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   ingest/processors/script.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Script extends SimpleExamplesTester {

    /**
     * Tag:  c0c7926f235e6ccc7e9a827dcc85e602
     * Line: 50
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL50_c0c7926f235e6ccc7e9a827dcc85e602()
    {
        $client = $this->getClient();
        // tag::c0c7926f235e6ccc7e9a827dcc85e602[]
        // TODO -- Implement Example
        // PUT _ingest/pipeline/my_index
        // {
        //     "description": "use index:my_index and type:_doc",
        //     "processors": [
        //       {
        //         "script": {
        //           "source": """
        //             ctx._index = \'my_index\';
        //             ctx._type = \'_doc\';
        //           """
        //         }
        //       }
        //     ]
        // }
        // end::c0c7926f235e6ccc7e9a827dcc85e602[]

        $curl = 'PUT _ingest/pipeline/my_index'
              . '{'
              . '    "description": "use index:my_index and type:_doc",'
              . '    "processors": ['
              . '      {'
              . '        "script": {'
              . '          "source": """'
              . '            ctx._index = \'my_index\';'
              . '            ctx._type = \'_doc\';'
              . '          """'
              . '        }'
              . '      }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  cdc55ad88de55999fe2d79fd4781918b
     * Line: 71
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL71_cdc55ad88de55999fe2d79fd4781918b()
    {
        $client = $this->getClient();
        // tag::cdc55ad88de55999fe2d79fd4781918b[]
        // TODO -- Implement Example
        // PUT any_index/_doc/1?pipeline=my_index
        // {
        //   "message": "text"
        // }
        // end::cdc55ad88de55999fe2d79fd4781918b[]

        $curl = 'PUT any_index/_doc/1?pipeline=my_index'
              . '{'
              . '  "message": "text"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
