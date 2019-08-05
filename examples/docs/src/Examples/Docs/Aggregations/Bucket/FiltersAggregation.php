<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: FiltersAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/bucket/filters-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class FiltersAggregation extends SimpleExamplesTester {

    /**
     * Tag:  188e6208cccb13027a5c1c95440841ee
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_188e6208cccb13027a5c1c95440841ee()
    {
        $client = $this->getClient();
        // tag::188e6208cccb13027a5c1c95440841ee[]
        // TODO -- Implement Example
        // PUT /logs/_bulk?refresh
        // { "index" : { "_id" : 1 } }
        // { "body" : "warning: page could not be rendered" }
        // { "index" : { "_id" : 2 } }
        // { "body" : "authentication error" }
        // { "index" : { "_id" : 3 } }
        // { "body" : "warning: connection timed out" }
        // GET logs/_search
        // {
        //   "size": 0,
        //   "aggs" : {
        //     "messages" : {
        //       "filters" : {
        //         "filters" : {
        //           "errors" :   { "match" : { "body" : "error"   }},
        //           "warnings" : { "match" : { "body" : "warning" }}
        //         }
        //       }
        //     }
        //   }
        // }
        // end::188e6208cccb13027a5c1c95440841ee[]

        $curl = 'PUT /logs/_bulk?refresh'
              . '{ "index" : { "_id" : 1 } }'
              . '{ "body" : "warning: page could not be rendered" }'
              . '{ "index" : { "_id" : 2 } }'
              . '{ "body" : "authentication error" }'
              . '{ "index" : { "_id" : 3 } }'
              . '{ "body" : "warning: connection timed out" }'
              . 'GET logs/_search'
              . '{'
              . '  "size": 0,'
              . '  "aggs" : {'
              . '    "messages" : {'
              . '      "filters" : {'
              . '        "filters" : {'
              . '          "errors" :   { "match" : { "body" : "error"   }},'
              . '          "warnings" : { "match" : { "body" : "warning" }}'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3cd2f7f9096a8e8180f27b6c30e71840
     * Line: 74
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL74_3cd2f7f9096a8e8180f27b6c30e71840()
    {
        $client = $this->getClient();
        // tag::3cd2f7f9096a8e8180f27b6c30e71840[]
        // TODO -- Implement Example
        // GET logs/_search
        // {
        //   "size": 0,
        //   "aggs" : {
        //     "messages" : {
        //       "filters" : {
        //         "filters" : [
        //           { "match" : { "body" : "error"   }},
        //           { "match" : { "body" : "warning" }}
        //         ]
        //       }
        //     }
        //   }
        // }
        // end::3cd2f7f9096a8e8180f27b6c30e71840[]

        $curl = 'GET logs/_search'
              . '{'
              . '  "size": 0,'
              . '  "aggs" : {'
              . '    "messages" : {'
              . '      "filters" : {'
              . '        "filters" : ['
              . '          { "match" : { "body" : "error"   }},'
              . '          { "match" : { "body" : "warning" }}'
              . '        ]'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  21bb03ca9123de3237c1c76934f9f172
     * Line: 137
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL137_21bb03ca9123de3237c1c76934f9f172()
    {
        $client = $this->getClient();
        // tag::21bb03ca9123de3237c1c76934f9f172[]
        // TODO -- Implement Example
        // PUT logs/_doc/4?refresh
        // {
        //   "body": "info: user Bob logged out"
        // }
        // GET logs/_search
        // {
        //   "size": 0,
        //   "aggs" : {
        //     "messages" : {
        //       "filters" : {
        //         "other_bucket_key": "other_messages",
        //         "filters" : {
        //           "errors" :   { "match" : { "body" : "error"   }},
        //           "warnings" : { "match" : { "body" : "warning" }}
        //         }
        //       }
        //     }
        //   }
        // }
        // end::21bb03ca9123de3237c1c76934f9f172[]

        $curl = 'PUT logs/_doc/4?refresh'
              . '{'
              . '  "body": "info: user Bob logged out"'
              . '}'
              . 'GET logs/_search'
              . '{'
              . '  "size": 0,'
              . '  "aggs" : {'
              . '    "messages" : {'
              . '      "filters" : {'
              . '        "other_bucket_key": "other_messages",'
              . '        "filters" : {'
              . '          "errors" :   { "match" : { "body" : "error"   }},'
              . '          "warnings" : { "match" : { "body" : "warning" }}'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
