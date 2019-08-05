<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Analyzers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: StopAnalyzer
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/analyzers/stop-analyzer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class StopAnalyzer extends SimpleExamplesTester {

    /**
     * Tag:  42d02087f1c8ab0452ef373079a76843
     * Line: 12
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL12_42d02087f1c8ab0452ef373079a76843()
    {
        $client = $this->getClient();
        // tag::42d02087f1c8ab0452ef373079a76843[]
        // TODO -- Implement Example
        // POST _analyze
        // {
        //   "analyzer": "stop",
        //   "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog's bone."
        // }
        // end::42d02087f1c8ab0452ef373079a76843[]

        $curl = 'POST _analyze'
              . '{'
              . '  "analyzer": "stop",'
              . '  "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog's bone."'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5a676e5f09ba584408ce6ecacda13d1d
     * Line: 132
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL132_5a676e5f09ba584408ce6ecacda13d1d()
    {
        $client = $this->getClient();
        // tag::5a676e5f09ba584408ce6ecacda13d1d[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "my_stop_analyzer": {
        //           "type": "stop",
        //           "stopwords": ["the", "over"]
        //         }
        //       }
        //     }
        //   }
        // }
        // POST my_index/_analyze
        // {
        //   "analyzer": "my_stop_analyzer",
        //   "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog's bone."
        // }
        // end::5a676e5f09ba584408ce6ecacda13d1d[]

        $curl = 'PUT my_index'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "my_stop_analyzer": {'
              . '          "type": "stop",'
              . '          "stopwords": ["the", "over"]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "analyzer": "my_stop_analyzer",'
              . '  "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog's bone."'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  42deb4fe32afbe0f94185e256a79c447
     * Line: 250
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL250_42deb4fe32afbe0f94185e256a79c447()
    {
        $client = $this->getClient();
        // tag::42deb4fe32afbe0f94185e256a79c447[]
        // TODO -- Implement Example
        // PUT /stop_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "english_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_english_" \<1>
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_stop": {
        //           "tokenizer": "lowercase",
        //           "filter": [
        //             "english_stop"          \<2>
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::42deb4fe32afbe0f94185e256a79c447[]

        $curl = 'PUT /stop_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "english_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_english_" \<1>'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_stop": {'
              . '          "tokenizer": "lowercase",'
              . '          "filter": ['
              . '            "english_stop"          \<2>'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
