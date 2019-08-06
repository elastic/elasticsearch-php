<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Boolean
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/types/boolean.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Boolean extends SimpleExamplesTester {

    /**
     * Tag:  1c1be1df747c9f8ecc9f82e980387d8f
     * Line: 22
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL22_1c1be1df747c9f8ecc9f82e980387d8f()
    {
        $client = $this->getClient();
        // tag::1c1be1df747c9f8ecc9f82e980387d8f[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "is_published": {
        //         "type": "boolean"
        //       }
        //     }
        //   }
        // }
        // POST my_index/_doc/1
        // {
        //   "is_published": "true" \<1>
        // }
        // GET my_index/_search
        // {
        //   "query": {
        //     "term": {
        //       "is_published": true \<2>
        //     }
        //   }
        // }
        // end::1c1be1df747c9f8ecc9f82e980387d8f[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "is_published": {'
              . '        "type": "boolean"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST my_index/_doc/1'
              . '{'
              . '  "is_published": "true" \<1>'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "term": {'
              . '      "is_published": true \<2>'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  636ec3c018ac15ec11caf6f3d835a08c
     * Line: 58
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL58_636ec3c018ac15ec11caf6f3d835a08c()
    {
        $client = $this->getClient();
        // tag::636ec3c018ac15ec11caf6f3d835a08c[]
        // TODO -- Implement Example
        // POST my_index/_doc/1
        // {
        //   "is_published": true
        // }
        // POST my_index/_doc/2
        // {
        //   "is_published": false
        // }
        // GET my_index/_search
        // {
        //   "aggs": {
        //     "publish_state": {
        //       "terms": {
        //         "field": "is_published"
        //       }
        //     }
        //   },
        //   "script_fields": {
        //     "is_published": {
        //       "script": {
        //         "lang": "painless",
        //         "source": "doc[\'is_published\'].value"
        //       }
        //     }
        //   }
        // }
        // end::636ec3c018ac15ec11caf6f3d835a08c[]

        $curl = 'POST my_index/_doc/1'
              . '{'
              . '  "is_published": true'
              . '}'
              . 'POST my_index/_doc/2'
              . '{'
              . '  "is_published": false'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "aggs": {'
              . '    "publish_state": {'
              . '      "terms": {'
              . '        "field": "is_published"'
              . '      }'
              . '    }'
              . '  },'
              . '  "script_fields": {'
              . '    "is_published": {'
              . '      "script": {'
              . '        "lang": "painless",'
              . '        "source": "doc[\'is_published\'].value"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
