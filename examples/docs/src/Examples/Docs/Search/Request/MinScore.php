<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MinScore
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/request/min-score.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MinScore extends SimpleExamplesTester {

    /**
     * Tag:  8e8ceac8fc99348f885f85ff714557fd
     * Line: 8
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL8_8e8ceac8fc99348f885f85ff714557fd()
    {
        $client = $this->getClient();
        // tag::8e8ceac8fc99348f885f85ff714557fd[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "min_score": 0.5,
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::8e8ceac8fc99348f885f85ff714557fd[]

        $curl = 'GET /_search'
              . '{'
              . '    "min_score": 0.5,'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
