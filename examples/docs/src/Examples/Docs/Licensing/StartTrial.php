<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Licensing;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: StartTrial
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   licensing/start-trial.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class StartTrial extends SimpleExamplesTester {

    /**
     * Tag:  37f1f2e75ed95308ae436bbbb8d5645e
     * Line: 47
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL47_37f1f2e75ed95308ae436bbbb8d5645e()
    {
        $client = $this->getClient();
        // tag::37f1f2e75ed95308ae436bbbb8d5645e[]
        // TODO -- Implement Example
        // POST /_license/start_trial?acknowledge=true
        // end::37f1f2e75ed95308ae436bbbb8d5645e[]

        $curl = 'POST /_license/start_trial?acknowledge=true';

        // TODO -- make assertion
    }

// %__METHOD__%


}
