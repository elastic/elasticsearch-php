<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Df-analytics\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeleteDfanalytics
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/df-analytics/apis/delete-dfanalytics.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeleteDfanalytics extends SimpleExamplesTester {

    /**
     * Tag:  1c8b6768c4eefc76fcb38708152f561b
     * Line: 38
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL38_1c8b6768c4eefc76fcb38708152f561b()
    {
        $client = $this->getClient();
        // tag::1c8b6768c4eefc76fcb38708152f561b[]
        // TODO -- Implement Example
        // DELETE _ml/data_frame/analytics/loganalytics
        // end::1c8b6768c4eefc76fcb38708152f561b[]

        $curl = 'DELETE _ml/data_frame/analytics/loganalytics';

        // TODO -- make assertion
    }

// %__METHOD__%


}
