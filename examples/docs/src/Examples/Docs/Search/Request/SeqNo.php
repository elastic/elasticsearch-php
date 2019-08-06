<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SeqNo
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/request/seq-no.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SeqNo extends SimpleExamplesTester {

    /**
     * Tag:  63965d439716ed6d18d30baef09001a5
     * Line: 8
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL8_63965d439716ed6d18d30baef09001a5()
    {
        $client = $this->getClient();
        // tag::63965d439716ed6d18d30baef09001a5[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "seq_no_primary_term": true,
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::63965d439716ed6d18d30baef09001a5[]

        $curl = 'GET /_search'
              . '{'
              . '    "seq_no_primary_term": true,'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
