<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cat;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Alias
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cat/alias.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Alias extends SimpleExamplesTester {

    /**
     * Tag:  a003467caeafcb2a935522efb83080cb
     * Line: 36
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL36_a003467caeafcb2a935522efb83080cb()
    {
        $client = $this->getClient();
        // tag::a003467caeafcb2a935522efb83080cb[]
        // TODO -- Implement Example
        // GET /_cat/aliases?v
        // end::a003467caeafcb2a935522efb83080cb[]

        $curl = 'GET /_cat/aliases?v';

        // TODO -- make assertion
    }

// %__METHOD__%


}
