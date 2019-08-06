<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ccr\Apis\Follow;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetFollowStats
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   ccr/apis/follow/get-follow-stats.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetFollowStats extends SimpleExamplesTester {

    /**
     * Tag:  020c95db88ef356093f03be84893ddf9
     * Line: 38
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL38_020c95db88ef356093f03be84893ddf9()
    {
        $client = $this->getClient();
        // tag::020c95db88ef356093f03be84893ddf9[]
        // TODO -- Implement Example
        // GET /<index>/_ccr/stats
        // end::020c95db88ef356093f03be84893ddf9[]

        $curl = 'GET /<index>/_ccr/stats';

        // TODO -- make assertion
    }

    /**
     * Tag:  8e43bb5b7946143e69d397bb81d87df0
     * Line: 209
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL209_8e43bb5b7946143e69d397bb81d87df0()
    {
        $client = $this->getClient();
        // tag::8e43bb5b7946143e69d397bb81d87df0[]
        // TODO -- Implement Example
        // GET /follower_index/_ccr/stats
        // end::8e43bb5b7946143e69d397bb81d87df0[]

        $curl = 'GET /follower_index/_ccr/stats';

        // TODO -- make assertion
    }

// %__METHOD__%



}
