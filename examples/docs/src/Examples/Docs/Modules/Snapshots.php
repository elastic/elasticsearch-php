<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Modules;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Snapshots
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   modules/snapshots.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Snapshots extends SimpleExamplesTester {

    /**
     * Tag:  92b3749a473cf2e7ff4055316662a4fe
     * Line: 92
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL92_92b3749a473cf2e7ff4055316662a4fe()
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
     * Tag:  ff930e6409b6a923ef1c9e7fc99f24cc
     * Line: 107
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL107_ff930e6409b6a923ef1c9e7fc99f24cc()
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
     * Tag:  b9e4f7a80d21c85f88f578219df8e192
     * Line: 134
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL134_b9e4f7a80d21c85f88f578219df8e192()
    {
        $client = $this->getClient();
        // tag::b9e4f7a80d21c85f88f578219df8e192[]
        // TODO -- Implement Example
        // GET /_snapshot/repo*,*backup*
        // end::b9e4f7a80d21c85f88f578219df8e192[]

        $curl = 'GET /_snapshot/repo*,*backup*';

        // TODO -- make assertion
    }

    /**
     * Tag:  0d754b0d8d13c6d39ea353978dfe5992
     * Line: 143
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL143_0d754b0d8d13c6d39ea353978dfe5992()
    {
        $client = $this->getClient();
        // tag::0d754b0d8d13c6d39ea353978dfe5992[]
        // TODO -- Implement Example
        // GET /_snapshot
        // end::0d754b0d8d13c6d39ea353978dfe5992[]

        $curl = 'GET /_snapshot';

        // TODO -- make assertion
    }

    /**
     * Tag:  37432cda12eb63ce59d186b55233c6e1
     * Line: 151
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL151_37432cda12eb63ce59d186b55233c6e1()
    {
        $client = $this->getClient();
        // tag::37432cda12eb63ce59d186b55233c6e1[]
        // TODO -- Implement Example
        // GET /_snapshot/_all
        // end::37432cda12eb63ce59d186b55233c6e1[]

        $curl = 'GET /_snapshot/_all';

        // TODO -- make assertion
    }

    /**
     * Tag:  44b410249d477c640c127bfc7320e365
     * Line: 184
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL184_44b410249d477c640c127bfc7320e365()
    {
        $client = $this->getClient();
        // tag::44b410249d477c640c127bfc7320e365[]
        // TODO -- Implement Example
        // PUT /_snapshot/my_fs_backup
        // {
        //     "type": "fs",
        //     "settings": {
        //         "location": "/mount/backups/my_fs_backup_location",
        //         "compress": true
        //     }
        // }
        // end::44b410249d477c640c127bfc7320e365[]

        $curl = 'PUT /_snapshot/my_fs_backup'
              . '{'
              . '    "type": "fs",'
              . '    "settings": {'
              . '        "location": "/mount/backups/my_fs_backup_location",'
              . '        "compress": true'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8988215f3a4fc4b7a7ef4a9c5be3391e
     * Line: 201
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL201_8988215f3a4fc4b7a7ef4a9c5be3391e()
    {
        $client = $this->getClient();
        // tag::8988215f3a4fc4b7a7ef4a9c5be3391e[]
        // TODO -- Implement Example
        // PUT /_snapshot/my_fs_backup
        // {
        //     "type": "fs",
        //     "settings": {
        //         "location": "my_fs_backup_location",
        //         "compress": true
        //     }
        // }
        // end::8988215f3a4fc4b7a7ef4a9c5be3391e[]

        $curl = 'PUT /_snapshot/my_fs_backup'
              . '{'
              . '    "type": "fs",'
              . '    "settings": {'
              . '        "location": "my_fs_backup_location",'
              . '        "compress": true'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  98ee9bfa32b64ca22e4338544b36c370
     * Line: 279
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL279_98ee9bfa32b64ca22e4338544b36c370()
    {
        $client = $this->getClient();
        // tag::98ee9bfa32b64ca22e4338544b36c370[]
        // TODO -- Implement Example
        // PUT _snapshot/my_src_only_repository
        // {
        //   "type": "source",
        //   "settings": {
        //     "delegate_type": "fs",
        //     "location": "my_backup_location"
        //   }
        // }
        // end::98ee9bfa32b64ca22e4338544b36c370[]

        $curl = 'PUT _snapshot/my_src_only_repository'
              . '{'
              . '  "type": "source",'
              . '  "settings": {'
              . '    "delegate_type": "fs",'
              . '    "location": "my_backup_location"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f1a7cf532da3a8f9a52a401a90e3a998
     * Line: 309
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL309_f1a7cf532da3a8f9a52a401a90e3a998()
    {
        $client = $this->getClient();
        // tag::f1a7cf532da3a8f9a52a401a90e3a998[]
        // TODO -- Implement Example
        // PUT /_snapshot/my_unverified_backup?verify=false
        // {
        //   "type": "fs",
        //   "settings": {
        //     "location": "my_unverified_backup_location"
        //   }
        // }
        // end::f1a7cf532da3a8f9a52a401a90e3a998[]

        $curl = 'PUT /_snapshot/my_unverified_backup?verify=false'
              . '{'
              . '  "type": "fs",'
              . '  "settings": {'
              . '    "location": "my_unverified_backup_location"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  337cd2c3f9e11665f00786705037f86c
     * Line: 324
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL324_337cd2c3f9e11665f00786705037f86c()
    {
        $client = $this->getClient();
        // tag::337cd2c3f9e11665f00786705037f86c[]
        // TODO -- Implement Example
        // POST /_snapshot/my_unverified_backup/_verify
        // end::337cd2c3f9e11665f00786705037f86c[]

        $curl = 'POST /_snapshot/my_unverified_backup/_verify';

        // TODO -- make assertion
    }

    /**
     * Tag:  2ab78817eacb5030a447e7fac6b91591
     * Line: 341
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL341_2ab78817eacb5030a447e7fac6b91591()
    {
        $client = $this->getClient();
        // tag::2ab78817eacb5030a447e7fac6b91591[]
        // TODO -- Implement Example
        // PUT /_snapshot/my_backup/snapshot_1?wait_for_completion=true
        // end::2ab78817eacb5030a447e7fac6b91591[]

        $curl = 'PUT /_snapshot/my_backup/snapshot_1?wait_for_completion=true';

        // TODO -- make assertion
    }

    /**
     * Tag:  4a0353692bb14c5fccdc97903af0aa13
     * Line: 356
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL356_4a0353692bb14c5fccdc97903af0aa13()
    {
        $client = $this->getClient();
        // tag::4a0353692bb14c5fccdc97903af0aa13[]
        // TODO -- Implement Example
        // PUT /_snapshot/my_backup/snapshot_2?wait_for_completion=true
        // {
        //   "indices": "index_1,index_2",
        //   "ignore_unavailable": true,
        //   "include_global_state": false,
        //   "metadata": {
        //     "taken_by": "kimchy",
        //     "taken_because": "backup before upgrading"
        //   }
        // }
        // end::4a0353692bb14c5fccdc97903af0aa13[]

        $curl = 'PUT /_snapshot/my_backup/snapshot_2?wait_for_completion=true'
              . '{'
              . '  "indices": "index_1,index_2",'
              . '  "ignore_unavailable": true,'
              . '  "include_global_state": false,'
              . '  "metadata": {'
              . '    "taken_by": "kimchy",'
              . '    "taken_because": "backup before upgrading"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7eb0303e39243fbb9bf51a99270cd022
     * Line: 388
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL388_7eb0303e39243fbb9bf51a99270cd022()
    {
        $client = $this->getClient();
        // tag::7eb0303e39243fbb9bf51a99270cd022[]
        // TODO -- Implement Example
        // # PUT /_snapshot/my_backup/<snapshot-{now/d}>
        // PUT /_snapshot/my_backup/%3Csnapshot-%7Bnow%2Fd%7D%3E
        // end::7eb0303e39243fbb9bf51a99270cd022[]

        $curl = '# PUT /_snapshot/my_backup/<snapshot-{now/d}>'
              . 'PUT /_snapshot/my_backup/%3Csnapshot-%7Bnow%2Fd%7D%3E';

        // TODO -- make assertion
    }

    /**
     * Tag:  020c56e520ff6556ebfaf98efaef56aa
     * Line: 419
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL419_020c56e520ff6556ebfaf98efaef56aa()
    {
        $client = $this->getClient();
        // tag::020c56e520ff6556ebfaf98efaef56aa[]
        // TODO -- Implement Example
        // GET /_snapshot/my_backup/snapshot_1
        // end::020c56e520ff6556ebfaf98efaef56aa[]

        $curl = 'GET /_snapshot/my_backup/snapshot_1';

        // TODO -- make assertion
    }

    /**
     * Tag:  0b77ebfb06c63ccbad857b39bb4ff851
     * Line: 457
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL457_0b77ebfb06c63ccbad857b39bb4ff851()
    {
        $client = $this->getClient();
        // tag::0b77ebfb06c63ccbad857b39bb4ff851[]
        // TODO -- Implement Example
        // GET /_snapshot/my_backup/snapshot_*,some_other_snapshot
        // end::0b77ebfb06c63ccbad857b39bb4ff851[]

        $curl = 'GET /_snapshot/my_backup/snapshot_*,some_other_snapshot';

        // TODO -- make assertion
    }

    /**
     * Tag:  fb224f0ae2a03567b6d9b165e7dd24b6
     * Line: 466
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL466_fb224f0ae2a03567b6d9b165e7dd24b6()
    {
        $client = $this->getClient();
        // tag::fb224f0ae2a03567b6d9b165e7dd24b6[]
        // TODO -- Implement Example
        // GET /_snapshot/my_backup/_all
        // end::fb224f0ae2a03567b6d9b165e7dd24b6[]

        $curl = 'GET /_snapshot/my_backup/_all';

        // TODO -- make assertion
    }

    /**
     * Tag:  677fdf84ac97bb107207b6966143144b
     * Line: 486
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL486_677fdf84ac97bb107207b6966143144b()
    {
        $client = $this->getClient();
        // tag::677fdf84ac97bb107207b6966143144b[]
        // TODO -- Implement Example
        // GET /_snapshot/_all
        // GET /_snapshot/my_backup,my_fs_backup
        // GET /_snapshot/my*/snap*
        // end::677fdf84ac97bb107207b6966143144b[]

        $curl = 'GET /_snapshot/_all'
              . 'GET /_snapshot/my_backup,my_fs_backup'
              . 'GET /_snapshot/my*/snap*';

        // TODO -- make assertion
    }

    /**
     * Tag:  155c438e215890cdcb4879eaaadf4046
     * Line: 497
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL497_155c438e215890cdcb4879eaaadf4046()
    {
        $client = $this->getClient();
        // tag::155c438e215890cdcb4879eaaadf4046[]
        // TODO -- Implement Example
        // GET /_snapshot/my_backup/_current
        // end::155c438e215890cdcb4879eaaadf4046[]

        $curl = 'GET /_snapshot/my_backup/_current';

        // TODO -- make assertion
    }

    /**
     * Tag:  0784fbe88299be4f02eaa86368e93203
     * Line: 506
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL506_0784fbe88299be4f02eaa86368e93203()
    {
        $client = $this->getClient();
        // tag::0784fbe88299be4f02eaa86368e93203[]
        // TODO -- Implement Example
        // DELETE /_snapshot/my_backup/snapshot_2
        // end::0784fbe88299be4f02eaa86368e93203[]

        $curl = 'DELETE /_snapshot/my_backup/snapshot_2';

        // TODO -- make assertion
    }

    /**
     * Tag:  2b8d2065be3002b0be26598d6ad803a6
     * Line: 521
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL521_2b8d2065be3002b0be26598d6ad803a6()
    {
        $client = $this->getClient();
        // tag::2b8d2065be3002b0be26598d6ad803a6[]
        // TODO -- Implement Example
        // DELETE /_snapshot/my_backup
        // end::2b8d2065be3002b0be26598d6ad803a6[]

        $curl = 'DELETE /_snapshot/my_backup';

        // TODO -- make assertion
    }

    /**
     * Tag:  853ca73db9b596cc4ddda66b3ec8faa2
     * Line: 537
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL537_853ca73db9b596cc4ddda66b3ec8faa2()
    {
        $client = $this->getClient();
        // tag::853ca73db9b596cc4ddda66b3ec8faa2[]
        // TODO -- Implement Example
        // POST /_snapshot/my_backup/snapshot_1/_restore
        // end::853ca73db9b596cc4ddda66b3ec8faa2[]

        $curl = 'POST /_snapshot/my_backup/snapshot_1/_restore';

        // TODO -- make assertion
    }

    /**
     * Tag:  47dcf95e3d398b9bdcb0a483f705bb4b
     * Line: 556
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL556_47dcf95e3d398b9bdcb0a483f705bb4b()
    {
        $client = $this->getClient();
        // tag::47dcf95e3d398b9bdcb0a483f705bb4b[]
        // TODO -- Implement Example
        // POST /_snapshot/my_backup/snapshot_1/_restore
        // {
        //   "indices": "index_1,index_2",
        //   "ignore_unavailable": true,
        //   "include_global_state": true,
        //   "rename_pattern": "index_(.+)",
        //   "rename_replacement": "restored_index_$1"
        // }
        // end::47dcf95e3d398b9bdcb0a483f705bb4b[]

        $curl = 'POST /_snapshot/my_backup/snapshot_1/_restore'
              . '{'
              . '  "indices": "index_1,index_2",'
              . '  "ignore_unavailable": true,'
              . '  "include_global_state": true,'
              . '  "rename_pattern": "index_(.+)",'
              . '  "rename_replacement": "restored_index_$1"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  79ecb7594b3e55df3e28149beff222f6
     * Line: 595
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL595_79ecb7594b3e55df3e28149beff222f6()
    {
        $client = $this->getClient();
        // tag::79ecb7594b3e55df3e28149beff222f6[]
        // TODO -- Implement Example
        // POST /_snapshot/my_backup/snapshot_1/_restore
        // {
        //   "indices": "index_1",
        //   "index_settings": {
        //     "index.number_of_replicas": 0
        //   },
        //   "ignore_index_settings": [
        //     "index.refresh_interval"
        //   ]
        // }
        // end::79ecb7594b3e55df3e28149beff222f6[]

        $curl = 'POST /_snapshot/my_backup/snapshot_1/_restore'
              . '{'
              . '  "indices": "index_1",'
              . '  "index_settings": {'
              . '    "index.number_of_replicas": 0'
              . '  },'
              . '  "ignore_index_settings": ['
              . '    "index.refresh_interval"'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1ae301364751c376b3d26581a36d8975
     * Line: 640
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL640_1ae301364751c376b3d26581a36d8975()
    {
        $client = $this->getClient();
        // tag::1ae301364751c376b3d26581a36d8975[]
        // TODO -- Implement Example
        // GET /_snapshot/_status
        // end::1ae301364751c376b3d26581a36d8975[]

        $curl = 'GET /_snapshot/_status';

        // TODO -- make assertion
    }

    /**
     * Tag:  db1913b97109b86cfc5efc7cfcd65d93
     * Line: 650
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL650_db1913b97109b86cfc5efc7cfcd65d93()
    {
        $client = $this->getClient();
        // tag::db1913b97109b86cfc5efc7cfcd65d93[]
        // TODO -- Implement Example
        // GET /_snapshot/my_backup/_status
        // end::db1913b97109b86cfc5efc7cfcd65d93[]

        $curl = 'GET /_snapshot/my_backup/_status';

        // TODO -- make assertion
    }

    /**
     * Tag:  e566ca0098be82a2847c17069711a822
     * Line: 660
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL660_e566ca0098be82a2847c17069711a822()
    {
        $client = $this->getClient();
        // tag::e566ca0098be82a2847c17069711a822[]
        // TODO -- Implement Example
        // GET /_snapshot/my_backup/snapshot_1/_status
        // end::e566ca0098be82a2847c17069711a822[]

        $curl = 'GET /_snapshot/my_backup/snapshot_1/_status';

        // TODO -- make assertion
    }

    /**
     * Tag:  2432f86346177533cabdabbd4eb41b30
     * Line: 717
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL717_2432f86346177533cabdabbd4eb41b30()
    {
        $client = $this->getClient();
        // tag::2432f86346177533cabdabbd4eb41b30[]
        // TODO -- Implement Example
        // GET /_snapshot/my_backup/snapshot_1,snapshot_2/_status
        // end::2432f86346177533cabdabbd4eb41b30[]

        $curl = 'GET /_snapshot/my_backup/snapshot_1,snapshot_2/_status';

        // TODO -- make assertion
    }

    /**
     * Tag:  020c56e520ff6556ebfaf98efaef56aa
     * Line: 734
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL734_020c56e520ff6556ebfaf98efaef56aa()
    {
        $client = $this->getClient();
        // tag::020c56e520ff6556ebfaf98efaef56aa[]
        // TODO -- Implement Example
        // GET /_snapshot/my_backup/snapshot_1
        // end::020c56e520ff6556ebfaf98efaef56aa[]

        $curl = 'GET /_snapshot/my_backup/snapshot_1';

        // TODO -- make assertion
    }

    /**
     * Tag:  e566ca0098be82a2847c17069711a822
     * Line: 747
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL747_e566ca0098be82a2847c17069711a822()
    {
        $client = $this->getClient();
        // tag::e566ca0098be82a2847c17069711a822[]
        // TODO -- Implement Example
        // GET /_snapshot/my_backup/snapshot_1/_status
        // end::e566ca0098be82a2847c17069711a822[]

        $curl = 'GET /_snapshot/my_backup/snapshot_1/_status';

        // TODO -- make assertion
    }

    /**
     * Tag:  86c723fc6212d34166661e7dac223491
     * Line: 777
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL777_86c723fc6212d34166661e7dac223491()
    {
        $client = $this->getClient();
        // tag::86c723fc6212d34166661e7dac223491[]
        // TODO -- Implement Example
        // DELETE /_snapshot/my_backup/snapshot_1
        // end::86c723fc6212d34166661e7dac223491[]

        $curl = 'DELETE /_snapshot/my_backup/snapshot_1';

        // TODO -- make assertion
    }

// %__METHOD__%































}
