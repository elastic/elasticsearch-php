<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ccr\Apis\Auto-follow;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeleteAutoFollowPattern
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ccr/apis/auto-follow/delete-auto-follow-pattern.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeleteAutoFollowPattern extends SimpleExamplesTester {

    /**
     * Tag:  2f2580ea420e1836d922fe48fa8ada97
     * Line: 35
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL35_2f2580ea420e1836d922fe48fa8ada97()
    {
        $client = $this->getClient();
        // tag::2f2580ea420e1836d922fe48fa8ada97[]
        // TODO -- Implement Example
        // DELETE /_ccr/auto_follow/<auto_follow_pattern_name>
        // end::2f2580ea420e1836d922fe48fa8ada97[]

        $curl = 'DELETE /_ccr/auto_follow/<auto_follow_pattern_name>';

        // TODO -- make assertion
    }

    /**
     * Tag:  d4ef6ac034c4d42cb75d830ec69146e6
     * Line: 68
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL68_d4ef6ac034c4d42cb75d830ec69146e6()
    {
        $client = $this->getClient();
        // tag::d4ef6ac034c4d42cb75d830ec69146e6[]
        // TODO -- Implement Example
        // DELETE /_ccr/auto_follow/my_auto_follow_pattern
        // end::d4ef6ac034c4d42cb75d830ec69146e6[]

        $curl = 'DELETE /_ccr/auto_follow/my_auto_follow_pattern';

        // TODO -- make assertion
    }

// %__METHOD__%



}
