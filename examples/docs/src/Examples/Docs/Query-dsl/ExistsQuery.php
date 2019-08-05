<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ExistsQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/exists-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ExistsQuery extends SimpleExamplesTester {

    /**
     * Tag:  3342c69b2c2303247217532956fcce85
     * Line: 20
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL20_3342c69b2c2303247217532956fcce85()
    {
        $client = $this->getClient();
        // tag::3342c69b2c2303247217532956fcce85[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "exists": {
        //             "field": "user"
        //         }
        //     }
        // }
        // end::3342c69b2c2303247217532956fcce85[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "exists": {'
              . '            "field": "user"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  43af86de5e49aa06070092fffc138208
     * Line: 57
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL57_43af86de5e49aa06070092fffc138208()
    {
        $client = $this->getClient();
        // tag::43af86de5e49aa06070092fffc138208[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "bool": {
        //             "must_not": {
        //                 "exists": {
        //                     "field": "user"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::43af86de5e49aa06070092fffc138208[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "bool": {'
              . '            "must_not": {'
              . '                "exists": {'
              . '                    "field": "user"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
