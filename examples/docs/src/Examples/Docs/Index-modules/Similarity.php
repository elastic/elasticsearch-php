<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Index-modules;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Similarity
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   index-modules/similarity.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Similarity extends SimpleExamplesTester {

    /**
     * Tag:  ce12fedff96537d4a5169724225f4287
     * Line: 22
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL22_ce12fedff96537d4a5169724225f4287()
    {
        $client = $this->getClient();
        // tag::ce12fedff96537d4a5169724225f4287[]
        // TODO -- Implement Example
        // PUT /index
        // {
        //     "settings" : {
        //         "index" : {
        //             "similarity" : {
        //               "my_similarity" : {
        //                 "type" : "DFR",
        //                 "basic_model" : "g",
        //                 "after_effect" : "l",
        //                 "normalization" : "h2",
        //                 "normalization.h2.c" : "3.0"
        //               }
        //             }
        //         }
        //     }
        // }
        // end::ce12fedff96537d4a5169724225f4287[]

        $curl = 'PUT /index'
              . '{'
              . '    "settings" : {'
              . '        "index" : {'
              . '            "similarity" : {'
              . '              "my_similarity" : {'
              . '                "type" : "DFR",'
              . '                "basic_model" : "g",'
              . '                "after_effect" : "l",'
              . '                "normalization" : "h2",'
              . '                "normalization.h2.c" : "3.0"'
              . '              }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  528e5f1c345c3769248cc6889e8cf552
     * Line: 46
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL46_528e5f1c345c3769248cc6889e8cf552()
    {
        $client = $this->getClient();
        // tag::528e5f1c345c3769248cc6889e8cf552[]
        // TODO -- Implement Example
        // PUT /index/_mapping
        // {
        //   "properties" : {
        //     "title" : { "type" : "text", "similarity" : "my_similarity" }
        //   }
        // }
        // end::528e5f1c345c3769248cc6889e8cf552[]

        $curl = 'PUT /index/_mapping'
              . '{'
              . '  "properties" : {'
              . '    "title" : { "type" : "text", "similarity" : "my_similarity" }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  dfa16b7300d225e013f23625f44c087b
     * Line: 194
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL194_dfa16b7300d225e013f23625f44c087b()
    {
        $client = $this->getClient();
        // tag::dfa16b7300d225e013f23625f44c087b[]
        // TODO -- Implement Example
        // PUT /index
        // {
        //   "settings": {
        //     "number_of_shards": 1,
        //     "similarity": {
        //       "scripted_tfidf": {
        //         "type": "scripted",
        //         "script": {
        //           "source": "double tf = Math.sqrt(doc.freq); double idf = Math.log((field.docCount+1.0)/(term.docFreq+1.0)) + 1.0; double norm = 1/Math.sqrt(doc.length); return query.boost * tf * idf * norm;"
        //         }
        //       }
        //     }
        //   },
        //   "mappings": {
        //     "properties": {
        //       "field": {
        //         "type": "text",
        //         "similarity": "scripted_tfidf"
        //       }
        //     }
        //   }
        // }
        // PUT /index/_doc/1
        // {
        //   "field": "foo bar foo"
        // }
        // PUT /index/_doc/2
        // {
        //   "field": "bar baz"
        // }
        // POST /index/_refresh
        // GET /index/_search?explain=true
        // {
        //   "query": {
        //     "query_string": {
        //       "query": "foo^1.7",
        //       "default_field": "field"
        //     }
        //   }
        // }
        // end::dfa16b7300d225e013f23625f44c087b[]

        $curl = 'PUT /index'
              . '{'
              . '  "settings": {'
              . '    "number_of_shards": 1,'
              . '    "similarity": {'
              . '      "scripted_tfidf": {'
              . '        "type": "scripted",'
              . '        "script": {'
              . '          "source": "double tf = Math.sqrt(doc.freq); double idf = Math.log((field.docCount+1.0)/(term.docFreq+1.0)) + 1.0; double norm = 1/Math.sqrt(doc.length); return query.boost * tf * idf * norm;"'
              . '        }'
              . '      }'
              . '    }'
              . '  },'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "field": {'
              . '        "type": "text",'
              . '        "similarity": "scripted_tfidf"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT /index/_doc/1'
              . '{'
              . '  "field": "foo bar foo"'
              . '}'
              . 'PUT /index/_doc/2'
              . '{'
              . '  "field": "bar baz"'
              . '}'
              . 'POST /index/_refresh'
              . 'GET /index/_search?explain=true'
              . '{'
              . '  "query": {'
              . '    "query_string": {'
              . '      "query": "foo^1.7",'
              . '      "default_field": "field"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5f8fb5513d4f725434db2f517ad4298f
     * Line: 361
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL361_5f8fb5513d4f725434db2f517ad4298f()
    {
        $client = $this->getClient();
        // tag::5f8fb5513d4f725434db2f517ad4298f[]
        // TODO -- Implement Example
        // PUT /index
        // {
        //   "settings": {
        //     "number_of_shards": 1,
        //     "similarity": {
        //       "scripted_tfidf": {
        //         "type": "scripted",
        //         "weight_script": {
        //           "source": "double idf = Math.log((field.docCount+1.0)/(term.docFreq+1.0)) + 1.0; return query.boost * idf;"
        //         },
        //         "script": {
        //           "source": "double tf = Math.sqrt(doc.freq); double norm = 1/Math.sqrt(doc.length); return weight * tf * norm;"
        //         }
        //       }
        //     }
        //   },
        //   "mappings": {
        //     "properties": {
        //       "field": {
        //         "type": "text",
        //         "similarity": "scripted_tfidf"
        //       }
        //     }
        //   }
        // }
        // end::5f8fb5513d4f725434db2f517ad4298f[]

        $curl = 'PUT /index'
              . '{'
              . '  "settings": {'
              . '    "number_of_shards": 1,'
              . '    "similarity": {'
              . '      "scripted_tfidf": {'
              . '        "type": "scripted",'
              . '        "weight_script": {'
              . '          "source": "double idf = Math.log((field.docCount+1.0)/(term.docFreq+1.0)) + 1.0; return query.boost * idf;"'
              . '        },'
              . '        "script": {'
              . '          "source": "double tf = Math.sqrt(doc.freq); double norm = 1/Math.sqrt(doc.length); return weight * tf * norm;"'
              . '        }'
              . '      }'
              . '    }'
              . '  },'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "field": {'
              . '        "type": "text",'
              . '        "similarity": "scripted_tfidf"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  553d79817bb1333970e99507c37a159a
     * Line: 527
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL527_553d79817bb1333970e99507c37a159a()
    {
        $client = $this->getClient();
        // tag::553d79817bb1333970e99507c37a159a[]
        // TODO -- Implement Example
        // PUT /index
        // {
        //   "settings": {
        //     "index": {
        //       "similarity": {
        //         "default": {
        //           "type": "boolean"
        //         }
        //       }
        //     }
        //   }
        // }
        // end::553d79817bb1333970e99507c37a159a[]

        $curl = 'PUT /index'
              . '{'
              . '  "settings": {'
              . '    "index": {'
              . '      "similarity": {'
              . '        "default": {'
              . '          "type": "boolean"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  48de51de87a8ad9fd8b8db1ca25b85c1
     * Line: 548
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL548_48de51de87a8ad9fd8b8db1ca25b85c1()
    {
        $client = $this->getClient();
        // tag::48de51de87a8ad9fd8b8db1ca25b85c1[]
        // TODO -- Implement Example
        // POST /index/_close
        // PUT /index/_settings
        // {
        //   "index": {
        //     "similarity": {
        //       "default": {
        //         "type": "boolean"
        //       }
        //     }
        //   }
        // }
        // POST /index/_open
        // end::48de51de87a8ad9fd8b8db1ca25b85c1[]

        $curl = 'POST /index/_close'
              . 'PUT /index/_settings'
              . '{'
              . '  "index": {'
              . '    "similarity": {'
              . '      "default": {'
              . '        "type": "boolean"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST /index/_open';

        // TODO -- make assertion
    }

// %__METHOD__%







}
