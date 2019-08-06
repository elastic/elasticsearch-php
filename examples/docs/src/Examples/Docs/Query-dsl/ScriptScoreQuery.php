<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ScriptScoreQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/script-score-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ScriptScoreQuery extends SimpleExamplesTester {

    /**
     * Tag:  eb35bef392e0957d609f1a26481e048d
     * Line: 21
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL21_eb35bef392e0957d609f1a26481e048d()
    {
        $client = $this->getClient();
        // tag::eb35bef392e0957d609f1a26481e048d[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "script_score" : {
        //             "query" : {
        //                 "match": { "message": "elasticsearch" }
        //             },
        //             "script" : {
        //                 "source" : "doc[\'likes\'].value / 10 "
        //             }
        //         }
        //      }
        // }
        // end::eb35bef392e0957d609f1a26481e048d[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "script_score" : {'
              . '            "query" : {'
              . '                "match": { "message": "elasticsearch" }'
              . '            },'
              . '            "script" : {'
              . '                "source" : "doc[\'likes\'].value / 10 "'
              . '            }'
              . '        }'
              . '     }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
