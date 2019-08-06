<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: QueryStringQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/query-string-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class QueryStringQuery extends SimpleExamplesTester {

    /**
     * Tag:  81f09836772b03f6e7e8e7986409d67e
     * Line: 11
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL11_81f09836772b03f6e7e8e7986409d67e()
    {
        $client = $this->getClient();
        // tag::81f09836772b03f6e7e8e7986409d67e[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "query_string" : {
        //             "default_field" : "content",
        //             "query" : "this AND that OR thus"
        //         }
        //     }
        // }
        // end::81f09836772b03f6e7e8e7986409d67e[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "query_string" : {'
              . '            "default_field" : "content",'
              . '            "query" : "this AND that OR thus"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  fe1dd67108b04e07d0832b539d4e0d99
     * Line: 28
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL28_fe1dd67108b04e07d0832b539d4e0d99()
    {
        $client = $this->getClient();
        // tag::fe1dd67108b04e07d0832b539d4e0d99[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "query_string" : {
        //             "default_field" : "content",
        //             "query" : "(new york city) OR (big apple)" \<1>
        //         }
        //     }
        // }
        // end::fe1dd67108b04e07d0832b539d4e0d99[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "query_string" : {'
              . '            "default_field" : "content",'
              . '            "query" : "(new york city) OR (big apple)" \<1>'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f2d68493abd3ca430bd03a7f7f8d18f9
     * Line: 168
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL168_f2d68493abd3ca430bd03a7f7f8d18f9()
    {
        $client = $this->getClient();
        // tag::f2d68493abd3ca430bd03a7f7f8d18f9[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "query_string" : {
        //             "fields" : ["content", "name"],
        //             "query" : "this AND that"
        //         }
        //     }
        // }
        // end::f2d68493abd3ca430bd03a7f7f8d18f9[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "query_string" : {'
              . '            "fields" : ["content", "name"],'
              . '            "query" : "this AND that"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e17e8852ec3f31781e1364f4dffeb6d0
     * Line: 185
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL185_e17e8852ec3f31781e1364f4dffeb6d0()
    {
        $client = $this->getClient();
        // tag::e17e8852ec3f31781e1364f4dffeb6d0[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "query_string": {
        //             "query": "(content:this OR name:this) AND (content:that OR name:that)"
        //         }
        //     }
        // }
        // end::e17e8852ec3f31781e1364f4dffeb6d0[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "query_string": {'
              . '            "query": "(content:this OR name:this) AND (content:that OR name:that)"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a2a25aad1fea9a541b52ac613c78fb64
     * Line: 202
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL202_a2a25aad1fea9a541b52ac613c78fb64()
    {
        $client = $this->getClient();
        // tag::a2a25aad1fea9a541b52ac613c78fb64[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "query_string" : {
        //             "fields" : ["content", "name^5"],
        //             "query" : "this AND that OR thus",
        //             "tie_breaker" : 0
        //         }
        //     }
        // }
        // end::a2a25aad1fea9a541b52ac613c78fb64[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "query_string" : {'
              . '            "fields" : ["content", "name^5"],'
              . '            "query" : "this AND that OR thus",'
              . '            "tie_breaker" : 0'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  28aad2c5942bfb221c2bf1bbdc01658e
     * Line: 222
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL222_28aad2c5942bfb221c2bf1bbdc01658e()
    {
        $client = $this->getClient();
        // tag::28aad2c5942bfb221c2bf1bbdc01658e[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "query_string" : {
        //             "fields" : ["city.*"],
        //             "query" : "this AND that OR thus"
        //         }
        //     }
        // }
        // end::28aad2c5942bfb221c2bf1bbdc01658e[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "query_string" : {'
              . '            "fields" : ["city.*"],'
              . '            "query" : "this AND that OR thus"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  db6cba451ba562abe953d09ad80cc15c
     * Line: 240
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL240_db6cba451ba562abe953d09ad80cc15c()
    {
        $client = $this->getClient();
        // tag::db6cba451ba562abe953d09ad80cc15c[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "query_string" : {
        //             "query" : "city.\\*:(this AND that OR thus)"
        //         }
        //     }
        // }
        // end::db6cba451ba562abe953d09ad80cc15c[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "query_string" : {'
              . '            "query" : "city.\\*:(this AND that OR thus)"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  58b5003c0a53a39bf509aa3797aad471
     * Line: 275
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL275_58b5003c0a53a39bf509aa3797aad471()
    {
        $client = $this->getClient();
        // tag::58b5003c0a53a39bf509aa3797aad471[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "query_string" : {
        //             "fields" : ["content", "name.*^5"],
        //             "query" : "this AND that OR thus"
        //         }
        //     }
        // }
        // end::58b5003c0a53a39bf509aa3797aad471[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "query_string" : {'
              . '            "fields" : ["content", "name.*^5"],'
              . '            "query" : "this AND that OR thus"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f32f0c19b42de3b87dd764fe4ca17e7c
     * Line: 300
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL300_f32f0c19b42de3b87dd764fe4ca17e7c()
    {
        $client = $this->getClient();
        // tag::f32f0c19b42de3b87dd764fe4ca17e7c[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //    "query": {
        //        "query_string" : {
        //            "default_field": "title",
        //            "query" : "ny city",
        //            "auto_generate_synonyms_phrase_query" : false
        //        }
        //    }
        // }
        // end::f32f0c19b42de3b87dd764fe4ca17e7c[]

        $curl = 'GET /_search'
              . '{'
              . '   "query": {'
              . '       "query_string" : {'
              . '           "default_field": "title",'
              . '           "query" : "ny city",'
              . '           "auto_generate_synonyms_phrase_query" : false'
              . '       }'
              . '   }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  60ee33f3acfdd0fe6f288ac77312c780
     * Line: 329
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL329_60ee33f3acfdd0fe6f288ac77312c780()
    {
        $client = $this->getClient();
        // tag::60ee33f3acfdd0fe6f288ac77312c780[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "query_string": {
        //             "fields": [
        //                 "title"
        //             ],
        //             "query": "this that thus",
        //             "minimum_should_match": 2
        //         }
        //     }
        // }
        // end::60ee33f3acfdd0fe6f288ac77312c780[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "query_string": {'
              . '            "fields": ['
              . '                "title"'
              . '            ],'
              . '            "query": "this that thus",'
              . '            "minimum_should_match": 2'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  be1bd47393646ac6bbee177d1cdb7738
     * Line: 356
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL356_be1bd47393646ac6bbee177d1cdb7738()
    {
        $client = $this->getClient();
        // tag::be1bd47393646ac6bbee177d1cdb7738[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "query_string": {
        //             "fields": [
        //                 "title",
        //                 "content"
        //             ],
        //             "query": "this that thus",
        //             "minimum_should_match": 2
        //         }
        //     }
        // }
        // end::be1bd47393646ac6bbee177d1cdb7738[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "query_string": {'
              . '            "fields": ['
              . '                "title",'
              . '                "content"'
              . '            ],'
              . '            "query": "this that thus",'
              . '            "minimum_should_match": 2'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  fdd38f0d248385a444c777e7acd97846
     * Line: 381
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL381_fdd38f0d248385a444c777e7acd97846()
    {
        $client = $this->getClient();
        // tag::fdd38f0d248385a444c777e7acd97846[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "query_string": {
        //             "fields": [
        //                 "title",
        //                 "content"
        //             ],
        //             "query": "this OR that OR thus",
        //             "minimum_should_match": 2
        //         }
        //     }
        // }
        // end::fdd38f0d248385a444c777e7acd97846[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "query_string": {'
              . '            "fields": ['
              . '                "title",'
              . '                "content"'
              . '            ],'
              . '            "query": "this OR that OR thus",'
              . '            "minimum_should_match": 2'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6f21a878fee3b43c5332b81aaddbeac7
     * Line: 411
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL411_6f21a878fee3b43c5332b81aaddbeac7()
    {
        $client = $this->getClient();
        // tag::6f21a878fee3b43c5332b81aaddbeac7[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "query_string": {
        //             "fields": [
        //                 "title",
        //                 "content"
        //             ],
        //             "query": "this OR that OR thus",
        //             "type": "cross_fields",
        //             "minimum_should_match": 2
        //         }
        //     }
        // }
        // end::6f21a878fee3b43c5332b81aaddbeac7[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "query_string": {'
              . '            "fields": ['
              . '                "title",'
              . '                "content"'
              . '            ],'
              . '            "query": "this OR that OR thus",'
              . '            "type": "cross_fields",'
              . '            "minimum_should_match": 2'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%














}
