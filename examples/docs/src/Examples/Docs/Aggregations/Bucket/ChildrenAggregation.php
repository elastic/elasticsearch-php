<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ChildrenAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/bucket/children-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ChildrenAggregation extends SimpleExamplesTester {

    /**
     * Tag:  9399cbbd133ec2b7aad2820fa617ae3a
     * Line: 13
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL13_9399cbbd133ec2b7aad2820fa617ae3a()
    {
        $client = $this->getClient();
        // tag::9399cbbd133ec2b7aad2820fa617ae3a[]
        // TODO -- Implement Example
        // PUT child_example
        // {
        //   "mappings": {
        //     "properties": {
        //       "join": {
        //         "type": "join",
        //         "relations": {
        //           "question": "answer"
        //         }
        //       }
        //     }
        //   }
        // }
        // end::9399cbbd133ec2b7aad2820fa617ae3a[]

        $curl = 'PUT child_example'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "join": {'
              . '        "type": "join",'
              . '        "relations": {'
              . '          "question": "answer"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  dfdf82b8d99436582f150117695190b3
     * Line: 37
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL37_dfdf82b8d99436582f150117695190b3()
    {
        $client = $this->getClient();
        // tag::dfdf82b8d99436582f150117695190b3[]
        // TODO -- Implement Example
        // PUT child_example/_doc/1
        // {
        //   "join": {
        //     "name": "question"
        //   },
        //   "body": "\<p>I have Windows 2003 server and i bought a new Windows 2008 server...",
        //   "title": "Whats the best way to file transfer my site from server to a newer one?",
        //   "tags": [
        //     "windows-server-2003",
        //     "windows-server-2008",
        //     "file-transfer"
        //   ]
        // }
        // end::dfdf82b8d99436582f150117695190b3[]

        $curl = 'PUT child_example/_doc/1'
              . '{'
              . '  "join": {'
              . '    "name": "question"'
              . '  },'
              . '  "body": "\<p>I have Windows 2003 server and i bought a new Windows 2008 server...",'
              . '  "title": "Whats the best way to file transfer my site from server to a newer one?",'
              . '  "tags": ['
              . '    "windows-server-2003",'
              . '    "windows-server-2008",'
              . '    "file-transfer"'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e9fe3b53b5b6e1ff9566b5237c0fa513
     * Line: 58
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL58_e9fe3b53b5b6e1ff9566b5237c0fa513()
    {
        $client = $this->getClient();
        // tag::e9fe3b53b5b6e1ff9566b5237c0fa513[]
        // TODO -- Implement Example
        // PUT child_example/_doc/2?routing=1
        // {
        //   "join": {
        //     "name": "answer",
        //     "parent": "1"
        //   },
        //   "owner": {
        //     "location": "Norfolk, United Kingdom",
        //     "display_name": "Sam",
        //     "id": 48
        //   },
        //   "body": "\<p>Unfortunately you're pretty much limited to FTP...",
        //   "creation_date": "2009-05-04T13:45:37.030"
        // }
        // PUT child_example/_doc/3?routing=1&refresh
        // {
        //   "join": {
        //     "name": "answer",
        //     "parent": "1"
        //   },
        //   "owner": {
        //     "location": "Norfolk, United Kingdom",
        //     "display_name": "Troll",
        //     "id": 49
        //   },
        //   "body": "\<p>Use Linux...",
        //   "creation_date": "2009-05-05T13:45:37.030"
        // }
        // end::e9fe3b53b5b6e1ff9566b5237c0fa513[]

        $curl = 'PUT child_example/_doc/2?routing=1'
              . '{'
              . '  "join": {'
              . '    "name": "answer",'
              . '    "parent": "1"'
              . '  },'
              . '  "owner": {'
              . '    "location": "Norfolk, United Kingdom",'
              . '    "display_name": "Sam",'
              . '    "id": 48'
              . '  },'
              . '  "body": "\<p>Unfortunately you're pretty much limited to FTP...",'
              . '  "creation_date": "2009-05-04T13:45:37.030"'
              . '}'
              . 'PUT child_example/_doc/3?routing=1&refresh'
              . '{'
              . '  "join": {'
              . '    "name": "answer",'
              . '    "parent": "1"'
              . '  },'
              . '  "owner": {'
              . '    "location": "Norfolk, United Kingdom",'
              . '    "display_name": "Troll",'
              . '    "id": 49'
              . '  },'
              . '  "body": "\<p>Use Linux...",'
              . '  "creation_date": "2009-05-05T13:45:37.030"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d5132d34ae922fa8e898889b627a1405
     * Line: 95
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL95_d5132d34ae922fa8e898889b627a1405()
    {
        $client = $this->getClient();
        // tag::d5132d34ae922fa8e898889b627a1405[]
        // TODO -- Implement Example
        // POST child_example/_search?size=0
        // {
        //   "aggs": {
        //     "top-tags": {
        //       "terms": {
        //         "field": "tags.keyword",
        //         "size": 10
        //       },
        //       "aggs": {
        //         "to-answers": {
        //           "children": {
        //             "type" : "answer" \<1>
        //           },
        //           "aggs": {
        //             "top-names": {
        //               "terms": {
        //                 "field": "owner.display_name.keyword",
        //                 "size": 10
        //               }
        //             }
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::d5132d34ae922fa8e898889b627a1405[]

        $curl = 'POST child_example/_search?size=0'
              . '{'
              . '  "aggs": {'
              . '    "top-tags": {'
              . '      "terms": {'
              . '        "field": "tags.keyword",'
              . '        "size": 10'
              . '      },'
              . '      "aggs": {'
              . '        "to-answers": {'
              . '          "children": {'
              . '            "type" : "answer" \<1>'
              . '          },'
              . '          "aggs": {'
              . '            "top-names": {'
              . '              "terms": {'
              . '                "field": "owner.display_name.keyword",'
              . '                "size": 10'
              . '              }'
              . '            }'
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
