<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Analyzers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: CustomAnalyzer
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/analyzers/custom-analyzer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class CustomAnalyzer extends SimpleExamplesTester {

    /**
     * Tag:  ef2ea91fb3fa26c740bca994af85e150
     * Line: 55
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL55_ef2ea91fb3fa26c740bca994af85e150()
    {
        $client = $this->getClient();
        // tag::ef2ea91fb3fa26c740bca994af85e150[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "my_custom_analyzer": {
        //           "type":      "custom", \<1>
        //           "tokenizer": "standard",
        //           "char_filter": [
        //             "html_strip"
        //           ],
        //           "filter": [
        //             "lowercase",
        //             "asciifolding"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // POST my_index/_analyze
        // {
        //   "analyzer": "my_custom_analyzer",
        //   "text": "Is this \<b>déjà vu</b>?"
        // }
        // end::ef2ea91fb3fa26c740bca994af85e150[]

        $curl = 'PUT my_index'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "my_custom_analyzer": {'
              . '          "type":      "custom", \<1>'
              . '          "tokenizer": "standard",'
              . '          "char_filter": ['
              . '            "html_strip"'
              . '          ],'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "asciifolding"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "analyzer": "my_custom_analyzer",'
              . '  "text": "Is this \<b>déjà vu</b>?"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c729a5ef7a671154bb82e308d915cf9f
     * Line: 159
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL159_c729a5ef7a671154bb82e308d915cf9f()
    {
        $client = $this->getClient();
        // tag::c729a5ef7a671154bb82e308d915cf9f[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "my_custom_analyzer": {
        //           "type": "custom",
        //           "char_filter": [
        //             "emoticons" \<1>
        //           ],
        //           "tokenizer": "punctuation", \<1>
        //           "filter": [
        //             "lowercase",
        //             "english_stop" \<1>
        //           ]
        //         }
        //       },
        //       "tokenizer": {
        //         "punctuation": { \<1>
        //           "type": "pattern",
        //           "pattern": "[ .,!?]"
        //         }
        //       },
        //       "char_filter": {
        //         "emoticons": { \<1>
        //           "type": "mapping",
        //           "mappings": [
        //             ":) => _happy_",
        //             ":( => _sad_"
        //           ]
        //         }
        //       },
        //       "filter": {
        //         "english_stop": { \<1>
        //           "type": "stop",
        //           "stopwords": "_english_"
        //         }
        //       }
        //     }
        //   }
        // }
        // POST my_index/_analyze
        // {
        //   "analyzer": "my_custom_analyzer",
        //   "text":     "I'm a :) person, and you?"
        // }
        // end::c729a5ef7a671154bb82e308d915cf9f[]

        $curl = 'PUT my_index'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "my_custom_analyzer": {'
              . '          "type": "custom",'
              . '          "char_filter": ['
              . '            "emoticons" \<1>'
              . '          ],'
              . '          "tokenizer": "punctuation", \<1>'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "english_stop" \<1>'
              . '          ]'
              . '        }'
              . '      },'
              . '      "tokenizer": {'
              . '        "punctuation": { \<1>'
              . '          "type": "pattern",'
              . '          "pattern": "[ .,!?]"'
              . '        }'
              . '      },'
              . '      "char_filter": {'
              . '        "emoticons": { \<1>'
              . '          "type": "mapping",'
              . '          "mappings": ['
              . '            ":) => _happy_",'
              . '            ":( => _sad_"'
              . '          ]'
              . '        }'
              . '      },'
              . '      "filter": {'
              . '        "english_stop": { \<1>'
              . '          "type": "stop",'
              . '          "stopwords": "_english_"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "analyzer": "my_custom_analyzer",'
              . '  "text":     "I'm a :) person, and you?"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
