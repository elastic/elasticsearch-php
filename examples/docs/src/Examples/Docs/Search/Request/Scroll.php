<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Scroll
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/request/scroll.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Scroll extends SimpleExamplesTester {

    /**
     * Tag:  7e52bec09624cf6c0de5d13f2bfad5a5
     * Line: 40
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL40_7e52bec09624cf6c0de5d13f2bfad5a5()
    {
        $client = $this->getClient();
        // tag::7e52bec09624cf6c0de5d13f2bfad5a5[]
        // TODO -- Implement Example
        // POST /twitter/_search?scroll=1m
        // {
        //     "size": 100,
        //     "query": {
        //         "match" : {
        //             "title" : "elasticsearch"
        //         }
        //     }
        // }
        // end::7e52bec09624cf6c0de5d13f2bfad5a5[]

        $curl = 'POST /twitter/_search?scroll=1m'
              . '{'
              . '    "size": 100,'
              . '    "query": {'
              . '        "match" : {'
              . '            "title" : "elasticsearch"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b41dce56b0e640d32b1cf452f87cec17
     * Line: 59
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL59_b41dce56b0e640d32b1cf452f87cec17()
    {
        $client = $this->getClient();
        // tag::b41dce56b0e640d32b1cf452f87cec17[]
        // TODO -- Implement Example
        // POST /_search/scroll \<1>
        // {
        //     "scroll" : "1m", \<2>
        //     "scroll_id" : "DXF1ZXJ5QW5kRmV0Y2gBAAAAAAAAAD4WYm9laVYtZndUQlNsdDcwakFMNjU1QQ==" \<3>
        // }
        // end::b41dce56b0e640d32b1cf452f87cec17[]

        $curl = 'POST /_search/scroll \<1>'
              . '{'
              . '    "scroll" : "1m", \<2>'
              . '    "scroll_id" : "DXF1ZXJ5QW5kRmV0Y2gBAAAAAAAAAD4WYm9laVYtZndUQlNsdDcwakFMNjU1QQ==" \<3>'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d5dcddc6398b473b6ad9bce5c6adf986
     * Line: 92
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL92_d5dcddc6398b473b6ad9bce5c6adf986()
    {
        $client = $this->getClient();
        // tag::d5dcddc6398b473b6ad9bce5c6adf986[]
        // TODO -- Implement Example
        // GET /_search?scroll=1m
        // {
        //   "sort": [
        //     "_doc"
        //   ]
        // }
        // end::d5dcddc6398b473b6ad9bce5c6adf986[]

        $curl = 'GET /_search?scroll=1m'
              . '{'
              . '  "sort": ['
              . '    "_doc"'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  72beebe779a258c225dee7b023e60c52
     * Line: 146
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL146_72beebe779a258c225dee7b023e60c52()
    {
        $client = $this->getClient();
        // tag::72beebe779a258c225dee7b023e60c52[]
        // TODO -- Implement Example
        // GET /_nodes/stats/indices/search
        // end::72beebe779a258c225dee7b023e60c52[]

        $curl = 'GET /_nodes/stats/indices/search';

        // TODO -- make assertion
    }

    /**
     * Tag:  b0d64d0a554549e5b2808002a0725493
     * Line: 160
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL160_b0d64d0a554549e5b2808002a0725493()
    {
        $client = $this->getClient();
        // tag::b0d64d0a554549e5b2808002a0725493[]
        // TODO -- Implement Example
        // DELETE /_search/scroll
        // {
        //     "scroll_id" : "DXF1ZXJ5QW5kRmV0Y2gBAAAAAAAAAD4WYm9laVYtZndUQlNsdDcwakFMNjU1QQ=="
        // }
        // end::b0d64d0a554549e5b2808002a0725493[]

        $curl = 'DELETE /_search/scroll'
              . '{'
              . '    "scroll_id" : "DXF1ZXJ5QW5kRmV0Y2gBAAAAAAAAAD4WYm9laVYtZndUQlNsdDcwakFMNjU1QQ=="'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3a700f836d8d5da1b656a876554028aa
     * Line: 172
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL172_3a700f836d8d5da1b656a876554028aa()
    {
        $client = $this->getClient();
        // tag::3a700f836d8d5da1b656a876554028aa[]
        // TODO -- Implement Example
        // DELETE /_search/scroll
        // {
        //     "scroll_id" : [
        //       "DXF1ZXJ5QW5kRmV0Y2gBAAAAAAAAAD4WYm9laVYtZndUQlNsdDcwakFMNjU1QQ==",
        //       "DnF1ZXJ5VGhlbkZldGNoBQAAAAAAAAABFmtSWWRRWUJrU2o2ZExpSGJCVmQxYUEAAAAAAAAAAxZrUllkUVlCa1NqNmRMaUhiQlZkMWFBAAAAAAAAAAIWa1JZZFFZQmtTajZkTGlIYkJWZDFhQQAAAAAAAAAFFmtSWWRRWUJrU2o2ZExpSGJCVmQxYUEAAAAAAAAABBZrUllkUVlCa1NqNmRMaUhiQlZkMWFB"
        //     ]
        // }
        // end::3a700f836d8d5da1b656a876554028aa[]

        $curl = 'DELETE /_search/scroll'
              . '{'
              . '    "scroll_id" : ['
              . '      "DXF1ZXJ5QW5kRmV0Y2gBAAAAAAAAAD4WYm9laVYtZndUQlNsdDcwakFMNjU1QQ==",'
              . '      "DnF1ZXJ5VGhlbkZldGNoBQAAAAAAAAABFmtSWWRRWUJrU2o2ZExpSGJCVmQxYUEAAAAAAAAAAxZrUllkUVlCa1NqNmRMaUhiQlZkMWFBAAAAAAAAAAIWa1JZZFFZQmtTajZkTGlIYkJWZDFhQQAAAAAAAAAFFmtSWWRRWUJrU2o2ZExpSGJCVmQxYUEAAAAAAAAABBZrUllkUVlCa1NqNmRMaUhiQlZkMWFB"'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c2c21e2824fbf6b7198ede30419da82b
     * Line: 187
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL187_c2c21e2824fbf6b7198ede30419da82b()
    {
        $client = $this->getClient();
        // tag::c2c21e2824fbf6b7198ede30419da82b[]
        // TODO -- Implement Example
        // DELETE /_search/scroll/_all
        // end::c2c21e2824fbf6b7198ede30419da82b[]

        $curl = 'DELETE /_search/scroll/_all';

        // TODO -- make assertion
    }

    /**
     * Tag:  b94cee0f74f57742b3948f9b784dfdd4
     * Line: 196
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL196_b94cee0f74f57742b3948f9b784dfdd4()
    {
        $client = $this->getClient();
        // tag::b94cee0f74f57742b3948f9b784dfdd4[]
        // TODO -- Implement Example
        // DELETE /_search/scroll/DXF1ZXJ5QW5kRmV0Y2gBAAAAAAAAAD4WYm9laVYtZndUQlNsdDcwakFMNjU1QQ==,DnF1ZXJ5VGhlbkZldGNoBQAAAAAAAAABFmtSWWRRWUJrU2o2ZExpSGJCVmQxYUEAAAAAAAAAAxZrUllkUVlCa1NqNmRMaUhiQlZkMWFBAAAAAAAAAAIWa1JZZFFZQmtTajZkTGlIYkJWZDFhQQAAAAAAAAAFFmtSWWRRWUJrU2o2ZExpSGJCVmQxYUEAAAAAAAAABBZrUllkUVlCa1NqNmRMaUhiQlZkMWFB
        // end::b94cee0f74f57742b3948f9b784dfdd4[]

        $curl = 'DELETE /_search/scroll/DXF1ZXJ5QW5kRmV0Y2gBAAAAAAAAAD4WYm9laVYtZndUQlNsdDcwakFMNjU1QQ==,DnF1ZXJ5VGhlbkZldGNoBQAAAAAAAAABFmtSWWRRWUJrU2o2ZExpSGJCVmQxYUEAAAAAAAAAAxZrUllkUVlCa1NqNmRMaUhiQlZkMWFBAAAAAAAAAAIWa1JZZFFZQmtTajZkTGlIYkJWZDFhQQAAAAAAAAAFFmtSWWRRWUJrU2o2ZExpSGJCVmQxYUEAAAAAAAAABBZrUllkUVlCa1NqNmRMaUhiQlZkMWFB';

        // TODO -- make assertion
    }

    /**
     * Tag:  1027ab1ca767ac1428176ef4f84bfbcf
     * Line: 209
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL209_1027ab1ca767ac1428176ef4f84bfbcf()
    {
        $client = $this->getClient();
        // tag::1027ab1ca767ac1428176ef4f84bfbcf[]
        // TODO -- Implement Example
        // GET /twitter/_search?scroll=1m
        // {
        //     "slice": {
        //         "id": 0, \<1>
        //         "max": 2 \<2>
        //     },
        //     "query": {
        //         "match" : {
        //             "title" : "elasticsearch"
        //         }
        //     }
        // }
        // GET /twitter/_search?scroll=1m
        // {
        //     "slice": {
        //         "id": 1,
        //         "max": 2
        //     },
        //     "query": {
        //         "match" : {
        //             "title" : "elasticsearch"
        //         }
        //     }
        // }
        // end::1027ab1ca767ac1428176ef4f84bfbcf[]

        $curl = 'GET /twitter/_search?scroll=1m'
              . '{'
              . '    "slice": {'
              . '        "id": 0, \<1>'
              . '        "max": 2 \<2>'
              . '    },'
              . '    "query": {'
              . '        "match" : {'
              . '            "title" : "elasticsearch"'
              . '        }'
              . '    }'
              . '}'
              . 'GET /twitter/_search?scroll=1m'
              . '{'
              . '    "slice": {'
              . '        "id": 1,'
              . '        "max": 2'
              . '    },'
              . '    "query": {'
              . '        "match" : {'
              . '            "title" : "elasticsearch"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  fdcaba9547180439ff4b6275034a5170
     * Line: 272
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL272_fdcaba9547180439ff4b6275034a5170()
    {
        $client = $this->getClient();
        // tag::fdcaba9547180439ff4b6275034a5170[]
        // TODO -- Implement Example
        // GET /twitter/_search?scroll=1m
        // {
        //     "slice": {
        //         "field": "date",
        //         "id": 0,
        //         "max": 10
        //     },
        //     "query": {
        //         "match" : {
        //             "title" : "elasticsearch"
        //         }
        //     }
        // }
        // end::fdcaba9547180439ff4b6275034a5170[]

        $curl = 'GET /twitter/_search?scroll=1m'
              . '{'
              . '    "slice": {'
              . '        "field": "date",'
              . '        "id": 0,'
              . '        "max": 10'
              . '    },'
              . '    "query": {'
              . '        "match" : {'
              . '            "title" : "elasticsearch"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%











}
