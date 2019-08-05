<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Refresh
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/refresh.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Refresh extends SimpleExamplesTester {

    /**
     * Tag:  c2ac42934e4b76197032b2fc429e317d
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_c2ac42934e4b76197032b2fc429e317d()
    {
        $client = $this->getClient();
        // tag::c2ac42934e4b76197032b2fc429e317d[]
        // TODO -- Implement Example
        // POST /twitter/_refresh
        // end::c2ac42934e4b76197032b2fc429e317d[]

        $curl = 'POST /twitter/_refresh';

        // TODO -- make assertion
    }

    /**
     * Tag:  104c5a6faa3052d18567c1ae57278638
     * Line: 24
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL24_104c5a6faa3052d18567c1ae57278638()
    {
        $client = $this->getClient();
        // tag::104c5a6faa3052d18567c1ae57278638[]
        // TODO -- Implement Example
        // POST /kimchy,elasticsearch/_refresh
        // POST /_refresh
        // end::104c5a6faa3052d18567c1ae57278638[]

        $curl = 'POST /kimchy,elasticsearch/_refresh'
              . 'POST /_refresh';

        // TODO -- make assertion
    }

// %__METHOD__%



}
