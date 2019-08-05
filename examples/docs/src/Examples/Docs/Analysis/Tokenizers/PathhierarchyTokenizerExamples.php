<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenizers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PathhierarchyTokenizerExamples
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/tokenizers/pathhierarchy-tokenizer-examples.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PathhierarchyTokenizerExamples extends SimpleExamplesTester {

    /**
     * Tag:  840b6c5c3d9c56aed854cfab8da04486
     * Line: 18
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL18_840b6c5c3d9c56aed854cfab8da04486()
    {
        $client = $this->getClient();
        // tag::840b6c5c3d9c56aed854cfab8da04486[]
        // TODO -- Implement Example
        // PUT file-path-test
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "custom_path_tree": {
        //           "tokenizer": "custom_hierarchy"
        //         },
        //         "custom_path_tree_reversed": {
        //           "tokenizer": "custom_hierarchy_reversed"
        //         }
        //       },
        //       "tokenizer": {
        //         "custom_hierarchy": {
        //           "type": "path_hierarchy",
        //           "delimiter": "/"
        //         },
        //         "custom_hierarchy_reversed": {
        //           "type": "path_hierarchy",
        //           "delimiter": "/",
        //           "reverse": "true"
        //         }
        //       }
        //     }
        //   },
        //   "mappings": {
        //     "properties": {
        //       "file_path": {
        //         "type": "text",
        //         "fields": {
        //           "tree": {
        //             "type": "text",
        //             "analyzer": "custom_path_tree"
        //           },
        //           "tree_reversed": {
        //             "type": "text",
        //             "analyzer": "custom_path_tree_reversed"
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // POST file-path-test/_doc/1
        // {
        //   "file_path": "/User/alice/photos/2017/05/16/my_photo1.jpg"
        // }
        // POST file-path-test/_doc/2
        // {
        //   "file_path": "/User/alice/photos/2017/05/16/my_photo2.jpg"
        // }
        // POST file-path-test/_doc/3
        // {
        //   "file_path": "/User/alice/photos/2017/05/16/my_photo3.jpg"
        // }
        // POST file-path-test/_doc/4
        // {
        //   "file_path": "/User/alice/photos/2017/05/15/my_photo1.jpg"
        // }
        // POST file-path-test/_doc/5
        // {
        //   "file_path": "/User/bob/photos/2017/05/16/my_photo1.jpg"
        // }
        // end::840b6c5c3d9c56aed854cfab8da04486[]

        $curl = 'PUT file-path-test'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "custom_path_tree": {'
              . '          "tokenizer": "custom_hierarchy"'
              . '        },'
              . '        "custom_path_tree_reversed": {'
              . '          "tokenizer": "custom_hierarchy_reversed"'
              . '        }'
              . '      },'
              . '      "tokenizer": {'
              . '        "custom_hierarchy": {'
              . '          "type": "path_hierarchy",'
              . '          "delimiter": "/"'
              . '        },'
              . '        "custom_hierarchy_reversed": {'
              . '          "type": "path_hierarchy",'
              . '          "delimiter": "/",'
              . '          "reverse": "true"'
              . '        }'
              . '      }'
              . '    }'
              . '  },'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "file_path": {'
              . '        "type": "text",'
              . '        "fields": {'
              . '          "tree": {'
              . '            "type": "text",'
              . '            "analyzer": "custom_path_tree"'
              . '          },'
              . '          "tree_reversed": {'
              . '            "type": "text",'
              . '            "analyzer": "custom_path_tree_reversed"'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST file-path-test/_doc/1'
              . '{'
              . '  "file_path": "/User/alice/photos/2017/05/16/my_photo1.jpg"'
              . '}'
              . 'POST file-path-test/_doc/2'
              . '{'
              . '  "file_path": "/User/alice/photos/2017/05/16/my_photo2.jpg"'
              . '}'
              . 'POST file-path-test/_doc/3'
              . '{'
              . '  "file_path": "/User/alice/photos/2017/05/16/my_photo3.jpg"'
              . '}'
              . 'POST file-path-test/_doc/4'
              . '{'
              . '  "file_path": "/User/alice/photos/2017/05/15/my_photo1.jpg"'
              . '}'
              . 'POST file-path-test/_doc/5'
              . '{'
              . '  "file_path": "/User/bob/photos/2017/05/16/my_photo1.jpg"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  bd767ea03171fe71c73f58f16d5da92f
     * Line: 98
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL98_bd767ea03171fe71c73f58f16d5da92f()
    {
        $client = $this->getClient();
        // tag::bd767ea03171fe71c73f58f16d5da92f[]
        // TODO -- Implement Example
        // GET file-path-test/_search
        // {
        //   "query": {
        //     "match": {
        //       "file_path": "/User/bob/photos/2017/05"
        //     }
        //   }
        // }
        // end::bd767ea03171fe71c73f58f16d5da92f[]

        $curl = 'GET file-path-test/_search'
              . '{'
              . '  "query": {'
              . '    "match": {'
              . '      "file_path": "/User/bob/photos/2017/05"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b724f547c5d67e95bbc0a9920e47033c
     * Line: 115
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL115_b724f547c5d67e95bbc0a9920e47033c()
    {
        $client = $this->getClient();
        // tag::b724f547c5d67e95bbc0a9920e47033c[]
        // TODO -- Implement Example
        // GET file-path-test/_search
        // {
        //   "query": {
        //     "term": {
        //       "file_path.tree": "/User/alice/photos/2017/05/16"
        //     }
        //   }
        // }
        // end::b724f547c5d67e95bbc0a9920e47033c[]

        $curl = 'GET file-path-test/_search'
              . '{'
              . '  "query": {'
              . '    "term": {'
              . '      "file_path.tree": "/User/alice/photos/2017/05/16"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f1dc6f69453867ffafe86e998dd464d9
     * Line: 135
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL135_f1dc6f69453867ffafe86e998dd464d9()
    {
        $client = $this->getClient();
        // tag::f1dc6f69453867ffafe86e998dd464d9[]
        // TODO -- Implement Example
        // GET file-path-test/_search
        // {
        //   "query": {
        //     "term": {
        //       "file_path.tree_reversed": {
        //         "value": "my_photo1.jpg"
        //       }
        //     }
        //   }
        // }
        // end::f1dc6f69453867ffafe86e998dd464d9[]

        $curl = 'GET file-path-test/_search'
              . '{'
              . '  "query": {'
              . '    "term": {'
              . '      "file_path.tree_reversed": {'
              . '        "value": "my_photo1.jpg"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  acc52da725a996ae696b00d9f818dfde
     * Line: 155
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL155_acc52da725a996ae696b00d9f818dfde()
    {
        $client = $this->getClient();
        // tag::acc52da725a996ae696b00d9f818dfde[]
        // TODO -- Implement Example
        // POST file-path-test/_analyze
        // {
        //   "analyzer": "custom_path_tree",
        //   "text": "/User/alice/photos/2017/05/16/my_photo1.jpg"
        // }
        // POST file-path-test/_analyze
        // {
        //   "analyzer": "custom_path_tree_reversed",
        //   "text": "/User/alice/photos/2017/05/16/my_photo1.jpg"
        // }
        // end::acc52da725a996ae696b00d9f818dfde[]

        $curl = 'POST file-path-test/_analyze'
              . '{'
              . '  "analyzer": "custom_path_tree",'
              . '  "text": "/User/alice/photos/2017/05/16/my_photo1.jpg"'
              . '}'
              . 'POST file-path-test/_analyze'
              . '{'
              . '  "analyzer": "custom_path_tree_reversed",'
              . '  "text": "/User/alice/photos/2017/05/16/my_photo1.jpg"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4bba59cf745ac7b996bf90308bc26957
     * Line: 176
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL176_4bba59cf745ac7b996bf90308bc26957()
    {
        $client = $this->getClient();
        // tag::4bba59cf745ac7b996bf90308bc26957[]
        // TODO -- Implement Example
        // GET file-path-test/_search
        // {
        //   "query": {
        //     "bool" : {
        //       "must" : {
        //         "match" : { "file_path" : "16" }
        //       },
        //       "filter": {
        //         "term" : { "file_path.tree" : "/User/alice" }
        //       }
        //     }
        //   }
        // }
        // end::4bba59cf745ac7b996bf90308bc26957[]

        $curl = 'GET file-path-test/_search'
              . '{'
              . '  "query": {'
              . '    "bool" : {'
              . '      "must" : {'
              . '        "match" : { "file_path" : "16" }'
              . '      },'
              . '      "filter": {'
              . '        "term" : { "file_path.tree" : "/User/alice" }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%







}
