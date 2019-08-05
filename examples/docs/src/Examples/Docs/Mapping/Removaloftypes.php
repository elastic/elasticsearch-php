<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Removaloftypes
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/removal_of_types.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Removaloftypes extends SimpleExamplesTester {

    /**
     * Tag:  9ee37bb017ab2f08dc870d9b2f937819
     * Line: 456
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL456_9ee37bb017ab2f08dc870d9b2f937819()
    {
        $client = $this->getClient();
        // tag::9ee37bb017ab2f08dc870d9b2f937819[]
        // TODO -- Implement Example
        // PUT index?include_type_name=false
        // {
        //   "mappings": {
        //     "properties": { \<1>
        //       "foo": {
        //         "type": "keyword"
        //       }
        //     }
        //   }
        // }
        // end::9ee37bb017ab2f08dc870d9b2f937819[]

        $curl = 'PUT index?include_type_name=false'
              . '{'
              . '  "mappings": {'
              . '    "properties": { \<1>'
              . '      "foo": {'
              . '        "type": "keyword"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  21aedb3425f773979be01722661b6a89
     * Line: 472
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL472_21aedb3425f773979be01722661b6a89()
    {
        $client = $this->getClient();
        // tag::21aedb3425f773979be01722661b6a89[]
        // TODO -- Implement Example
        // PUT index/_mappings?include_type_name=false
        // {
        //   "properties": { \<1>
        //     "bar": {
        //       "type": "text"
        //     }
        //   }
        // }
        // end::21aedb3425f773979be01722661b6a89[]

        $curl = 'PUT index/_mappings?include_type_name=false'
              . '{'
              . '  "properties": { \<1>'
              . '    "bar": {'
              . '      "type": "text"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c81959a312a5715c52cacfe01cb0576e
     * Line: 487
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL487_c81959a312a5715c52cacfe01cb0576e()
    {
        $client = $this->getClient();
        // tag::c81959a312a5715c52cacfe01cb0576e[]
        // TODO -- Implement Example
        // GET index/_mappings?include_type_name=false
        // end::c81959a312a5715c52cacfe01cb0576e[]

        $curl = 'GET index/_mappings?include_type_name=false';

        // TODO -- make assertion
    }

    /**
     * Tag:  ab1b1bdda7528003a08d6d5911081483
     * Line: 522
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL522_ab1b1bdda7528003a08d6d5911081483()
    {
        $client = $this->getClient();
        // tag::ab1b1bdda7528003a08d6d5911081483[]
        // TODO -- Implement Example
        // PUT index/_doc/1
        // {
        //   "foo": "baz"
        // }
        // end::ab1b1bdda7528003a08d6d5911081483[]

        $curl = 'PUT index/_doc/1'
              . '{'
              . '  "foo": "baz"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  de8d7db07c3008039c7691955a553e4c
     * Line: 552
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL552_de8d7db07c3008039c7691955a553e4c()
    {
        $client = $this->getClient();
        // tag::de8d7db07c3008039c7691955a553e4c[]
        // TODO -- Implement Example
        // GET index/_doc/1
        // end::de8d7db07c3008039c7691955a553e4c[]

        $curl = 'GET index/_doc/1';

        // TODO -- make assertion
    }

    /**
     * Tag:  f85d1cf4a5b9145632f585cd8c99e49d
     * Line: 566
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL566_f85d1cf4a5b9145632f585cd8c99e49d()
    {
        $client = $this->getClient();
        // tag::f85d1cf4a5b9145632f585cd8c99e49d[]
        // TODO -- Implement Example
        // POST index/_update/1
        // {
        //     "doc" : {
        //         "foo" : "qux"
        //     }
        // }
        // GET /index/_source/1
        // end::f85d1cf4a5b9145632f585cd8c99e49d[]

        $curl = 'POST index/_update/1'
              . '{'
              . '    "doc" : {'
              . '        "foo" : "qux"'
              . '    }'
              . '}'
              . 'GET /index/_source/1';

        // TODO -- make assertion
    }

    /**
     * Tag:  6dce46ae7f4da2467ea1e68cc9b67b31
     * Line: 584
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL584_6dce46ae7f4da2467ea1e68cc9b67b31()
    {
        $client = $this->getClient();
        // tag::6dce46ae7f4da2467ea1e68cc9b67b31[]
        // TODO -- Implement Example
        // POST _bulk
        // { "index" : { "_index" : "index", "_id" : "3" } }
        // { "foo" : "baz" }
        // { "index" : { "_index" : "index", "_id" : "4" } }
        // { "foo" : "qux" }
        // end::6dce46ae7f4da2467ea1e68cc9b67b31[]

        $curl = 'POST _bulk'
              . '{ "index" : { "_index" : "index", "_id" : "3" } }'
              . '{ "foo" : "baz" }'
              . '{ "index" : { "_index" : "index", "_id" : "4" } }'
              . '{ "foo" : "qux" }';

        // TODO -- make assertion
    }

    /**
     * Tag:  b479466cd446f8112f491ce8810de43a
     * Line: 615
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL615_b479466cd446f8112f491ce8810de43a()
    {
        $client = $this->getClient();
        // tag::b479466cd446f8112f491ce8810de43a[]
        // TODO -- Implement Example
        // PUT index/my_type/1
        // {
        //   "foo": "baz"
        // }
        // GET index/_doc/1
        // end::b479466cd446f8112f491ce8810de43a[]

        $curl = 'PUT index/my_type/1'
              . '{'
              . '  "foo": "baz"'
              . '}'
              . 'GET index/_doc/1';

        // TODO -- make assertion
    }

    /**
     * Tag:  c6f5467904b8182d9203d98414a1bb76
     * Line: 659
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL659_c6f5467904b8182d9203d98414a1bb76()
    {
        $client = $this->getClient();
        // tag::c6f5467904b8182d9203d98414a1bb76[]
        // TODO -- Implement Example
        // PUT _template/template1
        // {
        //   "index_patterns":[ "index-1-*" ],
        //   "mappings": {
        //     "properties": {
        //       "foo": {
        //         "type": "keyword"
        //       }
        //     }
        //   }
        // }
        // PUT _template/template2?include_type_name=true
        // {
        //   "index_patterns":[ "index-2-*" ],
        //   "mappings": {
        //     "type": {
        //       "properties": {
        //         "foo": {
        //           "type": "keyword"
        //         }
        //       }
        //     }
        //   }
        // }
        // PUT index-1-01?include_type_name=true
        // {
        //   "mappings": {
        //     "type": {
        //       "properties": {
        //         "bar": {
        //           "type": "long"
        //         }
        //       }
        //     }
        //   }
        // }
        // PUT index-2-01
        // {
        //   "mappings": {
        //     "properties": {
        //       "bar": {
        //         "type": "long"
        //       }
        //     }
        //   }
        // }
        // end::c6f5467904b8182d9203d98414a1bb76[]

        $curl = 'PUT _template/template1'
              . '{'
              . '  "index_patterns":[ "index-1-*" ],'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "foo": {'
              . '        "type": "keyword"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT _template/template2?include_type_name=true'
              . '{'
              . '  "index_patterns":[ "index-2-*" ],'
              . '  "mappings": {'
              . '    "type": {'
              . '      "properties": {'
              . '        "foo": {'
              . '          "type": "keyword"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT index-1-01?include_type_name=true'
              . '{'
              . '  "mappings": {'
              . '    "type": {'
              . '      "properties": {'
              . '        "bar": {'
              . '          "type": "long"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT index-2-01'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "bar": {'
              . '        "type": "long"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%










}
