<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: KeywordRepeatTokenfilter
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/tokenfilters/keyword-repeat-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class KeywordRepeatTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  9da83c9a2149bfc6fe215a612ae0a9aa
     * Line: 16
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL16_9da83c9a2149bfc6fe215a612ae0a9aa()
    {
        $client = $this->getClient();
        // tag::9da83c9a2149bfc6fe215a612ae0a9aa[]
        // TODO -- Implement Example
        // PUT /keyword_repeat_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "stemmed_and_unstemmed": {
        //           "type": "custom",
        //           "tokenizer": "standard",
        //           "filter": ["lowercase", "keyword_repeat", "porter_stem", "unique_stem"]
        //         }
        //       },
        //       "filter": {
        //         "unique_stem": {
        //           "type": "unique",
        //           "only_on_same_position": true
        //         }
        //       }
        //     }
        //   }
        // }
        // end::9da83c9a2149bfc6fe215a612ae0a9aa[]

        $curl = 'PUT /keyword_repeat_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "stemmed_and_unstemmed": {'
              . '          "type": "custom",'
              . '          "tokenizer": "standard",'
              . '          "filter": ["lowercase", "keyword_repeat", "porter_stem", "unique_stem"]'
              . '        }'
              . '      },'
              . '      "filter": {'
              . '        "unique_stem": {'
              . '          "type": "unique",'
              . '          "only_on_same_position": true'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  757622a424b8445fee49746862a11b02
     * Line: 43
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL43_757622a424b8445fee49746862a11b02()
    {
        $client = $this->getClient();
        // tag::757622a424b8445fee49746862a11b02[]
        // TODO -- Implement Example
        // POST /keyword_repeat_example/_analyze
        // {
        //   "analyzer" : "stemmed_and_unstemmed",
        //   "text" : "I like cats"
        // }
        // end::757622a424b8445fee49746862a11b02[]

        $curl = 'POST /keyword_repeat_example/_analyze'
              . '{'
              . '  "analyzer" : "stemmed_and_unstemmed",'
              . '  "text" : "I like cats"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
