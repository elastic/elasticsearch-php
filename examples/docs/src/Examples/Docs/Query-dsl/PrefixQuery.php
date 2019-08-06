<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PrefixQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/prefix-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PrefixQuery extends SimpleExamplesTester {

    /**
     * Tag:  81514791349e0e79ac565160e42889c0
     * Line: 16
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL16_81514791349e0e79ac565160e42889c0()
    {
        $client = $this->getClient();
        // tag::81514791349e0e79ac565160e42889c0[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "prefix": {
        //             "user": {
        //                 "value": "ki"
        //             }
        //         }
        //     }
        // }
        // end::81514791349e0e79ac565160e42889c0[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "prefix": {'
              . '            "user": {'
              . '                "value": "ki"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  32ea547cefa2976c8c3c2eb45a2a4ff4
     * Line: 54
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL54_32ea547cefa2976c8c3c2eb45a2a4ff4()
    {
        $client = $this->getClient();
        // tag::32ea547cefa2976c8c3c2eb45a2a4ff4[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "prefix" : { "user" : "ki" }
        //     }
        // }
        // end::32ea547cefa2976c8c3c2eb45a2a4ff4[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "prefix" : { "user" : "ki" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
