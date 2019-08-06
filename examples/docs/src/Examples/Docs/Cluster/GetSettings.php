<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cluster;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetSettings
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cluster/get-settings.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetSettings extends SimpleExamplesTester {

    /**
     * Tag:  4029af36cb3f8202549017f7378803b4
     * Line: 7
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL7_4029af36cb3f8202549017f7378803b4()
    {
        $client = $this->getClient();
        // tag::4029af36cb3f8202549017f7378803b4[]
        // TODO -- Implement Example
        // GET /_cluster/settings
        // end::4029af36cb3f8202549017f7378803b4[]

        $curl = 'GET /_cluster/settings';

        // TODO -- make assertion
    }

    /**
     * Tag:  e72a172629bd9ce8dd971c0fdf112073
     * Line: 14
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL14_e72a172629bd9ce8dd971c0fdf112073()
    {
        $client = $this->getClient();
        // tag::e72a172629bd9ce8dd971c0fdf112073[]
        // TODO -- Implement Example
        // GET /_cluster/settings?include_defaults=true
        // end::e72a172629bd9ce8dd971c0fdf112073[]

        $curl = 'GET /_cluster/settings?include_defaults=true';

        // TODO -- make assertion
    }

// %__METHOD__%



}
