<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: UriRequest
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   search/uri-request.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class UriRequest extends SimpleExamplesTester {

    /**
     * Tag:  68188db64fc50a9b35e5646493b00d2c
     * Line: 10
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL10_68188db64fc50a9b35e5646493b00d2c()
    {
        $client = $this->getClient();
        // tag::68188db64fc50a9b35e5646493b00d2c[]
        // TODO -- Implement Example
        // GET twitter/_search?q=user:kimchy
        // end::68188db64fc50a9b35e5646493b00d2c[]

        $curl = 'GET twitter/_search?q=user:kimchy';

        // TODO -- make assertion
    }

// %__METHOD__%


}
