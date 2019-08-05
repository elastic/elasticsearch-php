<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DistanceFeatureQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/distance-feature-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DistanceFeatureQuery extends SimpleExamplesTester {

    /**
     * Tag:  b81a7b5f5ef19553f9cd49196f31018c
     * Line: 37
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL37_b81a7b5f5ef19553f9cd49196f31018c()
    {
        $client = $this->getClient();
        // tag::b81a7b5f5ef19553f9cd49196f31018c[]
        // TODO -- Implement Example
        // PUT /items
        // {
        //   "mappings": {
        //     "properties": {
        //       "name": {
        //         "type": "keyword"
        //       },
        //       "production_date": {
        //         "type": "date"
        //       },
        //       "location": {
        //         "type": "geo_point"
        //       }
        //     }
        //   }
        // }
        // end::b81a7b5f5ef19553f9cd49196f31018c[]

        $curl = 'PUT /items'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "name": {'
              . '        "type": "keyword"'
              . '      },'
              . '      "production_date": {'
              . '        "type": "date"'
              . '      },'
              . '      "location": {'
              . '        "type": "geo_point"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b0d3f839237fabf8cdc2221734c668ad
     * Line: 63
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL63_b0d3f839237fabf8cdc2221734c668ad()
    {
        $client = $this->getClient();
        // tag::b0d3f839237fabf8cdc2221734c668ad[]
        // TODO -- Implement Example
        // PUT /items/_doc/1?refresh
        // {
        //   "name" : "chocolate",
        //   "production_date": "2018-02-01",
        //   "location": [-71.34, 41.12]
        // }
        // PUT /items/_doc/2?refresh
        // {
        //   "name" : "chocolate",
        //   "production_date": "2018-01-01",
        //   "location": [-71.3, 41.15]
        // }
        // PUT /items/_doc/3?refresh
        // {
        //   "name" : "chocolate",
        //   "production_date": "2017-12-01",
        //   "location": [-71.3, 41.12]
        // }
        // end::b0d3f839237fabf8cdc2221734c668ad[]

        $curl = 'PUT /items/_doc/1?refresh'
              . '{'
              . '  "name" : "chocolate",'
              . '  "production_date": "2018-02-01",'
              . '  "location": [-71.34, 41.12]'
              . '}'
              . 'PUT /items/_doc/2?refresh'
              . '{'
              . '  "name" : "chocolate",'
              . '  "production_date": "2018-01-01",'
              . '  "location": [-71.3, 41.15]'
              . '}'
              . 'PUT /items/_doc/3?refresh'
              . '{'
              . '  "name" : "chocolate",'
              . '  "production_date": "2017-12-01",'
              . '  "location": [-71.3, 41.12]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1e2c5cef7a3f254c71a33865eb4d7569
     * Line: 100
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL100_1e2c5cef7a3f254c71a33865eb4d7569()
    {
        $client = $this->getClient();
        // tag::1e2c5cef7a3f254c71a33865eb4d7569[]
        // TODO -- Implement Example
        // GET /items/_search
        // {
        //   "query": {
        //     "bool": {
        //       "must": {
        //         "match": {
        //           "name": "chocolate"
        //         }
        //       },
        //       "should": {
        //         "distance_feature": {
        //           "field": "production_date",
        //           "pivot": "7d",
        //           "origin": "now"
        //         }
        //       }
        //     }
        //   }
        // }
        // end::1e2c5cef7a3f254c71a33865eb4d7569[]

        $curl = 'GET /items/_search'
              . '{'
              . '  "query": {'
              . '    "bool": {'
              . '      "must": {'
              . '        "match": {'
              . '          "name": "chocolate"'
              . '        }'
              . '      },'
              . '      "should": {'
              . '        "distance_feature": {'
              . '          "field": "production_date",'
              . '          "pivot": "7d",'
              . '          "origin": "now"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  57a3e8d2ca64e37e90d658c4cd935399
     * Line: 130
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL130_57a3e8d2ca64e37e90d658c4cd935399()
    {
        $client = $this->getClient();
        // tag::57a3e8d2ca64e37e90d658c4cd935399[]
        // TODO -- Implement Example
        // GET /items/_search
        // {
        //   "query": {
        //     "bool": {
        //       "must": {
        //         "match": {
        //           "name": "chocolate"
        //         }
        //       },
        //       "should": {
        //         "distance_feature": {
        //           "field": "location",
        //           "pivot": "1000m",
        //           "origin": [-71.3, 41.15]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::57a3e8d2ca64e37e90d658c4cd935399[]

        $curl = 'GET /items/_search'
              . '{'
              . '  "query": {'
              . '    "bool": {'
              . '      "must": {'
              . '        "match": {'
              . '          "name": "chocolate"'
              . '        }'
              . '      },'
              . '      "should": {'
              . '        "distance_feature": {'
              . '          "field": "location",'
              . '          "pivot": "1000m",'
              . '          "origin": [-71.3, 41.15]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
