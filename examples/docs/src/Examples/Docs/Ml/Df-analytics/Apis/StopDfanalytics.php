<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Df-analytics\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: StopDfanalytics
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/df-analytics/apis/stop-dfanalytics.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class StopDfanalytics extends SimpleExamplesTester {

    /**
     * Tag:  db19cc7a26ca80106d86d688f4be67a8
     * Line: 72
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL72_db19cc7a26ca80106d86d688f4be67a8()
    {
        $client = $this->getClient();
        // tag::db19cc7a26ca80106d86d688f4be67a8[]
        // TODO -- Implement Example
        // POST _ml/data_frame/analytics/loganalytics/_stop
        // end::db19cc7a26ca80106d86d688f4be67a8[]

        $curl = 'POST _ml/data_frame/analytics/loganalytics/_stop';

        // TODO -- make assertion
    }

// %__METHOD__%


}
