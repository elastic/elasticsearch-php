<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: IprangeAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/bucket/iprange-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class IprangeAggregation extends SimpleExamplesTester {

    /**
     * Tag:  01cc705f6074ab637cfbb9f92cf44e44
     * Line: 9
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL9_01cc705f6074ab637cfbb9f92cf44e44()
    {
        $client = $this->getClient();
        // tag::01cc705f6074ab637cfbb9f92cf44e44[]
        // TODO -- Implement Example
        // GET /ip_addresses/_search
        // {
        //     "size": 10,
        //     "aggs" : {
        //         "ip_ranges" : {
        //             "ip_range" : {
        //                 "field" : "ip",
        //                 "ranges" : [
        //                     { "to" : "10.0.0.5" },
        //                     { "from" : "10.0.0.5" }
        //                 ]
        //             }
        //         }
        //     }
        // }
        // end::01cc705f6074ab637cfbb9f92cf44e44[]

        $curl = 'GET /ip_addresses/_search'
              . '{'
              . '    "size": 10,'
              . '    "aggs" : {'
              . '        "ip_ranges" : {'
              . '            "ip_range" : {'
              . '                "field" : "ip",'
              . '                "ranges" : ['
              . '                    { "to" : "10.0.0.5" },'
              . '                    { "from" : "10.0.0.5" }'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9f4ba6565d80e0964e177eaac9fb0614
     * Line: 59
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL59_9f4ba6565d80e0964e177eaac9fb0614()
    {
        $client = $this->getClient();
        // tag::9f4ba6565d80e0964e177eaac9fb0614[]
        // TODO -- Implement Example
        // GET /ip_addresses/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "ip_ranges" : {
        //             "ip_range" : {
        //                 "field" : "ip",
        //                 "ranges" : [
        //                     { "mask" : "10.0.0.0/25" },
        //                     { "mask" : "10.0.0.127/25" }
        //                 ]
        //             }
        //         }
        //     }
        // }
        // end::9f4ba6565d80e0964e177eaac9fb0614[]

        $curl = 'GET /ip_addresses/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "ip_ranges" : {'
              . '            "ip_range" : {'
              . '                "field" : "ip",'
              . '                "ranges" : ['
              . '                    { "mask" : "10.0.0.0/25" },'
              . '                    { "mask" : "10.0.0.127/25" }'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c4db73a276175d57c6a9a0387e728028
     * Line: 113
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL113_c4db73a276175d57c6a9a0387e728028()
    {
        $client = $this->getClient();
        // tag::c4db73a276175d57c6a9a0387e728028[]
        // TODO -- Implement Example
        // GET /ip_addresses/_search
        // {
        //     "size": 0,
        //     "aggs": {
        //         "ip_ranges": {
        //             "ip_range": {
        //                 "field": "ip",
        //                 "ranges": [
        //                     { "to" : "10.0.0.5" },
        //                     { "from" : "10.0.0.5" }
        //                 ],
        //                 "keyed": true
        //             }
        //         }
        //     }
        // }
        // end::c4db73a276175d57c6a9a0387e728028[]

        $curl = 'GET /ip_addresses/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs": {'
              . '        "ip_ranges": {'
              . '            "ip_range": {'
              . '                "field": "ip",'
              . '                "ranges": ['
              . '                    { "to" : "10.0.0.5" },'
              . '                    { "from" : "10.0.0.5" }'
              . '                ],'
              . '                "keyed": true'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  fa8ee2094af36e7ec02233a4c7b008bc
     * Line: 162
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL162_fa8ee2094af36e7ec02233a4c7b008bc()
    {
        $client = $this->getClient();
        // tag::fa8ee2094af36e7ec02233a4c7b008bc[]
        // TODO -- Implement Example
        // GET /ip_addresses/_search
        // {
        //     "size": 0,
        //     "aggs": {
        //         "ip_ranges": {
        //             "ip_range": {
        //                 "field": "ip",
        //                 "ranges": [
        //                     { "key": "infinity", "to" : "10.0.0.5" },
        //                     { "key": "and-beyond", "from" : "10.0.0.5" }
        //                 ],
        //                 "keyed": true
        //             }
        //         }
        //     }
        // }
        // end::fa8ee2094af36e7ec02233a4c7b008bc[]

        $curl = 'GET /ip_addresses/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs": {'
              . '        "ip_ranges": {'
              . '            "ip_range": {'
              . '                "field": "ip",'
              . '                "ranges": ['
              . '                    { "key": "infinity", "to" : "10.0.0.5" },'
              . '                    { "key": "and-beyond", "from" : "10.0.0.5" }'
              . '                ],'
              . '                "keyed": true'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
