<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ilm;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GettingStartedSlm
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ilm/getting-started-slm.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GettingStartedSlm extends SimpleExamplesTester {

    /**
     * Tag:  718c2afdece55a7de338e668438eac2d
     * Line: 23
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL23_718c2afdece55a7de338e668438eac2d()
    {
        $client = $this->getClient();
        // tag::718c2afdece55a7de338e668438eac2d[]
        // TODO -- Implement Example
        // POST /_security/role/slm-admin
        // {
        //   "cluster": ["manage_slm", "create_snapshot"],
        //   "indices": [
        //     {
        //       "names": [".slm-history-*"],
        //       "privileges": ["all"]
        //     }
        //   ]
        // }
        // end::718c2afdece55a7de338e668438eac2d[]

        $curl = 'POST /_security/role/slm-admin'
              . '{'
              . '  "cluster": ["manage_slm", "create_snapshot"],'
              . '  "indices": ['
              . '    {'
              . '      "names": [".slm-history-*"],'
              . '      "privileges": ["all"]'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ef76d0e4cdc2881c161a5557a98a3446
     * Line: 42
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL42_ef76d0e4cdc2881c161a5557a98a3446()
    {
        $client = $this->getClient();
        // tag::ef76d0e4cdc2881c161a5557a98a3446[]
        // TODO -- Implement Example
        // POST /_security/role/slm-read-only
        // {
        //   "cluster": ["read_slm"],
        //   "indices": [
        //     {
        //       "names": [".slm-history-*"],
        //       "privileges": ["read"]
        //     }
        //   ]
        // }
        // end::ef76d0e4cdc2881c161a5557a98a3446[]

        $curl = 'POST /_security/role/slm-read-only'
              . '{'
              . '  "cluster": ["read_slm"],'
              . '  "indices": ['
              . '    {'
              . '      "names": [".slm-history-*"],'
              . '      "privileges": ["read"]'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  89b72dd7f747f6297c2b089e8bc807be
     * Line: 68
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL68_89b72dd7f747f6297c2b089e8bc807be()
    {
        $client = $this->getClient();
        // tag::89b72dd7f747f6297c2b089e8bc807be[]
        // TODO -- Implement Example
        // PUT /_snapshot/my_repository
        // {
        //   "type": "fs",
        //   "settings": {
        //     "location": "my_backup_location"
        //   }
        // }
        // end::89b72dd7f747f6297c2b089e8bc807be[]

        $curl = 'PUT /_snapshot/my_repository'
              . '{'
              . '  "type": "fs",'
              . '  "settings": {'
              . '    "location": "my_backup_location"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a5bc83a268ea9c8b4368beb6522b5336
     * Line: 90
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL90_a5bc83a268ea9c8b4368beb6522b5336()
    {
        $client = $this->getClient();
        // tag::a5bc83a268ea9c8b4368beb6522b5336[]
        // TODO -- Implement Example
        // PUT /_slm/policy/nightly-snapshots
        // {
        //   "schedule": "0 30 1 * * ?", \<1>
        //   "name": "<nightly-snap-{now/d}>", \<2>
        //   "repository": "my_repository", \<3>
        //   "config": { \<4>
        //     "indices": ["*"] \<5>
        //   }
        // }
        // end::a5bc83a268ea9c8b4368beb6522b5336[]

        $curl = 'PUT /_slm/policy/nightly-snapshots'
              . '{'
              . '  "schedule": "0 30 1 * * ?", \<1>'
              . '  "name": "<nightly-snap-{now/d}>", \<2>'
              . '  "repository": "my_repository", \<3>'
              . '  "config": { \<4>'
              . '    "indices": ["*"] \<5>'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5bf4b2d603221fb1df4adb34829e1164
     * Line: 138
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL138_5bf4b2d603221fb1df4adb34829e1164()
    {
        $client = $this->getClient();
        // tag::5bf4b2d603221fb1df4adb34829e1164[]
        // TODO -- Implement Example
        // PUT /_slm/policy/nightly-snapshots/_execute
        // end::5bf4b2d603221fb1df4adb34829e1164[]

        $curl = 'PUT /_slm/policy/nightly-snapshots/_execute';

        // TODO -- make assertion
    }

    /**
     * Tag:  f1b545d3c3eeedf8ae09c56070c26053
     * Line: 151
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL151_f1b545d3c3eeedf8ae09c56070c26053()
    {
        $client = $this->getClient();
        // tag::f1b545d3c3eeedf8ae09c56070c26053[]
        // TODO -- Implement Example
        // GET /_slm/policy/nightly-snapshots?human
        // end::f1b545d3c3eeedf8ae09c56070c26053[]

        $curl = 'GET /_slm/policy/nightly-snapshots?human';

        // TODO -- make assertion
    }

// %__METHOD__%







}
