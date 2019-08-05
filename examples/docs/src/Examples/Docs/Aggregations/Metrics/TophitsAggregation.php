<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Metrics;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: TophitsAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/metrics/tophits-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class TophitsAggregation extends SimpleExamplesTester {

    /**
     * Tag:  12b4b34f9958ed157ac2d812d612cda6
     * Line: 36
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL36_12b4b34f9958ed157ac2d812d612cda6()
    {
        $client = $this->getClient();
        // tag::12b4b34f9958ed157ac2d812d612cda6[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs": {
        //         "top_tags": {
        //             "terms": {
        //                 "field": "type",
        //                 "size": 3
        //             },
        //             "aggs": {
        //                 "top_sales_hits": {
        //                     "top_hits": {
        //                         "sort": [
        //                             {
        //                                 "date": {
        //                                     "order": "desc"
        //                                 }
        //                             }
        //                         ],
        //                         "_source": {
        //                             "includes": [ "date", "price" ]
        //                         },
        //                         "size" : 1
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::12b4b34f9958ed157ac2d812d612cda6[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs": {'
              . '        "top_tags": {'
              . '            "terms": {'
              . '                "field": "type",'
              . '                "size": 3'
              . '            },'
              . '            "aggs": {'
              . '                "top_sales_hits": {'
              . '                    "top_hits": {'
              . '                        "sort": ['
              . '                            {'
              . '                                "date": {'
              . '                                    "order": "desc"'
              . '                                }'
              . '                            }'
              . '                        ],'
              . '                        "_source": {'
              . '                            "includes": [ "date", "price" ]'
              . '                        },'
              . '                        "size" : 1'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  30db2702dd0071c72a090b8311d0db09
     * Line: 189
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL189_30db2702dd0071c72a090b8311d0db09()
    {
        $client = $this->getClient();
        // tag::30db2702dd0071c72a090b8311d0db09[]
        // TODO -- Implement Example
        // POST /sales/_search
        // {
        //   "query": {
        //     "match": {
        //       "body": "elections"
        //     }
        //   },
        //   "aggs": {
        //     "top_sites": {
        //       "terms": {
        //         "field": "domain",
        //         "order": {
        //           "top_hit": "desc"
        //         }
        //       },
        //       "aggs": {
        //         "top_tags_hits": {
        //           "top_hits": {}
        //         },
        //         "top_hit" : {
        //           "max": {
        //             "script": {
        //               "source": "_score"
        //             }
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::30db2702dd0071c72a090b8311d0db09[]

        $curl = 'POST /sales/_search'
              . '{'
              . '  "query": {'
              . '    "match": {'
              . '      "body": "elections"'
              . '    }'
              . '  },'
              . '  "aggs": {'
              . '    "top_sites": {'
              . '      "terms": {'
              . '        "field": "domain",'
              . '        "order": {'
              . '          "top_hit": "desc"'
              . '        }'
              . '      },'
              . '      "aggs": {'
              . '        "top_tags_hits": {'
              . '          "top_hits": {}'
              . '        },'
              . '        "top_hit" : {'
              . '          "max": {'
              . '            "script": {'
              . '              "source": "_score"'
              . '            }'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2720c5e463876c415419c426697d15e4
     * Line: 243
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL243_2720c5e463876c415419c426697d15e4()
    {
        $client = $this->getClient();
        // tag::2720c5e463876c415419c426697d15e4[]
        // TODO -- Implement Example
        // PUT /sales
        // {
        //     "mappings": {
        //         "properties" : {
        //             "tags" : { "type" : "keyword" },
        //             "comments" : { \<1>
        //                 "type" : "nested",
        //                 "properties" : {
        //                     "username" : { "type" : "keyword" },
        //                     "comment" : { "type" : "text" }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::2720c5e463876c415419c426697d15e4[]

        $curl = 'PUT /sales'
              . '{'
              . '    "mappings": {'
              . '        "properties" : {'
              . '            "tags" : { "type" : "keyword" },'
              . '            "comments" : { \<1>'
              . '                "type" : "nested",'
              . '                "properties" : {'
              . '                    "username" : { "type" : "keyword" },'
              . '                    "comment" : { "type" : "text" }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6ac67f7e30219d85fcc68b99459a39a4
     * Line: 266
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL266_6ac67f7e30219d85fcc68b99459a39a4()
    {
        $client = $this->getClient();
        // tag::6ac67f7e30219d85fcc68b99459a39a4[]
        // TODO -- Implement Example
        // PUT /sales/_doc/1?refresh
        // {
        //     "tags": ["car", "auto"],
        //     "comments": [
        //         {"username": "baddriver007", "comment": "This car could have better brakes"},
        //         {"username": "dr_who", "comment": "Where's the autopilot? Can't find it"},
        //         {"username": "ilovemotorbikes", "comment": "This car has two extra wheels"}
        //     ]
        // }
        // end::6ac67f7e30219d85fcc68b99459a39a4[]

        $curl = 'PUT /sales/_doc/1?refresh'
              . '{'
              . '    "tags": ["car", "auto"],'
              . '    "comments": ['
              . '        {"username": "baddriver007", "comment": "This car could have better brakes"},'
              . '        {"username": "dr_who", "comment": "Where's the autopilot? Can't find it"},'
              . '        {"username": "ilovemotorbikes", "comment": "This car has two extra wheels"}'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f1b8612151a660264fb62dc6c74b19be
     * Line: 283
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL283_f1b8612151a660264fb62dc6c74b19be()
    {
        $client = $this->getClient();
        // tag::f1b8612151a660264fb62dc6c74b19be[]
        // TODO -- Implement Example
        // POST /sales/_search
        // {
        //     "query": {
        //         "term": { "tags": "car" }
        //     },
        //     "aggs": {
        //         "by_sale": {
        //             "nested" : {
        //                 "path" : "comments"
        //             },
        //             "aggs": {
        //                 "by_user": {
        //                     "terms": {
        //                         "field": "comments.username",
        //                         "size": 1
        //                     },
        //                     "aggs": {
        //                         "by_nested": {
        //                             "top_hits":{}
        //                         }
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::f1b8612151a660264fb62dc6c74b19be[]

        $curl = 'POST /sales/_search'
              . '{'
              . '    "query": {'
              . '        "term": { "tags": "car" }'
              . '    },'
              . '    "aggs": {'
              . '        "by_sale": {'
              . '            "nested" : {'
              . '                "path" : "comments"'
              . '            },'
              . '            "aggs": {'
              . '                "by_user": {'
              . '                    "terms": {'
              . '                        "field": "comments.username",'
              . '                        "size": 1'
              . '                    },'
              . '                    "aggs": {'
              . '                        "by_nested": {'
              . '                            "top_hits":{}'
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
