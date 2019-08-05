<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Graph;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Explore
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   graph/explore.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Explore extends SimpleExamplesTester {

    /**
     * Tag:  8bf5ac11eb42e652023a685af4a45ae2
     * Line: 185
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL185_8bf5ac11eb42e652023a685af4a45ae2()
    {
        $client = $this->getClient();
        // tag::8bf5ac11eb42e652023a685af4a45ae2[]
        // TODO -- Implement Example
        // POST clicklogs/_graph/explore
        // {
        //     "query": { \<1>
        //         "match": {
        //             "query.raw": "midi"
        //         }
        //     },
        //     "vertices": [ \<2>
        //         {
        //             "field": "product"
        //         }
        //     ],
        //     "connections": {  \<3>
        //         "vertices": [
        //             {
        //                 "field": "query.raw"
        //             }
        //         ]
        //     }
        // }
        // end::8bf5ac11eb42e652023a685af4a45ae2[]

        $curl = 'POST clicklogs/_graph/explore'
              . '{'
              . '    "query": { \<1>'
              . '        "match": {'
              . '            "query.raw": "midi"'
              . '        }'
              . '    },'
              . '    "vertices": [ \<2>'
              . '        {'
              . '            "field": "product"'
              . '        }'
              . '    ],'
              . '    "connections": {  \<3>'
              . '        "vertices": ['
              . '            {'
              . '                "field": "query.raw"'
              . '            }'
              . '        ]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6a1a238984d74771420d150dec47fd91
     * Line: 290
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL290_6a1a238984d74771420d150dec47fd91()
    {
        $client = $this->getClient();
        // tag::6a1a238984d74771420d150dec47fd91[]
        // TODO -- Implement Example
        // POST clicklogs/_graph/explore
        // {
        //     "query": {
        //         "match": {
        //             "query.raw": "midi"
        //         }
        //     },
        //    "controls": {
        //       "use_significance": false,\<1>
        //       "sample_size": 2000,\<2>
        //       "timeout": 2000,\<3>
        //       "sample_diversity": {\<4>
        //          "field": "category.raw",
        //          "max_docs_per_value": 500
        //       }
        //    },
        //    "vertices": [
        //       {
        //          "field": "product",
        //          "size": 5,\<5>
        //          "min_doc_count": 10,\<6>
        //          "shard_min_doc_count": 3\<7>
        //       }
        //    ],
        //    "connections": {
        //       "query": {\<8>
        //          "bool": {
        //             "filter": [
        //                {
        //                   "range": {
        //                      "query_time": {
        //                         "gte": "2015-10-01 00:00:00"
        //                      }
        //                   }
        //                }
        //             ]
        //          }
        //       },
        //       "vertices": [
        //          {
        //             "field": "query.raw",
        //             "size": 5,
        //             "min_doc_count": 10,
        //             "shard_min_doc_count": 3
        //          }
        //       ]
        //    }
        // }
        // end::6a1a238984d74771420d150dec47fd91[]

        $curl = 'POST clicklogs/_graph/explore'
              . '{'
              . '    "query": {'
              . '        "match": {'
              . '            "query.raw": "midi"'
              . '        }'
              . '    },'
              . '   "controls": {'
              . '      "use_significance": false,\<1>'
              . '      "sample_size": 2000,\<2>'
              . '      "timeout": 2000,\<3>'
              . '      "sample_diversity": {\<4>'
              . '         "field": "category.raw",'
              . '         "max_docs_per_value": 500'
              . '      }'
              . '   },'
              . '   "vertices": ['
              . '      {'
              . '         "field": "product",'
              . '         "size": 5,\<5>'
              . '         "min_doc_count": 10,\<6>'
              . '         "shard_min_doc_count": 3\<7>'
              . '      }'
              . '   ],'
              . '   "connections": {'
              . '      "query": {\<8>'
              . '         "bool": {'
              . '            "filter": ['
              . '               {'
              . '                  "range": {'
              . '                     "query_time": {'
              . '                        "gte": "2015-10-01 00:00:00"'
              . '                     }'
              . '                  }'
              . '               }'
              . '            ]'
              . '         }'
              . '      },'
              . '      "vertices": ['
              . '         {'
              . '            "field": "query.raw",'
              . '            "size": 5,'
              . '            "min_doc_count": 10,'
              . '            "shard_min_doc_count": 3'
              . '         }'
              . '      ]'
              . '   }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  fa82d86a046d67366cfe9ce65535e433
     * Line: 377
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL377_fa82d86a046d67366cfe9ce65535e433()
    {
        $client = $this->getClient();
        // tag::fa82d86a046d67366cfe9ce65535e433[]
        // TODO -- Implement Example
        // POST clicklogs/_graph/explore
        // {
        //    "vertices": [
        //       {
        //          "field": "product",
        //          "include": [ "1854873" ] \<1>
        //       }
        //    ],
        //    "connections": {
        //       "vertices": [
        //          {
        //             "field": "query.raw",
        //             "exclude": [ \<2>
        //                "midi keyboard",
        //                "midi",
        //                "synth"
        //             ]
        //          }
        //       ]
        //    }
        // }
        // end::fa82d86a046d67366cfe9ce65535e433[]

        $curl = 'POST clicklogs/_graph/explore'
              . '{'
              . '   "vertices": ['
              . '      {'
              . '         "field": "product",'
              . '         "include": [ "1854873" ] \<1>'
              . '      }'
              . '   ],'
              . '   "connections": {'
              . '      "vertices": ['
              . '         {'
              . '            "field": "query.raw",'
              . '            "exclude": [ \<2>'
              . '               "midi keyboard",'
              . '               "midi",'
              . '               "synth"'
              . '            ]'
              . '         }'
              . '      ]'
              . '   }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
