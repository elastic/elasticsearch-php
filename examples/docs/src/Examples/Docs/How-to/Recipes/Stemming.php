<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\How-to\Recipes;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Stemming
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   how-to/recipes/stemming.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Stemming extends SimpleExamplesTester {

    /**
     * Tag:  397bdb40d0146102f1f4c6a35675e16a
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_397bdb40d0146102f1f4c6a35675e16a()
    {
        $client = $this->getClient();
        // tag::397bdb40d0146102f1f4c6a35675e16a[]
        // TODO -- Implement Example
        // PUT index
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "english_exact": {
        //           "tokenizer": "standard",
        //           "filter": [
        //             "lowercase"
        //           ]
        //         }
        //       }
        //     }
        //   },
        //   "mappings": {
        //     "properties": {
        //       "body": {
        //         "type": "text",
        //         "analyzer": "english",
        //         "fields": {
        //           "exact": {
        //             "type": "text",
        //             "analyzer": "english_exact"
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // PUT index/_doc/1
        // {
        //   "body": "Ski resort"
        // }
        // PUT index/_doc/2
        // {
        //   "body": "A pair of skis"
        // }
        // POST index/_refresh
        // end::397bdb40d0146102f1f4c6a35675e16a[]

        $curl = 'PUT index'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "english_exact": {'
              . '          "tokenizer": "standard",'
              . '          "filter": ['
              . '            "lowercase"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  },'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "body": {'
              . '        "type": "text",'
              . '        "analyzer": "english",'
              . '        "fields": {'
              . '          "exact": {'
              . '            "type": "text",'
              . '            "analyzer": "english_exact"'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT index/_doc/1'
              . '{'
              . '  "body": "Ski resort"'
              . '}'
              . 'PUT index/_doc/2'
              . '{'
              . '  "body": "A pair of skis"'
              . '}'
              . 'POST index/_refresh';

        // TODO -- make assertion
    }

    /**
     * Tag:  bf2e6ea2bae621b9b2fee7003e891f86
     * Line: 59
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL59_bf2e6ea2bae621b9b2fee7003e891f86()
    {
        $client = $this->getClient();
        // tag::bf2e6ea2bae621b9b2fee7003e891f86[]
        // TODO -- Implement Example
        // GET index/_search
        // {
        //   "query": {
        //     "simple_query_string": {
        //       "fields": [ "body" ],
        //       "query": "ski"
        //     }
        //   }
        // }
        // end::bf2e6ea2bae621b9b2fee7003e891f86[]

        $curl = 'GET index/_search'
              . '{'
              . '  "query": {'
              . '    "simple_query_string": {'
              . '      "fields": [ "body" ],'
              . '      "query": "ski"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3f94ed945ae6416a0eb372c2db14d7e0
     * Line: 120
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL120_3f94ed945ae6416a0eb372c2db14d7e0()
    {
        $client = $this->getClient();
        // tag::3f94ed945ae6416a0eb372c2db14d7e0[]
        // TODO -- Implement Example
        // GET index/_search
        // {
        //   "query": {
        //     "simple_query_string": {
        //       "fields": [ "body.exact" ],
        //       "query": "ski"
        //     }
        //   }
        // }
        // end::3f94ed945ae6416a0eb372c2db14d7e0[]

        $curl = 'GET index/_search'
              . '{'
              . '  "query": {'
              . '    "simple_query_string": {'
              . '      "fields": [ "body.exact" ],'
              . '      "query": "ski"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  26abfc49c238c2b5d259983ac38dbcee
     * Line: 179
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL179_26abfc49c238c2b5d259983ac38dbcee()
    {
        $client = $this->getClient();
        // tag::26abfc49c238c2b5d259983ac38dbcee[]
        // TODO -- Implement Example
        // GET index/_search
        // {
        //   "query": {
        //     "simple_query_string": {
        //       "fields": [ "body" ],
        //       "quote_field_suffix": ".exact",
        //       "query": "\"ski\""
        //     }
        //   }
        // }
        // end::26abfc49c238c2b5d259983ac38dbcee[]

        $curl = 'GET index/_search'
              . '{'
              . '  "query": {'
              . '    "simple_query_string": {'
              . '      "fields": [ "body" ],'
              . '      "quote_field_suffix": ".exact",'
              . '      "query": "\"ski\""'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
