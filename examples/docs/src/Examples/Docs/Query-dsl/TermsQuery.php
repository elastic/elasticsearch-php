<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: TermsQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/terms-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class TermsQuery extends SimpleExamplesTester {

    /**
     * Tag:  0c4ad860a485fe53d8140ad3ccd11dcf
     * Line: 19
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL19_0c4ad860a485fe53d8140ad3ccd11dcf()
    {
        $client = $this->getClient();
        // tag::0c4ad860a485fe53d8140ad3ccd11dcf[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "terms" : {
        //             "user" : ["kimchy", "elasticsearch"],
        //             "boost" : 1.0
        //         }
        //     }
        // }
        // end::0c4ad860a485fe53d8140ad3ccd11dcf[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "terms" : {'
              . '            "user" : ["kimchy", "elasticsearch"],'
              . '            "boost" : 1.0'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9e56d79ad9a02b642c361f0b85dd95d7
     * Line: 128
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL128_9e56d79ad9a02b642c361f0b85dd95d7()
    {
        $client = $this->getClient();
        // tag::9e56d79ad9a02b642c361f0b85dd95d7[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //     "mappings" : {
        //         "properties" : {
        //             "color" : { "type" : "keyword" }
        //         }
        //     }
        // }
        // end::9e56d79ad9a02b642c361f0b85dd95d7[]

        $curl = 'PUT my_index'
              . '{'
              . '    "mappings" : {'
              . '        "properties" : {'
              . '            "color" : { "type" : "keyword" }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d3088d5fa59b3ab110f64fb4f9b0065c
     * Line: 147
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL147_d3088d5fa59b3ab110f64fb4f9b0065c()
    {
        $client = $this->getClient();
        // tag::d3088d5fa59b3ab110f64fb4f9b0065c[]
        // TODO -- Implement Example
        // PUT my_index/_doc/1
        // {
        //   "color":   ["blue", "green"]
        // }
        // end::d3088d5fa59b3ab110f64fb4f9b0065c[]

        $curl = 'PUT my_index/_doc/1'
              . '{'
              . '  "color":   ["blue", "green"]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8c5977410335d58217e0626618ce6641
     * Line: 163
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL163_8c5977410335d58217e0626618ce6641()
    {
        $client = $this->getClient();
        // tag::8c5977410335d58217e0626618ce6641[]
        // TODO -- Implement Example
        // PUT my_index/_doc/2
        // {
        //   "color":   "blue"
        // }
        // end::8c5977410335d58217e0626618ce6641[]

        $curl = 'PUT my_index/_doc/2'
              . '{'
              . '  "color":   "blue"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d1bcf2eb63a462bfdcf01a68e68d5b4a
     * Line: 191
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL191_d1bcf2eb63a462bfdcf01a68e68d5b4a()
    {
        $client = $this->getClient();
        // tag::d1bcf2eb63a462bfdcf01a68e68d5b4a[]
        // TODO -- Implement Example
        // GET my_index/_search?pretty
        // {
        //   "query": {
        //     "terms": {
        //         "color" : {
        //             "index" : "my_index",
        //             "id" : "2",
        //             "path" : "color"
        //         }
        //     }
        //   }
        // }
        // end::d1bcf2eb63a462bfdcf01a68e68d5b4a[]

        $curl = 'GET my_index/_search?pretty'
              . '{'
              . '  "query": {'
              . '    "terms": {'
              . '        "color" : {'
              . '            "index" : "my_index",'
              . '            "id" : "2",'
              . '            "path" : "color"'
              . '        }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
