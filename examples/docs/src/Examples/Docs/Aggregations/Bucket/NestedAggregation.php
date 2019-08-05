<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: NestedAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/bucket/nested-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class NestedAggregation extends SimpleExamplesTester {

    /**
     * Tag:  53e6007f451ddf30074b3e26a4afdaad
     * Line: 10
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL10_53e6007f451ddf30074b3e26a4afdaad()
    {
        $client = $this->getClient();
        // tag::53e6007f451ddf30074b3e26a4afdaad[]
        // TODO -- Implement Example
        // PUT /index
        // {
        //     "mappings": {
        //         "properties" : {
        //             "resellers" : { \<1>
        //                 "type" : "nested",
        //                 "properties" : {
        //                     "name" : { "type" : "text" },
        //                     "price" : { "type" : "double" }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::53e6007f451ddf30074b3e26a4afdaad[]

        $curl = 'PUT /index'
              . '{'
              . '    "mappings": {'
              . '        "properties" : {'
              . '            "resellers" : { \<1>'
              . '                "type" : "nested",'
              . '                "properties" : {'
              . '                    "name" : { "type" : "text" },'
              . '                    "price" : { "type" : "double" }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e3d2300ad78b2d20c3a501a73db6bcac
     * Line: 33
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL33_e3d2300ad78b2d20c3a501a73db6bcac()
    {
        $client = $this->getClient();
        // tag::e3d2300ad78b2d20c3a501a73db6bcac[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "match" : { "name" : "led tv" }
        //     },
        //     "aggs" : {
        //         "resellers" : {
        //             "nested" : {
        //                 "path" : "resellers"
        //             },
        //             "aggs" : {
        //                 "min_price" : { "min" : { "field" : "resellers.price" } }
        //             }
        //         }
        //     }
        // }
        // end::e3d2300ad78b2d20c3a501a73db6bcac[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "match" : { "name" : "led tv" }'
              . '    },'
              . '    "aggs" : {'
              . '        "resellers" : {'
              . '            "nested" : {'
              . '                "path" : "resellers"'
              . '            },'
              . '            "aggs" : {'
              . '                "min_price" : { "min" : { "field" : "resellers.price" } }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
