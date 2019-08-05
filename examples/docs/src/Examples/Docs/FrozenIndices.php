<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: FrozenIndices
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   frozen-indices.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class FrozenIndices extends SimpleExamplesTester {

    /**
     * Tag:  f9018c483fb6b810d8a921668addfc71
     * Line: 66
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL66_f9018c483fb6b810d8a921668addfc71()
    {
        $client = $this->getClient();
        // tag::f9018c483fb6b810d8a921668addfc71[]
        // TODO -- Implement Example
        // POST /twitter/_forcemerge?max_num_segments=1
        // end::f9018c483fb6b810d8a921668addfc71[]

        $curl = 'POST /twitter/_forcemerge?max_num_segments=1';

        // TODO -- make assertion
    }

    /**
     * Tag:  0652fc9f77639fce67a87dc2e33cef51
     * Line: 84
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL84_0652fc9f77639fce67a87dc2e33cef51()
    {
        $client = $this->getClient();
        // tag::0652fc9f77639fce67a87dc2e33cef51[]
        // TODO -- Implement Example
        // GET /twitter/_search?q=user:kimchy&ignore_throttled=false
        // end::0652fc9f77639fce67a87dc2e33cef51[]

        $curl = 'GET /twitter/_search?q=user:kimchy&ignore_throttled=false';

        // TODO -- make assertion
    }

    /**
     * Tag:  9ff10591660890ba9d00eb14168c3b67
     * Line: 108
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL108_9ff10591660890ba9d00eb14168c3b67()
    {
        $client = $this->getClient();
        // tag::9ff10591660890ba9d00eb14168c3b67[]
        // TODO -- Implement Example
        // GET /_cat/indices/twitter?v&h=i,sth
        // end::9ff10591660890ba9d00eb14168c3b67[]

        $curl = 'GET /_cat/indices/twitter?v&h=i,sth';

        // TODO -- make assertion
    }

// %__METHOD__%




}
