<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: TermsSetQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/terms-set-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class TermsSetQuery extends SimpleExamplesTester {

    /**
     * Tag:  f29bc8beaa219c21be3204e010f5a509
     * Line: 49
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL49_f29bc8beaa219c21be3204e010f5a509()
    {
        $client = $this->getClient();
        // tag::f29bc8beaa219c21be3204e010f5a509[]
        // TODO -- Implement Example
        // PUT /job-candidates
        // {
        //     "mappings": {
        //         "properties": {
        //             "name": {
        //                 "type": "keyword"
        //             },
        //             "programming_languages": {
        //                 "type": "keyword"
        //             },
        //             "required_matches": {
        //                 "type": "long"
        //             }
        //         }
        //     }
        // }
        // end::f29bc8beaa219c21be3204e010f5a509[]

        $curl = 'PUT /job-candidates'
              . '{'
              . '    "mappings": {'
              . '        "properties": {'
              . '            "name": {'
              . '                "type": "keyword"'
              . '            },'
              . '            "programming_languages": {'
              . '                "type": "keyword"'
              . '            },'
              . '            "required_matches": {'
              . '                "type": "long"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6866beb749ef6dee19d2cb56edc0a9ab
     * Line: 86
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL86_6866beb749ef6dee19d2cb56edc0a9ab()
    {
        $client = $this->getClient();
        // tag::6866beb749ef6dee19d2cb56edc0a9ab[]
        // TODO -- Implement Example
        // PUT /job-candidates/_doc/1?refresh
        // {
        //     "name": "Jane Smith",
        //     "programming_languages": ["c++", "java"],
        //     "required_matches": 2
        // }
        // end::6866beb749ef6dee19d2cb56edc0a9ab[]

        $curl = 'PUT /job-candidates/_doc/1?refresh'
              . '{'
              . '    "name": "Jane Smith",'
              . '    "programming_languages": ["c++", "java"],'
              . '    "required_matches": 2'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f7bccd5a51a4000215767e9a6454327f
     * Line: 109
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL109_f7bccd5a51a4000215767e9a6454327f()
    {
        $client = $this->getClient();
        // tag::f7bccd5a51a4000215767e9a6454327f[]
        // TODO -- Implement Example
        // PUT /job-candidates/_doc/2?refresh
        // {
        //     "name": "Jason Response",
        //     "programming_languages": ["java", "php"],
        //     "required_matches": 2
        // }
        // end::f7bccd5a51a4000215767e9a6454327f[]

        $curl = 'PUT /job-candidates/_doc/2?refresh'
              . '{'
              . '    "name": "Jason Response",'
              . '    "programming_languages": ["java", "php"],'
              . '    "required_matches": 2'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c5040ac6dc2922f191113e7a5fd5a699
     * Line: 139
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL139_c5040ac6dc2922f191113e7a5fd5a699()
    {
        $client = $this->getClient();
        // tag::c5040ac6dc2922f191113e7a5fd5a699[]
        // TODO -- Implement Example
        // GET /job-candidates/_search
        // {
        //     "query": {
        //         "terms_set": {
        //             "programming_languages": {
        //                 "terms": ["c++", "java", "php"],
        //                 "minimum_should_match_field": "required_matches"
        //             }
        //         }
        //     }
        // }
        // end::c5040ac6dc2922f191113e7a5fd5a699[]

        $curl = 'GET /job-candidates/_search'
              . '{'
              . '    "query": {'
              . '        "terms_set": {'
              . '            "programming_languages": {'
              . '                "terms": ["c++", "java", "php"],'
              . '                "minimum_should_match_field": "required_matches"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  cf2e6e604c67175398f6c217b9e86127
     * Line: 218
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL218_cf2e6e604c67175398f6c217b9e86127()
    {
        $client = $this->getClient();
        // tag::cf2e6e604c67175398f6c217b9e86127[]
        // TODO -- Implement Example
        // GET /job-candidates/_search
        // {
        //     "query": {
        //         "terms_set": {
        //             "programming_languages": {
        //                 "terms": ["c++", "java", "php"],
        //                 "minimum_should_match_script": {
        //                    "source": "Math.min(params.num_terms, doc['required_matches'].value)"
        //                 },
        //                 "boost": 1.0
        //             }
        //         }
        //     }
        // }
        // end::cf2e6e604c67175398f6c217b9e86127[]

        $curl = 'GET /job-candidates/_search'
              . '{'
              . '    "query": {'
              . '        "terms_set": {'
              . '            "programming_languages": {'
              . '                "terms": ["c++", "java", "php"],'
              . '                "minimum_should_match_script": {'
              . '                   "source": "Math.min(params.num_terms, doc['required_matches'].value)"'
              . '                },'
              . '                "boost": 1.0'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
