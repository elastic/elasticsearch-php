<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeleteCalendarEvent
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/delete-calendar-event.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeleteCalendarEvent extends SimpleExamplesTester {

    /**
     * Tag:  f6982ff80b9a64cd5fcac5b20908c906
     * Line: 47
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL47_f6982ff80b9a64cd5fcac5b20908c906()
    {
        $client = $this->getClient();
        // tag::f6982ff80b9a64cd5fcac5b20908c906[]
        // TODO -- Implement Example
        // DELETE _ml/calendars/planned-outages/events/LS8LJGEBMTCMA-qz49st
        // end::f6982ff80b9a64cd5fcac5b20908c906[]

        $curl = 'DELETE _ml/calendars/planned-outages/events/LS8LJGEBMTCMA-qz49st';

        // TODO -- make assertion
    }

// %__METHOD__%


}
