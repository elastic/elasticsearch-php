<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetCalendarEvent
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/anomaly-detection/apis/get-calendar-event.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetCalendarEvent extends SimpleExamplesTester {

    /**
     * Tag:  39d6f575c9458d9c941364dfd0493fa0
     * Line: 90
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL90_39d6f575c9458d9c941364dfd0493fa0()
    {
        $client = $this->getClient();
        // tag::39d6f575c9458d9c941364dfd0493fa0[]
        // TODO -- Implement Example
        // GET _ml/calendars/planned-outages/events
        // end::39d6f575c9458d9c941364dfd0493fa0[]

        $curl = 'GET _ml/calendars/planned-outages/events';

        // TODO -- make assertion
    }

// %__METHOD__%


}
