<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GeoPolygonQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/geo-polygon-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GeoPolygonQuery extends SimpleExamplesTester {

    /**
     * Tag:  383c5a0771484086dcfd8d990830eeb7
     * Line: 11
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL11_383c5a0771484086dcfd8d990830eeb7()
    {
        $client = $this->getClient();
        // tag::383c5a0771484086dcfd8d990830eeb7[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "bool" : {
        //             "must" : {
        //                 "match_all" : {}
        //             },
        //             "filter" : {
        //                 "geo_polygon" : {
        //                     "person.location" : {
        //                         "points" : [
        //                             {"lat" : 40, "lon" : -70},
        //                             {"lat" : 30, "lon" : -80},
        //                             {"lat" : 20, "lon" : -90}
        //                         ]
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::383c5a0771484086dcfd8d990830eeb7[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "must" : {'
              . '                "match_all" : {}'
              . '            },'
              . '            "filter" : {'
              . '                "geo_polygon" : {'
              . '                    "person.location" : {'
              . '                        "points" : ['
              . '                            {"lat" : 40, "lon" : -70},'
              . '                            {"lat" : 30, "lon" : -80},'
              . '                            {"lat" : 20, "lon" : -90}'
              . '                        ]'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ecf966a20c54eb4e60a2670f51a99bdc
     * Line: 61
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL61_ecf966a20c54eb4e60a2670f51a99bdc()
    {
        $client = $this->getClient();
        // tag::ecf966a20c54eb4e60a2670f51a99bdc[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "bool" : {
        //             "must" : {
        //                 "match_all" : {}
        //             },
        //             "filter" : {
        //                 "geo_polygon" : {
        //                     "person.location" : {
        //                         "points" : [
        //                             [-70, 40],
        //                             [-80, 30],
        //                             [-90, 20]
        //                         ]
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::ecf966a20c54eb4e60a2670f51a99bdc[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "must" : {'
              . '                "match_all" : {}'
              . '            },'
              . '            "filter" : {'
              . '                "geo_polygon" : {'
              . '                    "person.location" : {'
              . '                        "points" : ['
              . '                            [-70, 40],'
              . '                            [-80, 30],'
              . '                            [-90, 20]'
              . '                        ]'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e532955a897ac1844e7c5727916bf32c
     * Line: 92
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL92_e532955a897ac1844e7c5727916bf32c()
    {
        $client = $this->getClient();
        // tag::e532955a897ac1844e7c5727916bf32c[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "bool" : {
        //             "must" : {
        //                 "match_all" : {}
        //             },
        //             "filter" : {
        //                "geo_polygon" : {
        //                     "person.location" : {
        //                         "points" : [
        //                             "40, -70",
        //                             "30, -80",
        //                             "20, -90"
        //                         ]
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::e532955a897ac1844e7c5727916bf32c[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "must" : {'
              . '                "match_all" : {}'
              . '            },'
              . '            "filter" : {'
              . '               "geo_polygon" : {'
              . '                    "person.location" : {'
              . '                        "points" : ['
              . '                            "40, -70",'
              . '                            "30, -80",'
              . '                            "20, -90"'
              . '                        ]'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5b809a128ee33be706e2097dde6e7719
     * Line: 121
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL121_5b809a128ee33be706e2097dde6e7719()
    {
        $client = $this->getClient();
        // tag::5b809a128ee33be706e2097dde6e7719[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "bool" : {
        //             "must" : {
        //                 "match_all" : {}
        //             },
        //             "filter" : {
        //                "geo_polygon" : {
        //                     "person.location" : {
        //                         "points" : [
        //                             "drn5x1g8cu2y",
        //                             "30, -80",
        //                             "20, -90"
        //                         ]
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::5b809a128ee33be706e2097dde6e7719[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "must" : {'
              . '                "match_all" : {}'
              . '            },'
              . '            "filter" : {'
              . '               "geo_polygon" : {'
              . '                    "person.location" : {'
              . '                        "points" : ['
              . '                            "drn5x1g8cu2y",'
              . '                            "30, -80",'
              . '                            "20, -90"'
              . '                        ]'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
