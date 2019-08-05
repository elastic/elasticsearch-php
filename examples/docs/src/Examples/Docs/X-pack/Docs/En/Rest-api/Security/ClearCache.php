<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ClearCache
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/security/clear-cache.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ClearCache extends SimpleExamplesTester {

    /**
     * Tag:  a5e2b3588258430f2e595abda98e3943
     * Line: 42
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL42_a5e2b3588258430f2e595abda98e3943()
    {
        $client = $this->getClient();
        // tag::a5e2b3588258430f2e595abda98e3943[]
        // TODO -- Implement Example
        // POST /_security/realm/default_file/_clear_cache
        // end::a5e2b3588258430f2e595abda98e3943[]

        $curl = 'POST /_security/realm/default_file/_clear_cache';

        // TODO -- make assertion
    }

    /**
     * Tag:  c1409f591a01589638d9b00436ce42c0
     * Line: 50
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL50_c1409f591a01589638d9b00436ce42c0()
    {
        $client = $this->getClient();
        // tag::c1409f591a01589638d9b00436ce42c0[]
        // TODO -- Implement Example
        // POST /_security/realm/default_file/_clear_cache?usernames=rdeniro,alpacino
        // end::c1409f591a01589638d9b00436ce42c0[]

        $curl = 'POST /_security/realm/default_file/_clear_cache?usernames=rdeniro,alpacino';

        // TODO -- make assertion
    }

    /**
     * Tag:  00272f75a6afea91f8554ef7cda0c1f2
     * Line: 59
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL59_00272f75a6afea91f8554ef7cda0c1f2()
    {
        $client = $this->getClient();
        // tag::00272f75a6afea91f8554ef7cda0c1f2[]
        // TODO -- Implement Example
        // POST /_security/realm/default_file,ldap1/_clear_cache
        // end::00272f75a6afea91f8554ef7cda0c1f2[]

        $curl = 'POST /_security/realm/default_file,ldap1/_clear_cache';

        // TODO -- make assertion
    }

// %__METHOD__%




}
