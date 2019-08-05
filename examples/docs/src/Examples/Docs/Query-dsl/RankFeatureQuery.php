<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: RankFeatureQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/rank-feature-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class RankFeatureQuery extends SimpleExamplesTester {

    /**
     * Tag:  e2750d69bcb6d4c7e16e704cd0fb3530
     * Line: 57
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL57_e2750d69bcb6d4c7e16e704cd0fb3530()
    {
        $client = $this->getClient();
        // tag::e2750d69bcb6d4c7e16e704cd0fb3530[]
        // TODO -- Implement Example
        // PUT /test
        // {
        //   "mappings": {
        //     "properties": {
        //       "pagerank": {
        //         "type": "rank_feature"
        //       },
        //       "url_length": {
        //         "type": "rank_feature",
        //         "positive_score_impact": false
        //       },
        //       "topics": {
        //         "type": "rank_features"
        //       }
        //     }
        //   }
        // }
        // end::e2750d69bcb6d4c7e16e704cd0fb3530[]

        $curl = 'PUT /test'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "pagerank": {'
              . '        "type": "rank_feature"'
              . '      },'
              . '      "url_length": {'
              . '        "type": "rank_feature",'
              . '        "positive_score_impact": false'
              . '      },'
              . '      "topics": {'
              . '        "type": "rank_features"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c786505cf972dd41bd0cbb6ebcf939e9
     * Line: 83
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL83_c786505cf972dd41bd0cbb6ebcf939e9()
    {
        $client = $this->getClient();
        // tag::c786505cf972dd41bd0cbb6ebcf939e9[]
        // TODO -- Implement Example
        // PUT /test/_doc/1?refresh
        // {
        //   "url": "http://en.wikipedia.org/wiki/2016_Summer_Olympics",
        //   "content": "Rio 2016",
        //   "pagerank": 50.3,
        //   "url_length": 42,
        //   "topics": {
        //     "sports": 50,
        //     "brazil": 30
        //   }
        // }
        // PUT /test/_doc/2?refresh
        // {
        //   "url": "http://en.wikipedia.org/wiki/2016_Brazilian_Grand_Prix",
        //   "content": "Formula One motor race held on 13 November 2016",
        //   "pagerank": 50.3,
        //   "url_length": 47,
        //   "topics": {
        //     "sports": 35,
        //     "formula one": 65,
        //     "brazil": 20
        //   }
        // }
        // PUT /test/_doc/3?refresh
        // {
        //   "url": "http://en.wikipedia.org/wiki/Deadpool_(film)",
        //   "content": "Deadpool is a 2016 American superhero film",
        //   "pagerank": 50.3,
        //   "url_length": 37,
        //   "topics": {
        //     "movies": 60,
        //     "super hero": 65
        //   }
        // }
        // end::c786505cf972dd41bd0cbb6ebcf939e9[]

        $curl = 'PUT /test/_doc/1?refresh'
              . '{'
              . '  "url": "http://en.wikipedia.org/wiki/2016_Summer_Olympics",'
              . '  "content": "Rio 2016",'
              . '  "pagerank": 50.3,'
              . '  "url_length": 42,'
              . '  "topics": {'
              . '    "sports": 50,'
              . '    "brazil": 30'
              . '  }'
              . '}'
              . 'PUT /test/_doc/2?refresh'
              . '{'
              . '  "url": "http://en.wikipedia.org/wiki/2016_Brazilian_Grand_Prix",'
              . '  "content": "Formula One motor race held on 13 November 2016",'
              . '  "pagerank": 50.3,'
              . '  "url_length": 47,'
              . '  "topics": {'
              . '    "sports": 35,'
              . '    "formula one": 65,'
              . '    "brazil": 20'
              . '  }'
              . '}'
              . 'PUT /test/_doc/3?refresh'
              . '{'
              . '  "url": "http://en.wikipedia.org/wiki/Deadpool_(film)",'
              . '  "content": "Deadpool is a 2016 American superhero film",'
              . '  "pagerank": 50.3,'
              . '  "url_length": 37,'
              . '  "topics": {'
              . '    "movies": 60,'
              . '    "super hero": 65'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  fd0cd8ecd03468726b59a605eea06d75
     * Line: 130
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL130_fd0cd8ecd03468726b59a605eea06d75()
    {
        $client = $this->getClient();
        // tag::fd0cd8ecd03468726b59a605eea06d75[]
        // TODO -- Implement Example
        // GET /test/_search
        // {
        //   "query": {
        //     "bool": {
        //       "must": [
        //         {
        //           "match": {
        //             "content": "2016"
        //           }
        //         }
        //       ],
        //       "should": [
        //         {
        //           "rank_feature": {
        //             "field": "pagerank"
        //           }
        //         },
        //         {
        //           "rank_feature": {
        //             "field": "url_length",
        //             "boost": 0.1
        //           }
        //         },
        //         {
        //           "rank_feature": {
        //             "field": "topics.sports",
        //             "boost": 0.4
        //           }
        //         }
        //       ]
        //     }
        //   }
        // }
        // end::fd0cd8ecd03468726b59a605eea06d75[]

        $curl = 'GET /test/_search'
              . '{'
              . '  "query": {'
              . '    "bool": {'
              . '      "must": ['
              . '        {'
              . '          "match": {'
              . '            "content": "2016"'
              . '          }'
              . '        }'
              . '      ],'
              . '      "should": ['
              . '        {'
              . '          "rank_feature": {'
              . '            "field": "pagerank"'
              . '          }'
              . '        },'
              . '        {'
              . '          "rank_feature": {'
              . '            "field": "url_length",'
              . '            "boost": 0.1'
              . '          }'
              . '        },'
              . '        {'
              . '          "rank_feature": {'
              . '            "field": "topics.sports",'
              . '            "boost": 0.4'
              . '          }'
              . '        }'
              . '      ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  309f0721145b5c656338a02459c3ff1e
     * Line: 236
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL236_309f0721145b5c656338a02459c3ff1e()
    {
        $client = $this->getClient();
        // tag::309f0721145b5c656338a02459c3ff1e[]
        // TODO -- Implement Example
        // GET /test/_search
        // {
        //   "query": {
        //     "rank_feature": {
        //       "field": "pagerank",
        //       "saturation": {
        //         "pivot": 8
        //       }
        //     }
        //   }
        // }
        // end::309f0721145b5c656338a02459c3ff1e[]

        $curl = 'GET /test/_search'
              . '{'
              . '  "query": {'
              . '    "rank_feature": {'
              . '      "field": "pagerank",'
              . '      "saturation": {'
              . '        "pivot": 8'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0c05c66cfe3a2169b1ec1aba77e26db2
     * Line: 257
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL257_0c05c66cfe3a2169b1ec1aba77e26db2()
    {
        $client = $this->getClient();
        // tag::0c05c66cfe3a2169b1ec1aba77e26db2[]
        // TODO -- Implement Example
        // GET /test/_search
        // {
        //   "query": {
        //     "rank_feature": {
        //       "field": "pagerank",
        //       "saturation": {}
        //     }
        //   }
        // }
        // end::0c05c66cfe3a2169b1ec1aba77e26db2[]

        $curl = 'GET /test/_search'
              . '{'
              . '  "query": {'
              . '    "rank_feature": {'
              . '      "field": "pagerank",'
              . '      "saturation": {}'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e89bf0d893b7bf43c2d9b44db6cfe21b
     * Line: 279
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL279_e89bf0d893b7bf43c2d9b44db6cfe21b()
    {
        $client = $this->getClient();
        // tag::e89bf0d893b7bf43c2d9b44db6cfe21b[]
        // TODO -- Implement Example
        // GET /test/_search
        // {
        //   "query": {
        //     "rank_feature": {
        //       "field": "pagerank",
        //       "log": {
        //         "scaling_factor": 4
        //       }
        //     }
        //   }
        // }
        // end::e89bf0d893b7bf43c2d9b44db6cfe21b[]

        $curl = 'GET /test/_search'
              . '{'
              . '  "query": {'
              . '    "rank_feature": {'
              . '      "field": "pagerank",'
              . '      "log": {'
              . '        "scaling_factor": 4'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9e3c28d5820c38ea117eb2e9a5061089
     * Line: 306
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL306_9e3c28d5820c38ea117eb2e9a5061089()
    {
        $client = $this->getClient();
        // tag::9e3c28d5820c38ea117eb2e9a5061089[]
        // TODO -- Implement Example
        // GET /test/_search
        // {
        //   "query": {
        //     "rank_feature": {
        //       "field": "pagerank",
        //       "sigmoid": {
        //         "pivot": 7,
        //         "exponent": 0.6
        //       }
        //     }
        //   }
        // }
        // end::9e3c28d5820c38ea117eb2e9a5061089[]

        $curl = 'GET /test/_search'
              . '{'
              . '  "query": {'
              . '    "rank_feature": {'
              . '      "field": "pagerank",'
              . '      "sigmoid": {'
              . '        "pivot": 7,'
              . '        "exponent": 0.6'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%








}
