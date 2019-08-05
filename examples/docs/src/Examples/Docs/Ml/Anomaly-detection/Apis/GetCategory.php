<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetCategory
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/get-category.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetCategory extends SimpleExamplesTester {

    /**
     * Tag:  e8f1c9ee003d115ec8f55e57990df6e4
     * Line: 70
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL70_e8f1c9ee003d115ec8f55e57990df6e4()
    {
        $client = $this->getClient();
        // tag::e8f1c9ee003d115ec8f55e57990df6e4[]
        // TODO -- Implement Example
        // GET _ml/anomaly_detectors/esxi_log/results/categories
        // {
        //   "page":{
        //     "size": 1
        //   }
        // }
        // end::e8f1c9ee003d115ec8f55e57990df6e4[]

        $curl = 'GET _ml/anomaly_detectors/esxi_log/results/categories'
              . '{'
              . '  "page":{'
              . '    "size": 1'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
