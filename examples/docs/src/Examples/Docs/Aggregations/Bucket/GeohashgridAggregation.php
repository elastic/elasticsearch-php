<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GeohashgridAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/bucket/geohashgrid-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GeohashgridAggregation extends SimpleExamplesTester {

    /**
     * Tag:  71af0fec59d37477c850d47730d3f286
     * Line: 21
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL21_71af0fec59d37477c850d47730d3f286()
    {
        $client = $this->getClient();
        // tag::71af0fec59d37477c850d47730d3f286[]
        // TODO -- Implement Example
        // PUT /museums
        // {
        //     "mappings": {
        //           "properties": {
        //               "location": {
        //                   "type": "geo_point"
        //               }
        //           }
        //     }
        // }
        // POST /museums/_bulk?refresh
        // {"index":{"_id":1}}
        // {"location": "52.374081,4.912350", "name": "NEMO Science Museum"}
        // {"index":{"_id":2}}
        // {"location": "52.369219,4.901618", "name": "Museum Het Rembrandthuis"}
        // {"index":{"_id":3}}
        // {"location": "52.371667,4.914722", "name": "Nederlands Scheepvaartmuseum"}
        // {"index":{"_id":4}}
        // {"location": "51.222900,4.405200", "name": "Letterenhuis"}
        // {"index":{"_id":5}}
        // {"location": "48.861111,2.336389", "name": "Musée du Louvre"}
        // {"index":{"_id":6}}
        // {"location": "48.860000,2.327000", "name": "Musée d\'Orsay"}
        // POST /museums/_search?size=0
        // {
        //     "aggregations" : {
        //         "large-grid" : {
        //             "geohash_grid" : {
        //                 "field" : "location",
        //                 "precision" : 3
        //             }
        //         }
        //     }
        // }
        // end::71af0fec59d37477c850d47730d3f286[]

        $curl = 'PUT /museums'
              . '{'
              . '    "mappings": {'
              . '          "properties": {'
              . '              "location": {'
              . '                  "type": "geo_point"'
              . '              }'
              . '          }'
              . '    }'
              . '}'
              . 'POST /museums/_bulk?refresh'
              . '{"index":{"_id":1}}'
              . '{"location": "52.374081,4.912350", "name": "NEMO Science Museum"}'
              . '{"index":{"_id":2}}'
              . '{"location": "52.369219,4.901618", "name": "Museum Het Rembrandthuis"}'
              . '{"index":{"_id":3}}'
              . '{"location": "52.371667,4.914722", "name": "Nederlands Scheepvaartmuseum"}'
              . '{"index":{"_id":4}}'
              . '{"location": "51.222900,4.405200", "name": "Letterenhuis"}'
              . '{"index":{"_id":5}}'
              . '{"location": "48.861111,2.336389", "name": "Musée du Louvre"}'
              . '{"index":{"_id":6}}'
              . '{"location": "48.860000,2.327000", "name": "Musée d\'Orsay"}'
              . 'POST /museums/_search?size=0'
              . '{'
              . '    "aggregations" : {'
              . '        "large-grid" : {'
              . '            "geohash_grid" : {'
              . '                "field" : "location",'
              . '                "precision" : 3'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9f0c6a8c6381bb0cb81a3070dd2bf2f2
     * Line: 94
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL94_9f0c6a8c6381bb0cb81a3070dd2bf2f2()
    {
        $client = $this->getClient();
        // tag::9f0c6a8c6381bb0cb81a3070dd2bf2f2[]
        // TODO -- Implement Example
        // POST /museums/_search?size=0
        // {
        //     "aggregations" : {
        //         "zoomed-in" : {
        //             "filter" : {
        //                 "geo_bounding_box" : {
        //                     "location" : {
        //                         "top_left" : "52.4, 4.9",
        //                         "bottom_right" : "52.3, 5.0"
        //                     }
        //                 }
        //             },
        //             "aggregations":{
        //                 "zoom1":{
        //                     "geohash_grid" : {
        //                         "field": "location",
        //                         "precision": 8
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::9f0c6a8c6381bb0cb81a3070dd2bf2f2[]

        $curl = 'POST /museums/_search?size=0'
              . '{'
              . '    "aggregations" : {'
              . '        "zoomed-in" : {'
              . '            "filter" : {'
              . '                "geo_bounding_box" : {'
              . '                    "location" : {'
              . '                        "top_left" : "52.4, 4.9",'
              . '                        "bottom_right" : "52.3, 5.0"'
              . '                    }'
              . '                }'
              . '            },'
              . '            "aggregations":{'
              . '                "zoom1":{'
              . '                    "geohash_grid" : {'
              . '                        "field": "location",'
              . '                        "precision": 8'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  36f61e038014f92466cd83d7b007e16b
     * Line: 126
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL126_36f61e038014f92466cd83d7b007e16b()
    {
        $client = $this->getClient();
        // tag::36f61e038014f92466cd83d7b007e16b[]
        // TODO -- Implement Example
        // POST /museums/_search?size=0
        // {
        //     "aggregations" : {
        //         "zoomed-in" : {
        //             "filter" : {
        //                 "geo_bounding_box" : {
        //                     "location" : {
        //                         "top_left" : "u17",
        //                         "bottom_right" : "u17"
        //                     }
        //                 }
        //             },
        //             "aggregations":{
        //                 "zoom1":{
        //                     "geohash_grid" : {
        //                         "field": "location",
        //                         "precision": 8
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::36f61e038014f92466cd83d7b007e16b[]

        $curl = 'POST /museums/_search?size=0'
              . '{'
              . '    "aggregations" : {'
              . '        "zoomed-in" : {'
              . '            "filter" : {'
              . '                "geo_bounding_box" : {'
              . '                    "location" : {'
              . '                        "top_left" : "u17",'
              . '                        "bottom_right" : "u17"'
              . '                    }'
              . '                }'
              . '            },'
              . '            "aggregations":{'
              . '                "zoom1":{'
              . '                    "geohash_grid" : {'
              . '                        "field": "location",'
              . '                        "precision": 8'
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
