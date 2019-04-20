<?php

namespace Elasticsearch\Tests\ClientBuilder;

use GuzzleHttp\Ring\Core;
use GuzzleHttp\Ring\Future\CompletedFutureArray;

class StringHandler
{
    public function __invoke($request)
    {
        $effectiveUrl = Core::url($request);

        return new CompletedFutureArray([
            'transfer_stats' => [
                'total_time' => 0.01,
            ],
            'effective_url' => $effectiveUrl,
            'headers' => [],
            'status' => 200,
            'body' => '{"took":1,"timed_out":false,"_shards":{"total":5,"successful":5,"skipped":0,"failed":0},"hits":{"total":1,"max_score":1,"hits":[{"_index":"test_index","_type":"test_type","_id":"1555642644110008","_score":1,"_source":{"id":1555642644110008,"user_id":1539500321790003,"pay_order_id":1555642644900005,"begin_time":1555642655,"end_time":1555642656,"star":0,"tags":[],"create_time":1555642644}}]}}',
        ]);
    }
}
