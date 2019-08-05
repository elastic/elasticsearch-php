<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DocvalueFields
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   search/request/docvalue-fields.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DocvalueFields extends SimpleExamplesTester {

    /**
     * Tag:  097a6bc1d76c3fc92fb299001d27896e
     * Line: 8
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL8_097a6bc1d76c3fc92fb299001d27896e()
    {
        $client = $this->getClient();
        // tag::097a6bc1d76c3fc92fb299001d27896e[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "match_all": {}
        //     },
        //     "docvalue_fields" : [
        //         "my_ip_field", \<1>
        //         {
        //             "field": "my_keyword_field" \<2>
        //         },
        //         {
        //             "field": "my_date_field",
        //             "format": "epoch_millis" \<3>
        //         }
        //     ]
        // }
        // end::097a6bc1d76c3fc92fb299001d27896e[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "match_all": {}'
              . '    },'
              . '    "docvalue_fields" : ['
              . '        "my_ip_field", \<1>'
              . '        {'
              . '            "field": "my_keyword_field" \<2>'
              . '        },'
              . '        {'
              . '            "field": "my_date_field",'
              . '            "format": "epoch_millis" \<3>'
              . '        }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1518ad2c540fd55f9df84bbe75c81606
     * Line: 36
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL36_1518ad2c540fd55f9df84bbe75c81606()
    {
        $client = $this->getClient();
        // tag::1518ad2c540fd55f9df84bbe75c81606[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "match_all": {}
        //     },
        //     "docvalue_fields" : [
        //         {
        //             "field": "*_date_field", \<1>
        //             "format": "epoch_millis" \<2>
        //         }
        //     ]
        // }
        // end::1518ad2c540fd55f9df84bbe75c81606[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "match_all": {}'
              . '    },'
              . '    "docvalue_fields" : ['
              . '        {'
              . '            "field": "*_date_field", \<1>'
              . '            "format": "epoch_millis" \<2>'
              . '        }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
