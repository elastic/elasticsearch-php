<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Licensing;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetLicense
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   licensing/get-license.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetLicense extends SimpleExamplesTester {

    /**
     * Tag:  11c395d1649733bcab853fe31ec393b2
     * Line: 48
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL48_11c395d1649733bcab853fe31ec393b2()
    {
        $client = $this->getClient();
        // tag::11c395d1649733bcab853fe31ec393b2[]
        // TODO -- Implement Example
        // GET /_license
        // end::11c395d1649733bcab853fe31ec393b2[]

        $curl = 'GET /_license';

        // TODO -- make assertion
    }

// %__METHOD__%


}
