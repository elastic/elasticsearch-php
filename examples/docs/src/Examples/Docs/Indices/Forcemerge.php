<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Forcemerge
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/forcemerge.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Forcemerge extends SimpleExamplesTester {

    /**
     * Tag:  ca16c1f060ca653ea8fbca445359f78f
     * Line: 24
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL24_ca16c1f060ca653ea8fbca445359f78f()
    {
        $client = $this->getClient();
        // tag::ca16c1f060ca653ea8fbca445359f78f[]
        // TODO -- Implement Example
        // POST /twitter/_forcemerge
        // end::ca16c1f060ca653ea8fbca445359f78f[]

        $curl = 'POST /twitter/_forcemerge';

        // TODO -- make assertion
    }

    /**
     * Tag:  64d97cda667be166f3df49e87e713560
     * Line: 36
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL36_64d97cda667be166f3df49e87e713560()
    {
        $client = $this->getClient();
        // tag::64d97cda667be166f3df49e87e713560[]
        // TODO -- Implement Example
        // POST /logs-000001/_forcemerge?max_num_segments=1
        // end::64d97cda667be166f3df49e87e713560[]

        $curl = 'POST /logs-000001/_forcemerge?max_num_segments=1';

        // TODO -- make assertion
    }

    /**
     * Tag:  e5ee4be6e45c99c270b2c3fdf1a061ab
     * Line: 68
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL68_e5ee4be6e45c99c270b2c3fdf1a061ab()
    {
        $client = $this->getClient();
        // tag::e5ee4be6e45c99c270b2c3fdf1a061ab[]
        // TODO -- Implement Example
        // POST /kimchy/_forcemerge?only_expunge_deletes=false&max_num_segments=100&flush=true
        // end::e5ee4be6e45c99c270b2c3fdf1a061ab[]

        $curl = 'POST /kimchy/_forcemerge?only_expunge_deletes=false&max_num_segments=100&flush=true';

        // TODO -- make assertion
    }

    /**
     * Tag:  9e6b6b784ba8931563dd04a5922098ba
     * Line: 86
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL86_9e6b6b784ba8931563dd04a5922098ba()
    {
        $client = $this->getClient();
        // tag::9e6b6b784ba8931563dd04a5922098ba[]
        // TODO -- Implement Example
        // POST /kimchy,elasticsearch/_forcemerge
        // POST /_forcemerge
        // end::9e6b6b784ba8931563dd04a5922098ba[]

        $curl = 'POST /kimchy,elasticsearch/_forcemerge'
              . 'POST /_forcemerge';

        // TODO -- make assertion
    }

// %__METHOD__%





}
