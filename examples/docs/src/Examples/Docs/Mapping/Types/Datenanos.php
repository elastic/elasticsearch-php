<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Datenanos
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/types/date_nanos.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Datenanos extends SimpleExamplesTester {

    /**
     * Tag:  14dc06a4c28ffdc1f9dde97dc6838c1e
     * Line: 32
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL32_14dc06a4c28ffdc1f9dde97dc6838c1e()
    {
        $client = $this->getClient();
        // tag::14dc06a4c28ffdc1f9dde97dc6838c1e[]
        // TODO -- Implement Example
        // PUT my_index?include_type_name=true
        // {
        //   "mappings": {
        //     "_doc": {
        //       "properties": {
        //         "date": {
        //           "type": "date_nanos" \<1>
        //         }
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1
        // { "date": "2015-01-01" } \<2>
        // PUT my_index/_doc/2
        // { "date": "2015-01-01T12:10:30.123456789Z" } \<3>
        // PUT my_index/_doc/3
        // { "date": 1420070400 } \<4>
        // GET my_index/_search
        // {
        //   "sort": { "date": "asc"} \<5>
        // }
        // GET my_index/_search
        // {
        //   "script_fields" : {
        //     "my_field" : {
        //       "script" : {
        //         "lang" : "painless",
        //         "source" : "doc[\'date\'].date.nanos" \<6>
        //       }
        //     }
        //   }
        // }
        // GET my_index/_search
        // {
        //   "docvalue_fields" : [
        //     {
        //       "field" : "my_ip_field",
        //       "format": "strict_date_time" \<7>
        //     }
        //   ]
        // }
        // end::14dc06a4c28ffdc1f9dde97dc6838c1e[]

        $curl = 'PUT my_index?include_type_name=true'
              . '{'
              . '  "mappings": {'
              . '    "_doc": {'
              . '      "properties": {'
              . '        "date": {'
              . '          "type": "date_nanos" \<1>'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{ "date": "2015-01-01" } \<2>'
              . 'PUT my_index/_doc/2'
              . '{ "date": "2015-01-01T12:10:30.123456789Z" } \<3>'
              . 'PUT my_index/_doc/3'
              . '{ "date": 1420070400 } \<4>'
              . 'GET my_index/_search'
              . '{'
              . '  "sort": { "date": "asc"} \<5>'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "script_fields" : {'
              . '    "my_field" : {'
              . '      "script" : {'
              . '        "lang" : "painless",'
              . '        "source" : "doc[\'date\'].date.nanos" \<6>'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "docvalue_fields" : ['
              . '    {'
              . '      "field" : "my_ip_field",'
              . '      "format": "strict_date_time" \<7>'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
