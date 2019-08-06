<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cat;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Snapshots
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cat/snapshots.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Snapshots extends SimpleExamplesTester {

    /**
     * Tag:  706fc4b9e4df1f6ee3fe34194492c20e
     * Line: 10
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL10_706fc4b9e4df1f6ee3fe34194492c20e()
    {
        $client = $this->getClient();
        // tag::706fc4b9e4df1f6ee3fe34194492c20e[]
        // TODO -- Implement Example
        // GET /_cat/snapshots/repo1?v&s=id
        // end::706fc4b9e4df1f6ee3fe34194492c20e[]

        $curl = 'GET /_cat/snapshots/repo1?v&s=id';

        // TODO -- make assertion
    }

    /**
     * Tag:  18bd891c5a3d7dfd4dee6a9a9baae825
     * Line: 41
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL41_18bd891c5a3d7dfd4dee6a9a9baae825()
    {
        $client = $this->getClient();
        // tag::18bd891c5a3d7dfd4dee6a9a9baae825[]
        // TODO -- Implement Example
        // GET /_cat/snapshots/_all
        // GET /_cat/snapshots/repo1,repo2
        // GET /_cat/snapshots/repo*
        // end::18bd891c5a3d7dfd4dee6a9a9baae825[]

        $curl = 'GET /_cat/snapshots/_all'
              . 'GET /_cat/snapshots/repo1,repo2'
              . 'GET /_cat/snapshots/repo*';

        // TODO -- make assertion
    }

// %__METHOD__%



}
