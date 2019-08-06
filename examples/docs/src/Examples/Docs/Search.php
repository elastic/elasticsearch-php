<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Search
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   search.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Search extends SimpleExamplesTester {

    /**
     * Tag:  321afb79fc4ee54676a89e0cd24946c1
     * Line: 18
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL18_321afb79fc4ee54676a89e0cd24946c1()
    {
        $client = $this->getClient();
        // tag::321afb79fc4ee54676a89e0cd24946c1[]
        // TODO -- Implement Example
        // POST /twitter/_doc?routing=kimchy
        // {
        //     "user" : "kimchy",
        //     "postDate" : "2009-11-15T14:12:12",
        //     "message" : "trying out Elasticsearch"
        // }
        // end::321afb79fc4ee54676a89e0cd24946c1[]

        $curl = 'POST /twitter/_doc?routing=kimchy'
              . '{'
              . '    "user" : "kimchy",'
              . '    "postDate" : "2009-11-15T14:12:12",'
              . '    "message" : "trying out Elasticsearch"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8acc1d67b152e7027e0f0e1a8b4b2431
     * Line: 33
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL33_8acc1d67b152e7027e0f0e1a8b4b2431()
    {
        $client = $this->getClient();
        // tag::8acc1d67b152e7027e0f0e1a8b4b2431[]
        // TODO -- Implement Example
        // POST /twitter/_search?routing=kimchy
        // {
        //     "query": {
        //         "bool" : {
        //             "must" : {
        //                 "query_string" : {
        //                     "query" : "some query string here"
        //                 }
        //             },
        //             "filter" : {
        //                 "term" : { "user" : "kimchy" }
        //             }
        //         }
        //     }
        // }
        // end::8acc1d67b152e7027e0f0e1a8b4b2431[]

        $curl = 'POST /twitter/_search?routing=kimchy'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "must" : {'
              . '                "query_string" : {'
              . '                    "query" : "some query string here"'
              . '                }'
              . '            },'
              . '            "filter" : {'
              . '                "term" : { "user" : "kimchy" }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  014b788c879e4aaa1020672e45e25473
     * Line: 74
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL74_014b788c879e4aaa1020672e45e25473()
    {
        $client = $this->getClient();
        // tag::014b788c879e4aaa1020672e45e25473[]
        // TODO -- Implement Example
        // PUT /_cluster/settings
        // {
        //     "transient": {
        //         "cluster.routing.use_adaptive_replica_selection": false
        //     }
        // }
        // end::014b788c879e4aaa1020672e45e25473[]

        $curl = 'PUT /_cluster/settings'
              . '{'
              . '    "transient": {'
              . '        "cluster.routing.use_adaptive_replica_selection": false'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  189a921df2f5b1fe580937210ce9c1c2
     * Line: 99
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL99_189a921df2f5b1fe580937210ce9c1c2()
    {
        $client = $this->getClient();
        // tag::189a921df2f5b1fe580937210ce9c1c2[]
        // TODO -- Implement Example
        // POST /_search
        // {
        //     "query" : {
        //         "match_all" : {}
        //     },
        //     "stats" : ["group1", "group2"]
        // }
        // end::189a921df2f5b1fe580937210ce9c1c2[]

        $curl = 'POST /_search'
              . '{'
              . '    "query" : {'
              . '        "match_all" : {}'
              . '    },'
              . '    "stats" : ["group1", "group2"]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
