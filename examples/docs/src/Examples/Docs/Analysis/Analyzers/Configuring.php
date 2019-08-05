<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Analyzers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Configuring
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/analyzers/configuring.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Configuring extends SimpleExamplesTester {

    /**
     * Tag:  98fa08f638178692476abcae1ac8ce5a
     * Line: 10
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL10_98fa08f638178692476abcae1ac8ce5a()
    {
        $client = $this->getClient();
        // tag::98fa08f638178692476abcae1ac8ce5a[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "std_english": { \<1>
        //           "type":      "standard",
        //           "stopwords": "_english_"
        //         }
        //       }
        //     }
        //   },
        //   "mappings": {
        //     "properties": {
        //       "my_text": {
        //         "type":     "text",
        //         "analyzer": "standard", \<2>
        //         "fields": {
        //           "english": {
        //             "type":     "text",
        //             "analyzer": "std_english" \<3>
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // POST my_index/_analyze
        // {
        //   "field": "my_text", \<2>
        //   "text": "The old brown cow"
        // }
        // POST my_index/_analyze
        // {
        //   "field": "my_text.english", \<3>
        //   "text": "The old brown cow"
        // }
        // end::98fa08f638178692476abcae1ac8ce5a[]

        $curl = 'PUT my_index'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "std_english": { \<1>'
              . '          "type":      "standard",'
              . '          "stopwords": "_english_"'
              . '        }'
              . '      }'
              . '    }'
              . '  },'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "my_text": {'
              . '        "type":     "text",'
              . '        "analyzer": "standard", \<2>'
              . '        "fields": {'
              . '          "english": {'
              . '            "type":     "text",'
              . '            "analyzer": "std_english" \<3>'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "field": "my_text", \<2>'
              . '  "text": "The old brown cow"'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "field": "my_text.english", \<3>'
              . '  "text": "The old brown cow"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
