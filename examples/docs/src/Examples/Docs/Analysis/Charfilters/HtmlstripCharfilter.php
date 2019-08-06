<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Charfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: HtmlstripCharfilter
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/charfilters/htmlstrip-charfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class HtmlstripCharfilter extends SimpleExamplesTester {

    /**
     * Tag:  d6de3491f5787f739d5cd8c2ff3dddfa
     * Line: 12
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL12_d6de3491f5787f739d5cd8c2ff3dddfa()
    {
        $client = $this->getClient();
        // tag::d6de3491f5787f739d5cd8c2ff3dddfa[]
        // TODO -- Implement Example
        // POST _analyze
        // {
        //   "tokenizer":      "keyword", \<1>
        //   "char_filter":  [ "html_strip" ],
        //   "text": "\<p>I&apos;m so \<b>happy</b>!</p>"
        // }
        // end::d6de3491f5787f739d5cd8c2ff3dddfa[]

        $curl = 'POST _analyze'
              . '{'
              . '  "tokenizer":      "keyword", \<1>'
              . '  "char_filter":  [ "html_strip" ],'
              . '  "text": "\<p>I&apos;m so \<b>happy</b>!</p>"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  426f95b13a5b6042b5273d74ad8ee708
     * Line: 75
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL75_426f95b13a5b6042b5273d74ad8ee708()
    {
        $client = $this->getClient();
        // tag::426f95b13a5b6042b5273d74ad8ee708[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "my_analyzer": {
        //           "tokenizer": "keyword",
        //           "char_filter": ["my_char_filter"]
        //         }
        //       },
        //       "char_filter": {
        //         "my_char_filter": {
        //           "type": "html_strip",
        //           "escaped_tags": ["b"]
        //         }
        //       }
        //     }
        //   }
        // }
        // POST my_index/_analyze
        // {
        //   "analyzer": "my_analyzer",
        //   "text": "\<p>I&apos;m so \<b>happy</b>!</p>"
        // }
        // end::426f95b13a5b6042b5273d74ad8ee708[]

        $curl = 'PUT my_index'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "my_analyzer": {'
              . '          "tokenizer": "keyword",'
              . '          "char_filter": ["my_char_filter"]'
              . '        }'
              . '      },'
              . '      "char_filter": {'
              . '        "my_char_filter": {'
              . '          "type": "html_strip",'
              . '          "escaped_tags": ["b"]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "analyzer": "my_analyzer",'
              . '  "text": "\<p>I&apos;m so \<b>happy</b>!</p>"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
