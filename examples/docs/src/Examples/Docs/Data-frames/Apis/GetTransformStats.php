<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Data-frames\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetTransformStats
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   data-frames/apis/get-transform-stats.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetTransformStats extends SimpleExamplesTester {

    /**
     * Tag:  148bef7f7b2a9c1c2011e4d018c4ae50
     * Line: 105
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL105_148bef7f7b2a9c1c2011e4d018c4ae50()
    {
        $client = $this->getClient();
        // tag::148bef7f7b2a9c1c2011e4d018c4ae50[]
        // TODO -- Implement Example
        // GET _data_frame/transforms/_stats?from=5&size=10
        // end::148bef7f7b2a9c1c2011e4d018c4ae50[]

        $curl = 'GET _data_frame/transforms/_stats?from=5&size=10';

        // TODO -- make assertion
    }

    /**
     * Tag:  d4a2862678b5ef99ec596de1927c3944
     * Line: 115
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL115_d4a2862678b5ef99ec596de1927c3944()
    {
        $client = $this->getClient();
        // tag::d4a2862678b5ef99ec596de1927c3944[]
        // TODO -- Implement Example
        // GET _data_frame/transforms/ecommerce_transform/_stats
        // end::d4a2862678b5ef99ec596de1927c3944[]

        $curl = 'GET _data_frame/transforms/ecommerce_transform/_stats';

        // TODO -- make assertion
    }

// %__METHOD__%



}
