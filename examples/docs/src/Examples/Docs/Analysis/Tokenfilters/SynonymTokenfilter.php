<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SynonymTokenfilter
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/tokenfilters/synonym-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SynonymTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  09f74df1d07d84ee133ce90f7832e712
     * Line: 9
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL9_09f74df1d07d84ee133ce90f7832e712()
    {
        $client = $this->getClient();
        // tag::09f74df1d07d84ee133ce90f7832e712[]
        // TODO -- Implement Example
        // PUT /test_index
        // {
        //     "settings": {
        //         "index" : {
        //             "analysis" : {
        //                 "analyzer" : {
        //                     "synonym" : {
        //                         "tokenizer" : "whitespace",
        //                         "filter" : ["synonym"]
        //                     }
        //                 },
        //                 "filter" : {
        //                     "synonym" : {
        //                         "type" : "synonym",
        //                         "synonyms_path" : "analysis/synonym.txt"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::09f74df1d07d84ee133ce90f7832e712[]

        $curl = 'PUT /test_index'
              . '{'
              . '    "settings": {'
              . '        "index" : {'
              . '            "analysis" : {'
              . '                "analyzer" : {'
              . '                    "synonym" : {'
              . '                        "tokenizer" : "whitespace",'
              . '                        "filter" : ["synonym"]'
              . '                    }'
              . '                },'
              . '                "filter" : {'
              . '                    "synonym" : {'
              . '                        "type" : "synonym",'
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
     * Tag:  bcc57126b24c408b5d944928b6f08c94
     * Line: 50
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL50_bcc57126b24c408b5d944928b6f08c94()
    {
        $client = $this->getClient();
        // tag::bcc57126b24c408b5d944928b6f08c94[]
        // TODO -- Implement Example
        // PUT /test_index
        // {
        //     "settings": {
        //         "index" : {
        //             "analysis" : {
        //                 "analyzer" : {
        //                     "synonym" : {
        //                         "tokenizer" : "standard",
        //                         "filter" : ["my_stop", "synonym"]
        //                     }
        //                 },
        //                 "filter" : {
        //                     "my_stop": {
        //                         "type" : "stop",
        //                         "stopwords": ["bar"]
        //                     },
        //                     "synonym" : {
        //                         "type" : "synonym",
        //                         "lenient": true,
        //                         "synonyms" : ["foo, bar => baz"]
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::bcc57126b24c408b5d944928b6f08c94[]

        $curl = 'PUT /test_index'
              . '{'
              . '    "settings": {'
              . '        "index" : {'
              . '            "analysis" : {'
              . '                "analyzer" : {'
              . '                    "synonym" : {'
              . '                        "tokenizer" : "standard",'
              . '                        "filter" : ["my_stop", "synonym"]'
              . '                    }'
              . '                },'
              . '                "filter" : {'
              . '                    "my_stop": {'
              . '                        "type" : "stop",'
              . '                        "stopwords": ["bar"]'
              . '                    },'
              . '                    "synonym" : {'
              . '                        "type" : "synonym",'
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
     * Tag:  9fb5e28535f396ab2eb8bc710eebc1e6
     * Line: 111
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL111_9fb5e28535f396ab2eb8bc710eebc1e6()
    {
        $client = $this->getClient();
        // tag::9fb5e28535f396ab2eb8bc710eebc1e6[]
        // TODO -- Implement Example
        // PUT /test_index
        // {
        //     "settings": {
        //         "index" : {
        //             "analysis" : {
        //                 "filter" : {
        //                     "synonym" : {
        //                         "type" : "synonym",
        //                         "synonyms" : [
        //                             "i-pod, i pod => ipod",
        //                             "universe, cosmos"
        //                         ]
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::9fb5e28535f396ab2eb8bc710eebc1e6[]

        $curl = 'PUT /test_index'
              . '{'
              . '    "settings": {'
              . '        "index" : {'
              . '            "analysis" : {'
              . '                "filter" : {'
              . '                    "synonym" : {'
              . '                        "type" : "synonym",'
              . '                        "synonyms" : ['
              . '                            "i-pod, i pod => ipod",'
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
     * Tag:  0c0f37e409459dcd40d29ea684db4706
     * Line: 143
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL143_0c0f37e409459dcd40d29ea684db4706()
    {
        $client = $this->getClient();
        // tag::0c0f37e409459dcd40d29ea684db4706[]
        // TODO -- Implement Example
        // PUT /test_index
        // {
        //     "settings": {
        //         "index" : {
        //             "analysis" : {
        //                 "filter" : {
        //                     "synonym" : {
        //                         "type" : "synonym",
        //                         "format" : "wordnet",
        //                         "synonyms" : [
        //                             "s(100000001,1,'abstain',v,1,0).",
        //                             "s(100000001,2,'refrain',v,1,0).",
        //                             "s(100000001,3,'desist',v,1,0)."
        //                         ]
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::0c0f37e409459dcd40d29ea684db4706[]

        $curl = 'PUT /test_index'
              . '{'
              . '    "settings": {'
              . '        "index" : {'
              . '            "analysis" : {'
              . '                "filter" : {'
              . '                    "synonym" : {'
              . '                        "type" : "synonym",'
              . '                        "format" : "wordnet",'
              . '                        "synonyms" : ['
              . '                            "s(100000001,1,'abstain',v,1,0).",'
              . '                            "s(100000001,2,'refrain',v,1,0).",'
              . '                            "s(100000001,3,'desist',v,1,0)."'
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
