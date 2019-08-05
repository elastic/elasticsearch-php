<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GeoBoundingBoxQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/geo-bounding-box-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GeoBoundingBoxQuery extends SimpleExamplesTester {

    /**
     * Tag:  b4ef55e48f137e8f67f82b42a047c8f6
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_b4ef55e48f137e8f67f82b42a047c8f6()
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
     * Tag:  49abe3273ac51f14cd4b5f1aaa7f6833
     * Line: 44
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL44_49abe3273ac51f14cd4b5f1aaa7f6833()
    {
        $client = $this->getClient();
        // tag::49abe3273ac51f14cd4b5f1aaa7f6833[]
        // TODO -- Implement Example
        // GET my_locations/_search
        // {
        //     "query": {
        //         "bool" : {
        //             "must" : {
        //                 "match_all" : {}
        //             },
        //             "filter" : {
        //                 "geo_bounding_box" : {
        //                     "pin.location" : {
        //                         "top_left" : {
        //                             "lat" : 40.73,
        //                             "lon" : -74.1
        //                         },
        //                         "bottom_right" : {
        //                             "lat" : 40.01,
        //                             "lon" : -71.12
        //                         }
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::49abe3273ac51f14cd4b5f1aaa7f6833[]

        $curl = 'GET my_locations/_search'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "must" : {'
              . '                "match_all" : {}'
              . '            },'
              . '            "filter" : {'
              . '                "geo_bounding_box" : {'
              . '                    "pin.location" : {'
              . '                        "top_left" : {'
              . '                            "lat" : 40.73,'
              . '                            "lon" : -74.1'
              . '                        },'
              . '                        "bottom_right" : {'
              . '                            "lat" : 40.01,'
              . '                            "lon" : -71.12'
              . '                        }'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  49abe3273ac51f14cd4b5f1aaa7f6833
     * Line: 99
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL99_49abe3273ac51f14cd4b5f1aaa7f6833()
    {
        $client = $this->getClient();
        // tag::49abe3273ac51f14cd4b5f1aaa7f6833[]
        // TODO -- Implement Example
        // GET my_locations/_search
        // {
        //     "query": {
        //         "bool" : {
        //             "must" : {
        //                 "match_all" : {}
        //             },
        //             "filter" : {
        //                 "geo_bounding_box" : {
        //                     "pin.location" : {
        //                         "top_left" : {
        //                             "lat" : 40.73,
        //                             "lon" : -74.1
        //                         },
        //                         "bottom_right" : {
        //                             "lat" : 40.01,
        //                             "lon" : -71.12
        //                         }
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::49abe3273ac51f14cd4b5f1aaa7f6833[]

        $curl = 'GET my_locations/_search'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "must" : {'
              . '                "match_all" : {}'
              . '            },'
              . '            "filter" : {'
              . '                "geo_bounding_box" : {'
              . '                    "pin.location" : {'
              . '                        "top_left" : {'
              . '                            "lat" : 40.73,'
              . '                            "lon" : -74.1'
              . '                        },'
              . '                        "bottom_right" : {'
              . '                            "lat" : 40.01,'
              . '                            "lon" : -71.12'
              . '                        }'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2cbaaab829728c46359d2f68b71c446e
     * Line: 134
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL134_2cbaaab829728c46359d2f68b71c446e()
    {
        $client = $this->getClient();
        // tag::2cbaaab829728c46359d2f68b71c446e[]
        // TODO -- Implement Example
        // GET my_locations/_search
        // {
        //     "query": {
        //         "bool" : {
        //             "must" : {
        //                 "match_all" : {}
        //             },
        //             "filter" : {
        //                 "geo_bounding_box" : {
        //                     "pin.location" : {
        //                         "top_left" : [-74.1, 40.73],
        //                         "bottom_right" : [-71.12, 40.01]
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::2cbaaab829728c46359d2f68b71c446e[]

        $curl = 'GET my_locations/_search'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "must" : {'
              . '                "match_all" : {}'
              . '            },'
              . '            "filter" : {'
              . '                "geo_bounding_box" : {'
              . '                    "pin.location" : {'
              . '                        "top_left" : [-74.1, 40.73],'
              . '                        "bottom_right" : [-71.12, 40.01]'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  bbf04a7f7a8858e911d6a53fe88127b0
     * Line: 162
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL162_bbf04a7f7a8858e911d6a53fe88127b0()
    {
        $client = $this->getClient();
        // tag::bbf04a7f7a8858e911d6a53fe88127b0[]
        // TODO -- Implement Example
        // GET my_locations/_search
        // {
        //     "query": {
        //         "bool" : {
        //             "must" : {
        //                 "match_all" : {}
        //             },
        //             "filter" : {
        //                 "geo_bounding_box" : {
        //                     "pin.location" : {
        //                         "top_left" : "40.73, -74.1",
        //                         "bottom_right" : "40.01, -71.12"
        //                     }
        //                 }
        //             }
        //     }
        // }
        // }
        // end::bbf04a7f7a8858e911d6a53fe88127b0[]

        $curl = 'GET my_locations/_search'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "must" : {'
              . '                "match_all" : {}'
              . '            },'
              . '            "filter" : {'
              . '                "geo_bounding_box" : {'
              . '                    "pin.location" : {'
              . '                        "top_left" : "40.73, -74.1",'
              . '                        "bottom_right" : "40.01, -71.12"'
              . '                    }'
              . '                }'
              . '            }'
              . '    }'
              . '}'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  417dcb29f5547d4de9d75d8b6a7a53c8
     * Line: 188
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL188_417dcb29f5547d4de9d75d8b6a7a53c8()
    {
        $client = $this->getClient();
        // tag::417dcb29f5547d4de9d75d8b6a7a53c8[]
        // TODO -- Implement Example
        // GET my_locations/_search
        // {
        //     "query": {
        //         "bool" : {
        //             "must" : {
        //                 "match_all" : {}
        //             },
        //             "filter" : {
        //                 "geo_bounding_box" : {
        //                     "pin.location" : {
        //                         "wkt" : "BBOX (-74.1, -71.12, 40.73, 40.01)"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::417dcb29f5547d4de9d75d8b6a7a53c8[]

        $curl = 'GET my_locations/_search'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "must" : {'
              . '                "match_all" : {}'
              . '            },'
              . '            "filter" : {'
              . '                "geo_bounding_box" : {'
              . '                    "pin.location" : {'
              . '                        "wkt" : "BBOX (-74.1, -71.12, 40.73, 40.01)"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d84695e3db2c92cd3faebf729e482bf0
     * Line: 213
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL213_d84695e3db2c92cd3faebf729e482bf0()
    {
        $client = $this->getClient();
        // tag::d84695e3db2c92cd3faebf729e482bf0[]
        // TODO -- Implement Example
        // GET my_locations/_search
        // {
        //     "query": {
        //         "bool" : {
        //             "must" : {
        //                 "match_all" : {}
        //             },
        //             "filter" : {
        //                 "geo_bounding_box" : {
        //                     "pin.location" : {
        //                         "top_left" : "dr5r9ydj2y73",
        //                         "bottom_right" : "drj7teegpus6"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::d84695e3db2c92cd3faebf729e482bf0[]

        $curl = 'GET my_locations/_search'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "must" : {'
              . '                "match_all" : {}'
              . '            },'
              . '            "filter" : {'
              . '                "geo_bounding_box" : {'
              . '                    "pin.location" : {'
              . '                        "top_left" : "dr5r9ydj2y73",'
              . '                        "bottom_right" : "drj7teegpus6"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  32ffcae9e1d13df0b7295c349d9145ec
     * Line: 248
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL248_32ffcae9e1d13df0b7295c349d9145ec()
    {
        $client = $this->getClient();
        // tag::32ffcae9e1d13df0b7295c349d9145ec[]
        // TODO -- Implement Example
        // GET my_locations/_search
        // {
        //     "query": {
        //         "geo_bounding_box" : {
        //             "pin.location" : {
        //                 "top_left" : "dr",
        //                 "bottom_right" : "dr"
        //             }
        //         }
        //     }
        // }
        // end::32ffcae9e1d13df0b7295c349d9145ec[]

        $curl = 'GET my_locations/_search'
              . '{'
              . '    "query": {'
              . '        "geo_bounding_box" : {'
              . '            "pin.location" : {'
              . '                "top_left" : "dr",'
              . '                "bottom_right" : "dr"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  370750b2f51bd097f4578e5b105babdf
     * Line: 278
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL278_370750b2f51bd097f4578e5b105babdf()
    {
        $client = $this->getClient();
        // tag::370750b2f51bd097f4578e5b105babdf[]
        // TODO -- Implement Example
        // GET my_locations/_search
        // {
        //     "query": {
        //         "bool" : {
        //             "must" : {
        //                 "match_all" : {}
        //             },
        //             "filter" : {
        //                 "geo_bounding_box" : {
        //                     "pin.location" : {
        //                         "top" : 40.73,
        //                         "left" : -74.1,
        //                         "bottom" : 40.01,
        //                         "right" : -71.12
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::370750b2f51bd097f4578e5b105babdf[]

        $curl = 'GET my_locations/_search'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "must" : {'
              . '                "match_all" : {}'
              . '            },'
              . '            "filter" : {'
              . '                "geo_bounding_box" : {'
              . '                    "pin.location" : {'
              . '                        "top" : 40.73,'
              . '                        "left" : -74.1,'
              . '                        "bottom" : 40.01,'
              . '                        "right" : -71.12'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  15eee00f09d2290e0f350d420029906e
     * Line: 328
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL328_15eee00f09d2290e0f350d420029906e()
    {
        $client = $this->getClient();
        // tag::15eee00f09d2290e0f350d420029906e[]
        // TODO -- Implement Example
        // GET my_locations/_search
        // {
        //     "query": {
        //         "bool" : {
        //             "must" : {
        //                 "match_all" : {}
        //             },
        //             "filter" : {
        //                 "geo_bounding_box" : {
        //                     "pin.location" : {
        //                         "top_left" : {
        //                             "lat" : 40.73,
        //                             "lon" : -74.1
        //                         },
        //                         "bottom_right" : {
        //                             "lat" : 40.10,
        //                             "lon" : -71.12
        //                         }
        //                     },
        //                     "type" : "indexed"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::15eee00f09d2290e0f350d420029906e[]

        $curl = 'GET my_locations/_search'
              . '{'
              . '    "query": {'
              . '        "bool" : {'
              . '            "must" : {'
              . '                "match_all" : {}'
              . '            },'
              . '            "filter" : {'
              . '                "geo_bounding_box" : {'
              . '                    "pin.location" : {'
              . '                        "top_left" : {'
              . '                            "lat" : 40.73,'
              . '                            "lon" : -74.1'
              . '                        },'
              . '                        "bottom_right" : {'
              . '                            "lat" : 40.10,'
              . '                            "lon" : -71.12'
              . '                        }'
              . '                    },'
              . '                    "type" : "indexed"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%











}
