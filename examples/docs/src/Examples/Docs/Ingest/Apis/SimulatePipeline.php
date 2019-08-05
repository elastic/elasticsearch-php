<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ingest\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SimulatePipeline
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ingest/apis/simulate-pipeline.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SimulatePipeline extends SimpleExamplesTester {

    /**
     * Tag:  68168bb8190037f0c1ea1254f5f5e5a0
     * Line: 50
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL50_68168bb8190037f0c1ea1254f5f5e5a0()
    {
        $client = $this->getClient();
        // tag::68168bb8190037f0c1ea1254f5f5e5a0[]
        // TODO -- Implement Example
        // POST _ingest/pipeline/_simulate
        // {
        //   "pipeline" :
        //   {
        //     "description": "_description",
        //     "processors": [
        //       {
        //         "set" : {
        //           "field" : "field2",
        //           "value" : "_value"
        //         }
        //       }
        //     ]
        //   },
        //   "docs": [
        //     {
        //       "_index": "index",
        //       "_id": "id",
        //       "_source": {
        //         "foo": "bar"
        //       }
        //     },
        //     {
        //       "_index": "index",
        //       "_id": "id",
        //       "_source": {
        //         "foo": "rab"
        //       }
        //     }
        //   ]
        // }
        // end::68168bb8190037f0c1ea1254f5f5e5a0[]

        $curl = 'POST _ingest/pipeline/_simulate'
              . '{'
              . '  "pipeline" :'
              . '  {'
              . '    "description": "_description",'
              . '    "processors": ['
              . '      {'
              . '        "set" : {'
              . '          "field" : "field2",'
              . '          "value" : "_value"'
              . '        }'
              . '      }'
              . '    ]'
              . '  },'
              . '  "docs": ['
              . '    {'
              . '      "_index": "index",'
              . '      "_id": "id",'
              . '      "_source": {'
              . '        "foo": "bar"'
              . '      }'
              . '    },'
              . '    {'
              . '      "_index": "index",'
              . '      "_id": "id",'
              . '      "_source": {'
              . '        "foo": "rab"'
              . '      }'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6ee061e58bf07bd6a678d210811e2000
     * Line: 135
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL135_6ee061e58bf07bd6a678d210811e2000()
    {
        $client = $this->getClient();
        // tag::6ee061e58bf07bd6a678d210811e2000[]
        // TODO -- Implement Example
        // POST _ingest/pipeline/_simulate?verbose
        // {
        //   "pipeline" :
        //   {
        //     "description": "_description",
        //     "processors": [
        //       {
        //         "set" : {
        //           "field" : "field2",
        //           "value" : "_value2"
        //         }
        //       },
        //       {
        //         "set" : {
        //           "field" : "field3",
        //           "value" : "_value3"
        //         }
        //       }
        //     ]
        //   },
        //   "docs": [
        //     {
        //       "_index": "index",
        //       "_id": "id",
        //       "_source": {
        //         "foo": "bar"
        //       }
        //     },
        //     {
        //       "_index": "index",
        //       "_id": "id",
        //       "_source": {
        //         "foo": "rab"
        //       }
        //     }
        //   ]
        // }
        // end::6ee061e58bf07bd6a678d210811e2000[]

        $curl = 'POST _ingest/pipeline/_simulate?verbose'
              . '{'
              . '  "pipeline" :'
              . '  {'
              . '    "description": "_description",'
              . '    "processors": ['
              . '      {'
              . '        "set" : {'
              . '          "field" : "field2",'
              . '          "value" : "_value2"'
              . '        }'
              . '      },'
              . '      {'
              . '        "set" : {'
              . '          "field" : "field3",'
              . '          "value" : "_value3"'
              . '        }'
              . '      }'
              . '    ]'
              . '  },'
              . '  "docs": ['
              . '    {'
              . '      "_index": "index",'
              . '      "_id": "id",'
              . '      "_source": {'
              . '        "foo": "bar"'
              . '      }'
              . '    },'
              . '    {'
              . '      "_index": "index",'
              . '      "_id": "id",'
              . '      "_source": {'
              . '        "foo": "rab"'
              . '      }'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
