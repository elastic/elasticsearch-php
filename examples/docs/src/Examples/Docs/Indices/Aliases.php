<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Aliases
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/aliases.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Aliases extends SimpleExamplesTester {

    /**
     * Tag:  b4392116f2cc57ce8064ccbad30318d5
     * Line: 16
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL16_b4392116f2cc57ce8064ccbad30318d5()
    {
        $client = $this->getClient();
        // tag::b4392116f2cc57ce8064ccbad30318d5[]
        // TODO -- Implement Example
        // POST /_aliases
        // {
        //     "actions" : [
        //         { "add" : { "index" : "test1", "alias" : "alias1" } }
        //     ]
        // }
        // end::b4392116f2cc57ce8064ccbad30318d5[]

        $curl = 'POST /_aliases'
              . '{'
              . '    "actions" : ['
              . '        { "add" : { "index" : "test1", "alias" : "alias1" } }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3653567181f43a5f64c74f934aa821c2
     * Line: 30
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL30_3653567181f43a5f64c74f934aa821c2()
    {
        $client = $this->getClient();
        // tag::3653567181f43a5f64c74f934aa821c2[]
        // TODO -- Implement Example
        // POST /_aliases
        // {
        //     "actions" : [
        //         { "remove" : { "index" : "test1", "alias" : "alias1" } }
        //     ]
        // }
        // end::3653567181f43a5f64c74f934aa821c2[]

        $curl = 'POST /_aliases'
              . '{'
              . '    "actions" : ['
              . '        { "remove" : { "index" : "test1", "alias" : "alias1" } }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5a51ead3c0398ecb12bdb5456fd70ab9
     * Line: 46
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL46_5a51ead3c0398ecb12bdb5456fd70ab9()
    {
        $client = $this->getClient();
        // tag::5a51ead3c0398ecb12bdb5456fd70ab9[]
        // TODO -- Implement Example
        // POST /_aliases
        // {
        //     "actions" : [
        //         { "remove" : { "index" : "test1", "alias" : "alias1" } },
        //         { "add" : { "index" : "test2", "alias" : "alias1" } }
        //     ]
        // }
        // end::5a51ead3c0398ecb12bdb5456fd70ab9[]

        $curl = 'POST /_aliases'
              . '{'
              . '    "actions" : ['
              . '        { "remove" : { "index" : "test1", "alias" : "alias1" } },'
              . '        { "add" : { "index" : "test2", "alias" : "alias1" } }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f0e21e03a07c8fa0209b0aafdb3791e6
     * Line: 62
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL62_f0e21e03a07c8fa0209b0aafdb3791e6()
    {
        $client = $this->getClient();
        // tag::f0e21e03a07c8fa0209b0aafdb3791e6[]
        // TODO -- Implement Example
        // POST /_aliases
        // {
        //     "actions" : [
        //         { "add" : { "index" : "test1", "alias" : "alias1" } },
        //         { "add" : { "index" : "test2", "alias" : "alias1" } }
        //     ]
        // }
        // end::f0e21e03a07c8fa0209b0aafdb3791e6[]

        $curl = 'POST /_aliases'
              . '{'
              . '    "actions" : ['
              . '        { "add" : { "index" : "test1", "alias" : "alias1" } },'
              . '        { "add" : { "index" : "test2", "alias" : "alias1" } }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5f210f74725ea0c9265190346edfa246
     * Line: 77
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL77_5f210f74725ea0c9265190346edfa246()
    {
        $client = $this->getClient();
        // tag::5f210f74725ea0c9265190346edfa246[]
        // TODO -- Implement Example
        // POST /_aliases
        // {
        //     "actions" : [
        //         { "add" : { "indices" : ["test1", "test2"], "alias" : "alias1" } }
        //     ]
        // }
        // end::5f210f74725ea0c9265190346edfa246[]

        $curl = 'POST /_aliases'
              . '{'
              . '    "actions" : ['
              . '        { "add" : { "indices" : ["test1", "test2"], "alias" : "alias1" } }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6799d132c1c7ca3970763acde2337ef9
     * Line: 95
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL95_6799d132c1c7ca3970763acde2337ef9()
    {
        $client = $this->getClient();
        // tag::6799d132c1c7ca3970763acde2337ef9[]
        // TODO -- Implement Example
        // POST /_aliases
        // {
        //     "actions" : [
        //         { "add" : { "index" : "test*", "alias" : "all_test_indices" } }
        //     ]
        // }
        // end::6799d132c1c7ca3970763acde2337ef9[]

        $curl = 'POST /_aliases'
              . '{'
              . '    "actions" : ['
              . '        { "add" : { "index" : "test*", "alias" : "all_test_indices" } }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  de176bc4788ea286fff9e92418a43ea8
     * Line: 115
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL115_de176bc4788ea286fff9e92418a43ea8()
    {
        $client = $this->getClient();
        // tag::de176bc4788ea286fff9e92418a43ea8[]
        // TODO -- Implement Example
        // PUT test     \<1>
        // PUT test_2   \<2>
        // POST /_aliases
        // {
        //     "actions" : [
        //         { "add":  { "index": "test_2", "alias": "test" } },
        //         { "remove_index": { "index": "test" } }  \<3>
        //     ]
        // }
        // end::de176bc4788ea286fff9e92418a43ea8[]

        $curl = 'PUT test     \<1>'
              . 'PUT test_2   \<2>'
              . 'POST /_aliases'
              . '{'
              . '    "actions" : ['
              . '        { "add":  { "index": "test_2", "alias": "test" } },'
              . '        { "remove_index": { "index": "test" } }  \<3>'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  23ab0f1023b1b2cd5cdf2a8f9ccfd57b
     * Line: 144
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL144_23ab0f1023b1b2cd5cdf2a8f9ccfd57b()
    {
        $client = $this->getClient();
        // tag::23ab0f1023b1b2cd5cdf2a8f9ccfd57b[]
        // TODO -- Implement Example
        // PUT /test1
        // {
        //   "mappings": {
        //     "properties": {
        //       "user" : {
        //         "type": "keyword"
        //       }
        //     }
        //   }
        // }
        // end::23ab0f1023b1b2cd5cdf2a8f9ccfd57b[]

        $curl = 'PUT /test1'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "user" : {'
              . '        "type": "keyword"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7cf71671859be7c1ecf673396db377cd
     * Line: 161
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL161_7cf71671859be7c1ecf673396db377cd()
    {
        $client = $this->getClient();
        // tag::7cf71671859be7c1ecf673396db377cd[]
        // TODO -- Implement Example
        // POST /_aliases
        // {
        //     "actions" : [
        //         {
        //             "add" : {
        //                  "index" : "test1",
        //                  "alias" : "alias2",
        //                  "filter" : { "term" : { "user" : "kimchy" } }
        //             }
        //         }
        //     ]
        // }
        // end::7cf71671859be7c1ecf673396db377cd[]

        $curl = 'POST /_aliases'
              . '{'
              . '    "actions" : ['
              . '        {'
              . '            "add" : {'
              . '                 "index" : "test1",'
              . '                 "alias" : "alias2",'
              . '                 "filter" : { "term" : { "user" : "kimchy" } }'
              . '            }'
              . '        }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  bc1ad5cc6d3eab98e3ce01f209ba7094
     * Line: 191
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL191_bc1ad5cc6d3eab98e3ce01f209ba7094()
    {
        $client = $this->getClient();
        // tag::bc1ad5cc6d3eab98e3ce01f209ba7094[]
        // TODO -- Implement Example
        // POST /_aliases
        // {
        //     "actions" : [
        //         {
        //             "add" : {
        //                  "index" : "test",
        //                  "alias" : "alias1",
        //                  "routing" : "1"
        //             }
        //         }
        //     ]
        // }
        // end::bc1ad5cc6d3eab98e3ce01f209ba7094[]

        $curl = 'POST /_aliases'
              . '{'
              . '    "actions" : ['
              . '        {'
              . '            "add" : {'
              . '                 "index" : "test",'
              . '                 "alias" : "alias1",'
              . '                 "routing" : "1"'
              . '            }'
              . '        }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  fa0f4485cd48f986b7ae8cbb24e331c4
     * Line: 212
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL212_fa0f4485cd48f986b7ae8cbb24e331c4()
    {
        $client = $this->getClient();
        // tag::fa0f4485cd48f986b7ae8cbb24e331c4[]
        // TODO -- Implement Example
        // POST /_aliases
        // {
        //     "actions" : [
        //         {
        //             "add" : {
        //                  "index" : "test",
        //                  "alias" : "alias2",
        //                  "search_routing" : "1,2",
        //                  "index_routing" : "2"
        //             }
        //         }
        //     ]
        // }
        // end::fa0f4485cd48f986b7ae8cbb24e331c4[]

        $curl = 'POST /_aliases'
              . '{'
              . '    "actions" : ['
              . '        {'
              . '            "add" : {'
              . '                 "index" : "test",'
              . '                 "alias" : "alias2",'
              . '                 "search_routing" : "1,2",'
              . '                 "index_routing" : "2"'
              . '            }'
              . '        }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  427f6b5c5376cbf0f71f242a60ca3d9e
     * Line: 239
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL239_427f6b5c5376cbf0f71f242a60ca3d9e()
    {
        $client = $this->getClient();
        // tag::427f6b5c5376cbf0f71f242a60ca3d9e[]
        // TODO -- Implement Example
        // GET /alias2/_search?q=user:kimchy&routing=2,3
        // end::427f6b5c5376cbf0f71f242a60ca3d9e[]

        $curl = 'GET /alias2/_search?q=user:kimchy&routing=2,3';

        // TODO -- make assertion
    }

    /**
     * Tag:  f6d6889667f56b8f49d2858070571a6b
     * Line: 262
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL262_f6d6889667f56b8f49d2858070571a6b()
    {
        $client = $this->getClient();
        // tag::f6d6889667f56b8f49d2858070571a6b[]
        // TODO -- Implement Example
        // POST /_aliases
        // {
        //     "actions" : [
        //         {
        //             "add" : {
        //                  "index" : "test",
        //                  "alias" : "alias1",
        //                  "is_write_index" : true
        //             }
        //         },
        //         {
        //             "add" : {
        //                  "index" : "test2",
        //                  "alias" : "alias1"
        //             }
        //         }
        //     ]
        // }
        // end::f6d6889667f56b8f49d2858070571a6b[]

        $curl = 'POST /_aliases'
              . '{'
              . '    "actions" : ['
              . '        {'
              . '            "add" : {'
              . '                 "index" : "test",'
              . '                 "alias" : "alias1",'
              . '                 "is_write_index" : true'
              . '            }'
              . '        },'
              . '        {'
              . '            "add" : {'
              . '                 "index" : "test2",'
              . '                 "alias" : "alias1"'
              . '            }'
              . '        }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b0ec418bf416c62bed602b0a32a6d5f5
     * Line: 289
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL289_b0ec418bf416c62bed602b0a32a6d5f5()
    {
        $client = $this->getClient();
        // tag::b0ec418bf416c62bed602b0a32a6d5f5[]
        // TODO -- Implement Example
        // PUT /alias1/_doc/1
        // {
        //     "foo": "bar"
        // }
        // end::b0ec418bf416c62bed602b0a32a6d5f5[]

        $curl = 'PUT /alias1/_doc/1'
              . '{'
              . '    "foo": "bar"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  67bba546d835bca8f31df13e3587c348
     * Line: 302
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL302_67bba546d835bca8f31df13e3587c348()
    {
        $client = $this->getClient();
        // tag::67bba546d835bca8f31df13e3587c348[]
        // TODO -- Implement Example
        // GET /test/_doc/1
        // end::67bba546d835bca8f31df13e3587c348[]

        $curl = 'GET /test/_doc/1';

        // TODO -- make assertion
    }

    /**
     * Tag:  ad79228630684d950fe9792a768d24c5
     * Line: 312
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL312_ad79228630684d950fe9792a768d24c5()
    {
        $client = $this->getClient();
        // tag::ad79228630684d950fe9792a768d24c5[]
        // TODO -- Implement Example
        // POST /_aliases
        // {
        //     "actions" : [
        //         {
        //             "add" : {
        //                  "index" : "test",
        //                  "alias" : "alias1",
        //                  "is_write_index" : false
        //             }
        //         }, {
        //             "add" : {
        //                  "index" : "test2",
        //                  "alias" : "alias1",
        //                  "is_write_index" : true
        //             }
        //         }
        //     ]
        // }
        // end::ad79228630684d950fe9792a768d24c5[]

        $curl = 'POST /_aliases'
              . '{'
              . '    "actions" : ['
              . '        {'
              . '            "add" : {'
              . '                 "index" : "test",'
              . '                 "alias" : "alias1",'
              . '                 "is_write_index" : false'
              . '            }'
              . '        }, {'
              . '            "add" : {'
              . '                 "index" : "test2",'
              . '                 "alias" : "alias1",'
              . '                 "is_write_index" : true'
              . '            }'
              . '        }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  591adf1aaf016b9c382990923e37d099
     * Line: 369
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL369_591adf1aaf016b9c382990923e37d099()
    {
        $client = $this->getClient();
        // tag::591adf1aaf016b9c382990923e37d099[]
        // TODO -- Implement Example
        // PUT /logs_201305/_alias/2013
        // end::591adf1aaf016b9c382990923e37d099[]

        $curl = 'PUT /logs_201305/_alias/2013';

        // TODO -- make assertion
    }

    /**
     * Tag:  890f659cfc10ff8171420809bdcf7c67
     * Line: 382
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL382_890f659cfc10ff8171420809bdcf7c67()
    {
        $client = $this->getClient();
        // tag::890f659cfc10ff8171420809bdcf7c67[]
        // TODO -- Implement Example
        // PUT /users
        // {
        //     "mappings" : {
        //         "properties" : {
        //             "user_id" : {"type" : "integer"}
        //         }
        //     }
        // }
        // end::890f659cfc10ff8171420809bdcf7c67[]

        $curl = 'PUT /users'
              . '{'
              . '    "mappings" : {'
              . '        "properties" : {'
              . '            "user_id" : {"type" : "integer"}'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  83b2785e63357ab3ade51d8ec0c11917
     * Line: 397
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL397_83b2785e63357ab3ade51d8ec0c11917()
    {
        $client = $this->getClient();
        // tag::83b2785e63357ab3ade51d8ec0c11917[]
        // TODO -- Implement Example
        // PUT /users/_alias/user_12
        // {
        //     "routing" : "12",
        //     "filter" : {
        //         "term" : {
        //             "user_id" : 12
        //         }
        //     }
        // }
        // end::83b2785e63357ab3ade51d8ec0c11917[]

        $curl = 'PUT /users/_alias/user_12'
              . '{'
              . '    "routing" : "12",'
              . '    "filter" : {'
              . '        "term" : {'
              . '            "user_id" : 12'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e47c3557fe8ccfc4286155c4b72e7c76
     * Line: 420
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL420_e47c3557fe8ccfc4286155c4b72e7c76()
    {
        $client = $this->getClient();
        // tag::e47c3557fe8ccfc4286155c4b72e7c76[]
        // TODO -- Implement Example
        // PUT /logs_20162801
        // {
        //     "mappings" : {
        //         "properties" : {
        //             "year" : {"type" : "integer"}
        //         }
        //     },
        //     "aliases" : {
        //         "current_day" : {},
        //         "2016" : {
        //             "filter" : {
        //                 "term" : {"year" : 2016 }
        //             }
        //         }
        //     }
        // }
        // end::e47c3557fe8ccfc4286155c4b72e7c76[]

        $curl = 'PUT /logs_20162801'
              . '{'
              . '    "mappings" : {'
              . '        "properties" : {'
              . '            "year" : {"type" : "integer"}'
              . '        }'
              . '    },'
              . '    "aliases" : {'
              . '        "current_day" : {},'
              . '        "2016" : {'
              . '            "filter" : {'
              . '                "term" : {"year" : 2016 }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  72501997d053c29aa0b66a6bb6fb4105
     * Line: 456
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL456_72501997d053c29aa0b66a6bb6fb4105()
    {
        $client = $this->getClient();
        // tag::72501997d053c29aa0b66a6bb6fb4105[]
        // TODO -- Implement Example
        // DELETE /logs_20162801/_alias/current_day
        // end::72501997d053c29aa0b66a6bb6fb4105[]

        $curl = 'DELETE /logs_20162801/_alias/current_day';

        // TODO -- make assertion
    }

    /**
     * Tag:  4c0ac18976e4d95d23b6890ea9129a7e
     * Line: 495
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL495_4c0ac18976e4d95d23b6890ea9129a7e()
    {
        $client = $this->getClient();
        // tag::4c0ac18976e4d95d23b6890ea9129a7e[]
        // TODO -- Implement Example
        // GET /logs_20162801/_alias/*
        // end::4c0ac18976e4d95d23b6890ea9129a7e[]

        $curl = 'GET /logs_20162801/_alias/*';

        // TODO -- make assertion
    }

    /**
     * Tag:  0e98b8cb47ce75336068c6d914b86495
     * Line: 524
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL524_0e98b8cb47ce75336068c6d914b86495()
    {
        $client = $this->getClient();
        // tag::0e98b8cb47ce75336068c6d914b86495[]
        // TODO -- Implement Example
        // GET /_alias/2016
        // end::0e98b8cb47ce75336068c6d914b86495[]

        $curl = 'GET /_alias/2016';

        // TODO -- make assertion
    }

    /**
     * Tag:  56aa1bff647d1db49dabf175c1e56919
     * Line: 553
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL553_56aa1bff647d1db49dabf175c1e56919()
    {
        $client = $this->getClient();
        // tag::56aa1bff647d1db49dabf175c1e56919[]
        // TODO -- Implement Example
        // GET /_alias/20*
        // end::56aa1bff647d1db49dabf175c1e56919[]

        $curl = 'GET /_alias/20*';

        // TODO -- make assertion
    }

    /**
     * Tag:  d8aa6ff25f7bb56e32d02df455103e53
     * Line: 584
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL584_d8aa6ff25f7bb56e32d02df455103e53()
    {
        $client = $this->getClient();
        // tag::d8aa6ff25f7bb56e32d02df455103e53[]
        // TODO -- Implement Example
        // HEAD /_alias/2016
        // HEAD /_alias/20*
        // HEAD /logs_20162801/_alias/*
        // end::d8aa6ff25f7bb56e32d02df455103e53[]

        $curl = 'HEAD /_alias/2016'
              . 'HEAD /_alias/20*'
              . 'HEAD /logs_20162801/_alias/*';

        // TODO -- make assertion
    }

// %__METHOD__%


























}
