<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Suggesters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ContextSuggest
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   search/suggesters/context-suggest.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ContextSuggest extends SimpleExamplesTester {

    /**
     * Tag:  46b3154afd9a05f1aadd726efdd9cf98
     * Line: 25
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL25_46b3154afd9a05f1aadd726efdd9cf98()
    {
        $client = $this->getClient();
        // tag::46b3154afd9a05f1aadd726efdd9cf98[]
        // TODO -- Implement Example
        // PUT place
        // {
        //     "mappings": {
        //         "properties" : {
        //             "suggest" : {
        //                 "type" : "completion",
        //                 "contexts": [
        //                     { \<1>
        //                         "name": "place_type",
        //                         "type": "category"
        //                     },
        //                     { \<2>
        //                         "name": "location",
        //                         "type": "geo",
        //                         "precision": 4
        //                     }
        //                 ]
        //             }
        //         }
        //     }
        // }
        // PUT place_path_category
        // {
        //     "mappings": {
        //         "properties" : {
        //             "suggest" : {
        //                 "type" : "completion",
        //                 "contexts": [
        //                     { \<3>
        //                         "name": "place_type",
        //                         "type": "category",
        //                         "path": "cat"
        //                     },
        //                     { \<4>
        //                         "name": "location",
        //                         "type": "geo",
        //                         "precision": 4,
        //                         "path": "loc"
        //                     }
        //                 ]
        //             },
        //             "loc": {
        //                 "type": "geo_point"
        //             }
        //         }
        //     }
        // }
        // end::46b3154afd9a05f1aadd726efdd9cf98[]

        $curl = 'PUT place'
              . '{'
              . '    "mappings": {'
              . '        "properties" : {'
              . '            "suggest" : {'
              . '                "type" : "completion",'
              . '                "contexts": ['
              . '                    { \<1>'
              . '                        "name": "place_type",'
              . '                        "type": "category"'
              . '                    },'
              . '                    { \<2>'
              . '                        "name": "location",'
              . '                        "type": "geo",'
              . '                        "precision": 4'
              . '                    }'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}'
              . 'PUT place_path_category'
              . '{'
              . '    "mappings": {'
              . '        "properties" : {'
              . '            "suggest" : {'
              . '                "type" : "completion",'
              . '                "contexts": ['
              . '                    { \<3>'
              . '                        "name": "place_type",'
              . '                        "type": "category",'
              . '                        "path": "cat"'
              . '                    },'
              . '                    { \<4>'
              . '                        "name": "location",'
              . '                        "type": "geo",'
              . '                        "precision": 4,'
              . '                        "path": "loc"'
              . '                    }'
              . '                ]'
              . '            },'
              . '            "loc": {'
              . '                "type": "geo_point"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2e59a0f8721e27dd537566f4af7a568f
     * Line: 100
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL100_2e59a0f8721e27dd537566f4af7a568f()
    {
        $client = $this->getClient();
        // tag::2e59a0f8721e27dd537566f4af7a568f[]
        // TODO -- Implement Example
        // PUT place/_doc/1
        // {
        //     "suggest": {
        //         "input": ["timmy's", "starbucks", "dunkin donuts"],
        //         "contexts": {
        //             "place_type": ["cafe", "food"] \<1>
        //         }
        //     }
        // }
        // end::2e59a0f8721e27dd537566f4af7a568f[]

        $curl = 'PUT place/_doc/1'
              . '{'
              . '    "suggest": {'
              . '        "input": ["timmy's", "starbucks", "dunkin donuts"],'
              . '        "contexts": {'
              . '            "place_type": ["cafe", "food"] \<1>'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d2a53c6c16ff2305830f64a3efd5f61d
     * Line: 118
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL118_d2a53c6c16ff2305830f64a3efd5f61d()
    {
        $client = $this->getClient();
        // tag::d2a53c6c16ff2305830f64a3efd5f61d[]
        // TODO -- Implement Example
        // PUT place_path_category/_doc/1
        // {
        //     "suggest": ["timmy's", "starbucks", "dunkin donuts"],
        //     "cat": ["cafe", "food"] \<1>
        // }
        // end::d2a53c6c16ff2305830f64a3efd5f61d[]

        $curl = 'PUT place_path_category/_doc/1'
              . '{'
              . '    "suggest": ["timmy's", "starbucks", "dunkin donuts"],'
              . '    "cat": ["cafe", "food"] \<1>'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8c3e9da5f412261477c032b33f36a3e9
     * Line: 140
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL140_8c3e9da5f412261477c032b33f36a3e9()
    {
        $client = $this->getClient();
        // tag::8c3e9da5f412261477c032b33f36a3e9[]
        // TODO -- Implement Example
        // POST place/_search?pretty
        // {
        //     "suggest": {
        //         "place_suggestion" : {
        //             "prefix" : "tim",
        //             "completion" : {
        //                 "field" : "suggest",
        //                 "size": 10,
        //                 "contexts": {
        //                     "place_type": [ "cafe", "restaurants" ]
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::8c3e9da5f412261477c032b33f36a3e9[]

        $curl = 'POST place/_search?pretty'
              . '{'
              . '    "suggest": {'
              . '        "place_suggestion" : {'
              . '            "prefix" : "tim",'
              . '            "completion" : {'
              . '                "field" : "suggest",'
              . '                "size": 10,'
              . '                "contexts": {'
              . '                    "place_type": [ "cafe", "restaurants" ]'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8ac73762800c9db1ae418bfc0bcfa65a
     * Line: 169
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL169_8ac73762800c9db1ae418bfc0bcfa65a()
    {
        $client = $this->getClient();
        // tag::8ac73762800c9db1ae418bfc0bcfa65a[]
        // TODO -- Implement Example
        // POST place/_search?pretty
        // {
        //     "suggest": {
        //         "place_suggestion" : {
        //             "prefix" : "tim",
        //             "completion" : {
        //                 "field" : "suggest",
        //                 "size": 10,
        //                 "contexts": {
        //                     "place_type": [ \<1>
        //                         { "context" : "cafe" },
        //                         { "context" : "restaurants", "boost": 2 }
        //                      ]
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::8ac73762800c9db1ae418bfc0bcfa65a[]

        $curl = 'POST place/_search?pretty'
              . '{'
              . '    "suggest": {'
              . '        "place_suggestion" : {'
              . '            "prefix" : "tim",'
              . '            "completion" : {'
              . '                "field" : "suggest",'
              . '                "size": 10,'
              . '                "contexts": {'
              . '                    "place_type": [ \<1>'
              . '                        { "context" : "cafe" },'
              . '                        { "context" : "restaurants", "boost": 2 }'
              . '                     ]'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  182162241e42f16f5860ea26fdc52c7e
     * Line: 254
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL254_182162241e42f16f5860ea26fdc52c7e()
    {
        $client = $this->getClient();
        // tag::182162241e42f16f5860ea26fdc52c7e[]
        // TODO -- Implement Example
        // PUT place/_doc/1
        // {
        //     "suggest": {
        //         "input": "timmy's",
        //         "contexts": {
        //             "location": [
        //                 {
        //                     "lat": 43.6624803,
        //                     "lon": -79.3863353
        //                 },
        //                 {
        //                     "lat": 43.6624718,
        //                     "lon": -79.3873227
        //                 }
        //             ]
        //         }
        //     }
        // }
        // end::182162241e42f16f5860ea26fdc52c7e[]

        $curl = 'PUT place/_doc/1'
              . '{'
              . '    "suggest": {'
              . '        "input": "timmy's",'
              . '        "contexts": {'
              . '            "location": ['
              . '                {'
              . '                    "lat": 43.6624803,'
              . '                    "lon": -79.3863353'
              . '                },'
              . '                {'
              . '                    "lat": 43.6624718,'
              . '                    "lon": -79.3873227'
              . '                }'
              . '            ]'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  bc79a8936474faf7de6d3c9872678176
     * Line: 284
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL284_bc79a8936474faf7de6d3c9872678176()
    {
        $client = $this->getClient();
        // tag::bc79a8936474faf7de6d3c9872678176[]
        // TODO -- Implement Example
        // POST place/_search
        // {
        //     "suggest": {
        //         "place_suggestion" : {
        //             "prefix" : "tim",
        //             "completion" : {
        //                 "field" : "suggest",
        //                 "size": 10,
        //                 "contexts": {
        //                     "location": {
        //                         "lat": 43.662,
        //                         "lon": -79.380
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::bc79a8936474faf7de6d3c9872678176[]

        $curl = 'POST place/_search'
              . '{'
              . '    "suggest": {'
              . '        "place_suggestion" : {'
              . '            "prefix" : "tim",'
              . '            "completion" : {'
              . '                "field" : "suggest",'
              . '                "size": 10,'
              . '                "contexts": {'
              . '                    "location": {'
              . '                        "lat": 43.662,'
              . '                        "lon": -79.380'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  837c765a38fa0fd5f01b1559138469be
     * Line: 318
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL318_837c765a38fa0fd5f01b1559138469be()
    {
        $client = $this->getClient();
        // tag::837c765a38fa0fd5f01b1559138469be[]
        // TODO -- Implement Example
        // POST place/_search?pretty
        // {
        //     "suggest": {
        //         "place_suggestion" : {
        //             "prefix" : "tim",
        //             "completion" : {
        //                 "field" : "suggest",
        //                 "size": 10,
        //                 "contexts": {
        //                     "location": [ \<1>
        //                         {
        //                             "lat": 43.6624803,
        //                             "lon": -79.3863353,
        //                             "precision": 2
        //                         },
        //                         {
        //                             "context": {
        //                                 "lat": 43.6624803,
        //                                 "lon": -79.3863353
        //                             },
        //                             "boost": 2
        //                         }
        //                      ]
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::837c765a38fa0fd5f01b1559138469be[]

        $curl = 'POST place/_search?pretty'
              . '{'
              . '    "suggest": {'
              . '        "place_suggestion" : {'
              . '            "prefix" : "tim",'
              . '            "completion" : {'
              . '                "field" : "suggest",'
              . '                "size": 10,'
              . '                "contexts": {'
              . '                    "location": [ \<1>'
              . '                        {'
              . '                            "lat": 43.6624803,'
              . '                            "lon": -79.3863353,'
              . '                            "precision": 2'
              . '                        },'
              . '                        {'
              . '                            "context": {'
              . '                                "lat": 43.6624803,'
              . '                                "lon": -79.3863353'
              . '                            },'
              . '                            "boost": 2'
              . '                        }'
              . '                     ]'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%









}
