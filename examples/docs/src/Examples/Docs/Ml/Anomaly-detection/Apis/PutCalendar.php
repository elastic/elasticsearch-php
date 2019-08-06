<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PutCalendar
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/anomaly-detection/apis/put-calendar.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PutCalendar extends SimpleExamplesTester {

    /**
     * Tag:  e61b5abe85000cc954a42e2cd74f3a26
     * Line: 45
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL45_e61b5abe85000cc954a42e2cd74f3a26()
    {
        $client = $this->getClient();
        // tag::e61b5abe85000cc954a42e2cd74f3a26[]
        // TODO -- Implement Example
        // PUT _ml/calendars/planned-outages
        // end::e61b5abe85000cc954a42e2cd74f3a26[]

        $curl = 'PUT _ml/calendars/planned-outages';

        // TODO -- make assertion
    }

// %__METHOD__%


}
