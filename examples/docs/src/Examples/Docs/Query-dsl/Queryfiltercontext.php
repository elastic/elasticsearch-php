<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Queryfiltercontext
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/query_filter_context.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Queryfiltercontext extends SimpleExamplesTester {

    /**
     * Tag:  f29a28fffa7ec604a33a838f48f7ea79
     * Line: 62
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL62_f29a28fffa7ec604a33a838f48f7ea79()
    {
        $client = $this->getClient();
        // tag::f29a28fffa7ec604a33a838f48f7ea79[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //   "query": { \<1>
        //     "bool": { \<2>
        //       "must": [
        //         { "match": { "title":   "Search"        }},
        //         { "match": { "content": "Elasticsearch" }}
        //       ],
        //       "filter": [ \<3>
        //         { "term":  { "status": "published" }},
        //         { "range": { "publish_date": { "gte": "2015-01-01" }}}
        //       ]
        //     }
        //   }
        // }
        // end::f29a28fffa7ec604a33a838f48f7ea79[]

        $curl = 'GET /_search'
              . '{'
              . '  "query": { \<1>'
              . '    "bool": { \<2>'
              . '      "must": ['
              . '        { "match": { "title":   "Search"        }},'
              . '        { "match": { "content": "Elasticsearch" }}'
              . '      ],'
              . '      "filter": [ \<3>'
              . '        { "term":  { "status": "published" }},'
              . '        { "range": { "publish_date": { "gte": "2015-01-01" }}}'
              . '      ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
