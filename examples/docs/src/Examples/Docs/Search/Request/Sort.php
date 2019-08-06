<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Sort
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/request/sort.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Sort extends SimpleExamplesTester {

    /**
     * Tag:  d1b3b7d2bb2ab90d15fd10318abd24db
     * Line: 11
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL11_d1b3b7d2bb2ab90d15fd10318abd24db()
    {
        $client = $this->getClient();
        // tag::d1b3b7d2bb2ab90d15fd10318abd24db[]
        // TODO -- Implement Example
        // PUT /my_index
        // {
        //     "mappings": {
        //         "properties": {
        //             "post_date": { "type": "date" },
        //             "user": {
        //                 "type": "keyword"
        //             },
        //             "name": {
        //                 "type": "keyword"
        //             },
        //             "age": { "type": "integer" }
        //         }
        //     }
        // }
        // end::d1b3b7d2bb2ab90d15fd10318abd24db[]

        $curl = 'PUT /my_index'
              . '{'
              . '    "mappings": {'
              . '        "properties": {'
              . '            "post_date": { "type": "date" },'
              . '            "user": {'
              . '                "type": "keyword"'
              . '            },'
              . '            "name": {'
              . '                "type": "keyword"'
              . '            },'
              . '            "age": { "type": "integer" }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ae9b5fbd42af2386ffbf56ad4a697e51
     * Line: 31
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL31_ae9b5fbd42af2386ffbf56ad4a697e51()
    {
        $client = $this->getClient();
        // tag::ae9b5fbd42af2386ffbf56ad4a697e51[]
        // TODO -- Implement Example
        // GET /my_index/_search
        // {
        //     "sort" : [
        //         { "post_date" : {"order" : "asc"}},
        //         "user",
        //         { "name" : "desc" },
        //         { "age" : "desc" },
        //         "_score"
        //     ],
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::ae9b5fbd42af2386ffbf56ad4a697e51[]

        $curl = 'GET /my_index/_search'
              . '{'
              . '    "sort" : ['
              . '        { "post_date" : {"order" : "asc"}},'
              . '        "user",'
              . '        { "name" : "desc" },'
              . '        { "age" : "desc" },'
              . '        "_score"'
              . '    ],'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b997885974522ef439d5e345924cc5ba
     * Line: 96
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL96_b997885974522ef439d5e345924cc5ba()
    {
        $client = $this->getClient();
        // tag::b997885974522ef439d5e345924cc5ba[]
        // TODO -- Implement Example
        // PUT /my_index/_doc/1?refresh
        // {
        //    "product": "chocolate",
        //    "price": [20, 4]
        // }
        // POST /_search
        // {
        //    "query" : {
        //       "term" : { "product" : "chocolate" }
        //    },
        //    "sort" : [
        //       {"price" : {"order" : "asc", "mode" : "avg"}}
        //    ]
        // }
        // end::b997885974522ef439d5e345924cc5ba[]

        $curl = 'PUT /my_index/_doc/1?refresh'
              . '{'
              . '   "product": "chocolate",'
              . '   "price": [20, 4]'
              . '}'
              . 'POST /_search'
              . '{'
              . '   "query" : {'
              . '      "term" : { "product" : "chocolate" }'
              . '   },'
              . '   "sort" : ['
              . '      {"price" : {"order" : "asc", "mode" : "avg"}}'
              . '   ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  abf329ebefaf58acd4ee30e685731499
     * Line: 126
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL126_abf329ebefaf58acd4ee30e685731499()
    {
        $client = $this->getClient();
        // tag::abf329ebefaf58acd4ee30e685731499[]
        // TODO -- Implement Example
        // PUT /index_double
        // {
        //     "mappings": {
        //         "properties": {
        //             "field": { "type": "double" }
        //         }
        //     }
        // }
        // end::abf329ebefaf58acd4ee30e685731499[]

        $curl = 'PUT /index_double'
              . '{'
              . '    "mappings": {'
              . '        "properties": {'
              . '            "field": { "type": "double" }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f6b5032bf27c2445d28845be0d413970
     * Line: 139
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL139_f6b5032bf27c2445d28845be0d413970()
    {
        $client = $this->getClient();
        // tag::f6b5032bf27c2445d28845be0d413970[]
        // TODO -- Implement Example
        // PUT /index_long
        // {
        //     "mappings": {
        //         "properties": {
        //             "field": { "type": "long" }
        //         }
        //     }
        // }
        // end::f6b5032bf27c2445d28845be0d413970[]

        $curl = 'PUT /index_long'
              . '{'
              . '    "mappings": {'
              . '        "properties": {'
              . '            "field": { "type": "long" }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2891aa10ee9d474780adf94d5607f2db
     * Line: 159
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL159_2891aa10ee9d474780adf94d5607f2db()
    {
        $client = $this->getClient();
        // tag::2891aa10ee9d474780adf94d5607f2db[]
        // TODO -- Implement Example
        // POST /index_long,index_double/_search
        // {
        //    "sort" : [
        //       {
        //         "field" : {
        //             "numeric_type" : "double"
        //         }
        //       }
        //    ]
        // }
        // end::2891aa10ee9d474780adf94d5607f2db[]

        $curl = 'POST /index_long,index_double/_search'
              . '{'
              . '   "sort" : ['
              . '      {'
              . '        "field" : {'
              . '            "numeric_type" : "double"'
              . '        }'
              . '      }'
              . '   ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f4a1008b3f9baa67bb03ce9ef5ab4cb4
     * Line: 187
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL187_f4a1008b3f9baa67bb03ce9ef5ab4cb4()
    {
        $client = $this->getClient();
        // tag::f4a1008b3f9baa67bb03ce9ef5ab4cb4[]
        // TODO -- Implement Example
        // PUT /index_double
        // {
        //     "mappings": {
        //         "properties": {
        //             "field": { "type": "date" }
        //         }
        //     }
        // }
        // end::f4a1008b3f9baa67bb03ce9ef5ab4cb4[]

        $curl = 'PUT /index_double'
              . '{'
              . '    "mappings": {'
              . '        "properties": {'
              . '            "field": { "type": "date" }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7477671958734843dd67cf0b8e6c7515
     * Line: 200
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL200_7477671958734843dd67cf0b8e6c7515()
    {
        $client = $this->getClient();
        // tag::7477671958734843dd67cf0b8e6c7515[]
        // TODO -- Implement Example
        // PUT /index_long
        // {
        //     "mappings": {
        //         "properties": {
        //             "field": { "type": "date_nanos" }
        //         }
        //     }
        // }
        // end::7477671958734843dd67cf0b8e6c7515[]

        $curl = 'PUT /index_long'
              . '{'
              . '    "mappings": {'
              . '        "properties": {'
              . '            "field": { "type": "date_nanos" }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5f3549ac7fee94682ca0d7439eebdd2a
     * Line: 220
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL220_5f3549ac7fee94682ca0d7439eebdd2a()
    {
        $client = $this->getClient();
        // tag::5f3549ac7fee94682ca0d7439eebdd2a[]
        // TODO -- Implement Example
        // POST /index_long,index_double/_search
        // {
        //    "sort" : [
        //       {
        //         "field" : {
        //             "numeric_type" : "date_nanos"
        //         }
        //       }
        //    ]
        // }
        // end::5f3549ac7fee94682ca0d7439eebdd2a[]

        $curl = 'POST /index_long,index_double/_search'
              . '{'
              . '   "sort" : ['
              . '      {'
              . '        "field" : {'
              . '            "numeric_type" : "date_nanos"'
              . '        }'
              . '      }'
              . '   ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  de139866a220124360e5e27d1a736ea4
     * Line: 272
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL272_de139866a220124360e5e27d1a736ea4()
    {
        $client = $this->getClient();
        // tag::de139866a220124360e5e27d1a736ea4[]
        // TODO -- Implement Example
        // POST /_search
        // {
        //    "query" : {
        //       "term" : { "product" : "chocolate" }
        //    },
        //    "sort" : [
        //        {
        //           "offer.price" : {
        //              "mode" :  "avg",
        //              "order" : "asc",
        //              "nested": {
        //                 "path": "offer",
        //                 "filter": {
        //                    "term" : { "offer.color" : "blue" }
        //                 }
        //              }
        //           }
        //        }
        //     ]
        // }
        // end::de139866a220124360e5e27d1a736ea4[]

        $curl = 'POST /_search'
              . '{'
              . '   "query" : {'
              . '      "term" : { "product" : "chocolate" }'
              . '   },'
              . '   "sort" : ['
              . '       {'
              . '          "offer.price" : {'
              . '             "mode" :  "avg",'
              . '             "order" : "asc",'
              . '             "nested": {'
              . '                "path": "offer",'
              . '                "filter": {'
              . '                   "term" : { "offer.color" : "blue" }'
              . '                }'
              . '             }'
              . '          }'
              . '       }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  22334f4b24bb8977d3e1bf2ffdc29d3f
     * Line: 300
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL300_22334f4b24bb8977d3e1bf2ffdc29d3f()
    {
        $client = $this->getClient();
        // tag::22334f4b24bb8977d3e1bf2ffdc29d3f[]
        // TODO -- Implement Example
        // POST /_search
        // {
        //    "query": {
        //       "nested": {
        //          "path": "parent",
        //          "query": {
        //             "bool": {
        //                 "must": {"range": {"parent.age": {"gte": 21}}},
        //                 "filter": {
        //                     "nested": {
        //                         "path": "parent.child",
        //                         "query": {"match": {"parent.child.name": "matt"}}
        //                     }
        //                 }
        //             }
        //          }
        //       }
        //    },
        //    "sort" : [
        //       {
        //          "parent.child.age" : {
        //             "mode" :  "min",
        //             "order" : "asc",
        //             "nested": {
        //                "path": "parent",
        //                "filter": {
        //                   "range": {"parent.age": {"gte": 21}}
        //                },
        //                "nested": {
        //                   "path": "parent.child",
        //                   "filter": {
        //                      "match": {"parent.child.name": "matt"}
        //                   }
        //                }
        //             }
        //          }
        //       }
        //    ]
        // }
        // end::22334f4b24bb8977d3e1bf2ffdc29d3f[]

        $curl = 'POST /_search'
              . '{'
              . '   "query": {'
              . '      "nested": {'
              . '         "path": "parent",'
              . '         "query": {'
              . '            "bool": {'
              . '                "must": {"range": {"parent.age": {"gte": 21}}},'
              . '                "filter": {'
              . '                    "nested": {'
              . '                        "path": "parent.child",'
              . '                        "query": {"match": {"parent.child.name": "matt"}}'
              . '                    }'
              . '                }'
              . '            }'
              . '         }'
              . '      }'
              . '   },'
              . '   "sort" : ['
              . '      {'
              . '         "parent.child.age" : {'
              . '            "mode" :  "min",'
              . '            "order" : "asc",'
              . '            "nested": {'
              . '               "path": "parent",'
              . '               "filter": {'
              . '                  "range": {"parent.age": {"gte": 21}}'
              . '               },'
              . '               "nested": {'
              . '                  "path": "parent.child",'
              . '                  "filter": {'
              . '                     "match": {"parent.child.name": "matt"}'
              . '                  }'
              . '               }'
              . '            }'
              . '         }'
              . '      }'
              . '   ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ef0f4fa4272c47ff62fb7b422cf975e7
     * Line: 357
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL357_ef0f4fa4272c47ff62fb7b422cf975e7()
    {
        $client = $this->getClient();
        // tag::ef0f4fa4272c47ff62fb7b422cf975e7[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "sort" : [
        //         { "price" : {"missing" : "_last"} }
        //     ],
        //     "query" : {
        //         "term" : { "product" : "chocolate" }
        //     }
        // }
        // end::ef0f4fa4272c47ff62fb7b422cf975e7[]

        $curl = 'GET /_search'
              . '{'
              . '    "sort" : ['
              . '        { "price" : {"missing" : "_last"} }'
              . '    ],'
              . '    "query" : {'
              . '        "term" : { "product" : "chocolate" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  899eef71a67a1b2aa11a2166ec7f48f1
     * Line: 382
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL382_899eef71a67a1b2aa11a2166ec7f48f1()
    {
        $client = $this->getClient();
        // tag::899eef71a67a1b2aa11a2166ec7f48f1[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "sort" : [
        //         { "price" : {"unmapped_type" : "long"} }
        //     ],
        //     "query" : {
        //         "term" : { "product" : "chocolate" }
        //     }
        // }
        // end::899eef71a67a1b2aa11a2166ec7f48f1[]

        $curl = 'GET /_search'
              . '{'
              . '    "sort" : ['
              . '        { "price" : {"unmapped_type" : "long"} }'
              . '    ],'
              . '    "query" : {'
              . '        "term" : { "product" : "chocolate" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d17269bb80fb63ec0bf37d219e003dcb
     * Line: 405
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL405_d17269bb80fb63ec0bf37d219e003dcb()
    {
        $client = $this->getClient();
        // tag::d17269bb80fb63ec0bf37d219e003dcb[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "sort" : [
        //         {
        //             "_geo_distance" : {
        //                 "pin.location" : [-70, 40],
        //                 "order" : "asc",
        //                 "unit" : "km",
        //                 "mode" : "min",
        //                 "distance_type" : "arc",
        //                 "ignore_unmapped": true
        //             }
        //         }
        //     ],
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::d17269bb80fb63ec0bf37d219e003dcb[]

        $curl = 'GET /_search'
              . '{'
              . '    "sort" : ['
              . '        {'
              . '            "_geo_distance" : {'
              . '                "pin.location" : [-70, 40],'
              . '                "order" : "asc",'
              . '                "unit" : "km",'
              . '                "mode" : "min",'
              . '                "distance_type" : "arc",'
              . '                "ignore_unmapped": true'
              . '            }'
              . '        }'
              . '    ],'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  979d25dff2d8987119410291ad47b0d1
     * Line: 459
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL459_979d25dff2d8987119410291ad47b0d1()
    {
        $client = $this->getClient();
        // tag::979d25dff2d8987119410291ad47b0d1[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "sort" : [
        //         {
        //             "_geo_distance" : {
        //                 "pin.location" : {
        //                     "lat" : 40,
        //                     "lon" : -70
        //                 },
        //                 "order" : "asc",
        //                 "unit" : "km"
        //             }
        //         }
        //     ],
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::979d25dff2d8987119410291ad47b0d1[]

        $curl = 'GET /_search'
              . '{'
              . '    "sort" : ['
              . '        {'
              . '            "_geo_distance" : {'
              . '                "pin.location" : {'
              . '                    "lat" : 40,'
              . '                    "lon" : -70'
              . '                },'
              . '                "order" : "asc",'
              . '                "unit" : "km"'
              . '            }'
              . '        }'
              . '    ],'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d50a3c64890f88af32c6d4ef4899d82a
     * Line: 486
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL486_d50a3c64890f88af32c6d4ef4899d82a()
    {
        $client = $this->getClient();
        // tag::d50a3c64890f88af32c6d4ef4899d82a[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "sort" : [
        //         {
        //             "_geo_distance" : {
        //                 "pin.location" : "40,-70",
        //                 "order" : "asc",
        //                 "unit" : "km"
        //             }
        //         }
        //     ],
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::d50a3c64890f88af32c6d4ef4899d82a[]

        $curl = 'GET /_search'
              . '{'
              . '    "sort" : ['
              . '        {'
              . '            "_geo_distance" : {'
              . '                "pin.location" : "40,-70",'
              . '                "order" : "asc",'
              . '                "unit" : "km"'
              . '            }'
              . '        }'
              . '    ],'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a1db5c822745fe167e9ef854dca3d129
     * Line: 508
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL508_a1db5c822745fe167e9ef854dca3d129()
    {
        $client = $this->getClient();
        // tag::a1db5c822745fe167e9ef854dca3d129[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "sort" : [
        //         {
        //             "_geo_distance" : {
        //                 "pin.location" : "drm3btev3e86",
        //                 "order" : "asc",
        //                 "unit" : "km"
        //             }
        //         }
        //     ],
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::a1db5c822745fe167e9ef854dca3d129[]

        $curl = 'GET /_search'
              . '{'
              . '    "sort" : ['
              . '        {'
              . '            "_geo_distance" : {'
              . '                "pin.location" : "drm3btev3e86",'
              . '                "order" : "asc",'
              . '                "unit" : "km"'
              . '            }'
              . '        }'
              . '    ],'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  15dad5338065baaaa7d475abe85f4c22
     * Line: 533
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL533_15dad5338065baaaa7d475abe85f4c22()
    {
        $client = $this->getClient();
        // tag::15dad5338065baaaa7d475abe85f4c22[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "sort" : [
        //         {
        //             "_geo_distance" : {
        //                 "pin.location" : [-70, 40],
        //                 "order" : "asc",
        //                 "unit" : "km"
        //             }
        //         }
        //     ],
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::15dad5338065baaaa7d475abe85f4c22[]

        $curl = 'GET /_search'
              . '{'
              . '    "sort" : ['
              . '        {'
              . '            "_geo_distance" : {'
              . '                "pin.location" : [-70, 40],'
              . '                "order" : "asc",'
              . '                "unit" : "km"'
              . '            }'
              . '        }'
              . '    ],'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  77243bbf92f2a55e0fca6c2a349a1c15
     * Line: 558
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL558_77243bbf92f2a55e0fca6c2a349a1c15()
    {
        $client = $this->getClient();
        // tag::77243bbf92f2a55e0fca6c2a349a1c15[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "sort" : [
        //         {
        //             "_geo_distance" : {
        //                 "pin.location" : [[-70, 40], [-71, 42]],
        //                 "order" : "asc",
        //                 "unit" : "km"
        //             }
        //         }
        //     ],
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::77243bbf92f2a55e0fca6c2a349a1c15[]

        $curl = 'GET /_search'
              . '{'
              . '    "sort" : ['
              . '        {'
              . '            "_geo_distance" : {'
              . '                "pin.location" : [[-70, 40], [-71, 42]],'
              . '                "order" : "asc",'
              . '                "unit" : "km"'
              . '            }'
              . '        }'
              . '    ],'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  04fe1e3a0047b0cdb10987b79fc3f3f3
     * Line: 588
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL588_04fe1e3a0047b0cdb10987b79fc3f3f3()
    {
        $client = $this->getClient();
        // tag::04fe1e3a0047b0cdb10987b79fc3f3f3[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     },
        //     "sort" : {
        //         "_script" : {
        //             "type" : "number",
        //             "script" : {
        //                 "lang": "painless",
        //                 "source": "doc[\'field_name\'].value * params.factor",
        //                 "params" : {
        //                     "factor" : 1.1
        //                 }
        //             },
        //             "order" : "asc"
        //         }
        //     }
        // }
        // end::04fe1e3a0047b0cdb10987b79fc3f3f3[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    },'
              . '    "sort" : {'
              . '        "_script" : {'
              . '            "type" : "number",'
              . '            "script" : {'
              . '                "lang": "painless",'
              . '                "source": "doc[\'field_name\'].value * params.factor",'
              . '                "params" : {'
              . '                    "factor" : 1.1'
              . '                }'
              . '            },'
              . '            "order" : "asc"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e8e451bc8c45bcf16df43804c4fc8329
     * Line: 618
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL618_e8e451bc8c45bcf16df43804c4fc8329()
    {
        $client = $this->getClient();
        // tag::e8e451bc8c45bcf16df43804c4fc8329[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "track_scores": true,
        //     "sort" : [
        //         { "post_date" : {"order" : "desc"} },
        //         { "name" : "desc" },
        //         { "age" : "desc" }
        //     ],
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::e8e451bc8c45bcf16df43804c4fc8329[]

        $curl = 'GET /_search'
              . '{'
              . '    "track_scores": true,'
              . '    "sort" : ['
              . '        { "post_date" : {"order" : "desc"} },'
              . '        { "name" : "desc" },'
              . '        { "age" : "desc" }'
              . '    ],'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






















}
