<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: WrapperQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/wrapper-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class WrapperQuery extends SimpleExamplesTester {

    /**
     * Tag:  6159a7d56e93e14a31fc06644c803a38
     * Line: 10
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL10_6159a7d56e93e14a31fc06644c803a38()
    {
        $client = $this->getClient();
        // tag::6159a7d56e93e14a31fc06644c803a38[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "wrapper": {
        //             "query" : "eyJ0ZXJtIiA6IHsgInVzZXIiIDogIktpbWNoeSIgfX0=" \<1>
        //         }
        //     }
        // }
        // end::6159a7d56e93e14a31fc06644c803a38[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "wrapper": {'
              . '            "query" : "eyJ0ZXJtIiA6IHsgInVzZXIiIDogIktpbWNoeSIgfX0=" \<1>'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
