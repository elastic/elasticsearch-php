<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: UpdateFilter
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/update-filter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class UpdateFilter extends SimpleExamplesTester {

    /**
     * Tag:  4d21725453955582ff12b4a1104aa7b6
     * Line: 48
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL48_4d21725453955582ff12b4a1104aa7b6()
    {
        $client = $this->getClient();
        // tag::4d21725453955582ff12b4a1104aa7b6[]
        // TODO -- Implement Example
        // POST _ml/filters/safe_domains/_update
        // {
        //   "description": "Updated list of domains",
        //   "add_items": ["*.myorg.com"],
        //   "remove_items": ["wikipedia.org"]
        // }
        // end::4d21725453955582ff12b4a1104aa7b6[]

        $curl = 'POST _ml/filters/safe_domains/_update'
              . '{'
              . '  "description": "Updated list of domains",'
              . '  "add_items": ["*.myorg.com"],'
              . '  "remove_items": ["wikipedia.org"]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
