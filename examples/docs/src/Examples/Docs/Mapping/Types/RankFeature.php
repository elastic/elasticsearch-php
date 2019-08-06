<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: RankFeature
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/types/rank-feature.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class RankFeature extends SimpleExamplesTester {

    /**
     * Tag:  1e088f892b20697fd6e537a3ecf624ee
     * Line: 11
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL11_1e088f892b20697fd6e537a3ecf624ee()
    {
        $client = $this->getClient();
        // tag::1e088f892b20697fd6e537a3ecf624ee[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "pagerank": {
        //         "type": "rank_feature" \<1>
        //       },
        //       "url_length": {
        //         "type": "rank_feature",
        //         "positive_score_impact": false \<2>
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //   "pagerank": 8,
        //   "url_length": 22
        // }
        // GET my_index/_search
        // {
        //   "query": {
        //     "rank_feature": {
        //       "field": "pagerank"
        //     }
        //   }
        // }
        // end::1e088f892b20697fd6e537a3ecf624ee[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "pagerank": {'
              . '        "type": "rank_feature" \<1>'
              . '      },'
              . '      "url_length": {'
              . '        "type": "rank_feature",'
              . '        "positive_score_impact": false \<2>'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "pagerank": 8,'
              . '  "url_length": 22'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "rank_feature": {'
              . '      "field": "pagerank"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
