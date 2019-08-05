<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Properties
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/params/properties.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Properties extends SimpleExamplesTester {

    /**
     * Tag:  241df3bb0c16b4bd53ee569a45539184
     * Line: 17
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL17_241df3bb0c16b4bd53ee569a45539184()
    {
        $client = $this->getClient();
        // tag::241df3bb0c16b4bd53ee569a45539184[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": { \<1>
        //       "manager": {
        //         "properties": { \<2>
        //           "age":  { "type": "integer" },
        //           "name": { "type": "text"  }
        //         }
        //       },
        //       "employees": {
        //         "type": "nested",
        //         "properties": { \<3>
        //           "age":  { "type": "integer" },
        //           "name": { "type": "text"  }
        //         }
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1 \<4>
        // {
        //   "region": "US",
        //   "manager": {
        //     "name": "Alice White",
        //     "age": 30
        //   },
        //   "employees": [
        //     {
        //       "name": "John Smith",
        //       "age": 34
        //     },
        //     {
        //       "name": "Peter Brown",
        //       "age": 26
        //     }
        //   ]
        // }
        // end::241df3bb0c16b4bd53ee569a45539184[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": { \<1>'
              . '      "manager": {'
              . '        "properties": { \<2>'
              . '          "age":  { "type": "integer" },'
              . '          "name": { "type": "text"  }'
              . '        }'
              . '      },'
              . '      "employees": {'
              . '        "type": "nested",'
              . '        "properties": { \<3>'
              . '          "age":  { "type": "integer" },'
              . '          "name": { "type": "text"  }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1 \<4>'
              . '{'
              . '  "region": "US",'
              . '  "manager": {'
              . '    "name": "Alice White",'
              . '    "age": 30'
              . '  },'
              . '  "employees": ['
              . '    {'
              . '      "name": "John Smith",'
              . '      "age": 34'
              . '    },'
              . '    {'
              . '      "name": "Peter Brown",'
              . '      "age": 26'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7f21b09b9306a03491ddcf0355f33860
     * Line: 74
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL74_7f21b09b9306a03491ddcf0355f33860()
    {
        $client = $this->getClient();
        // tag::7f21b09b9306a03491ddcf0355f33860[]
        // TODO -- Implement Example
        // GET my_index/_search
        // {
        //   "query": {
        //     "match": {
        //       "manager.name": "Alice White"
        //     }
        //   },
        //   "aggs": {
        //     "Employees": {
        //       "nested": {
        //         "path": "employees"
        //       },
        //       "aggs": {
        //         "Employee Ages": {
        //           "histogram": {
        //             "field": "employees.age",
        //             "interval": 5
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::7f21b09b9306a03491ddcf0355f33860[]

        $curl = 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "match": {'
              . '      "manager.name": "Alice White"'
              . '    }'
              . '  },'
              . '  "aggs": {'
              . '    "Employees": {'
              . '      "nested": {'
              . '        "path": "employees"'
              . '      },'
              . '      "aggs": {'
              . '        "Employee Ages": {'
              . '          "histogram": {'
              . '            "field": "employees.age",'
              . '            "interval": 5'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
