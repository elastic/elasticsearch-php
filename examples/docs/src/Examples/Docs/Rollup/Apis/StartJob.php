<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Rollup\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: StartJob
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   rollup/apis/start-job.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class StartJob extends SimpleExamplesTester {

    /**
     * Tag:  618c9d42284c067891fb57034a4fd834
     * Line: 51
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL51_618c9d42284c067891fb57034a4fd834()
    {
        $client = $this->getClient();
        // tag::618c9d42284c067891fb57034a4fd834[]
        // TODO -- Implement Example
        // POST _rollup/job/sensor/_start
        // end::618c9d42284c067891fb57034a4fd834[]

        $curl = 'POST _rollup/job/sensor/_start';

        // TODO -- make assertion
    }

// %__METHOD__%


}
