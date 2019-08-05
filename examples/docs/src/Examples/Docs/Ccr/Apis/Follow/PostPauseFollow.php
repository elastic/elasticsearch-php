<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ccr\Apis\Follow;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PostPauseFollow
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ccr/apis/follow/post-pause-follow.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PostPauseFollow extends SimpleExamplesTester {

    /**
     * Tag:  483d669ec0768bc4e275a568c6164704
     * Line: 31
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL31_483d669ec0768bc4e275a568c6164704()
    {
        $client = $this->getClient();
        // tag::483d669ec0768bc4e275a568c6164704[]
        // TODO -- Implement Example
        // POST /<follower_index>/_ccr/pause_follow
        // end::483d669ec0768bc4e275a568c6164704[]

        $curl = 'POST /<follower_index>/_ccr/pause_follow';

        // TODO -- make assertion
    }

    /**
     * Tag:  d3263afc69b6f969b9bbd8738cd07b97
     * Line: 65
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL65_d3263afc69b6f969b9bbd8738cd07b97()
    {
        $client = $this->getClient();
        // tag::d3263afc69b6f969b9bbd8738cd07b97[]
        // TODO -- Implement Example
        // POST /follower_index/_ccr/pause_follow
        // end::d3263afc69b6f969b9bbd8738cd07b97[]

        $curl = 'POST /follower_index/_ccr/pause_follow';

        // TODO -- make assertion
    }

// %__METHOD__%



}
