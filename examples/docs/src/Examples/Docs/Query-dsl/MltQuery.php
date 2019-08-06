<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MltQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/mlt-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MltQuery extends SimpleExamplesTester {

    /**
     * Tag:  32db70e5e08349aa254788ab4a2c4a51
     * Line: 19
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL19_32db70e5e08349aa254788ab4a2c4a51()
    {
        $client = $this->getClient();
        // tag::32db70e5e08349aa254788ab4a2c4a51[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "more_like_this" : {
        //             "fields" : ["title", "description"],
        //             "like" : "Once upon a time",
        //             "min_term_freq" : 1,
        //             "max_query_terms" : 12
        //         }
        //     }
        // }
        // end::32db70e5e08349aa254788ab4a2c4a51[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "more_like_this" : {'
              . '            "fields" : ["title", "description"],'
              . '            "like" : "Once upon a time",'
              . '            "min_term_freq" : 1,'
              . '            "max_query_terms" : 12'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  cba099b82792fa5ba7741d00483c2b47
     * Line: 39
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL39_cba099b82792fa5ba7741d00483c2b47()
    {
        $client = $this->getClient();
        // tag::cba099b82792fa5ba7741d00483c2b47[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "more_like_this" : {
        //             "fields" : ["title", "description"],
        //             "like" : [
        //             {
        //                 "_index" : "imdb",
        //                 "_id" : "1"
        //             },
        //             {
        //                 "_index" : "imdb",
        //                 "_id" : "2"
        //             },
        //             "and potentially some more text here as well"
        //             ],
        //             "min_term_freq" : 1,
        //             "max_query_terms" : 12
        //         }
        //     }
        // }
        // end::cba099b82792fa5ba7741d00483c2b47[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "more_like_this" : {'
              . '            "fields" : ["title", "description"],'
              . '            "like" : ['
              . '            {'
              . '                "_index" : "imdb",'
              . '                "_id" : "1"'
              . '            },'
              . '            {'
              . '                "_index" : "imdb",'
              . '                "_id" : "2"'
              . '            },'
              . '            "and potentially some more text here as well"'
              . '            ],'
              . '            "min_term_freq" : 1,'
              . '            "max_query_terms" : 12'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  33f77a3b80f33323faa091538220de2a
     * Line: 69
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL69_33f77a3b80f33323faa091538220de2a()
    {
        $client = $this->getClient();
        // tag::33f77a3b80f33323faa091538220de2a[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "more_like_this" : {
        //             "fields" : ["name.first", "name.last"],
        //             "like" : [
        //             {
        //                 "_index" : "marvel",
        //                 "doc" : {
        //                     "name": {
        //                         "first": "Ben",
        //                         "last": "Grimm"
        //                     },
        //                     "_doc": "You got no idea what I\'d... what I\'d give to be invisible."
        //                   }
        //             },
        //             {
        //                 "_index" : "marvel",
        //                 "_id" : "2"
        //             }
        //             ],
        //             "min_term_freq" : 1,
        //             "max_query_terms" : 12
        //         }
        //     }
        // }
        // end::33f77a3b80f33323faa091538220de2a[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "more_like_this" : {'
              . '            "fields" : ["name.first", "name.last"],'
              . '            "like" : ['
              . '            {'
              . '                "_index" : "marvel",'
              . '                "doc" : {'
              . '                    "name": {'
              . '                        "first": "Ben",'
              . '                        "last": "Grimm"'
              . '                    },'
              . '                    "_doc": "You got no idea what I\'d... what I\'d give to be invisible."'
              . '                  }'
              . '            },'
              . '            {'
              . '                "_index" : "marvel",'
              . '                "_id" : "2"'
              . '            }'
              . '            ],'
              . '            "min_term_freq" : 1,'
              . '            "max_query_terms" : 12'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  084b3e3ff6f22c1c9a56b79760f50b36
     * Line: 124
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL124_084b3e3ff6f22c1c9a56b79760f50b36()
    {
        $client = $this->getClient();
        // tag::084b3e3ff6f22c1c9a56b79760f50b36[]
        // TODO -- Implement Example
        // PUT /imdb
        // {
        //     "mappings": {
        //         "properties": {
        //             "title": {
        //                 "type": "text",
        //                 "term_vector": "yes"
        //             },
        //             "description": {
        //                 "type": "text"
        //             },
        //             "tags": {
        //                 "type": "text",
        //                 "fields" : {
        //                     "raw": {
        //                         "type" : "text",
        //                         "analyzer": "keyword",
        //                         "term_vector" : "yes"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::084b3e3ff6f22c1c9a56b79760f50b36[]

        $curl = 'PUT /imdb'
              . '{'
              . '    "mappings": {'
              . '        "properties": {'
              . '            "title": {'
              . '                "type": "text",'
              . '                "term_vector": "yes"'
              . '            },'
              . '            "description": {'
              . '                "type": "text"'
              . '            },'
              . '            "tags": {'
              . '                "type": "text",'
              . '                "fields" : {'
              . '                    "raw": {'
              . '                        "type" : "text",'
              . '                        "analyzer": "keyword",'
              . '                        "term_vector" : "yes"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
