<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MultiGet
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   docs/multi-get.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MultiGet extends SimpleExamplesTester {

    /**
     * Tag:  b02ea386a43df53f5b925ae64ff4bf96
     * Line: 15
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL15_b02ea386a43df53f5b925ae64ff4bf96()
    {
        $client = $this->getClient();
        // tag::b02ea386a43df53f5b925ae64ff4bf96[]
        // TODO -- Implement Example
        // GET /_mget
        // {
        //     "docs" : [
        //         {
        //             "_index" : "test",
        //             "_type" : "_doc",
        //             "_id" : "1"
        //         },
        //         {
        //             "_index" : "test",
        //             "_type" : "_doc",
        //             "_id" : "2"
        //         }
        //     ]
        // }
        // end::b02ea386a43df53f5b925ae64ff4bf96[]

        $curl = 'GET /_mget'
              . '{'
              . '    "docs" : ['
              . '        {'
              . '            "_index" : "test",'
              . '            "_type" : "_doc",'
              . '            "_id" : "1"'
              . '        },'
              . '        {'
              . '            "_index" : "test",'
              . '            "_type" : "_doc",'
              . '            "_id" : "2"'
              . '        }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  60be49d20e42e165467817dcce53fcf7
     * Line: 38
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL38_60be49d20e42e165467817dcce53fcf7()
    {
        $client = $this->getClient();
        // tag::60be49d20e42e165467817dcce53fcf7[]
        // TODO -- Implement Example
        // GET /test/_mget
        // {
        //     "docs" : [
        //         {
        //             "_type" : "_doc",
        //             "_id" : "1"
        //         },
        //         {
        //             "_type" : "_doc",
        //             "_id" : "2"
        //         }
        //     ]
        // }
        // end::60be49d20e42e165467817dcce53fcf7[]

        $curl = 'GET /test/_mget'
              . '{'
              . '    "docs" : ['
              . '        {'
              . '            "_type" : "_doc",'
              . '            "_id" : "1"'
              . '        },'
              . '        {'
              . '            "_type" : "_doc",'
              . '            "_id" : "2"'
              . '        }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  80229b2c753cfce1d1554e03cbdbfa29
     * Line: 58
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL58_80229b2c753cfce1d1554e03cbdbfa29()
    {
        $client = $this->getClient();
        // tag::80229b2c753cfce1d1554e03cbdbfa29[]
        // TODO -- Implement Example
        // GET /test/_doc/_mget
        // {
        //     "docs" : [
        //         {
        //             "_id" : "1"
        //         },
        //         {
        //             "_id" : "2"
        //         }
        //     ]
        // }
        // end::80229b2c753cfce1d1554e03cbdbfa29[]

        $curl = 'GET /test/_doc/_mget'
              . '{'
              . '    "docs" : ['
              . '        {'
              . '            "_id" : "1"'
              . '        },'
              . '        {'
              . '            "_id" : "2"'
              . '        }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  104404dad47a4b52637fb88df6160a08
     * Line: 77
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL77_104404dad47a4b52637fb88df6160a08()
    {
        $client = $this->getClient();
        // tag::104404dad47a4b52637fb88df6160a08[]
        // TODO -- Implement Example
        // GET /test/_doc/_mget
        // {
        //     "ids" : ["1", "2"]
        // }
        // end::104404dad47a4b52637fb88df6160a08[]

        $curl = 'GET /test/_doc/_mget'
              . '{'
              . '    "ids" : ["1", "2"]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  562535f3e70cc1a85ee6eb03588f96a6
     * Line: 98
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL98_562535f3e70cc1a85ee6eb03588f96a6()
    {
        $client = $this->getClient();
        // tag::562535f3e70cc1a85ee6eb03588f96a6[]
        // TODO -- Implement Example
        // GET /_mget
        // {
        //     "docs" : [
        //         {
        //             "_index" : "test",
        //             "_type" : "_doc",
        //             "_id" : "1",
        //             "_source" : false
        //         },
        //         {
        //             "_index" : "test",
        //             "_type" : "_doc",
        //             "_id" : "2",
        //             "_source" : ["field3", "field4"]
        //         },
        //         {
        //             "_index" : "test",
        //             "_type" : "_doc",
        //             "_id" : "3",
        //             "_source" : {
        //                 "include": ["user"],
        //                 "exclude": ["user.location"]
        //             }
        //         }
        //     ]
        // }
        // end::562535f3e70cc1a85ee6eb03588f96a6[]

        $curl = 'GET /_mget'
              . '{'
              . '    "docs" : ['
              . '        {'
              . '            "_index" : "test",'
              . '            "_type" : "_doc",'
              . '            "_id" : "1",'
              . '            "_source" : false'
              . '        },'
              . '        {'
              . '            "_index" : "test",'
              . '            "_type" : "_doc",'
              . '            "_id" : "2",'
              . '            "_source" : ["field3", "field4"]'
              . '        },'
              . '        {'
              . '            "_index" : "test",'
              . '            "_type" : "_doc",'
              . '            "_id" : "3",'
              . '            "_source" : {'
              . '                "include": ["user"],'
              . '                "exclude": ["user.location"]'
              . '            }'
              . '        }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1b1e75613163308e4d40073a6c0918ce
     * Line: 137
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL137_1b1e75613163308e4d40073a6c0918ce()
    {
        $client = $this->getClient();
        // tag::1b1e75613163308e4d40073a6c0918ce[]
        // TODO -- Implement Example
        // GET /_mget
        // {
        //     "docs" : [
        //         {
        //             "_index" : "test",
        //             "_type" : "_doc",
        //             "_id" : "1",
        //             "stored_fields" : ["field1", "field2"]
        //         },
        //         {
        //             "_index" : "test",
        //             "_type" : "_doc",
        //             "_id" : "2",
        //             "stored_fields" : ["field3", "field4"]
        //         }
        //     ]
        // }
        // end::1b1e75613163308e4d40073a6c0918ce[]

        $curl = 'GET /_mget'
              . '{'
              . '    "docs" : ['
              . '        {'
              . '            "_index" : "test",'
              . '            "_type" : "_doc",'
              . '            "_id" : "1",'
              . '            "stored_fields" : ["field1", "field2"]'
              . '        },'
              . '        {'
              . '            "_index" : "test",'
              . '            "_type" : "_doc",'
              . '            "_id" : "2",'
              . '            "stored_fields" : ["field3", "field4"]'
              . '        }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8c7bf48aeb7d0919a1b0fd8685a1e480
     * Line: 162
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL162_8c7bf48aeb7d0919a1b0fd8685a1e480()
    {
        $client = $this->getClient();
        // tag::8c7bf48aeb7d0919a1b0fd8685a1e480[]
        // TODO -- Implement Example
        // GET /test/_doc/_mget?stored_fields=field1,field2
        // {
        //     "docs" : [
        //         {
        //             "_id" : "1" \<1>
        //         },
        //         {
        //             "_id" : "2",
        //             "stored_fields" : ["field3", "field4"] \<2>
        //         }
        //     ]
        // }
        // end::8c7bf48aeb7d0919a1b0fd8685a1e480[]

        $curl = 'GET /test/_doc/_mget?stored_fields=field1,field2'
              . '{'
              . '    "docs" : ['
              . '        {'
              . '            "_id" : "1" \<1>'
              . '        },'
              . '        {'
              . '            "_id" : "2",'
              . '            "stored_fields" : ["field3", "field4"] \<2>'
              . '        }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1a6750042ee402bc92d644824f5cdc1f
     * Line: 187
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL187_1a6750042ee402bc92d644824f5cdc1f()
    {
        $client = $this->getClient();
        // tag::1a6750042ee402bc92d644824f5cdc1f[]
        // TODO -- Implement Example
        // GET /_mget?routing=key1
        // {
        //     "docs" : [
        //         {
        //             "_index" : "test",
        //             "_type" : "_doc",
        //             "_id" : "1",
        //             "routing" : "key2"
        //         },
        //         {
        //             "_index" : "test",
        //             "_type" : "_doc",
        //             "_id" : "2"
        //         }
        //     ]
        // }
        // end::1a6750042ee402bc92d644824f5cdc1f[]

        $curl = 'GET /_mget?routing=key1'
              . '{'
              . '    "docs" : ['
              . '        {'
              . '            "_index" : "test",'
              . '            "_type" : "_doc",'
              . '            "_id" : "1",'
              . '            "routing" : "key2"'
              . '        },'
              . '        {'
              . '            "_index" : "test",'
              . '            "_type" : "_doc",'
              . '            "_id" : "2"'
              . '        }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%









}
