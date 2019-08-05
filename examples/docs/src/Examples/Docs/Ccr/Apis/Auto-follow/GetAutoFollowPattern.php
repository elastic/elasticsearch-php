<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ccr\Apis\Auto-follow;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetAutoFollowPattern
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ccr/apis/auto-follow/get-auto-follow-pattern.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetAutoFollowPattern extends SimpleExamplesTester {

    /**
     * Tag:  5e124875d97c27362ae858160ae1c6d5
     * Line: 43
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL43_5e124875d97c27362ae858160ae1c6d5()
    {
        $client = $this->getClient();
        // tag::5e124875d97c27362ae858160ae1c6d5[]
        // TODO -- Implement Example
        // GET /_ccr/auto_follow/
        // end::5e124875d97c27362ae858160ae1c6d5[]

        $curl = 'GET /_ccr/auto_follow/';

        // TODO -- make assertion
    }

    /**
     * Tag:  d56a9d89282df56adbbc34b91390ac17
     * Line: 49
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL49_d56a9d89282df56adbbc34b91390ac17()
    {
        $client = $this->getClient();
        // tag::d56a9d89282df56adbbc34b91390ac17[]
        // TODO -- Implement Example
        // GET /_ccr/auto_follow/<auto_follow_pattern_name>
        // end::d56a9d89282df56adbbc34b91390ac17[]

        $curl = 'GET /_ccr/auto_follow/<auto_follow_pattern_name>';

        // TODO -- make assertion
    }

    /**
     * Tag:  79f33e05b203eb46eef7958fbc95ef77
     * Line: 83
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL83_79f33e05b203eb46eef7958fbc95ef77()
    {
        $client = $this->getClient();
        // tag::79f33e05b203eb46eef7958fbc95ef77[]
        // TODO -- Implement Example
        // GET /_ccr/auto_follow/my_auto_follow_pattern
        // end::79f33e05b203eb46eef7958fbc95ef77[]

        $curl = 'GET /_ccr/auto_follow/my_auto_follow_pattern';

        // TODO -- make assertion
    }

// %__METHOD__%




}
