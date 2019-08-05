<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ReloadAnalyzers
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/apis/reload-analyzers.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ReloadAnalyzers extends SimpleExamplesTester {

    /**
     * Tag:  fd25ae98c5c8be66fdd5e6ef32815ff5
     * Line: 15
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL15_fd25ae98c5c8be66fdd5e6ef32815ff5()
    {
        $client = $this->getClient();
        // tag::fd25ae98c5c8be66fdd5e6ef32815ff5[]
        // TODO -- Implement Example
        // PUT /my_index
        // {
        //     "settings": {
        //         "index" : {
        //             "analysis" : {
        //                 "analyzer" : {
        //                     "my_synonyms" : {
        //                         "tokenizer" : "whitespace",
        //                         "filter" : ["synonym"]
        //                     }
        //                 },
        //                 "filter" : {
        //                     "synonym" : {
        //                         "type" : "synonym",
        //                         "synonyms_path" : "analysis/synonym.txt",
        //                         "updateable" : true \<1>
        //                     }
        //                 }
        //             }
        //         }
        //     },
        //     "mappings": {
        //         "properties": {
        //             "text": {
        //                 "type": "text",
        //                 "analyzer" : "standard",
        //                 "search_analyzer": "my_synonyms" \<2>
        //             }
        //         }
        //     }
        // }
        // end::fd25ae98c5c8be66fdd5e6ef32815ff5[]

        $curl = 'PUT /my_index'
              . '{'
              . '    "settings": {'
              . '        "index" : {'
              . '            "analysis" : {'
              . '                "analyzer" : {'
              . '                    "my_synonyms" : {'
              . '                        "tokenizer" : "whitespace",'
              . '                        "filter" : ["synonym"]'
              . '                    }'
              . '                },'
              . '                "filter" : {'
              . '                    "synonym" : {'
              . '                        "type" : "synonym",'
              . '                        "synonyms_path" : "analysis/synonym.txt",'
              . '                        "updateable" : true \<1>'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    },'
              . '    "mappings": {'
              . '        "properties": {'
              . '            "text": {'
              . '                "type": "text",'
              . '                "analyzer" : "standard",'
              . '                "search_analyzer": "my_synonyms" \<2>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7554da505cc27f6bd0d028b66e85f4a5
     * Line: 68
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL68_7554da505cc27f6bd0d028b66e85f4a5()
    {
        $client = $this->getClient();
        // tag::7554da505cc27f6bd0d028b66e85f4a5[]
        // TODO -- Implement Example
        // POST /my_index/_reload_search_analyzers
        // end::7554da505cc27f6bd0d028b66e85f4a5[]

        $curl = 'POST /my_index/_reload_search_analyzers';

        // TODO -- make assertion
    }

// %__METHOD__%



}
