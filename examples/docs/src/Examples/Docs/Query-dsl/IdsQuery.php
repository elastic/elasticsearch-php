<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: IdsQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/ids-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class IdsQuery extends SimpleExamplesTester {

    /**
     * Tag:  84cdb6a7a5464af7ef95b3d546883870
     * Line: 13
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL13_84cdb6a7a5464af7ef95b3d546883870()
    {
        $client = $this->getClient();
        // tag::84cdb6a7a5464af7ef95b3d546883870[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "ids" : {
        //             "values" : ["1", "4", "100"]
        //         }
        //     }
        // }
        // end::84cdb6a7a5464af7ef95b3d546883870[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "ids" : {'
              . '            "values" : ["1", "4", "100"]'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
