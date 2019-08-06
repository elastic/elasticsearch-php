<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: KeywordMarkerTokenfilter
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/tokenfilters/keyword-marker-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class KeywordMarkerTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  863c221b28ae5e58d39bd8f138291949
     * Line: 25
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL25_863c221b28ae5e58d39bd8f138291949()
    {
        $client = $this->getClient();
        // tag::863c221b28ae5e58d39bd8f138291949[]
        // TODO -- Implement Example
        // PUT /keyword_marker_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "protect_cats": {
        //           "type": "custom",
        //           "tokenizer": "standard",
        //           "filter": ["lowercase", "protect_cats", "porter_stem"]
        //         },
        //         "normal": {
        //           "type": "custom",
        //           "tokenizer": "standard",
        //           "filter": ["lowercase", "porter_stem"]
        //         }
        //       },
        //       "filter": {
        //         "protect_cats": {
        //           "type": "keyword_marker",
        //           "keywords": ["cats"]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::863c221b28ae5e58d39bd8f138291949[]

        $curl = 'PUT /keyword_marker_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "protect_cats": {'
              . '          "type": "custom",'
              . '          "tokenizer": "standard",'
              . '          "filter": ["lowercase", "protect_cats", "porter_stem"]'
              . '        },'
              . '        "normal": {'
              . '          "type": "custom",'
              . '          "tokenizer": "standard",'
              . '          "filter": ["lowercase", "porter_stem"]'
              . '        }'
              . '      },'
              . '      "filter": {'
              . '        "protect_cats": {'
              . '          "type": "keyword_marker",'
              . '          "keywords": ["cats"]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  abcbf3c246c0d88831b875a601686e35
     * Line: 57
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL57_abcbf3c246c0d88831b875a601686e35()
    {
        $client = $this->getClient();
        // tag::abcbf3c246c0d88831b875a601686e35[]
        // TODO -- Implement Example
        // POST /keyword_marker_example/_analyze
        // {
        //   "analyzer" : "protect_cats",
        //   "text" : "I like cats"
        // }
        // end::abcbf3c246c0d88831b875a601686e35[]

        $curl = 'POST /keyword_marker_example/_analyze'
              . '{'
              . '  "analyzer" : "protect_cats",'
              . '  "text" : "I like cats"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4ab8f55a8a45d53fb1676112379c212e
     * Line: 102
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL102_4ab8f55a8a45d53fb1676112379c212e()
    {
        $client = $this->getClient();
        // tag::4ab8f55a8a45d53fb1676112379c212e[]
        // TODO -- Implement Example
        // POST /keyword_marker_example/_analyze
        // {
        //   "analyzer" : "normal",
        //   "text" : "I like cats"
        // }
        // end::4ab8f55a8a45d53fb1676112379c212e[]

        $curl = 'POST /keyword_marker_example/_analyze'
              . '{'
              . '  "analyzer" : "normal",'
              . '  "text" : "I like cats"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
