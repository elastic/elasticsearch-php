<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Shape
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/types/shape.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Shape extends SimpleExamplesTester {

    /**
     * Tag:  04409304cd13f4cfa8efbed87aea9b15
     * Line: 81
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL81_04409304cd13f4cfa8efbed87aea9b15()
    {
        $client = $this->getClient();
        // tag::04409304cd13f4cfa8efbed87aea9b15[]
        // TODO -- Implement Example
        // PUT /example
        // {
        //     "mappings": {
        //         "properties": {
        //             "geometry": {
        //                 "type": "shape"
        //             }
        //         }
        //     }
        // }
        // end::04409304cd13f4cfa8efbed87aea9b15[]

        $curl = 'PUT /example'
              . '{'
              . '    "mappings": {'
              . '        "properties": {'
              . '            "geometry": {'
              . '                "type": "shape"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a55bdc75b139d947d64b32dc9824e558
     * Line: 146
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL146_a55bdc75b139d947d64b32dc9824e558()
    {
        $client = $this->getClient();
        // tag::a55bdc75b139d947d64b32dc9824e558[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type" : "point",
        //         "coordinates" : [-377.03653, 389.897676]
        //     }
        // }
        // end::a55bdc75b139d947d64b32dc9824e558[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type" : "point",'
              . '        "coordinates" : [-377.03653, 389.897676]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8fb11f30a609b13c1373ce4a26124159
     * Line: 160
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL160_8fb11f30a609b13c1373ce4a26124159()
    {
        $client = $this->getClient();
        // tag::8fb11f30a609b13c1373ce4a26124159[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : "POINT (-377.03653 389.897676)"
        // }
        // end::8fb11f30a609b13c1373ce4a26124159[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : "POINT (-377.03653 389.897676)"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  bff745b32238691bae88de22530643cb
     * Line: 178
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL178_bff745b32238691bae88de22530643cb()
    {
        $client = $this->getClient();
        // tag::bff745b32238691bae88de22530643cb[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type" : "linestring",
        //         "coordinates" : [[-377.03653, 389.897676], [-377.009051, 389.889939]]
        //     }
        // }
        // end::bff745b32238691bae88de22530643cb[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type" : "linestring",'
              . '        "coordinates" : [[-377.03653, 389.897676], [-377.009051, 389.889939]]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c4f62c66f967c6e0da3616957efbeccf
     * Line: 192
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL192_c4f62c66f967c6e0da3616957efbeccf()
    {
        $client = $this->getClient();
        // tag::c4f62c66f967c6e0da3616957efbeccf[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : "LINESTRING (-377.03653 389.897676, -377.009051 389.889939)"
        // }
        // end::c4f62c66f967c6e0da3616957efbeccf[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : "LINESTRING (-377.03653 389.897676, -377.009051 389.889939)"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  567829f263dd472bf76500db05d2200a
     * Line: 209
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL209_567829f263dd472bf76500db05d2200a()
    {
        $client = $this->getClient();
        // tag::567829f263dd472bf76500db05d2200a[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type" : "polygon",
        //         "coordinates" : [
        //             [ [1000.0, -1001.0], [1001.0, -1001.0], [1001.0, -1000.0], [1000.0, -1000.0], [1000.0, -1001.0] ]
        //         ]
        //     }
        // }
        // end::567829f263dd472bf76500db05d2200a[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type" : "polygon",'
              . '        "coordinates" : ['
              . '            [ [1000.0, -1001.0], [1001.0, -1001.0], [1001.0, -1000.0], [1000.0, -1000.0], [1000.0, -1001.0] ]'
              . '        ]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ae5f9956a525e976bfc37dcb4e7414ae
     * Line: 225
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL225_ae5f9956a525e976bfc37dcb4e7414ae()
    {
        $client = $this->getClient();
        // tag::ae5f9956a525e976bfc37dcb4e7414ae[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : "POLYGON ((1000.0 -1001.0, 1001.0 -1001.0, 1001.0 -1000.0, 1000.0 -1000.0, 1000.0 -1001.0))"
        // }
        // end::ae5f9956a525e976bfc37dcb4e7414ae[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : "POLYGON ((1000.0 -1001.0, 1001.0 -1001.0, 1001.0 -1000.0, 1000.0 -1000.0, 1000.0 -1001.0))"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4f869e56eb25586ac402ccfb00aa0359
     * Line: 238
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL238_4f869e56eb25586ac402ccfb00aa0359()
    {
        $client = $this->getClient();
        // tag::4f869e56eb25586ac402ccfb00aa0359[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type" : "polygon",
        //         "coordinates" : [
        //             [ [1000.0, -1001.0], [1001.0, -1001.0], [1001.0, -1000.0], [1000.0, -1000.0], [1000.0, -1001.0] ],
        //             [ [1000.2, -1001.2], [1000.8, -1001.2], [1000.8, -1001.8], [1000.2, -1001.8], [1000.2, -1001.2] ]
        //         ]
        //     }
        // }
        // end::4f869e56eb25586ac402ccfb00aa0359[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type" : "polygon",'
              . '        "coordinates" : ['
              . '            [ [1000.0, -1001.0], [1001.0, -1001.0], [1001.0, -1000.0], [1000.0, -1000.0], [1000.0, -1001.0] ],'
              . '            [ [1000.2, -1001.2], [1000.8, -1001.2], [1000.8, -1001.8], [1000.2, -1001.8], [1000.2, -1001.2] ]'
              . '        ]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a5816a58c1fa769c23c6211ab449e6f3
     * Line: 255
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL255_a5816a58c1fa769c23c6211ab449e6f3()
    {
        $client = $this->getClient();
        // tag::a5816a58c1fa769c23c6211ab449e6f3[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : "POLYGON ((1000.0 1000.0, 1001.0 1000.0, 1001.0 1001.0, 1000.0 1001.0, 1000.0 1000.0), (1000.2 1000.2, 1000.8 1000.2, 1000.8 1000.8, 1000.2 1000.8, 1000.2 1000.2))"
        // }
        // end::a5816a58c1fa769c23c6211ab449e6f3[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : "POLYGON ((1000.0 1000.0, 1001.0 1000.0, 1001.0 1001.0, 1000.0 1001.0, 1000.0 1000.0), (1000.2 1000.2, 1000.8 1000.2, 1000.8 1000.8, 1000.2 1000.8, 1000.2 1000.2))"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1f1ccd9af526b2251bf960a85288fc97
     * Line: 278
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL278_1f1ccd9af526b2251bf960a85288fc97()
    {
        $client = $this->getClient();
        // tag::1f1ccd9af526b2251bf960a85288fc97[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type" : "polygon",
        //         "orientation" : "clockwise",
        //         "coordinates" : [
        //             [ [1000.0, 1000.0], [1000.0, 1001.0], [1001.0, 1001.0], [1001.0, 1000.0], [1000.0, 1000.0] ]
        //         ]
        //     }
        // }
        // end::1f1ccd9af526b2251bf960a85288fc97[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type" : "polygon",'
              . '        "orientation" : "clockwise",'
              . '        "coordinates" : ['
              . '            [ [1000.0, 1000.0], [1000.0, 1001.0], [1001.0, 1001.0], [1001.0, 1000.0], [1000.0, 1000.0] ]'
              . '        ]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  02da8c5d098d9e7cc263efac344a96de
     * Line: 299
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL299_02da8c5d098d9e7cc263efac344a96de()
    {
        $client = $this->getClient();
        // tag::02da8c5d098d9e7cc263efac344a96de[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type" : "multipoint",
        //         "coordinates" : [
        //             [1002.0, 1002.0], [1003.0, 2000.0]
        //         ]
        //     }
        // }
        // end::02da8c5d098d9e7cc263efac344a96de[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type" : "multipoint",'
              . '        "coordinates" : ['
              . '            [1002.0, 1002.0], [1003.0, 2000.0]'
              . '        ]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  577b09f45256ff855252d29e1d1cd433
     * Line: 315
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL315_577b09f45256ff855252d29e1d1cd433()
    {
        $client = $this->getClient();
        // tag::577b09f45256ff855252d29e1d1cd433[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : "MULTIPOINT (1002.0 2000.0, 1003.0 2000.0)"
        // }
        // end::577b09f45256ff855252d29e1d1cd433[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : "MULTIPOINT (1002.0 2000.0, 1003.0 2000.0)"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  76c551d13c3d907ad6dc56b85bec76de
     * Line: 330
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL330_76c551d13c3d907ad6dc56b85bec76de()
    {
        $client = $this->getClient();
        // tag::76c551d13c3d907ad6dc56b85bec76de[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type" : "multilinestring",
        //         "coordinates" : [
        //             [ [1002.0, 200.0], [1003.0, 200.0], [1003.0, 300.0], [1002.0, 300.0] ],
        //             [ [1000.0, 100.0], [1001.0, 100.0], [1001.0, 100.0], [1000.0, 100.0] ],
        //             [ [1000.2, 100.2], [1000.8, 100.2], [1000.8, 100.8], [1000.2, 100.8] ]
        //         ]
        //     }
        // }
        // end::76c551d13c3d907ad6dc56b85bec76de[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type" : "multilinestring",'
              . '        "coordinates" : ['
              . '            [ [1002.0, 200.0], [1003.0, 200.0], [1003.0, 300.0], [1002.0, 300.0] ],'
              . '            [ [1000.0, 100.0], [1001.0, 100.0], [1001.0, 100.0], [1000.0, 100.0] ],'
              . '            [ [1000.2, 100.2], [1000.8, 100.2], [1000.8, 100.8], [1000.2, 100.8] ]'
              . '        ]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9aeca1d56bb2ff0701587b269163311e
     * Line: 348
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL348_9aeca1d56bb2ff0701587b269163311e()
    {
        $client = $this->getClient();
        // tag::9aeca1d56bb2ff0701587b269163311e[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : "MULTILINESTRING ((1002.0 200.0, 1003.0 200.0, 1003.0 300.0, 1002.0 300.0), (1000.0 100.0, 1001.0 100.0, 1001.0 100.0, 1000.0 100.0), (1000.2 0.2, 1000.8 100.2, 1000.8 100.8, 1000.2 100.8))"
        // }
        // end::9aeca1d56bb2ff0701587b269163311e[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : "MULTILINESTRING ((1002.0 200.0, 1003.0 200.0, 1003.0 300.0, 1002.0 300.0), (1000.0 100.0, 1001.0 100.0, 1001.0 100.0, 1000.0 100.0), (1000.2 0.2, 1000.8 100.2, 1000.8 100.8, 1000.2 100.8))"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9d2464f0dce99d47f2699d953ee55b37
     * Line: 363
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL363_9d2464f0dce99d47f2699d953ee55b37()
    {
        $client = $this->getClient();
        // tag::9d2464f0dce99d47f2699d953ee55b37[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type" : "multipolygon",
        //         "coordinates" : [
        //             [ [[1002.0, 200.0], [1003.0, 200.0], [1003.0, 300.0], [1002.0, 300.0], [1002.0, 200.0]] ],
        //             [ [[1000.0, 200.0], [1001.0, 100.0], [1001.0, 100.0], [1000.0, 100.0], [1000.0, 100.0]],
        //               [[1000.2, 200.2], [1000.8, 100.2], [1000.8, 100.8], [1000.2, 100.8], [1000.2, 100.2]] ]
        //         ]
        //     }
        // }
        // end::9d2464f0dce99d47f2699d953ee55b37[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type" : "multipolygon",'
              . '        "coordinates" : ['
              . '            [ [[1002.0, 200.0], [1003.0, 200.0], [1003.0, 300.0], [1002.0, 300.0], [1002.0, 200.0]] ],'
              . '            [ [[1000.0, 200.0], [1001.0, 100.0], [1001.0, 100.0], [1000.0, 100.0], [1000.0, 100.0]],'
              . '              [[1000.2, 200.2], [1000.8, 100.2], [1000.8, 100.8], [1000.2, 100.8], [1000.2, 100.2]] ]'
              . '        ]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e7f366d76e3e53b4c0c30f7b0c21fbc0
     * Line: 381
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL381_e7f366d76e3e53b4c0c30f7b0c21fbc0()
    {
        $client = $this->getClient();
        // tag::e7f366d76e3e53b4c0c30f7b0c21fbc0[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : "MULTIPOLYGON (((1002.0 200.0, 1003.0 200.0, 1003.0 300.0, 1002.0 300.0, 102.0 200.0)), ((1000.0 100.0, 1001.0 100.0, 1001.0 100.0, 1000.0 100.0, 1000.0 100.0), (1000.2 100.2, 1000.8 100.2, 1000.8 100.8, 1000.2 100.8, 1000.2 100.2)))"
        // }
        // end::e7f366d76e3e53b4c0c30f7b0c21fbc0[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : "MULTIPOLYGON (((1002.0 200.0, 1003.0 200.0, 1003.0 300.0, 1002.0 300.0, 102.0 200.0)), ((1000.0 100.0, 1001.0 100.0, 1001.0 100.0, 1000.0 100.0, 1000.0 100.0), (1000.2 100.2, 1000.8 100.2, 1000.8 100.8, 1000.2 100.8, 1000.2 100.2)))"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4b3ef0f1d3cb9598a3fb94c03948e9e2
     * Line: 396
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL396_4b3ef0f1d3cb9598a3fb94c03948e9e2()
    {
        $client = $this->getClient();
        // tag::4b3ef0f1d3cb9598a3fb94c03948e9e2[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type": "geometrycollection",
        //         "geometries": [
        //             {
        //                 "type": "point",
        //                 "coordinates": [1000.0, 100.0]
        //             },
        //             {
        //                 "type": "linestring",
        //                 "coordinates": [ [1001.0, 100.0], [1002.0, 100.0] ]
        //             }
        //         ]
        //     }
        // }
        // end::4b3ef0f1d3cb9598a3fb94c03948e9e2[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type": "geometrycollection",'
              . '        "geometries": ['
              . '            {'
              . '                "type": "point",'
              . '                "coordinates": [1000.0, 100.0]'
              . '            },'
              . '            {'
              . '                "type": "linestring",'
              . '                "coordinates": [ [1001.0, 100.0], [1002.0, 100.0] ]'
              . '            }'
              . '        ]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  72ef8c634b3594963f203d2b3631c12e
     * Line: 419
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL419_72ef8c634b3594963f203d2b3631c12e()
    {
        $client = $this->getClient();
        // tag::72ef8c634b3594963f203d2b3631c12e[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : "GEOMETRYCOLLECTION (POINT (1000.0 100.0), LINESTRING (1001.0 100.0, 1002.0 100.0))"
        // }
        // end::72ef8c634b3594963f203d2b3631c12e[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : "GEOMETRYCOLLECTION (POINT (1000.0 100.0), LINESTRING (1001.0 100.0, 1002.0 100.0))"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6dd3c5a716302fdd39fcf5c150b826bc
     * Line: 435
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL435_6dd3c5a716302fdd39fcf5c150b826bc()
    {
        $client = $this->getClient();
        // tag::6dd3c5a716302fdd39fcf5c150b826bc[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type" : "envelope",
        //         "coordinates" : [ [1000.0, 100.0], [1001.0, 100.0] ]
        //     }
        // }
        // end::6dd3c5a716302fdd39fcf5c150b826bc[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type" : "envelope",'
              . '        "coordinates" : [ [1000.0, 100.0], [1001.0, 100.0] ]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  70932f56df27fb502d2095fefcaa83d6
     * Line: 451
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL451_70932f56df27fb502d2095fefcaa83d6()
    {
        $client = $this->getClient();
        // tag::70932f56df27fb502d2095fefcaa83d6[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : "BBOX (1000.0, 1002.0, 2000.0, 1000.0)"
        // }
        // end::70932f56df27fb502d2095fefcaa83d6[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : "BBOX (1000.0, 1002.0, 2000.0, 1000.0)"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





















}
