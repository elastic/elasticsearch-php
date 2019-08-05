<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Licensing;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetTrialStatus
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   licensing/get-trial-status.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetTrialStatus extends SimpleExamplesTester {

    /**
     * Tag:  88cf60d3310a56d8ae12704abc05b565
     * Line: 43
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL43_88cf60d3310a56d8ae12704abc05b565()
    {
        $client = $this->getClient();
        // tag::88cf60d3310a56d8ae12704abc05b565[]
        // TODO -- Implement Example
        // GET /_license/trial_status
        // end::88cf60d3310a56d8ae12704abc05b565[]

        $curl = 'GET /_license/trial_status';

        // TODO -- make assertion
    }

// %__METHOD__%


}
