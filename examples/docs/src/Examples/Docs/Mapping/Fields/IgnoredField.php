<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Fields;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: IgnoredField
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/fields/ignored-field.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class IgnoredField extends SimpleExamplesTester {

    /**
     * Tag:  3fe0fb38f75d2a34fb1e6ac9bedbcdbc
     * Line: 18
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL18_3fe0fb38f75d2a34fb1e6ac9bedbcdbc()
    {
        $client = $this->getClient();
        // tag::3fe0fb38f75d2a34fb1e6ac9bedbcdbc[]
        // TODO -- Implement Example
        // GET _search
        // {
        //   "query": {
        //     "exists": {
        //       "field": "_ignored"
        //     }
        //   }
        // }
        // end::3fe0fb38f75d2a34fb1e6ac9bedbcdbc[]

        $curl = 'GET _search'
              . '{'
              . '  "query": {'
              . '    "exists": {'
              . '      "field": "_ignored"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  cf47cd4a39cd62a3ecad919e54a67bca
     * Line: 34
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL34_cf47cd4a39cd62a3ecad919e54a67bca()
    {
        $client = $this->getClient();
        // tag::cf47cd4a39cd62a3ecad919e54a67bca[]
        // TODO -- Implement Example
        // GET _search
        // {
        //   "query": {
        //     "term": {
        //       "_ignored": "@timestamp"
        //     }
        //   }
        // }
        // end::cf47cd4a39cd62a3ecad919e54a67bca[]

        $curl = 'GET _search'
              . '{'
              . '  "query": {'
              . '    "term": {'
              . '      "_ignored": "@timestamp"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
