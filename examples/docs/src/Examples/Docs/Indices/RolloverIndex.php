<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: RolloverIndex
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/rollover-index.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class RolloverIndex extends SimpleExamplesTester {

    /**
     * Tag:  593c11e8a9f88ec2629f2eb33cded9b7
     * Line: 40
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL40_593c11e8a9f88ec2629f2eb33cded9b7()
    {
        $client = $this->getClient();
        // tag::593c11e8a9f88ec2629f2eb33cded9b7[]
        // TODO -- Implement Example
        // PUT /logs-000001 \<1>
        // {
        //   "aliases": {
        //     "logs_write": {}
        //   }
        // }
        // # Add > 1000 documents to logs-000001
        // POST /logs_write/_rollover \<2>
        // {
        //   "conditions": {
        //     "max_age":   "7d",
        //     "max_docs":  1000,
        //     "max_size":  "5gb"
        //   }
        // }
        // end::593c11e8a9f88ec2629f2eb33cded9b7[]

        $curl = 'PUT /logs-000001 \<1>'
              . '{'
              . '  "aliases": {'
              . '    "logs_write": {}'
              . '  }'
              . '}'
              . '# Add > 1000 documents to logs-000001'
              . 'POST /logs_write/_rollover \<2>'
              . '{'
              . '  "conditions": {'
              . '    "max_age":   "7d",'
              . '    "max_docs":  1000,'
              . '    "max_size":  "5gb"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  659247d91f61ceb17cbcc60801fd3456
     * Line: 102
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL102_659247d91f61ceb17cbcc60801fd3456()
    {
        $client = $this->getClient();
        // tag::659247d91f61ceb17cbcc60801fd3456[]
        // TODO -- Implement Example
        // POST /my_alias/_rollover/my_new_index_name
        // {
        //   "conditions": {
        //     "max_age":   "7d",
        //     "max_docs":  1000,
        //     "max_size": "5gb"
        //   }
        // }
        // end::659247d91f61ceb17cbcc60801fd3456[]

        $curl = 'POST /my_alias/_rollover/my_new_index_name'
              . '{'
              . '  "conditions": {'
              . '    "max_age":   "7d",'
              . '    "max_docs":  1000,'
              . '    "max_size": "5gb"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8f6ef669c09e0c8bfc2731f422471770
     * Line: 126
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL126_8f6ef669c09e0c8bfc2731f422471770()
    {
        $client = $this->getClient();
        // tag::8f6ef669c09e0c8bfc2731f422471770[]
        // TODO -- Implement Example
        // # PUT /<logs-{now/d}-1> with URI encoding:
        // PUT /%3Clogs-%7Bnow%2Fd%7D-1%3E \<1>
        // {
        //   "aliases": {
        //     "logs_write": {}
        //   }
        // }
        // PUT logs_write/_doc/1
        // {
        //   "message": "a dummy log"
        // }
        // POST logs_write/_refresh
        // # Wait for a day to pass
        // POST /logs_write/_rollover \<2>
        // {
        //   "conditions": {
        //     "max_docs":   "1"
        //   }
        // }
        // end::8f6ef669c09e0c8bfc2731f422471770[]

        $curl = '# PUT /<logs-{now/d}-1> with URI encoding:'
              . 'PUT /%3Clogs-%7Bnow%2Fd%7D-1%3E \<1>'
              . '{'
              . '  "aliases": {'
              . '    "logs_write": {}'
              . '  }'
              . '}'
              . 'PUT logs_write/_doc/1'
              . '{'
              . '  "message": "a dummy log"'
              . '}'
              . 'POST logs_write/_refresh'
              . '# Wait for a day to pass'
              . 'POST /logs_write/_rollover \<2>'
              . '{'
              . '  "conditions": {'
              . '    "max_docs":   "1"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  03584e88046614ec7727db506d866f48
     * Line: 187
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL187_03584e88046614ec7727db506d866f48()
    {
        $client = $this->getClient();
        // tag::03584e88046614ec7727db506d866f48[]
        // TODO -- Implement Example
        // # GET /<logs-{now/d}-*>,<logs-{now/d-1d}-*>,<logs-{now/d-2d}-*>/_search
        // GET /%3Clogs-%7Bnow%2Fd%7D-*%3E%2C%3Clogs-%7Bnow%2Fd-1d%7D-*%3E%2C%3Clogs-%7Bnow%2Fd-2d%7D-*%3E/_search
        // end::03584e88046614ec7727db506d866f48[]

        $curl = '# GET /<logs-{now/d}-*>,<logs-{now/d-1d}-*>,<logs-{now/d-2d}-*>/_search'
              . 'GET /%3Clogs-%7Bnow%2Fd%7D-*%3E%2C%3Clogs-%7Bnow%2Fd-1d%7D-*%3E%2C%3Clogs-%7Bnow%2Fd-2d%7D-*%3E/_search';

        // TODO -- make assertion
    }

    /**
     * Tag:  75f887596c4972bc679929ca996698f2
     * Line: 206
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL206_75f887596c4972bc679929ca996698f2()
    {
        $client = $this->getClient();
        // tag::75f887596c4972bc679929ca996698f2[]
        // TODO -- Implement Example
        // PUT /logs-000001
        // {
        //   "aliases": {
        //     "logs_write": {}
        //   }
        // }
        // POST /logs_write/_rollover
        // {
        //   "conditions" : {
        //     "max_age": "7d",
        //     "max_docs": 1000,
        //     "max_size": "5gb"
        //   },
        //   "settings": {
        //     "index.number_of_shards": 2
        //   }
        // }
        // end::75f887596c4972bc679929ca996698f2[]

        $curl = 'PUT /logs-000001'
              . '{'
              . '  "aliases": {'
              . '    "logs_write": {}'
              . '  }'
              . '}'
              . 'POST /logs_write/_rollover'
              . '{'
              . '  "conditions" : {'
              . '    "max_age": "7d",'
              . '    "max_docs": 1000,'
              . '    "max_size": "5gb"'
              . '  },'
              . '  "settings": {'
              . '    "index.number_of_shards": 2'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9c5c59e10bb60f2fd8958d63de91826f
     * Line: 235
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL235_9c5c59e10bb60f2fd8958d63de91826f()
    {
        $client = $this->getClient();
        // tag::9c5c59e10bb60f2fd8958d63de91826f[]
        // TODO -- Implement Example
        // PUT /logs-000001
        // {
        //   "aliases": {
        //     "logs_write": {}
        //   }
        // }
        // POST /logs_write/_rollover?dry_run
        // {
        //   "conditions" : {
        //     "max_age": "7d",
        //     "max_docs": 1000,
        //     "max_size": "5gb"
        //   }
        // }
        // end::9c5c59e10bb60f2fd8958d63de91826f[]

        $curl = 'PUT /logs-000001'
              . '{'
              . '  "aliases": {'
              . '    "logs_write": {}'
              . '  }'
              . '}'
              . 'POST /logs_write/_rollover?dry_run'
              . '{'
              . '  "conditions" : {'
              . '    "max_age": "7d",'
              . '    "max_docs": 1000,'
              . '    "max_size": "5gb"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9e9a3ad495e6305563a88dd4c74a5fda
     * Line: 277
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL277_9e9a3ad495e6305563a88dd4c74a5fda()
    {
        $client = $this->getClient();
        // tag::9e9a3ad495e6305563a88dd4c74a5fda[]
        // TODO -- Implement Example
        // PUT my_logs_index-000001
        // {
        //   "aliases": {
        //     "logs": { "is_write_index": true } \<1>
        //   }
        // }
        // PUT logs/_doc/1
        // {
        //   "message": "a dummy log"
        // }
        // POST logs/_refresh
        // POST /logs/_rollover
        // {
        //   "conditions": {
        //     "max_docs":   "1"
        //   }
        // }
        // PUT logs/_doc/2 \<2>
        // {
        //   "message": "a newer log"
        // }
        // end::9e9a3ad495e6305563a88dd4c74a5fda[]

        $curl = 'PUT my_logs_index-000001'
              . '{'
              . '  "aliases": {'
              . '    "logs": { "is_write_index": true } \<1>'
              . '  }'
              . '}'
              . 'PUT logs/_doc/1'
              . '{'
              . '  "message": "a dummy log"'
              . '}'
              . 'POST logs/_refresh'
              . 'POST /logs/_rollover'
              . '{'
              . '  "conditions": {'
              . '    "max_docs":   "1"'
              . '  }'
              . '}'
              . 'PUT logs/_doc/2 \<2>'
              . '{'
              . '  "message": "a newer log"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%








}
