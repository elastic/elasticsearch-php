<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Reindex
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   docs/reindex.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Reindex extends SimpleExamplesTester {

    /**
     * Tag:  0cc991e3f7f8511a34730e154b3c5edc
     * Line: 16
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL16_0cc991e3f7f8511a34730e154b3c5edc()
    {
        $client = $this->getClient();
        // tag::0cc991e3f7f8511a34730e154b3c5edc[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "source": {
        //     "index": "twitter"
        //   },
        //   "dest": {
        //     "index": "new_twitter"
        //   }
        // }
        // end::0cc991e3f7f8511a34730e154b3c5edc[]

        $curl = 'POST _reindex'
              . '{'
              . '  "source": {'
              . '    "index": "twitter"'
              . '  },'
              . '  "dest": {'
              . '    "index": "new_twitter"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9ebee1ff26ac0f91321d1d7596c05643
     * Line: 65
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL65_9ebee1ff26ac0f91321d1d7596c05643()
    {
        $client = $this->getClient();
        // tag::9ebee1ff26ac0f91321d1d7596c05643[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "source": {
        //     "index": "twitter"
        //   },
        //   "dest": {
        //     "index": "new_twitter",
        //     "version_type": "internal"
        //   }
        // }
        // end::9ebee1ff26ac0f91321d1d7596c05643[]

        $curl = 'POST _reindex'
              . '{'
              . '  "source": {'
              . '    "index": "twitter"'
              . '  },'
              . '  "dest": {'
              . '    "index": "new_twitter",'
              . '    "version_type": "internal"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  65adbf941edfe6efcfaec4754230ff47
     * Line: 86
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL86_65adbf941edfe6efcfaec4754230ff47()
    {
        $client = $this->getClient();
        // tag::65adbf941edfe6efcfaec4754230ff47[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "source": {
        //     "index": "twitter"
        //   },
        //   "dest": {
        //     "index": "new_twitter",
        //     "version_type": "external"
        //   }
        // }
        // end::65adbf941edfe6efcfaec4754230ff47[]

        $curl = 'POST _reindex'
              . '{'
              . '  "source": {'
              . '    "index": "twitter"'
              . '  },'
              . '  "dest": {'
              . '    "index": "new_twitter",'
              . '    "version_type": "external"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8a104f3787e778cdde057d5e2f4eb919
     * Line: 106
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL106_8a104f3787e778cdde057d5e2f4eb919()
    {
        $client = $this->getClient();
        // tag::8a104f3787e778cdde057d5e2f4eb919[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "source": {
        //     "index": "twitter"
        //   },
        //   "dest": {
        //     "index": "new_twitter",
        //     "op_type": "create"
        //   }
        // }
        // end::8a104f3787e778cdde057d5e2f4eb919[]

        $curl = 'POST _reindex'
              . '{'
              . '  "source": {'
              . '    "index": "twitter"'
              . '  },'
              . '  "dest": {'
              . '    "index": "new_twitter",'
              . '    "op_type": "create"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  dfa9ebfd5216280a42312ea09f73d74d
     * Line: 128
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL128_dfa9ebfd5216280a42312ea09f73d74d()
    {
        $client = $this->getClient();
        // tag::dfa9ebfd5216280a42312ea09f73d74d[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "conflicts": "proceed",
        //   "source": {
        //     "index": "twitter"
        //   },
        //   "dest": {
        //     "index": "new_twitter",
        //     "op_type": "create"
        //   }
        // }
        // end::dfa9ebfd5216280a42312ea09f73d74d[]

        $curl = 'POST _reindex'
              . '{'
              . '  "conflicts": "proceed",'
              . '  "source": {'
              . '    "index": "twitter"'
              . '  },'
              . '  "dest": {'
              . '    "index": "new_twitter",'
              . '    "op_type": "create"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  764f9884b370cbdc82a1c5c42ed40ff3
     * Line: 148
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL148_764f9884b370cbdc82a1c5c42ed40ff3()
    {
        $client = $this->getClient();
        // tag::764f9884b370cbdc82a1c5c42ed40ff3[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "source": {
        //     "index": "twitter",
        //     "query": {
        //       "term": {
        //         "user": "kimchy"
        //       }
        //     }
        //   },
        //   "dest": {
        //     "index": "new_twitter"
        //   }
        // }
        // end::764f9884b370cbdc82a1c5c42ed40ff3[]

        $curl = 'POST _reindex'
              . '{'
              . '  "source": {'
              . '    "index": "twitter",'
              . '    "query": {'
              . '      "term": {'
              . '        "user": "kimchy"'
              . '      }'
              . '    }'
              . '  },'
              . '  "dest": {'
              . '    "index": "new_twitter"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6f097c298a7abf4c032c4314920c49c8
     * Line: 172
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL172_6f097c298a7abf4c032c4314920c49c8()
    {
        $client = $this->getClient();
        // tag::6f097c298a7abf4c032c4314920c49c8[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "source": {
        //     "index": ["twitter", "blog"]
        //   },
        //   "dest": {
        //     "index": "all_together"
        //   }
        // }
        // end::6f097c298a7abf4c032c4314920c49c8[]

        $curl = 'POST _reindex'
              . '{'
              . '  "source": {'
              . '    "index": ["twitter", "blog"]'
              . '  },'
              . '  "dest": {'
              . '    "index": "all_together"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  52b2bfbdd78f8283b6f4891c48013237
     * Line: 197
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL197_52b2bfbdd78f8283b6f4891c48013237()
    {
        $client = $this->getClient();
        // tag::52b2bfbdd78f8283b6f4891c48013237[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "max_docs": 1,
        //   "source": {
        //     "index": "twitter"
        //   },
        //   "dest": {
        //     "index": "new_twitter"
        //   }
        // }
        // end::52b2bfbdd78f8283b6f4891c48013237[]

        $curl = 'POST _reindex'
              . '{'
              . '  "max_docs": 1,'
              . '  "source": {'
              . '    "index": "twitter"'
              . '  },'
              . '  "dest": {'
              . '    "index": "new_twitter"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  96064cf450ccd198ac03cd0c33d3be3d
     * Line: 218
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL218_96064cf450ccd198ac03cd0c33d3be3d()
    {
        $client = $this->getClient();
        // tag::96064cf450ccd198ac03cd0c33d3be3d[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "max_docs": 10000,
        //   "source": {
        //     "index": "twitter",
        //     "sort": { "date": "desc" }
        //   },
        //   "dest": {
        //     "index": "new_twitter"
        //   }
        // }
        // end::96064cf450ccd198ac03cd0c33d3be3d[]

        $curl = 'POST _reindex'
              . '{'
              . '  "max_docs": 10000,'
              . '  "source": {'
              . '    "index": "twitter",'
              . '    "sort": { "date": "desc" }'
              . '  },'
              . '  "dest": {'
              . '    "index": "new_twitter"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e9c2e15b36372d5281c879d336322b6c
     * Line: 240
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL240_e9c2e15b36372d5281c879d336322b6c()
    {
        $client = $this->getClient();
        // tag::e9c2e15b36372d5281c879d336322b6c[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "source": {
        //     "index": "twitter",
        //     "_source": ["user", "_doc"]
        //   },
        //   "dest": {
        //     "index": "new_twitter"
        //   }
        // }
        // end::e9c2e15b36372d5281c879d336322b6c[]

        $curl = 'POST _reindex'
              . '{'
              . '  "source": {'
              . '    "index": "twitter",'
              . '    "_source": ["user", "_doc"]'
              . '  },'
              . '  "dest": {'
              . '    "index": "new_twitter"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8871b8fcb6de4f0c7dff22798fb10fb7
     * Line: 261
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL261_8871b8fcb6de4f0c7dff22798fb10fb7()
    {
        $client = $this->getClient();
        // tag::8871b8fcb6de4f0c7dff22798fb10fb7[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "source": {
        //     "index": "twitter"
        //   },
        //   "dest": {
        //     "index": "new_twitter",
        //     "version_type": "external"
        //   },
        //   "script": {
        //     "source": "if (ctx._source.foo == 'bar') {ctx._version++; ctx._source.remove('foo')}",
        //     "lang": "painless"
        //   }
        // }
        // end::8871b8fcb6de4f0c7dff22798fb10fb7[]

        $curl = 'POST _reindex'
              . '{'
              . '  "source": {'
              . '    "index": "twitter"'
              . '  },'
              . '  "dest": {'
              . '    "index": "new_twitter",'
              . '    "version_type": "external"'
              . '  },'
              . '  "script": {'
              . '    "source": "if (ctx._source.foo == 'bar') {ctx._version++; ctx._source.remove('foo')}",'
              . '    "lang": "painless"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  78c96113ae4ed0054e581b17542528a7
     * Line: 334
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL334_78c96113ae4ed0054e581b17542528a7()
    {
        $client = $this->getClient();
        // tag::78c96113ae4ed0054e581b17542528a7[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "source": {
        //     "index": "source",
        //     "query": {
        //       "match": {
        //         "company": "cat"
        //       }
        //     }
        //   },
        //   "dest": {
        //     "index": "dest",
        //     "routing": "=cat"
        //   }
        // }
        // end::78c96113ae4ed0054e581b17542528a7[]

        $curl = 'POST _reindex'
              . '{'
              . '  "source": {'
              . '    "index": "source",'
              . '    "query": {'
              . '      "match": {'
              . '        "company": "cat"'
              . '      }'
              . '    }'
              . '  },'
              . '  "dest": {'
              . '    "index": "dest",'
              . '    "routing": "=cat"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  400e89eb46ead8e9c9e40f123fd5e590
     * Line: 358
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL358_400e89eb46ead8e9c9e40f123fd5e590()
    {
        $client = $this->getClient();
        // tag::400e89eb46ead8e9c9e40f123fd5e590[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "source": {
        //     "index": "source",
        //     "size": 100
        //   },
        //   "dest": {
        //     "index": "dest",
        //     "routing": "=cat"
        //   }
        // }
        // end::400e89eb46ead8e9c9e40f123fd5e590[]

        $curl = 'POST _reindex'
              . '{'
              . '  "source": {'
              . '    "index": "source",'
              . '    "size": 100'
              . '  },'
              . '  "dest": {'
              . '    "index": "dest",'
              . '    "routing": "=cat"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b1efa1c51a34dd5ab5511b71a399f5b1
     * Line: 378
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL378_b1efa1c51a34dd5ab5511b71a399f5b1()
    {
        $client = $this->getClient();
        // tag::b1efa1c51a34dd5ab5511b71a399f5b1[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "source": {
        //     "index": "source"
        //   },
        //   "dest": {
        //     "index": "dest",
        //     "pipeline": "some_ingest_pipeline"
        //   }
        // }
        // end::b1efa1c51a34dd5ab5511b71a399f5b1[]

        $curl = 'POST _reindex'
              . '{'
              . '  "source": {'
              . '    "index": "source"'
              . '  },'
              . '  "dest": {'
              . '    "index": "dest",'
              . '    "pipeline": "some_ingest_pipeline"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  36b2778f23d0955255f52c075c4d213d
     * Line: 400
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL400_36b2778f23d0955255f52c075c4d213d()
    {
        $client = $this->getClient();
        // tag::36b2778f23d0955255f52c075c4d213d[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "source": {
        //     "remote": {
        //       "host": "http://otherhost:9200",
        //       "username": "user",
        //       "password": "pass"
        //     },
        //     "index": "source",
        //     "query": {
        //       "match": {
        //         "test": "data"
        //       }
        //     }
        //   },
        //   "dest": {
        //     "index": "dest"
        //   }
        // }
        // end::36b2778f23d0955255f52c075c4d213d[]

        $curl = 'POST _reindex'
              . '{'
              . '  "source": {'
              . '    "remote": {'
              . '      "host": "http://otherhost:9200",'
              . '      "username": "user",'
              . '      "password": "pass"'
              . '    },'
              . '    "index": "source",'
              . '    "query": {'
              . '      "match": {'
              . '        "test": "data"'
              . '      }'
              . '    }'
              . '  },'
              . '  "dest": {'
              . '    "index": "dest"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  64b9baa6d7556b960b29698f3383aa31
     * Line: 468
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL468_64b9baa6d7556b960b29698f3383aa31()
    {
        $client = $this->getClient();
        // tag::64b9baa6d7556b960b29698f3383aa31[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "source": {
        //     "remote": {
        //       "host": "http://otherhost:9200"
        //     },
        //     "index": "source",
        //     "size": 10,
        //     "query": {
        //       "match": {
        //         "test": "data"
        //       }
        //     }
        //   },
        //   "dest": {
        //     "index": "dest"
        //   }
        // }
        // end::64b9baa6d7556b960b29698f3383aa31[]

        $curl = 'POST _reindex'
              . '{'
              . '  "source": {'
              . '    "remote": {'
              . '      "host": "http://otherhost:9200"'
              . '    },'
              . '    "index": "source",'
              . '    "size": 10,'
              . '    "query": {'
              . '      "match": {'
              . '        "test": "data"'
              . '      }'
              . '    }'
              . '  },'
              . '  "dest": {'
              . '    "index": "dest"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7f697eb436dfa3c30dfe610d8c32d132
     * Line: 500
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL500_7f697eb436dfa3c30dfe610d8c32d132()
    {
        $client = $this->getClient();
        // tag::7f697eb436dfa3c30dfe610d8c32d132[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "source": {
        //     "remote": {
        //       "host": "http://otherhost:9200",
        //       "socket_timeout": "1m",
        //       "connect_timeout": "10s"
        //     },
        //     "index": "source",
        //     "query": {
        //       "match": {
        //         "test": "data"
        //       }
        //     }
        //   },
        //   "dest": {
        //     "index": "dest"
        //   }
        // }
        // end::7f697eb436dfa3c30dfe610d8c32d132[]

        $curl = 'POST _reindex'
              . '{'
              . '  "source": {'
              . '    "remote": {'
              . '      "host": "http://otherhost:9200",'
              . '      "socket_timeout": "1m",'
              . '      "connect_timeout": "10s"'
              . '    },'
              . '    "index": "source",'
              . '    "query": {'
              . '      "match": {'
              . '        "test": "data"'
              . '      }'
              . '    }'
              . '  },'
              . '  "dest": {'
              . '    "index": "dest"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  973ff58c444e48580971b7203d304502
     * Line: 790
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL790_973ff58c444e48580971b7203d304502()
    {
        $client = $this->getClient();
        // tag::973ff58c444e48580971b7203d304502[]
        // TODO -- Implement Example
        // GET _tasks?detailed=true&actions=*reindex
        // end::973ff58c444e48580971b7203d304502[]

        $curl = 'GET _tasks?detailed=true&actions=*reindex';

        // TODO -- make assertion
    }

    /**
     * Tag:  be3a6431d01846950dc1a39a7a6a1faa
     * Line: 855
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL855_be3a6431d01846950dc1a39a7a6a1faa()
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
     * Line: 877
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL877_18ddb7e7a4bcafd449df956e828ed7a8()
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
     * Tag:  68738b4fd0dda177022be45be95b4c84
     * Line: 896
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL896_68738b4fd0dda177022be45be95b4c84()
    {
        $client = $this->getClient();
        // tag::68738b4fd0dda177022be45be95b4c84[]
        // TODO -- Implement Example
        // POST _reindex/r1A2WoRbTwKZ516z6NEs5A:36619/_rethrottle?requests_per_second=-1
        // end::68738b4fd0dda177022be45be95b4c84[]

        $curl = 'POST _reindex/r1A2WoRbTwKZ516z6NEs5A:36619/_rethrottle?requests_per_second=-1';

        // TODO -- make assertion
    }

    /**
     * Tag:  1577e6e806b3283c9e99f1596d310754
     * Line: 918
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL918_1577e6e806b3283c9e99f1596d310754()
    {
        $client = $this->getClient();
        // tag::1577e6e806b3283c9e99f1596d310754[]
        // TODO -- Implement Example
        // POST test/_doc/1?refresh
        // {
        //   "text": "words words",
        //   "flag": "foo"
        // }
        // end::1577e6e806b3283c9e99f1596d310754[]

        $curl = 'POST test/_doc/1?refresh'
              . '{'
              . '  "text": "words words",'
              . '  "flag": "foo"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1216f8f7367df3aa823012cef310c08a
     * Line: 931
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL931_1216f8f7367df3aa823012cef310c08a()
    {
        $client = $this->getClient();
        // tag::1216f8f7367df3aa823012cef310c08a[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "source": {
        //     "index": "test"
        //   },
        //   "dest": {
        //     "index": "test2"
        //   },
        //   "script": {
        //     "source": "ctx._source.tag = ctx._source.remove(\"flag\")"
        //   }
        // }
        // end::1216f8f7367df3aa823012cef310c08a[]

        $curl = 'POST _reindex'
              . '{'
              . '  "source": {'
              . '    "index": "test"'
              . '  },'
              . '  "dest": {'
              . '    "index": "test2"'
              . '  },'
              . '  "script": {'
              . '    "source": "ctx._source.tag = ctx._source.remove(\"flag\")"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  cfc37446bd892d1ac42a3c8e8b204e6c
     * Line: 951
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL951_cfc37446bd892d1ac42a3c8e8b204e6c()
    {
        $client = $this->getClient();
        // tag::cfc37446bd892d1ac42a3c8e8b204e6c[]
        // TODO -- Implement Example
        // GET test2/_doc/1
        // end::cfc37446bd892d1ac42a3c8e8b204e6c[]

        $curl = 'GET test2/_doc/1';

        // TODO -- make assertion
    }

    /**
     * Tag:  1b8655e6ba99fe39933c6eafe78728b7
     * Line: 996
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL996_1b8655e6ba99fe39933c6eafe78728b7()
    {
        $client = $this->getClient();
        // tag::1b8655e6ba99fe39933c6eafe78728b7[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "source": {
        //     "index": "twitter",
        //     "slice": {
        //       "id": 0,
        //       "max": 2
        //     }
        //   },
        //   "dest": {
        //     "index": "new_twitter"
        //   }
        // }
        // POST _reindex
        // {
        //   "source": {
        //     "index": "twitter",
        //     "slice": {
        //       "id": 1,
        //       "max": 2
        //     }
        //   },
        //   "dest": {
        //     "index": "new_twitter"
        //   }
        // }
        // end::1b8655e6ba99fe39933c6eafe78728b7[]

        $curl = 'POST _reindex'
              . '{'
              . '  "source": {'
              . '    "index": "twitter",'
              . '    "slice": {'
              . '      "id": 0,'
              . '      "max": 2'
              . '    }'
              . '  },'
              . '  "dest": {'
              . '    "index": "new_twitter"'
              . '  }'
              . '}'
              . 'POST _reindex'
              . '{'
              . '  "source": {'
              . '    "index": "twitter",'
              . '    "slice": {'
              . '      "id": 1,'
              . '      "max": 2'
              . '    }'
              . '  },'
              . '  "dest": {'
              . '    "index": "new_twitter"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3ae03ba3b56e5e287953094050766738
     * Line: 1030
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1030_3ae03ba3b56e5e287953094050766738()
    {
        $client = $this->getClient();
        // tag::3ae03ba3b56e5e287953094050766738[]
        // TODO -- Implement Example
        // GET _refresh
        // POST new_twitter/_search?size=0&filter_path=hits.total
        // end::3ae03ba3b56e5e287953094050766738[]

        $curl = 'GET _refresh'
              . 'POST new_twitter/_search?size=0&filter_path=hits.total';

        // TODO -- make assertion
    }

    /**
     * Tag:  cb01106bf524df5e0501d4c655c1aa7b
     * Line: 1060
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1060_cb01106bf524df5e0501d4c655c1aa7b()
    {
        $client = $this->getClient();
        // tag::cb01106bf524df5e0501d4c655c1aa7b[]
        // TODO -- Implement Example
        // POST _reindex?slices=5&refresh
        // {
        //   "source": {
        //     "index": "twitter"
        //   },
        //   "dest": {
        //     "index": "new_twitter"
        //   }
        // }
        // end::cb01106bf524df5e0501d4c655c1aa7b[]

        $curl = 'POST _reindex?slices=5&refresh'
              . '{'
              . '  "source": {'
              . '    "index": "twitter"'
              . '  },'
              . '  "dest": {'
              . '    "index": "new_twitter"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e567e6dbf86300142573c73789c8fce4
     * Line: 1077
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1077_e567e6dbf86300142573c73789c8fce4()
    {
        $client = $this->getClient();
        // tag::e567e6dbf86300142573c73789c8fce4[]
        // TODO -- Implement Example
        // POST new_twitter/_search?size=0&filter_path=hits.total
        // end::e567e6dbf86300142573c73789c8fce4[]

        $curl = 'POST new_twitter/_search?size=0&filter_path=hits.total';

        // TODO -- make assertion
    }

    /**
     * Tag:  9a4d5e41c52c20635d1fd9c6e13f6c7a
     * Line: 1182
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1182_9a4d5e41c52c20635d1fd9c6e13f6c7a()
    {
        $client = $this->getClient();
        // tag::9a4d5e41c52c20635d1fd9c6e13f6c7a[]
        // TODO -- Implement Example
        // PUT metricbeat-2016.05.30/_doc/1?refresh
        // {"system.cpu.idle.pct": 0.908}
        // PUT metricbeat-2016.05.31/_doc/1?refresh
        // {"system.cpu.idle.pct": 0.105}
        // end::9a4d5e41c52c20635d1fd9c6e13f6c7a[]

        $curl = 'PUT metricbeat-2016.05.30/_doc/1?refresh'
              . '{"system.cpu.idle.pct": 0.908}'
              . 'PUT metricbeat-2016.05.31/_doc/1?refresh'
              . '{"system.cpu.idle.pct": 0.105}';

        // TODO -- make assertion
    }

    /**
     * Tag:  973a3ff47fc4ce036ecd9bd363fef9f7
     * Line: 1199
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1199_973a3ff47fc4ce036ecd9bd363fef9f7()
    {
        $client = $this->getClient();
        // tag::973a3ff47fc4ce036ecd9bd363fef9f7[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "source": {
        //     "index": "metricbeat-*"
        //   },
        //   "dest": {
        //     "index": "metricbeat"
        //   },
        //   "script": {
        //     "lang": "painless",
        //     "source": "ctx._index = 'metricbeat-' + (ctx._index.substring('metricbeat-'.length(), ctx._index.length())) + '-1'"
        //   }
        // }
        // end::973a3ff47fc4ce036ecd9bd363fef9f7[]

        $curl = 'POST _reindex'
              . '{'
              . '  "source": {'
              . '    "index": "metricbeat-*"'
              . '  },'
              . '  "dest": {'
              . '    "index": "metricbeat"'
              . '  },'
              . '  "script": {'
              . '    "lang": "painless",'
              . '    "source": "ctx._index = 'metricbeat-' + (ctx._index.substring('metricbeat-'.length(), ctx._index.length())) + '-1'"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3b04cc894e6a47d57983484010feac0c
     * Line: 1220
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1220_3b04cc894e6a47d57983484010feac0c()
    {
        $client = $this->getClient();
        // tag::3b04cc894e6a47d57983484010feac0c[]
        // TODO -- Implement Example
        // GET metricbeat-2016.05.30-1/_doc/1
        // GET metricbeat-2016.05.31-1/_doc/1
        // end::3b04cc894e6a47d57983484010feac0c[]

        $curl = 'GET metricbeat-2016.05.30-1/_doc/1'
              . 'GET metricbeat-2016.05.31-1/_doc/1';

        // TODO -- make assertion
    }

    /**
     * Tag:  8b33c9257041fabad8cea43fa049f98f
     * Line: 1236
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1236_8b33c9257041fabad8cea43fa049f98f()
    {
        $client = $this->getClient();
        // tag::8b33c9257041fabad8cea43fa049f98f[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "max_docs": 10,
        //   "source": {
        //     "index": "twitter",
        //     "query": {
        //       "function_score" : {
        //         "query" : { "match_all": {} },
        //         "random_score" : {}
        //       }
        //     },
        //     "sort": "_score"    \<1>
        //   },
        //   "dest": {
        //     "index": "random_twitter"
        //   }
        // }
        // end::8b33c9257041fabad8cea43fa049f98f[]

        $curl = 'POST _reindex'
              . '{'
              . '  "max_docs": 10,'
              . '  "source": {'
              . '    "index": "twitter",'
              . '    "query": {'
              . '      "function_score" : {'
              . '        "query" : { "match_all": {} },'
              . '        "random_score" : {}'
              . '      }'
              . '    },'
              . '    "sort": "_score"    \<1>'
              . '  },'
              . '  "dest": {'
              . '    "index": "random_twitter"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%

































}
