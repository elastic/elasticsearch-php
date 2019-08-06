<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ccr\Apis\Follow;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PostUnfollow
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   ccr/apis/follow/post-unfollow.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PostUnfollow extends SimpleExamplesTester {

    /**
     * Tag:  f6d493650b4344f17297b568016fb445
     * Line: 35
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL35_f6d493650b4344f17297b568016fb445()
    {
        $client = $this->getClient();
        // tag::f6d493650b4344f17297b568016fb445[]
        // TODO -- Implement Example
        // POST /<follower_index>/_ccr/unfollow
        // end::f6d493650b4344f17297b568016fb445[]

        $curl = 'POST /<follower_index>/_ccr/unfollow';

        // TODO -- make assertion
    }

    /**
     * Tag:  6a350a17701e8c8158407191f2718b66
     * Line: 72
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL72_6a350a17701e8c8158407191f2718b66()
    {
        $client = $this->getClient();
        // tag::6a350a17701e8c8158407191f2718b66[]
        // TODO -- Implement Example
        // POST /follower_index/_ccr/unfollow
        // end::6a350a17701e8c8158407191f2718b66[]

        $curl = 'POST /follower_index/_ccr/unfollow';

        // TODO -- make assertion
    }

// %__METHOD__%



}
