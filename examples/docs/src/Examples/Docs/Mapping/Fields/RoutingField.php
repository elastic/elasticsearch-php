<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Fields;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: RoutingField
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/fields/routing-field.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class RoutingField extends SimpleExamplesTester {

    /**
     * Tag:  b684073ea8d34359c290c663d2a5e798
     * Line: 15
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL15_b684073ea8d34359c290c663d2a5e798()
    {
        $client = $this->getClient();
        // tag::b684073ea8d34359c290c663d2a5e798[]
        // TODO -- Implement Example
        // PUT my_index/_doc/1?routing=user1&refresh=true \<1>
        // {
        //   "title": "This is a document"
        // }
        // GET my_index/_doc/1?routing=user1 \<2>
        // end::b684073ea8d34359c290c663d2a5e798[]

        $curl = 'PUT my_index/_doc/1?routing=user1&refresh=true \<1>'
              . '{'
              . '  "title": "This is a document"'
              . '}'
              . 'GET my_index/_doc/1?routing=user1 \<2>';

        // TODO -- make assertion
    }

    /**
     * Tag:  6817609dd2fcb73b9920327c5cf5ec77
     * Line: 34
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL34_6817609dd2fcb73b9920327c5cf5ec77()
    {
        $client = $this->getClient();
        // tag::6817609dd2fcb73b9920327c5cf5ec77[]
        // TODO -- Implement Example
        // GET my_index/_search
        // {
        //   "query": {
        //     "terms": {
        //       "_routing": [ "user1" ] \<1>
        //     }
        //   }
        // }
        // end::6817609dd2fcb73b9920327c5cf5ec77[]

        $curl = 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "terms": {'
              . '      "_routing": [ "user1" ] \<1>'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  134bdbfb50c81dd3c487514faabc81d3
     * Line: 55
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL55_134bdbfb50c81dd3c487514faabc81d3()
    {
        $client = $this->getClient();
        // tag::134bdbfb50c81dd3c487514faabc81d3[]
        // TODO -- Implement Example
        // GET my_index/_search?routing=user1,user2 \<1>
        // {
        //   "query": {
        //     "match": {
        //       "title": "document"
        //     }
        //   }
        // }
        // end::134bdbfb50c81dd3c487514faabc81d3[]

        $curl = 'GET my_index/_search?routing=user1,user2 \<1>'
              . '{'
              . '  "query": {'
              . '    "match": {'
              . '      "title": "document"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4f3089b403945e391f03280ae2f360a4
     * Line: 81
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL81_4f3089b403945e391f03280ae2f360a4()
    {
        $client = $this->getClient();
        // tag::4f3089b403945e391f03280ae2f360a4[]
        // TODO -- Implement Example
        // PUT my_index2
        // {
        //   "mappings": {
        //     "_routing": {
        //       "required": true \<1>
        //     }
        //   }
        // }
        // PUT my_index2/_doc/1 \<2>
        // {
        //   "text": "No routing value provided"
        // }
        // end::4f3089b403945e391f03280ae2f360a4[]

        $curl = 'PUT my_index2'
              . '{'
              . '  "mappings": {'
              . '    "_routing": {'
              . '      "required": true \<1>'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index2/_doc/1 \<2>'
              . '{'
              . '  "text": "No routing value provided"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
