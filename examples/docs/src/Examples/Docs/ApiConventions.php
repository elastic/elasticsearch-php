<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ApiConventions
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   api-conventions.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ApiConventions extends SimpleExamplesTester {

    /**
     * Tag:  978088f989d45dd09339582e9cbc60e0
     * Line: 96
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL96_978088f989d45dd09339582e9cbc60e0()
    {
        $client = $this->getClient();
        // tag::978088f989d45dd09339582e9cbc60e0[]
        // TODO -- Implement Example
        // # GET /<logstash-{now/d}>/_search
        // GET /%3Clogstash-%7Bnow%2Fd%7D%3E/_search
        // {
        //   "query" : {
        //     "match": {
        //       "test": "data"
        //     }
        //   }
        // }
        // end::978088f989d45dd09339582e9cbc60e0[]

        $curl = '# GET /<logstash-{now/d}>/_search'
              . 'GET /%3Clogstash-%7Bnow%2Fd%7D%3E/_search'
              . '{'
              . '  "query" : {'
              . '    "match": {'
              . '      "test": "data"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a34d70d7022eb4ba48909d440c80390f
     * Line: 151
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL151_a34d70d7022eb4ba48909d440c80390f()
    {
        $client = $this->getClient();
        // tag::a34d70d7022eb4ba48909d440c80390f[]
        // TODO -- Implement Example
        // # GET /<logstash-{now/d-2d}>,<logstash-{now/d-1d}>,<logstash-{now/d}>/_search
        // GET /%3Clogstash-%7Bnow%2Fd-2d%7D%3E%2C%3Clogstash-%7Bnow%2Fd-1d%7D%3E%2C%3Clogstash-%7Bnow%2Fd%7D%3E/_search
        // {
        //   "query" : {
        //     "match": {
        //       "test": "data"
        //     }
        //   }
        // }
        // end::a34d70d7022eb4ba48909d440c80390f[]

        $curl = '# GET /<logstash-{now/d-2d}>,<logstash-{now/d-1d}>,<logstash-{now/d}>/_search'
              . 'GET /%3Clogstash-%7Bnow%2Fd-2d%7D%3E%2C%3Clogstash-%7Bnow%2Fd-1d%7D%3E%2C%3Clogstash-%7Bnow%2Fd%7D%3E/_search'
              . '{'
              . '  "query" : {'
              . '    "match": {'
              . '      "test": "data"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  09dbd90c5e22ea4a17b4cf9aa72e08ae
     * Line: 239
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL239_09dbd90c5e22ea4a17b4cf9aa72e08ae()
    {
        $client = $this->getClient();
        // tag::09dbd90c5e22ea4a17b4cf9aa72e08ae[]
        // TODO -- Implement Example
        // GET /_search?q=elasticsearch&filter_path=took,hits.hits._id,hits.hits._score
        // end::09dbd90c5e22ea4a17b4cf9aa72e08ae[]

        $curl = 'GET /_search?q=elasticsearch&filter_path=took,hits.hits._id,hits.hits._score';

        // TODO -- make assertion
    }

    /**
     * Tag:  1dbb8cf17fbc45c87c7d2f75f15f9778
     * Line: 268
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL268_1dbb8cf17fbc45c87c7d2f75f15f9778()
    {
        $client = $this->getClient();
        // tag::1dbb8cf17fbc45c87c7d2f75f15f9778[]
        // TODO -- Implement Example
        // GET /_cluster/state?filter_path=metadata.indices.*.stat*
        // end::1dbb8cf17fbc45c87c7d2f75f15f9778[]

        $curl = 'GET /_cluster/state?filter_path=metadata.indices.*.stat*';

        // TODO -- make assertion
    }

    /**
     * Tag:  1252fa45847edba5ec2b2f33da70ec5b
     * Line: 293
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL293_1252fa45847edba5ec2b2f33da70ec5b()
    {
        $client = $this->getClient();
        // tag::1252fa45847edba5ec2b2f33da70ec5b[]
        // TODO -- Implement Example
        // GET /_cluster/state?filter_path=routing_table.indices.**.state
        // end::1252fa45847edba5ec2b2f33da70ec5b[]

        $curl = 'GET /_cluster/state?filter_path=routing_table.indices.**.state';

        // TODO -- make assertion
    }

    /**
     * Tag:  621665fdbd7fc103c09bfeed28b67b1a
     * Line: 320
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL320_621665fdbd7fc103c09bfeed28b67b1a()
    {
        $client = $this->getClient();
        // tag::621665fdbd7fc103c09bfeed28b67b1a[]
        // TODO -- Implement Example
        // GET /_count?filter_path=-_shards
        // end::621665fdbd7fc103c09bfeed28b67b1a[]

        $curl = 'GET /_count?filter_path=-_shards';

        // TODO -- make assertion
    }

    /**
     * Tag:  1e18a67caf8f06ff2710ec4a8b30f625
     * Line: 341
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL341_1e18a67caf8f06ff2710ec4a8b30f625()
    {
        $client = $this->getClient();
        // tag::1e18a67caf8f06ff2710ec4a8b30f625[]
        // TODO -- Implement Example
        // GET /_cluster/state?filter_path=metadata.indices.*.state,-metadata.indices.logstash-*
        // end::1e18a67caf8f06ff2710ec4a8b30f625[]

        $curl = 'GET /_cluster/state?filter_path=metadata.indices.*.state,-metadata.indices.logstash-*';

        // TODO -- make assertion
    }

    /**
     * Tag:  f2adeb0e060827e257551ea69c7d28bd
     * Line: 370
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL370_f2adeb0e060827e257551ea69c7d28bd()
    {
        $client = $this->getClient();
        // tag::f2adeb0e060827e257551ea69c7d28bd[]
        // TODO -- Implement Example
        // POST /library/book?refresh
        // {"title": "Book #1", "rating": 200.1}
        // POST /library/book?refresh
        // {"title": "Book #2", "rating": 1.7}
        // POST /library/book?refresh
        // {"title": "Book #3", "rating": 0.1}
        // GET /_search?filter_path=hits.hits._source&_source=title&sort=rating:desc
        // end::f2adeb0e060827e257551ea69c7d28bd[]

        $curl = 'POST /library/book?refresh'
              . '{"title": "Book #1", "rating": 200.1}'
              . 'POST /library/book?refresh'
              . '{"title": "Book #2", "rating": 1.7}'
              . 'POST /library/book?refresh'
              . '{"title": "Book #3", "rating": 0.1}'
              . 'GET /_search?filter_path=hits.hits._source&_source=title&sort=rating:desc';

        // TODO -- make assertion
    }

    /**
     * Tag:  b9a153725b28fdd0a5aabd7f17a8c2d7
     * Line: 405
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL405_b9a153725b28fdd0a5aabd7f17a8c2d7()
    {
        $client = $this->getClient();
        // tag::b9a153725b28fdd0a5aabd7f17a8c2d7[]
        // TODO -- Implement Example
        // GET twitter/_settings?flat_settings=true
        // end::b9a153725b28fdd0a5aabd7f17a8c2d7[]

        $curl = 'GET twitter/_settings?flat_settings=true';

        // TODO -- make assertion
    }

    /**
     * Tag:  5925c23a173a63bdb30b458248d1df76
     * Line: 436
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL436_5925c23a173a63bdb30b458248d1df76()
    {
        $client = $this->getClient();
        // tag::5925c23a173a63bdb30b458248d1df76[]
        // TODO -- Implement Example
        // GET twitter/_settings?flat_settings=false
        // end::5925c23a173a63bdb30b458248d1df76[]

        $curl = 'GET twitter/_settings?flat_settings=false';

        // TODO -- make assertion
    }

    /**
     * Tag:  a6f8636b03cc5f677b7d89e750328612
     * Line: 601
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL601_a6f8636b03cc5f677b7d89e750328612()
    {
        $client = $this->getClient();
        // tag::a6f8636b03cc5f677b7d89e750328612[]
        // TODO -- Implement Example
        // POST /twitter/_search?size=surprise_me
        // end::a6f8636b03cc5f677b7d89e750328612[]

        $curl = 'POST /twitter/_search?size=surprise_me';

        // TODO -- make assertion
    }

    /**
     * Tag:  6d1e75312a28a5ba23837abf768f2510
     * Line: 635
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL635_6d1e75312a28a5ba23837abf768f2510()
    {
        $client = $this->getClient();
        // tag::6d1e75312a28a5ba23837abf768f2510[]
        // TODO -- Implement Example
        // POST /twitter/_search?size=surprise_me&error_trace=true
        // end::6d1e75312a28a5ba23837abf768f2510[]

        $curl = 'POST /twitter/_search?size=surprise_me&error_trace=true';

        // TODO -- make assertion
    }

// %__METHOD__%













}
