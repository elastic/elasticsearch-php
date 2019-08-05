<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Percolator
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/types/percolator.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Percolator extends SimpleExamplesTester {

    /**
     * Tag:  05c14dd0bda732cfa36f7fb88138d98e
     * Line: 20
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL20_05c14dd0bda732cfa36f7fb88138d98e()
    {
        $client = $this->getClient();
        // tag::05c14dd0bda732cfa36f7fb88138d98e[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //     "mappings": {
        //         "properties": {
        //             "query": {
        //                 "type": "percolator"
        //             },
        //             "field": {
        //                 "type": "text"
        //             }
        //         }
        //     }
        // }
        // end::05c14dd0bda732cfa36f7fb88138d98e[]

        $curl = 'PUT my_index'
              . '{'
              . '    "mappings": {'
              . '        "properties": {'
              . '            "query": {'
              . '                "type": "percolator"'
              . '            },'
              . '            "field": {'
              . '                "type": "text"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  dc1f917924b43416a9ec7f8c9505f885
     * Line: 41
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL41_dc1f917924b43416a9ec7f8c9505f885()
    {
        $client = $this->getClient();
        // tag::dc1f917924b43416a9ec7f8c9505f885[]
        // TODO -- Implement Example
        // PUT my_index/_doc/match_value
        // {
        //     "query" : {
        //         "match" : {
        //             "field" : "value"
        //         }
        //     }
        // }
        // end::dc1f917924b43416a9ec7f8c9505f885[]

        $curl = 'PUT my_index/_doc/match_value'
              . '{'
              . '    "query" : {'
              . '        "match" : {'
              . '            "field" : "value"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3eb4cdd4a799a117ac1ff5f02b18a512
     * Line: 72
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL72_3eb4cdd4a799a117ac1ff5f02b18a512()
    {
        $client = $this->getClient();
        // tag::3eb4cdd4a799a117ac1ff5f02b18a512[]
        // TODO -- Implement Example
        // PUT index
        // {
        //   "mappings": {
        //     "properties": {
        //       "query" : {
        //         "type" : "percolator"
        //       },
        //       "body" : {
        //         "type": "text"
        //       }
        //     }
        //   }
        // }
        // POST _aliases
        // {
        //   "actions": [
        //     {
        //       "add": {
        //         "index": "index",
        //         "alias": "queries" \<1>
        //       }
        //     }
        //   ]
        // }
        // PUT queries/_doc/1?refresh
        // {
        //   "query" : {
        //     "match" : {
        //       "body" : "quick brown fox"
        //     }
        //   }
        // }
        // end::3eb4cdd4a799a117ac1ff5f02b18a512[]

        $curl = 'PUT index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "query" : {'
              . '        "type" : "percolator"'
              . '      },'
              . '      "body" : {'
              . '        "type": "text"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST _aliases'
              . '{'
              . '  "actions": ['
              . '    {'
              . '      "add": {'
              . '        "index": "index",'
              . '        "alias": "queries" \<1>'
              . '      }'
              . '    }'
              . '  ]'
              . '}'
              . 'PUT queries/_doc/1?refresh'
              . '{'
              . '  "query" : {'
              . '    "match" : {'
              . '      "body" : "quick brown fox"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f09817fd13ff3dce52eb79d0722409c3
     * Line: 118
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL118_f09817fd13ff3dce52eb79d0722409c3()
    {
        $client = $this->getClient();
        // tag::f09817fd13ff3dce52eb79d0722409c3[]
        // TODO -- Implement Example
        // PUT new_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "query" : {
        //         "type" : "percolator"
        //       },
        //       "body" : {
        //         "type": "text"
        //       }
        //     }
        //   }
        // }
        // POST /_reindex?refresh
        // {
        //   "source": {
        //     "index": "index"
        //   },
        //   "dest": {
        //     "index": "new_index"
        //   }
        // }
        // POST _aliases
        // {
        //   "actions": [ \<1>
        //     {
        //       "remove": {
        //         "index" : "index",
        //         "alias": "queries"
        //       }
        //     },
        //     {
        //       "add": {
        //         "index": "new_index",
        //         "alias": "queries"
        //       }
        //     }
        //   ]
        // }
        // end::f09817fd13ff3dce52eb79d0722409c3[]

        $curl = 'PUT new_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "query" : {'
              . '        "type" : "percolator"'
              . '      },'
              . '      "body" : {'
              . '        "type": "text"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST /_reindex?refresh'
              . '{'
              . '  "source": {'
              . '    "index": "index"'
              . '  },'
              . '  "dest": {'
              . '    "index": "new_index"'
              . '  }'
              . '}'
              . 'POST _aliases'
              . '{'
              . '  "actions": [ \<1>'
              . '    {'
              . '      "remove": {'
              . '        "index" : "index",'
              . '        "alias": "queries"'
              . '      }'
              . '    },'
              . '    {'
              . '      "add": {'
              . '        "index": "new_index",'
              . '        "alias": "queries"'
              . '      }'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  60cab62af1540db2ad3b696b0ee1d7a8
     * Line: 169
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL169_60cab62af1540db2ad3b696b0ee1d7a8()
    {
        $client = $this->getClient();
        // tag::60cab62af1540db2ad3b696b0ee1d7a8[]
        // TODO -- Implement Example
        // GET /queries/_search
        // {
        //   "query": {
        //     "percolate" : {
        //       "field" : "query",
        //       "document" : {
        //         "body" : "fox jumps over the lazy dog"
        //       }
        //     }
        //   }
        // }
        // end::60cab62af1540db2ad3b696b0ee1d7a8[]

        $curl = 'GET /queries/_search'
              . '{'
              . '  "query": {'
              . '    "percolate" : {'
              . '      "field" : "query",'
              . '      "document" : {'
              . '        "body" : "fox jumps over the lazy dog"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  360c4f373e72ba861584ee85bd218124
     * Line: 268
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL268_360c4f373e72ba861584ee85bd218124()
    {
        $client = $this->getClient();
        // tag::360c4f373e72ba861584ee85bd218124[]
        // TODO -- Implement Example
        // PUT /test_index
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "my_analyzer" : {
        //           "tokenizer": "standard",
        //           "filter" : ["lowercase", "porter_stem"]
        //         }
        //       }
        //     }
        //   },
        //   "mappings": {
        //     "properties": {
        //       "query" : {
        //         "type": "percolator"
        //       },
        //       "body" : {
        //         "type": "text",
        //         "analyzer": "my_analyzer" \<1>
        //       }
        //     }
        //   }
        // }
        // end::360c4f373e72ba861584ee85bd218124[]

        $curl = 'PUT /test_index'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "my_analyzer" : {'
              . '          "tokenizer": "standard",'
              . '          "filter" : ["lowercase", "porter_stem"]'
              . '        }'
              . '      }'
              . '    }'
              . '  },'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "query" : {'
              . '        "type": "percolator"'
              . '      },'
              . '      "body" : {'
              . '        "type": "text",'
              . '        "analyzer": "my_analyzer" \<1>'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3e13c8a81f40a537eddc0b57633b45f8
     * Line: 302
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL302_3e13c8a81f40a537eddc0b57633b45f8()
    {
        $client = $this->getClient();
        // tag::3e13c8a81f40a537eddc0b57633b45f8[]
        // TODO -- Implement Example
        // POST /test_index/_analyze
        // {
        //   "analyzer" : "my_analyzer",
        //   "text" : "missing bicycles"
        // }
        // end::3e13c8a81f40a537eddc0b57633b45f8[]

        $curl = 'POST /test_index/_analyze'
              . '{'
              . '  "analyzer" : "my_analyzer",'
              . '  "text" : "missing bicycles"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7a2b9a7b2b6553a48bd4db60a939c0fc
     * Line: 340
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL340_7a2b9a7b2b6553a48bd4db60a939c0fc()
    {
        $client = $this->getClient();
        // tag::7a2b9a7b2b6553a48bd4db60a939c0fc[]
        // TODO -- Implement Example
        // PUT /test_index/_doc/1?refresh
        // {
        //   "query" : {
        //     "match" : {
        //       "body" : {
        //         "query" : "miss bicycl",
        //         "analyzer" : "whitespace" \<1>
        //       }
        //     }
        //   }
        // }
        // end::7a2b9a7b2b6553a48bd4db60a939c0fc[]

        $curl = 'PUT /test_index/_doc/1?refresh'
              . '{'
              . '  "query" : {'
              . '    "match" : {'
              . '      "body" : {'
              . '        "query" : "miss bicycl",'
              . '        "analyzer" : "whitespace" \<1>'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  45813d971bfa890ffa2f51f3f480cce5
     * Line: 365
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL365_45813d971bfa890ffa2f51f3f480cce5()
    {
        $client = $this->getClient();
        // tag::45813d971bfa890ffa2f51f3f480cce5[]
        // TODO -- Implement Example
        // GET /test_index/_search
        // {
        //   "query": {
        //     "percolate" : {
        //       "field" : "query",
        //       "document" : {
        //         "body" : "Bycicles are missing"
        //       }
        //     }
        //   }
        // }
        // end::45813d971bfa890ffa2f51f3f480cce5[]

        $curl = 'GET /test_index/_search'
              . '{'
              . '  "query": {'
              . '    "percolate" : {'
              . '      "field" : "query",'
              . '      "document" : {'
              . '        "body" : "Bycicles are missing"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a04a8d90f8245ff5f30a9983909faa1d
     * Line: 439
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL439_a04a8d90f8245ff5f30a9983909faa1d()
    {
        $client = $this->getClient();
        // tag::a04a8d90f8245ff5f30a9983909faa1d[]
        // TODO -- Implement Example
        // PUT my_queries1
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "wildcard_prefix": { \<1>
        //           "type": "custom",
        //           "tokenizer": "standard",
        //           "filter": [
        //             "lowercase",
        //             "wildcard_edge_ngram"
        //           ]
        //         }
        //       },
        //       "filter": {
        //         "wildcard_edge_ngram": { \<2>
        //           "type": "edge_ngram",
        //           "min_gram": 1,
        //           "max_gram": 32
        //         }
        //       }
        //     }
        //   },
        //   "mappings": {
        //     "properties": {
        //       "query": {
        //         "type": "percolator"
        //       },
        //       "my_field": {
        //         "type": "text",
        //         "fields": {
        //           "prefix": { \<3>
        //             "type": "text",
        //             "analyzer": "wildcard_prefix",
        //             "search_analyzer": "standard"
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::a04a8d90f8245ff5f30a9983909faa1d[]

        $curl = 'PUT my_queries1'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "wildcard_prefix": { \<1>'
              . '          "type": "custom",'
              . '          "tokenizer": "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "wildcard_edge_ngram"'
              . '          ]'
              . '        }'
              . '      },'
              . '      "filter": {'
              . '        "wildcard_edge_ngram": { \<2>'
              . '          "type": "edge_ngram",'
              . '          "min_gram": 1,'
              . '          "max_gram": 32'
              . '        }'
              . '      }'
              . '    }'
              . '  },'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "query": {'
              . '        "type": "percolator"'
              . '      },'
              . '      "my_field": {'
              . '        "type": "text",'
              . '        "fields": {'
              . '          "prefix": { \<3>'
              . '            "type": "text",'
              . '            "analyzer": "wildcard_prefix",'
              . '            "search_analyzer": "standard"'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ed688d86eeaa4d7969acb0f574eb917f
     * Line: 508
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL508_ed688d86eeaa4d7969acb0f574eb917f()
    {
        $client = $this->getClient();
        // tag::ed688d86eeaa4d7969acb0f574eb917f[]
        // TODO -- Implement Example
        // PUT /my_queries1/_doc/1?refresh
        // {
        //   "query": {
        //     "term": {
        //       "my_field.prefix": "abc"
        //     }
        //   }
        // }
        // end::ed688d86eeaa4d7969acb0f574eb917f[]

        $curl = 'PUT /my_queries1/_doc/1?refresh'
              . '{'
              . '  "query": {'
              . '    "term": {'
              . '      "my_field.prefix": "abc"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d2f6040c058a9555dfa62bb42d896a8f
     * Line: 527
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL527_d2f6040c058a9555dfa62bb42d896a8f()
    {
        $client = $this->getClient();
        // tag::d2f6040c058a9555dfa62bb42d896a8f[]
        // TODO -- Implement Example
        // GET /my_queries1/_search
        // {
        //   "query": {
        //     "percolate": {
        //       "field": "query",
        //       "document": {
        //         "my_field": "abcd"
        //       }
        //     }
        //   }
        // }
        // end::d2f6040c058a9555dfa62bb42d896a8f[]

        $curl = 'GET /my_queries1/_search'
              . '{'
              . '  "query": {'
              . '    "percolate": {'
              . '      "field": "query",'
              . '      "document": {'
              . '        "my_field": "abcd"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  343dd09a8c76987e586858be3bdc51eb
     * Line: 590
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL590_343dd09a8c76987e586858be3bdc51eb()
    {
        $client = $this->getClient();
        // tag::343dd09a8c76987e586858be3bdc51eb[]
        // TODO -- Implement Example
        // PUT my_queries2
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "wildcard_suffix": {
        //           "type": "custom",
        //           "tokenizer": "standard",
        //           "filter": [
        //             "lowercase",
        //             "reverse",
        //             "wildcard_edge_ngram"
        //           ]
        //         },
        //         "wildcard_suffix_search_time": {
        //           "type": "custom",
        //           "tokenizer": "standard",
        //           "filter": [
        //             "lowercase",
        //             "reverse"
        //           ]
        //         }
        //       },
        //       "filter": {
        //         "wildcard_edge_ngram": {
        //           "type": "edge_ngram",
        //           "min_gram": 1,
        //           "max_gram": 32
        //         }
        //       }
        //     }
        //   },
        //   "mappings": {
        //     "properties": {
        //       "query": {
        //         "type": "percolator"
        //       },
        //       "my_field": {
        //         "type": "text",
        //         "fields": {
        //           "suffix": {
        //             "type": "text",
        //             "analyzer": "wildcard_suffix",
        //             "search_analyzer": "wildcard_suffix_search_time" \<1>
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::343dd09a8c76987e586858be3bdc51eb[]

        $curl = 'PUT my_queries2'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "wildcard_suffix": {'
              . '          "type": "custom",'
              . '          "tokenizer": "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "reverse",'
              . '            "wildcard_edge_ngram"'
              . '          ]'
              . '        },'
              . '        "wildcard_suffix_search_time": {'
              . '          "type": "custom",'
              . '          "tokenizer": "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "reverse"'
              . '          ]'
              . '        }'
              . '      },'
              . '      "filter": {'
              . '        "wildcard_edge_ngram": {'
              . '          "type": "edge_ngram",'
              . '          "min_gram": 1,'
              . '          "max_gram": 32'
              . '        }'
              . '      }'
              . '    }'
              . '  },'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "query": {'
              . '        "type": "percolator"'
              . '      },'
              . '      "my_field": {'
              . '        "type": "text",'
              . '        "fields": {'
              . '          "suffix": {'
              . '            "type": "text",'
              . '            "analyzer": "wildcard_suffix",'
              . '            "search_analyzer": "wildcard_suffix_search_time" \<1>'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  bd7330af2609bdd8aa10958f5e640b93
     * Line: 666
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL666_bd7330af2609bdd8aa10958f5e640b93()
    {
        $client = $this->getClient();
        // tag::bd7330af2609bdd8aa10958f5e640b93[]
        // TODO -- Implement Example
        // PUT /my_queries2/_doc/2?refresh
        // {
        //   "query": {
        //     "match": { \<1>
        //       "my_field.suffix": "xyz"
        //     }
        //   }
        // }
        // end::bd7330af2609bdd8aa10958f5e640b93[]

        $curl = 'PUT /my_queries2/_doc/2?refresh'
              . '{'
              . '  "query": {'
              . '    "match": { \<1>'
              . '      "my_field.suffix": "xyz"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4aa81a694266fb634904224d14cd9a87
     * Line: 686
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL686_4aa81a694266fb634904224d14cd9a87()
    {
        $client = $this->getClient();
        // tag::4aa81a694266fb634904224d14cd9a87[]
        // TODO -- Implement Example
        // GET /my_queries2/_search
        // {
        //   "query": {
        //     "percolate": {
        //       "field": "query",
        //       "document": {
        //         "my_field": "wxyz"
        //       }
        //     }
        //   }
        // }
        // end::4aa81a694266fb634904224d14cd9a87[]

        $curl = 'GET /my_queries2/_search'
              . '{'
              . '  "query": {'
              . '    "percolate": {'
              . '      "field": "query",'
              . '      "document": {'
              . '        "my_field": "wxyz"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%
















}
