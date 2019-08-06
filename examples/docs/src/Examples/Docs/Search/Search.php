<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Search
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/search.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Search extends SimpleExamplesTester {

    /**
     * Tag:  be49260e1b3496c4feac38c56ebb0669
     * Line: 17
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL17_be49260e1b3496c4feac38c56ebb0669()
    {
        $client = $this->getClient();
        // tag::be49260e1b3496c4feac38c56ebb0669[]
        // TODO -- Implement Example
        // GET /twitter/_search?q=user:kimchy
        // end::be49260e1b3496c4feac38c56ebb0669[]

        $curl = 'GET /twitter/_search?q=user:kimchy';

        // TODO -- make assertion
    }

    /**
     * Tag:  269071bbf812125f0b250676251c5936
     * Line: 27
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL27_269071bbf812125f0b250676251c5936()
    {
        $client = $this->getClient();
        // tag::269071bbf812125f0b250676251c5936[]
        // TODO -- Implement Example
        // GET /kimchy,elasticsearch/_search?q=tag:wow
        // end::269071bbf812125f0b250676251c5936[]

        $curl = 'GET /kimchy,elasticsearch/_search?q=tag:wow';

        // TODO -- make assertion
    }

    /**
     * Tag:  4b2b9e7600f9d1eecf82de070a1bf2f4
     * Line: 36
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL36_4b2b9e7600f9d1eecf82de070a1bf2f4()
    {
        $client = $this->getClient();
        // tag::4b2b9e7600f9d1eecf82de070a1bf2f4[]
        // TODO -- Implement Example
        // GET /_all/_search?q=tag:wow
        // end::4b2b9e7600f9d1eecf82de070a1bf2f4[]

        $curl = 'GET /_all/_search?q=tag:wow';

        // TODO -- make assertion
    }

// %__METHOD__%




}
