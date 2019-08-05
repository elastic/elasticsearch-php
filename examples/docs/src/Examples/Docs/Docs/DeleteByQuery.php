<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeleteByQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   docs/delete-by-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeleteByQuery extends SimpleExamplesTester {

    /**
     * Tag:  c1de6df850c4111c68ec57a6f9c2ec6d
     * Line: 8
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL8_c1de6df850c4111c68ec57a6f9c2ec6d()
    {
        $client = $this->getClient();
        // tag::c1de6df850c4111c68ec57a6f9c2ec6d[]
        // TODO -- Implement Example
        // POST twitter/_delete_by_query
        // {
        //   "query": { \<1>
        //     "match": {
        //       "message": "some message"
        //     }
        //   }
        // }
        // end::c1de6df850c4111c68ec57a6f9c2ec6d[]

        $curl = 'POST twitter/_delete_by_query'
              . '{'
              . '  "query": { \<1>'
              . '    "match": {'
              . '      "message": "some message"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e21e1c26dc8687e7bf7bd2bf019a6698
     * Line: 77
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL77_e21e1c26dc8687e7bf7bd2bf019a6698()
    {
        $client = $this->getClient();
        // tag::e21e1c26dc8687e7bf7bd2bf019a6698[]
        // TODO -- Implement Example
        // POST twitter/_delete_by_query?conflicts=proceed
        // {
        //   "query": {
        //     "match_all": {}
        //   }
        // }
        // end::e21e1c26dc8687e7bf7bd2bf019a6698[]

        $curl = 'POST twitter/_delete_by_query?conflicts=proceed'
              . '{'
              . '  "query": {'
              . '    "match_all": {}'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  099e1dbe296568756df5a9816efcae45
     * Line: 92
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL92_099e1dbe296568756df5a9816efcae45()
    {
        $client = $this->getClient();
        // tag::099e1dbe296568756df5a9816efcae45[]
        // TODO -- Implement Example
        // POST twitter,blog/_delete_by_query
        // {
        //   "query": {
        //     "match_all": {}
        //   }
        // }
        // end::099e1dbe296568756df5a9816efcae45[]

        $curl = 'POST twitter,blog/_delete_by_query'
              . '{'
              . '  "query": {'
              . '    "match_all": {}'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c32a3f8071d87f0a3f5a78e07fe7a669
     * Line: 107
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL107_c32a3f8071d87f0a3f5a78e07fe7a669()
    {
        $client = $this->getClient();
        // tag::c32a3f8071d87f0a3f5a78e07fe7a669[]
        // TODO -- Implement Example
        // POST twitter/_delete_by_query?routing=1
        // {
        //   "query": {
        //     "range" : {
        //         "age" : {
        //            "gte" : 10
        //         }
        //     }
        //   }
        // }
        // end::c32a3f8071d87f0a3f5a78e07fe7a669[]

        $curl = 'POST twitter/_delete_by_query?routing=1'
              . '{'
              . '  "query": {'
              . '    "range" : {'
              . '        "age" : {'
              . '           "gte" : 10'
              . '        }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  dfb1fe96d806a644214d06f9b4b87878
     * Line: 126
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL126_dfb1fe96d806a644214d06f9b4b87878()
    {
        $client = $this->getClient();
        // tag::dfb1fe96d806a644214d06f9b4b87878[]
        // TODO -- Implement Example
        // POST twitter/_delete_by_query?scroll_size=5000
        // {
        //   "query": {
        //     "term": {
        //       "user": "kimchy"
        //     }
        //   }
        // }
        // end::dfb1fe96d806a644214d06f9b4b87878[]

        $curl = 'POST twitter/_delete_by_query?scroll_size=5000'
              . '{'
              . '  "query": {'
              . '    "term": {'
              . '      "user": "kimchy"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  216848930c2d344fe0bed0daa70c35b9
     * Line: 303
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL303_216848930c2d344fe0bed0daa70c35b9()
    {
        $client = $this->getClient();
        // tag::216848930c2d344fe0bed0daa70c35b9[]
        // TODO -- Implement Example
        // GET _tasks?detailed=true&actions=*/delete/byquery
        // end::216848930c2d344fe0bed0daa70c35b9[]

        $curl = 'GET _tasks?detailed=true&actions=*/delete/byquery';

        // TODO -- make assertion
    }

    /**
     * Tag:  be3a6431d01846950dc1a39a7a6a1faa
     * Line: 358
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL358_be3a6431d01846950dc1a39a7a6a1faa()
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
     * Line: 379
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL379_18ddb7e7a4bcafd449df956e828ed7a8()
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
     * Tag:  52c7e4172a446c394210a07c464c57d2
     * Line: 399
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL399_52c7e4172a446c394210a07c464c57d2()
    {
        $client = $this->getClient();
        // tag::52c7e4172a446c394210a07c464c57d2[]
        // TODO -- Implement Example
        // POST _delete_by_query/r1A2WoRbTwKZ516z6NEs5A:36619/_rethrottle?requests_per_second=-1
        // end::52c7e4172a446c394210a07c464c57d2[]

        $curl = 'POST _delete_by_query/r1A2WoRbTwKZ516z6NEs5A:36619/_rethrottle?requests_per_second=-1';

        // TODO -- make assertion
    }

    /**
     * Tag:  1e49eba5b9042c1900a608fe5105ba43
     * Line: 429
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL429_1e49eba5b9042c1900a608fe5105ba43()
    {
        $client = $this->getClient();
        // tag::1e49eba5b9042c1900a608fe5105ba43[]
        // TODO -- Implement Example
        // POST twitter/_delete_by_query
        // {
        //   "slice": {
        //     "id": 0,
        //     "max": 2
        //   },
        //   "query": {
        //     "range": {
        //       "likes": {
        //         "lt": 10
        //       }
        //     }
        //   }
        // }
        // POST twitter/_delete_by_query
        // {
        //   "slice": {
        //     "id": 1,
        //     "max": 2
        //   },
        //   "query": {
        //     "range": {
        //       "likes": {
        //         "lt": 10
        //       }
        //     }
        //   }
        // }
        // end::1e49eba5b9042c1900a608fe5105ba43[]

        $curl = 'POST twitter/_delete_by_query'
              . '{'
              . '  "slice": {'
              . '    "id": 0,'
              . '    "max": 2'
              . '  },'
              . '  "query": {'
              . '    "range": {'
              . '      "likes": {'
              . '        "lt": 10'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST twitter/_delete_by_query'
              . '{'
              . '  "slice": {'
              . '    "id": 1,'
              . '    "max": 2'
              . '  },'
              . '  "query": {'
              . '    "range": {'
              . '      "likes": {'
              . '        "lt": 10'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3e573bfabe00f8bfb8bb69aa5820768e
     * Line: 465
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL465_3e573bfabe00f8bfb8bb69aa5820768e()
    {
        $client = $this->getClient();
        // tag::3e573bfabe00f8bfb8bb69aa5820768e[]
        // TODO -- Implement Example
        // GET _refresh
        // POST twitter/_search?size=0&filter_path=hits.total
        // {
        //   "query": {
        //     "range": {
        //       "likes": {
        //         "lt": 10
        //       }
        //     }
        //   }
        // }
        // end::3e573bfabe00f8bfb8bb69aa5820768e[]

        $curl = 'GET _refresh'
              . 'POST twitter/_search?size=0&filter_path=hits.total'
              . '{'
              . '  "query": {'
              . '    "range": {'
              . '      "likes": {'
              . '        "lt": 10'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a5a7050fb9dcb9574e081957ade28617
     * Line: 505
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL505_a5a7050fb9dcb9574e081957ade28617()
    {
        $client = $this->getClient();
        // tag::a5a7050fb9dcb9574e081957ade28617[]
        // TODO -- Implement Example
        // POST twitter/_delete_by_query?refresh&slices=5
        // {
        //   "query": {
        //     "range": {
        //       "likes": {
        //         "lt": 10
        //       }
        //     }
        //   }
        // }
        // end::a5a7050fb9dcb9574e081957ade28617[]

        $curl = 'POST twitter/_delete_by_query?refresh&slices=5'
              . '{'
              . '  "query": {'
              . '    "range": {'
              . '      "likes": {'
              . '        "lt": 10'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  14701dcc0cca9665fce2aace0cb62af7
     * Line: 523
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL523_14701dcc0cca9665fce2aace0cb62af7()
    {
        $client = $this->getClient();
        // tag::14701dcc0cca9665fce2aace0cb62af7[]
        // TODO -- Implement Example
        // POST twitter/_search?size=0&filter_path=hits.total
        // {
        //   "query": {
        //     "range": {
        //       "likes": {
        //         "lt": 10
        //       }
        //     }
        //   }
        // }
        // end::14701dcc0cca9665fce2aace0cb62af7[]

        $curl = 'POST twitter/_search?size=0&filter_path=hits.total'
              . '{'
              . '  "query": {'
              . '    "range": {'
              . '      "likes": {'
              . '        "lt": 10'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%














}
