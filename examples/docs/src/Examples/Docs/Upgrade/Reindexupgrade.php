<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Upgrade;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Reindexupgrade
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   upgrade/reindex_upgrade.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Reindexupgrade extends SimpleExamplesTester {

    /**
     * Tag:  acd65c045139fef38ef5cd20c8c1cfc1
     * Line: 160
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL160_acd65c045139fef38ef5cd20c8c1cfc1()
    {
        $client = $this->getClient();
        // tag::acd65c045139fef38ef5cd20c8c1cfc1[]
        // TODO -- Implement Example
        // POST _reindex
        // {
        //   "source": {
        //     "remote": {
        //       "host": "http://oldhost:9200",
        //       "username": "user",
        //       "password": "pass"
        //     },
        //     "index": "source",
        //     "query": {
        //       "match": {
        //         "test": "data"
        //       }
        //     }
        //   },
        //   "dest": {
        //     "index": "dest"
        //   }
        // }
        // end::acd65c045139fef38ef5cd20c8c1cfc1[]

        $curl = 'POST _reindex'
              . '{'
              . '  "source": {'
              . '    "remote": {'
              . '      "host": "http://oldhost:9200",'
              . '      "username": "user",'
              . '      "password": "pass"'
              . '    },'
              . '    "index": "source",'
              . '    "query": {'
              . '      "match": {'
              . '        "test": "data"'
              . '      }'
              . '    }'
              . '  },'
              . '  "dest": {'
              . '    "index": "dest"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
