<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Enabled
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/params/enabled.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Enabled extends SimpleExamplesTester {

    /**
     * Tag:  b0b00ab5b673d747d36deabbc4359859
     * Line: 17
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL17_b0b00ab5b673d747d36deabbc4359859()
    {
        $client = $this->getClient();
        // tag::b0b00ab5b673d747d36deabbc4359859[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "user_id": {
        //         "type":  "keyword"
        //       },
        //       "last_updated": {
        //         "type": "date"
        //       },
        //       "session_data": { \<1>
        //         "type": "object",
        //         "enabled": false
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/session_1
        // {
        //   "user_id": "kimchy",
        //   "session_data": { \<2>
        //     "arbitrary_object": {
        //       "some_array": [ "foo", "bar", { "baz": 2 } ]
        //     }
        //   },
        //   "last_updated": "2015-12-06T18:20:22"
        // }
        // PUT my_index/_doc/session_2
        // {
        //   "user_id": "jpountz",
        //   "session_data": "none", \<3>
        //   "last_updated": "2015-12-06T18:22:13"
        // }
        // end::b0b00ab5b673d747d36deabbc4359859[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "user_id": {'
              . '        "type":  "keyword"'
              . '      },'
              . '      "last_updated": {'
              . '        "type": "date"'
              . '      },'
              . '      "session_data": { \<1>'
              . '        "type": "object",'
              . '        "enabled": false'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/session_1'
              . '{'
              . '  "user_id": "kimchy",'
              . '  "session_data": { \<2>'
              . '    "arbitrary_object": {'
              . '      "some_array": [ "foo", "bar", { "baz": 2 } ]'
              . '    }'
              . '  },'
              . '  "last_updated": "2015-12-06T18:20:22"'
              . '}'
              . 'PUT my_index/_doc/session_2'
              . '{'
              . '  "user_id": "jpountz",'
              . '  "session_data": "none", \<3>'
              . '  "last_updated": "2015-12-06T18:22:13"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d31274ad53af4baa23ec3e5000783cbd
     * Line: 64
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL64_d31274ad53af4baa23ec3e5000783cbd()
    {
        $client = $this->getClient();
        // tag::d31274ad53af4baa23ec3e5000783cbd[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "enabled": false \<1>
        //   }
        // }
        // PUT my_index/_doc/session_1
        // {
        //   "user_id": "kimchy",
        //   "session_data": {
        //     "arbitrary_object": {
        //       "some_array": [ "foo", "bar", { "baz": 2 } ]
        //     }
        //   },
        //   "last_updated": "2015-12-06T18:20:22"
        // }
        // GET my_index/_doc/session_1 \<2>
        // GET my_index/_mapping \<3>
        // end::d31274ad53af4baa23ec3e5000783cbd[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "enabled": false \<1>'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/session_1'
              . '{'
              . '  "user_id": "kimchy",'
              . '  "session_data": {'
              . '    "arbitrary_object": {'
              . '      "some_array": [ "foo", "bar", { "baz": 2 } ]'
              . '    }'
              . '  },'
              . '  "last_updated": "2015-12-06T18:20:22"'
              . '}'
              . 'GET my_index/_doc/session_1 \<2>'
              . 'GET my_index/_mapping \<3>';

        // TODO -- make assertion
    }

    /**
     * Tag:  e93514654ea0c7c9f15cda0eed61a292
     * Line: 98
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL98_e93514654ea0c7c9f15cda0eed61a292()
    {
        $client = $this->getClient();
        // tag::e93514654ea0c7c9f15cda0eed61a292[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "session_data": {
        //         "type": "object",
        //         "enabled": false
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/session_1
        // {
        //   "session_data": "foo bar" \<1>
        // }
        // end::e93514654ea0c7c9f15cda0eed61a292[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "session_data": {'
              . '        "type": "object",'
              . '        "enabled": false'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/session_1'
              . '{'
              . '  "session_data": "foo bar" \<1>'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
