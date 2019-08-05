<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Suggesters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PhraseSuggest
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   search/suggesters/phrase-suggest.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PhraseSuggest extends SimpleExamplesTester {

    /**
     * Tag:  5566cff431570f522e1fc5475b2ed875
     * Line: 25
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL25_5566cff431570f522e1fc5475b2ed875()
    {
        $client = $this->getClient();
        // tag::5566cff431570f522e1fc5475b2ed875[]
        // TODO -- Implement Example
        // PUT test
        // {
        //   "settings": {
        //     "index": {
        //       "number_of_shards": 1,
        //       "analysis": {
        //         "analyzer": {
        //           "trigram": {
        //             "type": "custom",
        //             "tokenizer": "standard",
        //             "filter": ["lowercase","shingle"]
        //           },
        //           "reverse": {
        //             "type": "custom",
        //             "tokenizer": "standard",
        //             "filter": ["lowercase","reverse"]
        //           }
        //         },
        //         "filter": {
        //           "shingle": {
        //             "type": "shingle",
        //             "min_shingle_size": 2,
        //             "max_shingle_size": 3
        //           }
        //         }
        //       }
        //     }
        //   },
        //   "mappings": {
        //     "properties": {
        //       "title": {
        //         "type": "text",
        //         "fields": {
        //           "trigram": {
        //             "type": "text",
        //             "analyzer": "trigram"
        //           },
        //           "reverse": {
        //             "type": "text",
        //             "analyzer": "reverse"
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // POST test/_doc?refresh=true
        // {"title": "noble warriors"}
        // POST test/_doc?refresh=true
        // {"title": "nobel prize"}
        // end::5566cff431570f522e1fc5475b2ed875[]

        $curl = 'PUT test'
              . '{'
              . '  "settings": {'
              . '    "index": {'
              . '      "number_of_shards": 1,'
              . '      "analysis": {'
              . '        "analyzer": {'
              . '          "trigram": {'
              . '            "type": "custom",'
              . '            "tokenizer": "standard",'
              . '            "filter": ["lowercase","shingle"]'
              . '          },'
              . '          "reverse": {'
              . '            "type": "custom",'
              . '            "tokenizer": "standard",'
              . '            "filter": ["lowercase","reverse"]'
              . '          }'
              . '        },'
              . '        "filter": {'
              . '          "shingle": {'
              . '            "type": "shingle",'
              . '            "min_shingle_size": 2,'
              . '            "max_shingle_size": 3'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  },'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "title": {'
              . '        "type": "text",'
              . '        "fields": {'
              . '          "trigram": {'
              . '            "type": "text",'
              . '            "analyzer": "trigram"'
              . '          },'
              . '          "reverse": {'
              . '            "type": "text",'
              . '            "analyzer": "reverse"'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST test/_doc?refresh=true'
              . '{"title": "noble warriors"}'
              . 'POST test/_doc?refresh=true'
              . '{"title": "nobel prize"}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3b162509ed14eda44a9681cd1108fa39
     * Line: 84
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL84_3b162509ed14eda44a9681cd1108fa39()
    {
        $client = $this->getClient();
        // tag::3b162509ed14eda44a9681cd1108fa39[]
        // TODO -- Implement Example
        // POST test/_search
        // {
        //   "suggest": {
        //     "text": "noble prize",
        //     "simple_phrase": {
        //       "phrase": {
        //         "field": "title.trigram",
        //         "size": 1,
        //         "gram_size": 3,
        //         "direct_generator": [ {
        //           "field": "title.trigram",
        //           "suggest_mode": "always"
        //         } ],
        //         "highlight": {
        //           "pre_tag": "<em>",
        //           "post_tag": "</em>"
        //         }
        //       }
        //     }
        //   }
        // }
        // end::3b162509ed14eda44a9681cd1108fa39[]

        $curl = 'POST test/_search'
              . '{'
              . '  "suggest": {'
              . '    "text": "noble prize",'
              . '    "simple_phrase": {'
              . '      "phrase": {'
              . '        "field": "title.trigram",'
              . '        "size": 1,'
              . '        "gram_size": 3,'
              . '        "direct_generator": [ {'
              . '          "field": "title.trigram",'
              . '          "suggest_mode": "always"'
              . '        } ],'
              . '        "highlight": {'
              . '          "pre_tag": "<em>",'
              . '          "post_tag": "</em>"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  89a6b24618cafd60de1702a5b9f28a8d
     * Line: 226
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL226_89a6b24618cafd60de1702a5b9f28a8d()
    {
        $client = $this->getClient();
        // tag::89a6b24618cafd60de1702a5b9f28a8d[]
        // TODO -- Implement Example
        // POST test/_search
        // {
        //   "suggest": {
        //     "text" : "noble prize",
        //     "simple_phrase" : {
        //       "phrase" : {
        //         "field" :  "title.trigram",
        //         "size" :   1,
        //         "direct_generator" : [ {
        //           "field" :            "title.trigram",
        //           "suggest_mode" :     "always",
        //           "min_word_length" :  1
        //         } ],
        //         "collate": {
        //           "query": { \<1>
        //             "source" : {
        //               "match": {
        //                 "{{field_name}}" : "{{suggestion}}" \<2>
        //               }
        //             }
        //           },
        //           "params": {"field_name" : "title"}, \<3>
        //           "prune": true \<4>
        //         }
        //       }
        //     }
        //   }
        // }
        // end::89a6b24618cafd60de1702a5b9f28a8d[]

        $curl = 'POST test/_search'
              . '{'
              . '  "suggest": {'
              . '    "text" : "noble prize",'
              . '    "simple_phrase" : {'
              . '      "phrase" : {'
              . '        "field" :  "title.trigram",'
              . '        "size" :   1,'
              . '        "direct_generator" : [ {'
              . '          "field" :            "title.trigram",'
              . '          "suggest_mode" :     "always",'
              . '          "min_word_length" :  1'
              . '        } ],'
              . '        "collate": {'
              . '          "query": { \<1>'
              . '            "source" : {'
              . '              "match": {'
              . '                "{{field_name}}" : "{{suggestion}}" \<2>'
              . '              }'
              . '            }'
              . '          },'
              . '          "params": {"field_name" : "title"}, \<3>'
              . '          "prune": true \<4>'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  203c3bb334384bdfb11ff1101ccfba25
     * Line: 295
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL295_203c3bb334384bdfb11ff1101ccfba25()
    {
        $client = $this->getClient();
        // tag::203c3bb334384bdfb11ff1101ccfba25[]
        // TODO -- Implement Example
        // POST test/_search
        // {
        //   "suggest": {
        //     "text" : "obel prize",
        //     "simple_phrase" : {
        //       "phrase" : {
        //         "field" : "title.trigram",
        //         "size" : 1,
        //         "smoothing" : {
        //           "laplace" : {
        //             "alpha" : 0.7
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::203c3bb334384bdfb11ff1101ccfba25[]

        $curl = 'POST test/_search'
              . '{'
              . '  "suggest": {'
              . '    "text" : "obel prize",'
              . '    "simple_phrase" : {'
              . '      "phrase" : {'
              . '        "field" : "title.trigram",'
              . '        "size" : 1,'
              . '        "smoothing" : {'
              . '          "laplace" : {'
              . '            "alpha" : 0.7'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  eb6d62f1d855a8e8fe9eab2656d47504
     * Line: 416
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL416_eb6d62f1d855a8e8fe9eab2656d47504()
    {
        $client = $this->getClient();
        // tag::eb6d62f1d855a8e8fe9eab2656d47504[]
        // TODO -- Implement Example
        // POST test/_search
        // {
        //   "suggest": {
        //     "text" : "obel prize",
        //     "simple_phrase" : {
        //       "phrase" : {
        //         "field" : "title.trigram",
        //         "size" : 1,
        //         "direct_generator" : [ {
        //           "field" : "title.trigram",
        //           "suggest_mode" : "always"
        //         }, {
        //           "field" : "title.reverse",
        //           "suggest_mode" : "always",
        //           "pre_filter" : "reverse",
        //           "post_filter" : "reverse"
        //         } ]
        //       }
        //     }
        //   }
        // }
        // end::eb6d62f1d855a8e8fe9eab2656d47504[]

        $curl = 'POST test/_search'
              . '{'
              . '  "suggest": {'
              . '    "text" : "obel prize",'
              . '    "simple_phrase" : {'
              . '      "phrase" : {'
              . '        "field" : "title.trigram",'
              . '        "size" : 1,'
              . '        "direct_generator" : [ {'
              . '          "field" : "title.trigram",'
              . '          "suggest_mode" : "always"'
              . '        }, {'
              . '          "field" : "title.reverse",'
              . '          "suggest_mode" : "always",'
              . '          "pre_filter" : "reverse",'
              . '          "post_filter" : "reverse"'
              . '        } ]'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
