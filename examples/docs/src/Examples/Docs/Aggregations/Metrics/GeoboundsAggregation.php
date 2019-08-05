<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Metrics;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GeoboundsAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/metrics/geobounds-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GeoboundsAggregation extends SimpleExamplesTester {

    /**
     * Tag:  34cabdecfe9c2cb8dd929853882564eb
     * Line: 10
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL10_34cabdecfe9c2cb8dd929853882564eb()
    {
        $client = $this->getClient();
        // tag::34cabdecfe9c2cb8dd929853882564eb[]
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
        //     "query" : {
        //         "match" : { "name" : "musée" }
        //     },
        //     "aggs" : {
        //         "viewport" : {
        //             "geo_bounds" : {
        //                 "field" : "location", \<1>
        //                 "wrap_longitude" : true \<2>
        //             }
        //         }
        //     }
        // }
        // end::34cabdecfe9c2cb8dd929853882564eb[]

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
              . '    "query" : {'
              . '        "match" : { "name" : "musée" }'
              . '    },'
              . '    "aggs" : {'
              . '        "viewport" : {'
              . '            "geo_bounds" : {'
              . '                "field" : "location", \<1>'
              . '                "wrap_longitude" : true \<2>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
