<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ReverseNestedAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/bucket/reverse-nested-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ReverseNestedAggregation extends SimpleExamplesTester {

    /**
     * Tag:  817891bd13da04e5981a797247601145
     * Line: 19
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL19_817891bd13da04e5981a797247601145()
    {
        $client = $this->getClient();
        // tag::817891bd13da04e5981a797247601145[]
        // TODO -- Implement Example
        // PUT /issues
        // {
        //     "mappings": {
        //          "properties" : {
        //              "tags" : { "type" : "keyword" },
        //              "comments" : { \<1>
        //                  "type" : "nested",
        //                  "properties" : {
        //                      "username" : { "type" : "keyword" },
        //                      "comment" : { "type" : "text" }
        //                  }
        //              }
        //          }
        //     }
        // }
        // end::817891bd13da04e5981a797247601145[]

        $curl = 'PUT /issues'
              . '{'
              . '    "mappings": {'
              . '         "properties" : {'
              . '             "tags" : { "type" : "keyword" },'
              . '             "comments" : { \<1>'
              . '                 "type" : "nested",'
              . '                 "properties" : {'
              . '                     "username" : { "type" : "keyword" },'
              . '                     "comment" : { "type" : "text" }'
              . '                 }'
              . '             }'
              . '         }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  aee26dd62fbb6d614a0798f3344c0598
     * Line: 55
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL55_aee26dd62fbb6d614a0798f3344c0598()
    {
        $client = $this->getClient();
        // tag::aee26dd62fbb6d614a0798f3344c0598[]
        // TODO -- Implement Example
        // GET /issues/_search
        // {
        //   "query": {
        //     "match_all": {}
        //   },
        //   "aggs": {
        //     "comments": {
        //       "nested": {
        //         "path": "comments"
        //       },
        //       "aggs": {
        //         "top_usernames": {
        //           "terms": {
        //             "field": "comments.username"
        //           },
        //           "aggs": {
        //             "comment_to_issue": {
        //               "reverse_nested": {}, \<1>
        //               "aggs": {
        //                 "top_tags_per_comment": {
        //                   "terms": {
        //                     "field": "tags"
        //                   }
        //                 }
        //               }
        //             }
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::aee26dd62fbb6d614a0798f3344c0598[]

        $curl = 'GET /issues/_search'
              . '{'
              . '  "query": {'
              . '    "match_all": {}'
              . '  },'
              . '  "aggs": {'
              . '    "comments": {'
              . '      "nested": {'
              . '        "path": "comments"'
              . '      },'
              . '      "aggs": {'
              . '        "top_usernames": {'
              . '          "terms": {'
              . '            "field": "comments.username"'
              . '          },'
              . '          "aggs": {'
              . '            "comment_to_issue": {'
              . '              "reverse_nested": {}, \<1>'
              . '              "aggs": {'
              . '                "top_tags_per_comment": {'
              . '                  "terms": {'
              . '                    "field": "tags"'
              . '                  }'
              . '                }'
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
