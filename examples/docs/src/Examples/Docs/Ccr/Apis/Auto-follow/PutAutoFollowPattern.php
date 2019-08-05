<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ccr\Apis\Auto-follow;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PutAutoFollowPattern
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ccr/apis/auto-follow/put-auto-follow-pattern.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PutAutoFollowPattern extends SimpleExamplesTester {

    /**
     * Tag:  6323012afc5d0421840d67cb8a0c4cb9
     * Line: 15
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL15_6323012afc5d0421840d67cb8a0c4cb9()
    {
        $client = $this->getClient();
        // tag::6323012afc5d0421840d67cb8a0c4cb9[]
        // TODO -- Implement Example
        // PUT /_ccr/auto_follow/<auto_follow_pattern_name>
        // {
        //   "remote_cluster" : "<remote_cluster>",
        //   "leader_index_patterns" :
        //   [
        //     "<leader_index_pattern>"
        //   ],
        //   "follow_index_pattern" : "<follow_index_pattern>"
        // }
        // end::6323012afc5d0421840d67cb8a0c4cb9[]

        $curl = 'PUT /_ccr/auto_follow/<auto_follow_pattern_name>'
              . '{'
              . '  "remote_cluster" : "<remote_cluster>",'
              . '  "leader_index_patterns" :'
              . '  ['
              . '    "<leader_index_pattern>"'
              . '  ],'
              . '  "follow_index_pattern" : "<follow_index_pattern>"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  754a082212929e02a9f71d5404d3301d
     * Line: 91
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL91_754a082212929e02a9f71d5404d3301d()
    {
        $client = $this->getClient();
        // tag::754a082212929e02a9f71d5404d3301d[]
        // TODO -- Implement Example
        // PUT /_ccr/auto_follow/my_auto_follow_pattern
        // {
        //   "remote_cluster" : "remote_cluster",
        //   "leader_index_patterns" :
        //   [
        //     "leader_index*"
        //   ],
        //   "follow_index_pattern" : "{{leader_index}}-follower",
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
        // end::754a082212929e02a9f71d5404d3301d[]

        $curl = 'PUT /_ccr/auto_follow/my_auto_follow_pattern'
              . '{'
              . '  "remote_cluster" : "remote_cluster",'
              . '  "leader_index_patterns" :'
              . '  ['
              . '    "leader_index*"'
              . '  ],'
              . '  "follow_index_pattern" : "{{leader_index}}-follower",'
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
