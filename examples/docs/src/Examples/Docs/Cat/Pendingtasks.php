<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cat;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Pendingtasks
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cat/pending_tasks.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Pendingtasks extends SimpleExamplesTester {

    /**
     * Tag:  dc2e9e499c7037eb9327cc84a942c5e9
     * Line: 9
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL9_dc2e9e499c7037eb9327cc84a942c5e9()
    {
        $client = $this->getClient();
        // tag::dc2e9e499c7037eb9327cc84a942c5e9[]
        // TODO -- Implement Example
        // GET /_cat/pending_tasks?v
        // end::dc2e9e499c7037eb9327cc84a942c5e9[]

        $curl = 'GET /_cat/pending_tasks?v';

        // TODO -- make assertion
    }

// %__METHOD__%


}
