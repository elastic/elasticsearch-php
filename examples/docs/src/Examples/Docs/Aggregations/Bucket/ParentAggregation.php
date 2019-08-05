<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ParentAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/bucket/parent-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ParentAggregation extends SimpleExamplesTester {

    /**
     * Tag:  1db086021e83205b6eab3b7765911cc2
     * Line: 13
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL13_1db086021e83205b6eab3b7765911cc2()
    {
        $client = $this->getClient();
        // tag::1db086021e83205b6eab3b7765911cc2[]
        // TODO -- Implement Example
        // PUT parent_example
        // {
        //   "mappings": {
        //      "properties": {
        //        "join": {
        //          "type": "join",
        //          "relations": {
        //            "question": "answer"
        //          }
        //        }
        //      }
        //   }
        // }
        // end::1db086021e83205b6eab3b7765911cc2[]

        $curl = 'PUT parent_example'
              . '{'
              . '  "mappings": {'
              . '     "properties": {'
              . '       "join": {'
              . '         "type": "join",'
              . '         "relations": {'
              . '           "question": "answer"'
              . '         }'
              . '       }'
              . '     }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c9afa715021f2e6450e72ac73271960c
     * Line: 37
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL37_c9afa715021f2e6450e72ac73271960c()
    {
        $client = $this->getClient();
        // tag::c9afa715021f2e6450e72ac73271960c[]
        // TODO -- Implement Example
        // PUT parent_example/_doc/1
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
        // end::c9afa715021f2e6450e72ac73271960c[]

        $curl = 'PUT parent_example/_doc/1'
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
     * Tag:  d8310e5606c61e7a6e64a90838b1a830
     * Line: 58
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL58_d8310e5606c61e7a6e64a90838b1a830()
    {
        $client = $this->getClient();
        // tag::d8310e5606c61e7a6e64a90838b1a830[]
        // TODO -- Implement Example
        // PUT parent_example/_doc/2?routing=1
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
        // PUT parent_example/_doc/3?routing=1&refresh
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
        // end::d8310e5606c61e7a6e64a90838b1a830[]

        $curl = 'PUT parent_example/_doc/2?routing=1'
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
              . 'PUT parent_example/_doc/3?routing=1&refresh'
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
     * Tag:  686bc640b877de845c46bef372a9866c
     * Line: 95
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL95_686bc640b877de845c46bef372a9866c()
    {
        $client = $this->getClient();
        // tag::686bc640b877de845c46bef372a9866c[]
        // TODO -- Implement Example
        // POST parent_example/_search?size=0
        // {
        //   "aggs": {
        //     "top-names": {
        //       "terms": {
        //         "field": "owner.display_name.keyword",
        //         "size": 10
        //       },
        //       "aggs": {
        //         "to-questions": {
        //           "parent": {
        //             "type" : "answer" \<1>
        //           },
        //           "aggs": {
        //             "top-tags": {
        //               "terms": {
        //                 "field": "tags.keyword",
        //                 "size": 10
        //               }
        //             }
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::686bc640b877de845c46bef372a9866c[]

        $curl = 'POST parent_example/_search?size=0'
              . '{'
              . '  "aggs": {'
              . '    "top-names": {'
              . '      "terms": {'
              . '        "field": "owner.display_name.keyword",'
              . '        "size": 10'
              . '      },'
              . '      "aggs": {'
              . '        "to-questions": {'
              . '          "parent": {'
              . '            "type" : "answer" \<1>'
              . '          },'
              . '          "aggs": {'
              . '            "top-tags": {'
              . '              "terms": {'
              . '                "field": "tags.keyword",'
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
