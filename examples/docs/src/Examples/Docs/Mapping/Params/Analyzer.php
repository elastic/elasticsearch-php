<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Analyzer
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/params/analyzer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Analyzer extends SimpleExamplesTester {

    /**
     * Tag:  0ae23713026515ec5047c7bbcf9842f7
     * Line: 43
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL43_0ae23713026515ec5047c7bbcf9842f7()
    {
        $client = $this->getClient();
        // tag::0ae23713026515ec5047c7bbcf9842f7[]
        // TODO -- Implement Example
        // PUT /my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "text": { \<1>
        //         "type": "text",
        //         "fields": {
        //           "english": { \<2>
        //             "type":     "text",
        //             "analyzer": "english"
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // GET my_index/_analyze \<3>
        // {
        //   "field": "text",
        //   "text": "The quick Brown Foxes."
        // }
        // GET my_index/_analyze \<4>
        // {
        //   "field": "text.english",
        //   "text": "The quick Brown Foxes."
        // }
        // end::0ae23713026515ec5047c7bbcf9842f7[]

        $curl = 'PUT /my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "text": { \<1>'
              . '        "type": "text",'
              . '        "fields": {'
              . '          "english": { \<2>'
              . '            "type":     "text",'
              . '            "analyzer": "english"'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'GET my_index/_analyze \<3>'
              . '{'
              . '  "field": "text",'
              . '  "text": "The quick Brown Foxes."'
              . '}'
              . 'GET my_index/_analyze \<4>'
              . '{'
              . '  "field": "text.english",'
              . '  "text": "The quick Brown Foxes."'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5bf1e4194dce1e15eb7f48fd72b1fc6b
     * Line: 93
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL93_5bf1e4194dce1e15eb7f48fd72b1fc6b()
    {
        $client = $this->getClient();
        // tag::5bf1e4194dce1e15eb7f48fd72b1fc6b[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //    "settings":{
        //       "analysis":{
        //          "analyzer":{
        //             "my_analyzer":{ \<1>
        //                "type":"custom",
        //                "tokenizer":"standard",
        //                "filter":[
        //                   "lowercase"
        //                ]
        //             },
        //             "my_stop_analyzer":{ \<2>
        //                "type":"custom",
        //                "tokenizer":"standard",
        //                "filter":[
        //                   "lowercase",
        //                   "english_stop"
        //                ]
        //             }
        //          },
        //          "filter":{
        //             "english_stop":{
        //                "type":"stop",
        //                "stopwords":"_english_"
        //             }
        //          }
        //       }
        //    },
        //    "mappings":{
        //        "properties":{
        //           "title": {
        //              "type":"text",
        //              "analyzer":"my_analyzer", \<3>
        //              "search_analyzer":"my_stop_analyzer", \<4>
        //              "search_quote_analyzer":"my_analyzer" \<5>
        //          }
        //       }
        //    }
        // }
        // PUT my_index/_doc/1
        // {
        //    "title":"The Quick Brown Fox"
        // }
        // PUT my_index/_doc/2
        // {
        //    "title":"A Quick Brown Fox"
        // }
        // GET my_index/_search
        // {
        //    "query":{
        //       "query_string":{
        //          "query":"\"the quick brown fox\"" \<6>
        //       }
        //    }
        // }
        // end::5bf1e4194dce1e15eb7f48fd72b1fc6b[]

        $curl = 'PUT my_index'
              . '{'
              . '   "settings":{'
              . '      "analysis":{'
              . '         "analyzer":{'
              . '            "my_analyzer":{ \<1>'
              . '               "type":"custom",'
              . '               "tokenizer":"standard",'
              . '               "filter":['
              . '                  "lowercase"'
              . '               ]'
              . '            },'
              . '            "my_stop_analyzer":{ \<2>'
              . '               "type":"custom",'
              . '               "tokenizer":"standard",'
              . '               "filter":['
              . '                  "lowercase",'
              . '                  "english_stop"'
              . '               ]'
              . '            }'
              . '         },'
              . '         "filter":{'
              . '            "english_stop":{'
              . '               "type":"stop",'
              . '               "stopwords":"_english_"'
              . '            }'
              . '         }'
              . '      }'
              . '   },'
              . '   "mappings":{'
              . '       "properties":{'
              . '          "title": {'
              . '             "type":"text",'
              . '             "analyzer":"my_analyzer", \<3>'
              . '             "search_analyzer":"my_stop_analyzer", \<4>'
              . '             "search_quote_analyzer":"my_analyzer" \<5>'
              . '         }'
              . '      }'
              . '   }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '   "title":"The Quick Brown Fox"'
              . '}'
              . 'PUT my_index/_doc/2'
              . '{'
              . '   "title":"A Quick Brown Fox"'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '   "query":{'
              . '      "query_string":{'
              . '         "query":"\"the quick brown fox\"" \<6>'
              . '      }'
              . '   }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
