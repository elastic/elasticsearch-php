<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cat;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Repositories
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cat/repositories.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Repositories extends SimpleExamplesTester {

    /**
     * Tag:  6fa570aac5033e3b25d3071a6c9ea3dc
     * Line: 8
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL8_6fa570aac5033e3b25d3071a6c9ea3dc()
    {
        $client = $this->getClient();
        // tag::6fa570aac5033e3b25d3071a6c9ea3dc[]
        // TODO -- Implement Example
        // GET /_cat/repositories?v
        // end::6fa570aac5033e3b25d3071a6c9ea3dc[]

        $curl = 'GET /_cat/repositories?v';

        // TODO -- make assertion
    }

// %__METHOD__%


}
