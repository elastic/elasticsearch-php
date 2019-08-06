<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PositionIncrementGap
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/params/position-increment-gap.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PositionIncrementGap extends SimpleExamplesTester {

    /**
     * Tag:  5e17abef396d757d65edf81dff5701b6
     * Line: 15
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL15_5e17abef396d757d65edf81dff5701b6()
    {
        $client = $this->getClient();
        // tag::5e17abef396d757d65edf81dff5701b6[]
        // TODO -- Implement Example
        // PUT my_index/_doc/1
        // {
        //     "names": [ "John Abraham", "Lincoln Smith"]
        // }
        // GET my_index/_search
        // {
        //     "query": {
        //         "match_phrase": {
        //             "names": {
        //                 "query": "Abraham Lincoln" \<1>
        //             }
        //         }
        //     }
        // }
        // GET my_index/_search
        // {
        //     "query": {
        //         "match_phrase": {
        //             "names": {
        //                 "query": "Abraham Lincoln",
        //                 "slop": 101 \<2>
        //             }
        //         }
        //     }
        // }
        // end::5e17abef396d757d65edf81dff5701b6[]

        $curl = 'PUT my_index/_doc/1'
              . '{'
              . '    "names": [ "John Abraham", "Lincoln Smith"]'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '    "query": {'
              . '        "match_phrase": {'
              . '            "names": {'
              . '                "query": "Abraham Lincoln" \<1>'
              . '            }'
              . '        }'
              . '    }'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '    "query": {'
              . '        "match_phrase": {'
              . '            "names": {'
              . '                "query": "Abraham Lincoln",'
              . '                "slop": 101 \<2>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a37ed1648f68b69e2ea467b38ce21ffc
     * Line: 53
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL53_a37ed1648f68b69e2ea467b38ce21ffc()
    {
        $client = $this->getClient();
        // tag::a37ed1648f68b69e2ea467b38ce21ffc[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "names": {
        //         "type": "text",
        //         "position_increment_gap": 0 \<1>
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //     "names": [ "John Abraham", "Lincoln Smith"]
        // }
        // GET my_index/_search
        // {
        //     "query": {
        //         "match_phrase": {
        //             "names": "Abraham Lincoln" \<2>
        //         }
        //     }
        // }
        // end::a37ed1648f68b69e2ea467b38ce21ffc[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "names": {'
              . '        "type": "text",'
              . '        "position_increment_gap": 0 \<1>'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '    "names": [ "John Abraham", "Lincoln Smith"]'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '    "query": {'
              . '        "match_phrase": {'
              . '            "names": "Abraham Lincoln" \<2>'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
