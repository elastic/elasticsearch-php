<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PreviewDatafeed
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/preview-datafeed.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PreviewDatafeed extends SimpleExamplesTester {

    /**
     * Tag:  27b20b345329fc72d8a0c7d440596ea1
     * Line: 52
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL52_27b20b345329fc72d8a0c7d440596ea1()
    {
        $client = $this->getClient();
        // tag::27b20b345329fc72d8a0c7d440596ea1[]
        // TODO -- Implement Example
        // GET _ml/datafeeds/datafeed-farequote/_preview
        // end::27b20b345329fc72d8a0c7d440596ea1[]

        $curl = 'GET _ml/datafeeds/datafeed-farequote/_preview';

        // TODO -- make assertion
    }

// %__METHOD__%


}
