<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Fielddata
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/params/fielddata.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Fielddata extends SimpleExamplesTester {

    /**
     * Tag:  ef9111c1648d7820925f12e07d1346c5
     * Line: 58
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL58_ef9111c1648d7820925f12e07d1346c5()
    {
        $client = $this->getClient();
        // tag::ef9111c1648d7820925f12e07d1346c5[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "my_field": { \<1>
        //         "type": "text",
        //         "fields": {
        //           "keyword": { \<2>
        //             "type": "keyword"
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::ef9111c1648d7820925f12e07d1346c5[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "my_field": { \<1>'
              . '        "type": "text",'
              . '        "fields": {'
              . '          "keyword": { \<2>'
              . '            "type": "keyword"'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a7c15fe6b5779c84ce9a34bf4b2a7ab7
     * Line: 86
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL86_a7c15fe6b5779c84ce9a34bf4b2a7ab7()
    {
        $client = $this->getClient();
        // tag::a7c15fe6b5779c84ce9a34bf4b2a7ab7[]
        // TODO -- Implement Example
        // PUT my_index/_mapping
        // {
        //   "properties": {
        //     "my_field": { \<1>
        //       "type":     "text",
        //       "fielddata": true
        //     }
        //   }
        // }
        // end::a7c15fe6b5779c84ce9a34bf4b2a7ab7[]

        $curl = 'PUT my_index/_mapping'
              . '{'
              . '  "properties": {'
              . '    "my_field": { \<1>'
              . '      "type":     "text",'
              . '      "fielddata": true'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6a81d00f0d73bc5985e76b3cadab645e
     * Line: 120
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL120_6a81d00f0d73bc5985e76b3cadab645e()
    {
        $client = $this->getClient();
        // tag::6a81d00f0d73bc5985e76b3cadab645e[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "tag": {
        //         "type": "text",
        //         "fielddata": true,
        //         "fielddata_frequency_filter": {
        //           "min": 0.001,
        //           "max": 0.1,
        //           "min_segment_size": 500
        //         }
        //       }
        //     }
        //   }
        // }
        // end::6a81d00f0d73bc5985e76b3cadab645e[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "tag": {'
              . '        "type": "text",'
              . '        "fielddata": true,'
              . '        "fielddata_frequency_filter": {'
              . '          "min": 0.001,'
              . '          "max": 0.1,'
              . '          "min_segment_size": 500'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
