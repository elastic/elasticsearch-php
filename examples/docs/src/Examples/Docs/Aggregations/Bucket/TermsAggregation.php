<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: TermsAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/bucket/terms-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class TermsAggregation extends SimpleExamplesTester {

    /**
     * Tag:  9a8995fd31351045d99c78e40444c8ea
     * Line: 57
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL57_9a8995fd31351045d99c78e40444c8ea()
    {
        $client = $this->getClient();
        // tag::9a8995fd31351045d99c78e40444c8ea[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "genres" : {
        //             "terms" : { "field" : "genre" } \<1>
        //         }
        //     }
        // }
        // end::9a8995fd31351045d99c78e40444c8ea[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "genres" : {'
              . '            "terms" : { "field" : "genre" } \<1>'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d50a3835bf5795ac73e58906a3413544
     * Line: 134
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL134_d50a3835bf5795ac73e58906a3413544()
    {
        $client = $this->getClient();
        // tag::d50a3835bf5795ac73e58906a3413544[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "products" : {
        //             "terms" : {
        //                 "field" : "product",
        //                 "size" : 5
        //             }
        //         }
        //     }
        // }
        // end::d50a3835bf5795ac73e58906a3413544[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "products" : {'
              . '            "terms" : {'
              . '                "field" : "product",'
              . '                "size" : 5'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  35e8da9410b8432cf4095f2541ad7b1d
     * Line: 264
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL264_35e8da9410b8432cf4095f2541ad7b1d()
    {
        $client = $this->getClient();
        // tag::35e8da9410b8432cf4095f2541ad7b1d[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "products" : {
        //             "terms" : {
        //                 "field" : "product",
        //                 "size" : 5,
        //                 "show_term_doc_count_error": true
        //             }
        //         }
        //     }
        // }
        // end::35e8da9410b8432cf4095f2541ad7b1d[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "products" : {'
              . '            "terms" : {'
              . '                "field" : "product",'
              . '                "size" : 5,'
              . '                "show_term_doc_count_error": true'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6a4679531e64c492fce16dc12de6dcb0
     * Line: 342
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL342_6a4679531e64c492fce16dc12de6dcb0()
    {
        $client = $this->getClient();
        // tag::6a4679531e64c492fce16dc12de6dcb0[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "genres" : {
        //             "terms" : {
        //                 "field" : "genre",
        //                 "order" : { "_count" : "asc" }
        //             }
        //         }
        //     }
        // }
        // end::6a4679531e64c492fce16dc12de6dcb0[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "genres" : {'
              . '            "terms" : {'
              . '                "field" : "genre",'
              . '                "order" : { "_count" : "asc" }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  93f1bdd72e79827dcf9a34efa02fd977
     * Line: 360
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL360_93f1bdd72e79827dcf9a34efa02fd977()
    {
        $client = $this->getClient();
        // tag::93f1bdd72e79827dcf9a34efa02fd977[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "genres" : {
        //             "terms" : {
        //                 "field" : "genre",
        //                 "order" : { "_key" : "asc" }
        //             }
        //         }
        //     }
        // }
        // end::93f1bdd72e79827dcf9a34efa02fd977[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "genres" : {'
              . '            "terms" : {'
              . '                "field" : "genre",'
              . '                "order" : { "_key" : "asc" }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  71b5b2ba9557d0f296ff2de91727d2f6
     * Line: 380
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL380_71b5b2ba9557d0f296ff2de91727d2f6()
    {
        $client = $this->getClient();
        // tag::71b5b2ba9557d0f296ff2de91727d2f6[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "genres" : {
        //             "terms" : {
        //                 "field" : "genre",
        //                 "order" : { "max_play_count" : "desc" }
        //             },
        //             "aggs" : {
        //                 "max_play_count" : { "max" : { "field" : "play_count" } }
        //             }
        //         }
        //     }
        // }
        // end::71b5b2ba9557d0f296ff2de91727d2f6[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "genres" : {'
              . '            "terms" : {'
              . '                "field" : "genre",'
              . '                "order" : { "max_play_count" : "desc" }'
              . '            },'
              . '            "aggs" : {'
              . '                "max_play_count" : { "max" : { "field" : "play_count" } }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  34efeade38445b2834749ced59782e25
     * Line: 401
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL401_34efeade38445b2834749ced59782e25()
    {
        $client = $this->getClient();
        // tag::34efeade38445b2834749ced59782e25[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "genres" : {
        //             "terms" : {
        //                 "field" : "genre",
        //                 "order" : { "playback_stats.max" : "desc" }
        //             },
        //             "aggs" : {
        //                 "playback_stats" : { "stats" : { "field" : "play_count" } }
        //             }
        //         }
        //     }
        // }
        // end::34efeade38445b2834749ced59782e25[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "genres" : {'
              . '            "terms" : {'
              . '                "field" : "genre",'
              . '                "order" : { "playback_stats.max" : "desc" }'
              . '            },'
              . '            "aggs" : {'
              . '                "playback_stats" : { "stats" : { "field" : "play_count" } }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  dc15e2373e5ecbe09b4ea0858eb63d47
     * Line: 448
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL448_dc15e2373e5ecbe09b4ea0858eb63d47()
    {
        $client = $this->getClient();
        // tag::dc15e2373e5ecbe09b4ea0858eb63d47[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "countries" : {
        //             "terms" : {
        //                 "field" : "artist.country",
        //                 "order" : { "rock>playback_stats.avg" : "desc" }
        //             },
        //             "aggs" : {
        //                 "rock" : {
        //                     "filter" : { "term" : { "genre" :  "rock" }},
        //                     "aggs" : {
        //                         "playback_stats" : { "stats" : { "field" : "play_count" }}
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::dc15e2373e5ecbe09b4ea0858eb63d47[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "countries" : {'
              . '            "terms" : {'
              . '                "field" : "artist.country",'
              . '                "order" : { "rock>playback_stats.avg" : "desc" }'
              . '            },'
              . '            "aggs" : {'
              . '                "rock" : {'
              . '                    "filter" : { "term" : { "genre" :  "rock" }},'
              . '                    "aggs" : {'
              . '                        "playback_stats" : { "stats" : { "field" : "play_count" }}'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  028f6d6ac2594e20b78b8a8f8cbad49d
     * Line: 476
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL476_028f6d6ac2594e20b78b8a8f8cbad49d()
    {
        $client = $this->getClient();
        // tag::028f6d6ac2594e20b78b8a8f8cbad49d[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "countries" : {
        //             "terms" : {
        //                 "field" : "artist.country",
        //                 "order" : [ { "rock>playback_stats.avg" : "desc" }, { "_count" : "desc" } ]
        //             },
        //             "aggs" : {
        //                 "rock" : {
        //                     "filter" : { "term" : { "genre" : "rock" }},
        //                     "aggs" : {
        //                         "playback_stats" : { "stats" : { "field" : "play_count" }}
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::028f6d6ac2594e20b78b8a8f8cbad49d[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "countries" : {'
              . '            "terms" : {'
              . '                "field" : "artist.country",'
              . '                "order" : [ { "rock>playback_stats.avg" : "desc" }, { "_count" : "desc" } ]'
              . '            },'
              . '            "aggs" : {'
              . '                "rock" : {'
              . '                    "filter" : { "term" : { "genre" : "rock" }},'
              . '                    "aggs" : {'
              . '                        "playback_stats" : { "stats" : { "field" : "play_count" }}'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  527324766814561b75aaee853ede49a7
     * Line: 510
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL510_527324766814561b75aaee853ede49a7()
    {
        $client = $this->getClient();
        // tag::527324766814561b75aaee853ede49a7[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "tags" : {
        //             "terms" : {
        //                 "field" : "tags",
        //                 "min_doc_count": 10
        //             }
        //         }
        //     }
        // }
        // end::527324766814561b75aaee853ede49a7[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "tags" : {'
              . '            "terms" : {'
              . '                "field" : "tags",'
              . '                "min_doc_count": 10'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  033778305d52746f5ce0a2a922c8e521
     * Line: 552
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL552_033778305d52746f5ce0a2a922c8e521()
    {
        $client = $this->getClient();
        // tag::033778305d52746f5ce0a2a922c8e521[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "genres" : {
        //             "terms" : {
        //                 "script" : {
        //                     "source": "doc['genre'].value",
        //                     "lang": "painless"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::033778305d52746f5ce0a2a922c8e521[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "genres" : {'
              . '            "terms" : {'
              . '                "script" : {'
              . '                    "source": "doc['genre'].value",'
              . '                    "lang": "painless"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4646764bf09911fee7d58630c72d3137
     * Line: 588
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL588_4646764bf09911fee7d58630c72d3137()
    {
        $client = $this->getClient();
        // tag::4646764bf09911fee7d58630c72d3137[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "genres" : {
        //             "terms" : {
        //                 "script" : {
        //                     "id": "my_script",
        //                     "params": {
        //                         "field": "genre"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::4646764bf09911fee7d58630c72d3137[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "genres" : {'
              . '            "terms" : {'
              . '                "script" : {'
              . '                    "id": "my_script",'
              . '                    "params": {'
              . '                        "field": "genre"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a49169b4622918992411fab4ec48191b
     * Line: 611
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL611_a49169b4622918992411fab4ec48191b()
    {
        $client = $this->getClient();
        // tag::a49169b4622918992411fab4ec48191b[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "genres" : {
        //             "terms" : {
        //                 "field" : "genre",
        //                 "script" : {
        //                     "source" : "'Genre: ' +_value",
        //                     "lang" : "painless"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::a49169b4622918992411fab4ec48191b[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "genres" : {'
              . '            "terms" : {'
              . '                "field" : "genre",'
              . '                "script" : {'
              . '                    "source" : "'Genre: ' +_value",'
              . '                    "lang" : "painless"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0afaf1cad692e6201aa574c8feb6e622
     * Line: 638
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL638_0afaf1cad692e6201aa574c8feb6e622()
    {
        $client = $this->getClient();
        // tag::0afaf1cad692e6201aa574c8feb6e622[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "tags" : {
        //             "terms" : {
        //                 "field" : "tags",
        //                 "include" : ".*sport.*",
        //                 "exclude" : "water_.*"
        //             }
        //         }
        //     }
        // }
        // end::0afaf1cad692e6201aa574c8feb6e622[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "tags" : {'
              . '            "terms" : {'
              . '                "field" : "tags",'
              . '                "include" : ".*sport.*",'
              . '                "exclude" : "water_.*"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  98b121bf47cebd85671a2cb519688d28
     * Line: 667
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL667_98b121bf47cebd85671a2cb519688d28()
    {
        $client = $this->getClient();
        // tag::98b121bf47cebd85671a2cb519688d28[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "JapaneseCars" : {
        //              "terms" : {
        //                  "field" : "make",
        //                  "include" : ["mazda", "honda"]
        //              }
        //          },
        //         "ActiveCarManufacturers" : {
        //              "terms" : {
        //                  "field" : "make",
        //                  "exclude" : ["rover", "jensen"]
        //              }
        //          }
        //     }
        // }
        // end::98b121bf47cebd85671a2cb519688d28[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "JapaneseCars" : {'
              . '             "terms" : {'
              . '                 "field" : "make",'
              . '                 "include" : ["mazda", "honda"]'
              . '             }'
              . '         },'
              . '        "ActiveCarManufacturers" : {'
              . '             "terms" : {'
              . '                 "field" : "make",'
              . '                 "exclude" : ["rover", "jensen"]'
              . '             }'
              . '         }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5d9d7b84e2fec7ecd832145cbb951cf1
     * Line: 697
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL697_5d9d7b84e2fec7ecd832145cbb951cf1()
    {
        $client = $this->getClient();
        // tag::5d9d7b84e2fec7ecd832145cbb951cf1[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //    "size": 0,
        //    "aggs": {
        //       "expired_sessions": {
        //          "terms": {
        //             "field": "account_id",
        //             "include": {
        //                "partition": 0,
        //                "num_partitions": 20
        //             },
        //             "size": 10000,
        //             "order": {
        //                "last_access": "asc"
        //             }
        //          },
        //          "aggs": {
        //             "last_access": {
        //                "max": {
        //                   "field": "access_date"
        //                }
        //             }
        //          }
        //       }
        //    }
        // }
        // end::5d9d7b84e2fec7ecd832145cbb951cf1[]

        $curl = 'GET /_search'
              . '{'
              . '   "size": 0,'
              . '   "aggs": {'
              . '      "expired_sessions": {'
              . '         "terms": {'
              . '            "field": "account_id",'
              . '            "include": {'
              . '               "partition": 0,'
              . '               "num_partitions": 20'
              . '            },'
              . '            "size": 10000,'
              . '            "order": {'
              . '               "last_access": "asc"'
              . '            }'
              . '         },'
              . '         "aggs": {'
              . '            "last_access": {'
              . '               "max": {'
              . '                  "field": "access_date"'
              . '               }'
              . '            }'
              . '         }'
              . '      }'
              . '   }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7f28f8ae8fcdbd807dadde0b5b007a6d
     * Line: 790
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL790_7f28f8ae8fcdbd807dadde0b5b007a6d()
    {
        $client = $this->getClient();
        // tag::7f28f8ae8fcdbd807dadde0b5b007a6d[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "actors" : {
        //              "terms" : {
        //                  "field" : "actors",
        //                  "size" : 10
        //              },
        //             "aggs" : {
        //                 "costars" : {
        //                      "terms" : {
        //                          "field" : "actors",
        //                          "size" : 5
        //                      }
        //                  }
        //             }
        //          }
        //     }
        // }
        // end::7f28f8ae8fcdbd807dadde0b5b007a6d[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "actors" : {'
              . '             "terms" : {'
              . '                 "field" : "actors",'
              . '                 "size" : 10'
              . '             },'
              . '            "aggs" : {'
              . '                "costars" : {'
              . '                     "terms" : {'
              . '                         "field" : "actors",'
              . '                         "size" : 5'
              . '                     }'
              . '                 }'
              . '            }'
              . '         }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  cd5bc5bf7cd58d7b1492c9c298b345f6
     * Line: 822
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL822_cd5bc5bf7cd58d7b1492c9c298b345f6()
    {
        $client = $this->getClient();
        // tag::cd5bc5bf7cd58d7b1492c9c298b345f6[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "actors" : {
        //              "terms" : {
        //                  "field" : "actors",
        //                  "size" : 10,
        //                  "collect_mode" : "breadth_first" \<1>
        //              },
        //             "aggs" : {
        //                 "costars" : {
        //                      "terms" : {
        //                          "field" : "actors",
        //                          "size" : 5
        //                      }
        //                  }
        //             }
        //          }
        //     }
        // }
        // end::cd5bc5bf7cd58d7b1492c9c298b345f6[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "actors" : {'
              . '             "terms" : {'
              . '                 "field" : "actors",'
              . '                 "size" : 10,'
              . '                 "collect_mode" : "breadth_first" \<1>'
              . '             },'
              . '            "aggs" : {'
              . '                "costars" : {'
              . '                     "terms" : {'
              . '                         "field" : "actors",'
              . '                         "size" : 5'
              . '                     }'
              . '                 }'
              . '            }'
              . '         }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  774d715155cd13713e6e327adf6ce328
     * Line: 874
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL874_774d715155cd13713e6e327adf6ce328()
    {
        $client = $this->getClient();
        // tag::774d715155cd13713e6e327adf6ce328[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "tags" : {
        //              "terms" : {
        //                  "field" : "tags",
        //                  "execution_hint": "map" \<1>
        //              }
        //          }
        //     }
        // }
        // end::774d715155cd13713e6e327adf6ce328[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "tags" : {'
              . '             "terms" : {'
              . '                 "field" : "tags",'
              . '                 "execution_hint": "map" \<1>'
              . '             }'
              . '         }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f085fb032dae56a3b104ab874eaea2ad
     * Line: 900
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL900_f085fb032dae56a3b104ab874eaea2ad()
    {
        $client = $this->getClient();
        // tag::f085fb032dae56a3b104ab874eaea2ad[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "tags" : {
        //              "terms" : {
        //                  "field" : "tags",
        //                  "missing": "N/A" \<1>
        //              }
        //          }
        //     }
        // }
        // end::f085fb032dae56a3b104ab874eaea2ad[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "tags" : {'
              . '             "terms" : {'
              . '                 "field" : "tags",'
              . '                 "missing": "N/A" \<1>'
              . '             }'
              . '         }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





















}
