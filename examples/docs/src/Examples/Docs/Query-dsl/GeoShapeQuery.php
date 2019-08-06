<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GeoShapeQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/geo-shape-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GeoShapeQuery extends SimpleExamplesTester {

    /**
     * Tag:  183be708fc91109008109b5ed44c8b08
     * Line: 29
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL29_183be708fc91109008109b5ed44c8b08()
    {
        $client = $this->getClient();
        // tag::183be708fc91109008109b5ed44c8b08[]
        // TODO -- Implement Example
        // PUT /example
        // {
        //     "mappings": {
        //         "properties": {
        //             "location": {
        //                 "type": "geo_shape"
        //             }
        //         }
        //     }
        // }
        // POST /example/_doc?refresh
        // {
        //     "name": "Wind & Wetter, Berlin, Germany",
        //     "location": {
        //         "type": "point",
        //         "coordinates": [13.400544, 52.530286]
        //     }
        // }
        // end::183be708fc91109008109b5ed44c8b08[]

        $curl = 'PUT /example'
              . '{'
              . '    "mappings": {'
              . '        "properties": {'
              . '            "location": {'
              . '                "type": "geo_shape"'
              . '            }'
              . '        }'
              . '    }'
              . '}'
              . 'POST /example/_doc?refresh'
              . '{'
              . '    "name": "Wind & Wetter, Berlin, Germany",'
              . '    "location": {'
              . '        "type": "point",'
              . '        "coordinates": [13.400544, 52.530286]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  129975da094b6b93cc8fcc4042d47913
     * Line: 57
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL57_129975da094b6b93cc8fcc4042d47913()
    {
        $client = $this->getClient();
        // tag::129975da094b6b93cc8fcc4042d47913[]
        // TODO -- Implement Example
        // GET /example/_search
        // {
        //     "query":{
        //         "bool": {
        //             "must": {
        //                 "match_all": {}
        //             },
        //             "filter": {
        //                 "geo_shape": {
        //                     "location": {
        //                         "shape": {
        //                             "type": "envelope",
        //                             "coordinates" : [[13.0, 53.0], [14.0, 52.0]]
        //                         },
        //                         "relation": "within"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::129975da094b6b93cc8fcc4042d47913[]

        $curl = 'GET /example/_search'
              . '{'
              . '    "query":{'
              . '        "bool": {'
              . '            "must": {'
              . '                "match_all": {}'
              . '            },'
              . '            "filter": {'
              . '                "geo_shape": {'
              . '                    "location": {'
              . '                        "shape": {'
              . '                            "type": "envelope",'
              . '                            "coordinates" : [[13.0, 53.0], [14.0, 52.0]]'
              . '                        },'
              . '                        "relation": "within"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0e941a8309c3743972b8f5a8d9d9ada6
     * Line: 102
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL102_0e941a8309c3743972b8f5a8d9d9ada6()
    {
        $client = $this->getClient();
        // tag::0e941a8309c3743972b8f5a8d9d9ada6[]
        // TODO -- Implement Example
        // PUT /shapes
        // {
        //     "mappings": {
        //         "properties": {
        //             "location": {
        //                 "type": "geo_shape"
        //             }
        //         }
        //     }
        // }
        // PUT /shapes/_doc/deu
        // {
        //     "location": {
        //         "type": "envelope",
        //         "coordinates" : [[13.0, 53.0], [14.0, 52.0]]
        //     }
        // }
        // GET /example/_search
        // {
        //     "query": {
        //         "bool": {
        //             "filter": {
        //                 "geo_shape": {
        //                     "location": {
        //                         "indexed_shape": {
        //                             "index": "shapes",
        //                             "id": "deu",
        //                             "path": "location"
        //                         }
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::0e941a8309c3743972b8f5a8d9d9ada6[]

        $curl = 'PUT /shapes'
              . '{'
              . '    "mappings": {'
              . '        "properties": {'
              . '            "location": {'
              . '                "type": "geo_shape"'
              . '            }'
              . '        }'
              . '    }'
              . '}'
              . 'PUT /shapes/_doc/deu'
              . '{'
              . '    "location": {'
              . '        "type": "envelope",'
              . '        "coordinates" : [[13.0, 53.0], [14.0, 52.0]]'
              . '    }'
              . '}'
              . 'GET /example/_search'
              . '{'
              . '    "query": {'
              . '        "bool": {'
              . '            "filter": {'
              . '                "geo_shape": {'
              . '                    "location": {'
              . '                        "indexed_shape": {'
              . '                            "index": "shapes",'
              . '                            "id": "deu",'
              . '                            "path": "location"'
              . '                        }'
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
