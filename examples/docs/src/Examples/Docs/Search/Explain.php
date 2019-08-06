<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Explain
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/explain.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Explain extends SimpleExamplesTester {

    /**
     * Tag:  abfec22fbe7d571711cc65661ca887ee
     * Line: 16
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL16_abfec22fbe7d571711cc65661ca887ee()
    {
        $client = $this->getClient();
        // tag::abfec22fbe7d571711cc65661ca887ee[]
        // TODO -- Implement Example
        // GET /twitter/_explain/0
        // {
        //       "query" : {
        //         "match" : { "message" : "elasticsearch" }
        //       }
        // }
        // end::abfec22fbe7d571711cc65661ca887ee[]

        $curl = 'GET /twitter/_explain/0'
              . '{'
              . '      "query" : {'
              . '        "match" : { "message" : "elasticsearch" }'
              . '      }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5032518611d928d1f802e215cf79c550
     * Line: 110
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL110_5032518611d928d1f802e215cf79c550()
    {
        $client = $this->getClient();
        // tag::5032518611d928d1f802e215cf79c550[]
        // TODO -- Implement Example
        // GET /twitter/_explain/0?q=message:search
        // end::5032518611d928d1f802e215cf79c550[]

        $curl = 'GET /twitter/_explain/0?q=message:search';

        // TODO -- make assertion
    }

// %__METHOD__%



}
