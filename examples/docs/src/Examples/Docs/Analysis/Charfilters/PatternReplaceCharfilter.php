<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Charfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PatternReplaceCharfilter
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/charfilters/pattern-replace-charfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PatternReplaceCharfilter extends SimpleExamplesTester {

    /**
     * Tag:  2b8ba109999fc87712433cea92c99ebe
     * Line: 51
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL51_2b8ba109999fc87712433cea92c99ebe()
    {
        $client = $this->getClient();
        // tag::2b8ba109999fc87712433cea92c99ebe[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "my_analyzer": {
        //           "tokenizer": "standard",
        //           "char_filter": [
        //             "my_char_filter"
        //           ]
        //         }
        //       },
        //       "char_filter": {
        //         "my_char_filter": {
        //           "type": "pattern_replace",
        //           "pattern": "(\\d+)-(?=\\d)",
        //           "replacement": "$1_"
        //         }
        //       }
        //     }
        //   }
        // }
        // POST my_index/_analyze
        // {
        //   "analyzer": "my_analyzer",
        //   "text": "My credit card is 123-456-789"
        // }
        // end::2b8ba109999fc87712433cea92c99ebe[]

        $curl = 'PUT my_index'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "my_analyzer": {'
              . '          "tokenizer": "standard",'
              . '          "char_filter": ['
              . '            "my_char_filter"'
              . '          ]'
              . '        }'
              . '      },'
              . '      "char_filter": {'
              . '        "my_char_filter": {'
              . '          "type": "pattern_replace",'
              . '          "pattern": "(\\d+)-(?=\\d)",'
              . '          "replacement": "$1_"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "analyzer": "my_analyzer",'
              . '  "text": "My credit card is 123-456-789"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1e1f0d83b1ca672396341af5dcfd2603
     * Line: 102
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL102_1e1f0d83b1ca672396341af5dcfd2603()
    {
        $client = $this->getClient();
        // tag::1e1f0d83b1ca672396341af5dcfd2603[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "my_analyzer": {
        //           "tokenizer": "standard",
        //           "char_filter": [
        //             "my_char_filter"
        //           ],
        //           "filter": [
        //             "lowercase"
        //           ]
        //         }
        //       },
        //       "char_filter": {
        //         "my_char_filter": {
        //           "type": "pattern_replace",
        //           "pattern": "(?<=\\p{Lower})(?=\\p{Upper})",
        //           "replacement": " "
        //         }
        //       }
        //     }
        //   },
        //   "mappings": {
        //     "properties": {
        //       "text": {
        //         "type": "text",
        //         "analyzer": "my_analyzer"
        //       }
        //     }
        //   }
        // }
        // POST my_index/_analyze
        // {
        //   "analyzer": "my_analyzer",
        //   "text": "The fooBarBaz method"
        // }
        // end::1e1f0d83b1ca672396341af5dcfd2603[]

        $curl = 'PUT my_index'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "my_analyzer": {'
              . '          "tokenizer": "standard",'
              . '          "char_filter": ['
              . '            "my_char_filter"'
              . '          ],'
              . '          "filter": ['
              . '            "lowercase"'
              . '          ]'
              . '        }'
              . '      },'
              . '      "char_filter": {'
              . '        "my_char_filter": {'
              . '          "type": "pattern_replace",'
              . '          "pattern": "(?<=\\p{Lower})(?=\\p{Upper})",'
              . '          "replacement": " "'
              . '        }'
              . '      }'
              . '    }'
              . '  },'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "text": {'
              . '        "type": "text",'
              . '        "analyzer": "my_analyzer"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "analyzer": "my_analyzer",'
              . '  "text": "The fooBarBaz method"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  32afaee3f1326785b4009ff48576d42f
     * Line: 205
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL205_32afaee3f1326785b4009ff48576d42f()
    {
        $client = $this->getClient();
        // tag::32afaee3f1326785b4009ff48576d42f[]
        // TODO -- Implement Example
        // PUT my_index/_doc/1?refresh
        // {
        //   "text": "The fooBarBaz method"
        // }
        // GET my_index/_search
        // {
        //   "query": {
        //     "match": {
        //       "text": "bar"
        //     }
        //   },
        //   "highlight": {
        //     "fields": {
        //       "text": {}
        //     }
        //   }
        // }
        // end::32afaee3f1326785b4009ff48576d42f[]

        $curl = 'PUT my_index/_doc/1?refresh'
              . '{'
              . '  "text": "The fooBarBaz method"'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "match": {'
              . '      "text": "bar"'
              . '    }'
              . '  },'
              . '  "highlight": {'
              . '    "fields": {'
              . '      "text": {}'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
