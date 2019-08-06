<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Ingest
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ingest.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Ingest extends SimpleExamplesTester {

    /**
     * Tag:  55704b69b03239fe13293fc7622d27da
     * Line: 32
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL32_55704b69b03239fe13293fc7622d27da()
    {
        $client = $this->getClient();
        // tag::55704b69b03239fe13293fc7622d27da[]
        // TODO -- Implement Example
        // PUT _ingest/pipeline/my_pipeline_id
        // {
        //   "description" : "describe pipeline",
        //   "processors" : [
        //     {
        //       "set" : {
        //         "field": "foo",
        //         "value": "new"
        //       }
        //     }
        //   ]
        // }
        // end::55704b69b03239fe13293fc7622d27da[]

        $curl = 'PUT _ingest/pipeline/my_pipeline_id'
              . '{'
              . '  "description" : "describe pipeline",'
              . '  "processors" : ['
              . '    {'
              . '      "set" : {'
              . '        "field": "foo",'
              . '        "value": "new"'
              . '      }'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6f3a4b4a01b6fae193897f00cb4855d0
     * Line: 52
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL52_6f3a4b4a01b6fae193897f00cb4855d0()
    {
        $client = $this->getClient();
        // tag::6f3a4b4a01b6fae193897f00cb4855d0[]
        // TODO -- Implement Example
        // PUT my-index/_doc/my-id?pipeline=my_pipeline_id
        // {
        //   "foo": "bar"
        // }
        // end::6f3a4b4a01b6fae193897f00cb4855d0[]

        $curl = 'PUT my-index/_doc/my-id?pipeline=my_pipeline_id'
              . '{'
              . '  "foo": "bar"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
