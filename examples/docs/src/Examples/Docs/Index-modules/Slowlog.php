<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Index-modules;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Slowlog
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   index-modules/slowlog.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Slowlog extends SimpleExamplesTester {

    /**
     * Tag:  fa0b341d790a4da480b47bf501835359
     * Line: 33
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL33_fa0b341d790a4da480b47bf501835359()
    {
        $client = $this->getClient();
        // tag::fa0b341d790a4da480b47bf501835359[]
        // TODO -- Implement Example
        // PUT /twitter/_settings
        // {
        //     "index.search.slowlog.threshold.query.warn": "10s",
        //     "index.search.slowlog.threshold.query.info": "5s",
        //     "index.search.slowlog.threshold.query.debug": "2s",
        //     "index.search.slowlog.threshold.query.trace": "500ms",
        //     "index.search.slowlog.threshold.fetch.warn": "1s",
        //     "index.search.slowlog.threshold.fetch.info": "800ms",
        //     "index.search.slowlog.threshold.fetch.debug": "500ms",
        //     "index.search.slowlog.threshold.fetch.trace": "200ms",
        //     "index.search.slowlog.level": "info"
        // }
        // end::fa0b341d790a4da480b47bf501835359[]

        $curl = 'PUT /twitter/_settings'
              . '{'
              . '    "index.search.slowlog.threshold.query.warn": "10s",'
              . '    "index.search.slowlog.threshold.query.info": "5s",'
              . '    "index.search.slowlog.threshold.query.debug": "2s",'
              . '    "index.search.slowlog.threshold.query.trace": "500ms",'
              . '    "index.search.slowlog.threshold.fetch.warn": "1s",'
              . '    "index.search.slowlog.threshold.fetch.info": "800ms",'
              . '    "index.search.slowlog.threshold.fetch.debug": "500ms",'
              . '    "index.search.slowlog.threshold.fetch.trace": "200ms",'
              . '    "index.search.slowlog.level": "info"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  44a16db65121edaf099d944819356e2c
     * Line: 109
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL109_44a16db65121edaf099d944819356e2c()
    {
        $client = $this->getClient();
        // tag::44a16db65121edaf099d944819356e2c[]
        // TODO -- Implement Example
        // PUT /twitter/_settings
        // {
        //     "index.indexing.slowlog.threshold.index.warn": "10s",
        //     "index.indexing.slowlog.threshold.index.info": "5s",
        //     "index.indexing.slowlog.threshold.index.debug": "2s",
        //     "index.indexing.slowlog.threshold.index.trace": "500ms",
        //     "index.indexing.slowlog.level": "info",
        //     "index.indexing.slowlog.source": "1000"
        // }
        // end::44a16db65121edaf099d944819356e2c[]

        $curl = 'PUT /twitter/_settings'
              . '{'
              . '    "index.indexing.slowlog.threshold.index.warn": "10s",'
              . '    "index.indexing.slowlog.threshold.index.info": "5s",'
              . '    "index.indexing.slowlog.threshold.index.debug": "2s",'
              . '    "index.indexing.slowlog.threshold.index.trace": "500ms",'
              . '    "index.indexing.slowlog.level": "info",'
              . '    "index.indexing.slowlog.source": "1000"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
