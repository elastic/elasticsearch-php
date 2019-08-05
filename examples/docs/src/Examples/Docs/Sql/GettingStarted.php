<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Sql;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GettingStarted
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   sql/getting-started.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GettingStarted extends SimpleExamplesTester {

    /**
     * Tag:  15f293688537c82d2bdebda916769fa4
     * Line: 10
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL10_15f293688537c82d2bdebda916769fa4()
    {
        $client = $this->getClient();
        // tag::15f293688537c82d2bdebda916769fa4[]
        // TODO -- Implement Example
        // PUT /library/book/_bulk?refresh
        // {"index":{"_id": "Leviathan Wakes"}}
        // {"name": "Leviathan Wakes", "author": "James S.A. Corey", "release_date": "2011-06-02", "page_count": 561}
        // {"index":{"_id": "Hyperion"}}
        // {"name": "Hyperion", "author": "Dan Simmons", "release_date": "1989-05-26", "page_count": 482}
        // {"index":{"_id": "Dune"}}
        // {"name": "Dune", "author": "Frank Herbert", "release_date": "1965-06-01", "page_count": 604}
        // end::15f293688537c82d2bdebda916769fa4[]

        $curl = 'PUT /library/book/_bulk?refresh'
              . '{"index":{"_id": "Leviathan Wakes"}}'
              . '{"name": "Leviathan Wakes", "author": "James S.A. Corey", "release_date": "2011-06-02", "page_count": 561}'
              . '{"index":{"_id": "Hyperion"}}'
              . '{"name": "Hyperion", "author": "Dan Simmons", "release_date": "1989-05-26", "page_count": 482}'
              . '{"index":{"_id": "Dune"}}'
              . '{"name": "Dune", "author": "Frank Herbert", "release_date": "1965-06-01", "page_count": 604}';

        // TODO -- make assertion
    }

    /**
     * Tag:  53b14d640c4c48a5e7ea86ddc26bee64
     * Line: 24
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL24_53b14d640c4c48a5e7ea86ddc26bee64()
    {
        $client = $this->getClient();
        // tag::53b14d640c4c48a5e7ea86ddc26bee64[]
        // TODO -- Implement Example
        // POST /_sql?format=txt
        // {
        //     "query": "SELECT * FROM library WHERE release_date < '2000-01-01'"
        // }
        // end::53b14d640c4c48a5e7ea86ddc26bee64[]

        $curl = 'POST /_sql?format=txt'
              . '{'
              . '    "query": "SELECT * FROM library WHERE release_date < '2000-01-01'"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
