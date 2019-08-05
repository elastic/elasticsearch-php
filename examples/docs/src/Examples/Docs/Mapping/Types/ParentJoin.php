<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ParentJoin
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/types/parent-join.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ParentJoin extends SimpleExamplesTester {

    /**
     * Tag:  59a6a91a43e92b9f7035eadae9e1b8b9
     * Line: 14
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL14_59a6a91a43e92b9f7035eadae9e1b8b9()
    {
        $client = $this->getClient();
        // tag::59a6a91a43e92b9f7035eadae9e1b8b9[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "my_join_field": { \<1>
        //         "type": "join",
        //         "relations": {
        //           "question": "answer" \<2>
        //         }
        //       }
        //     }
        //   }
        // }
        // end::59a6a91a43e92b9f7035eadae9e1b8b9[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "my_join_field": { \<1>'
              . '        "type": "join",'
              . '        "relations": {'
              . '          "question": "answer" \<2>'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3a9297c0898dfe7b38da82635b7dc1ff
     * Line: 39
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL39_3a9297c0898dfe7b38da82635b7dc1ff()
    {
        $client = $this->getClient();
        // tag::3a9297c0898dfe7b38da82635b7dc1ff[]
        // TODO -- Implement Example
        // PUT my_index/_doc/1?refresh
        // {
        //   "text": "This is a question",
        //   "my_join_field": {
        //     "name": "question" \<1>
        //   }
        // }
        // PUT my_index/_doc/2?refresh
        // {
        //   "text": "This is another question",
        //   "my_join_field": {
        //     "name": "question"
        //   }
        // }
        // end::3a9297c0898dfe7b38da82635b7dc1ff[]

        $curl = 'PUT my_index/_doc/1?refresh'
              . '{'
              . '  "text": "This is a question",'
              . '  "my_join_field": {'
              . '    "name": "question" \<1>'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/2?refresh'
              . '{'
              . '  "text": "This is another question",'
              . '  "my_join_field": {'
              . '    "name": "question"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  fcfe9592f9c8a59fe2b2110246b9a462
     * Line: 65
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL65_fcfe9592f9c8a59fe2b2110246b9a462()
    {
        $client = $this->getClient();
        // tag::fcfe9592f9c8a59fe2b2110246b9a462[]
        // TODO -- Implement Example
        // PUT my_index/_doc/1?refresh
        // {
        //   "text": "This is a question",
        //   "my_join_field": "question" \<1>
        // }
        // PUT my_index/_doc/2?refresh
        // {
        //   "text": "This is another question",
        //   "my_join_field": "question"
        // }
        // end::fcfe9592f9c8a59fe2b2110246b9a462[]

        $curl = 'PUT my_index/_doc/1?refresh'
              . '{'
              . '  "text": "This is a question",'
              . '  "my_join_field": "question" \<1>'
              . '}'
              . 'PUT my_index/_doc/2?refresh'
              . '{'
              . '  "text": "This is another question",'
              . '  "my_join_field": "question"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1d13c92896ed8a8bd273773481c90a3c
     * Line: 92
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL92_1d13c92896ed8a8bd273773481c90a3c()
    {
        $client = $this->getClient();
        // tag::1d13c92896ed8a8bd273773481c90a3c[]
        // TODO -- Implement Example
        // PUT my_index/_doc/3?routing=1&refresh \<1>
        // {
        //   "text": "This is an answer",
        //   "my_join_field": {
        //     "name": "answer", \<2>
        //     "parent": "1" \<3>
        //   }
        // }
        // PUT my_index/_doc/4?routing=1&refresh
        // {
        //   "text": "This is another answer",
        //   "my_join_field": {
        //     "name": "answer",
        //     "parent": "1"
        //   }
        // }
        // end::1d13c92896ed8a8bd273773481c90a3c[]

        $curl = 'PUT my_index/_doc/3?routing=1&refresh \<1>'
              . '{'
              . '  "text": "This is an answer",'
              . '  "my_join_field": {'
              . '    "name": "answer", \<2>'
              . '    "parent": "1" \<3>'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/4?routing=1&refresh'
              . '{'
              . '  "text": "This is another answer",'
              . '  "my_join_field": {'
              . '    "name": "answer",'
              . '    "parent": "1"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a5e3a4c6dbda1f1cd7f22720ef362de2
     * Line: 160
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL160_a5e3a4c6dbda1f1cd7f22720ef362de2()
    {
        $client = $this->getClient();
        // tag::a5e3a4c6dbda1f1cd7f22720ef362de2[]
        // TODO -- Implement Example
        // GET my_index/_search
        // {
        //   "query": {
        //     "match_all": {}
        //   },
        //   "sort": ["_id"]
        // }
        // end::a5e3a4c6dbda1f1cd7f22720ef362de2[]

        $curl = 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "match_all": {}'
              . '  },'
              . '  "sort": ["_id"]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  26fe7b3c9aeab972725b6d708cc6df22
     * Line: 268
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL268_26fe7b3c9aeab972725b6d708cc6df22()
    {
        $client = $this->getClient();
        // tag::26fe7b3c9aeab972725b6d708cc6df22[]
        // TODO -- Implement Example
        // GET my_index/_search
        // {
        //   "query": {
        //     "parent_id": { \<1>
        //       "type": "answer",
        //       "id": "1"
        //     }
        //   },
        //   "aggs": {
        //     "parents": {
        //       "terms": {
        //         "field": "my_join_field#question", \<2>
        //         "size": 10
        //       }
        //     }
        //   },
        //   "script_fields": {
        //     "parent": {
        //       "script": {
        //          "source": "doc['my_join_field#question']" \<3>
        //       }
        //     }
        //   }
        // }
        // end::26fe7b3c9aeab972725b6d708cc6df22[]

        $curl = 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "parent_id": { \<1>'
              . '      "type": "answer",'
              . '      "id": "1"'
              . '    }'
              . '  },'
              . '  "aggs": {'
              . '    "parents": {'
              . '      "terms": {'
              . '        "field": "my_join_field#question", \<2>'
              . '        "size": 10'
              . '      }'
              . '    }'
              . '  },'
              . '  "script_fields": {'
              . '    "parent": {'
              . '      "script": {'
              . '         "source": "doc['my_join_field#question']" \<3>'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e0b414b45460d424ab838b5136492fa1
     * Line: 322
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL322_e0b414b45460d424ab838b5136492fa1()
    {
        $client = $this->getClient();
        // tag::e0b414b45460d424ab838b5136492fa1[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "my_join_field": {
        //         "type": "join",
        //         "relations": {
        //            "question": "answer"
        //         },
        //         "eager_global_ordinals": false
        //       }
        //     }
        //   }
        // }
        // end::e0b414b45460d424ab838b5136492fa1[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "my_join_field": {'
              . '        "type": "join",'
              . '        "relations": {'
              . '           "question": "answer"'
              . '        },'
              . '        "eager_global_ordinals": false'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2c090fe7ec7b66b3f5c178d71c46323b
     * Line: 344
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL344_2c090fe7ec7b66b3f5c178d71c46323b()
    {
        $client = $this->getClient();
        // tag::2c090fe7ec7b66b3f5c178d71c46323b[]
        // TODO -- Implement Example
        // # Per-index
        // GET _stats/fielddata?human&fields=my_join_field#question
        // # Per-node per-index
        // GET _nodes/stats/indices/fielddata?human&fields=my_join_field#question
        // end::2c090fe7ec7b66b3f5c178d71c46323b[]

        $curl = '# Per-index'
              . 'GET _stats/fielddata?human&fields=my_join_field#question'
              . '# Per-node per-index'
              . 'GET _nodes/stats/indices/fielddata?human&fields=my_join_field#question';

        // TODO -- make assertion
    }

    /**
     * Tag:  bc358cfd219faf9353cb65820981a0df
     * Line: 359
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL359_bc358cfd219faf9353cb65820981a0df()
    {
        $client = $this->getClient();
        // tag::bc358cfd219faf9353cb65820981a0df[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "my_join_field": {
        //         "type": "join",
        //         "relations": {
        //           "question": ["answer", "comment"]  \<1>
        //         }
        //       }
        //     }
        //   }
        // }
        // end::bc358cfd219faf9353cb65820981a0df[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "my_join_field": {'
              . '        "type": "join",'
              . '        "relations": {'
              . '          "question": ["answer", "comment"]  \<1>'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1cc03b9715d9a3f876f7b7bb7fe66394
     * Line: 387
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL387_1cc03b9715d9a3f876f7b7bb7fe66394()
    {
        $client = $this->getClient();
        // tag::1cc03b9715d9a3f876f7b7bb7fe66394[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "my_join_field": {
        //         "type": "join",
        //         "relations": {
        //           "question": ["answer", "comment"],  \<1>
        //           "answer": "vote" \<2>
        //         }
        //       }
        //     }
        //   }
        // }
        // end::1cc03b9715d9a3f876f7b7bb7fe66394[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "my_join_field": {'
              . '        "type": "join",'
              . '        "relations": {'
              . '          "question": ["answer", "comment"],  \<1>'
              . '          "answer": "vote" \<2>'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6eecf0fbf95d132beb0f49b3181da419
     * Line: 423
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL423_6eecf0fbf95d132beb0f49b3181da419()
    {
        $client = $this->getClient();
        // tag::6eecf0fbf95d132beb0f49b3181da419[]
        // TODO -- Implement Example
        // PUT my_index/_doc/3?routing=1&refresh \<1>
        // {
        //   "text": "This is a vote",
        //   "my_join_field": {
        //     "name": "vote",
        //     "parent": "2" \<2>
        //   }
        // }
        // end::6eecf0fbf95d132beb0f49b3181da419[]

        $curl = 'PUT my_index/_doc/3?routing=1&refresh \<1>'
              . '{'
              . '  "text": "This is a vote",'
              . '  "my_join_field": {'
              . '    "name": "vote",'
              . '    "parent": "2" \<2>'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%












}
