<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Vectors;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: VectorFunctions
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   vectors/vector-functions.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class VectorFunctions extends SimpleExamplesTester {

    /**
     * Tag:  d5fe26f952e93d08d427678ffdfdd2cd
     * Line: 21
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL21_d5fe26f952e93d08d427678ffdfdd2cd()
    {
        $client = $this->getClient();
        // tag::d5fe26f952e93d08d427678ffdfdd2cd[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "my_dense_vector": {
        //         "type": "dense_vector",
        //         "dims": 3
        //       },
        //       "my_sparse_vector" : {
        //         "type" : "sparse_vector"
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //   "my_dense_vector": [0.5, 10, 6],
        //   "my_sparse_vector": {"2": 1.5, "15" : 2, "50": -1.1, "4545": 1.1}
        // }
        // PUT my_index/_doc/2
        // {
        //   "my_dense_vector": [-0.5, 10, 10],
        //   "my_sparse_vector": {"2": 2.5, "10" : 1.3, "55": -2.3, "113": 1.6}
        // }
        // end::d5fe26f952e93d08d427678ffdfdd2cd[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "my_dense_vector": {'
              . '        "type": "dense_vector",'
              . '        "dims": 3'
              . '      },'
              . '      "my_sparse_vector" : {'
              . '        "type" : "sparse_vector"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "my_dense_vector": [0.5, 10, 6],'
              . '  "my_sparse_vector": {"2": 1.5, "15" : 2, "50": -1.1, "4545": 1.1}'
              . '}'
              . 'PUT my_index/_doc/2'
              . '{'
              . '  "my_dense_vector": [-0.5, 10, 10],'
              . '  "my_sparse_vector": {"2": 2.5, "10" : 1.3, "55": -2.3, "113": 1.6}'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5ed03b6c95b31d2915c584aacd782eb6
     * Line: 57
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL57_5ed03b6c95b31d2915c584aacd782eb6()
    {
        $client = $this->getClient();
        // tag::5ed03b6c95b31d2915c584aacd782eb6[]
        // TODO -- Implement Example
        // GET my_index/_search
        // {
        //   "query": {
        //     "script_score": {
        //       "query": {
        //         "match_all": {}
        //       },
        //       "script": {
        //         "source": "cosineSimilarity(params.query_vector, doc[\'my_dense_vector\']) + 1.0", \<1>
        //         "params": {
        //           "query_vector": [4, 3.4, -0.2]  \<2>
        //         }
        //       }
        //     }
        //   }
        // }
        // end::5ed03b6c95b31d2915c584aacd782eb6[]

        $curl = 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "script_score": {'
              . '      "query": {'
              . '        "match_all": {}'
              . '      },'
              . '      "script": {'
              . '        "source": "cosineSimilarity(params.query_vector, doc[\'my_dense_vector\']) + 1.0", \<1>'
              . '        "params": {'
              . '          "query_vector": [4, 3.4, -0.2]  \<2>'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  84502fcc20d08a68002cb004be7a2b20
     * Line: 86
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL86_84502fcc20d08a68002cb004be7a2b20()
    {
        $client = $this->getClient();
        // tag::84502fcc20d08a68002cb004be7a2b20[]
        // TODO -- Implement Example
        // GET my_index/_search
        // {
        //   "query": {
        //     "script_score": {
        //       "query": {
        //         "match_all": {}
        //       },
        //       "script": {
        //         "source": "cosineSimilaritySparse(params.query_vector, doc[\'my_sparse_vector\']) + 1.0",
        //         "params": {
        //           "query_vector": {"2": 0.5, "10" : 111.3, "50": -1.3, "113": 14.8, "4545": 156.0}
        //         }
        //       }
        //     }
        //   }
        // }
        // end::84502fcc20d08a68002cb004be7a2b20[]

        $curl = 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "script_score": {'
              . '      "query": {'
              . '        "match_all": {}'
              . '      },'
              . '      "script": {'
              . '        "source": "cosineSimilaritySparse(params.query_vector, doc[\'my_sparse_vector\']) + 1.0",'
              . '        "params": {'
              . '          "query_vector": {"2": 0.5, "10" : 111.3, "50": -1.3, "113": 14.8, "4545": 156.0}'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  52ade18507911d36cb875daf9726412c
     * Line: 110
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL110_52ade18507911d36cb875daf9726412c()
    {
        $client = $this->getClient();
        // tag::52ade18507911d36cb875daf9726412c[]
        // TODO -- Implement Example
        // GET my_index/_search
        // {
        //   "query": {
        //     "script_score": {
        //       "query": {
        //         "match_all": {}
        //       },
        //       "script": {
        //         "source": """
        //           double value = dotProduct(params.query_vector, doc[\'my_dense_vector\']);
        //           return sigmoid(1, Math.E, -value); \<1>
        //         """,
        //         "params": {
        //           "query_vector": [4, 3.4, -0.2]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::52ade18507911d36cb875daf9726412c[]

        $curl = 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "script_score": {'
              . '      "query": {'
              . '        "match_all": {}'
              . '      },'
              . '      "script": {'
              . '        "source": """'
              . '          double value = dotProduct(params.query_vector, doc[\'my_dense_vector\']);'
              . '          return sigmoid(1, Math.E, -value); \<1>'
              . '        """,'
              . '        "params": {'
              . '          "query_vector": [4, 3.4, -0.2]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a33958dc12dfd4364d75c499652be433
     * Line: 139
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL139_a33958dc12dfd4364d75c499652be433()
    {
        $client = $this->getClient();
        // tag::a33958dc12dfd4364d75c499652be433[]
        // TODO -- Implement Example
        // GET my_index/_search
        // {
        //   "query": {
        //     "script_score": {
        //       "query": {
        //         "match_all": {}
        //       },
        //       "script": {
        //         "source": """
        //           double value = dotProductSparse(params.query_vector, doc[\'my_sparse_vector\']);
        //           return sigmoid(1, Math.E, -value);
        //         """,
        //          "params": {
        //           "query_vector": {"2": 0.5, "10" : 111.3, "50": -1.3, "113": 14.8, "4545": 156.0}
        //         }
        //       }
        //     }
        //   }
        // }
        // end::a33958dc12dfd4364d75c499652be433[]

        $curl = 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "script_score": {'
              . '      "query": {'
              . '        "match_all": {}'
              . '      },'
              . '      "script": {'
              . '        "source": """'
              . '          double value = dotProductSparse(params.query_vector, doc[\'my_sparse_vector\']);'
              . '          return sigmoid(1, Math.E, -value);'
              . '        """,'
              . '         "params": {'
              . '          "query_vector": {"2": 0.5, "10" : 111.3, "50": -1.3, "113": 14.8, "4545": 156.0}'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0bb1457dfc484885e8809fc02536b523
     * Line: 167
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL167_0bb1457dfc484885e8809fc02536b523()
    {
        $client = $this->getClient();
        // tag::0bb1457dfc484885e8809fc02536b523[]
        // TODO -- Implement Example
        // GET my_index/_search
        // {
        //   "query": {
        //     "script_score": {
        //       "query": {
        //         "match_all": {}
        //       },
        //       "script": {
        //         "source": "1 / (1 + l1norm(params.queryVector, doc[\'my_dense_vector\']))", \<1>
        //         "params": {
        //           "queryVector": [4, 3.4, -0.2]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::0bb1457dfc484885e8809fc02536b523[]

        $curl = 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "script_score": {'
              . '      "query": {'
              . '        "match_all": {}'
              . '      },'
              . '      "script": {'
              . '        "source": "1 / (1 + l1norm(params.queryVector, doc[\'my_dense_vector\']))", \<1>'
              . '        "params": {'
              . '          "queryVector": [4, 3.4, -0.2]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  08843af9fc77104ef77d8c51a2b7c296
     * Line: 200
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL200_08843af9fc77104ef77d8c51a2b7c296()
    {
        $client = $this->getClient();
        // tag::08843af9fc77104ef77d8c51a2b7c296[]
        // TODO -- Implement Example
        // GET my_index/_search
        // {
        //   "query": {
        //     "script_score": {
        //       "query": {
        //         "match_all": {}
        //       },
        //       "script": {
        //         "source": "1 / (1 + l1normSparse(params.queryVector, doc[\'my_sparse_vector\']))",
        //         "params": {
        //           "queryVector": {"2": 0.5, "10" : 111.3, "50": -1.3, "113": 14.8, "4545": 156.0}
        //         }
        //       }
        //     }
        //   }
        // }
        // end::08843af9fc77104ef77d8c51a2b7c296[]

        $curl = 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "script_score": {'
              . '      "query": {'
              . '        "match_all": {}'
              . '      },'
              . '      "script": {'
              . '        "source": "1 / (1 + l1normSparse(params.queryVector, doc[\'my_sparse_vector\']))",'
              . '        "params": {'
              . '          "queryVector": {"2": 0.5, "10" : 111.3, "50": -1.3, "113": 14.8, "4545": 156.0}'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  24b552802661be085433cf389ce80a40
     * Line: 225
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL225_24b552802661be085433cf389ce80a40()
    {
        $client = $this->getClient();
        // tag::24b552802661be085433cf389ce80a40[]
        // TODO -- Implement Example
        // GET my_index/_search
        // {
        //   "query": {
        //     "script_score": {
        //       "query": {
        //         "match_all": {}
        //       },
        //       "script": {
        //         "source": "1 / (1 + l2norm(params.queryVector, doc[\'my_dense_vector\']))",
        //         "params": {
        //           "queryVector": [4, 3.4, -0.2]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::24b552802661be085433cf389ce80a40[]

        $curl = 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "script_score": {'
              . '      "query": {'
              . '        "match_all": {}'
              . '      },'
              . '      "script": {'
              . '        "source": "1 / (1 + l2norm(params.queryVector, doc[\'my_dense_vector\']))",'
              . '        "params": {'
              . '          "queryVector": [4, 3.4, -0.2]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d9e8b9435e3a07b5d154b842a90c3d85
     * Line: 249
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL249_d9e8b9435e3a07b5d154b842a90c3d85()
    {
        $client = $this->getClient();
        // tag::d9e8b9435e3a07b5d154b842a90c3d85[]
        // TODO -- Implement Example
        // GET my_index/_search
        // {
        //   "query": {
        //     "script_score": {
        //       "query": {
        //         "match_all": {}
        //       },
        //       "script": {
        //         "source": "1 / (1 + l2normSparse(params.queryVector, doc[\'my_sparse_vector\']))",
        //         "params": {
        //           "queryVector": {"2": 0.5, "10" : 111.3, "50": -1.3, "113": 14.8, "4545": 156.0}
        //         }
        //       }
        //     }
        //   }
        // }
        // end::d9e8b9435e3a07b5d154b842a90c3d85[]

        $curl = 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "script_score": {'
              . '      "query": {'
              . '        "match_all": {}'
              . '      },'
              . '      "script": {'
              . '        "source": "1 / (1 + l2normSparse(params.queryVector, doc[\'my_sparse_vector\']))",'
              . '        "params": {'
              . '          "queryVector": {"2": 0.5, "10" : 111.3, "50": -1.3, "113": 14.8, "4545": 156.0}'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%










}
