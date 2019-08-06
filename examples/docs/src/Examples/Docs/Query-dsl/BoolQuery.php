<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: BoolQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/bool-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class BoolQuery extends SimpleExamplesTester {

    /**
     * Tag:  06afce2955f9094d96d27067ebca32e8
     * Line: 36
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL36_06afce2955f9094d96d27067ebca32e8()
    {
        $client = $this->getClient();
        // tag::06afce2955f9094d96d27067ebca32e8[]
        // TODO -- Implement Example
        // POST _search
        // {
        //   "query": {
        //     "bool" : {
        //       "must" : {
        //         "term" : { "user" : "kimchy" }
        //       },
        //       "filter": {
        //         "term" : { "tag" : "tech" }
        //       },
        //       "must_not" : {
        //         "range" : {
        //           "age" : { "gte" : 10, "lte" : 20 }
        //         }
        //       },
        //       "should" : [
        //         { "term" : { "tag" : "wow" } },
        //         { "term" : { "tag" : "elasticsearch" } }
        //       ],
        //       "minimum_should_match" : 1,
        //       "boost" : 1.0
        //     }
        //   }
        // }
        // end::06afce2955f9094d96d27067ebca32e8[]

        $curl = 'POST _search'
              . '{'
              . '  "query": {'
              . '    "bool" : {'
              . '      "must" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '      },'
              . '      "filter": {'
              . '        "term" : { "tag" : "tech" }'
              . '      },'
              . '      "must_not" : {'
              . '        "range" : {'
              . '          "age" : { "gte" : 10, "lte" : 20 }'
              . '        }'
              . '      },'
              . '      "should" : ['
              . '        { "term" : { "tag" : "wow" } },'
              . '        { "term" : { "tag" : "elasticsearch" } }'
              . '      ],'
              . '      "minimum_should_match" : 1,'
              . '      "boost" : 1.0'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f70a54cd9a9f4811bf962e469f2ca2ea
     * Line: 76
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL76_f70a54cd9a9f4811bf962e469f2ca2ea()
    {
        $client = $this->getClient();
        // tag::f70a54cd9a9f4811bf962e469f2ca2ea[]
        // TODO -- Implement Example
        // GET _search
        // {
        //   "query": {
        //     "bool": {
        //       "filter": {
        //         "term": {
        //           "status": "active"
        //         }
        //       }
        //     }
        //   }
        // }
        // end::f70a54cd9a9f4811bf962e469f2ca2ea[]

        $curl = 'GET _search'
              . '{'
              . '  "query": {'
              . '    "bool": {'
              . '      "filter": {'
              . '        "term": {'
              . '          "status": "active"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  fa88f6f5a7d728ec4f1d05244228cb09
     * Line: 96
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL96_fa88f6f5a7d728ec4f1d05244228cb09()
    {
        $client = $this->getClient();
        // tag::fa88f6f5a7d728ec4f1d05244228cb09[]
        // TODO -- Implement Example
        // GET _search
        // {
        //   "query": {
        //     "bool": {
        //       "must": {
        //         "match_all": {}
        //       },
        //       "filter": {
        //         "term": {
        //           "status": "active"
        //         }
        //       }
        //     }
        //   }
        // }
        // end::fa88f6f5a7d728ec4f1d05244228cb09[]

        $curl = 'GET _search'
              . '{'
              . '  "query": {'
              . '    "bool": {'
              . '      "must": {'
              . '        "match_all": {}'
              . '      },'
              . '      "filter": {'
              . '        "term": {'
              . '          "status": "active"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  162b5b693b713f0bfab1209d59443c46
     * Line: 120
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL120_162b5b693b713f0bfab1209d59443c46()
    {
        $client = $this->getClient();
        // tag::162b5b693b713f0bfab1209d59443c46[]
        // TODO -- Implement Example
        // GET _search
        // {
        //   "query": {
        //     "constant_score": {
        //       "filter": {
        //         "term": {
        //           "status": "active"
        //         }
        //       }
        //     }
        //   }
        // }
        // end::162b5b693b713f0bfab1209d59443c46[]

        $curl = 'GET _search'
              . '{'
              . '  "query": {'
              . '    "constant_score": {'
              . '      "filter": {'
              . '        "term": {'
              . '          "status": "active"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
