<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PostCalendarEvent
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/anomaly-detection/apis/post-calendar-event.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PostCalendarEvent extends SimpleExamplesTester {

    /**
     * Tag:  c067182d385f59ce5952fb9a716fbf05
     * Line: 64
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL64_c067182d385f59ce5952fb9a716fbf05()
    {
        $client = $this->getClient();
        // tag::c067182d385f59ce5952fb9a716fbf05[]
        // TODO -- Implement Example
        // POST _ml/calendars/planned-outages/events
        // {
        //   "events" : [
        //     {"description": "event 1", "start_time": 1513641600000, "end_time": 1513728000000},
        //     {"description": "event 2", "start_time": 1513814400000, "end_time": 1513900800000},
        //     {"description": "event 3", "start_time": 1514160000000, "end_time": 1514246400000}
        //   ]
        // }
        // end::c067182d385f59ce5952fb9a716fbf05[]

        $curl = 'POST _ml/calendars/planned-outages/events'
              . '{'
              . '  "events" : ['
              . '    {"description": "event 1", "start_time": 1513641600000, "end_time": 1513728000000},'
              . '    {"description": "event 2", "start_time": 1513814400000, "end_time": 1513900800000},'
              . '    {"description": "event 3", "start_time": 1514160000000, "end_time": 1514246400000}'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
