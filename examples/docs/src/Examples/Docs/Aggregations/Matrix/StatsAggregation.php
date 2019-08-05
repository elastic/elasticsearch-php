<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Matrix;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: StatsAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/matrix/stats-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class StatsAggregation extends SimpleExamplesTester {

    /**
     * Tag:  8ab89e635fcbc485d1728c13dfeeb1ae
     * Line: 39
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL39_8ab89e635fcbc485d1728c13dfeeb1ae()
    {
        $client = $this->getClient();
        // tag::8ab89e635fcbc485d1728c13dfeeb1ae[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs": {
        //         "statistics": {
        //             "matrix_stats": {
        //                 "fields": ["poverty", "income"]
        //             }
        //         }
        //     }
        // }
        // end::8ab89e635fcbc485d1728c13dfeeb1ae[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs": {'
              . '        "statistics": {'
              . '            "matrix_stats": {'
              . '                "fields": ["poverty", "income"]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7ee2877f8f031b9a4e56a40b371421fb
     * Line: 123
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL123_7ee2877f8f031b9a4e56a40b371421fb()
    {
        $client = $this->getClient();
        // tag::7ee2877f8f031b9a4e56a40b371421fb[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs": {
        //         "matrixstats": {
        //             "matrix_stats": {
        //                 "fields": ["poverty", "income"],
        //                 "missing": {"income" : 50000} \<1>
        //             }
        //         }
        //     }
        // }
        // end::7ee2877f8f031b9a4e56a40b371421fb[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs": {'
              . '        "matrixstats": {'
              . '            "matrix_stats": {'
              . '                "fields": ["poverty", "income"],'
              . '                "missing": {"income" : 50000} \<1>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
