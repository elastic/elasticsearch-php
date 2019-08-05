<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ScriptFields
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   search/request/script-fields.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ScriptFields extends SimpleExamplesTester {

    /**
     * Tag:  68358f94e77b5dce7eb01679516bae69
     * Line: 8
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL8_68358f94e77b5dce7eb01679516bae69()
    {
        $client = $this->getClient();
        // tag::68358f94e77b5dce7eb01679516bae69[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "match_all": {}
        //     },
        //     "script_fields" : {
        //         "test1" : {
        //             "script" : {
        //                 "lang": "painless",
        //                 "source": "doc['price'].value * 2"
        //             }
        //         },
        //         "test2" : {
        //             "script" : {
        //                 "lang": "painless",
        //                 "source": "doc['price'].value * params.factor",
        //                 "params" : {
        //                     "factor"  : 2.0
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::68358f94e77b5dce7eb01679516bae69[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "match_all": {}'
              . '    },'
              . '    "script_fields" : {'
              . '        "test1" : {'
              . '            "script" : {'
              . '                "lang": "painless",'
              . '                "source": "doc['price'].value * 2"'
              . '            }'
              . '        },'
              . '        "test2" : {'
              . '            "script" : {'
              . '                "lang": "painless",'
              . '                "source": "doc['price'].value * params.factor",'
              . '                "params" : {'
              . '                    "factor"  : 2.0'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  34dd16c077e81b3744963b19a3dc9e49
     * Line: 45
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL45_34dd16c077e81b3744963b19a3dc9e49()
    {
        $client = $this->getClient();
        // tag::34dd16c077e81b3744963b19a3dc9e49[]
        // TODO -- Implement Example
        // GET /_search
        //     {
        //         "query" : {
        //             "match_all": {}
        //         },
        //         "script_fields" : {
        //             "test1" : {
        //                 "script" : "params['_source']['message']"
        //             }
        //         }
        //     }
        // end::34dd16c077e81b3744963b19a3dc9e49[]

        $curl = 'GET /_search'
              . '    {'
              . '        "query" : {'
              . '            "match_all": {}'
              . '        },'
              . '        "script_fields" : {'
              . '            "test1" : {'
              . '                "script" : "params['_source']['message']"'
              . '            }'
              . '        }'
              . '    }';

        // TODO -- make assertion
    }

// %__METHOD__%



}
