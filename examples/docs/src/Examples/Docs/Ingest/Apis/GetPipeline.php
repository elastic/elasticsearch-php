<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ingest\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetPipeline
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ingest/apis/get-pipeline.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetPipeline extends SimpleExamplesTester {

    /**
     * Tag:  375bd91eeb64a865c49352ef0c745a0a
     * Line: 28
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL28_375bd91eeb64a865c49352ef0c745a0a()
    {
        $client = $this->getClient();
        // tag::375bd91eeb64a865c49352ef0c745a0a[]
        // TODO -- Implement Example
        // GET _ingest/pipeline/my-pipeline-id
        // end::375bd91eeb64a865c49352ef0c745a0a[]

        $curl = 'GET _ingest/pipeline/my-pipeline-id';

        // TODO -- make assertion
    }

    /**
     * Tag:  8fc926f8c03c4a03afee543370d92f66
     * Line: 69
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL69_8fc926f8c03c4a03afee543370d92f66()
    {
        $client = $this->getClient();
        // tag::8fc926f8c03c4a03afee543370d92f66[]
        // TODO -- Implement Example
        // PUT _ingest/pipeline/my-pipeline-id
        // {
        //   "description" : "describe pipeline",
        //   "version" : 123,
        //   "processors" : [
        //     {
        //       "set" : {
        //         "field": "foo",
        //         "value": "bar"
        //       }
        //     }
        //   ]
        // }
        // end::8fc926f8c03c4a03afee543370d92f66[]

        $curl = 'PUT _ingest/pipeline/my-pipeline-id'
              . '{'
              . '  "description" : "describe pipeline",'
              . '  "version" : 123,'
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

    /**
     * Tag:  9f549bb400b6cc1523b00d60bc8fd8e1
     * Line: 91
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL91_9f549bb400b6cc1523b00d60bc8fd8e1()
    {
        $client = $this->getClient();
        // tag::9f549bb400b6cc1523b00d60bc8fd8e1[]
        // TODO -- Implement Example
        // GET /_ingest/pipeline/my-pipeline-id?filter_path=*.version
        // end::9f549bb400b6cc1523b00d60bc8fd8e1[]

        $curl = 'GET /_ingest/pipeline/my-pipeline-id?filter_path=*.version';

        // TODO -- make assertion
    }

// %__METHOD__%




}
