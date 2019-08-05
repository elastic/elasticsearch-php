<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Format
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/params/format.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Format extends SimpleExamplesTester {

    /**
     * Tag:  7f465b7e8ed42df6c42251b4481e699e
     * Line: 13
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL13_7f465b7e8ed42df6c42251b4481e699e()
    {
        $client = $this->getClient();
        // tag::7f465b7e8ed42df6c42251b4481e699e[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "date": {
        //         "type":   "date",
        //         "format": "yyyy-MM-dd"
        //       }
        //     }
        //   }
        // }
        // end::7f465b7e8ed42df6c42251b4481e699e[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "date": {'
              . '        "type":   "date",'
              . '        "format": "yyyy-MM-dd"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
