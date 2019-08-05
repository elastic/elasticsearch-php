<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeleteCalendarJob
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/delete-calendar-job.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeleteCalendarJob extends SimpleExamplesTester {

    /**
     * Tag:  1b0b29e5cd7550c648d0892378e93804
     * Line: 40
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL40_1b0b29e5cd7550c648d0892378e93804()
    {
        $client = $this->getClient();
        // tag::1b0b29e5cd7550c648d0892378e93804[]
        // TODO -- Implement Example
        // DELETE _ml/calendars/planned-outages/jobs/total-requests
        // end::1b0b29e5cd7550c648d0892378e93804[]

        $curl = 'DELETE _ml/calendars/planned-outages/jobs/total-requests';

        // TODO -- make assertion
    }

// %__METHOD__%


}
