<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Suggesters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: CompletionSuggest
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   search/suggesters/completion-suggest.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class CompletionSuggest extends SimpleExamplesTester {

    /**
     * Tag:  b8718ca915bbb848925a5fb593a03e70
     * Line: 28
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL28_b8718ca915bbb848925a5fb593a03e70()
    {
        $client = $this->getClient();
        // tag::b8718ca915bbb848925a5fb593a03e70[]
        // TODO -- Implement Example
        // PUT music
        // {
        //     "mappings": {
        //         "properties" : {
        //             "suggest" : {
        //                 "type" : "completion"
        //             },
        //             "title" : {
        //                 "type": "keyword"
        //             }
        //         }
        //     }
        // }
        // end::b8718ca915bbb848925a5fb593a03e70[]

        $curl = 'PUT music'
              . '{'
              . '    "mappings": {'
              . '        "properties" : {'
              . '            "suggest" : {'
              . '                "type" : "completion"'
              . '            },'
              . '            "title" : {'
              . '                "type": "keyword"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  223787a2b80e132a22548768ccf7052d
     * Line: 85
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL85_223787a2b80e132a22548768ccf7052d()
    {
        $client = $this->getClient();
        // tag::223787a2b80e132a22548768ccf7052d[]
        // TODO -- Implement Example
        // PUT music/_doc/1?refresh
        // {
        //     "suggest" : {
        //         "input": [ "Nevermind", "Nirvana" ],
        //         "weight" : 34
        //     }
        // }
        // end::223787a2b80e132a22548768ccf7052d[]

        $curl = 'PUT music/_doc/1?refresh'
              . '{'
              . '    "suggest" : {'
              . '        "input": [ "Nevermind", "Nirvana" ],'
              . '        "weight" : 34'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5e9f3b7246f4549624fa5b9dd3719d75
     * Line: 112
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL112_5e9f3b7246f4549624fa5b9dd3719d75()
    {
        $client = $this->getClient();
        // tag::5e9f3b7246f4549624fa5b9dd3719d75[]
        // TODO -- Implement Example
        // PUT music/_doc/1?refresh
        // {
        //     "suggest" : [
        //         {
        //             "input": "Nevermind",
        //             "weight" : 10
        //         },
        //         {
        //             "input": "Nirvana",
        //             "weight" : 3
        //         }
        //     ]
        // }
        // end::5e9f3b7246f4549624fa5b9dd3719d75[]

        $curl = 'PUT music/_doc/1?refresh'
              . '{'
              . '    "suggest" : ['
              . '        {'
              . '            "input": "Nevermind",'
              . '            "weight" : 10'
              . '        },'
              . '        {'
              . '            "input": "Nirvana",'
              . '            "weight" : 3'
              . '        }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7c3414279d47e9c29105d061ed316ef8
     * Line: 134
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL134_7c3414279d47e9c29105d061ed316ef8()
    {
        $client = $this->getClient();
        // tag::7c3414279d47e9c29105d061ed316ef8[]
        // TODO -- Implement Example
        // PUT music/_doc/1?refresh
        // {
        //   "suggest" : [ "Nevermind", "Nirvana" ]
        // }
        // end::7c3414279d47e9c29105d061ed316ef8[]

        $curl = 'PUT music/_doc/1?refresh'
              . '{'
              . '  "suggest" : [ "Nevermind", "Nirvana" ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7f951981bd8ed09e56aebeb13adb96ce
     * Line: 152
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL152_7f951981bd8ed09e56aebeb13adb96ce()
    {
        $client = $this->getClient();
        // tag::7f951981bd8ed09e56aebeb13adb96ce[]
        // TODO -- Implement Example
        // POST music/_search?pretty
        // {
        //     "suggest": {
        //         "song-suggest" : {
        //             "prefix" : "nir", \<1>
        //             "completion" : { \<2>
        //                 "field" : "suggest" \<3>
        //             }
        //         }
        //     }
        // }
        // end::7f951981bd8ed09e56aebeb13adb96ce[]

        $curl = 'POST music/_search?pretty'
              . '{'
              . '    "suggest": {'
              . '        "song-suggest" : {'
              . '            "prefix" : "nir", \<1>'
              . '            "completion" : { \<2>'
              . '                "field" : "suggest" \<3>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  565ef4aad0c7765879325cc5d2e3c530
     * Line: 222
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL222_565ef4aad0c7765879325cc5d2e3c530()
    {
        $client = $this->getClient();
        // tag::565ef4aad0c7765879325cc5d2e3c530[]
        // TODO -- Implement Example
        // POST music/_search
        // {
        //     "_source": "suggest", \<1>
        //     "suggest": {
        //         "song-suggest" : {
        //             "prefix" : "nir",
        //             "completion" : {
        //                 "field" : "suggest", \<2>
        //                 "size" : 5 \<3>
        //             }
        //         }
        //     }
        // }
        // end::565ef4aad0c7765879325cc5d2e3c530[]

        $curl = 'POST music/_search'
              . '{'
              . '    "_source": "suggest", \<1>'
              . '    "suggest": {'
              . '        "song-suggest" : {'
              . '            "prefix" : "nir",'
              . '            "completion" : {'
              . '                "field" : "suggest", \<2>'
              . '                "size" : 5 \<3>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b2a6fb1a94dd10bf594dafe727647e1d
     * Line: 314
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL314_b2a6fb1a94dd10bf594dafe727647e1d()
    {
        $client = $this->getClient();
        // tag::b2a6fb1a94dd10bf594dafe727647e1d[]
        // TODO -- Implement Example
        // POST music/_search?pretty
        // {
        //     "suggest": {
        //         "song-suggest" : {
        //             "prefix" : "nor",
        //             "completion" : {
        //                 "field" : "suggest",
        //                 "skip_duplicates": true
        //             }
        //         }
        //     }
        // }
        // end::b2a6fb1a94dd10bf594dafe727647e1d[]

        $curl = 'POST music/_search?pretty'
              . '{'
              . '    "suggest": {'
              . '        "song-suggest" : {'
              . '            "prefix" : "nor",'
              . '            "completion" : {'
              . '                "field" : "suggest",'
              . '                "skip_duplicates": true'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a4eac3c0bac550247e8c7d3f9bcaac1c
     * Line: 340
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL340_a4eac3c0bac550247e8c7d3f9bcaac1c()
    {
        $client = $this->getClient();
        // tag::a4eac3c0bac550247e8c7d3f9bcaac1c[]
        // TODO -- Implement Example
        // POST music/_search?pretty
        // {
        //     "suggest": {
        //         "song-suggest" : {
        //             "prefix" : "nor",
        //             "completion" : {
        //                 "field" : "suggest",
        //                 "fuzzy" : {
        //                     "fuzziness" : 2
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::a4eac3c0bac550247e8c7d3f9bcaac1c[]

        $curl = 'POST music/_search?pretty'
              . '{'
              . '    "suggest": {'
              . '        "song-suggest" : {'
              . '            "prefix" : "nor",'
              . '            "completion" : {'
              . '                "field" : "suggest",'
              . '                "fuzzy" : {'
              . '                    "fuzziness" : 2'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  62280b8a1ec0c214b3110a2c42a55fce
     * Line: 399
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL399_62280b8a1ec0c214b3110a2c42a55fce()
    {
        $client = $this->getClient();
        // tag::62280b8a1ec0c214b3110a2c42a55fce[]
        // TODO -- Implement Example
        // POST music/_search?pretty
        // {
        //     "suggest": {
        //         "song-suggest" : {
        //             "regex" : "n[ever|i]r",
        //             "completion" : {
        //                 "field" : "suggest"
        //             }
        //         }
        //     }
        // }
        // end::62280b8a1ec0c214b3110a2c42a55fce[]

        $curl = 'POST music/_search?pretty'
              . '{'
              . '    "suggest": {'
              . '        "song-suggest" : {'
              . '            "regex" : "n[ever|i]r",'
              . '            "completion" : {'
              . '                "field" : "suggest"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%










}
