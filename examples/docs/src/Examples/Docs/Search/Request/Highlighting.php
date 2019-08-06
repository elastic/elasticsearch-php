<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Highlighting
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/request/highlighting.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Highlighting extends SimpleExamplesTester {

    /**
     * Tag:  05e1088d2c04391203cc8eb3ab287b71
     * Line: 24
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL24_05e1088d2c04391203cc8eb3ab287b71()
    {
        $client = $this->getClient();
        // tag::05e1088d2c04391203cc8eb3ab287b71[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "match": { "content": "kimchy" }
        //     },
        //     "highlight" : {
        //         "fields" : {
        //             "content" : {}
        //         }
        //     }
        // }
        // end::05e1088d2c04391203cc8eb3ab287b71[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "match": { "content": "kimchy" }'
              . '    },'
              . '    "highlight" : {'
              . '        "fields" : {'
              . '            "content" : {}'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3cc4e8b1e2aecac644ba52d34ca29422
     * Line: 280
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL280_3cc4e8b1e2aecac644ba52d34ca29422()
    {
        $client = $this->getClient();
        // tag::3cc4e8b1e2aecac644ba52d34ca29422[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "match": { "user": "kimchy" }
        //     },
        //     "highlight" : {
        //         "number_of_fragments" : 3,
        //         "fragment_size" : 150,
        //         "fields" : {
        //             "body" : { "pre_tags" : ["<em>"], "post_tags" : ["</em>"] },
        //             "blog.title" : { "number_of_fragments" : 0 },
        //             "blog.author" : { "number_of_fragments" : 0 },
        //             "blog.comment" : { "number_of_fragments" : 5, "order" : "score" }
        //         }
        //     }
        // }
        // end::3cc4e8b1e2aecac644ba52d34ca29422[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "match": { "user": "kimchy" }'
              . '    },'
              . '    "highlight" : {'
              . '        "number_of_fragments" : 3,'
              . '        "fragment_size" : 150,'
              . '        "fields" : {'
              . '            "body" : { "pre_tags" : ["<em>"], "post_tags" : ["</em>"] },'
              . '            "blog.title" : { "number_of_fragments" : 0 },'
              . '            "blog.author" : { "number_of_fragments" : 0 },'
              . '            "blog.comment" : { "number_of_fragments" : 5, "order" : "score" }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  129cddb56fafef5cc454917a374eae1a
     * Line: 311
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL311_129cddb56fafef5cc454917a374eae1a()
    {
        $client = $this->getClient();
        // tag::129cddb56fafef5cc454917a374eae1a[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "stored_fields": [ "_id" ],
        //     "query" : {
        //         "match": {
        //             "comment": {
        //                 "query": "foo bar"
        //             }
        //         }
        //     },
        //     "rescore": {
        //         "window_size": 50,
        //         "query": {
        //             "rescore_query" : {
        //                 "match_phrase": {
        //                     "comment": {
        //                         "query": "foo bar",
        //                         "slop": 1
        //                     }
        //                 }
        //             },
        //             "rescore_query_weight" : 10
        //         }
        //     },
        //     "highlight" : {
        //         "order" : "score",
        //         "fields" : {
        //             "comment" : {
        //                 "fragment_size" : 150,
        //                 "number_of_fragments" : 3,
        //                 "highlight_query": {
        //                     "bool": {
        //                         "must": {
        //                             "match": {
        //                                 "comment": {
        //                                     "query": "foo bar"
        //                                 }
        //                             }
        //                         },
        //                         "should": {
        //                             "match_phrase": {
        //                                 "comment": {
        //                                     "query": "foo bar",
        //                                     "slop": 1,
        //                                     "boost": 10.0
        //                                 }
        //                             }
        //                         },
        //                         "minimum_should_match": 0
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::129cddb56fafef5cc454917a374eae1a[]

        $curl = 'GET /_search'
              . '{'
              . '    "stored_fields": [ "_id" ],'
              . '    "query" : {'
              . '        "match": {'
              . '            "comment": {'
              . '                "query": "foo bar"'
              . '            }'
              . '        }'
              . '    },'
              . '    "rescore": {'
              . '        "window_size": 50,'
              . '        "query": {'
              . '            "rescore_query" : {'
              . '                "match_phrase": {'
              . '                    "comment": {'
              . '                        "query": "foo bar",'
              . '                        "slop": 1'
              . '                    }'
              . '                }'
              . '            },'
              . '            "rescore_query_weight" : 10'
              . '        }'
              . '    },'
              . '    "highlight" : {'
              . '        "order" : "score",'
              . '        "fields" : {'
              . '            "comment" : {'
              . '                "fragment_size" : 150,'
              . '                "number_of_fragments" : 3,'
              . '                "highlight_query": {'
              . '                    "bool": {'
              . '                        "must": {'
              . '                            "match": {'
              . '                                "comment": {'
              . '                                    "query": "foo bar"'
              . '                                }'
              . '                            }'
              . '                        },'
              . '                        "should": {'
              . '                            "match_phrase": {'
              . '                                "comment": {'
              . '                                    "query": "foo bar",'
              . '                                    "slop": 1,'
              . '                                    "boost": 10.0'
              . '                                }'
              . '                            }'
              . '                        },'
              . '                        "minimum_should_match": 0'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9e502038aa4ebb9cb4df230c0c4a854e
     * Line: 380
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL380_9e502038aa4ebb9cb4df230c0c4a854e()
    {
        $client = $this->getClient();
        // tag::9e502038aa4ebb9cb4df230c0c4a854e[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "match": { "user": "kimchy" }
        //     },
        //     "highlight" : {
        //         "fields" : {
        //             "comment" : {"type" : "plain"}
        //         }
        //     }
        // }
        // end::9e502038aa4ebb9cb4df230c0c4a854e[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "match": { "user": "kimchy" }'
              . '    },'
              . '    "highlight" : {'
              . '        "fields" : {'
              . '            "comment" : {"type" : "plain"}'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ee079a3f9eb529aac33f09be16747aa9
     * Line: 405
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL405_ee079a3f9eb529aac33f09be16747aa9()
    {
        $client = $this->getClient();
        // tag::ee079a3f9eb529aac33f09be16747aa9[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "match": { "user": "kimchy" }
        //     },
        //     "highlight" : {
        //         "pre_tags" : ["<tag1>"],
        //         "post_tags" : ["</tag1>"],
        //         "fields" : {
        //             "body" : {}
        //         }
        //     }
        // }
        // end::ee079a3f9eb529aac33f09be16747aa9[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "match": { "user": "kimchy" }'
              . '    },'
              . '    "highlight" : {'
              . '        "pre_tags" : ["<tag1>"],'
              . '        "post_tags" : ["</tag1>"],'
              . '        "fields" : {'
              . '            "body" : {}'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a225bb439c204b20ed52a28e1dcd663b
     * Line: 427
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL427_a225bb439c204b20ed52a28e1dcd663b()
    {
        $client = $this->getClient();
        // tag::a225bb439c204b20ed52a28e1dcd663b[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "match": { "user": "kimchy" }
        //     },
        //     "highlight" : {
        //         "pre_tags" : ["<tag1>", "<tag2>"],
        //         "post_tags" : ["</tag1>", "</tag2>"],
        //         "fields" : {
        //             "body" : {}
        //         }
        //     }
        // }
        // end::a225bb439c204b20ed52a28e1dcd663b[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "match": { "user": "kimchy" }'
              . '    },'
              . '    "highlight" : {'
              . '        "pre_tags" : ["<tag1>", "<tag2>"],'
              . '        "post_tags" : ["</tag1>", "</tag2>"],'
              . '        "fields" : {'
              . '            "body" : {}'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  05ce63b83a89fddb63fd60c923811582
     * Line: 448
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL448_05ce63b83a89fddb63fd60c923811582()
    {
        $client = $this->getClient();
        // tag::05ce63b83a89fddb63fd60c923811582[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "match": { "user": "kimchy" }
        //     },
        //     "highlight" : {
        //         "tags_schema" : "styled",
        //         "fields" : {
        //             "comment" : {}
        //         }
        //     }
        // }
        // end::05ce63b83a89fddb63fd60c923811582[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "match": { "user": "kimchy" }'
              . '    },'
              . '    "highlight" : {'
              . '        "tags_schema" : "styled",'
              . '        "fields" : {'
              . '            "comment" : {}'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  87b697eb7340e9e52ca790922eca0066
     * Line: 473
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL473_87b697eb7340e9e52ca790922eca0066()
    {
        $client = $this->getClient();
        // tag::87b697eb7340e9e52ca790922eca0066[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "match": { "user": "kimchy" }
        //     },
        //     "highlight" : {
        //         "fields" : {
        //             "comment" : {"force_source" : true}
        //         }
        //     }
        // }
        // end::87b697eb7340e9e52ca790922eca0066[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "match": { "user": "kimchy" }'
              . '    },'
              . '    "highlight" : {'
              . '        "fields" : {'
              . '            "comment" : {"force_source" : true}'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1e8b687c757981af3a9f005cfd2b4946
     * Line: 498
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL498_1e8b687c757981af3a9f005cfd2b4946()
    {
        $client = $this->getClient();
        // tag::1e8b687c757981af3a9f005cfd2b4946[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "match": { "user": "kimchy" }
        //     },
        //     "highlight" : {
        //         "require_field_match": false,
        //         "fields": {
        //                 "body" : { "pre_tags" : ["<em>"], "post_tags" : ["</em>"] }
        //         }
        //     }
        // }
        // end::1e8b687c757981af3a9f005cfd2b4946[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "match": { "user": "kimchy" }'
              . '    },'
              . '    "highlight" : {'
              . '        "require_field_match": false,'
              . '        "fields": {'
              . '                "body" : { "pre_tags" : ["<em>"], "post_tags" : ["</em>"] }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a182c91923ad1e47cf502ea890c53015
     * Line: 532
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL532_a182c91923ad1e47cf502ea890c53015()
    {
        $client = $this->getClient();
        // tag::a182c91923ad1e47cf502ea890c53015[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "query_string": {
        //             "query": "comment.plain:running scissors",
        //             "fields": ["comment"]
        //         }
        //     },
        //     "highlight": {
        //         "order": "score",
        //         "fields": {
        //             "comment": {
        //                 "matched_fields": ["comment", "comment.plain"],
        //                 "type" : "fvh"
        //             }
        //         }
        //     }
        // }
        // end::a182c91923ad1e47cf502ea890c53015[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "query_string": {'
              . '            "query": "comment.plain:running scissors",'
              . '            "fields": ["comment"]'
              . '        }'
              . '    },'
              . '    "highlight": {'
              . '        "order": "score",'
              . '        "fields": {'
              . '            "comment": {'
              . '                "matched_fields": ["comment", "comment.plain"],'
              . '                "type" : "fvh"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  974bb1452f614f9a378a695fa9addd4e
     * Line: 562
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL562_974bb1452f614f9a378a695fa9addd4e()
    {
        $client = $this->getClient();
        // tag::974bb1452f614f9a378a695fa9addd4e[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "query_string": {
        //             "query": "running scissors",
        //             "fields": ["comment", "comment.plain^10"]
        //         }
        //     },
        //     "highlight": {
        //         "order": "score",
        //         "fields": {
        //             "comment": {
        //                 "matched_fields": ["comment", "comment.plain"],
        //                 "type" : "fvh"
        //             }
        //         }
        //     }
        // }
        // end::974bb1452f614f9a378a695fa9addd4e[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "query_string": {'
              . '            "query": "running scissors",'
              . '            "fields": ["comment", "comment.plain^10"]'
              . '        }'
              . '    },'
              . '    "highlight": {'
              . '        "order": "score",'
              . '        "fields": {'
              . '            "comment": {'
              . '                "matched_fields": ["comment", "comment.plain"],'
              . '                "type" : "fvh"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4971d093f19f85e3c622f1e0257ff60f
     * Line: 590
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL590_4971d093f19f85e3c622f1e0257ff60f()
    {
        $client = $this->getClient();
        // tag::4971d093f19f85e3c622f1e0257ff60f[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "query_string": {
        //             "query": "running scissors",
        //             "fields": ["comment", "comment.plain^10"]
        //         }
        //     },
        //     "highlight": {
        //         "order": "score",
        //         "fields": {
        //             "comment": {
        //                 "matched_fields": ["comment.plain"],
        //                 "type" : "fvh"
        //             }
        //         }
        //     }
        // }
        // end::4971d093f19f85e3c622f1e0257ff60f[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "query_string": {'
              . '            "query": "running scissors",'
              . '            "fields": ["comment", "comment.plain^10"]'
              . '        }'
              . '    },'
              . '    "highlight": {'
              . '        "order": "score",'
              . '        "fields": {'
              . '            "comment": {'
              . '                "matched_fields": ["comment.plain"],'
              . '                "type" : "fvh"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2859fb1a8139777dca087862a5b1c205
     * Line: 660
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL660_2859fb1a8139777dca087862a5b1c205()
    {
        $client = $this->getClient();
        // tag::2859fb1a8139777dca087862a5b1c205[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "highlight": {
        //         "fields": [
        //             { "title": {} },
        //             { "text": {} }
        //         ]
        //     }
        // }
        // end::2859fb1a8139777dca087862a5b1c205[]

        $curl = 'GET /_search'
              . '{'
              . '    "highlight": {'
              . '        "fields": ['
              . '            { "title": {} },'
              . '            { "text": {} }'
              . '        ]'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e8446172481fb6298c04b4bdc3340f3f
     * Line: 690
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL690_e8446172481fb6298c04b4bdc3340f3f()
    {
        $client = $this->getClient();
        // tag::e8446172481fb6298c04b4bdc3340f3f[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "match": { "user": "kimchy" }
        //     },
        //     "highlight" : {
        //         "fields" : {
        //             "comment" : {"fragment_size" : 150, "number_of_fragments" : 3}
        //         }
        //     }
        // }
        // end::e8446172481fb6298c04b4bdc3340f3f[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "match": { "user": "kimchy" }'
              . '    },'
              . '    "highlight" : {'
              . '        "fields" : {'
              . '            "comment" : {"fragment_size" : 150, "number_of_fragments" : 3}'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4ae1e4f88af2f9be50696e5a59466bb6
     * Line: 710
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL710_4ae1e4f88af2f9be50696e5a59466bb6()
    {
        $client = $this->getClient();
        // tag::4ae1e4f88af2f9be50696e5a59466bb6[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "match": { "user": "kimchy" }
        //     },
        //     "highlight" : {
        //         "order" : "score",
        //         "fields" : {
        //             "comment" : {"fragment_size" : 150, "number_of_fragments" : 3}
        //         }
        //     }
        // }
        // end::4ae1e4f88af2f9be50696e5a59466bb6[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "match": { "user": "kimchy" }'
              . '    },'
              . '    "highlight" : {'
              . '        "order" : "score",'
              . '        "fields" : {'
              . '            "comment" : {"fragment_size" : 150, "number_of_fragments" : 3}'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  62b15eac8c6d294da9114541fdfc527f
     * Line: 734
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL734_62b15eac8c6d294da9114541fdfc527f()
    {
        $client = $this->getClient();
        // tag::62b15eac8c6d294da9114541fdfc527f[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "match": { "user": "kimchy" }
        //     },
        //     "highlight" : {
        //         "fields" : {
        //             "body" : {},
        //             "blog.title" : {"number_of_fragments" : 0}
        //         }
        //     }
        // }
        // end::62b15eac8c6d294da9114541fdfc527f[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "match": { "user": "kimchy" }'
              . '    },'
              . '    "highlight" : {'
              . '        "fields" : {'
              . '            "body" : {},'
              . '            "blog.title" : {"number_of_fragments" : 0}'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3d10eba5cac0069486bc3c2854d15689
     * Line: 761
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL761_3d10eba5cac0069486bc3c2854d15689()
    {
        $client = $this->getClient();
        // tag::3d10eba5cac0069486bc3c2854d15689[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "match": { "user": "kimchy" }
        //     },
        //     "highlight" : {
        //         "fields" : {
        //             "comment" : {
        //                 "fragment_size" : 150,
        //                 "number_of_fragments" : 3,
        //                 "no_match_size": 150
        //             }
        //         }
        //     }
        // }
        // end::3d10eba5cac0069486bc3c2854d15689[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "match": { "user": "kimchy" }'
              . '    },'
              . '    "highlight" : {'
              . '        "fields" : {'
              . '            "comment" : {'
              . '                "fragment_size" : 150,'
              . '                "number_of_fragments" : 3,'
              . '                "no_match_size": 150'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5ea9da129ca70a5fe534f27a82d80b29
     * Line: 789
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL789_5ea9da129ca70a5fe534f27a82d80b29()
    {
        $client = $this->getClient();
        // tag::5ea9da129ca70a5fe534f27a82d80b29[]
        // TODO -- Implement Example
        // PUT /example
        // {
        //   "mappings": {
        //     "properties": {
        //       "comment" : {
        //         "type": "text",
        //         "index_options" : "offsets"
        //       }
        //     }
        //   }
        // }
        // end::5ea9da129ca70a5fe534f27a82d80b29[]

        $curl = 'PUT /example'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "comment" : {'
              . '        "type": "text",'
              . '        "index_options" : "offsets"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  17a1e308761afd3282f13d44d7be008a
     * Line: 808
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL808_17a1e308761afd3282f13d44d7be008a()
    {
        $client = $this->getClient();
        // tag::17a1e308761afd3282f13d44d7be008a[]
        // TODO -- Implement Example
        // PUT /example
        // {
        //   "mappings": {
        //     "properties": {
        //       "comment" : {
        //         "type": "text",
        //         "term_vector" : "with_positions_offsets"
        //       }
        //     }
        //   }
        // }
        // end::17a1e308761afd3282f13d44d7be008a[]

        $curl = 'PUT /example'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "comment" : {'
              . '        "type": "text",'
              . '        "term_vector" : "with_positions_offsets"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  146bfeeaa2ac4fc1352bf8d41097baa0
     * Line: 831
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL831_146bfeeaa2ac4fc1352bf8d41097baa0()
    {
        $client = $this->getClient();
        // tag::146bfeeaa2ac4fc1352bf8d41097baa0[]
        // TODO -- Implement Example
        // GET twitter/_search
        // {
        //     "query" : {
        //         "match_phrase": { "message": "number 1" }
        //     },
        //     "highlight" : {
        //         "fields" : {
        //             "message" : {
        //                 "type": "plain",
        //                 "fragment_size" : 15,
        //                 "number_of_fragments" : 3,
        //                 "fragmenter": "simple"
        //             }
        //         }
        //     }
        // }
        // end::146bfeeaa2ac4fc1352bf8d41097baa0[]

        $curl = 'GET twitter/_search'
              . '{'
              . '    "query" : {'
              . '        "match_phrase": { "message": "number 1" }'
              . '    },'
              . '    "highlight" : {'
              . '        "fields" : {'
              . '            "message" : {'
              . '                "type": "plain",'
              . '                "fragment_size" : 15,'
              . '                "number_of_fragments" : 3,'
              . '                "fragmenter": "simple"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  bc9bd39420f810edae72b9fb33a154fd
     * Line: 890
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL890_bc9bd39420f810edae72b9fb33a154fd()
    {
        $client = $this->getClient();
        // tag::bc9bd39420f810edae72b9fb33a154fd[]
        // TODO -- Implement Example
        // GET twitter/_search
        // {
        //     "query" : {
        //         "match_phrase": { "message": "number 1" }
        //     },
        //     "highlight" : {
        //         "fields" : {
        //             "message" : {
        //                 "type": "plain",
        //                 "fragment_size" : 15,
        //                 "number_of_fragments" : 3,
        //                 "fragmenter": "span"
        //             }
        //         }
        //     }
        // }
        // end::bc9bd39420f810edae72b9fb33a154fd[]

        $curl = 'GET twitter/_search'
              . '{'
              . '    "query" : {'
              . '        "match_phrase": { "message": "number 1" }'
              . '    },'
              . '    "highlight" : {'
              . '        "fields" : {'
              . '            "message" : {'
              . '                "type": "plain",'
              . '                "fragment_size" : 15,'
              . '                "number_of_fragments" : 3,'
              . '                "fragmenter": "span"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






















}
