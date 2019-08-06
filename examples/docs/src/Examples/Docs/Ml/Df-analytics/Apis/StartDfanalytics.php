<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Df-analytics\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: StartDfanalytics
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/df-analytics/apis/start-dfanalytics.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class StartDfanalytics extends SimpleExamplesTester {

    /**
     * Tag:  1a3a4b8a4bfee4ab84ddd13d8835f560
     * Line: 50
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL50_1a3a4b8a4bfee4ab84ddd13d8835f560()
    {
        $client = $this->getClient();
        // tag::1a3a4b8a4bfee4ab84ddd13d8835f560[]
        // TODO -- Implement Example
        // POST _ml/data_frame/analytics/loganalytics/_start
        // end::1a3a4b8a4bfee4ab84ddd13d8835f560[]

        $curl = 'POST _ml/data_frame/analytics/loganalytics/_start';

        // TODO -- make assertion
    }

// %__METHOD__%


}
