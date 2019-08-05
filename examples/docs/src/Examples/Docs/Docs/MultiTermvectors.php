<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MultiTermvectors
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   docs/multi-termvectors.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MultiTermvectors extends SimpleExamplesTester {

    /**
     * Tag:  c6d18f08822463356b297f238c6650d9
     * Line: 14
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL14_c6d18f08822463356b297f238c6650d9()
    {
        $client = $this->getClient();
        // tag::c6d18f08822463356b297f238c6650d9[]
        // TODO -- Implement Example
        // POST /_mtermvectors
        // {
        //    "docs": [
        //       {
        //          "_index": "twitter",
        //          "_id": "2",
        //          "term_statistics": true
        //       },
        //       {
        //          "_index": "twitter",
        //          "_id": "1",
        //          "fields": [
        //             "message"
        //          ]
        //       }
        //    ]
        // }
        // end::c6d18f08822463356b297f238c6650d9[]

        $curl = 'POST /_mtermvectors'
              . '{'
              . '   "docs": ['
              . '      {'
              . '         "_index": "twitter",'
              . '         "_id": "2",'
              . '         "term_statistics": true'
              . '      },'
              . '      {'
              . '         "_index": "twitter",'
              . '         "_id": "1",'
              . '         "fields": ['
              . '            "message"'
              . '         ]'
              . '      }'
              . '   ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2c8638acc208bd0a47403c1f054fde21
     * Line: 42
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL42_2c8638acc208bd0a47403c1f054fde21()
    {
        $client = $this->getClient();
        // tag::2c8638acc208bd0a47403c1f054fde21[]
        // TODO -- Implement Example
        // POST /twitter/_mtermvectors
        // {
        //    "docs": [
        //       {
        //          "_id": "2",
        //          "fields": [
        //             "message"
        //          ],
        //          "term_statistics": true
        //       },
        //       {
        //          "_id": "1"
        //       }
        //    ]
        // }
        // end::2c8638acc208bd0a47403c1f054fde21[]

        $curl = 'POST /twitter/_mtermvectors'
              . '{'
              . '   "docs": ['
              . '      {'
              . '         "_id": "2",'
              . '         "fields": ['
              . '            "message"'
              . '         ],'
              . '         "term_statistics": true'
              . '      },'
              . '      {'
              . '         "_id": "1"'
              . '      }'
              . '   ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f31eea58baf0dbd39823ff9100c9ce28
     * Line: 65
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL65_f31eea58baf0dbd39823ff9100c9ce28()
    {
        $client = $this->getClient();
        // tag::f31eea58baf0dbd39823ff9100c9ce28[]
        // TODO -- Implement Example
        // POST /twitter/_mtermvectors
        // {
        //     "ids" : ["1", "2"],
        //     "parameters": {
        //     	"fields": [
        //          	"message"
        //       	],
        //       	"term_statistics": true
        //     }
        // }
        // end::f31eea58baf0dbd39823ff9100c9ce28[]

        $curl = 'POST /twitter/_mtermvectors'
              . '{'
              . '    "ids" : ["1", "2"],'
              . '    "parameters": {'
              . '    	"fields": ['
              . '         	"message"'
              . '      	],'
              . '      	"term_statistics": true'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  29840a67fdc13cd329ca2c69a2303e83
     * Line: 85
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL85_29840a67fdc13cd329ca2c69a2303e83()
    {
        $client = $this->getClient();
        // tag::29840a67fdc13cd329ca2c69a2303e83[]
        // TODO -- Implement Example
        // POST /_mtermvectors
        // {
        //    "docs": [
        //       {
        //          "_index": "twitter",
        //          "doc" : {
        //             "user" : "John Doe",
        //             "message" : "twitter test test test"
        //          }
        //       },
        //       {
        //          "_index": "twitter",
        //          "doc" : {
        //            "user" : "Jane Doe",
        //            "message" : "Another twitter test ..."
        //          }
        //       }
        //    ]
        // }
        // end::29840a67fdc13cd329ca2c69a2303e83[]

        $curl = 'POST /_mtermvectors'
              . '{'
              . '   "docs": ['
              . '      {'
              . '         "_index": "twitter",'
              . '         "doc" : {'
              . '            "user" : "John Doe",'
              . '            "message" : "twitter test test test"'
              . '         }'
              . '      },'
              . '      {'
              . '         "_index": "twitter",'
              . '         "doc" : {'
              . '           "user" : "Jane Doe",'
              . '           "message" : "Another twitter test ..."'
              . '         }'
              . '      }'
              . '   ]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
