<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GeotilegridAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/bucket/geotilegrid-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GeotilegridAggregation extends SimpleExamplesTester {

    /**
     * Tag:  86f1e66bc101b3f22dc84d2aa172fd75
     * Line: 34
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL34_86f1e66bc101b3f22dc84d2aa172fd75()
    {
        $client = $this->getClient();
        // tag::86f1e66bc101b3f22dc84d2aa172fd75[]
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
        // {"location": "48.860000,2.327000", "name": "Musée d'Orsay"}
        // POST /museums/_search?size=0
        // {
        //     "aggregations" : {
        //         "large-grid" : {
        //             "geotile_grid" : {
        //                 "field" : "location",
        //                 "precision" : 8
        //             }
        //         }
        //     }
        // }
        // end::86f1e66bc101b3f22dc84d2aa172fd75[]

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
              . '{"location": "48.860000,2.327000", "name": "Musée d'Orsay"}'
              . 'POST /museums/_search?size=0'
              . '{'
              . '    "aggregations" : {'
              . '        "large-grid" : {'
              . '            "geotile_grid" : {'
              . '                "field" : "location",'
              . '                "precision" : 8'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  57705815ad6bd50d91e58153ae75d3ca
     * Line: 110
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL110_57705815ad6bd50d91e58153ae75d3ca()
    {
        $client = $this->getClient();
        // tag::57705815ad6bd50d91e58153ae75d3ca[]
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
        //                     "geotile_grid" : {
        //                         "field": "location",
        //                         "precision": 22
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::57705815ad6bd50d91e58153ae75d3ca[]

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
              . '                    "geotile_grid" : {'
              . '                        "field": "location",'
              . '                        "precision": 22'
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
