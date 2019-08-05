<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: RangeAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/bucket/range-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class RangeAggregation extends SimpleExamplesTester {

    /**
     * Tag:  e84a496049274a0fed24e319da7a864c
     * Line: 10
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL10_e84a496049274a0fed24e319da7a864c()
    {
        $client = $this->getClient();
        // tag::e84a496049274a0fed24e319da7a864c[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "price_ranges" : {
        //             "range" : {
        //                 "field" : "price",
        //                 "ranges" : [
        //                     { "to" : 100.0 },
        //                     { "from" : 100.0, "to" : 200.0 },
        //                     { "from" : 200.0 }
        //                 ]
        //             }
        //         }
        //     }
        // }
        // end::e84a496049274a0fed24e319da7a864c[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "price_ranges" : {'
              . '            "range" : {'
              . '                "field" : "price",'
              . '                "ranges" : ['
              . '                    { "to" : 100.0 },'
              . '                    { "from" : 100.0, "to" : 200.0 },'
              . '                    { "from" : 200.0 }'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d637c754aec195a1df39cafca49cbe7e
     * Line: 68
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL68_d637c754aec195a1df39cafca49cbe7e()
    {
        $client = $this->getClient();
        // tag::d637c754aec195a1df39cafca49cbe7e[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "price_ranges" : {
        //             "range" : {
        //                 "field" : "price",
        //                 "keyed" : true,
        //                 "ranges" : [
        //                     { "to" : 100 },
        //                     { "from" : 100, "to" : 200 },
        //                     { "from" : 200 }
        //                 ]
        //             }
        //         }
        //     }
        // }
        // end::d637c754aec195a1df39cafca49cbe7e[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "price_ranges" : {'
              . '            "range" : {'
              . '                "field" : "price",'
              . '                "keyed" : true,'
              . '                "ranges" : ['
              . '                    { "to" : 100 },'
              . '                    { "from" : 100, "to" : 200 },'
              . '                    { "from" : 200 }'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4d147b4a4dabef9b0a8a13cbe8174e09
     * Line: 122
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL122_4d147b4a4dabef9b0a8a13cbe8174e09()
    {
        $client = $this->getClient();
        // tag::4d147b4a4dabef9b0a8a13cbe8174e09[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "price_ranges" : {
        //             "range" : {
        //                 "field" : "price",
        //                 "keyed" : true,
        //                 "ranges" : [
        //                     { "key" : "cheap", "to" : 100 },
        //                     { "key" : "average", "from" : 100, "to" : 200 },
        //                     { "key" : "expensive", "from" : 200 }
        //                 ]
        //             }
        //         }
        //     }
        // }
        // end::4d147b4a4dabef9b0a8a13cbe8174e09[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "price_ranges" : {'
              . '            "range" : {'
              . '                "field" : "price",'
              . '                "keyed" : true,'
              . '                "ranges" : ['
              . '                    { "key" : "cheap", "to" : 100 },'
              . '                    { "key" : "average", "from" : 100, "to" : 200 },'
              . '                    { "key" : "expensive", "from" : 200 }'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  bdf31f63d0941a4183ceae1cc2342c39
     * Line: 181
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL181_bdf31f63d0941a4183ceae1cc2342c39()
    {
        $client = $this->getClient();
        // tag::bdf31f63d0941a4183ceae1cc2342c39[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "price_ranges" : {
        //             "range" : {
        //                 "script" : {
        //                     "lang": "painless",
        //                     "source": "doc['price'].value"
        //                 },
        //                 "ranges" : [
        //                     { "to" : 100 },
        //                     { "from" : 100, "to" : 200 },
        //                     { "from" : 200 }
        //                 ]
        //             }
        //         }
        //     }
        // }
        // end::bdf31f63d0941a4183ceae1cc2342c39[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "price_ranges" : {'
              . '            "range" : {'
              . '                "script" : {'
              . '                    "lang": "painless",'
              . '                    "source": "doc['price'].value"'
              . '                },'
              . '                "ranges" : ['
              . '                    { "to" : 100 },'
              . '                    { "from" : 100, "to" : 200 },'
              . '                    { "from" : 200 }'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4c9c453c92431a05b413bfc0163104b4
     * Line: 206
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL206_4c9c453c92431a05b413bfc0163104b4()
    {
        $client = $this->getClient();
        // tag::4c9c453c92431a05b413bfc0163104b4[]
        // TODO -- Implement Example
        // POST /_scripts/convert_currency
        // {
        //   "script": {
        //     "lang": "painless",
        //     "source": "doc[params.field].value * params.conversion_rate"
        //   }
        // }
        // end::4c9c453c92431a05b413bfc0163104b4[]

        $curl = 'POST /_scripts/convert_currency'
              . '{'
              . '  "script": {'
              . '    "lang": "painless",'
              . '    "source": "doc[params.field].value * params.conversion_rate"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7a6d758654eecbc3a1a76744b4de0a23
     * Line: 221
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL221_7a6d758654eecbc3a1a76744b4de0a23()
    {
        $client = $this->getClient();
        // tag::7a6d758654eecbc3a1a76744b4de0a23[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "price_ranges" : {
        //             "range" : {
        //                 "script" : {
        //                     "id": "convert_currency", \<1>
        //                     "params": { \<2>
        //                         "field": "price",
        //                         "conversion_rate": 0.835526591
        //                     }
        //                 },
        //                 "ranges" : [
        //                     { "from" : 0, "to" : 100 },
        //                     { "from" : 100 }
        //                 ]
        //             }
        //         }
        //     }
        // }
        // end::7a6d758654eecbc3a1a76744b4de0a23[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "price_ranges" : {'
              . '            "range" : {'
              . '                "script" : {'
              . '                    "id": "convert_currency", \<1>'
              . '                    "params": { \<2>'
              . '                        "field": "price",'
              . '                        "conversion_rate": 0.835526591'
              . '                    }'
              . '                },'
              . '                "ranges" : ['
              . '                    { "from" : 0, "to" : 100 },'
              . '                    { "from" : 100 }'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  022956b81fa70e72b56c66be16d0e982
     * Line: 282
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL282_022956b81fa70e72b56c66be16d0e982()
    {
        $client = $this->getClient();
        // tag::022956b81fa70e72b56c66be16d0e982[]
        // TODO -- Implement Example
        // GET /sales/_search
        // {
        //     "aggs" : {
        //         "price_ranges" : {
        //             "range" : {
        //                 "field" : "price",
        //                 "script" : {
        //                     "source": "_value * params.conversion_rate",
        //                     "params" : {
        //                         "conversion_rate" : 0.8
        //                     }
        //                 },
        //                 "ranges" : [
        //                     { "to" : 35 },
        //                     { "from" : 35, "to" : 70 },
        //                     { "from" : 70 }
        //                 ]
        //             }
        //         }
        //     }
        // }
        // end::022956b81fa70e72b56c66be16d0e982[]

        $curl = 'GET /sales/_search'
              . '{'
              . '    "aggs" : {'
              . '        "price_ranges" : {'
              . '            "range" : {'
              . '                "field" : "price",'
              . '                "script" : {'
              . '                    "source": "_value * params.conversion_rate",'
              . '                    "params" : {'
              . '                        "conversion_rate" : 0.8'
              . '                    }'
              . '                },'
              . '                "ranges" : ['
              . '                    { "to" : 35 },'
              . '                    { "from" : 35, "to" : 70 },'
              . '                    { "from" : 70 }'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3b52f4f7ea4abfa6db6bf54199b15f53
     * Line: 313
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL313_3b52f4f7ea4abfa6db6bf54199b15f53()
    {
        $client = $this->getClient();
        // tag::3b52f4f7ea4abfa6db6bf54199b15f53[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "price_ranges" : {
        //             "range" : {
        //                 "field" : "price",
        //                 "ranges" : [
        //                     { "to" : 100 },
        //                     { "from" : 100, "to" : 200 },
        //                     { "from" : 200 }
        //                 ]
        //             },
        //             "aggs" : {
        //                 "price_stats" : {
        //                     "stats" : { "field" : "price" }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::3b52f4f7ea4abfa6db6bf54199b15f53[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "price_ranges" : {'
              . '            "range" : {'
              . '                "field" : "price",'
              . '                "ranges" : ['
              . '                    { "to" : 100 },'
              . '                    { "from" : 100, "to" : 200 },'
              . '                    { "from" : 200 }'
              . '                ]'
              . '            },'
              . '            "aggs" : {'
              . '                "price_stats" : {'
              . '                    "stats" : { "field" : "price" }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4547c455375eeda5ad9f74b40d4fa61b
     * Line: 395
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL395_4547c455375eeda5ad9f74b40d4fa61b()
    {
        $client = $this->getClient();
        // tag::4547c455375eeda5ad9f74b40d4fa61b[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "price_ranges" : {
        //             "range" : {
        //                 "field" : "price",
        //                 "ranges" : [
        //                     { "to" : 100 },
        //                     { "from" : 100, "to" : 200 },
        //                     { "from" : 200 }
        //                 ]
        //             },
        //             "aggs" : {
        //                 "price_stats" : {
        //                     "stats" : {} \<1>
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::4547c455375eeda5ad9f74b40d4fa61b[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "price_ranges" : {'
              . '            "range" : {'
              . '                "field" : "price",'
              . '                "ranges" : ['
              . '                    { "to" : 100 },'
              . '                    { "from" : 100, "to" : 200 },'
              . '                    { "from" : 200 }'
              . '                ]'
              . '            },'
              . '            "aggs" : {'
              . '                "price_stats" : {'
              . '                    "stats" : {} \<1>'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%










}
