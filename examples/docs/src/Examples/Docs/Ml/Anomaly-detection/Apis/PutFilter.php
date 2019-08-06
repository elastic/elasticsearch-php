<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PutFilter
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/anomaly-detection/apis/put-filter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PutFilter extends SimpleExamplesTester {

    /**
     * Tag:  b4aec2a1d353852507c091bdb629b765
     * Line: 53
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL53_b4aec2a1d353852507c091bdb629b765()
    {
        $client = $this->getClient();
        // tag::b4aec2a1d353852507c091bdb629b765[]
        // TODO -- Implement Example
        // PUT _ml/filters/safe_domains
        // {
        //   "description": "A list of safe domains",
        //   "items": ["*.google.com", "wikipedia.org"]
        // }
        // end::b4aec2a1d353852507c091bdb629b765[]

        $curl = 'PUT _ml/filters/safe_domains'
              . '{'
              . '  "description": "A list of safe domains",'
              . '  "items": ["*.google.com", "wikipedia.org"]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
