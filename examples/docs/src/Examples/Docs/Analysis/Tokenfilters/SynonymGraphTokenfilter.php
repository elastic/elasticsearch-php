<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SynonymGraphTokenfilter
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/tokenfilters/synonym-graph-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SynonymGraphTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  2f071d36aa4aff5a2fafb3dadaa38b82
     * Line: 23
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL23_2f071d36aa4aff5a2fafb3dadaa38b82()
    {
        $client = $this->getClient();
        // tag::2f071d36aa4aff5a2fafb3dadaa38b82[]
        // TODO -- Implement Example
        // PUT /test_index
        // {
        //     "settings": {
        //         "index" : {
        //             "analysis" : {
        //                 "analyzer" : {
        //                     "search_synonyms" : {
        //                         "tokenizer" : "whitespace",
        //                         "filter" : ["graph_synonyms"]
        //                     }
        //                 },
        //                 "filter" : {
        //                     "graph_synonyms" : {
        //                         "type" : "synonym_graph",
        //                         "synonyms_path" : "analysis/synonym.txt"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::2f071d36aa4aff5a2fafb3dadaa38b82[]

        $curl = 'PUT /test_index'
              . '{'
              . '    "settings": {'
              . '        "index" : {'
              . '            "analysis" : {'
              . '                "analyzer" : {'
              . '                    "search_synonyms" : {'
              . '                        "tokenizer" : "whitespace",'
              . '                        "filter" : ["graph_synonyms"]'
              . '                    }'
              . '                },'
              . '                "filter" : {'
              . '                    "graph_synonyms" : {'
              . '                        "type" : "synonym_graph",'
              . '                        "synonyms_path" : "analysis/synonym.txt"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3d253e5a0029bc96cce484302319b772
     * Line: 59
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL59_3d253e5a0029bc96cce484302319b772()
    {
        $client = $this->getClient();
        // tag::3d253e5a0029bc96cce484302319b772[]
        // TODO -- Implement Example
        // PUT /test_index
        // {
        //     "settings": {
        //         "index" : {
        //             "analysis" : {
        //                 "analyzer" : {
        //                     "synonym" : {
        //                         "tokenizer" : "standard",
        //                         "filter" : ["my_stop", "synonym_graph"]
        //                     }
        //                 },
        //                 "filter" : {
        //                     "my_stop": {
        //                         "type" : "stop",
        //                         "stopwords": ["bar"]
        //                     },
        //                     "synonym_graph" : {
        //                         "type" : "synonym_graph",
        //                         "lenient": true,
        //                         "synonyms" : ["foo, bar => baz"]
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::3d253e5a0029bc96cce484302319b772[]

        $curl = 'PUT /test_index'
              . '{'
              . '    "settings": {'
              . '        "index" : {'
              . '            "analysis" : {'
              . '                "analyzer" : {'
              . '                    "synonym" : {'
              . '                        "tokenizer" : "standard",'
              . '                        "filter" : ["my_stop", "synonym_graph"]'
              . '                    }'
              . '                },'
              . '                "filter" : {'
              . '                    "my_stop": {'
              . '                        "type" : "stop",'
              . '                        "stopwords": ["bar"]'
              . '                    },'
              . '                    "synonym_graph" : {'
              . '                        "type" : "synonym_graph",'
              . '                        "lenient": true,'
              . '                        "synonyms" : ["foo, bar => baz"]'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1a14fd905941ecbdbc943b05875afc6f
     * Line: 119
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL119_1a14fd905941ecbdbc943b05875afc6f()
    {
        $client = $this->getClient();
        // tag::1a14fd905941ecbdbc943b05875afc6f[]
        // TODO -- Implement Example
        // PUT /test_index
        // {
        //     "settings": {
        //         "index" : {
        //             "analysis" : {
        //                 "filter" : {
        //                     "synonym" : {
        //                         "type" : "synonym_graph",
        //                         "synonyms" : [
        //                             "lol, laughing out loud",
        //                             "universe, cosmos"
        //                         ]
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::1a14fd905941ecbdbc943b05875afc6f[]

        $curl = 'PUT /test_index'
              . '{'
              . '    "settings": {'
              . '        "index" : {'
              . '            "analysis" : {'
              . '                "filter" : {'
              . '                    "synonym" : {'
              . '                        "type" : "synonym_graph",'
              . '                        "synonyms" : ['
              . '                            "lol, laughing out loud",'
              . '                            "universe, cosmos"'
              . '                        ]'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f0d7d6d5c878211704d4a5f1b2f6a247
     * Line: 151
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL151_f0d7d6d5c878211704d4a5f1b2f6a247()
    {
        $client = $this->getClient();
        // tag::f0d7d6d5c878211704d4a5f1b2f6a247[]
        // TODO -- Implement Example
        // PUT /test_index
        // {
        //     "settings": {
        //         "index" : {
        //             "analysis" : {
        //                 "filter" : {
        //                     "synonym" : {
        //                         "type" : "synonym_graph",
        //                         "format" : "wordnet",
        //                         "synonyms" : [
        //                             "s(100000001,1,\'abstain\',v,1,0).",
        //                             "s(100000001,2,\'refrain\',v,1,0).",
        //                             "s(100000001,3,\'desist\',v,1,0)."
        //                         ]
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::f0d7d6d5c878211704d4a5f1b2f6a247[]

        $curl = 'PUT /test_index'
              . '{'
              . '    "settings": {'
              . '        "index" : {'
              . '            "analysis" : {'
              . '                "filter" : {'
              . '                    "synonym" : {'
              . '                        "type" : "synonym_graph",'
              . '                        "format" : "wordnet",'
              . '                        "synonyms" : ['
              . '                            "s(100000001,1,\'abstain\',v,1,0).",'
              . '                            "s(100000001,2,\'refrain\',v,1,0).",'
              . '                            "s(100000001,3,\'desist\',v,1,0)."'
              . '                        ]'
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
