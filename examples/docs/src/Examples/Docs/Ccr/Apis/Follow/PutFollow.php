<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ccr\Apis\Follow;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PutFollow
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   ccr/apis/follow/put-follow.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PutFollow extends SimpleExamplesTester {

    /**
     * Tag:  73646c12ad33a813ab2280f1dc83500e
     * Line: 26
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL26_73646c12ad33a813ab2280f1dc83500e()
    {
        $client = $this->getClient();
        // tag::73646c12ad33a813ab2280f1dc83500e[]
        // TODO -- Implement Example
        // PUT /<follower_index>/_ccr/follow?wait_for_active_shards=1
        // {
        //   "remote_cluster" : "<remote_cluster>",
        //   "leader_index" : "<leader_index>"
        // }
        // end::73646c12ad33a813ab2280f1dc83500e[]

        $curl = 'PUT /<follower_index>/_ccr/follow?wait_for_active_shards=1'
              . '{'
              . '  "remote_cluster" : "<remote_cluster>",'
              . '  "leader_index" : "<leader_index>"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c1f565c68d7bfce4a4251c7919444977
     * Line: 91
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL91_c1f565c68d7bfce4a4251c7919444977()
    {
        $client = $this->getClient();
        // tag::c1f565c68d7bfce4a4251c7919444977[]
        // TODO -- Implement Example
        // PUT /follower_index/_ccr/follow?wait_for_active_shards=1
        // {
        //   "remote_cluster" : "remote_cluster",
        //   "leader_index" : "leader_index",
        //   "max_read_request_operation_count" : 1024,
        //   "max_outstanding_read_requests" : 16,
        //   "max_read_request_size" : "1024k",
        //   "max_write_request_operation_count" : 32768,
        //   "max_write_request_size" : "16k",
        //   "max_outstanding_write_requests" : 8,
        //   "max_write_buffer_count" : 512,
        //   "max_write_buffer_size" : "512k",
        //   "max_retry_delay" : "10s",
        //   "read_poll_timeout" : "30s"
        // }
        // end::c1f565c68d7bfce4a4251c7919444977[]

        $curl = 'PUT /follower_index/_ccr/follow?wait_for_active_shards=1'
              . '{'
              . '  "remote_cluster" : "remote_cluster",'
              . '  "leader_index" : "leader_index",'
              . '  "max_read_request_operation_count" : 1024,'
              . '  "max_outstanding_read_requests" : 16,'
              . '  "max_read_request_size" : "1024k",'
              . '  "max_write_request_operation_count" : 32768,'
              . '  "max_write_request_size" : "16k",'
              . '  "max_outstanding_write_requests" : 8,'
              . '  "max_write_buffer_count" : 512,'
              . '  "max_write_buffer_size" : "512k",'
              . '  "max_retry_delay" : "10s",'
              . '  "read_poll_timeout" : "30s"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
