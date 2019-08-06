<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ingest\Processors;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Pipeline
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   ingest/processors/pipeline.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Pipeline extends SimpleExamplesTester {

    /**
     * Tag:  8494d09c39e109a012094eb9d6ec52ac
     * Line: 29
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL29_8494d09c39e109a012094eb9d6ec52ac()
    {
        $client = $this->getClient();
        // tag::8494d09c39e109a012094eb9d6ec52ac[]
        // TODO -- Implement Example
        // PUT _ingest/pipeline/pipelineA
        // {
        //   "description" : "inner pipeline",
        //   "processors" : [
        //     {
        //       "set" : {
        //         "field": "inner_pipeline_set",
        //         "value": "inner"
        //       }
        //     }
        //   ]
        // }
        // end::8494d09c39e109a012094eb9d6ec52ac[]

        $curl = 'PUT _ingest/pipeline/pipelineA'
              . '{'
              . '  "description" : "inner pipeline",'
              . '  "processors" : ['
              . '    {'
              . '      "set" : {'
              . '        "field": "inner_pipeline_set",'
              . '        "value": "inner"'
              . '      }'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  02c48d461536709c3fc8a0e8147c3787
     * Line: 48
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL48_02c48d461536709c3fc8a0e8147c3787()
    {
        $client = $this->getClient();
        // tag::02c48d461536709c3fc8a0e8147c3787[]
        // TODO -- Implement Example
        // PUT _ingest/pipeline/pipelineB
        // {
        //   "description" : "outer pipeline",
        //   "processors" : [
        //     {
        //       "pipeline" : {
        //         "name": "pipelineA"
        //       }
        //     },
        //     {
        //       "set" : {
        //         "field": "outer_pipeline_set",
        //         "value": "outer"
        //       }
        //     }
        //   ]
        // }
        // end::02c48d461536709c3fc8a0e8147c3787[]

        $curl = 'PUT _ingest/pipeline/pipelineB'
              . '{'
              . '  "description" : "outer pipeline",'
              . '  "processors" : ['
              . '    {'
              . '      "pipeline" : {'
              . '        "name": "pipelineA"'
              . '      }'
              . '    },'
              . '    {'
              . '      "set" : {'
              . '        "field": "outer_pipeline_set",'
              . '        "value": "outer"'
              . '      }'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  88647e818ffcbe39e5cf627f5b9a676c
     * Line: 74
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL74_88647e818ffcbe39e5cf627f5b9a676c()
    {
        $client = $this->getClient();
        // tag::88647e818ffcbe39e5cf627f5b9a676c[]
        // TODO -- Implement Example
        // PUT /myindex/_doc/1?pipeline=pipelineB
        // {
        //   "field": "value"
        // }
        // end::88647e818ffcbe39e5cf627f5b9a676c[]

        $curl = 'PUT /myindex/_doc/1?pipeline=pipelineB'
              . '{'
              . '  "field": "value"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
