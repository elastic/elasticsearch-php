<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Sql\Endpoints;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Rest
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   sql/endpoints/rest.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Rest extends SimpleExamplesTester {

    /**
     * Tag:  4870ece3455f2b5c34eccaa9492f3894
     * Line: 21
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL21_4870ece3455f2b5c34eccaa9492f3894()
    {
        $client = $this->getClient();
        // tag::4870ece3455f2b5c34eccaa9492f3894[]
        // TODO -- Implement Example
        // POST /_sql?format=txt
        // {
        //     "query": "SELECT * FROM library ORDER BY page_count DESC LIMIT 5"
        // }
        // end::4870ece3455f2b5c34eccaa9492f3894[]

        $curl = 'POST /_sql?format=txt'
              . '{'
              . '    "query": "SELECT * FROM library ORDER BY page_count DESC LIMIT 5"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b649c4dc7d187a27d2112f59e62cecea
     * Line: 111
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL111_b649c4dc7d187a27d2112f59e62cecea()
    {
        $client = $this->getClient();
        // tag::b649c4dc7d187a27d2112f59e62cecea[]
        // TODO -- Implement Example
        // POST /_sql?format=csv
        // {
        //     "query": "SELECT * FROM library ORDER BY page_count DESC",
        //     "fetch_size": 5
        // }
        // end::b649c4dc7d187a27d2112f59e62cecea[]

        $curl = 'POST /_sql?format=csv'
              . '{'
              . '    "query": "SELECT * FROM library ORDER BY page_count DESC",'
              . '    "fetch_size": 5'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8b8c48b5fcfaaec794875537d3be2e62
     * Line: 137
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL137_8b8c48b5fcfaaec794875537d3be2e62()
    {
        $client = $this->getClient();
        // tag::8b8c48b5fcfaaec794875537d3be2e62[]
        // TODO -- Implement Example
        // POST /_sql?format=json
        // {
        //     "query": "SELECT * FROM library ORDER BY page_count DESC",
        //     "fetch_size": 5
        // }
        // end::8b8c48b5fcfaaec794875537d3be2e62[]

        $curl = 'POST /_sql?format=json'
              . '{'
              . '    "query": "SELECT * FROM library ORDER BY page_count DESC",'
              . '    "fetch_size": 5'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  92d82b9d1bda5a8ae1117d03413f4e67
     * Line: 173
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL173_92d82b9d1bda5a8ae1117d03413f4e67()
    {
        $client = $this->getClient();
        // tag::92d82b9d1bda5a8ae1117d03413f4e67[]
        // TODO -- Implement Example
        // POST /_sql?format=tsv
        // {
        //     "query": "SELECT * FROM library ORDER BY page_count DESC",
        //     "fetch_size": 5
        // }
        // end::92d82b9d1bda5a8ae1117d03413f4e67[]

        $curl = 'POST /_sql?format=tsv'
              . '{'
              . '    "query": "SELECT * FROM library ORDER BY page_count DESC",'
              . '    "fetch_size": 5'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a972c38ee41dc899708825790a113cb8
     * Line: 200
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL200_a972c38ee41dc899708825790a113cb8()
    {
        $client = $this->getClient();
        // tag::a972c38ee41dc899708825790a113cb8[]
        // TODO -- Implement Example
        // POST /_sql?format=txt
        // {
        //     "query": "SELECT * FROM library ORDER BY page_count DESC",
        //     "fetch_size": 5
        // }
        // end::a972c38ee41dc899708825790a113cb8[]

        $curl = 'POST /_sql?format=txt'
              . '{'
              . '    "query": "SELECT * FROM library ORDER BY page_count DESC",'
              . '    "fetch_size": 5'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d38b8ef18ca89eafb1e175ec9a393259
     * Line: 228
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL228_d38b8ef18ca89eafb1e175ec9a393259()
    {
        $client = $this->getClient();
        // tag::d38b8ef18ca89eafb1e175ec9a393259[]
        // TODO -- Implement Example
        // POST /_sql?format=yaml
        // {
        //     "query": "SELECT * FROM library ORDER BY page_count DESC",
        //     "fetch_size": 5
        // }
        // end::d38b8ef18ca89eafb1e175ec9a393259[]

        $curl = 'POST /_sql?format=yaml'
              . '{'
              . '    "query": "SELECT * FROM library ORDER BY page_count DESC",'
              . '    "fetch_size": 5'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  212042898296f208dbf957f33c07e3b2
     * Line: 283
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL283_212042898296f208dbf957f33c07e3b2()
    {
        $client = $this->getClient();
        // tag::212042898296f208dbf957f33c07e3b2[]
        // TODO -- Implement Example
        // POST /_sql?format=json
        // {
        //     "cursor": "sDXF1ZXJ5QW5kRmV0Y2gBAAAAAAAAAAEWYUpOYklQMHhRUEtld3RsNnFtYU1hQQ==:BAFmBGRhdGUBZgVsaWtlcwFzB21lc3NhZ2UBZgR1c2Vy9f///w8="
        // }
        // end::212042898296f208dbf957f33c07e3b2[]

        $curl = 'POST /_sql?format=json'
              . '{'
              . '    "cursor": "sDXF1ZXJ5QW5kRmV0Y2gBAAAAAAAAAAEWYUpOYklQMHhRUEtld3RsNnFtYU1hQQ==:BAFmBGRhdGUBZgVsaWtlcwFzB21lc3NhZ2UBZgR1c2Vy9f///w8="'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  cc5dfc9aa125e3fd03f523fc2c356f63
     * Line: 321
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL321_cc5dfc9aa125e3fd03f523fc2c356f63()
    {
        $client = $this->getClient();
        // tag::cc5dfc9aa125e3fd03f523fc2c356f63[]
        // TODO -- Implement Example
        // POST /_sql/close
        // {
        //     "cursor": "sDXF1ZXJ5QW5kRmV0Y2gBAAAAAAAAAAEWYUpOYklQMHhRUEtld3RsNnFtYU1hQQ==:BAFmBGRhdGUBZgVsaWtlcwFzB21lc3NhZ2UBZgR1c2Vy9f///w8="
        // }
        // end::cc5dfc9aa125e3fd03f523fc2c356f63[]

        $curl = 'POST /_sql/close'
              . '{'
              . '    "cursor": "sDXF1ZXJ5QW5kRmV0Y2gBAAAAAAAAAAEWYUpOYklQMHhRUEtld3RsNnFtYU1hQQ==:BAFmBGRhdGUBZgVsaWtlcwFzB21lc3NhZ2UBZgR1c2Vy9f///w8="'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  683da0a8624bc03c79a3db8ffab43f0b
     * Line: 351
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL351_683da0a8624bc03c79a3db8ffab43f0b()
    {
        $client = $this->getClient();
        // tag::683da0a8624bc03c79a3db8ffab43f0b[]
        // TODO -- Implement Example
        // POST /_sql?format=txt
        // {
        //     "query": "SELECT * FROM library ORDER BY page_count DESC",
        //     "filter": {
        //         "range": {
        //             "page_count": {
        //                 "gte" : 100,
        //                 "lte" : 200
        //             }
        //         }
        //     },
        //     "fetch_size": 5
        // }
        // end::683da0a8624bc03c79a3db8ffab43f0b[]

        $curl = 'POST /_sql?format=txt'
              . '{'
              . '    "query": "SELECT * FROM library ORDER BY page_count DESC",'
              . '    "filter": {'
              . '        "range": {'
              . '            "page_count": {'
              . '                "gte" : 100,'
              . '                "lte" : 200'
              . '            }'
              . '        }'
              . '    },'
              . '    "fetch_size": 5'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c11dc94839b861235b4943f046e15997
     * Line: 390
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL390_c11dc94839b861235b4943f046e15997()
    {
        $client = $this->getClient();
        // tag::c11dc94839b861235b4943f046e15997[]
        // TODO -- Implement Example
        // POST /_sql?format=json
        // {
        //     "query": "SELECT * FROM library ORDER BY page_count DESC",
        //     "fetch_size": 5,
        //     "columnar": true
        // }
        // end::c11dc94839b861235b4943f046e15997[]

        $curl = 'POST /_sql?format=json'
              . '{'
              . '    "query": "SELECT * FROM library ORDER BY page_count DESC",'
              . '    "fetch_size": 5,'
              . '    "columnar": true'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  15089efd5a5a72234fdb91c111adb3c1
     * Line: 427
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL427_15089efd5a5a72234fdb91c111adb3c1()
    {
        $client = $this->getClient();
        // tag::15089efd5a5a72234fdb91c111adb3c1[]
        // TODO -- Implement Example
        // POST /_sql?format=json
        // {
        //     "cursor": "sDXF1ZXJ5QW5kRmV0Y2gBAAAAAAAAAAEWWWdrRlVfSS1TbDYtcW9lc1FJNmlYdw==:BAFmBmF1dGhvcgFmBG5hbWUBZgpwYWdlX2NvdW50AWYMcmVsZWFzZV9kYXRl+v///w8=",
        //     "columnar": true
        // }
        // end::15089efd5a5a72234fdb91c111adb3c1[]

        $curl = 'POST /_sql?format=json'
              . '{'
              . '    "cursor": "sDXF1ZXJ5QW5kRmV0Y2gBAAAAAAAAAAEWWWdrRlVfSS1TbDYtcW9lc1FJNmlYdw==:BAFmBmF1dGhvcgFmBG5hbWUBZgpwYWdlX2NvdW50AWYMcmVsZWFzZV9kYXRl+v///w8=",'
              . '    "columnar": true'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%












}
