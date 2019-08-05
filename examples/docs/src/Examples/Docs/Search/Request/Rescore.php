<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Rescore
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   search/request/rescore.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Rescore extends SimpleExamplesTester {

    /**
     * Tag:  829a40d484c778a8c58340c7bf09e1d8
     * Line: 43
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL43_829a40d484c778a8c58340c7bf09e1d8()
    {
        $client = $this->getClient();
        // tag::829a40d484c778a8c58340c7bf09e1d8[]
        // TODO -- Implement Example
        // POST /_search
        // {
        //    "query" : {
        //       "match" : {
        //          "message" : {
        //             "operator" : "or",
        //             "query" : "the quick brown"
        //          }
        //       }
        //    },
        //    "rescore" : {
        //       "window_size" : 50,
        //       "query" : {
        //          "rescore_query" : {
        //             "match_phrase" : {
        //                "message" : {
        //                   "query" : "the quick brown",
        //                   "slop" : 2
        //                }
        //             }
        //          },
        //          "query_weight" : 0.7,
        //          "rescore_query_weight" : 1.2
        //       }
        //    }
        // }
        // end::829a40d484c778a8c58340c7bf09e1d8[]

        $curl = 'POST /_search'
              . '{'
              . '   "query" : {'
              . '      "match" : {'
              . '         "message" : {'
              . '            "operator" : "or",'
              . '            "query" : "the quick brown"'
              . '         }'
              . '      }'
              . '   },'
              . '   "rescore" : {'
              . '      "window_size" : 50,'
              . '      "query" : {'
              . '         "rescore_query" : {'
              . '            "match_phrase" : {'
              . '               "message" : {'
              . '                  "query" : "the quick brown",'
              . '                  "slop" : 2'
              . '               }'
              . '            }'
              . '         },'
              . '         "query_weight" : 0.7,'
              . '         "rescore_query_weight" : 1.2'
              . '      }'
              . '   }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7d7855afd9882a665bbabda810f94f61
     * Line: 91
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL91_7d7855afd9882a665bbabda810f94f61()
    {
        $client = $this->getClient();
        // tag::7d7855afd9882a665bbabda810f94f61[]
        // TODO -- Implement Example
        // POST /_search
        // {
        //    "query" : {
        //       "match" : {
        //          "message" : {
        //             "operator" : "or",
        //             "query" : "the quick brown"
        //          }
        //       }
        //    },
        //    "rescore" : [ {
        //       "window_size" : 100,
        //       "query" : {
        //          "rescore_query" : {
        //             "match_phrase" : {
        //                "message" : {
        //                   "query" : "the quick brown",
        //                   "slop" : 2
        //                }
        //             }
        //          },
        //          "query_weight" : 0.7,
        //          "rescore_query_weight" : 1.2
        //       }
        //    }, {
        //       "window_size" : 10,
        //       "query" : {
        //          "score_mode": "multiply",
        //          "rescore_query" : {
        //             "function_score" : {
        //                "script_score": {
        //                   "script": {
        //                     "source": "Math.log10(doc.likes.value + 2)"
        //                   }
        //                }
        //             }
        //          }
        //       }
        //    } ]
        // }
        // end::7d7855afd9882a665bbabda810f94f61[]

        $curl = 'POST /_search'
              . '{'
              . '   "query" : {'
              . '      "match" : {'
              . '         "message" : {'
              . '            "operator" : "or",'
              . '            "query" : "the quick brown"'
              . '         }'
              . '      }'
              . '   },'
              . '   "rescore" : [ {'
              . '      "window_size" : 100,'
              . '      "query" : {'
              . '         "rescore_query" : {'
              . '            "match_phrase" : {'
              . '               "message" : {'
              . '                  "query" : "the quick brown",'
              . '                  "slop" : 2'
              . '               }'
              . '            }'
              . '         },'
              . '         "query_weight" : 0.7,'
              . '         "rescore_query_weight" : 1.2'
              . '      }'
              . '   }, {'
              . '      "window_size" : 10,'
              . '      "query" : {'
              . '         "score_mode": "multiply",'
              . '         "rescore_query" : {'
              . '            "function_score" : {'
              . '               "script_score": {'
              . '                  "script": {'
              . '                    "source": "Math.log10(doc.likes.value + 2)"'
              . '                  }'
              . '               }'
              . '            }'
              . '         }'
              . '      }'
              . '   } ]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
