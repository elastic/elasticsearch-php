<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ccr\Apis\Follow;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PostResumeFollow
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   ccr/apis/follow/post-resume-follow.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PostResumeFollow extends SimpleExamplesTester {

    /**
     * Tag:  109db8ff7b715aca98de8ef1ab7e44ab
     * Line: 40
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL40_109db8ff7b715aca98de8ef1ab7e44ab()
    {
        $client = $this->getClient();
        // tag::109db8ff7b715aca98de8ef1ab7e44ab[]
        // TODO -- Implement Example
        // POST /<follower_index>/_ccr/resume_follow
        // {
        // }
        // end::109db8ff7b715aca98de8ef1ab7e44ab[]

        $curl = 'POST /<follower_index>/_ccr/resume_follow'
              . '{'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  824fded1f9db28906ae7e85ae8de9bd0
     * Line: 83
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL83_824fded1f9db28906ae7e85ae8de9bd0()
    {
        $client = $this->getClient();
        // tag::824fded1f9db28906ae7e85ae8de9bd0[]
        // TODO -- Implement Example
        // POST /follower_index/_ccr/resume_follow
        // {
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
        // end::824fded1f9db28906ae7e85ae8de9bd0[]

        $curl = 'POST /follower_index/_ccr/resume_follow'
              . '{'
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
