<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: TrackTotalHits
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   search/request/track-total-hits.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class TrackTotalHits extends SimpleExamplesTester {

    /**
     * Tag:  32789ba30a73d8813b61c39619ad7d71
     * Line: 23
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL23_32789ba30a73d8813b61c39619ad7d71()
    {
        $client = $this->getClient();
        // tag::32789ba30a73d8813b61c39619ad7d71[]
        // TODO -- Implement Example
        // GET twitter/_search
        // {
        //     "track_total_hits": true,
        //      "query": {
        //         "match" : {
        //             "message" : "Elasticsearch"
        //         }
        //      }
        // }
        // end::32789ba30a73d8813b61c39619ad7d71[]

        $curl = 'GET twitter/_search'
              . '{'
              . '    "track_total_hits": true,'
              . '     "query": {'
              . '        "match" : {'
              . '            "message" : "Elasticsearch"'
              . '        }'
              . '     }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e45cb729ed4a694b2d6cabaa55c9b5be
     * Line: 69
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL69_e45cb729ed4a694b2d6cabaa55c9b5be()
    {
        $client = $this->getClient();
        // tag::e45cb729ed4a694b2d6cabaa55c9b5be[]
        // TODO -- Implement Example
        // GET twitter/_search
        // {
        //     "track_total_hits": 100,
        //      "query": {
        //         "match" : {
        //             "message" : "Elasticsearch"
        //         }
        //      }
        // }
        // end::e45cb729ed4a694b2d6cabaa55c9b5be[]

        $curl = 'GET twitter/_search'
              . '{'
              . '    "track_total_hits": 100,'
              . '     "query": {'
              . '        "match" : {'
              . '            "message" : "Elasticsearch"'
              . '        }'
              . '     }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d9e08bca979c7ba3a9581f69470bf914
     * Line: 145
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL145_d9e08bca979c7ba3a9581f69470bf914()
    {
        $client = $this->getClient();
        // tag::d9e08bca979c7ba3a9581f69470bf914[]
        // TODO -- Implement Example
        // GET twitter/_search
        // {
        //     "track_total_hits": false,
        //      "query": {
        //         "match" : {
        //             "message" : "Elasticsearch"
        //         }
        //      }
        // }
        // end::d9e08bca979c7ba3a9581f69470bf914[]

        $curl = 'GET twitter/_search'
              . '{'
              . '    "track_total_hits": false,'
              . '     "query": {'
              . '        "match" : {'
              . '            "message" : "Elasticsearch"'
              . '        }'
              . '     }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
