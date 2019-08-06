<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Scripting;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Fields
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   scripting/fields.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Fields extends SimpleExamplesTester {

    /**
     * Tag:  729f4abc0b4edaf6b58bd9e7b3fd5a8b
     * Line: 46
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL46_729f4abc0b4edaf6b58bd9e7b3fd5a8b()
    {
        $client = $this->getClient();
        // tag::729f4abc0b4edaf6b58bd9e7b3fd5a8b[]
        // TODO -- Implement Example
        // PUT my_index/_doc/1?refresh
        // {
        //   "text": "quick brown fox",
        //   "popularity": 1
        // }
        // PUT my_index/_doc/2?refresh
        // {
        //   "text": "quick fox",
        //   "popularity": 5
        // }
        // GET my_index/_search
        // {
        //   "query": {
        //     "function_score": {
        //       "query": {
        //         "match": {
        //           "text": "quick brown fox"
        //         }
        //       },
        //       "script_score": {
        //         "script": {
        //           "lang": "expression",
        //           "source": "_score * doc[\'popularity\']"
        //         }
        //       }
        //     }
        //   }
        // }
        // end::729f4abc0b4edaf6b58bd9e7b3fd5a8b[]

        $curl = 'PUT my_index/_doc/1?refresh'
              . '{'
              . '  "text": "quick brown fox",'
              . '  "popularity": 1'
              . '}'
              . 'PUT my_index/_doc/2?refresh'
              . '{'
              . '  "text": "quick fox",'
              . '  "popularity": 5'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "function_score": {'
              . '      "query": {'
              . '        "match": {'
              . '          "text": "quick brown fox"'
              . '        }'
              . '      },'
              . '      "script_score": {'
              . '        "script": {'
              . '          "lang": "expression",'
              . '          "source": "_score * doc[\'popularity\']"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0dfe9d6724c7bd11094bb4a0796e7ac7
     * Line: 91
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL91_0dfe9d6724c7bd11094bb4a0796e7ac7()
    {
        $client = $this->getClient();
        // tag::0dfe9d6724c7bd11094bb4a0796e7ac7[]
        // TODO -- Implement Example
        // PUT my_index/_doc/1?refresh
        // {
        //   "cost_price": 100
        // }
        // GET my_index/_search
        // {
        //   "script_fields": {
        //     "sales_price": {
        //       "script": {
        //         "lang":   "expression",
        //         "source": "doc[\'cost_price\'] * markup",
        //         "params": {
        //           "markup": 0.2
        //         }
        //       }
        //     }
        //   }
        // }
        // end::0dfe9d6724c7bd11094bb4a0796e7ac7[]

        $curl = 'PUT my_index/_doc/1?refresh'
              . '{'
              . '  "cost_price": 100'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "script_fields": {'
              . '    "sales_price": {'
              . '      "script": {'
              . '        "lang":   "expression",'
              . '        "source": "doc[\'cost_price\'] * markup",'
              . '        "params": {'
              . '          "markup": 0.2'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2a9c29afe23e30a68dd6e30ea22f5d42
     * Line: 174
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL174_2a9c29afe23e30a68dd6e30ea22f5d42()
    {
        $client = $this->getClient();
        // tag::2a9c29afe23e30a68dd6e30ea22f5d42[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "title": { \<1>
        //         "type": "text"
        //       },
        //       "first_name": {
        //         "type": "text",
        //         "store": true
        //       },
        //       "last_name": {
        //         "type": "text",
        //         "store": true
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1?refresh
        // {
        //   "title": "Mr",
        //   "first_name": "Barry",
        //   "last_name": "White"
        // }
        // GET my_index/_search
        // {
        //   "script_fields": {
        //     "source": {
        //       "script": {
        //         "lang": "painless",
        //         "source": "params._source.title + \' \' + params._source.first_name + \' \' + params._source.last_name" \<2>
        //       }
        //     },
        //     "stored_fields": {
        //       "script": {
        //         "lang": "painless",
        //         "source": "params._fields[\'first_name\'].value + \' \' + params._fields[\'last_name\'].value"
        //       }
        //     }
        //   }
        // }
        // end::2a9c29afe23e30a68dd6e30ea22f5d42[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "title": { \<1>'
              . '        "type": "text"'
              . '      },'
              . '      "first_name": {'
              . '        "type": "text",'
              . '        "store": true'
              . '      },'
              . '      "last_name": {'
              . '        "type": "text",'
              . '        "store": true'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1?refresh'
              . '{'
              . '  "title": "Mr",'
              . '  "first_name": "Barry",'
              . '  "last_name": "White"'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "script_fields": {'
              . '    "source": {'
              . '      "script": {'
              . '        "lang": "painless",'
              . '        "source": "params._source.title + \' \' + params._source.first_name + \' \' + params._source.last_name" \<2>'
              . '      }'
              . '    },'
              . '    "stored_fields": {'
              . '      "script": {'
              . '        "lang": "painless",'
              . '        "source": "params._fields[\'first_name\'].value + \' \' + params._fields[\'last_name\'].value"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
