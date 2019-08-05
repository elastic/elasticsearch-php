<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Administering;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: BackupClusterConfig
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   administering/backup-cluster-config.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class BackupClusterConfig extends SimpleExamplesTester {

    /**
     * Tag:  ee79edafcbc80dfda496e3a26506dcbc
     * Line: 41
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL41_ee79edafcbc80dfda496e3a26506dcbc()
    {
        $client = $this->getClient();
        // tag::ee79edafcbc80dfda496e3a26506dcbc[]
        // TODO -- Implement Example
        // GET _cluster/settings?pretty&flat_settings&filter_path=persistent
        // end::ee79edafcbc80dfda496e3a26506dcbc[]

        $curl = 'GET _cluster/settings?pretty&flat_settings&filter_path=persistent';

        // TODO -- make assertion
    }

// %__METHOD__%


}
