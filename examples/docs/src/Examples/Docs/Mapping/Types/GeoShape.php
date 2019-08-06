<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GeoShape
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/types/geo-shape.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GeoShape extends SimpleExamplesTester {

    /**
     * Tag:  3fef996cf6795e881918ffedc273c642
     * Line: 219
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL219_3fef996cf6795e881918ffedc273c642()
    {
        $client = $this->getClient();
        // tag::3fef996cf6795e881918ffedc273c642[]
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
        // end::3fef996cf6795e881918ffedc273c642[]

        $curl = 'PUT /example'
              . '{'
              . '    "mappings": {'
              . '        "properties": {'
              . '            "location": {'
              . '                "type": "geo_shape"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f851d1be5d5e5fe5455ba81344d01133
     * Line: 308
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL308_f851d1be5d5e5fe5455ba81344d01133()
    {
        $client = $this->getClient();
        // tag::f851d1be5d5e5fe5455ba81344d01133[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type" : "point",
        //         "coordinates" : [-77.03653, 38.897676]
        //     }
        // }
        // end::f851d1be5d5e5fe5455ba81344d01133[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type" : "point",'
              . '        "coordinates" : [-77.03653, 38.897676]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d673a2c008015ac6f754661ae336131c
     * Line: 322
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL322_d673a2c008015ac6f754661ae336131c()
    {
        $client = $this->getClient();
        // tag::d673a2c008015ac6f754661ae336131c[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : "POINT (-77.03653 38.897676)"
        // }
        // end::d673a2c008015ac6f754661ae336131c[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : "POINT (-77.03653 38.897676)"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  21a9348800406e09b8bdaab192245096
     * Line: 340
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL340_21a9348800406e09b8bdaab192245096()
    {
        $client = $this->getClient();
        // tag::21a9348800406e09b8bdaab192245096[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type" : "linestring",
        //         "coordinates" : [[-77.03653, 38.897676], [-77.009051, 38.889939]]
        //     }
        // }
        // end::21a9348800406e09b8bdaab192245096[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type" : "linestring",'
              . '        "coordinates" : [[-77.03653, 38.897676], [-77.009051, 38.889939]]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  48625e23b05d33977451cde7b98b634a
     * Line: 354
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL354_48625e23b05d33977451cde7b98b634a()
    {
        $client = $this->getClient();
        // tag::48625e23b05d33977451cde7b98b634a[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : "LINESTRING (-77.03653 38.897676, -77.009051 38.889939)"
        // }
        // end::48625e23b05d33977451cde7b98b634a[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : "LINESTRING (-77.03653 38.897676, -77.009051 38.889939)"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1d6ee162260a21f6e4597eadbea88650
     * Line: 374
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL374_1d6ee162260a21f6e4597eadbea88650()
    {
        $client = $this->getClient();
        // tag::1d6ee162260a21f6e4597eadbea88650[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type" : "polygon",
        //         "coordinates" : [
        //             [ [100.0, 0.0], [101.0, 0.0], [101.0, 1.0], [100.0, 1.0], [100.0, 0.0] ]
        //         ]
        //     }
        // }
        // end::1d6ee162260a21f6e4597eadbea88650[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type" : "polygon",'
              . '        "coordinates" : ['
              . '            [ [100.0, 0.0], [101.0, 0.0], [101.0, 1.0], [100.0, 1.0], [100.0, 0.0] ]'
              . '        ]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  18c34a2c5820e330a125dfddf2624c69
     * Line: 390
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL390_18c34a2c5820e330a125dfddf2624c69()
    {
        $client = $this->getClient();
        // tag::18c34a2c5820e330a125dfddf2624c69[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : "POLYGON ((100.0 0.0, 101.0 0.0, 101.0 1.0, 100.0 1.0, 100.0 0.0))"
        // }
        // end::18c34a2c5820e330a125dfddf2624c69[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : "POLYGON ((100.0 0.0, 101.0 0.0, 101.0 1.0, 100.0 1.0, 100.0 0.0))"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f83e3ea198f6e87046aab2c5dea60d61
     * Line: 403
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL403_f83e3ea198f6e87046aab2c5dea60d61()
    {
        $client = $this->getClient();
        // tag::f83e3ea198f6e87046aab2c5dea60d61[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type" : "polygon",
        //         "coordinates" : [
        //             [ [100.0, 0.0], [101.0, 0.0], [101.0, 1.0], [100.0, 1.0], [100.0, 0.0] ],
        //             [ [100.2, 0.2], [100.8, 0.2], [100.8, 0.8], [100.2, 0.8], [100.2, 0.2] ]
        //         ]
        //     }
        // }
        // end::f83e3ea198f6e87046aab2c5dea60d61[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type" : "polygon",'
              . '        "coordinates" : ['
              . '            [ [100.0, 0.0], [101.0, 0.0], [101.0, 1.0], [100.0, 1.0], [100.0, 0.0] ],'
              . '            [ [100.2, 0.2], [100.8, 0.2], [100.8, 0.8], [100.2, 0.8], [100.2, 0.2] ]'
              . '        ]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  00eb71b03b73e605da6368041a64a8ad
     * Line: 420
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL420_00eb71b03b73e605da6368041a64a8ad()
    {
        $client = $this->getClient();
        // tag::00eb71b03b73e605da6368041a64a8ad[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : "POLYGON ((100.0 0.0, 101.0 0.0, 101.0 1.0, 100.0 1.0, 100.0 0.0), (100.2 0.2, 100.8 0.2, 100.8 0.8, 100.2 0.8, 100.2 0.2))"
        // }
        // end::00eb71b03b73e605da6368041a64a8ad[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : "POLYGON ((100.0 0.0, 101.0 0.0, 101.0 1.0, 100.0 1.0, 100.0 0.0), (100.2 0.2, 100.8 0.2, 100.8 0.8, 100.2 0.8, 100.2 0.2))"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4c42c8835876a2271e7ba63d6bd3149f
     * Line: 448
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL448_4c42c8835876a2271e7ba63d6bd3149f()
    {
        $client = $this->getClient();
        // tag::4c42c8835876a2271e7ba63d6bd3149f[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type" : "polygon",
        //         "coordinates" : [
        //             [ [-177.0, 10.0], [176.0, 15.0], [172.0, 0.0], [176.0, -15.0], [-177.0, -10.0], [-177.0, 10.0] ],
        //             [ [178.2, 8.2], [-178.8, 8.2], [-180.8, -8.8], [178.2, 8.8] ]
        //         ]
        //     }
        // }
        // end::4c42c8835876a2271e7ba63d6bd3149f[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type" : "polygon",'
              . '        "coordinates" : ['
              . '            [ [-177.0, 10.0], [176.0, 15.0], [172.0, 0.0], [176.0, -15.0], [-177.0, -10.0], [-177.0, 10.0] ],'
              . '            [ [178.2, 8.2], [-178.8, 8.2], [-180.8, -8.8], [178.2, 8.8] ]'
              . '        ]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  60294ea29c96c432047d4fffcb3cc8b4
     * Line: 468
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL468_60294ea29c96c432047d4fffcb3cc8b4()
    {
        $client = $this->getClient();
        // tag::60294ea29c96c432047d4fffcb3cc8b4[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type" : "polygon",
        //         "orientation" : "clockwise",
        //         "coordinates" : [
        //             [ [100.0, 0.0], [100.0, 1.0], [101.0, 1.0], [101.0, 0.0], [100.0, 0.0] ]
        //         ]
        //     }
        // }
        // end::60294ea29c96c432047d4fffcb3cc8b4[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type" : "polygon",'
              . '        "orientation" : "clockwise",'
              . '        "coordinates" : ['
              . '            [ [100.0, 0.0], [100.0, 1.0], [101.0, 1.0], [101.0, 0.0], [100.0, 0.0] ]'
              . '        ]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2eca42af76c6ddc657fca3948f3865bd
     * Line: 489
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL489_2eca42af76c6ddc657fca3948f3865bd()
    {
        $client = $this->getClient();
        // tag::2eca42af76c6ddc657fca3948f3865bd[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type" : "multipoint",
        //         "coordinates" : [
        //             [102.0, 2.0], [103.0, 2.0]
        //         ]
        //     }
        // }
        // end::2eca42af76c6ddc657fca3948f3865bd[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type" : "multipoint",'
              . '        "coordinates" : ['
              . '            [102.0, 2.0], [103.0, 2.0]'
              . '        ]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f1e1f4f37194a899e7056d0782804790
     * Line: 505
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL505_f1e1f4f37194a899e7056d0782804790()
    {
        $client = $this->getClient();
        // tag::f1e1f4f37194a899e7056d0782804790[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : "MULTIPOINT (102.0 2.0, 103.0 2.0)"
        // }
        // end::f1e1f4f37194a899e7056d0782804790[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : "MULTIPOINT (102.0 2.0, 103.0 2.0)"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c4ba19b62e87ed837dc6f1f9fe184244
     * Line: 520
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL520_c4ba19b62e87ed837dc6f1f9fe184244()
    {
        $client = $this->getClient();
        // tag::c4ba19b62e87ed837dc6f1f9fe184244[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type" : "multilinestring",
        //         "coordinates" : [
        //             [ [102.0, 2.0], [103.0, 2.0], [103.0, 3.0], [102.0, 3.0] ],
        //             [ [100.0, 0.0], [101.0, 0.0], [101.0, 1.0], [100.0, 1.0] ],
        //             [ [100.2, 0.2], [100.8, 0.2], [100.8, 0.8], [100.2, 0.8] ]
        //         ]
        //     }
        // }
        // end::c4ba19b62e87ed837dc6f1f9fe184244[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type" : "multilinestring",'
              . '        "coordinates" : ['
              . '            [ [102.0, 2.0], [103.0, 2.0], [103.0, 3.0], [102.0, 3.0] ],'
              . '            [ [100.0, 0.0], [101.0, 0.0], [101.0, 1.0], [100.0, 1.0] ],'
              . '            [ [100.2, 0.2], [100.8, 0.2], [100.8, 0.8], [100.2, 0.8] ]'
              . '        ]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  117096e1830e7acedf38bd6a92a9c8b4
     * Line: 538
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL538_117096e1830e7acedf38bd6a92a9c8b4()
    {
        $client = $this->getClient();
        // tag::117096e1830e7acedf38bd6a92a9c8b4[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : "MULTILINESTRING ((102.0 2.0, 103.0 2.0, 103.0 3.0, 102.0 3.0), (100.0 0.0, 101.0 0.0, 101.0 1.0, 100.0 1.0), (100.2 0.2, 100.8 0.2, 100.8 0.8, 100.2 0.8))"
        // }
        // end::117096e1830e7acedf38bd6a92a9c8b4[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : "MULTILINESTRING ((102.0 2.0, 103.0 2.0, 103.0 3.0, 102.0 3.0), (100.0 0.0, 101.0 0.0, 101.0 1.0, 100.0 1.0), (100.2 0.2, 100.8 0.2, 100.8 0.8, 100.2 0.8))"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4be91bb5ac3a1b83b767a060c58e0b12
     * Line: 553
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL553_4be91bb5ac3a1b83b767a060c58e0b12()
    {
        $client = $this->getClient();
        // tag::4be91bb5ac3a1b83b767a060c58e0b12[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type" : "multipolygon",
        //         "coordinates" : [
        //             [ [[102.0, 2.0], [103.0, 2.0], [103.0, 3.0], [102.0, 3.0], [102.0, 2.0]] ],
        //             [ [[100.0, 0.0], [101.0, 0.0], [101.0, 1.0], [100.0, 1.0], [100.0, 0.0]],
        //               [[100.2, 0.2], [100.8, 0.2], [100.8, 0.8], [100.2, 0.8], [100.2, 0.2]] ]
        //         ]
        //     }
        // }
        // end::4be91bb5ac3a1b83b767a060c58e0b12[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type" : "multipolygon",'
              . '        "coordinates" : ['
              . '            [ [[102.0, 2.0], [103.0, 2.0], [103.0, 3.0], [102.0, 3.0], [102.0, 2.0]] ],'
              . '            [ [[100.0, 0.0], [101.0, 0.0], [101.0, 1.0], [100.0, 1.0], [100.0, 0.0]],'
              . '              [[100.2, 0.2], [100.8, 0.2], [100.8, 0.8], [100.2, 0.8], [100.2, 0.2]] ]'
              . '        ]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9290410340f0e66e67fa96aacc83bbdc
     * Line: 571
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL571_9290410340f0e66e67fa96aacc83bbdc()
    {
        $client = $this->getClient();
        // tag::9290410340f0e66e67fa96aacc83bbdc[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : "MULTIPOLYGON (((102.0 2.0, 103.0 2.0, 103.0 3.0, 102.0 3.0, 102.0 2.0)), ((100.0 0.0, 101.0 0.0, 101.0 1.0, 100.0 1.0, 100.0 0.0), (100.2 0.2, 100.8 0.2, 100.8 0.8, 100.2 0.8, 100.2 0.2)))"
        // }
        // end::9290410340f0e66e67fa96aacc83bbdc[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : "MULTIPOLYGON (((102.0 2.0, 103.0 2.0, 103.0 3.0, 102.0 3.0, 102.0 2.0)), ((100.0 0.0, 101.0 0.0, 101.0 1.0, 100.0 1.0, 100.0 0.0), (100.2 0.2, 100.8 0.2, 100.8 0.8, 100.2 0.8, 100.2 0.2)))"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a99750fb5d296fa8df97ee71a34c698c
     * Line: 586
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL586_a99750fb5d296fa8df97ee71a34c698c()
    {
        $client = $this->getClient();
        // tag::a99750fb5d296fa8df97ee71a34c698c[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type": "geometrycollection",
        //         "geometries": [
        //             {
        //                 "type": "point",
        //                 "coordinates": [100.0, 0.0]
        //             },
        //             {
        //                 "type": "linestring",
        //                 "coordinates": [ [101.0, 0.0], [102.0, 1.0] ]
        //             }
        //         ]
        //     }
        // }
        // end::a99750fb5d296fa8df97ee71a34c698c[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type": "geometrycollection",'
              . '        "geometries": ['
              . '            {'
              . '                "type": "point",'
              . '                "coordinates": [100.0, 0.0]'
              . '            },'
              . '            {'
              . '                "type": "linestring",'
              . '                "coordinates": [ [101.0, 0.0], [102.0, 1.0] ]'
              . '            }'
              . '        ]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  71bb89f56d847b636a050c553c0cd0a7
     * Line: 609
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL609_71bb89f56d847b636a050c553c0cd0a7()
    {
        $client = $this->getClient();
        // tag::71bb89f56d847b636a050c553c0cd0a7[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : "GEOMETRYCOLLECTION (POINT (100.0 0.0), LINESTRING (101.0 0.0, 102.0 1.0))"
        // }
        // end::71bb89f56d847b636a050c553c0cd0a7[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : "GEOMETRYCOLLECTION (POINT (100.0 0.0), LINESTRING (101.0 0.0, 102.0 1.0))"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f893fffd649507119d0a9afd98a0cf87
     * Line: 626
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL626_f893fffd649507119d0a9afd98a0cf87()
    {
        $client = $this->getClient();
        // tag::f893fffd649507119d0a9afd98a0cf87[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type" : "envelope",
        //         "coordinates" : [ [100.0, 1.0], [101.0, 0.0] ]
        //     }
        // }
        // end::f893fffd649507119d0a9afd98a0cf87[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type" : "envelope",'
              . '        "coordinates" : [ [100.0, 1.0], [101.0, 0.0] ]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  65208190e9640cb4ca67271f1694814d
     * Line: 642
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL642_65208190e9640cb4ca67271f1694814d()
    {
        $client = $this->getClient();
        // tag::65208190e9640cb4ca67271f1694814d[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : "BBOX (100.0, 102.0, 2.0, 0.0)"
        // }
        // end::65208190e9640cb4ca67271f1694814d[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : "BBOX (100.0, 102.0, 2.0, 0.0)"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  76039c2fd422a6bb6340848cc0a78bbd
     * Line: 660
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL660_76039c2fd422a6bb6340848cc0a78bbd()
    {
        $client = $this->getClient();
        // tag::76039c2fd422a6bb6340848cc0a78bbd[]
        // TODO -- Implement Example
        // POST /example/_doc
        // {
        //     "location" : {
        //         "type" : "circle",
        //         "coordinates" : [101.0, 1.0],
        //         "radius" : "100m"
        //     }
        // }
        // end::76039c2fd422a6bb6340848cc0a78bbd[]

        $curl = 'POST /example/_doc'
              . '{'
              . '    "location" : {'
              . '        "type" : "circle",'
              . '        "coordinates" : [101.0, 1.0],'
              . '        "radius" : "100m"'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%























}
