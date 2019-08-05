<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Date
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/types/date.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Date extends SimpleExamplesTester {

    /**
     * Tag:  645136747d37368a14ab34de8bd046c6
     * Line: 35
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL35_645136747d37368a14ab34de8bd046c6()
    {
        $client = $this->getClient();
        // tag::645136747d37368a14ab34de8bd046c6[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "date": {
        //         "type": "date" \<1>
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1
        // { "date": "2015-01-01" } \<2>
        // PUT my_index/_doc/2
        // { "date": "2015-01-01T12:10:30Z" } \<3>
        // PUT my_index/_doc/3
        // { "date": 1420070400001 } \<4>
        // GET my_index/_search
        // {
        //   "sort": { "date": "asc"} \<5>
        // }
        // end::645136747d37368a14ab34de8bd046c6[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "date": {'
              . '        "type": "date" \<1>'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{ "date": "2015-01-01" } \<2>'
              . 'PUT my_index/_doc/2'
              . '{ "date": "2015-01-01T12:10:30Z" } \<3>'
              . 'PUT my_index/_doc/3'
              . '{ "date": 1420070400001 } \<4>'
              . 'GET my_index/_search'
              . '{'
              . '  "sort": { "date": "asc"} \<5>'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e2a042c629429855c3bcaefffb26b7fa
     * Line: 77
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL77_e2a042c629429855c3bcaefffb26b7fa()
    {
        $client = $this->getClient();
        // tag::e2a042c629429855c3bcaefffb26b7fa[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "date": {
        //         "type":   "date",
        //         "format": "yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis"
        //       }
        //     }
        //   }
        // }
        // end::e2a042c629429855c3bcaefffb26b7fa[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "date": {'
              . '        "type":   "date",'
              . '        "format": "yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
