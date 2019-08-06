<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Version
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/request/version.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Version extends SimpleExamplesTester {

    /**
     * Tag:  9535be36eac8a589bd6bf7b7228eefd7
     * Line: 7
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL7_9535be36eac8a589bd6bf7b7228eefd7()
    {
        $client = $this->getClient();
        // tag::9535be36eac8a589bd6bf7b7228eefd7[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "version": true,
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::9535be36eac8a589bd6bf7b7228eefd7[]

        $curl = 'GET /_search'
              . '{'
              . '    "version": true,'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
