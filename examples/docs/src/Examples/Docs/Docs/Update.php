<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Update
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   docs/update.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Update extends SimpleExamplesTester {

    /**
     * Tag:  381fced1882ca8337143e6bb180a5715
     * Line: 18
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL18_381fced1882ca8337143e6bb180a5715()
    {
        $client = $this->getClient();
        // tag::381fced1882ca8337143e6bb180a5715[]
        // TODO -- Implement Example
        // PUT test/_doc/1
        // {
        //     "counter" : 1,
        //     "tags" : ["red"]
        // }
        // end::381fced1882ca8337143e6bb180a5715[]

        $curl = 'PUT test/_doc/1'
              . '{'
              . '    "counter" : 1,'
              . '    "tags" : ["red"]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  96de5703ba0bd43fd4ac239ec5408542
     * Line: 33
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL33_96de5703ba0bd43fd4ac239ec5408542()
    {
        $client = $this->getClient();
        // tag::96de5703ba0bd43fd4ac239ec5408542[]
        // TODO -- Implement Example
        // POST test/_update/1
        // {
        //     "script" : {
        //         "source": "ctx._source.counter += params.count",
        //         "lang": "painless",
        //         "params" : {
        //             "count" : 4
        //         }
        //     }
        // }
        // end::96de5703ba0bd43fd4ac239ec5408542[]

        $curl = 'POST test/_update/1'
              . '{'
              . '    "script" : {'
              . '        "source": "ctx._source.counter += params.count",'
              . '        "lang": "painless",'
              . '        "params" : {'
              . '            "count" : 4'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4cd246e5c4c035a2cd4081ae9a3d54e5
     * Line: 52
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL52_4cd246e5c4c035a2cd4081ae9a3d54e5()
    {
        $client = $this->getClient();
        // tag::4cd246e5c4c035a2cd4081ae9a3d54e5[]
        // TODO -- Implement Example
        // POST test/_update/1
        // {
        //     "script" : {
        //         "source": "ctx._source.tags.add(params.tag)",
        //         "lang": "painless",
        //         "params" : {
        //             "tag" : "blue"
        //         }
        //     }
        // }
        // end::4cd246e5c4c035a2cd4081ae9a3d54e5[]

        $curl = 'POST test/_update/1'
              . '{'
              . '    "script" : {'
              . '        "source": "ctx._source.tags.add(params.tag)",'
              . '        "lang": "painless",'
              . '        "params" : {'
              . '            "tag" : "blue"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ac544eb247a29ca42aab13826ca88561
     * Line: 74
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL74_ac544eb247a29ca42aab13826ca88561()
    {
        $client = $this->getClient();
        // tag::ac544eb247a29ca42aab13826ca88561[]
        // TODO -- Implement Example
        // POST test/_update/1
        // {
        //     "script" : {
        //         "source": "if (ctx._source.tags.contains(params.tag)) { ctx._source.tags.remove(ctx._source.tags.indexOf(params.tag)) }",
        //         "lang": "painless",
        //         "params" : {
        //             "tag" : "blue"
        //         }
        //     }
        // }
        // end::ac544eb247a29ca42aab13826ca88561[]

        $curl = 'POST test/_update/1'
              . '{'
              . '    "script" : {'
              . '        "source": "if (ctx._source.tags.contains(params.tag)) { ctx._source.tags.remove(ctx._source.tags.indexOf(params.tag)) }",'
              . '        "lang": "painless",'
              . '        "params" : {'
              . '            "tag" : "blue"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  eb30ba547e4a7b8f54f33ab259aca523
     * Line: 96
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL96_eb30ba547e4a7b8f54f33ab259aca523()
    {
        $client = $this->getClient();
        // tag::eb30ba547e4a7b8f54f33ab259aca523[]
        // TODO -- Implement Example
        // POST test/_update/1
        // {
        //     "script" : "ctx._source.new_field = 'value_of_new_field'"
        // }
        // end::eb30ba547e4a7b8f54f33ab259aca523[]

        $curl = 'POST test/_update/1'
              . '{'
              . '    "script" : "ctx._source.new_field = 'value_of_new_field'"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  58df61acbfb15b8ef0aaa18b81ae98a6
     * Line: 108
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL108_58df61acbfb15b8ef0aaa18b81ae98a6()
    {
        $client = $this->getClient();
        // tag::58df61acbfb15b8ef0aaa18b81ae98a6[]
        // TODO -- Implement Example
        // POST test/_update/1
        // {
        //     "script" : "ctx._source.remove('new_field')"
        // }
        // end::58df61acbfb15b8ef0aaa18b81ae98a6[]

        $curl = 'POST test/_update/1'
              . '{'
              . '    "script" : "ctx._source.remove('new_field')"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  98aeb275f829b5f7b8eb2147701565ff
     * Line: 122
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL122_98aeb275f829b5f7b8eb2147701565ff()
    {
        $client = $this->getClient();
        // tag::98aeb275f829b5f7b8eb2147701565ff[]
        // TODO -- Implement Example
        // POST test/_update/1
        // {
        //     "script" : {
        //         "source": "if (ctx._source.tags.contains(params.tag)) { ctx.op = 'delete' } else { ctx.op = 'none' }",
        //         "lang": "painless",
        //         "params" : {
        //             "tag" : "green"
        //         }
        //     }
        // }
        // end::98aeb275f829b5f7b8eb2147701565ff[]

        $curl = 'POST test/_update/1'
              . '{'
              . '    "script" : {'
              . '        "source": "if (ctx._source.tags.contains(params.tag)) { ctx.op = 'delete' } else { ctx.op = 'none' }",'
              . '        "lang": "painless",'
              . '        "params" : {'
              . '            "tag" : "green"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  38c1d0f6668e9563c0827f839f9fa505
     * Line: 149
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL149_38c1d0f6668e9563c0827f839f9fa505()
    {
        $client = $this->getClient();
        // tag::38c1d0f6668e9563c0827f839f9fa505[]
        // TODO -- Implement Example
        // POST test/_update/1
        // {
        //     "doc" : {
        //         "name" : "new_name"
        //     }
        // }
        // end::38c1d0f6668e9563c0827f839f9fa505[]

        $curl = 'POST test/_update/1'
              . '{'
              . '    "doc" : {'
              . '        "name" : "new_name"'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  38c1d0f6668e9563c0827f839f9fa505
     * Line: 170
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL170_38c1d0f6668e9563c0827f839f9fa505()
    {
        $client = $this->getClient();
        // tag::38c1d0f6668e9563c0827f839f9fa505[]
        // TODO -- Implement Example
        // POST test/_update/1
        // {
        //     "doc" : {
        //         "name" : "new_name"
        //     }
        // }
        // end::38c1d0f6668e9563c0827f839f9fa505[]

        $curl = 'POST test/_update/1'
              . '{'
              . '    "doc" : {'
              . '        "name" : "new_name"'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  015294a400986295039e52ebc62033be
     * Line: 207
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL207_015294a400986295039e52ebc62033be()
    {
        $client = $this->getClient();
        // tag::015294a400986295039e52ebc62033be[]
        // TODO -- Implement Example
        // POST test/_update/1
        // {
        //     "doc" : {
        //         "name" : "new_name"
        //     },
        //     "detect_noop": false
        // }
        // end::015294a400986295039e52ebc62033be[]

        $curl = 'POST test/_update/1'
              . '{'
              . '    "doc" : {'
              . '        "name" : "new_name"'
              . '    },'
              . '    "detect_noop": false'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0a958e486ede3f519d48431ab689eded
     * Line: 228
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL228_0a958e486ede3f519d48431ab689eded()
    {
        $client = $this->getClient();
        // tag::0a958e486ede3f519d48431ab689eded[]
        // TODO -- Implement Example
        // POST test/_update/1
        // {
        //     "script" : {
        //         "source": "ctx._source.counter += params.count",
        //         "lang": "painless",
        //         "params" : {
        //             "count" : 4
        //         }
        //     },
        //     "upsert" : {
        //         "counter" : 1
        //     }
        // }
        // end::0a958e486ede3f519d48431ab689eded[]

        $curl = 'POST test/_update/1'
              . '{'
              . '    "script" : {'
              . '        "source": "ctx._source.counter += params.count",'
              . '        "lang": "painless",'
              . '        "params" : {'
              . '            "count" : 4'
              . '        }'
              . '    },'
              . '    "upsert" : {'
              . '        "counter" : 1'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f9636d7ef1a45be4f36418c875cf6bef
     * Line: 255
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL255_f9636d7ef1a45be4f36418c875cf6bef()
    {
        $client = $this->getClient();
        // tag::f9636d7ef1a45be4f36418c875cf6bef[]
        // TODO -- Implement Example
        // POST sessions/_update/dh3sgudg8gsrgl
        // {
        //     "scripted_upsert":true,
        //     "script" : {
        //         "id": "my_web_session_summariser",
        //         "params" : {
        //             "pageViewEvent" : {
        //                 "url":"foo.com/bar",
        //                 "response":404,
        //                 "time":"2014-01-01 12:32"
        //             }
        //         }
        //     },
        //     "upsert" : {}
        // }
        // end::f9636d7ef1a45be4f36418c875cf6bef[]

        $curl = 'POST sessions/_update/dh3sgudg8gsrgl'
              . '{'
              . '    "scripted_upsert":true,'
              . '    "script" : {'
              . '        "id": "my_web_session_summariser",'
              . '        "params" : {'
              . '            "pageViewEvent" : {'
              . '                "url":"foo.com/bar",'
              . '                "response":404,'
              . '                "time":"2014-01-01 12:32"'
              . '            }'
              . '        }'
              . '    },'
              . '    "upsert" : {}'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7cac05cb589f1614fd5b8589153bef06
     * Line: 285
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL285_7cac05cb589f1614fd5b8589153bef06()
    {
        $client = $this->getClient();
        // tag::7cac05cb589f1614fd5b8589153bef06[]
        // TODO -- Implement Example
        // POST test/_update/1
        // {
        //     "doc" : {
        //         "name" : "new_name"
        //     },
        //     "doc_as_upsert" : true
        // }
        // end::7cac05cb589f1614fd5b8589153bef06[]

        $curl = 'POST test/_update/1'
              . '{'
              . '    "doc" : {'
              . '        "name" : "new_name"'
              . '    },'
              . '    "doc_as_upsert" : true'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%














}
