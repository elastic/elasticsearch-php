<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ilm\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SlmApi
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ilm/apis/slm-api.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SlmApi extends SimpleExamplesTester {

    /**
     * Tag:  f0f1a2ad8f815d8dfea122420b295a35
     * Line: 52
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL52_f0f1a2ad8f815d8dfea122420b295a35()
    {
        $client = $this->getClient();
        // tag::f0f1a2ad8f815d8dfea122420b295a35[]
        // TODO -- Implement Example
        // PUT /_slm/policy/daily-snapshots
        // {
        //   "schedule": "0 30 1 * * ?", \<1>
        //   "name": "<daily-snap-{now/d}>", \<2>
        //   "repository": "my_repository", \<3>
        //   "config": { \<4>
        //     "indices": ["data-*", "important"], \<5>
        //     "ignore_unavailable": false,
        //     "include_global_state": false
        //   }
        // }
        // end::f0f1a2ad8f815d8dfea122420b295a35[]

        $curl = 'PUT /_slm/policy/daily-snapshots'
              . '{'
              . '  "schedule": "0 30 1 * * ?", \<1>'
              . '  "name": "<daily-snap-{now/d}>", \<2>'
              . '  "repository": "my_repository", \<3>'
              . '  "config": { \<4>'
              . '    "indices": ["data-*", "important"], \<5>'
              . '    "ignore_unavailable": false,'
              . '    "include_global_state": false'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b4f9fe8808cb27a210b162e7aaba261d
     * Line: 116
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL116_b4f9fe8808cb27a210b162e7aaba261d()
    {
        $client = $this->getClient();
        // tag::b4f9fe8808cb27a210b162e7aaba261d[]
        // TODO -- Implement Example
        // GET /_slm/policy/daily-snapshots?human
        // end::b4f9fe8808cb27a210b162e7aaba261d[]

        $curl = 'GET /_slm/policy/daily-snapshots?human';

        // TODO -- make assertion
    }

    /**
     * Tag:  bc2dd9e5ed37f98016ecf53f968d2211
     * Line: 154
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL154_bc2dd9e5ed37f98016ecf53f968d2211()
    {
        $client = $this->getClient();
        // tag::bc2dd9e5ed37f98016ecf53f968d2211[]
        // TODO -- Implement Example
        // GET /_slm/policy
        // end::bc2dd9e5ed37f98016ecf53f968d2211[]

        $curl = 'GET /_slm/policy';

        // TODO -- make assertion
    }

    /**
     * Tag:  c2837666ce06acefbdd575bcc727b370
     * Line: 178
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL178_c2837666ce06acefbdd575bcc727b370()
    {
        $client = $this->getClient();
        // tag::c2837666ce06acefbdd575bcc727b370[]
        // TODO -- Implement Example
        // PUT /_slm/policy/daily-snapshots/_execute
        // end::c2837666ce06acefbdd575bcc727b370[]

        $curl = 'PUT /_slm/policy/daily-snapshots/_execute';

        // TODO -- make assertion
    }

    /**
     * Tag:  b4f9fe8808cb27a210b162e7aaba261d
     * Line: 201
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL201_b4f9fe8808cb27a210b162e7aaba261d()
    {
        $client = $this->getClient();
        // tag::b4f9fe8808cb27a210b162e7aaba261d[]
        // TODO -- Implement Example
        // GET /_slm/policy/daily-snapshots?human
        // end::b4f9fe8808cb27a210b162e7aaba261d[]

        $curl = 'GET /_slm/policy/daily-snapshots?human';

        // TODO -- make assertion
    }

    /**
     * Tag:  b9e0a99932e6f9ee620f5ca7f8588163
     * Line: 247
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL247_b9e0a99932e6f9ee620f5ca7f8588163()
    {
        $client = $this->getClient();
        // tag::b9e0a99932e6f9ee620f5ca7f8588163[]
        // TODO -- Implement Example
        // PUT /_slm/policy/daily-snapshots
        // {
        //   "schedule": "0 30 1 * * ?",
        //   "name": "<daily-snap-{now/d}>",
        //   "repository": "my_repository",
        //   "config": {
        //     "indices": ["data-*", "important"],
        //     "ignore_unavailable": true,
        //     "include_global_state": false
        //   }
        // }
        // end::b9e0a99932e6f9ee620f5ca7f8588163[]

        $curl = 'PUT /_slm/policy/daily-snapshots'
              . '{'
              . '  "schedule": "0 30 1 * * ?",'
              . '  "name": "<daily-snap-{now/d}>",'
              . '  "repository": "my_repository",'
              . '  "config": {'
              . '    "indices": ["data-*", "important"],'
              . '    "ignore_unavailable": true,'
              . '    "include_global_state": false'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c2837666ce06acefbdd575bcc727b370
     * Line: 266
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL266_c2837666ce06acefbdd575bcc727b370()
    {
        $client = $this->getClient();
        // tag::c2837666ce06acefbdd575bcc727b370[]
        // TODO -- Implement Example
        // PUT /_slm/policy/daily-snapshots/_execute
        // end::c2837666ce06acefbdd575bcc727b370[]

        $curl = 'PUT /_slm/policy/daily-snapshots/_execute';

        // TODO -- make assertion
    }

    /**
     * Tag:  b4f9fe8808cb27a210b162e7aaba261d
     * Line: 284
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL284_b4f9fe8808cb27a210b162e7aaba261d()
    {
        $client = $this->getClient();
        // tag::b4f9fe8808cb27a210b162e7aaba261d[]
        // TODO -- Implement Example
        // GET /_slm/policy/daily-snapshots?human
        // end::b4f9fe8808cb27a210b162e7aaba261d[]

        $curl = 'GET /_slm/policy/daily-snapshots?human';

        // TODO -- make assertion
    }

    /**
     * Tag:  1a1f3421717ff744ed83232729289bb0
     * Line: 346
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL346_1a1f3421717ff744ed83232729289bb0()
    {
        $client = $this->getClient();
        // tag::1a1f3421717ff744ed83232729289bb0[]
        // TODO -- Implement Example
        // DELETE /_slm/policy/daily-snapshots
        // end::1a1f3421717ff744ed83232729289bb0[]

        $curl = 'DELETE /_slm/policy/daily-snapshots';

        // TODO -- make assertion
    }

// %__METHOD__%










}
