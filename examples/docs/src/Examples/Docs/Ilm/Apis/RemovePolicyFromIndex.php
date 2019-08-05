<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ilm\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: RemovePolicyFromIndex
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ilm/apis/remove-policy-from-index.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class RemovePolicyFromIndex extends SimpleExamplesTester {

    /**
     * Tag:  8bec5a437f4aea6f3f897c9df2ce2442
     * Line: 78
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL78_8bec5a437f4aea6f3f897c9df2ce2442()
    {
        $client = $this->getClient();
        // tag::8bec5a437f4aea6f3f897c9df2ce2442[]
        // TODO -- Implement Example
        // POST my_index/_ilm/remove
        // end::8bec5a437f4aea6f3f897c9df2ce2442[]

        $curl = 'POST my_index/_ilm/remove';

        // TODO -- make assertion
    }

    /**
     * Tag:  7464040de4facd0800a50d9488d41808
     * Line: 87
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL87_7464040de4facd0800a50d9488d41808()
    {
        $client = $this->getClient();
        // tag::7464040de4facd0800a50d9488d41808[]
        // TODO -- Implement Example
        // {
        //   "has_failures" : false,
        //   "failed_indexes" : []
        // }
        // end::7464040de4facd0800a50d9488d41808[]

        $curl = '{'
              . '  "has_failures" : false,'
              . '  "failed_indexes" : []'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
