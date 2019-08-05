<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetCalendar
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/get-calendar.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetCalendar extends SimpleExamplesTester {

    /**
     * Tag:  5fca6671bc8eaddc44ac488d1c3c6909
     * Line: 72
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL72_5fca6671bc8eaddc44ac488d1c3c6909()
    {
        $client = $this->getClient();
        // tag::5fca6671bc8eaddc44ac488d1c3c6909[]
        // TODO -- Implement Example
        // GET _ml/calendars/planned-outages
        // end::5fca6671bc8eaddc44ac488d1c3c6909[]

        $curl = 'GET _ml/calendars/planned-outages';

        // TODO -- make assertion
    }

// %__METHOD__%


}
