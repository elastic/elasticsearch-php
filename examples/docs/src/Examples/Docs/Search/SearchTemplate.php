<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SearchTemplate
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   search/search-template.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SearchTemplate extends SimpleExamplesTester {

    /**
     * Tag:  e068d93555351b9afbdb9dd2aff6368d
     * Line: 8
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL8_e068d93555351b9afbdb9dd2aff6368d()
    {
        $client = $this->getClient();
        // tag::e068d93555351b9afbdb9dd2aff6368d[]
        // TODO -- Implement Example
        // GET _search/template
        // {
        //     "source" : {
        //       "query": { "match" : { "{{my_field}}" : "{{my_value}}" } },
        //       "size" : "{{my_size}}"
        //     },
        //     "params" : {
        //         "my_field" : "message",
        //         "my_value" : "some message",
        //         "my_size" : 5
        //     }
        // }
        // end::e068d93555351b9afbdb9dd2aff6368d[]

        $curl = 'GET _search/template'
              . '{'
              . '    "source" : {'
              . '      "query": { "match" : { "{{my_field}}" : "{{my_value}}" } },'
              . '      "size" : "{{my_size}}"'
              . '    },'
              . '    "params" : {'
              . '        "my_field" : "message",'
              . '        "my_value" : "some message",'
              . '        "my_size" : 5'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4697b9aa952ac1613ee1a6ec7b3223c1
     * Line: 41
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL41_4697b9aa952ac1613ee1a6ec7b3223c1()
    {
        $client = $this->getClient();
        // tag::4697b9aa952ac1613ee1a6ec7b3223c1[]
        // TODO -- Implement Example
        // GET _search/template
        // {
        //     "source": {
        //         "query": {
        //             "term": {
        //                 "message": "{{query_string}}"
        //             }
        //         }
        //     },
        //     "params": {
        //         "query_string": "search for these words"
        //     }
        // }
        // end::4697b9aa952ac1613ee1a6ec7b3223c1[]

        $curl = 'GET _search/template'
              . '{'
              . '    "source": {'
              . '        "query": {'
              . '            "term": {'
              . '                "message": "{{query_string}}"'
              . '            }'
              . '        }'
              . '    },'
              . '    "params": {'
              . '        "query_string": "search for these words"'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  eb1f3134f28a9ba8406b0f10199cf5be
     * Line: 66
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL66_eb1f3134f28a9ba8406b0f10199cf5be()
    {
        $client = $this->getClient();
        // tag::eb1f3134f28a9ba8406b0f10199cf5be[]
        // TODO -- Implement Example
        // GET _search/template
        // {
        //   "source": "{ \"query\": { \"terms\": {{#toJson}}statuses{{/toJson}} }}",
        //   "params": {
        //     "statuses" : {
        //         "status": [ "pending", "published" ]
        //     }
        //   }
        // }
        // end::eb1f3134f28a9ba8406b0f10199cf5be[]

        $curl = 'GET _search/template'
              . '{'
              . '  "source": "{ \"query\": { \"terms\": {{#toJson}}statuses{{/toJson}} }}",'
              . '  "params": {'
              . '    "statuses" : {'
              . '        "status": [ "pending", "published" ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6be45fa02e779a727ddf48f871610aa8
     * Line: 99
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL99_6be45fa02e779a727ddf48f871610aa8()
    {
        $client = $this->getClient();
        // tag::6be45fa02e779a727ddf48f871610aa8[]
        // TODO -- Implement Example
        // GET _search/template
        // {
        //     "source": "{\"query\":{\"bool\":{\"must\": {{#toJson}}clauses{{/toJson}} }}}",
        //     "params": {
        //         "clauses": [
        //             { "term": { "user" : "foo" } },
        //             { "term": { "user" : "bar" } }
        //         ]
        //    }
        // }
        // end::6be45fa02e779a727ddf48f871610aa8[]

        $curl = 'GET _search/template'
              . '{'
              . '    "source": "{\"query\":{\"bool\":{\"must\": {{#toJson}}clauses{{/toJson}} }}}",'
              . '    "params": {'
              . '        "clauses": ['
              . '            { "term": { "user" : "foo" } },'
              . '            { "term": { "user" : "bar" } }'
              . '        ]'
              . '   }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  33bb4a6ec63a709a14dfa15a5e2cca88
     * Line: 145
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL145_33bb4a6ec63a709a14dfa15a5e2cca88()
    {
        $client = $this->getClient();
        // tag::33bb4a6ec63a709a14dfa15a5e2cca88[]
        // TODO -- Implement Example
        // GET _search/template
        // {
        //   "source": {
        //     "query": {
        //       "match": {
        //         "emails": "{{#join}}emails{{/join}}"
        //       }
        //     }
        //   },
        //   "params": {
        //     "emails": [ "username@email.com", "lastname@email.com" ]
        //   }
        // }
        // end::33bb4a6ec63a709a14dfa15a5e2cca88[]

        $curl = 'GET _search/template'
              . '{'
              . '  "source": {'
              . '    "query": {'
              . '      "match": {'
              . '        "emails": "{{#join}}emails{{/join}}"'
              . '      }'
              . '    }'
              . '  },'
              . '  "params": {'
              . '    "emails": [ "username@email.com", "lastname@email.com" ]'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  02f0012ca77fdc409592e524e5647fb8
     * Line: 179
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL179_02f0012ca77fdc409592e524e5647fb8()
    {
        $client = $this->getClient();
        // tag::02f0012ca77fdc409592e524e5647fb8[]
        // TODO -- Implement Example
        // GET _search/template
        // {
        //   "source": {
        //     "query": {
        //       "range": {
        //         "born": {
        //             "gte"   : "{{date.min}}",
        //             "lte"   : "{{date.max}}",
        //             "format": "{{#join delimiter='||'}}date.formats{{/join delimiter='||'}}"
        // 	    }
        //       }
        //     }
        //   },
        //   "params": {
        //     "date": {
        //         "min": "2016",
        //         "max": "31/12/2017",
        //         "formats": ["dd/MM/yyyy", "yyyy"]
        //     }
        //   }
        // }
        // end::02f0012ca77fdc409592e524e5647fb8[]

        $curl = 'GET _search/template'
              . '{'
              . '  "source": {'
              . '    "query": {'
              . '      "range": {'
              . '        "born": {'
              . '            "gte"   : "{{date.min}}",'
              . '            "lte"   : "{{date.max}}",'
              . '            "format": "{{#join delimiter='||'}}date.formats{{/join delimiter='||'}}"'
              . '	    }'
              . '      }'
              . '    }'
              . '  },'
              . '  "params": {'
              . '    "date": {'
              . '        "min": "2016",'
              . '        "max": "31/12/2017",'
              . '        "formats": ["dd/MM/yyyy", "yyyy"]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a5cc9a86f0f9525cd86564421c721d2f
     * Line: 366
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL366_a5cc9a86f0f9525cd86564421c721d2f()
    {
        $client = $this->getClient();
        // tag::a5cc9a86f0f9525cd86564421c721d2f[]
        // TODO -- Implement Example
        // GET _render/template
        // {
        //     "source" : {
        //         "query" : {
        //             "term": {
        //                 "http_access_log": "{{#url}}{{host}}/{{page}}{{/url}}"
        //             }
        //         }
        //     },
        //     "params": {
        //         "host": "https://www.elastic.co/",
        //         "page": "learn"
        //     }
        // }
        // end::a5cc9a86f0f9525cd86564421c721d2f[]

        $curl = 'GET _render/template'
              . '{'
              . '    "source" : {'
              . '        "query" : {'
              . '            "term": {'
              . '                "http_access_log": "{{#url}}{{host}}/{{page}}{{/url}}"'
              . '            }'
              . '        }'
              . '    },'
              . '    "params": {'
              . '        "host": "https://www.elastic.co/",'
              . '        "page": "learn"'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  07248c39e529f40e1e1648a9ec48ab33
     * Line: 408
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL408_07248c39e529f40e1e1648a9ec48ab33()
    {
        $client = $this->getClient();
        // tag::07248c39e529f40e1e1648a9ec48ab33[]
        // TODO -- Implement Example
        // POST _scripts/<templatename>
        // {
        //     "script": {
        //         "lang": "mustache",
        //         "source": {
        //             "query": {
        //                 "match": {
        //                     "title": "{{query_string}}"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::07248c39e529f40e1e1648a9ec48ab33[]

        $curl = 'POST _scripts/<templatename>'
              . '{'
              . '    "script": {'
              . '        "lang": "mustache",'
              . '        "source": {'
              . '            "query": {'
              . '                "match": {'
              . '                    "title": "{{query_string}}"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7e160bad9b0524db95b27411f5955d17
     * Line: 444
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL444_7e160bad9b0524db95b27411f5955d17()
    {
        $client = $this->getClient();
        // tag::7e160bad9b0524db95b27411f5955d17[]
        // TODO -- Implement Example
        // GET _scripts/<templatename>
        // end::7e160bad9b0524db95b27411f5955d17[]

        $curl = 'GET _scripts/<templatename>';

        // TODO -- make assertion
    }

    /**
     * Tag:  310c3d0d4f00ab9aa13ca31f55f727f5
     * Line: 471
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL471_310c3d0d4f00ab9aa13ca31f55f727f5()
    {
        $client = $this->getClient();
        // tag::310c3d0d4f00ab9aa13ca31f55f727f5[]
        // TODO -- Implement Example
        // DELETE _scripts/<templatename>
        // end::310c3d0d4f00ab9aa13ca31f55f727f5[]

        $curl = 'DELETE _scripts/<templatename>';

        // TODO -- make assertion
    }

    /**
     * Tag:  e5a10173765fc4471e0ec310e275b5a1
     * Line: 495
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL495_e5a10173765fc4471e0ec310e275b5a1()
    {
        $client = $this->getClient();
        // tag::e5a10173765fc4471e0ec310e275b5a1[]
        // TODO -- Implement Example
        // GET _search/template
        // {
        //     "id": "<templateName>", \<1>
        //     "params": {
        //         "query_string": "search for these words"
        //     }
        // }
        // end::e5a10173765fc4471e0ec310e275b5a1[]

        $curl = 'GET _search/template'
              . '{'
              . '    "id": "<templateName>", \<1>'
              . '    "params": {'
              . '        "query_string": "search for these words"'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4b13f649aa2eca6f7ee4221f708430c1
     * Line: 514
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL514_4b13f649aa2eca6f7ee4221f708430c1()
    {
        $client = $this->getClient();
        // tag::4b13f649aa2eca6f7ee4221f708430c1[]
        // TODO -- Implement Example
        // GET _render/template
        // {
        //   "source": "{ \"query\": { \"terms\": {{#toJson}}statuses{{/toJson}} }}",
        //   "params": {
        //     "statuses" : {
        //         "status": [ "pending", "published" ]
        //     }
        //   }
        // }
        // end::4b13f649aa2eca6f7ee4221f708430c1[]

        $curl = 'GET _render/template'
              . '{'
              . '  "source": "{ \"query\": { \"terms\": {{#toJson}}statuses{{/toJson}} }}",'
              . '  "params": {'
              . '    "statuses" : {'
              . '        "status": [ "pending", "published" ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  99e29a569f37ea83b02687e6e2793529
     * Line: 566
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL566_99e29a569f37ea83b02687e6e2793529()
    {
        $client = $this->getClient();
        // tag::99e29a569f37ea83b02687e6e2793529[]
        // TODO -- Implement Example
        // GET _search/template
        // {
        //   "id": "my_template",
        //   "params": {
        //     "status": [ "pending", "published" ]
        //   },
        //   "explain": true
        // }
        // end::99e29a569f37ea83b02687e6e2793529[]

        $curl = 'GET _search/template'
              . '{'
              . '  "id": "my_template",'
              . '  "params": {'
              . '    "status": [ "pending", "published" ]'
              . '  },'
              . '  "explain": true'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3462452c6fdba8dc1efe2cca101246e8
     * Line: 585
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL585_3462452c6fdba8dc1efe2cca101246e8()
    {
        $client = $this->getClient();
        // tag::3462452c6fdba8dc1efe2cca101246e8[]
        // TODO -- Implement Example
        // GET _search/template
        // {
        //   "id": "my_template",
        //   "params": {
        //     "status": [ "pending", "published" ]
        //   },
        //   "profile": true
        // }
        // end::3462452c6fdba8dc1efe2cca101246e8[]

        $curl = 'GET _search/template'
              . '{'
              . '  "id": "my_template",'
              . '  "params": {'
              . '    "status": [ "pending", "published" ]'
              . '  },'
              . '  "profile": true'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%















}
