<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Metrics;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GeocentroidAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/metrics/geocentroid-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GeocentroidAggregation extends SimpleExamplesTester {

    /**
     * Tag:  d0cf6057bc87042819a7ac961d1b2273
     * Line: 9
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL9_d0cf6057bc87042819a7ac961d1b2273()
    {
        $client = $this->getClient();
        // tag::d0cf6057bc87042819a7ac961d1b2273[]
        // TODO -- Implement Example
        // PUT /museums
        // {
        //     "mappings": {
        //         "properties": {
        //             "location": {
        //                 "type": "geo_point"
        //             }
        //         }
        //     }
        // }
        // POST /museums/_bulk?refresh
        // {"index":{"_id":1}}
        // {"location": "52.374081,4.912350", "city": "Amsterdam", "name": "NEMO Science Museum"}
        // {"index":{"_id":2}}
        // {"location": "52.369219,4.901618", "city": "Amsterdam", "name": "Museum Het Rembrandthuis"}
        // {"index":{"_id":3}}
        // {"location": "52.371667,4.914722", "city": "Amsterdam", "name": "Nederlands Scheepvaartmuseum"}
        // {"index":{"_id":4}}
        // {"location": "51.222900,4.405200", "city": "Antwerp", "name": "Letterenhuis"}
        // {"index":{"_id":5}}
        // {"location": "48.861111,2.336389", "city": "Paris", "name": "Musée du Louvre"}
        // {"index":{"_id":6}}
        // {"location": "48.860000,2.327000", "city": "Paris", "name": "Musée d\'Orsay"}
        // POST /museums/_search?size=0
        // {
        //     "aggs" : {
        //         "centroid" : {
        //             "geo_centroid" : {
        //                 "field" : "location" \<1>
        //             }
        //         }
        //     }
        // }
        // end::d0cf6057bc87042819a7ac961d1b2273[]

        $curl = 'PUT /museums'
              . '{'
              . '    "mappings": {'
              . '        "properties": {'
              . '            "location": {'
              . '                "type": "geo_point"'
              . '            }'
              . '        }'
              . '    }'
              . '}'
              . 'POST /museums/_bulk?refresh'
              . '{"index":{"_id":1}}'
              . '{"location": "52.374081,4.912350", "city": "Amsterdam", "name": "NEMO Science Museum"}'
              . '{"index":{"_id":2}}'
              . '{"location": "52.369219,4.901618", "city": "Amsterdam", "name": "Museum Het Rembrandthuis"}'
              . '{"index":{"_id":3}}'
              . '{"location": "52.371667,4.914722", "city": "Amsterdam", "name": "Nederlands Scheepvaartmuseum"}'
              . '{"index":{"_id":4}}'
              . '{"location": "51.222900,4.405200", "city": "Antwerp", "name": "Letterenhuis"}'
              . '{"index":{"_id":5}}'
              . '{"location": "48.861111,2.336389", "city": "Paris", "name": "Musée du Louvre"}'
              . '{"index":{"_id":6}}'
              . '{"location": "48.860000,2.327000", "city": "Paris", "name": "Musée d\'Orsay"}'
              . 'POST /museums/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "centroid" : {'
              . '            "geo_centroid" : {'
              . '                "field" : "location" \<1>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6dec421bf327ecaf189109d9aaa35919
     * Line: 76
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL76_6dec421bf327ecaf189109d9aaa35919()
    {
        $client = $this->getClient();
        // tag::6dec421bf327ecaf189109d9aaa35919[]
        // TODO -- Implement Example
        // POST /museums/_search?size=0
        // {
        //     "aggs" : {
        //         "cities" : {
        //             "terms" : { "field" : "city.keyword" },
        //             "aggs" : {
        //                 "centroid" : {
        //                     "geo_centroid" : { "field" : "location" }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::6dec421bf327ecaf189109d9aaa35919[]

        $curl = 'POST /museums/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "cities" : {'
              . '            "terms" : { "field" : "city.keyword" },'
              . '            "aggs" : {'
              . '                "centroid" : {'
              . '                    "geo_centroid" : { "field" : "location" }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
