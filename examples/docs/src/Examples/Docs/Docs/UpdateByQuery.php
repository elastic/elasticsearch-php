<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: UpdateByQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   docs/update-by-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class UpdateByQuery extends SimpleExamplesTester {

    /**
     * Tag:  a4a396cd07657b3977713fb3a742c41b
     * Line: 10
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL10_a4a396cd07657b3977713fb3a742c41b()
    {
        $client = $this->getClient();
        // tag::a4a396cd07657b3977713fb3a742c41b[]
        // TODO -- Implement Example
        // POST twitter/_update_by_query?conflicts=proceed
        // end::a4a396cd07657b3977713fb3a742c41b[]

        $curl = 'POST twitter/_update_by_query?conflicts=proceed';

        // TODO -- make assertion
    }

    /**
     * Tag:  a4a396cd07657b3977713fb3a742c41b
     * Line: 69
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL69_a4a396cd07657b3977713fb3a742c41b()
    {
        $client = $this->getClient();
        // tag::a4a396cd07657b3977713fb3a742c41b[]
        // TODO -- Implement Example
        // POST twitter/_update_by_query?conflicts=proceed
        // end::a4a396cd07657b3977713fb3a742c41b[]

        $curl = 'POST twitter/_update_by_query?conflicts=proceed';

        // TODO -- make assertion
    }

    /**
     * Tag:  52a87b81e4e0b6b11e23e85db1602a63
     * Line: 80
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL80_52a87b81e4e0b6b11e23e85db1602a63()
    {
        $client = $this->getClient();
        // tag::52a87b81e4e0b6b11e23e85db1602a63[]
        // TODO -- Implement Example
        // POST twitter/_update_by_query?conflicts=proceed
        // {
        //   "query": { \<1>
        //     "term": {
        //       "user": "kimchy"
        //     }
        //   }
        // }
        // end::52a87b81e4e0b6b11e23e85db1602a63[]

        $curl = 'POST twitter/_update_by_query?conflicts=proceed'
              . '{'
              . '  "query": { \<1>'
              . '    "term": {'
              . '      "user": "kimchy"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2fd69fb0538e4f36ac69a8b8f8bf5ae8
     * Line: 104
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL104_2fd69fb0538e4f36ac69a8b8f8bf5ae8()
    {
        $client = $this->getClient();
        // tag::2fd69fb0538e4f36ac69a8b8f8bf5ae8[]
        // TODO -- Implement Example
        // POST twitter/_update_by_query
        // {
        //   "script": {
        //     "source": "ctx._source.likes++",
        //     "lang": "painless"
        //   },
        //   "query": {
        //     "term": {
        //       "user": "kimchy"
        //     }
        //   }
        // }
        // end::2fd69fb0538e4f36ac69a8b8f8bf5ae8[]

        $curl = 'POST twitter/_update_by_query'
              . '{'
              . '  "script": {'
              . '    "source": "ctx._source.likes++",'
              . '    "lang": "painless"'
              . '  },'
              . '  "query": {'
              . '    "term": {'
              . '      "user": "kimchy"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  cde4dddae5c06e7f1d38c9d933dbc7ac
     * Line: 152
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL152_cde4dddae5c06e7f1d38c9d933dbc7ac()
    {
        $client = $this->getClient();
        // tag::cde4dddae5c06e7f1d38c9d933dbc7ac[]
        // TODO -- Implement Example
        // POST twitter,blog/_update_by_query
        // end::cde4dddae5c06e7f1d38c9d933dbc7ac[]

        $curl = 'POST twitter,blog/_update_by_query';

        // TODO -- make assertion
    }

    /**
     * Tag:  d8b115341da772a628a024e7d1644e73
     * Line: 162
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL162_d8b115341da772a628a024e7d1644e73()
    {
        $client = $this->getClient();
        // tag::d8b115341da772a628a024e7d1644e73[]
        // TODO -- Implement Example
        // POST twitter/_update_by_query?routing=1
        // end::d8b115341da772a628a024e7d1644e73[]

        $curl = 'POST twitter/_update_by_query?routing=1';

        // TODO -- make assertion
    }

    /**
     * Tag:  54a770f053f3225ea0d1e34334232411
     * Line: 172
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL172_54a770f053f3225ea0d1e34334232411()
    {
        $client = $this->getClient();
        // tag::54a770f053f3225ea0d1e34334232411[]
        // TODO -- Implement Example
        // POST twitter/_update_by_query?scroll_size=100
        // end::54a770f053f3225ea0d1e34334232411[]

        $curl = 'POST twitter/_update_by_query?scroll_size=100';

        // TODO -- make assertion
    }

    /**
     * Tag:  c4b278ba293abd0d02a0b5ad1a99f84a
     * Line: 182
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL182_c4b278ba293abd0d02a0b5ad1a99f84a()
    {
        $client = $this->getClient();
        // tag::c4b278ba293abd0d02a0b5ad1a99f84a[]
        // TODO -- Implement Example
        // PUT _ingest/pipeline/set-foo
        // {
        //   "description" : "sets foo",
        //   "processors" : [ {
        //       "set" : {
        //         "field": "foo",
        //         "value": "bar"
        //       }
        //   } ]
        // }
        // POST twitter/_update_by_query?pipeline=set-foo
        // end::c4b278ba293abd0d02a0b5ad1a99f84a[]

        $curl = 'PUT _ingest/pipeline/set-foo'
              . '{'
              . '  "description" : "sets foo",'
              . '  "processors" : [ {'
              . '      "set" : {'
              . '        "field": "foo",'
              . '        "value": "bar"'
              . '      }'
              . '  } ]'
              . '}'
              . 'POST twitter/_update_by_query?pipeline=set-foo';

        // TODO -- make assertion
    }

    /**
     * Tag:  7df191cc7f814e410a4ac7261065e6ef
     * Line: 360
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL360_7df191cc7f814e410a4ac7261065e6ef()
    {
        $client = $this->getClient();
        // tag::7df191cc7f814e410a4ac7261065e6ef[]
        // TODO -- Implement Example
        // GET _tasks?detailed=true&actions=*byquery
        // end::7df191cc7f814e410a4ac7261065e6ef[]

        $curl = 'GET _tasks?detailed=true&actions=*byquery';

        // TODO -- make assertion
    }

    /**
     * Tag:  be3a6431d01846950dc1a39a7a6a1faa
     * Line: 420
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL420_be3a6431d01846950dc1a39a7a6a1faa()
    {
        $client = $this->getClient();
        // tag::be3a6431d01846950dc1a39a7a6a1faa[]
        // TODO -- Implement Example
        // GET /_tasks/r1A2WoRbTwKZ516z6NEs5A:36619
        // end::be3a6431d01846950dc1a39a7a6a1faa[]

        $curl = 'GET /_tasks/r1A2WoRbTwKZ516z6NEs5A:36619';

        // TODO -- make assertion
    }

    /**
     * Tag:  18ddb7e7a4bcafd449df956e828ed7a8
     * Line: 441
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL441_18ddb7e7a4bcafd449df956e828ed7a8()
    {
        $client = $this->getClient();
        // tag::18ddb7e7a4bcafd449df956e828ed7a8[]
        // TODO -- Implement Example
        // POST _tasks/r1A2WoRbTwKZ516z6NEs5A:36619/_cancel
        // end::18ddb7e7a4bcafd449df956e828ed7a8[]

        $curl = 'POST _tasks/r1A2WoRbTwKZ516z6NEs5A:36619/_cancel';

        // TODO -- make assertion
    }

    /**
     * Tag:  bdb30dd52d32f50994008f4f9c0da5f0
     * Line: 461
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL461_bdb30dd52d32f50994008f4f9c0da5f0()
    {
        $client = $this->getClient();
        // tag::bdb30dd52d32f50994008f4f9c0da5f0[]
        // TODO -- Implement Example
        // POST _update_by_query/r1A2WoRbTwKZ516z6NEs5A:36619/_rethrottle?requests_per_second=-1
        // end::bdb30dd52d32f50994008f4f9c0da5f0[]

        $curl = 'POST _update_by_query/r1A2WoRbTwKZ516z6NEs5A:36619/_rethrottle?requests_per_second=-1';

        // TODO -- make assertion
    }

    /**
     * Tag:  0d664883151008b1051ef2c9ab2d0373
     * Line: 490
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL490_0d664883151008b1051ef2c9ab2d0373()
    {
        $client = $this->getClient();
        // tag::0d664883151008b1051ef2c9ab2d0373[]
        // TODO -- Implement Example
        // POST twitter/_update_by_query
        // {
        //   "slice": {
        //     "id": 0,
        //     "max": 2
        //   },
        //   "script": {
        //     "source": "ctx._source[\'extra\'] = \'test\'"
        //   }
        // }
        // POST twitter/_update_by_query
        // {
        //   "slice": {
        //     "id": 1,
        //     "max": 2
        //   },
        //   "script": {
        //     "source": "ctx._source[\'extra\'] = \'test\'"
        //   }
        // }
        // end::0d664883151008b1051ef2c9ab2d0373[]

        $curl = 'POST twitter/_update_by_query'
              . '{'
              . '  "slice": {'
              . '    "id": 0,'
              . '    "max": 2'
              . '  },'
              . '  "script": {'
              . '    "source": "ctx._source[\'extra\'] = \'test\'"'
              . '  }'
              . '}'
              . 'POST twitter/_update_by_query'
              . '{'
              . '  "slice": {'
              . '    "id": 1,'
              . '    "max": 2'
              . '  },'
              . '  "script": {'
              . '    "source": "ctx._source[\'extra\'] = \'test\'"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4acf902c2598b2558f34f20c1744c433
     * Line: 518
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL518_4acf902c2598b2558f34f20c1744c433()
    {
        $client = $this->getClient();
        // tag::4acf902c2598b2558f34f20c1744c433[]
        // TODO -- Implement Example
        // GET _refresh
        // POST twitter/_search?size=0&q=extra:test&filter_path=hits.total
        // end::4acf902c2598b2558f34f20c1744c433[]

        $curl = 'GET _refresh'
              . 'POST twitter/_search?size=0&q=extra:test&filter_path=hits.total';

        // TODO -- make assertion
    }

    /**
     * Tag:  ea02de2dbe05091fcb0dac72c8ba5f83
     * Line: 549
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL549_ea02de2dbe05091fcb0dac72c8ba5f83()
    {
        $client = $this->getClient();
        // tag::ea02de2dbe05091fcb0dac72c8ba5f83[]
        // TODO -- Implement Example
        // POST twitter/_update_by_query?refresh&slices=5
        // {
        //   "script": {
        //     "source": "ctx._source[\'extra\'] = \'test\'"
        //   }
        // }
        // end::ea02de2dbe05091fcb0dac72c8ba5f83[]

        $curl = 'POST twitter/_update_by_query?refresh&slices=5'
              . '{'
              . '  "script": {'
              . '    "source": "ctx._source[\'extra\'] = \'test\'"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  025b54db0edc50c24ea48a2bd94366ad
     * Line: 563
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL563_025b54db0edc50c24ea48a2bd94366ad()
    {
        $client = $this->getClient();
        // tag::025b54db0edc50c24ea48a2bd94366ad[]
        // TODO -- Implement Example
        // POST twitter/_search?size=0&q=extra:test&filter_path=hits.total
        // end::025b54db0edc50c24ea48a2bd94366ad[]

        $curl = 'POST twitter/_search?size=0&q=extra:test&filter_path=hits.total';

        // TODO -- make assertion
    }

    /**
     * Tag:  2fe28d9a91b3081a9ec4601af8fb7b1c
     * Line: 641
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL641_2fe28d9a91b3081a9ec4601af8fb7b1c()
    {
        $client = $this->getClient();
        // tag::2fe28d9a91b3081a9ec4601af8fb7b1c[]
        // TODO -- Implement Example
        // PUT test
        // {
        //   "mappings": {
        //     "dynamic": false,   \<1>
        //     "properties": {
        //       "text": {"type": "text"}
        //     }
        //   }
        // }
        // POST test/_doc?refresh
        // {
        //   "text": "words words",
        //   "flag": "bar"
        // }
        // POST test/_doc?refresh
        // {
        //   "text": "words words",
        //   "flag": "foo"
        // }
        // PUT test/_mapping   \<2>
        // {
        //   "properties": {
        //     "text": {"type": "text"},
        //     "flag": {"type": "text", "analyzer": "keyword"}
        //   }
        // }
        // end::2fe28d9a91b3081a9ec4601af8fb7b1c[]

        $curl = 'PUT test'
              . '{'
              . '  "mappings": {'
              . '    "dynamic": false,   \<1>'
              . '    "properties": {'
              . '      "text": {"type": "text"}'
              . '    }'
              . '  }'
              . '}'
              . 'POST test/_doc?refresh'
              . '{'
              . '  "text": "words words",'
              . '  "flag": "bar"'
              . '}'
              . 'POST test/_doc?refresh'
              . '{'
              . '  "text": "words words",'
              . '  "flag": "foo"'
              . '}'
              . 'PUT test/_mapping   \<2>'
              . '{'
              . '  "properties": {'
              . '    "text": {"type": "text"},'
              . '    "flag": {"type": "text", "analyzer": "keyword"}'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  abd4fc3ce7784413a56fe2dcfe2809b5
     * Line: 680
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL680_abd4fc3ce7784413a56fe2dcfe2809b5()
    {
        $client = $this->getClient();
        // tag::abd4fc3ce7784413a56fe2dcfe2809b5[]
        // TODO -- Implement Example
        // POST test/_search?filter_path=hits.total
        // {
        //   "query": {
        //     "match": {
        //       "flag": "foo"
        //     }
        //   }
        // }
        // end::abd4fc3ce7784413a56fe2dcfe2809b5[]

        $curl = 'POST test/_search?filter_path=hits.total'
              . '{'
              . '  "query": {'
              . '    "match": {'
              . '      "flag": "foo"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  97babc8d19ef0866774576716eb6d19e
     * Line: 709
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL709_97babc8d19ef0866774576716eb6d19e()
    {
        $client = $this->getClient();
        // tag::97babc8d19ef0866774576716eb6d19e[]
        // TODO -- Implement Example
        // POST test/_update_by_query?refresh&conflicts=proceed
        // POST test/_search?filter_path=hits.total
        // {
        //   "query": {
        //     "match": {
        //       "flag": "foo"
        //     }
        //   }
        // }
        // end::97babc8d19ef0866774576716eb6d19e[]

        $curl = 'POST test/_update_by_query?refresh&conflicts=proceed'
              . 'POST test/_search?filter_path=hits.total'
              . '{'
              . '  "query": {'
              . '    "match": {'
              . '      "flag": "foo"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




















}
