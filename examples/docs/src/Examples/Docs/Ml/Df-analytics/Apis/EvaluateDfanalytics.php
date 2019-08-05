<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Df-analytics\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: EvaluateDfanalytics
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/df-analytics/apis/evaluate-dfanalytics.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class EvaluateDfanalytics extends SimpleExamplesTester {

    /**
     * Tag:  eae68412d998bc0f65b09711f007a4b7
     * Line: 72
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL72_eae68412d998bc0f65b09711f007a4b7()
    {
        $client = $this->getClient();
        // tag::eae68412d998bc0f65b09711f007a4b7[]
        // TODO -- Implement Example
        // POST _ml/data_frame/_evaluate
        // {
        //   "index": "my_analytics_dest_index",
        //   "evaluation": {
        //     "binary_soft_classification": {
        //       "actual_field": "is_outlier",
        //       "predicted_probability_field": "ml.outlier_score"
        //     }
        //   }
        // }
        // end::eae68412d998bc0f65b09711f007a4b7[]

        $curl = 'POST _ml/data_frame/_evaluate'
              . '{'
              . '  "index": "my_analytics_dest_index",'
              . '  "evaluation": {'
              . '    "binary_soft_classification": {'
              . '      "actual_field": "is_outlier",'
              . '      "predicted_probability_field": "ml.outlier_score"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
