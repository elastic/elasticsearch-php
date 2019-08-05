<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SimpleQueryStringQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/simple-query-string-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SimpleQueryStringQuery extends SimpleExamplesTester {

    /**
     * Tag:  0d49474511b236bc89e768c8ee91adf1
     * Line: 13
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL13_0d49474511b236bc89e768c8ee91adf1()
    {
        $client = $this->getClient();
        // tag::0d49474511b236bc89e768c8ee91adf1[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //   "query": {
        //     "simple_query_string" : {
        //         "query": "\"fried eggs\" +(eggplant | potato) -frittata",
        //         "fields": ["title^5", "body"],
        //         "default_operator": "and"
        //     }
        //   }
        // }
        // end::0d49474511b236bc89e768c8ee91adf1[]

        $curl = 'GET /_search'
              . '{'
              . '  "query": {'
              . '    "simple_query_string" : {'
              . '        "query": "\"fried eggs\" +(eggplant | potato) -frittata",'
              . '        "fields": ["title^5", "body"],'
              . '        "default_operator": "and"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  521aa59ae56681fd59ac5840cba6b6c5
     * Line: 110
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL110_521aa59ae56681fd59ac5840cba6b6c5()
    {
        $client = $this->getClient();
        // tag::521aa59ae56681fd59ac5840cba6b6c5[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "simple_query_string" : {
        //             "fields" : ["content"],
        //             "query" : "foo bar -baz"
        //         }
        //     }
        // }
        // end::521aa59ae56681fd59ac5840cba6b6c5[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "simple_query_string" : {'
              . '            "fields" : ["content"],'
              . '            "query" : "foo bar -baz"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f4563bc7d16d5026f94e8a69699de6e7
     * Line: 145
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL145_f4563bc7d16d5026f94e8a69699de6e7()
    {
        $client = $this->getClient();
        // tag::f4563bc7d16d5026f94e8a69699de6e7[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "simple_query_string" : {
        //             "fields" : ["content", "name.*^5"],
        //             "query" : "foo bar baz"
        //         }
        //     }
        // }
        // end::f4563bc7d16d5026f94e8a69699de6e7[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "simple_query_string" : {'
              . '            "fields" : ["content", "name.*^5"],'
              . '            "query" : "foo bar baz"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f686f52decb1d57356d42920f46d4d85
     * Line: 166
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL166_f686f52decb1d57356d42920f46d4d85()
    {
        $client = $this->getClient();
        // tag::f686f52decb1d57356d42920f46d4d85[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "simple_query_string" : {
        //             "query" : "foo | bar + baz*",
        //             "flags" : "OR|AND|PREFIX"
        //         }
        //     }
        // }
        // end::f686f52decb1d57356d42920f46d4d85[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "simple_query_string" : {'
              . '            "query" : "foo | bar + baz*",'
              . '            "flags" : "OR|AND|PREFIX"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2e602d7fbad46132358f921dff7d1a26
     * Line: 211
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL211_2e602d7fbad46132358f921dff7d1a26()
    {
        $client = $this->getClient();
        // tag::2e602d7fbad46132358f921dff7d1a26[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //    "query": {
        //        "simple_query_string" : {
        //            "query" : "ny city",
        //            "auto_generate_synonyms_phrase_query" : false
        //        }
        //    }
        // }
        // end::2e602d7fbad46132358f921dff7d1a26[]

        $curl = 'GET /_search'
              . '{'
              . '   "query": {'
              . '       "simple_query_string" : {'
              . '           "query" : "ny city",'
              . '           "auto_generate_synonyms_phrase_query" : false'
              . '       }'
              . '   }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
