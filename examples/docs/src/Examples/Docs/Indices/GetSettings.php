<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetSettings
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/get-settings.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetSettings extends SimpleExamplesTester {

    /**
     * Tag:  20bdfd960e8d76c4329269e237792eb7
     * Line: 7
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL7_20bdfd960e8d76c4329269e237792eb7()
    {
        $client = $this->getClient();
        // tag::20bdfd960e8d76c4329269e237792eb7[]
        // TODO -- Implement Example
        // GET /twitter/_settings
        // end::20bdfd960e8d76c4329269e237792eb7[]

        $curl = 'GET /twitter/_settings';

        // TODO -- make assertion
    }

    /**
     * Tag:  c538fc182f433e7141aee9d75c3e42d2
     * Line: 24
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL24_c538fc182f433e7141aee9d75c3e42d2()
    {
        $client = $this->getClient();
        // tag::c538fc182f433e7141aee9d75c3e42d2[]
        // TODO -- Implement Example
        // GET /twitter,kimchy/_settings
        // GET /_all/_settings
        // GET /log_2013_*/_settings
        // end::c538fc182f433e7141aee9d75c3e42d2[]

        $curl = 'GET /twitter,kimchy/_settings'
              . 'GET /_all/_settings'
              . 'GET /log_2013_*/_settings';

        // TODO -- make assertion
    }

    /**
     * Tag:  9748682dcfb24b7d4893f534f7040370
     * Line: 42
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL42_9748682dcfb24b7d4893f534f7040370()
    {
        $client = $this->getClient();
        // tag::9748682dcfb24b7d4893f534f7040370[]
        // TODO -- Implement Example
        // GET /log_2013_-*/_settings/index.number_*
        // end::9748682dcfb24b7d4893f534f7040370[]

        $curl = 'GET /log_2013_-*/_settings/index.number_*';

        // TODO -- make assertion
    }

// %__METHOD__%




}
