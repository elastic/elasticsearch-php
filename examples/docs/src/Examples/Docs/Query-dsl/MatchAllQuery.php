<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MatchAllQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/match-all-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MatchAllQuery extends SimpleExamplesTester {

    /**
     * Tag:  09d617863a103c82fb4101e6165ea7fe
     * Line: 11
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL11_09d617863a103c82fb4101e6165ea7fe()
    {
        $client = $this->getClient();
        // tag::09d617863a103c82fb4101e6165ea7fe[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "match_all": {}
        //     }
        // }
        // end::09d617863a103c82fb4101e6165ea7fe[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "match_all": {}'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  75330ec1305d2beb0e2f34d2195464e2
     * Line: 24
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL24_75330ec1305d2beb0e2f34d2195464e2()
    {
        $client = $this->getClient();
        // tag::75330ec1305d2beb0e2f34d2195464e2[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "match_all": { "boost" : 1.2 }
        //     }
        // }
        // end::75330ec1305d2beb0e2f34d2195464e2[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "match_all": { "boost" : 1.2 }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  81c9aa2678d6166a9662ddf2c011a6a5
     * Line: 41
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL41_81c9aa2678d6166a9662ddf2c011a6a5()
    {
        $client = $this->getClient();
        // tag::81c9aa2678d6166a9662ddf2c011a6a5[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "match_none": {}
        //     }
        // }
        // end::81c9aa2678d6166a9662ddf2c011a6a5[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "match_none": {}'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
