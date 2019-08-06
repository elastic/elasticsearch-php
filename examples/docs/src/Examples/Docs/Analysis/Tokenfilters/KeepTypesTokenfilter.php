<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: KeepTypesTokenfilter
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/tokenfilters/keep-types-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class KeepTypesTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  928923befcb84cdcace229b027fd281f
     * Line: 21
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL21_928923befcb84cdcace229b027fd281f()
    {
        $client = $this->getClient();
        // tag::928923befcb84cdcace229b027fd281f[]
        // TODO -- Implement Example
        // PUT /keep_types_example
        // {
        //     "settings" : {
        //         "analysis" : {
        //             "analyzer" : {
        //                 "my_analyzer" : {
        //                     "tokenizer" : "standard",
        //                     "filter" : ["lowercase", "extract_numbers"]
        //                 }
        //             },
        //             "filter" : {
        //                 "extract_numbers" : {
        //                     "type" : "keep_types",
        //                     "types" : [ "<NUM>" ]
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::928923befcb84cdcace229b027fd281f[]

        $curl = 'PUT /keep_types_example'
              . '{'
              . '    "settings" : {'
              . '        "analysis" : {'
              . '            "analyzer" : {'
              . '                "my_analyzer" : {'
              . '                    "tokenizer" : "standard",'
              . '                    "filter" : ["lowercase", "extract_numbers"]'
              . '                }'
              . '            },'
              . '            "filter" : {'
              . '                "extract_numbers" : {'
              . '                    "type" : "keep_types",'
              . '                    "types" : [ "<NUM>" ]'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b425b2194294437ac21df0b5606fb3d2
     * Line: 47
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL47_b425b2194294437ac21df0b5606fb3d2()
    {
        $client = $this->getClient();
        // tag::b425b2194294437ac21df0b5606fb3d2[]
        // TODO -- Implement Example
        // POST /keep_types_example/_analyze
        // {
        //   "analyzer" : "my_analyzer",
        //   "text" : "this is just 1 a test"
        // }
        // end::b425b2194294437ac21df0b5606fb3d2[]

        $curl = 'POST /keep_types_example/_analyze'
              . '{'
              . '  "analyzer" : "my_analyzer",'
              . '  "text" : "this is just 1 a test"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1658d704f26a06e8f37c6430361c3f26
     * Line: 82
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL82_1658d704f26a06e8f37c6430361c3f26()
    {
        $client = $this->getClient();
        // tag::1658d704f26a06e8f37c6430361c3f26[]
        // TODO -- Implement Example
        // PUT /keep_types_exclude_example
        // {
        //     "settings" : {
        //         "analysis" : {
        //             "analyzer" : {
        //                 "my_analyzer" : {
        //                     "tokenizer" : "standard",
        //                     "filter" : ["lowercase", "remove_numbers"]
        //                 }
        //             },
        //             "filter" : {
        //                 "remove_numbers" : {
        //                     "type" : "keep_types",
        //                     "mode" : "exclude",
        //                     "types" : [ "<NUM>" ]
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::1658d704f26a06e8f37c6430361c3f26[]

        $curl = 'PUT /keep_types_exclude_example'
              . '{'
              . '    "settings" : {'
              . '        "analysis" : {'
              . '            "analyzer" : {'
              . '                "my_analyzer" : {'
              . '                    "tokenizer" : "standard",'
              . '                    "filter" : ["lowercase", "remove_numbers"]'
              . '                }'
              . '            },'
              . '            "filter" : {'
              . '                "remove_numbers" : {'
              . '                    "type" : "keep_types",'
              . '                    "mode" : "exclude",'
              . '                    "types" : [ "<NUM>" ]'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4d5ded2eede9a987df094dc4a91893d7
     * Line: 109
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL109_4d5ded2eede9a987df094dc4a91893d7()
    {
        $client = $this->getClient();
        // tag::4d5ded2eede9a987df094dc4a91893d7[]
        // TODO -- Implement Example
        // POST /keep_types_exclude_example/_analyze
        // {
        //   "analyzer" : "my_analyzer",
        //   "text" : "hello 101 world"
        // }
        // end::4d5ded2eede9a987df094dc4a91893d7[]

        $curl = 'POST /keep_types_exclude_example/_analyze'
              . '{'
              . '  "analyzer" : "my_analyzer",'
              . '  "text" : "hello 101 world"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
