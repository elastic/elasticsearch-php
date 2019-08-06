<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Preference
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/request/preference.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Preference extends SimpleExamplesTester {

    /**
     * Tag:  9405de6fd841c32ac510eb0a7eeed989
     * Line: 59
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL59_9405de6fd841c32ac510eb0a7eeed989()
    {
        $client = $this->getClient();
        // tag::9405de6fd841c32ac510eb0a7eeed989[]
        // TODO -- Implement Example
        // GET /_search?preference=xyzabc123
        // {
        //     "query": {
        //         "match": {
        //             "title": "elasticsearch"
        //         }
        //     }
        // }
        // end::9405de6fd841c32ac510eb0a7eeed989[]

        $curl = 'GET /_search?preference=xyzabc123'
              . '{'
              . '    "query": {'
              . '        "match": {'
              . '            "title": "elasticsearch"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
