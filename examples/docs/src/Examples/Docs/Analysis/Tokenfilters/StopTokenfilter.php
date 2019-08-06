<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: StopTokenfilter
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   analysis/tokenfilters/stop-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class StopTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  a4575521493d8d1fbdd450821035f821
     * Line: 35
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL35_a4575521493d8d1fbdd450821035f821()
    {
        $client = $this->getClient();
        // tag::a4575521493d8d1fbdd450821035f821[]
        // TODO -- Implement Example
        // PUT /my_index
        // {
        //     "settings": {
        //         "analysis": {
        //             "filter": {
        //                 "my_stop": {
        //                     "type":       "stop",
        //                     "stopwords": ["and", "is", "the"]
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::a4575521493d8d1fbdd450821035f821[]

        $curl = 'PUT /my_index'
              . '{'
              . '    "settings": {'
              . '        "analysis": {'
              . '            "filter": {'
              . '                "my_stop": {'
              . '                    "type":       "stop",'
              . '                    "stopwords": ["and", "is", "the"]'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ded95888c2d68c48426b013284eb896a
     * Line: 55
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL55_ded95888c2d68c48426b013284eb896a()
    {
        $client = $this->getClient();
        // tag::ded95888c2d68c48426b013284eb896a[]
        // TODO -- Implement Example
        // PUT /my_index
        // {
        //     "settings": {
        //         "analysis": {
        //             "filter": {
        //                 "my_stop": {
        //                     "type":       "stop",
        //                     "stopwords":  "_english_"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::ded95888c2d68c48426b013284eb896a[]

        $curl = 'PUT /my_index'
              . '{'
              . '    "settings": {'
              . '        "analysis": {'
              . '            "filter": {'
              . '                "my_stop": {'
              . '                    "type":       "stop",'
              . '                    "stopwords":  "_english_"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
