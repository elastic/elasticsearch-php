<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Administering;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: BackupAndRestoreSecurityConfig
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   administering/backup-and-restore-security-config.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class BackupAndRestoreSecurityConfig extends SimpleExamplesTester {

    /**
     * Tag:  92b3749a473cf2e7ff4055316662a4fe
     * Line: 79
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL79_92b3749a473cf2e7ff4055316662a4fe()
    {
        $client = $this->getClient();
        // tag::92b3749a473cf2e7ff4055316662a4fe[]
        // TODO -- Implement Example
        // PUT /_snapshot/my_backup
        // {
        //   "type": "fs",
        //   "settings": {
        //     "location": "my_backup_location"
        //   }
        // }
        // end::92b3749a473cf2e7ff4055316662a4fe[]

        $curl = 'PUT /_snapshot/my_backup'
              . '{'
              . '  "type": "fs",'
              . '  "settings": {'
              . '    "location": "my_backup_location"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  43a7b43711eab81ad093e67ecc221327
     * Line: 103
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL103_43a7b43711eab81ad093e67ecc221327()
    {
        $client = $this->getClient();
        // tag::43a7b43711eab81ad093e67ecc221327[]
        // TODO -- Implement Example
        // POST /_security/user/snapshot_user
        // {
        //   "password" : "secret",
        //   "roles" : [ "snapshot_user" ]
        // }
        // end::43a7b43711eab81ad093e67ecc221327[]

        $curl = 'POST /_security/user/snapshot_user'
              . '{'
              . '  "password" : "secret",'
              . '  "roles" : [ "snapshot_user" ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7acf1099282366553cb8b093ed4fcd00
     * Line: 122
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL122_7acf1099282366553cb8b093ed4fcd00()
    {
        $client = $this->getClient();
        // tag::7acf1099282366553cb8b093ed4fcd00[]
        // TODO -- Implement Example
        // PUT /_snapshot/my_backup/snapshot_1
        // {
        //   "indices": ".security",
        //   "include_global_state": true \<1>
        // }
        // end::7acf1099282366553cb8b093ed4fcd00[]

        $curl = 'PUT /_snapshot/my_backup/snapshot_1'
              . '{'
              . '  "indices": ".security",'
              . '  "include_global_state": true \<1>'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ff930e6409b6a923ef1c9e7fc99f24cc
     * Line: 193
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL193_ff930e6409b6a923ef1c9e7fc99f24cc()
    {
        $client = $this->getClient();
        // tag::ff930e6409b6a923ef1c9e7fc99f24cc[]
        // TODO -- Implement Example
        // GET /_snapshot/my_backup
        // end::ff930e6409b6a923ef1c9e7fc99f24cc[]

        $curl = 'GET /_snapshot/my_backup';

        // TODO -- make assertion
    }

    /**
     * Tag:  020c56e520ff6556ebfaf98efaef56aa
     * Line: 200
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL200_020c56e520ff6556ebfaf98efaef56aa()
    {
        $client = $this->getClient();
        // tag::020c56e520ff6556ebfaf98efaef56aa[]
        // TODO -- Implement Example
        // GET /_snapshot/my_backup/snapshot_1
        // end::020c56e520ff6556ebfaf98efaef56aa[]

        $curl = 'GET /_snapshot/my_backup/snapshot_1';

        // TODO -- make assertion
    }

// %__METHOD__%






}
