<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: InnerHits
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/request/inner-hits.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class InnerHits extends SimpleExamplesTester {

    /**
     * Tag:  2a91e1fb8ad93a188fa9d77ec01bc431
     * Line: 87
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL87_2a91e1fb8ad93a188fa9d77ec01bc431()
    {
        $client = $this->getClient();
        // tag::2a91e1fb8ad93a188fa9d77ec01bc431[]
        // TODO -- Implement Example
        // PUT test
        // {
        //   "mappings": {
        //     "properties": {
        //       "comments": {
        //         "type": "nested"
        //       }
        //     }
        //   }
        // }
        // PUT test/_doc/1?refresh
        // {
        //   "title": "Test title",
        //   "comments": [
        //     {
        //       "author": "kimchy",
        //       "number": 1
        //     },
        //     {
        //       "author": "nik9000",
        //       "number": 2
        //     }
        //   ]
        // }
        // POST test/_search
        // {
        //   "query": {
        //     "nested": {
        //       "path": "comments",
        //       "query": {
        //         "match": {"comments.number" : 2}
        //       },
        //       "inner_hits": {} \<1>
        //     }
        //   }
        // }
        // end::2a91e1fb8ad93a188fa9d77ec01bc431[]

        $curl = 'PUT test'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "comments": {'
              . '        "type": "nested"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT test/_doc/1?refresh'
              . '{'
              . '  "title": "Test title",'
              . '  "comments": ['
              . '    {'
              . '      "author": "kimchy",'
              . '      "number": 1'
              . '    },'
              . '    {'
              . '      "author": "nik9000",'
              . '      "number": 2'
              . '    }'
              . '  ]'
              . '}'
              . 'POST test/_search'
              . '{'
              . '  "query": {'
              . '    "nested": {'
              . '      "path": "comments",'
              . '      "query": {'
              . '        "match": {"comments.number" : 2}'
              . '      },'
              . '      "inner_hits": {} \<1>'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  983fbb78e57e8fe98db38cf2d217e943
     * Line: 211
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL211_983fbb78e57e8fe98db38cf2d217e943()
    {
        $client = $this->getClient();
        // tag::983fbb78e57e8fe98db38cf2d217e943[]
        // TODO -- Implement Example
        // PUT test
        // {
        //   "mappings": {
        //     "properties": {
        //       "comments": {
        //         "type": "nested"
        //       }
        //     }
        //   }
        // }
        // PUT test/_doc/1?refresh
        // {
        //   "title": "Test title",
        //   "comments": [
        //     {
        //       "author": "kimchy",
        //       "text": "comment text"
        //     },
        //     {
        //       "author": "nik9000",
        //       "text": "words words words"
        //     }
        //   ]
        // }
        // POST test/_search
        // {
        //   "query": {
        //     "nested": {
        //       "path": "comments",
        //       "query": {
        //         "match": {"comments.text" : "words"}
        //       },
        //       "inner_hits": {
        //         "_source" : false,
        //         "docvalue_fields" : [
        //           "comments.text.keyword"
        //         ]
        //       }
        //     }
        //   }
        // }
        // end::983fbb78e57e8fe98db38cf2d217e943[]

        $curl = 'PUT test'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "comments": {'
              . '        "type": "nested"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT test/_doc/1?refresh'
              . '{'
              . '  "title": "Test title",'
              . '  "comments": ['
              . '    {'
              . '      "author": "kimchy",'
              . '      "text": "comment text"'
              . '    },'
              . '    {'
              . '      "author": "nik9000",'
              . '      "text": "words words words"'
              . '    }'
              . '  ]'
              . '}'
              . 'POST test/_search'
              . '{'
              . '  "query": {'
              . '    "nested": {'
              . '      "path": "comments",'
              . '      "query": {'
              . '        "match": {"comments.text" : "words"}'
              . '      },'
              . '      "inner_hits": {'
              . '        "_source" : false,'
              . '        "docvalue_fields" : ['
              . '          "comments.text.keyword"'
              . '        ]'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  79feb4a0c0a21b7015a52f9736cd4683
     * Line: 325
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL325_79feb4a0c0a21b7015a52f9736cd4683()
    {
        $client = $this->getClient();
        // tag::79feb4a0c0a21b7015a52f9736cd4683[]
        // TODO -- Implement Example
        // PUT test
        // {
        //   "mappings": {
        //     "properties": {
        //       "comments": {
        //         "type": "nested",
        //         "properties": {
        //           "votes": {
        //             "type": "nested"
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // PUT test/_doc/1?refresh
        // {
        //   "title": "Test title",
        //   "comments": [
        //     {
        //       "author": "kimchy",
        //       "text": "comment text",
        //       "votes": []
        //     },
        //     {
        //       "author": "nik9000",
        //       "text": "words words words",
        //       "votes": [
        //         {"value": 1 , "voter": "kimchy"},
        //         {"value": -1, "voter": "other"}
        //       ]
        //     }
        //   ]
        // }
        // POST test/_search
        // {
        //   "query": {
        //     "nested": {
        //       "path": "comments.votes",
        //         "query": {
        //           "match": {
        //             "comments.votes.voter": "kimchy"
        //           }
        //         },
        //         "inner_hits" : {}
        //     }
        //   }
        // }
        // end::79feb4a0c0a21b7015a52f9736cd4683[]

        $curl = 'PUT test'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "comments": {'
              . '        "type": "nested",'
              . '        "properties": {'
              . '          "votes": {'
              . '            "type": "nested"'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT test/_doc/1?refresh'
              . '{'
              . '  "title": "Test title",'
              . '  "comments": ['
              . '    {'
              . '      "author": "kimchy",'
              . '      "text": "comment text",'
              . '      "votes": []'
              . '    },'
              . '    {'
              . '      "author": "nik9000",'
              . '      "text": "words words words",'
              . '      "votes": ['
              . '        {"value": 1 , "voter": "kimchy"},'
              . '        {"value": -1, "voter": "other"}'
              . '      ]'
              . '    }'
              . '  ]'
              . '}'
              . 'POST test/_search'
              . '{'
              . '  "query": {'
              . '    "nested": {'
              . '      "path": "comments.votes",'
              . '        "query": {'
              . '          "match": {'
              . '            "comments.votes.voter": "kimchy"'
              . '          }'
              . '        },'
              . '        "inner_hits" : {}'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3f5b5bee692e7d4b0992dc0a64e95a60
     * Line: 445
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL445_3f5b5bee692e7d4b0992dc0a64e95a60()
    {
        $client = $this->getClient();
        // tag::3f5b5bee692e7d4b0992dc0a64e95a60[]
        // TODO -- Implement Example
        // PUT test
        // {
        //   "mappings": {
        //     "properties": {
        //       "my_join_field": {
        //         "type": "join",
        //         "relations": {
        //           "my_parent": "my_child"
        //         }
        //       }
        //     }
        //   }
        // }
        // PUT test/_doc/1?refresh
        // {
        //   "number": 1,
        //   "my_join_field": "my_parent"
        // }
        // PUT test/_doc/2?routing=1&refresh
        // {
        //   "number": 1,
        //   "my_join_field": {
        //     "name": "my_child",
        //     "parent": "1"
        //   }
        // }
        // POST test/_search
        // {
        //   "query": {
        //     "has_child": {
        //       "type": "my_child",
        //       "query": {
        //         "match": {
        //           "number": 1
        //         }
        //       },
        //       "inner_hits": {}    \<1>
        //     }
        //   }
        // }
        // end::3f5b5bee692e7d4b0992dc0a64e95a60[]

        $curl = 'PUT test'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "my_join_field": {'
              . '        "type": "join",'
              . '        "relations": {'
              . '          "my_parent": "my_child"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT test/_doc/1?refresh'
              . '{'
              . '  "number": 1,'
              . '  "my_join_field": "my_parent"'
              . '}'
              . 'PUT test/_doc/2?routing=1&refresh'
              . '{'
              . '  "number": 1,'
              . '  "my_join_field": {'
              . '    "name": "my_child",'
              . '    "parent": "1"'
              . '  }'
              . '}'
              . 'POST test/_search'
              . '{'
              . '  "query": {'
              . '    "has_child": {'
              . '      "type": "my_child",'
              . '      "query": {'
              . '        "match": {'
              . '          "number": 1'
              . '        }'
              . '      },'
              . '      "inner_hits": {}    \<1>'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
