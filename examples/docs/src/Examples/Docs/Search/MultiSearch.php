<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MultiSearch
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/multi-search.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MultiSearch extends SimpleExamplesTester {

    /**
     * Tag:  05af5eab63bf98d0078dfe661cd81124
     * Line: 65
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL65_05af5eab63bf98d0078dfe661cd81124()
    {
        $client = $this->getClient();
        // tag::05af5eab63bf98d0078dfe661cd81124[]
        // TODO -- Implement Example
        // GET twitter/_msearch
        // {}
        // {"query" : {"match_all" : {}}, "from" : 0, "size" : 10}
        // {}
        // {"query" : {"match_all" : {}}}
        // {"index" : "twitter2"}
        // {"query" : {"match_all" : {}}}
        // end::05af5eab63bf98d0078dfe661cd81124[]

        $curl = 'GET twitter/_msearch'
              . '{}'
              . '{"query" : {"match_all" : {}}, "from" : 0, "size" : 10}'
              . '{}'
              . '{"query" : {"match_all" : {}}}'
              . '{"index" : "twitter2"}'
              . '{"query" : {"match_all" : {}}}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a914be2ff7dd0cbdec0257f0ad50b625
     * Line: 113
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL113_a914be2ff7dd0cbdec0257f0ad50b625()
    {
        $client = $this->getClient();
        // tag::a914be2ff7dd0cbdec0257f0ad50b625[]
        // TODO -- Implement Example
        // GET _msearch/template
        // {"index" : "twitter"}
        // { "source" : "{ \"query\": { \"match\": { \"message\" : \"{{keywords}}\" } } } }", "params": { "query_type": "match", "keywords": "some message" } }
        // {"index" : "twitter"}
        // { "source" : "{ \"query\": { \"match_{{template}}\": {} } }", "params": { "template": "all" } }
        // end::a914be2ff7dd0cbdec0257f0ad50b625[]

        $curl = 'GET _msearch/template'
              . '{"index" : "twitter"}'
              . '{ "source" : "{ \"query\": { \"match\": { \"message\" : \"{{keywords}}\" } } } }", "params": { "query_type": "match", "keywords": "some message" } }'
              . '{"index" : "twitter"}'
              . '{ "source" : "{ \"query\": { \"match_{{template}}\": {} } }", "params": { "template": "all" } }';

        // TODO -- make assertion
    }

    /**
     * Tag:  28e66ff0ecdd71cb1426880115eab5dd
     * Line: 128
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL128_28e66ff0ecdd71cb1426880115eab5dd()
    {
        $client = $this->getClient();
        // tag::28e66ff0ecdd71cb1426880115eab5dd[]
        // TODO -- Implement Example
        // POST /_scripts/my_template_1
        // {
        //     "script": {
        //         "lang": "mustache",
        //         "source": {
        //             "query": {
        //                 "match": {
        //                     "message": "{{query_string}}"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::28e66ff0ecdd71cb1426880115eab5dd[]

        $curl = 'POST /_scripts/my_template_1'
              . '{'
              . '    "script": {'
              . '        "lang": "mustache",'
              . '        "source": {'
              . '            "query": {'
              . '                "match": {'
              . '                    "message": "{{query_string}}"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  72e72cb3aa1b10b903d8cadcaddf7d10
     * Line: 147
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL147_72e72cb3aa1b10b903d8cadcaddf7d10()
    {
        $client = $this->getClient();
        // tag::72e72cb3aa1b10b903d8cadcaddf7d10[]
        // TODO -- Implement Example
        // POST /_scripts/my_template_2
        // {
        //     "script": {
        //         "lang": "mustache",
        //         "source": {
        //             "query": {
        //                 "term": {
        //                     "{{field}}": "{{value}}"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::72e72cb3aa1b10b903d8cadcaddf7d10[]

        $curl = 'POST /_scripts/my_template_2'
              . '{'
              . '    "script": {'
              . '        "lang": "mustache",'
              . '        "source": {'
              . '            "query": {'
              . '                "term": {'
              . '                    "{{field}}": "{{value}}"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8b4c8f395c0a6f952a42051a0d357154
     * Line: 168
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL168_8b4c8f395c0a6f952a42051a0d357154()
    {
        $client = $this->getClient();
        // tag::8b4c8f395c0a6f952a42051a0d357154[]
        // TODO -- Implement Example
        // GET _msearch/template
        // {"index" : "main"}
        // { "id": "my_template_1", "params": { "query_string": "some message" } }
        // {"index" : "main"}
        // { "id": "my_template_2", "params": { "field": "user", "value": "test" } }
        // end::8b4c8f395c0a6f952a42051a0d357154[]

        $curl = 'GET _msearch/template'
              . '{"index" : "main"}'
              . '{ "id": "my_template_1", "params": { "query_string": "some message" } }'
              . '{"index" : "main"}'
              . '{ "id": "my_template_2", "params": { "field": "user", "value": "test" } }';

        // TODO -- make assertion
    }

// %__METHOD__%






}
