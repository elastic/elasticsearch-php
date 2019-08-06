<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ShardStores
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/shard-stores.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ShardStores extends SimpleExamplesTester {

    /**
     * Tag:  897f7ceaa110aa68e1f13ef7791810c5
     * Line: 19
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL19_897f7ceaa110aa68e1f13ef7791810c5()
    {
        $client = $this->getClient();
        // tag::897f7ceaa110aa68e1f13ef7791810c5[]
        // TODO -- Implement Example
        // # return information of only index test
        // GET /test/_shard_stores
        // # return information of only test1 and test2 indices
        // GET /test1,test2/_shard_stores
        // # return information of all indices
        // GET /_shard_stores
        // end::897f7ceaa110aa68e1f13ef7791810c5[]

        $curl = '# return information of only index test'
              . 'GET /test/_shard_stores'
              . '# return information of only test1 and test2 indices'
              . 'GET /test1,test2/_shard_stores'
              . '# return information of all indices'
              . 'GET /_shard_stores';

        // TODO -- make assertion
    }

    /**
     * Tag:  3545261682af72f4bee57f2bac0a9590
     * Line: 39
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL39_3545261682af72f4bee57f2bac0a9590()
    {
        $client = $this->getClient();
        // tag::3545261682af72f4bee57f2bac0a9590[]
        // TODO -- Implement Example
        // GET /_shard_stores?status=green
        // end::3545261682af72f4bee57f2bac0a9590[]

        $curl = 'GET /_shard_stores?status=green';

        // TODO -- make assertion
    }

// %__METHOD__%



}
