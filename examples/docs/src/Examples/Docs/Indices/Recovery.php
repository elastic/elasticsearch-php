<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Recovery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/recovery.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Recovery extends SimpleExamplesTester {

    /**
     * Tag:  13ebcb01ebf1b5d2b5c52739db47e30c
     * Line: 10
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL10_13ebcb01ebf1b5d2b5c52739db47e30c()
    {
        $client = $this->getClient();
        // tag::13ebcb01ebf1b5d2b5c52739db47e30c[]
        // TODO -- Implement Example
        // GET index1,index2/_recovery?human
        // end::13ebcb01ebf1b5d2b5c52739db47e30c[]

        $curl = 'GET index1,index2/_recovery?human';

        // TODO -- make assertion
    }

    /**
     * Tag:  5dfb23f6e36ef484f1d3271bae76a8d1
     * Line: 67
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL67_5dfb23f6e36ef484f1d3271bae76a8d1()
    {
        $client = $this->getClient();
        // tag::5dfb23f6e36ef484f1d3271bae76a8d1[]
        // TODO -- Implement Example
        // GET /_recovery?human
        // end::5dfb23f6e36ef484f1d3271bae76a8d1[]

        $curl = 'GET /_recovery?human';

        // TODO -- make assertion
    }

    /**
     * Tag:  5619103306878d58a058bce87c5bd82b
     * Line: 159
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL159_5619103306878d58a058bce87c5bd82b()
    {
        $client = $this->getClient();
        // tag::5619103306878d58a058bce87c5bd82b[]
        // TODO -- Implement Example
        // GET _recovery?human&detailed=true
        // end::5619103306878d58a058bce87c5bd82b[]

        $curl = 'GET _recovery?human&detailed=true';

        // TODO -- make assertion
    }

// %__METHOD__%




}
