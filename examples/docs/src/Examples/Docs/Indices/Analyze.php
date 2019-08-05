<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Analyze
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/analyze.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Analyze extends SimpleExamplesTester {

    /**
     * Tag:  06b4f0789d42d85d9af0780388feca83
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_06b4f0789d42d85d9af0780388feca83()
    {
        $client = $this->getClient();
        // tag::06b4f0789d42d85d9af0780388feca83[]
        // TODO -- Implement Example
        // GET _analyze
        // {
        //   "analyzer" : "standard",
        //   "text" : "this is a test"
        // }
        // end::06b4f0789d42d85d9af0780388feca83[]

        $curl = 'GET _analyze'
              . '{'
              . '  "analyzer" : "standard",'
              . '  "text" : "this is a test"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a158d87b517d0f7a3d14d8f4eb1c4036
     * Line: 23
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL23_a158d87b517d0f7a3d14d8f4eb1c4036()
    {
        $client = $this->getClient();
        // tag::a158d87b517d0f7a3d14d8f4eb1c4036[]
        // TODO -- Implement Example
        // GET _analyze
        // {
        //   "analyzer" : "standard",
        //   "text" : ["this is a test", "the second text"]
        // }
        // end::a158d87b517d0f7a3d14d8f4eb1c4036[]

        $curl = 'GET _analyze'
              . '{'
              . '  "analyzer" : "standard",'
              . '  "text" : ["this is a test", "the second text"]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  373dd9448e2cba5dd8dbf3a1aded9025
     * Line: 37
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL37_373dd9448e2cba5dd8dbf3a1aded9025()
    {
        $client = $this->getClient();
        // tag::373dd9448e2cba5dd8dbf3a1aded9025[]
        // TODO -- Implement Example
        // GET _analyze
        // {
        //   "tokenizer" : "keyword",
        //   "filter" : ["lowercase"],
        //   "text" : "this is a test"
        // }
        // end::373dd9448e2cba5dd8dbf3a1aded9025[]

        $curl = 'GET _analyze'
              . '{'
              . '  "tokenizer" : "keyword",'
              . '  "filter" : ["lowercase"],'
              . '  "text" : "this is a test"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  61354fd8aad2ad07230c39339a2cd318
     * Line: 48
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL48_61354fd8aad2ad07230c39339a2cd318()
    {
        $client = $this->getClient();
        // tag::61354fd8aad2ad07230c39339a2cd318[]
        // TODO -- Implement Example
        // GET _analyze
        // {
        //   "tokenizer" : "keyword",
        //   "filter" : ["lowercase"],
        //   "char_filter" : ["html_strip"],
        //   "text" : "this is a \<b>test</b>"
        // }
        // end::61354fd8aad2ad07230c39339a2cd318[]

        $curl = 'GET _analyze'
              . '{'
              . '  "tokenizer" : "keyword",'
              . '  "filter" : ["lowercase"],'
              . '  "char_filter" : ["html_strip"],'
              . '  "text" : "this is a \<b>test</b>"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  37b2f5dca993d15ed1711f3532a0f98d
     * Line: 64
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL64_37b2f5dca993d15ed1711f3532a0f98d()
    {
        $client = $this->getClient();
        // tag::37b2f5dca993d15ed1711f3532a0f98d[]
        // TODO -- Implement Example
        // GET _analyze
        // {
        //   "tokenizer" : "whitespace",
        //   "filter" : ["lowercase", {"type": "stop", "stopwords": ["a", "is", "this"]}],
        //   "text" : "this is a test"
        // }
        // end::37b2f5dca993d15ed1711f3532a0f98d[]

        $curl = 'GET _analyze'
              . '{'
              . '  "tokenizer" : "whitespace",'
              . '  "filter" : ["lowercase", {"type": "stop", "stopwords": ["a", "is", "this"]}],'
              . '  "text" : "this is a test"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9f67f5e5cd0355cebea6fb28d28a8b5f
     * Line: 77
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL77_9f67f5e5cd0355cebea6fb28d28a8b5f()
    {
        $client = $this->getClient();
        // tag::9f67f5e5cd0355cebea6fb28d28a8b5f[]
        // TODO -- Implement Example
        // GET analyze_sample/_analyze
        // {
        //   "text" : "this is a test"
        // }
        // end::9f67f5e5cd0355cebea6fb28d28a8b5f[]

        $curl = 'GET analyze_sample/_analyze'
              . '{'
              . '  "text" : "this is a test"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5c448f76daf65093e1893705e705ab3b
     * Line: 91
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL91_5c448f76daf65093e1893705e705ab3b()
    {
        $client = $this->getClient();
        // tag::5c448f76daf65093e1893705e705ab3b[]
        // TODO -- Implement Example
        // GET analyze_sample/_analyze
        // {
        //   "analyzer" : "whitespace",
        //   "text" : "this is a test"
        // }
        // end::5c448f76daf65093e1893705e705ab3b[]

        $curl = 'GET analyze_sample/_analyze'
              . '{'
              . '  "analyzer" : "whitespace",'
              . '  "text" : "this is a test"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ebc29a29598d16f3156cbbd0d1b0954a
     * Line: 104
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL104_ebc29a29598d16f3156cbbd0d1b0954a()
    {
        $client = $this->getClient();
        // tag::ebc29a29598d16f3156cbbd0d1b0954a[]
        // TODO -- Implement Example
        // GET analyze_sample/_analyze
        // {
        //   "field" : "obj1.field1",
        //   "text" : "this is a test"
        // }
        // end::ebc29a29598d16f3156cbbd0d1b0954a[]

        $curl = 'GET analyze_sample/_analyze'
              . '{'
              . '  "field" : "obj1.field1",'
              . '  "text" : "this is a test"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  441ba0438c9ab8e7ce3579277d98b9a7
     * Line: 120
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL120_441ba0438c9ab8e7ce3579277d98b9a7()
    {
        $client = $this->getClient();
        // tag::441ba0438c9ab8e7ce3579277d98b9a7[]
        // TODO -- Implement Example
        // GET analyze_sample/_analyze
        // {
        //   "normalizer" : "my_normalizer",
        //   "text" : "BaR"
        // }
        // end::441ba0438c9ab8e7ce3579277d98b9a7[]

        $curl = 'GET analyze_sample/_analyze'
              . '{'
              . '  "normalizer" : "my_normalizer",'
              . '  "text" : "BaR"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  da69ca2ea849335e3a3ab9e15aa0e5f9
     * Line: 133
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL133_da69ca2ea849335e3a3ab9e15aa0e5f9()
    {
        $client = $this->getClient();
        // tag::da69ca2ea849335e3a3ab9e15aa0e5f9[]
        // TODO -- Implement Example
        // GET _analyze
        // {
        //   "filter" : ["lowercase"],
        //   "text" : "BaR"
        // }
        // end::da69ca2ea849335e3a3ab9e15aa0e5f9[]

        $curl = 'GET _analyze'
              . '{'
              . '  "filter" : ["lowercase"],'
              . '  "text" : "BaR"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  98a28410e6c58919d7a700631138e775
     * Line: 151
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL151_98a28410e6c58919d7a700631138e775()
    {
        $client = $this->getClient();
        // tag::98a28410e6c58919d7a700631138e775[]
        // TODO -- Implement Example
        // GET _analyze
        // {
        //   "tokenizer" : "standard",
        //   "filter" : ["snowball"],
        //   "text" : "detailed output",
        //   "explain" : true,
        //   "attributes" : ["keyword"] \<1>
        // }
        // end::98a28410e6c58919d7a700631138e775[]

        $curl = 'GET _analyze'
              . '{'
              . '  "tokenizer" : "standard",'
              . '  "filter" : ["snowball"],'
              . '  "text" : "detailed output",'
              . '  "explain" : true,'
              . '  "attributes" : ["keyword"] \<1>'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  cdc5155ae26dbaa25110a6a6a7e995fe
     * Line: 227
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL227_cdc5155ae26dbaa25110a6a6a7e995fe()
    {
        $client = $this->getClient();
        // tag::cdc5155ae26dbaa25110a6a6a7e995fe[]
        // TODO -- Implement Example
        // PUT analyze_sample
        // {
        //   "settings" : {
        //     "index.analyze.max_token_count" : 20000
        //   }
        // }
        // end::cdc5155ae26dbaa25110a6a6a7e995fe[]

        $curl = 'PUT analyze_sample'
              . '{'
              . '  "settings" : {'
              . '    "index.analyze.max_token_count" : 20000'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9f67f5e5cd0355cebea6fb28d28a8b5f
     * Line: 239
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL239_9f67f5e5cd0355cebea6fb28d28a8b5f()
    {
        $client = $this->getClient();
        // tag::9f67f5e5cd0355cebea6fb28d28a8b5f[]
        // TODO -- Implement Example
        // GET analyze_sample/_analyze
        // {
        //   "text" : "this is a test"
        // }
        // end::9f67f5e5cd0355cebea6fb28d28a8b5f[]

        $curl = 'GET analyze_sample/_analyze'
              . '{'
              . '  "text" : "this is a test"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%














}
