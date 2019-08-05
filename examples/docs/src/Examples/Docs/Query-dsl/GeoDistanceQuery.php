<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GeoDistanceQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/geo-distance-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GeoDistanceQuery extends SimpleExamplesTester {

    /**
     * Tag:  b4ef55e48f137e8f67f82b42a047c8f6
     * Line: 12
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL12_b4ef55e48f137e8f67f82b42a047c8f6()
    {
        $client = $this->getClient();
        // tag::b4ef55e48f137e8f67f82b42a047c8f6[]
        // TODO -- Implement Example
        // PUT /my_locations
        // {
        //     "mappings": {
        //         "properties": {
        //             "pin": {
        //                 "properties": {
        //                     "location": {
        //                         "type": "geo_point"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // PUT /my_locations/_doc/1
        // {
        //     "pin" : {
        //         "location" : {
        //             "lat" : 40.12,
        //             "lon" : -71.34
        //         }
        //     }
        // }
        // end::b4ef55e48f137e8f67f82b42a047c8f6[]

        $curl = 'PUT /my_locations'
              . '{'
              . '    "mappings": {'
              . '        "properties": {'
              . '            "pin": {'
              . '                "properties": {'
              . '                    "location": {'
              . '                        "type": "geo_point"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}'
              . 'PUT /my_locations/_doc/1'
              . '{'
              . '    "pin" : {'
              . '        "location" : {'
              . '            "lat" : 40.12,'
              . '            "lon" : -71.34'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4639a1bbd12710d5f01f1aaadce09a3e
     * Line: 46
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL46_4639a1bbd12710d5f01f1aaadce09a3e()
    {
        $client = $this->getClient();
        // tag::4639a1bbd12710d5f01f1aaadce09a3e[]
        // TODO -- Implement Example
        // GET /my_locations/_search
        // {
        //     "query": {
        //         "bool" : {
        //             "must" : {
        //                 "match_all" : {}
        //             },
        //             "filter" : {
        //                 "geo_distance" : {
        //                     "distance" : "200km",
        //                     "pin.location" : {
        //                         "lat" : 40,
        //                         "lon" : -70
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::4639a1bbd12710d5f01f1aaadce09a3e[]

        $curl = 'GET /my_locations/_search'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "must" : {'
              . '                "match_all" : {}'
              . '            },'
              . '            "filter" : {'
              . '                "geo_distance" : {'
              . '                    "distance" : "200km",'
              . '                    "pin.location" : {'
              . '                        "lat" : 40,'
              . '                        "lon" : -70'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6fc37ccf570ff7e35b7b0bd4bacb8abd
     * Line: 79
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL79_6fc37ccf570ff7e35b7b0bd4bacb8abd()
    {
        $client = $this->getClient();
        // tag::6fc37ccf570ff7e35b7b0bd4bacb8abd[]
        // TODO -- Implement Example
        // GET /my_locations/_search
        // {
        //     "query": {
        //         "bool" : {
        //             "must" : {
        //                 "match_all" : {}
        //             },
        //             "filter" : {
        //                 "geo_distance" : {
        //                     "distance" : "12km",
        //                     "pin.location" : {
        //                         "lat" : 40,
        //                         "lon" : -70
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::6fc37ccf570ff7e35b7b0bd4bacb8abd[]

        $curl = 'GET /my_locations/_search'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "must" : {'
              . '                "match_all" : {}'
              . '            },'
              . '            "filter" : {'
              . '                "geo_distance" : {'
              . '                    "distance" : "12km",'
              . '                    "pin.location" : {'
              . '                        "lat" : 40,'
              . '                        "lon" : -70'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  926fff8330fc3008f62b9de34f385a57
     * Line: 109
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL109_926fff8330fc3008f62b9de34f385a57()
    {
        $client = $this->getClient();
        // tag::926fff8330fc3008f62b9de34f385a57[]
        // TODO -- Implement Example
        // GET /my_locations/_search
        // {
        //     "query": {
        //         "bool" : {
        //             "must" : {
        //                 "match_all" : {}
        //             },
        //             "filter" : {
        //                 "geo_distance" : {
        //                     "distance" : "12km",
        //                     "pin.location" : [-70, 40]
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::926fff8330fc3008f62b9de34f385a57[]

        $curl = 'GET /my_locations/_search'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "must" : {'
              . '                "match_all" : {}'
              . '            },'
              . '            "filter" : {'
              . '                "geo_distance" : {'
              . '                    "distance" : "12km",'
              . '                    "pin.location" : [-70, 40]'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f878546633c6bcc30edcdcf520a20eba
     * Line: 136
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL136_f878546633c6bcc30edcdcf520a20eba()
    {
        $client = $this->getClient();
        // tag::f878546633c6bcc30edcdcf520a20eba[]
        // TODO -- Implement Example
        // GET /my_locations/_search
        // {
        //     "query": {
        //         "bool" : {
        //             "must" : {
        //                 "match_all" : {}
        //             },
        //             "filter" : {
        //                 "geo_distance" : {
        //                     "distance" : "12km",
        //                     "pin.location" : "40,-70"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::f878546633c6bcc30edcdcf520a20eba[]

        $curl = 'GET /my_locations/_search'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "must" : {'
              . '                "match_all" : {}'
              . '            },'
              . '            "filter" : {'
              . '                "geo_distance" : {'
              . '                    "distance" : "12km",'
              . '                    "pin.location" : "40,-70"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  48a40f20b752a8120cf020bda041adca
     * Line: 160
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL160_48a40f20b752a8120cf020bda041adca()
    {
        $client = $this->getClient();
        // tag::48a40f20b752a8120cf020bda041adca[]
        // TODO -- Implement Example
        // GET /my_locations/_search
        // {
        //     "query": {
        //         "bool" : {
        //             "must" : {
        //                 "match_all" : {}
        //             },
        //             "filter" : {
        //                 "geo_distance" : {
        //                     "distance" : "12km",
        //                     "pin.location" : "drm3btev3e86"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::48a40f20b752a8120cf020bda041adca[]

        $curl = 'GET /my_locations/_search'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "must" : {'
              . '                "match_all" : {}'
              . '            },'
              . '            "filter" : {'
              . '                "geo_distance" : {'
              . '                    "distance" : "12km",'
              . '                    "pin.location" : "drm3btev3e86"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%







}
