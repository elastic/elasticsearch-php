<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Rollup\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: StopJob
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   rollup/apis/stop-job.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class StopJob extends SimpleExamplesTester {

    /**
     * Tag:  07a5fdeb7805cec1d28ba288b28f5ff5
     * Line: 76
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL76_07a5fdeb7805cec1d28ba288b28f5ff5()
    {
        $client = $this->getClient();
        // tag::07a5fdeb7805cec1d28ba288b28f5ff5[]
        // TODO -- Implement Example
        // POST _rollup/job/sensor/_stop?wait_for_completion=true&timeout=10s
        // end::07a5fdeb7805cec1d28ba288b28f5ff5[]

        $curl = 'POST _rollup/job/sensor/_stop?wait_for_completion=true&timeout=10s';

        // TODO -- make assertion
    }

// %__METHOD__%


}
