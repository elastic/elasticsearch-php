<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ingest\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PutPipeline
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   ingest/apis/put-pipeline.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PutPipeline extends SimpleExamplesTester {

    /**
     * Tag:  e7e28812b86c5257bf48931d131409f0
     * Line: 7
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL7_e7e28812b86c5257bf48931d131409f0()
    {
        $client = $this->getClient();
        // tag::e7e28812b86c5257bf48931d131409f0[]
        // TODO -- Implement Example
        // PUT _ingest/pipeline/my-pipeline-id
        // {
        //   "description" : "describe pipeline",
        //   "processors" : [
        //     {
        //       "set" : {
        //         "field": "foo",
        //         "value": "bar"
        //       }
        //     }
        //   ]
        // }
        // end::e7e28812b86c5257bf48931d131409f0[]

        $curl = 'PUT _ingest/pipeline/my-pipeline-id'
              . '{'
              . '  "description" : "describe pipeline",'
              . '  "processors" : ['
              . '    {'
              . '      "set" : {'
              . '        "field": "foo",'
              . '        "value": "bar"'
              . '      }'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
