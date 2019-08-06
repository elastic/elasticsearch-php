<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SearchAsYouType
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/types/search-as-you-type.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SearchAsYouType extends SimpleExamplesTester {

    /**
     * Tag:  6f31f9cfe0dd741ccad4af62ba8f815e
     * Line: 18
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL18_6f31f9cfe0dd741ccad4af62ba8f815e()
    {
        $client = $this->getClient();
        // tag::6f31f9cfe0dd741ccad4af62ba8f815e[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "my_field": {
        //         "type": "search_as_you_type"
        //       }
        //     }
        //   }
        // }
        // end::6f31f9cfe0dd741ccad4af62ba8f815e[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "my_field": {'
              . '        "type": "search_as_you_type"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  867e5fad9c57055712fe2b69fa69a97c
     * Line: 72
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL72_867e5fad9c57055712fe2b69fa69a97c()
    {
        $client = $this->getClient();
        // tag::867e5fad9c57055712fe2b69fa69a97c[]
        // TODO -- Implement Example
        // PUT my_index/_doc/1?refresh
        // {
        //   "my_field": "quick brown fox jump lazy dog"
        // }
        // end::867e5fad9c57055712fe2b69fa69a97c[]

        $curl = 'PUT my_index/_doc/1?refresh'
              . '{'
              . '  "my_field": "quick brown fox jump lazy dog"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9bd25962f177e86dbc5a8030a420cc31
     * Line: 89
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL89_9bd25962f177e86dbc5a8030a420cc31()
    {
        $client = $this->getClient();
        // tag::9bd25962f177e86dbc5a8030a420cc31[]
        // TODO -- Implement Example
        // GET my_index/_search
        // {
        //   "query": {
        //     "multi_match": {
        //       "query": "brown f",
        //       "type": "bool_prefix",
        //       "fields": [
        //         "my_field",
        //         "my_field._2gram",
        //         "my_field._3gram"
        //       ]
        //     }
        //   }
        // }
        // end::9bd25962f177e86dbc5a8030a420cc31[]

        $curl = 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "multi_match": {'
              . '      "query": "brown f",'
              . '      "type": "bool_prefix",'
              . '      "fields": ['
              . '        "my_field",'
              . '        "my_field._2gram",'
              . '        "my_field._3gram"'
              . '      ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0ced86822f8c0a479af5e1fe28dfc2ec
     * Line: 151
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL151_0ced86822f8c0a479af5e1fe28dfc2ec()
    {
        $client = $this->getClient();
        // tag::0ced86822f8c0a479af5e1fe28dfc2ec[]
        // TODO -- Implement Example
        // GET my_index/_search
        // {
        //   "query": {
        //     "match_phrase_prefix": {
        //       "my_field": "brown f"
        //     }
        //   }
        // }
        // end::0ced86822f8c0a479af5e1fe28dfc2ec[]

        $curl = 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "match_phrase_prefix": {'
              . '      "my_field": "brown f"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
