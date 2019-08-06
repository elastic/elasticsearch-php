<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Analyzers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: FingerprintAnalyzer
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/analyzers/fingerprint-analyzer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class FingerprintAnalyzer extends SimpleExamplesTester {

    /**
     * Tag:  6490d89a4e43cac5e6b9bc19840d5478
     * Line: 16
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL16_6490d89a4e43cac5e6b9bc19840d5478()
    {
        $client = $this->getClient();
        // tag::6490d89a4e43cac5e6b9bc19840d5478[]
        // TODO -- Implement Example
        // POST _analyze
        // {
        //   "analyzer": "fingerprint",
        //   "text": "Yes yes, Gödel said this sentence is consistent and."
        // }
        // end::6490d89a4e43cac5e6b9bc19840d5478[]

        $curl = 'POST _analyze'
              . '{'
              . '  "analyzer": "fingerprint",'
              . '  "text": "Yes yes, Gödel said this sentence is consistent and."'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2659ccd414867f3a5ee262c9b7cd3f1d
     * Line: 88
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL88_2659ccd414867f3a5ee262c9b7cd3f1d()
    {
        $client = $this->getClient();
        // tag::2659ccd414867f3a5ee262c9b7cd3f1d[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "my_fingerprint_analyzer": {
        //           "type": "fingerprint",
        //           "stopwords": "_english_"
        //         }
        //       }
        //     }
        //   }
        // }
        // POST my_index/_analyze
        // {
        //   "analyzer": "my_fingerprint_analyzer",
        //   "text": "Yes yes, Gödel said this sentence is consistent and."
        // }
        // end::2659ccd414867f3a5ee262c9b7cd3f1d[]

        $curl = 'PUT my_index'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "my_fingerprint_analyzer": {'
              . '          "type": "fingerprint",'
              . '          "stopwords": "_english_"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "analyzer": "my_fingerprint_analyzer",'
              . '  "text": "Yes yes, Gödel said this sentence is consistent and."'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ce725697f93b3eebb3a266314568565a
     * Line: 160
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL160_ce725697f93b3eebb3a266314568565a()
    {
        $client = $this->getClient();
        // tag::ce725697f93b3eebb3a266314568565a[]
        // TODO -- Implement Example
        // PUT /fingerprint_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "rebuilt_fingerprint": {
        //           "tokenizer": "standard",
        //           "filter": [
        //             "lowercase",
        //             "asciifolding",
        //             "fingerprint"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::ce725697f93b3eebb3a266314568565a[]

        $curl = 'PUT /fingerprint_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "rebuilt_fingerprint": {'
              . '          "tokenizer": "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "asciifolding",'
              . '            "fingerprint"'
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
