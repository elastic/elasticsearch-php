<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Validate
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/validate.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Validate extends SimpleExamplesTester {

    /**
     * Tag:  a0a6e4abbf0a5d064d06d06ddc585f4c
     * Line: 8
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL8_a0a6e4abbf0a5d064d06d06ddc585f4c()
    {
        $client = $this->getClient();
        // tag::a0a6e4abbf0a5d064d06d06ddc585f4c[]
        // TODO -- Implement Example
        // PUT twitter/_bulk?refresh
        // {"index":{"_id":1}}
        // {"user" : "kimchy", "post_date" : "2009-11-15T14:12:12", "message" : "trying out Elasticsearch"}
        // {"index":{"_id":2}}
        // {"user" : "kimchi", "post_date" : "2009-11-15T14:12:13", "message" : "My username is similar to @kimchy!"}
        // end::a0a6e4abbf0a5d064d06d06ddc585f4c[]

        $curl = 'PUT twitter/_bulk?refresh'
              . '{"index":{"_id":1}}'
              . '{"user" : "kimchy", "post_date" : "2009-11-15T14:12:12", "message" : "trying out Elasticsearch"}'
              . '{"index":{"_id":2}}'
              . '{"user" : "kimchi", "post_date" : "2009-11-15T14:12:13", "message" : "My username is similar to @kimchy!"}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6bdf94c025faf346013a70e3473d5f87
     * Line: 21
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL21_6bdf94c025faf346013a70e3473d5f87()
    {
        $client = $this->getClient();
        // tag::6bdf94c025faf346013a70e3473d5f87[]
        // TODO -- Implement Example
        // GET twitter/_validate/query?q=user:foo
        // end::6bdf94c025faf346013a70e3473d5f87[]

        $curl = 'GET twitter/_validate/query?q=user:foo';

        // TODO -- make assertion
    }

    /**
     * Tag:  1a0ce57a5e6d73765601de98a5d60d80
     * Line: 62
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL62_1a0ce57a5e6d73765601de98a5d60d80()
    {
        $client = $this->getClient();
        // tag::1a0ce57a5e6d73765601de98a5d60d80[]
        // TODO -- Implement Example
        // GET twitter/_validate/query
        // {
        //   "query" : {
        //     "bool" : {
        //       "must" : {
        //         "query_string" : {
        //           "query" : "*:*"
        //         }
        //       },
        //       "filter" : {
        //         "term" : { "user" : "kimchy" }
        //       }
        //     }
        //   }
        // }
        // end::1a0ce57a5e6d73765601de98a5d60d80[]

        $curl = 'GET twitter/_validate/query'
              . '{'
              . '  "query" : {'
              . '    "bool" : {'
              . '      "must" : {'
              . '        "query_string" : {'
              . '          "query" : "*:*"'
              . '        }'
              . '      },'
              . '      "filter" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9989c7860423519c7357936a73c2a5ce
     * Line: 89
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL89_9989c7860423519c7357936a73c2a5ce()
    {
        $client = $this->getClient();
        // tag::9989c7860423519c7357936a73c2a5ce[]
        // TODO -- Implement Example
        // GET twitter/_validate/query
        // {
        //   "query": {
        //     "query_string": {
        //       "query": "post_date:foo",
        //       "lenient": false
        //     }
        //   }
        // }
        // end::9989c7860423519c7357936a73c2a5ce[]

        $curl = 'GET twitter/_validate/query'
              . '{'
              . '  "query": {'
              . '    "query_string": {'
              . '      "query": "post_date:foo",'
              . '      "lenient": false'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b5cd0cc45db5f2fba30ac310630ad172
     * Line: 112
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL112_b5cd0cc45db5f2fba30ac310630ad172()
    {
        $client = $this->getClient();
        // tag::b5cd0cc45db5f2fba30ac310630ad172[]
        // TODO -- Implement Example
        // GET twitter/_validate/query?explain=true
        // {
        //   "query": {
        //     "query_string": {
        //       "query": "post_date:foo",
        //       "lenient": false
        //     }
        //   }
        // }
        // end::b5cd0cc45db5f2fba30ac310630ad172[]

        $curl = 'GET twitter/_validate/query?explain=true'
              . '{'
              . '  "query": {'
              . '    "query_string": {'
              . '      "query": "post_date:foo",'
              . '      "lenient": false'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  fd74d7518bab5f1dbc1fed588b9bc2a6
     * Line: 152
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL152_fd74d7518bab5f1dbc1fed588b9bc2a6()
    {
        $client = $this->getClient();
        // tag::fd74d7518bab5f1dbc1fed588b9bc2a6[]
        // TODO -- Implement Example
        // GET twitter/_validate/query?rewrite=true
        // {
        //   "query": {
        //     "more_like_this": {
        //       "like": {
        //         "_id": "2"
        //       },
        //       "boost_terms": 1
        //     }
        //   }
        // }
        // end::fd74d7518bab5f1dbc1fed588b9bc2a6[]

        $curl = 'GET twitter/_validate/query?rewrite=true'
              . '{'
              . '  "query": {'
              . '    "more_like_this": {'
              . '      "like": {'
              . '        "_id": "2"'
              . '      },'
              . '      "boost_terms": 1'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d253135ac0a4b3b04531b1a5d2a19279
     * Line: 199
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL199_d253135ac0a4b3b04531b1a5d2a19279()
    {
        $client = $this->getClient();
        // tag::d253135ac0a4b3b04531b1a5d2a19279[]
        // TODO -- Implement Example
        // GET twitter/_validate/query?rewrite=true&all_shards=true
        // {
        //   "query": {
        //     "match": {
        //       "user": {
        //         "query": "kimchy",
        //         "fuzziness": "auto"
        //       }
        //     }
        //   }
        // }
        // end::d253135ac0a4b3b04531b1a5d2a19279[]

        $curl = 'GET twitter/_validate/query?rewrite=true&all_shards=true'
              . '{'
              . '  "query": {'
              . '    "match": {'
              . '      "user": {'
              . '        "query": "kimchy",'
              . '        "fuzziness": "auto"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%








}
