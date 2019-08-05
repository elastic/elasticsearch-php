<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetFilter
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/get-filter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetFilter extends SimpleExamplesTester {

    /**
     * Tag:  800861c15bb33ca01a46fb97dde7537a
     * Line: 70
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL70_800861c15bb33ca01a46fb97dde7537a()
    {
        $client = $this->getClient();
        // tag::800861c15bb33ca01a46fb97dde7537a[]
        // TODO -- Implement Example
        // GET _ml/filters/safe_domains
        // end::800861c15bb33ca01a46fb97dde7537a[]

        $curl = 'GET _ml/filters/safe_domains';

        // TODO -- make assertion
    }

// %__METHOD__%


}
