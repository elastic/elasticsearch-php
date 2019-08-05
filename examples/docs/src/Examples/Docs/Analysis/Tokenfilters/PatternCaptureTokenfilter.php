<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Tokenfilters;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PatternCaptureTokenfilter
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/tokenfilters/pattern-capture-tokenfilter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PatternCaptureTokenfilter extends SimpleExamplesTester {

    /**
     * Tag:  f733b25cd4c448b226bb76862974eef2
     * Line: 48
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL48_f733b25cd4c448b226bb76862974eef2()
    {
        $client = $this->getClient();
        // tag::f733b25cd4c448b226bb76862974eef2[]
        // TODO -- Implement Example
        // PUT test
        // {
        //    "settings" : {
        //       "analysis" : {
        //          "filter" : {
        //             "code" : {
        //                "type" : "pattern_capture",
        //                "preserve_original" : true,
        //                "patterns" : [
        //                   "(\\p{Ll}+|\\p{Lu}\\p{Ll}+|\\p{Lu}+)",
        //                   "(\\d+)"
        //                ]
        //             }
        //          },
        //          "analyzer" : {
        //             "code" : {
        //                "tokenizer" : "pattern",
        //                "filter" : [ "code", "lowercase" ]
        //             }
        //          }
        //       }
        //    }
        // }
        // end::f733b25cd4c448b226bb76862974eef2[]

        $curl = 'PUT test'
              . '{'
              . '   "settings" : {'
              . '      "analysis" : {'
              . '         "filter" : {'
              . '            "code" : {'
              . '               "type" : "pattern_capture",'
              . '               "preserve_original" : true,'
              . '               "patterns" : ['
              . '                  "(\\p{Ll}+|\\p{Lu}\\p{Ll}+|\\p{Lu}+)",'
              . '                  "(\\d+)"'
              . '               ]'
              . '            }'
              . '         },'
              . '         "analyzer" : {'
              . '            "code" : {'
              . '               "tokenizer" : "pattern",'
              . '               "filter" : [ "code", "lowercase" ]'
              . '            }'
              . '         }'
              . '      }'
              . '   }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  080c34d8151d02b760571e3a2899fa97
     * Line: 89
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL89_080c34d8151d02b760571e3a2899fa97()
    {
        $client = $this->getClient();
        // tag::080c34d8151d02b760571e3a2899fa97[]
        // TODO -- Implement Example
        // PUT test
        // {
        //    "settings" : {
        //       "analysis" : {
        //          "filter" : {
        //             "email" : {
        //                "type" : "pattern_capture",
        //                "preserve_original" : true,
        //                "patterns" : [
        //                   "([^@]+)",
        //                   "(\\p{L}+)",
        //                   "(\\d+)",
        //                   "@(.+)"
        //                ]
        //             }
        //          },
        //          "analyzer" : {
        //             "email" : {
        //                "tokenizer" : "uax_url_email",
        //                "filter" : [ "email", "lowercase",  "unique" ]
        //             }
        //          }
        //       }
        //    }
        // }
        // end::080c34d8151d02b760571e3a2899fa97[]

        $curl = 'PUT test'
              . '{'
              . '   "settings" : {'
              . '      "analysis" : {'
              . '         "filter" : {'
              . '            "email" : {'
              . '               "type" : "pattern_capture",'
              . '               "preserve_original" : true,'
              . '               "patterns" : ['
              . '                  "([^@]+)",'
              . '                  "(\\p{L}+)",'
              . '                  "(\\d+)",'
              . '                  "@(.+)"'
              . '               ]'
              . '            }'
              . '         },'
              . '         "analyzer" : {'
              . '            "email" : {'
              . '               "tokenizer" : "uax_url_email",'
              . '               "filter" : [ "email", "lowercase",  "unique" ]'
              . '            }'
              . '         }'
              . '      }'
              . '   }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
