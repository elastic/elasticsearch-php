<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: IgnoreAbove
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/params/ignore-above.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class IgnoreAbove extends SimpleExamplesTester {

    /**
     * Tag:  17a77b9c39526c865d7bd6b72cf4a79f
     * Line: 10
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL10_17a77b9c39526c865d7bd6b72cf4a79f()
    {
        $client = $this->getClient();
        // tag::17a77b9c39526c865d7bd6b72cf4a79f[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "message": {
        //         "type": "keyword",
        //         "ignore_above": 20 \<1>
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1 \<2>
        // {
        //   "message": "Syntax error"
        // }
        // PUT my_index/_doc/2 \<3>
        // {
        //   "message": "Syntax error with some long stacktrace"
        // }
        // GET my_index/_search \<4>
        // {
        //   "aggs": {
        //     "messages": {
        //       "terms": {
        //         "field": "message"
        //       }
        //     }
        //   }
        // }
        // end::17a77b9c39526c865d7bd6b72cf4a79f[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "message": {'
              . '        "type": "keyword",'
              . '        "ignore_above": 20 \<1>'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1 \<2>'
              . '{'
              . '  "message": "Syntax error"'
              . '}'
              . 'PUT my_index/_doc/2 \<3>'
              . '{'
              . '  "message": "Syntax error with some long stacktrace"'
              . '}'
              . 'GET my_index/_search \<4>'
              . '{'
              . '  "aggs": {'
              . '    "messages": {'
              . '      "terms": {'
              . '        "field": "message"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
