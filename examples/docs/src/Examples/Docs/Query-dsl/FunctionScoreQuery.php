<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: FunctionScoreQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/function-score-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class FunctionScoreQuery extends SimpleExamplesTester {

    /**
     * Tag:  a42f33e15b0995bb4b6058659bfdea85
     * Line: 19
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL19_a42f33e15b0995bb4b6058659bfdea85()
    {
        $client = $this->getClient();
        // tag::a42f33e15b0995bb4b6058659bfdea85[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "function_score": {
        //             "query": { "match_all": {} },
        //             "boost": "5",
        //             "random_score": {}, \<1>
        //             "boost_mode":"multiply"
        //         }
        //     }
        // }
        // end::a42f33e15b0995bb4b6058659bfdea85[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "function_score": {'
              . '            "query": { "match_all": {} },'
              . '            "boost": "5",'
              . '            "random_score": {}, \<1>'
              . '            "boost_mode":"multiply"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b4a0d0ed512dffc10ee53bca2feca49b
     * Line: 42
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL42_b4a0d0ed512dffc10ee53bca2feca49b()
    {
        $client = $this->getClient();
        // tag::b4a0d0ed512dffc10ee53bca2feca49b[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "function_score": {
        //           "query": { "match_all": {} },
        //           "boost": "5", \<1>
        //           "functions": [
        //               {
        //                   "filter": { "match": { "test": "bar" } },
        //                   "random_score": {}, \<2>
        //                   "weight": 23
        //               },
        //               {
        //                   "filter": { "match": { "test": "cat" } },
        //                   "weight": 42
        //               }
        //           ],
        //           "max_boost": 42,
        //           "score_mode": "max",
        //           "boost_mode": "multiply",
        //           "min_score" : 42
        //         }
        //     }
        // }
        // end::b4a0d0ed512dffc10ee53bca2feca49b[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "function_score": {'
              . '          "query": { "match_all": {} },'
              . '          "boost": "5", \<1>'
              . '          "functions": ['
              . '              {'
              . '                  "filter": { "match": { "test": "bar" } },'
              . '                  "random_score": {}, \<2>'
              . '                  "weight": 23'
              . '              },'
              . '              {'
              . '                  "filter": { "match": { "test": "cat" } },'
              . '                  "weight": 42'
              . '              }'
              . '          ],'
              . '          "max_boost": 42,'
              . '          "score_mode": "max",'
              . '          "boost_mode": "multiply",'
              . '          "min_score" : 42'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ec473de07fe89bcbac1f8e278617fe46
     * Line: 139
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL139_ec473de07fe89bcbac1f8e278617fe46()
    {
        $client = $this->getClient();
        // tag::ec473de07fe89bcbac1f8e278617fe46[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "function_score": {
        //             "query": {
        //                 "match": { "message": "elasticsearch" }
        //             },
        //             "script_score" : {
        //                 "script" : {
        //                   "source": "Math.log(2 + doc[\'likes\'].value)"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::ec473de07fe89bcbac1f8e278617fe46[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "function_score": {'
              . '            "query": {'
              . '                "match": { "message": "elasticsearch" }'
              . '            },'
              . '            "script_score" : {'
              . '                "script" : {'
              . '                  "source": "Math.log(2 + doc[\'likes\'].value)"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b68c85fe1b0d2f264dc0d1cbf530f319
     * Line: 171
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL171_b68c85fe1b0d2f264dc0d1cbf530f319()
    {
        $client = $this->getClient();
        // tag::b68c85fe1b0d2f264dc0d1cbf530f319[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "function_score": {
        //             "query": {
        //                 "match": { "message": "elasticsearch" }
        //             },
        //             "script_score" : {
        //                 "script" : {
        //                     "params": {
        //                         "a": 5,
        //                         "b": 1.2
        //                     },
        //                     "source": "params.a / Math.pow(params.b, doc[\'likes\'].value)"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::b68c85fe1b0d2f264dc0d1cbf530f319[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "function_score": {'
              . '            "query": {'
              . '                "match": { "message": "elasticsearch" }'
              . '            },'
              . '            "script_score" : {'
              . '                "script" : {'
              . '                    "params": {'
              . '                        "a": 5,'
              . '                        "b": 1.2'
              . '                    },'
              . '                    "source": "params.a / Math.pow(params.b, doc[\'likes\'].value)"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  645c4c6e209719d3a4d25b1a629cb23b
     * Line: 238
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL238_645c4c6e209719d3a4d25b1a629cb23b()
    {
        $client = $this->getClient();
        // tag::645c4c6e209719d3a4d25b1a629cb23b[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "function_score": {
        //             "random_score": {
        //                 "seed": 10,
        //                 "field": "_seq_no"
        //             }
        //         }
        //     }
        // }
        // end::645c4c6e209719d3a4d25b1a629cb23b[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "function_score": {'
              . '            "random_score": {'
              . '                "seed": 10,'
              . '                "field": "_seq_no"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8eaf4d5dd4ab1335deefa7749fdbbcc3
     * Line: 267
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL267_8eaf4d5dd4ab1335deefa7749fdbbcc3()
    {
        $client = $this->getClient();
        // tag::8eaf4d5dd4ab1335deefa7749fdbbcc3[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "function_score": {
        //             "field_value_factor": {
        //                 "field": "likes",
        //                 "factor": 1.2,
        //                 "modifier": "sqrt",
        //                 "missing": 1
        //             }
        //         }
        //     }
        // }
        // end::8eaf4d5dd4ab1335deefa7749fdbbcc3[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "function_score": {'
              . '            "field_value_factor": {'
              . '                "field": "likes",'
              . '                "factor": 1.2,'
              . '                "modifier": "sqrt",'
              . '                "missing": 1'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ec27afee074001b0e4e393611010842b
     * Line: 379
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL379_ec27afee074001b0e4e393611010842b()
    {
        $client = $this->getClient();
        // tag::ec27afee074001b0e4e393611010842b[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "function_score": {
        //             "gauss": {
        //                 "date": {
        //                       "origin": "2013-09-17", \<1>
        //                       "scale": "10d",
        //                       "offset": "5d", \<2>
        //                       "decay" : 0.5 \<2>
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::ec27afee074001b0e4e393611010842b[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "function_score": {'
              . '            "gauss": {'
              . '                "date": {'
              . '                      "origin": "2013-09-17", \<1>'
              . '                      "scale": "10d",'
              . '                      "offset": "5d", \<2>'
              . '                      "decay" : 0.5 \<2>'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  df17f920b0deab3529b98df88b781f55
     * Line: 577
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL577_df17f920b0deab3529b98df88b781f55()
    {
        $client = $this->getClient();
        // tag::df17f920b0deab3529b98df88b781f55[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "function_score": {
        //           "functions": [
        //             {
        //               "gauss": {
        //                 "price": {
        //                   "origin": "0",
        //                   "scale": "20"
        //                 }
        //               }
        //             },
        //             {
        //               "gauss": {
        //                 "location": {
        //                   "origin": "11, 12",
        //                   "scale": "2km"
        //                 }
        //               }
        //             }
        //           ],
        //           "query": {
        //             "match": {
        //               "properties": "balcony"
        //             }
        //           },
        //           "score_mode": "multiply"
        //         }
        //     }
        // }
        // end::df17f920b0deab3529b98df88b781f55[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "function_score": {'
              . '          "functions": ['
              . '            {'
              . '              "gauss": {'
              . '                "price": {'
              . '                  "origin": "0",'
              . '                  "scale": "20"'
              . '                }'
              . '              }'
              . '            },'
              . '            {'
              . '              "gauss": {'
              . '                "location": {'
              . '                  "origin": "11, 12",'
              . '                  "scale": "2km"'
              . '                }'
              . '              }'
              . '            }'
              . '          ],'
              . '          "query": {'
              . '            "match": {'
              . '              "properties": "balcony"'
              . '            }'
              . '          },'
              . '          "score_mode": "multiply"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%









}
