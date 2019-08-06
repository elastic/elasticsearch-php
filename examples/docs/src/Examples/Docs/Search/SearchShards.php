<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SearchShards
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/search-shards.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SearchShards extends SimpleExamplesTester {

    /**
     * Tag:  49b137a1c0016face219bac3faf41996
     * Line: 17
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL17_49b137a1c0016face219bac3faf41996()
    {
        $client = $this->getClient();
        // tag::49b137a1c0016face219bac3faf41996[]
        // TODO -- Implement Example
        // GET /twitter/_search_shards
        // end::49b137a1c0016face219bac3faf41996[]

        $curl = 'GET /twitter/_search_shards';

        // TODO -- make assertion
    }

    /**
     * Tag:  a44b7da0091ac75e5571475a4e99bb16
     * Line: 102
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL102_a44b7da0091ac75e5571475a4e99bb16()
    {
        $client = $this->getClient();
        // tag::a44b7da0091ac75e5571475a4e99bb16[]
        // TODO -- Implement Example
        // GET /twitter/_search_shards?routing=foo,bar
        // end::a44b7da0091ac75e5571475a4e99bb16[]

        $curl = 'GET /twitter/_search_shards?routing=foo,bar';

        // TODO -- make assertion
    }

// %__METHOD__%



}
