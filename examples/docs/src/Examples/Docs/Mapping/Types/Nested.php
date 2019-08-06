<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Nested
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/types/nested.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Nested extends SimpleExamplesTester {

    /**
     * Tag:  8baccd8688a6bad1749b8935f9601ea4
     * Line: 19
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL19_8baccd8688a6bad1749b8935f9601ea4()
    {
        $client = $this->getClient();
        // tag::8baccd8688a6bad1749b8935f9601ea4[]
        // TODO -- Implement Example
        // PUT my_index/_doc/1
        // {
        //   "group" : "fans",
        //   "user" : [ \<1>
        //     {
        //       "first" : "John",
        //       "last" :  "Smith"
        //     },
        //     {
        //       "first" : "Alice",
        //       "last" :  "White"
        //     }
        //   ]
        // }
        // end::8baccd8688a6bad1749b8935f9601ea4[]

        $curl = 'PUT my_index/_doc/1'
              . '{'
              . '  "group" : "fans",'
              . '  "user" : [ \<1>'
              . '    {'
              . '      "first" : "John",'
              . '      "last" :  "Smith"'
              . '    },'
              . '    {'
              . '      "first" : "Alice",'
              . '      "last" :  "White"'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b214942b938e47f2c486e523546cb574
     * Line: 55
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL55_b214942b938e47f2c486e523546cb574()
    {
        $client = $this->getClient();
        // tag::b214942b938e47f2c486e523546cb574[]
        // TODO -- Implement Example
        // GET my_index/_search
        // {
        //   "query": {
        //     "bool": {
        //       "must": [
        //         { "match": { "user.first": "Alice" }},
        //         { "match": { "user.last":  "Smith" }}
        //       ]
        //     }
        //   }
        // }
        // end::b214942b938e47f2c486e523546cb574[]

        $curl = 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "bool": {'
              . '      "must": ['
              . '        { "match": { "user.first": "Alice" }},'
              . '        { "match": { "user.last":  "Smith" }}'
              . '      ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b919f88e6f47a40d5793479440a90ba6
     * Line: 81
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL81_b919f88e6f47a40d5793479440a90ba6()
    {
        $client = $this->getClient();
        // tag::b919f88e6f47a40d5793479440a90ba6[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "user": {
        //         "type": "nested" \<1>
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //   "group" : "fans",
        //   "user" : [
        //     {
        //       "first" : "John",
        //       "last" :  "Smith"
        //     },
        //     {
        //       "first" : "Alice",
        //       "last" :  "White"
        //     }
        //   ]
        // }
        // GET my_index/_search
        // {
        //   "query": {
        //     "nested": {
        //       "path": "user",
        //       "query": {
        //         "bool": {
        //           "must": [
        //             { "match": { "user.first": "Alice" }},
        //             { "match": { "user.last":  "Smith" }} \<2>
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // GET my_index/_search
        // {
        //   "query": {
        //     "nested": {
        //       "path": "user",
        //       "query": {
        //         "bool": {
        //           "must": [
        //             { "match": { "user.first": "Alice" }},
        //             { "match": { "user.last":  "White" }} \<3>
        //           ]
        //         }
        //       },
        //       "inner_hits": { \<4>
        //         "highlight": {
        //           "fields": {
        //             "user.first": {}
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::b919f88e6f47a40d5793479440a90ba6[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "user": {'
              . '        "type": "nested" \<1>'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "group" : "fans",'
              . '  "user" : ['
              . '    {'
              . '      "first" : "John",'
              . '      "last" :  "Smith"'
              . '    },'
              . '    {'
              . '      "first" : "Alice",'
              . '      "last" :  "White"'
              . '    }'
              . '  ]'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "nested": {'
              . '      "path": "user",'
              . '      "query": {'
              . '        "bool": {'
              . '          "must": ['
              . '            { "match": { "user.first": "Alice" }},'
              . '            { "match": { "user.last":  "Smith" }} \<2>'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "nested": {'
              . '      "path": "user",'
              . '      "query": {'
              . '        "bool": {'
              . '          "must": ['
              . '            { "match": { "user.first": "Alice" }},'
              . '            { "match": { "user.last":  "White" }} \<3>'
              . '          ]'
              . '        }'
              . '      },'
              . '      "inner_hits": { \<4>'
              . '        "highlight": {'
              . '          "fields": {'
              . '            "user.first": {}'
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
