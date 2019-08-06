<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Bulk
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   docs/bulk.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Bulk extends SimpleExamplesTester {

    /**
     * Tag:  ae9ccfaa146731ab9176df90670db1c2
     * Line: 73
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL73_ae9ccfaa146731ab9176df90670db1c2()
    {
        $client = $this->getClient();
        // tag::ae9ccfaa146731ab9176df90670db1c2[]
        // TODO -- Implement Example
        // POST _bulk
        // { "index" : { "_index" : "test", "_id" : "1" } }
        // { "field1" : "value1" }
        // { "delete" : { "_index" : "test", "_id" : "2" } }
        // { "create" : { "_index" : "test", "_id" : "3" } }
        // { "field1" : "value3" }
        // { "update" : {"_id" : "1", "_index" : "test"} }
        // { "doc" : {"field2" : "value2"} }
        // end::ae9ccfaa146731ab9176df90670db1c2[]

        $curl = 'POST _bulk'
              . '{ "index" : { "_index" : "test", "_id" : "1" } }'
              . '{ "field1" : "value1" }'
              . '{ "delete" : { "_index" : "test", "_id" : "2" } }'
              . '{ "create" : { "_index" : "test", "_id" : "3" } }'
              . '{ "field1" : "value3" }'
              . '{ "update" : {"_id" : "1", "_index" : "test"} }'
              . '{ "doc" : {"field2" : "value2"} }';

        // TODO -- make assertion
    }

    /**
     * Tag:  8cd00a3aba7c3c158277bc032aac2830
     * Line: 265
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL265_8cd00a3aba7c3c158277bc032aac2830()
    {
        $client = $this->getClient();
        // tag::8cd00a3aba7c3c158277bc032aac2830[]
        // TODO -- Implement Example
        // POST _bulk
        // { "update" : {"_id" : "1", "_index" : "index1", "retry_on_conflict" : 3} }
        // { "doc" : {"field" : "value"} }
        // { "update" : { "_id" : "0", "_index" : "index1", "retry_on_conflict" : 3} }
        // { "script" : { "source": "ctx._source.counter += params.param1", "lang" : "painless", "params" : {"param1" : 1}}, "upsert" : {"counter" : 1}}
        // { "update" : {"_id" : "2", "_index" : "index1", "retry_on_conflict" : 3} }
        // { "doc" : {"field" : "value"}, "doc_as_upsert" : true }
        // { "update" : {"_id" : "3", "_index" : "index1", "_source" : true} }
        // { "doc" : {"field" : "value"} }
        // { "update" : {"_id" : "4", "_index" : "index1"} }
        // { "doc" : {"field" : "value"}, "_source": true}
        // end::8cd00a3aba7c3c158277bc032aac2830[]

        $curl = 'POST _bulk'
              . '{ "update" : {"_id" : "1", "_index" : "index1", "retry_on_conflict" : 3} }'
              . '{ "doc" : {"field" : "value"} }'
              . '{ "update" : { "_id" : "0", "_index" : "index1", "retry_on_conflict" : 3} }'
              . '{ "script" : { "source": "ctx._source.counter += params.param1", "lang" : "painless", "params" : {"param1" : 1}}, "upsert" : {"counter" : 1}}'
              . '{ "update" : {"_id" : "2", "_index" : "index1", "retry_on_conflict" : 3} }'
              . '{ "doc" : {"field" : "value"}, "doc_as_upsert" : true }'
              . '{ "update" : {"_id" : "3", "_index" : "index1", "_source" : true} }'
              . '{ "doc" : {"field" : "value"} }'
              . '{ "update" : {"_id" : "4", "_index" : "index1"} }'
              . '{ "doc" : {"field" : "value"}, "_source": true}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
