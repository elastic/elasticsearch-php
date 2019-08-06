<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ccr\Apis\Follow;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PostForgetFollower
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   ccr/apis/follow/post-forget-follower.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PostForgetFollower extends SimpleExamplesTester {

    /**
     * Tag:  f4fdfe52ecba65eec6beb30d8deb8bbf
     * Line: 38
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL38_f4fdfe52ecba65eec6beb30d8deb8bbf()
    {
        $client = $this->getClient();
        // tag::f4fdfe52ecba65eec6beb30d8deb8bbf[]
        // TODO -- Implement Example
        // POST /<leader_index>/_ccr/forget_follower
        // {
        //   "follower_cluster" : "<follower_cluster>",
        //   "follower_index" : "<follower_index>",
        //   "follower_index_uuid" : "<follower_index_uuid>",
        //   "leader_remote_cluster" : "<leader_remote_cluster>"
        // }
        // end::f4fdfe52ecba65eec6beb30d8deb8bbf[]

        $curl = 'POST /<leader_index>/_ccr/forget_follower'
              . '{'
              . '  "follower_cluster" : "<follower_cluster>",'
              . '  "follower_index" : "<follower_index>",'
              . '  "follower_index_uuid" : "<follower_index_uuid>",'
              . '  "leader_remote_cluster" : "<leader_remote_cluster>"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  07c07f6d497b1a3012aa4320f830e09e
     * Line: 131
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL131_07c07f6d497b1a3012aa4320f830e09e()
    {
        $client = $this->getClient();
        // tag::07c07f6d497b1a3012aa4320f830e09e[]
        // TODO -- Implement Example
        // POST /leader_index/_ccr/forget_follower
        // {
        //   "follower_cluster" : "follower_cluster",
        //   "follower_index" : "follower_index",
        //   "follower_index_uuid" : "vYpnaWPRQB6mNspmoCeYyA",
        //   "leader_remote_cluster" : "leader_cluster"
        // }
        // end::07c07f6d497b1a3012aa4320f830e09e[]

        $curl = 'POST /leader_index/_ccr/forget_follower'
              . '{'
              . '  "follower_cluster" : "follower_cluster",'
              . '  "follower_index" : "follower_index",'
              . '  "follower_index_uuid" : "vYpnaWPRQB6mNspmoCeYyA",'
              . '  "leader_remote_cluster" : "leader_cluster"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
