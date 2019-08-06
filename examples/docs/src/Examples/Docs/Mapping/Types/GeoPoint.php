<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GeoPoint
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/types/geo-point.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GeoPoint extends SimpleExamplesTester {

    /**
     * Tag:  f1b512400f2f7ca0b0f2e4bb45a8b2fe
     * Line: 20
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL20_f1b512400f2f7ca0b0f2e4bb45a8b2fe()
    {
        $client = $this->getClient();
        // tag::f1b512400f2f7ca0b0f2e4bb45a8b2fe[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "location": {
        //         "type": "geo_point"
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //   "text": "Geo-point as an object",
        //   "location": { \<1>
        //     "lat": 41.12,
        //     "lon": -71.34
        //   }
        // }
        // PUT my_index/_doc/2
        // {
        //   "text": "Geo-point as a string",
        //   "location": "41.12,-71.34" \<2>
        // }
        // PUT my_index/_doc/3
        // {
        //   "text": "Geo-point as a geohash",
        //   "location": "drm3btev3e86" \<3>
        // }
        // PUT my_index/_doc/4
        // {
        //   "text": "Geo-point as an array",
        //   "location": [ -71.34, 41.12 ] \<4>
        // }
        // PUT my_index/_doc/5
        // {
        //   "text": "Geo-point as a WKT POINT primitive",
        //   "location" : "POINT (-71.34 41.12)" \<5>
        // }
        // GET my_index/_search
        // {
        //   "query": {
        //     "geo_bounding_box": { \<6>
        //       "location": {
        //         "top_left": {
        //           "lat": 42,
        //           "lon": -72
        //         },
        //         "bottom_right": {
        //           "lat": 40,
        //           "lon": -74
        //         }
        //       }
        //     }
        //   }
        // }
        // end::f1b512400f2f7ca0b0f2e4bb45a8b2fe[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "location": {'
              . '        "type": "geo_point"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "text": "Geo-point as an object",'
              . '  "location": { \<1>'
              . '    "lat": 41.12,'
              . '    "lon": -71.34'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/2'
              . '{'
              . '  "text": "Geo-point as a string",'
              . '  "location": "41.12,-71.34" \<2>'
              . '}'
              . 'PUT my_index/_doc/3'
              . '{'
              . '  "text": "Geo-point as a geohash",'
              . '  "location": "drm3btev3e86" \<3>'
              . '}'
              . 'PUT my_index/_doc/4'
              . '{'
              . '  "text": "Geo-point as an array",'
              . '  "location": [ -71.34, 41.12 ] \<4>'
              . '}'
              . 'PUT my_index/_doc/5'
              . '{'
              . '  "text": "Geo-point as a WKT POINT primitive",'
              . '  "location" : "POINT (-71.34 41.12)" \<5>'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "geo_bounding_box": { \<6>'
              . '      "location": {'
              . '        "top_left": {'
              . '          "lat": 42,'
              . '          "lon": -72'
              . '        },'
              . '        "bottom_right": {'
              . '          "lat": 40,'
              . '          "lon": -74'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
