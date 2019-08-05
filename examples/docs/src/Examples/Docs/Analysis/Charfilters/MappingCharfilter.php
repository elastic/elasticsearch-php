<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Charfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MappingCharfilter
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/charfilters/mapping-charfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MappingCharfilter extends SimpleExamplesTester {

    /**
     * Tag:  f9518803f0368e326ce2f46bd213bde9
     * Line: 35
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL35_f9518803f0368e326ce2f46bd213bde9()
    {
        $client = $this->getClient();
        // tag::f9518803f0368e326ce2f46bd213bde9[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "settings": {
        //     "analysis": {
        //       "analyzer": {
        //         "my_analyzer": {
        //           "tokenizer": "keyword",
        //           "char_filter": [
        //             "my_char_filter"
        //           ]
        //         }
        //       },
        //       "char_filter": {
        //         "my_char_filter": {
        //           "type": "mapping",
        //           "mappings": [
        //             "٠ => 0",
        //             "١ => 1",
        //             "٢ => 2",
        //             "٣ => 3",
        //             "٤ => 4",
        //             "٥ => 5",
        //             "٦ => 6",
        //             "٧ => 7",
        //             "٨ => 8",
        //             "٩ => 9"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // POST my_index/_analyze
        // {
        //   "analyzer": "my_analyzer",
        //   "text": "My license plate is ٢٥٠١٥"
        // }
        // end::f9518803f0368e326ce2f46bd213bde9[]

        $curl = 'PUT my_index'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "my_analyzer": {'
              . '          "tokenizer": "keyword",'
              . '          "char_filter": ['
              . '            "my_char_filter"'
              . '          ]'
              . '        }'
              . '      },'
              . '      "char_filter": {'
              . '        "my_char_filter": {'
              . '          "type": "mapping",'
              . '          "mappings": ['
              . '            "٠ => 0",'
              . '            "١ => 1",'
              . '            "٢ => 2",'
              . '            "٣ => 3",'
              . '            "٤ => 4",'
              . '            "٥ => 5",'
              . '            "٦ => 6",'
              . '            "٧ => 7",'
              . '            "٨ => 8",'
              . '            "٩ => 9"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "analyzer": "my_analyzer",'
              . '  "text": "My license plate is ٢٥٠١٥"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8d5c32d86f00cf27d3f52a5fc493ea30
     * Line: 109
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL109_8d5c32d86f00cf27d3f52a5fc493ea30()
    {
        $client = $this->getClient();
        // tag::8d5c32d86f00cf27d3f52a5fc493ea30[]
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
        //           "type": "mapping",
        //           "mappings": [
        //             ":) => _happy_",
        //             ":( => _sad_"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // POST my_index/_analyze
        // {
        //   "analyzer": "my_analyzer",
        //   "text": "I'm delighted about it :("
        // }
        // end::8d5c32d86f00cf27d3f52a5fc493ea30[]

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
              . '          "type": "mapping",'
              . '          "mappings": ['
              . '            ":) => _happy_",'
              . '            ":( => _sad_"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_analyze'
              . '{'
              . '  "analyzer": "my_analyzer",'
              . '  "text": "I'm delighted about it :("'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
