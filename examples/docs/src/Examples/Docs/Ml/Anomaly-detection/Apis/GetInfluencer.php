<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetInfluencer
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/anomaly-detection/apis/get-influencer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetInfluencer extends SimpleExamplesTester {

    /**
     * Tag:  c644b2026414830b6265f7a14dd37ce9
     * Line: 77
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL77_c644b2026414830b6265f7a14dd37ce9()
    {
        $client = $this->getClient();
        // tag::c644b2026414830b6265f7a14dd37ce9[]
        // TODO -- Implement Example
        // GET _ml/anomaly_detectors/it_ops_new_kpi/results/influencers
        // {
        //   "sort": "influencer_score",
        //   "desc": true
        // }
        // end::c644b2026414830b6265f7a14dd37ce9[]

        $curl = 'GET _ml/anomaly_detectors/it_ops_new_kpi/results/influencers'
              . '{'
              . '  "sort": "influencer_score",'
              . '  "desc": true'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
