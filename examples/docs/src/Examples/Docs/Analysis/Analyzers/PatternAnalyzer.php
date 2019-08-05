<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Analyzers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PatternAnalyzer
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/analyzers/pattern-analyzer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PatternAnalyzer extends SimpleExamplesTester {

    /**
     * Tag:  467833bd44b35a89a7fe0d7df5f253f1
     * Line: 26
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL26_467833bd44b35a89a7fe0d7df5f253f1()
    {
        $client = $this->getClient();
        // tag::467833bd44b35a89a7fe0d7df5f253f1[]
        // TODO -- Implement Example
        // POST _analyze
        // {
        //   "analyzer": "pattern",
        //   "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog's bone."
        // }
        // end::467833bd44b35a89a7fe0d7df5f253f1[]

        $curl = 'POST _analyze'
              . '{'
              . '  "analyzer": "pattern",'
              . '  "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog's bone."'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  314851d590d195015a76866b92cf6b32
     * Line: 179
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL179_314851d590d195015a76866b92cf6b32()
    {
        $client = $this->getClient();
        // tag::314851d590d195015a76866b92cf6b32[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "my_email_analyzer": {
        //           "type":      "pattern",
        //           "pattern":   "\\W|_", \<1>
        //           "lowercase": true
        //         }
        //       }
        //     }
        //   }
        // }
        // POST my_index/_analyze
        // {
        //   "analyzer": "my_email_analyzer",
        //   "text": "John_Smith@foo-bar.com"
        // }
        // end::314851d590d195015a76866b92cf6b32[]

        $curl = 'PUT my_index'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "my_email_analyzer": {'
              . '          "type":      "pattern",'
              . '          "pattern":   "\\W|_", \<1>'
              . '          "lowercase": true'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "analyzer": "my_email_analyzer",'
              . '  "text": "John_Smith@foo-bar.com"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9e2f7b134ac7c5e7c0119866b7a96700
     * Line: 268
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL268_9e2f7b134ac7c5e7c0119866b7a96700()
    {
        $client = $this->getClient();
        // tag::9e2f7b134ac7c5e7c0119866b7a96700[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "camel": {
        //           "type": "pattern",
        //           "pattern": "([^\\p{L}\\d]+)|(?<=\\D)(?=\\d)|(?<=\\d)(?=\\D)|(?<=[\\p{L}&&[^\\p{Lu}]])(?=\\p{Lu})|(?<=\\p{Lu})(?=\\p{Lu}[\\p{L}&&[^\\p{Lu}]])"
        //         }
        //       }
        //     }
        //   }
        // }
        // GET my_index/_analyze
        // {
        //   "analyzer": "camel",
        //   "text": "MooseX::FTPClass2_beta"
        // }
        // end::9e2f7b134ac7c5e7c0119866b7a96700[]

        $curl = 'PUT my_index'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "camel": {'
              . '          "type": "pattern",'
              . '          "pattern": "([^\\p{L}\\d]+)|(?<=\\D)(?=\\d)|(?<=\\d)(?=\\D)|(?<=[\\p{L}&&[^\\p{Lu}]])(?=\\p{Lu})|(?<=\\p{Lu})(?=\\p{Lu}[\\p{L}&&[^\\p{Lu}]])"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'GET my_index/_analyze'
              . '{'
              . '  "analyzer": "camel",'
              . '  "text": "MooseX::FTPClass2_beta"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f453e14bcf30853e57618bf12f83e148
     * Line: 388
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL388_f453e14bcf30853e57618bf12f83e148()
    {
        $client = $this->getClient();
        // tag::f453e14bcf30853e57618bf12f83e148[]
        // TODO -- Implement Example
        // PUT /pattern_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "tokenizer": {
        //         "split_on_non_word": {
        //           "type":       "pattern",
        //           "pattern":    "\\W+" \<1>
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_pattern": {
        //           "tokenizer": "split_on_non_word",
        //           "filter": [
        //             "lowercase"       \<2>
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::f453e14bcf30853e57618bf12f83e148[]

        $curl = 'PUT /pattern_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "tokenizer": {'
              . '        "split_on_non_word": {'
              . '          "type":       "pattern",'
              . '          "pattern":    "\\W+" \<1>'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_pattern": {'
              . '          "tokenizer": "split_on_non_word",'
              . '          "filter": ['
              . '            "lowercase"       \<2>'
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
