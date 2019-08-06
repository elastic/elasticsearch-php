<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Profile
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/profile.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Profile extends SimpleExamplesTester {

    /**
     * Tag:  f6e300010478e5cbbeb2e589bc16fce7
     * Line: 22
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL22_f6e300010478e5cbbeb2e589bc16fce7()
    {
        $client = $this->getClient();
        // tag::f6e300010478e5cbbeb2e589bc16fce7[]
        // TODO -- Implement Example
        // GET /twitter/_search
        // {
        //   "profile": true,\<1>
        //   "query" : {
        //     "match" : { "message" : "some number" }
        //   }
        // }
        // end::f6e300010478e5cbbeb2e589bc16fce7[]

        $curl = 'GET /twitter/_search'
              . '{'
              . '  "profile": true,\<1>'
              . '  "query" : {'
              . '    "match" : { "message" : "some number" }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d8621790a416f05557c8df037a3722ac
     * Line: 509
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL509_d8621790a416f05557c8df037a3722ac()
    {
        $client = $this->getClient();
        // tag::d8621790a416f05557c8df037a3722ac[]
        // TODO -- Implement Example
        // GET /twitter/_search
        // {
        //   "profile": true,
        //   "query": {
        //     "term": {
        //       "user": {
        //         "value": "test"
        //       }
        //     }
        //   },
        //   "aggs": {
        //     "my_scoped_agg": {
        //       "terms": {
        //         "field": "likes"
        //       }
        //     },
        //     "my_global_agg": {
        //       "global": {},
        //       "aggs": {
        //         "my_level_agg": {
        //           "terms": {
        //             "field": "likes"
        //           }
        //         }
        //       }
        //     }
        //   },
        //   "post_filter": {
        //     "match": {
        //       "message": "some"
        //     }
        //   }
        // }
        // end::d8621790a416f05557c8df037a3722ac[]

        $curl = 'GET /twitter/_search'
              . '{'
              . '  "profile": true,'
              . '  "query": {'
              . '    "term": {'
              . '      "user": {'
              . '        "value": "test"'
              . '      }'
              . '    }'
              . '  },'
              . '  "aggs": {'
              . '    "my_scoped_agg": {'
              . '      "terms": {'
              . '        "field": "likes"'
              . '      }'
              . '    },'
              . '    "my_global_agg": {'
              . '      "global": {},'
              . '      "aggs": {'
              . '        "my_level_agg": {'
              . '          "terms": {'
              . '            "field": "likes"'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  },'
              . '  "post_filter": {'
              . '    "match": {'
              . '      "message": "some"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d8621790a416f05557c8df037a3722ac
     * Line: 708
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL708_d8621790a416f05557c8df037a3722ac()
    {
        $client = $this->getClient();
        // tag::d8621790a416f05557c8df037a3722ac[]
        // TODO -- Implement Example
        // GET /twitter/_search
        // {
        //   "profile": true,
        //   "query": {
        //     "term": {
        //       "user": {
        //         "value": "test"
        //       }
        //     }
        //   },
        //   "aggs": {
        //     "my_scoped_agg": {
        //       "terms": {
        //         "field": "likes"
        //       }
        //     },
        //     "my_global_agg": {
        //       "global": {},
        //       "aggs": {
        //         "my_level_agg": {
        //           "terms": {
        //             "field": "likes"
        //           }
        //         }
        //       }
        //     }
        //   },
        //   "post_filter": {
        //     "match": {
        //       "message": "some"
        //     }
        //   }
        // }
        // end::d8621790a416f05557c8df037a3722ac[]

        $curl = 'GET /twitter/_search'
              . '{'
              . '  "profile": true,'
              . '  "query": {'
              . '    "term": {'
              . '      "user": {'
              . '        "value": "test"'
              . '      }'
              . '    }'
              . '  },'
              . '  "aggs": {'
              . '    "my_scoped_agg": {'
              . '      "terms": {'
              . '        "field": "likes"'
              . '      }'
              . '    },'
              . '    "my_global_agg": {'
              . '      "global": {},'
              . '      "aggs": {'
              . '        "my_level_agg": {'
              . '          "terms": {'
              . '            "field": "likes"'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  },'
              . '  "post_filter": {'
              . '    "match": {'
              . '      "message": "some"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
