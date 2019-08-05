<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Delete
 *
 * Date: 2019-08-05 08:43:09
 *
 * @source   docs/delete.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Delete extends SimpleExamplesTester {

    /**
     * Tag:  c5e5873783246c7b1c01d8464fed72c4
     * Line: 9
     * Date: 2019-08-05 08:43:09
     */
    public function testExampleL9_c5e5873783246c7b1c01d8464fed72c4()
    {
        $client = $this->getClient();
        // tag::c5e5873783246c7b1c01d8464fed72c4[]
        $params = [
            'index' => 'twitter',
            'id'    => '1',
        ];
        $response = $client->delete($params);
        // end::c5e5873783246c7b1c01d8464fed72c4[]

        $curl = 'DELETE /twitter/_doc/1';

        // TODO -- make assertion
    }

    /**
     * Tag:  47b5ff897f26e9c943cee5c06034181d
     * Line: 84
     * Date: 2019-08-05 08:43:09
     */
    public function testExampleL84_47b5ff897f26e9c943cee5c06034181d()
    {
        $client = $this->getClient();
        // tag::47b5ff897f26e9c943cee5c06034181d[]
        $params = [
            'index'   => 'twitter',
            'id'      => '1',
            'routing' => 'kimchy',
        ];
        $response = $client->delete($params);
        // end::47b5ff897f26e9c943cee5c06034181d[]

        $curl = 'DELETE /twitter/_doc/1?routing=kimchy';

        // TODO -- make assertion
    }

    /**
     * Tag:  d90a84a24a407731dfc1929ac8327746
     * Line: 147
     * Date: 2019-08-05 08:43:09
     */
    public function testExampleL147_d90a84a24a407731dfc1929ac8327746()
    {
        $client = $this->getClient();
        // tag::d90a84a24a407731dfc1929ac8327746[]
        $params = [
            'index'   => 'twitter',
            'id'      => '1',
            'timeout' => '5m',
        ];
        $response = $client->delete($params);
        // end::d90a84a24a407731dfc1929ac8327746[]

        $curl = 'DELETE /twitter/_doc/1?timeout=5m';

        // TODO -- make assertion
    }

// %__METHOD__%

}
