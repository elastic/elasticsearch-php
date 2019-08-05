<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ccr\Apis\Follow;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetFollowInfo
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ccr/apis/follow/get-follow-info.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetFollowInfo extends SimpleExamplesTester {

    /**
     * Tag:  b2440b492149b705ef107137fdccb0c2
     * Line: 38
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL38_b2440b492149b705ef107137fdccb0c2()
    {
        $client = $this->getClient();
        // tag::b2440b492149b705ef107137fdccb0c2[]
        // TODO -- Implement Example
        // GET /<index>/_ccr/info
        // end::b2440b492149b705ef107137fdccb0c2[]

        $curl = 'GET /<index>/_ccr/info';

        // TODO -- make assertion
    }

    /**
     * Tag:  a520168c1c8b454a8f102d6a13027c73
     * Line: 142
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL142_a520168c1c8b454a8f102d6a13027c73()
    {
        $client = $this->getClient();
        // tag::a520168c1c8b454a8f102d6a13027c73[]
        // TODO -- Implement Example
        // GET /follower_index/_ccr/info
        // end::a520168c1c8b454a8f102d6a13027c73[]

        $curl = 'GET /follower_index/_ccr/info';

        // TODO -- make assertion
    }

// %__METHOD__%



}
