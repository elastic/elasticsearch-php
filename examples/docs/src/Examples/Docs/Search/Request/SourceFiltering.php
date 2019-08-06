<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SourceFiltering
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/request/source-filtering.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SourceFiltering extends SimpleExamplesTester {

    /**
     * Tag:  08c5b266f5e5534dc094346974cf7386
     * Line: 15
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL15_08c5b266f5e5534dc094346974cf7386()
    {
        $client = $this->getClient();
        // tag::08c5b266f5e5534dc094346974cf7386[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "_source": false,
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::08c5b266f5e5534dc094346974cf7386[]

        $curl = 'GET /_search'
              . '{'
              . '    "_source": false,'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5c10e00c99b338353b3e486e94be253e
     * Line: 31
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL31_5c10e00c99b338353b3e486e94be253e()
    {
        $client = $this->getClient();
        // tag::5c10e00c99b338353b3e486e94be253e[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "_source": "obj.*",
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::5c10e00c99b338353b3e486e94be253e[]

        $curl = 'GET /_search'
              . '{'
              . '    "_source": "obj.*",'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  160ae4ff9c53b8a98700caed0e82d7fe
     * Line: 45
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL45_160ae4ff9c53b8a98700caed0e82d7fe()
    {
        $client = $this->getClient();
        // tag::160ae4ff9c53b8a98700caed0e82d7fe[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "_source": [ "obj1.*", "obj2.*" ],
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::160ae4ff9c53b8a98700caed0e82d7fe[]

        $curl = 'GET /_search'
              . '{'
              . '    "_source": [ "obj1.*", "obj2.*" ],'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1e86a78433a0748970d6c3922a34898c
     * Line: 63
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL63_1e86a78433a0748970d6c3922a34898c()
    {
        $client = $this->getClient();
        // tag::1e86a78433a0748970d6c3922a34898c[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "_source": {
        //         "includes": [ "obj1.*", "obj2.*" ],
        //         "excludes": [ "*.description" ]
        //     },
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::1e86a78433a0748970d6c3922a34898c[]

        $curl = 'GET /_search'
              . '{'
              . '    "_source": {'
              . '        "includes": [ "obj1.*", "obj2.*" ],'
              . '        "excludes": [ "*.description" ]'
              . '    },'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
