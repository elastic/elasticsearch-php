<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Flattened
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/types/flattened.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Flattened extends SimpleExamplesTester {

    /**
     * Tag:  8aa74aee3dcf4b34028e4c5e1c1ed27b
     * Line: 37
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL37_8aa74aee3dcf4b34028e4c5e1c1ed27b()
    {
        $client = $this->getClient();
        // tag::8aa74aee3dcf4b34028e4c5e1c1ed27b[]
        // TODO -- Implement Example
        // PUT bug_reports
        // {
        //   "mappings": {
        //     "properties": {
        //       "title": {
        //         "type": "text"
        //       },
        //       "labels": {
        //         "type": "flattened"
        //       }
        //     }
        //   }
        // }
        // POST bug_reports/_doc/1
        // {
        //   "title": "Results are not sorted correctly.",
        //   "labels": {
        //     "priority": "urgent",
        //     "release": ["v1.2.5", "v1.3.0"],
        //     "timestamp": {
        //       "created": 1541458026,
        //       "closed": 1541457010
        //     }
        //   }
        // }
        // end::8aa74aee3dcf4b34028e4c5e1c1ed27b[]

        $curl = 'PUT bug_reports'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "title": {'
              . '        "type": "text"'
              . '      },'
              . '      "labels": {'
              . '        "type": "flattened"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST bug_reports/_doc/1'
              . '{'
              . '  "title": "Results are not sorted correctly.",'
              . '  "labels": {'
              . '    "priority": "urgent",'
              . '    "release": ["v1.2.5", "v1.3.0"],'
              . '    "timestamp": {'
              . '      "created": 1541458026,'
              . '      "closed": 1541457010'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  169b39bb889ecd47541bed3e48725488
     * Line: 76
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL76_169b39bb889ecd47541bed3e48725488()
    {
        $client = $this->getClient();
        // tag::169b39bb889ecd47541bed3e48725488[]
        // TODO -- Implement Example
        // POST bug_reports/_search
        // {
        //   "query": {
        //     "term": {"labels": "urgent"}
        //   }
        // }
        // end::169b39bb889ecd47541bed3e48725488[]

        $curl = 'POST bug_reports/_search'
              . '{'
              . '  "query": {'
              . '    "term": {"labels": "urgent"}'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2f4a55dfeba8851b306ef9c1b216ef54
     * Line: 88
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL88_2f4a55dfeba8851b306ef9c1b216ef54()
    {
        $client = $this->getClient();
        // tag::2f4a55dfeba8851b306ef9c1b216ef54[]
        // TODO -- Implement Example
        // POST bug_reports/_search
        // {
        //   "query": {
        //     "term": {"labels.release": "v1.3.0"}
        //   }
        // }
        // end::2f4a55dfeba8851b306ef9c1b216ef54[]

        $curl = 'POST bug_reports/_search'
              . '{'
              . '  "query": {'
              . '    "term": {"labels.release": "v1.3.0"}'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
