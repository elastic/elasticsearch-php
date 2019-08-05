<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Rollup;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: RollupSearchLimitations
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   rollup/rollup-search-limitations.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class RollupSearchLimitations extends SimpleExamplesTester {

    /**
     * Tag:  3d1cea1ad861d1ee62e5f34b84371943
     * Line: 45
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL45_3d1cea1ad861d1ee62e5f34b84371943()
    {
        $client = $this->getClient();
        // tag::3d1cea1ad861d1ee62e5f34b84371943[]
        // TODO -- Implement Example
        // GET sensor_rollup/_rollup_search
        // {
        //     "size": 0,
        //     "aggregations": {
        //         "avg_temperature": {
        //             "avg": {
        //                 "field": "temperature"
        //             }
        //         }
        //     }
        // }
        // end::3d1cea1ad861d1ee62e5f34b84371943[]

        $curl = 'GET sensor_rollup/_rollup_search'
              . '{'
              . '    "size": 0,'
              . '    "aggregations": {'
              . '        "avg_temperature": {'
              . '            "avg": {'
              . '                "field": "temperature"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
