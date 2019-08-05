<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Normalizer
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/params/normalizer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Normalizer extends SimpleExamplesTester {

    /**
     * Tag:  4cd40113e0fc90c37976f28d7e4a2327
     * Line: 14
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL14_4cd40113e0fc90c37976f28d7e4a2327()
    {
        $client = $this->getClient();
        // tag::4cd40113e0fc90c37976f28d7e4a2327[]
        // TODO -- Implement Example
        // PUT index
        // {
        //   "settings": {
        //     "analysis": {
        //       "normalizer": {
        //         "my_normalizer": {
        //           "type": "custom",
        //           "char_filter": [],
        //           "filter": ["lowercase", "asciifolding"]
        //         }
        //       }
        //     }
        //   },
        //   "mappings": {
        //     "properties": {
        //       "foo": {
        //         "type": "keyword",
        //         "normalizer": "my_normalizer"
        //       }
        //     }
        //   }
        // }
        // PUT index/_doc/1
        // {
        //   "foo": "BÀR"
        // }
        // PUT index/_doc/2
        // {
        //   "foo": "bar"
        // }
        // PUT index/_doc/3
        // {
        //   "foo": "baz"
        // }
        // POST index/_refresh
        // GET index/_search
        // {
        //   "query": {
        //     "term": {
        //       "foo": "BAR"
        //     }
        //   }
        // }
        // GET index/_search
        // {
        //   "query": {
        //     "match": {
        //       "foo": "BAR"
        //     }
        //   }
        // }
        // end::4cd40113e0fc90c37976f28d7e4a2327[]

        $curl = 'PUT index'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "normalizer": {'
              . '        "my_normalizer": {'
              . '          "type": "custom",'
              . '          "char_filter": [],'
              . '          "filter": ["lowercase", "asciifolding"]'
              . '        }'
              . '      }'
              . '    }'
              . '  },'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "foo": {'
              . '        "type": "keyword",'
              . '        "normalizer": "my_normalizer"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT index/_doc/1'
              . '{'
              . '  "foo": "BÀR"'
              . '}'
              . 'PUT index/_doc/2'
              . '{'
              . '  "foo": "bar"'
              . '}'
              . 'PUT index/_doc/3'
              . '{'
              . '  "foo": "baz"'
              . '}'
              . 'POST index/_refresh'
              . 'GET index/_search'
              . '{'
              . '  "query": {'
              . '    "term": {'
              . '      "foo": "BAR"'
              . '    }'
              . '  }'
              . '}'
              . 'GET index/_search'
              . '{'
              . '  "query": {'
              . '    "match": {'
              . '      "foo": "BAR"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6f842819c50e8490080dd085e0c6aca3
     * Line: 124
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL124_6f842819c50e8490080dd085e0c6aca3()
    {
        $client = $this->getClient();
        // tag::6f842819c50e8490080dd085e0c6aca3[]
        // TODO -- Implement Example
        // GET index/_search
        // {
        //   "size": 0,
        //   "aggs": {
        //     "foo_terms": {
        //       "terms": {
        //         "field": "foo"
        //       }
        //     }
        //   }
        // }
        // end::6f842819c50e8490080dd085e0c6aca3[]

        $curl = 'GET index/_search'
              . '{'
              . '  "size": 0,'
              . '  "aggs": {'
              . '    "foo_terms": {'
              . '      "terms": {'
              . '        "field": "foo"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
