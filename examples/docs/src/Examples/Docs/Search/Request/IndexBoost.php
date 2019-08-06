<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: IndexBoost
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/request/index-boost.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class IndexBoost extends SimpleExamplesTester {

    /**
     * Tag:  393c6b7a2e8c3381530c41ff2f7c4991
     * Line: 11
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL11_393c6b7a2e8c3381530c41ff2f7c4991()
    {
        $client = $this->getClient();
        // tag::393c6b7a2e8c3381530c41ff2f7c4991[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "indices_boost" : {
        //         "index1" : 1.4,
        //         "index2" : 1.3
        //     }
        // }
        // end::393c6b7a2e8c3381530c41ff2f7c4991[]

        $curl = 'GET /_search'
              . '{'
              . '    "indices_boost" : {'
              . '        "index1" : 1.4,'
              . '        "index2" : 1.3'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  fb8a4322825d26c4e7b41bd763b3d392
     * Line: 26
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL26_fb8a4322825d26c4e7b41bd763b3d392()
    {
        $client = $this->getClient();
        // tag::fb8a4322825d26c4e7b41bd763b3d392[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "indices_boost" : [
        //         { "alias1" : 1.4 },
        //         { "index*" : 1.3 }
        //     ]
        // }
        // end::fb8a4322825d26c4e7b41bd763b3d392[]

        $curl = 'GET /_search'
              . '{'
              . '    "indices_boost" : ['
              . '        { "alias1" : 1.4 },'
              . '        { "index*" : 1.3 }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
