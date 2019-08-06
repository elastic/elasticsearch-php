<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ingest\Processors;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DateIndexName
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   ingest/processors/date-index-name.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DateIndexName extends SimpleExamplesTester {

    /**
     * Tag:  83c8cce0372677857609a2e80e8eb1c4
     * Line: 20
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL20_83c8cce0372677857609a2e80e8eb1c4()
    {
        $client = $this->getClient();
        // tag::83c8cce0372677857609a2e80e8eb1c4[]
        // TODO -- Implement Example
        // PUT _ingest/pipeline/monthlyindex
        // {
        //   "description": "monthly date-time index naming",
        //   "processors" : [
        //     {
        //       "date_index_name" : {
        //         "field" : "date1",
        //         "index_name_prefix" : "myindex-",
        //         "date_rounding" : "M"
        //       }
        //     }
        //   ]
        // }
        // end::83c8cce0372677857609a2e80e8eb1c4[]

        $curl = 'PUT _ingest/pipeline/monthlyindex'
              . '{'
              . '  "description": "monthly date-time index naming",'
              . '  "processors" : ['
              . '    {'
              . '      "date_index_name" : {'
              . '        "field" : "date1",'
              . '        "index_name_prefix" : "myindex-",'
              . '        "date_rounding" : "M"'
              . '      }'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9f3f1b6bd431f6fa40fc17ce9a5a89b8
     * Line: 41
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL41_9f3f1b6bd431f6fa40fc17ce9a5a89b8()
    {
        $client = $this->getClient();
        // tag::9f3f1b6bd431f6fa40fc17ce9a5a89b8[]
        // TODO -- Implement Example
        // PUT /myindex/_doc/1?pipeline=monthlyindex
        // {
        //   "date1" : "2016-04-25T12:02:01.789Z"
        // }
        // end::9f3f1b6bd431f6fa40fc17ce9a5a89b8[]

        $curl = 'PUT /myindex/_doc/1?pipeline=monthlyindex'
              . '{'
              . '  "date1" : "2016-04-25T12:02:01.789Z"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  44f672df54c28327070b4ca09999718c
     * Line: 78
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL78_44f672df54c28327070b4ca09999718c()
    {
        $client = $this->getClient();
        // tag::44f672df54c28327070b4ca09999718c[]
        // TODO -- Implement Example
        // POST _ingest/pipeline/_simulate
        // {
        //   "pipeline" :
        //   {
        //     "description": "monthly date-time index naming",
        //     "processors" : [
        //       {
        //         "date_index_name" : {
        //           "field" : "date1",
        //           "index_name_prefix" : "myindex-",
        //           "date_rounding" : "M"
        //         }
        //       }
        //     ]
        //   },
        //   "docs": [
        //     {
        //       "_source": {
        //         "date1": "2016-04-25T12:02:01.789Z"
        //       }
        //     }
        //   ]
        // }
        // end::44f672df54c28327070b4ca09999718c[]

        $curl = 'POST _ingest/pipeline/_simulate'
              . '{'
              . '  "pipeline" :'
              . '  {'
              . '    "description": "monthly date-time index naming",'
              . '    "processors" : ['
              . '      {'
              . '        "date_index_name" : {'
              . '          "field" : "date1",'
              . '          "index_name_prefix" : "myindex-",'
              . '          "date_rounding" : "M"'
              . '        }'
              . '      }'
              . '    ]'
              . '  },'
              . '  "docs": ['
              . '    {'
              . '      "_source": {'
              . '        "date1": "2016-04-25T12:02:01.789Z"'
              . '      }'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
