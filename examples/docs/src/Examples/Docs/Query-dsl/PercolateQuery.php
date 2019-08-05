<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PercolateQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/percolate-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PercolateQuery extends SimpleExamplesTester {

    /**
     * Tag:  e79bff3fe9fe9d8732e0b034f17a03c5
     * Line: 18
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL18_e79bff3fe9fe9d8732e0b034f17a03c5()
    {
        $client = $this->getClient();
        // tag::e79bff3fe9fe9d8732e0b034f17a03c5[]
        // TODO -- Implement Example
        // PUT /my-index
        // {
        //     "mappings": {
        //         "properties": {
        //              "message": {
        //                  "type": "text"
        //              },
        //              "query": {
        //                  "type": "percolator"
        //              }
        //         }
        //     }
        // }
        // end::e79bff3fe9fe9d8732e0b034f17a03c5[]

        $curl = 'PUT /my-index'
              . '{'
              . '    "mappings": {'
              . '        "properties": {'
              . '             "message": {'
              . '                 "type": "text"'
              . '             },'
              . '             "query": {'
              . '                 "type": "percolator"'
              . '             }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  25843127c07257bf09154920779d3055
     * Line: 47
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL47_25843127c07257bf09154920779d3055()
    {
        $client = $this->getClient();
        // tag::25843127c07257bf09154920779d3055[]
        // TODO -- Implement Example
        // PUT /my-index/_doc/1?refresh
        // {
        //     "query" : {
        //         "match" : {
        //             "message" : "bonsai tree"
        //         }
        //     }
        // }
        // end::25843127c07257bf09154920779d3055[]

        $curl = 'PUT /my-index/_doc/1?refresh'
              . '{'
              . '    "query" : {'
              . '        "match" : {'
              . '            "message" : "bonsai tree"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4ef2837148b6b23e2eb0a11d14ccae80
     * Line: 63
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL63_4ef2837148b6b23e2eb0a11d14ccae80()
    {
        $client = $this->getClient();
        // tag::4ef2837148b6b23e2eb0a11d14ccae80[]
        // TODO -- Implement Example
        // GET /my-index/_search
        // {
        //     "query" : {
        //         "percolate" : {
        //             "field" : "query",
        //             "document" : {
        //                 "message" : "A new bonsai tree in the office"
        //             }
        //         }
        //     }
        // }
        // end::4ef2837148b6b23e2eb0a11d14ccae80[]

        $curl = 'GET /my-index/_search'
              . '{'
              . '    "query" : {'
              . '        "percolate" : {'
              . '            "field" : "query",'
              . '            "document" : {'
              . '                "message" : "A new bonsai tree in the office"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4e4e6a2e173cc20c00cca1a06166a687
     * Line: 162
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL162_4e4e6a2e173cc20c00cca1a06166a687()
    {
        $client = $this->getClient();
        // tag::4e4e6a2e173cc20c00cca1a06166a687[]
        // TODO -- Implement Example
        // GET /my-index/_search
        // {
        //     "query" : {
        //         "constant_score": {
        //             "filter": {
        //                 "percolate" : {
        //                     "field" : "query",
        //                     "document" : {
        //                         "message" : "A new bonsai tree in the office"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::4e4e6a2e173cc20c00cca1a06166a687[]

        $curl = 'GET /my-index/_search'
              . '{'
              . '    "query" : {'
              . '        "constant_score": {'
              . '            "filter": {'
              . '                "percolate" : {'
              . '                    "field" : "query",'
              . '                    "document" : {'
              . '                        "message" : "A new bonsai tree in the office"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2d417d4eea299b45f384af7303252611
     * Line: 203
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL203_2d417d4eea299b45f384af7303252611()
    {
        $client = $this->getClient();
        // tag::2d417d4eea299b45f384af7303252611[]
        // TODO -- Implement Example
        // GET /my-index/_search
        // {
        //     "query" : {
        //         "percolate" : {
        //             "field" : "query",
        //             "documents" : [ \<1>
        //                 {
        //                     "message" : "bonsai tree"
        //                 },
        //                 {
        //                     "message" : "new tree"
        //                 },
        //                 {
        //                     "message" : "the office"
        //                 },
        //                 {
        //                     "message" : "office tree"
        //                 }
        //             ]
        //         }
        //     }
        // }
        // end::2d417d4eea299b45f384af7303252611[]

        $curl = 'GET /my-index/_search'
              . '{'
              . '    "query" : {'
              . '        "percolate" : {'
              . '            "field" : "query",'
              . '            "documents" : [ \<1>'
              . '                {'
              . '                    "message" : "bonsai tree"'
              . '                },'
              . '                {'
              . '                    "message" : "new tree"'
              . '                },'
              . '                {'
              . '                    "message" : "the office"'
              . '                },'
              . '                {'
              . '                    "message" : "office tree"'
              . '                }'
              . '            ]'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  fe0b180951e143d4c624d9fbf677b884
     * Line: 290
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL290_fe0b180951e143d4c624d9fbf677b884()
    {
        $client = $this->getClient();
        // tag::fe0b180951e143d4c624d9fbf677b884[]
        // TODO -- Implement Example
        // PUT /my-index/_doc/2
        // {
        //   "message" : "A new bonsai tree in the office"
        // }
        // end::fe0b180951e143d4c624d9fbf677b884[]

        $curl = 'PUT /my-index/_doc/2'
              . '{'
              . '  "message" : "A new bonsai tree in the office"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6736f6e4e04379918a21e7c223c08cf9
     * Line: 322
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL322_6736f6e4e04379918a21e7c223c08cf9()
    {
        $client = $this->getClient();
        // tag::6736f6e4e04379918a21e7c223c08cf9[]
        // TODO -- Implement Example
        // GET /my-index/_search
        // {
        //     "query" : {
        //         "percolate" : {
        //             "field": "query",
        //             "index" : "my-index",
        //             "id" : "2",
        //             "version" : 1 \<1>
        //         }
        //     }
        // }
        // end::6736f6e4e04379918a21e7c223c08cf9[]

        $curl = 'GET /my-index/_search'
              . '{'
              . '    "query" : {'
              . '        "percolate" : {'
              . '            "field": "query",'
              . '            "index" : "my-index",'
              . '            "id" : "2",'
              . '            "version" : 1 \<1>'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f33cfd0350f5f474362aa6f2e03f734f
     * Line: 359
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL359_f33cfd0350f5f474362aa6f2e03f734f()
    {
        $client = $this->getClient();
        // tag::f33cfd0350f5f474362aa6f2e03f734f[]
        // TODO -- Implement Example
        // PUT /my-index/_doc/3?refresh
        // {
        //     "query" : {
        //         "match" : {
        //             "message" : "brown fox"
        //         }
        //     }
        // }
        // end::f33cfd0350f5f474362aa6f2e03f734f[]

        $curl = 'PUT /my-index/_doc/3?refresh'
              . '{'
              . '    "query" : {'
              . '        "match" : {'
              . '            "message" : "brown fox"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1ae1587dfc299b9f3f57d3da0dbc9a3b
     * Line: 375
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL375_1ae1587dfc299b9f3f57d3da0dbc9a3b()
    {
        $client = $this->getClient();
        // tag::1ae1587dfc299b9f3f57d3da0dbc9a3b[]
        // TODO -- Implement Example
        // PUT /my-index/_doc/4?refresh
        // {
        //     "query" : {
        //         "match" : {
        //             "message" : "lazy dog"
        //         }
        //     }
        // }
        // end::1ae1587dfc299b9f3f57d3da0dbc9a3b[]

        $curl = 'PUT /my-index/_doc/4?refresh'
              . '{'
              . '    "query" : {'
              . '        "match" : {'
              . '            "message" : "lazy dog"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a8852f083978b748b93b87ff7fa7b15b
     * Line: 391
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL391_a8852f083978b748b93b87ff7fa7b15b()
    {
        $client = $this->getClient();
        // tag::a8852f083978b748b93b87ff7fa7b15b[]
        // TODO -- Implement Example
        // GET /my-index/_search
        // {
        //     "query" : {
        //         "percolate" : {
        //             "field": "query",
        //             "document" : {
        //                 "message" : "The quick brown fox jumps over the lazy dog"
        //             }
        //         }
        //     },
        //     "highlight": {
        //       "fields": {
        //         "message": {}
        //       }
        //     }
        // }
        // end::a8852f083978b748b93b87ff7fa7b15b[]

        $curl = 'GET /my-index/_search'
              . '{'
              . '    "query" : {'
              . '        "percolate" : {'
              . '            "field": "query",'
              . '            "document" : {'
              . '                "message" : "The quick brown fox jumps over the lazy dog"'
              . '            }'
              . '        }'
              . '    },'
              . '    "highlight": {'
              . '      "fields": {'
              . '        "message": {}'
              . '      }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3bbf150f4ae5c8e53beb6d6ae6f07775
     * Line: 488
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL488_3bbf150f4ae5c8e53beb6d6ae6f07775()
    {
        $client = $this->getClient();
        // tag::3bbf150f4ae5c8e53beb6d6ae6f07775[]
        // TODO -- Implement Example
        // GET /my-index/_search
        // {
        //     "query" : {
        //         "percolate" : {
        //             "field": "query",
        //             "documents" : [
        //                 {
        //                     "message" : "bonsai tree"
        //                 },
        //                 {
        //                     "message" : "new tree"
        //                 },
        //                 {
        //                     "message" : "the office"
        //                 },
        //                 {
        //                     "message" : "office tree"
        //                 }
        //             ]
        //         }
        //     },
        //     "highlight": {
        //       "fields": {
        //         "message": {}
        //       }
        //     }
        // }
        // end::3bbf150f4ae5c8e53beb6d6ae6f07775[]

        $curl = 'GET /my-index/_search'
              . '{'
              . '    "query" : {'
              . '        "percolate" : {'
              . '            "field": "query",'
              . '            "documents" : ['
              . '                {'
              . '                    "message" : "bonsai tree"'
              . '                },'
              . '                {'
              . '                    "message" : "new tree"'
              . '                },'
              . '                {'
              . '                    "message" : "the office"'
              . '                },'
              . '                {'
              . '                    "message" : "office tree"'
              . '                }'
              . '            ]'
              . '        }'
              . '    },'
              . '    "highlight": {'
              . '      "fields": {'
              . '        "message": {}'
              . '      }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6163e92fa93136a1907f820e8d57db45
     * Line: 582
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL582_6163e92fa93136a1907f820e8d57db45()
    {
        $client = $this->getClient();
        // tag::6163e92fa93136a1907f820e8d57db45[]
        // TODO -- Implement Example
        // GET /my-index/_search
        // {
        //     "query" : {
        //         "bool" : {
        //             "should" : [
        //                 {
        //                     "percolate" : {
        //                         "field" : "query",
        //                         "document" : {
        //                             "message" : "bonsai tree"
        //                         },
        //                         "name": "query1" \<1>
        //                     }
        //                 },
        //                 {
        //                     "percolate" : {
        //                         "field" : "query",
        //                         "document" : {
        //                             "message" : "tulip flower"
        //                         },
        //                         "name": "query2" \<1>
        //                     }
        //                 }
        //             ]
        //         }
        //     }
        // }
        // end::6163e92fa93136a1907f820e8d57db45[]

        $curl = 'GET /my-index/_search'
              . '{'
              . '    "query" : {'
              . '        "bool" : {'
              . '            "should" : ['
              . '                {'
              . '                    "percolate" : {'
              . '                        "field" : "query",'
              . '                        "document" : {'
              . '                            "message" : "bonsai tree"'
              . '                        },'
              . '                        "name": "query1" \<1>'
              . '                    }'
              . '                },'
              . '                {'
              . '                    "percolate" : {'
              . '                        "field" : "query",'
              . '                        "document" : {'
              . '                            "message" : "tulip flower"'
              . '                        },'
              . '                        "name": "query2" \<1>'
              . '                    }'
              . '                }'
              . '            ]'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9501e6c8e95c21838653ea15b9b7ed5f
     * Line: 688
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL688_9501e6c8e95c21838653ea15b9b7ed5f()
    {
        $client = $this->getClient();
        // tag::9501e6c8e95c21838653ea15b9b7ed5f[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //   "query": {
        //     "term" : {
        //       "query.extraction_result" : "failed"
        //     }
        //   }
        // }
        // end::9501e6c8e95c21838653ea15b9b7ed5f[]

        $curl = 'GET /_search'
              . '{'
              . '  "query": {'
              . '    "term" : {'
              . '      "query.extraction_result" : "failed"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%














}
