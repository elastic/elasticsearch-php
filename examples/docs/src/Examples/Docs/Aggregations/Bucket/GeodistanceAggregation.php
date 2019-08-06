<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GeodistanceAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/bucket/geodistance-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GeodistanceAggregation extends SimpleExamplesTester {

    /**
     * Tag:  9bf956f9d3f27bb7b4e5a03af84d5da5
     * Line: 7
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL7_9bf956f9d3f27bb7b4e5a03af84d5da5()
    {
        $client = $this->getClient();
        // tag::9bf956f9d3f27bb7b4e5a03af84d5da5[]
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
        // {"location": "48.860000,2.327000", "name": "Musée d\'Orsay"}
        // POST /museums/_search?size=0
        // {
        //     "aggs" : {
        //         "rings_around_amsterdam" : {
        //             "geo_distance" : {
        //                 "field" : "location",
        //                 "origin" : "52.3760, 4.894",
        //                 "ranges" : [
        //                     { "to" : 100000 },
        //                     { "from" : 100000, "to" : 300000 },
        //                     { "from" : 300000 }
        //                 ]
        //             }
        //         }
        //     }
        // }
        // end::9bf956f9d3f27bb7b4e5a03af84d5da5[]

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
              . '{"location": "48.860000,2.327000", "name": "Musée d\'Orsay"}'
              . 'POST /museums/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "rings_around_amsterdam" : {'
              . '            "geo_distance" : {'
              . '                "field" : "location",'
              . '                "origin" : "52.3760, 4.894",'
              . '                "ranges" : ['
              . '                    { "to" : 100000 },'
              . '                    { "from" : 100000, "to" : 300000 },'
              . '                    { "from" : 300000 }'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c78b80d080a58090583228421ac1553d
     * Line: 94
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL94_c78b80d080a58090583228421ac1553d()
    {
        $client = $this->getClient();
        // tag::c78b80d080a58090583228421ac1553d[]
        // TODO -- Implement Example
        // POST /museums/_search?size=0
        // {
        //     "aggs" : {
        //         "rings" : {
        //             "geo_distance" : {
        //                 "field" : "location",
        //                 "origin" : "52.3760, 4.894",
        //                 "unit" : "km", \<1>
        //                 "ranges" : [
        //                     { "to" : 100 },
        //                     { "from" : 100, "to" : 300 },
        //                     { "from" : 300 }
        //                 ]
        //             }
        //         }
        //     }
        // }
        // end::c78b80d080a58090583228421ac1553d[]

        $curl = 'POST /museums/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "rings" : {'
              . '            "geo_distance" : {'
              . '                "field" : "location",'
              . '                "origin" : "52.3760, 4.894",'
              . '                "unit" : "km", \<1>'
              . '                "ranges" : ['
              . '                    { "to" : 100 },'
              . '                    { "from" : 100, "to" : 300 },'
              . '                    { "from" : 300 }'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a5736ad3638c238e3b15c9fdaa1f29f7
     * Line: 121
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL121_a5736ad3638c238e3b15c9fdaa1f29f7()
    {
        $client = $this->getClient();
        // tag::a5736ad3638c238e3b15c9fdaa1f29f7[]
        // TODO -- Implement Example
        // POST /museums/_search?size=0
        // {
        //     "aggs" : {
        //         "rings" : {
        //             "geo_distance" : {
        //                 "field" : "location",
        //                 "origin" : "52.3760, 4.894",
        //                 "unit" : "km",
        //                 "distance_type" : "plane",
        //                 "ranges" : [
        //                     { "to" : 100 },
        //                     { "from" : 100, "to" : 300 },
        //                     { "from" : 300 }
        //                 ]
        //             }
        //         }
        //     }
        // }
        // end::a5736ad3638c238e3b15c9fdaa1f29f7[]

        $curl = 'POST /museums/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "rings" : {'
              . '            "geo_distance" : {'
              . '                "field" : "location",'
              . '                "origin" : "52.3760, 4.894",'
              . '                "unit" : "km",'
              . '                "distance_type" : "plane",'
              . '                "ranges" : ['
              . '                    { "to" : 100 },'
              . '                    { "from" : 100, "to" : 300 },'
              . '                    { "from" : 300 }'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6b31f435607617d96b1dff3bf10c9d8c
     * Line: 149
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL149_6b31f435607617d96b1dff3bf10c9d8c()
    {
        $client = $this->getClient();
        // tag::6b31f435607617d96b1dff3bf10c9d8c[]
        // TODO -- Implement Example
        // POST /museums/_search?size=0
        // {
        //     "aggs" : {
        //         "rings_around_amsterdam" : {
        //             "geo_distance" : {
        //                 "field" : "location",
        //                 "origin" : "52.3760, 4.894",
        //                 "ranges" : [
        //                     { "to" : 100000 },
        //                     { "from" : 100000, "to" : 300000 },
        //                     { "from" : 300000 }
        //                 ],
        //                 "keyed": true
        //             }
        //         }
        //     }
        // }
        // end::6b31f435607617d96b1dff3bf10c9d8c[]

        $curl = 'POST /museums/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "rings_around_amsterdam" : {'
              . '            "geo_distance" : {'
              . '                "field" : "location",'
              . '                "origin" : "52.3760, 4.894",'
              . '                "ranges" : ['
              . '                    { "to" : 100000 },'
              . '                    { "from" : 100000, "to" : 300000 },'
              . '                    { "from" : 300000 }'
              . '                ],'
              . '                "keyed": true'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c5afc3d716fdf8c0eefa4732e8a4b3ee
     * Line: 204
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL204_c5afc3d716fdf8c0eefa4732e8a4b3ee()
    {
        $client = $this->getClient();
        // tag::c5afc3d716fdf8c0eefa4732e8a4b3ee[]
        // TODO -- Implement Example
        // POST /museums/_search?size=0
        // {
        //     "aggs" : {
        //         "rings_around_amsterdam" : {
        //             "geo_distance" : {
        //                 "field" : "location",
        //                 "origin" : "52.3760, 4.894",
        //                 "ranges" : [
        //                     { "to" : 100000, "key": "first_ring" },
        //                     { "from" : 100000, "to" : 300000, "key": "second_ring" },
        //                     { "from" : 300000, "key": "third_ring" }
        //                 ],
        //                 "keyed": true
        //             }
        //         }
        //     }
        // }
        // end::c5afc3d716fdf8c0eefa4732e8a4b3ee[]

        $curl = 'POST /museums/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "rings_around_amsterdam" : {'
              . '            "geo_distance" : {'
              . '                "field" : "location",'
              . '                "origin" : "52.3760, 4.894",'
              . '                "ranges" : ['
              . '                    { "to" : 100000, "key": "first_ring" },'
              . '                    { "from" : 100000, "to" : 300000, "key": "second_ring" },'
              . '                    { "from" : 300000, "key": "third_ring" }'
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
