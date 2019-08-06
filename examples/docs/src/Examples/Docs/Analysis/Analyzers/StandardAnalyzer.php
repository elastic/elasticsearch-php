<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Analyzers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: StandardAnalyzer
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/analyzers/standard-analyzer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class StandardAnalyzer extends SimpleExamplesTester {

    /**
     * Tag:  6884454f57c3a41059037ea762f48d77
     * Line: 14
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL14_6884454f57c3a41059037ea762f48d77()
    {
        $client = $this->getClient();
        // tag::6884454f57c3a41059037ea762f48d77[]
        // TODO -- Implement Example
        // POST _analyze
        // {
        //   "analyzer": "standard",
        //   "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog\'s bone."
        // }
        // end::6884454f57c3a41059037ea762f48d77[]

        $curl = 'POST _analyze'
              . '{'
              . '  "analyzer": "standard",'
              . '  "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog\'s bone."'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5af5d2999833b6b1fdcd84404751a7e3
     * Line: 153
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL153_5af5d2999833b6b1fdcd84404751a7e3()
    {
        $client = $this->getClient();
        // tag::5af5d2999833b6b1fdcd84404751a7e3[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "my_english_analyzer": {
        //           "type": "standard",
        //           "max_token_length": 5,
        //           "stopwords": "_english_"
        //         }
        //       }
        //     }
        //   }
        // }
        // POST my_index/_analyze
        // {
        //   "analyzer": "my_english_analyzer",
        //   "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog\'s bone."
        // }
        // end::5af5d2999833b6b1fdcd84404751a7e3[]

        $curl = 'PUT my_index'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "my_english_analyzer": {'
              . '          "type": "standard",'
              . '          "max_token_length": 5,'
              . '          "stopwords": "_english_"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "analyzer": "my_english_analyzer",'
              . '  "text": "The 2 QUICK Brown-Foxes jumped over the lazy dog\'s bone."'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ccf84c1e5e5602a9e841cb8f7e3bb29f
     * Line: 285
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL285_ccf84c1e5e5602a9e841cb8f7e3bb29f()
    {
        $client = $this->getClient();
        // tag::ccf84c1e5e5602a9e841cb8f7e3bb29f[]
        // TODO -- Implement Example
        // PUT /standard_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "rebuilt_standard": {
        //           "tokenizer": "standard",
        //           "filter": [
        //             "lowercase"       \<1>
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::ccf84c1e5e5602a9e841cb8f7e3bb29f[]

        $curl = 'PUT /standard_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "rebuilt_standard": {'
              . '          "tokenizer": "standard",'
              . '          "filter": ['
              . '            "lowercase"       \<1>'
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
