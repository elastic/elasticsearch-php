<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Watcher;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: AckWatch
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/watcher/ack-watch.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class AckWatch extends SimpleExamplesTester {

    /**
     * Tag:  7a1b94de1cbb90b0f06ff8631a70236a
     * Line: 47
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL47_7a1b94de1cbb90b0f06ff8631a70236a()
    {
        $client = $this->getClient();
        // tag::7a1b94de1cbb90b0f06ff8631a70236a[]
        // TODO -- Implement Example
        // PUT _watcher/watch/my_watch
        // {
        //   "trigger": {
        //     "schedule": {
        //       "hourly": {
        //         "minute": [ 0, 5 ]
        //       }
        //     }
        //   },
        //   "input": {
        //     "simple": {
        //       "payload": {
        //         "send": "yes"
        //       }
        //     }
        //   },
        //   "condition": {
        //     "always": {}
        //   },
        //   "actions": {
        //     "test_index": {
        //       "throttle_period": "15m",
        //       "index": {
        //         "index": "test"
        //       }
        //     }
        //   }
        // }
        // end::7a1b94de1cbb90b0f06ff8631a70236a[]

        $curl = 'PUT _watcher/watch/my_watch'
              . '{'
              . '  "trigger": {'
              . '    "schedule": {'
              . '      "hourly": {'
              . '        "minute": [ 0, 5 ]'
              . '      }'
              . '    }'
              . '  },'
              . '  "input": {'
              . '    "simple": {'
              . '      "payload": {'
              . '        "send": "yes"'
              . '      }'
              . '    }'
              . '  },'
              . '  "condition": {'
              . '    "always": {}'
              . '  },'
              . '  "actions": {'
              . '    "test_index": {'
              . '      "throttle_period": "15m",'
              . '      "index": {'
              . '        "index": "test"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e827a9040e137410d62d10bb3b3cbb71
     * Line: 84
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL84_e827a9040e137410d62d10bb3b3cbb71()
    {
        $client = $this->getClient();
        // tag::e827a9040e137410d62d10bb3b3cbb71[]
        // TODO -- Implement Example
        // GET _watcher/watch/my_watch
        // end::e827a9040e137410d62d10bb3b3cbb71[]

        $curl = 'GET _watcher/watch/my_watch';

        // TODO -- make assertion
    }

    /**
     * Tag:  bdc1afd2181154bb78797360f9dbb1a0
     * Line: 123
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL123_bdc1afd2181154bb78797360f9dbb1a0()
    {
        $client = $this->getClient();
        // tag::bdc1afd2181154bb78797360f9dbb1a0[]
        // TODO -- Implement Example
        // POST _watcher/watch/my_watch/_execute
        // {
        //   "record_execution" : true
        // }
        // GET _watcher/watch/my_watch
        // end::bdc1afd2181154bb78797360f9dbb1a0[]

        $curl = 'POST _watcher/watch/my_watch/_execute'
              . '{'
              . '  "record_execution" : true'
              . '}'
              . 'GET _watcher/watch/my_watch';

        // TODO -- make assertion
    }

    /**
     * Tag:  1b0dc9d076bbb58c6a2953ef4323d2fc
     * Line: 180
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL180_1b0dc9d076bbb58c6a2953ef4323d2fc()
    {
        $client = $this->getClient();
        // tag::1b0dc9d076bbb58c6a2953ef4323d2fc[]
        // TODO -- Implement Example
        // PUT _watcher/watch/my_watch/_ack/test_index
        // GET _watcher/watch/my_watch
        // end::1b0dc9d076bbb58c6a2953ef4323d2fc[]

        $curl = 'PUT _watcher/watch/my_watch/_ack/test_index'
              . 'GET _watcher/watch/my_watch';

        // TODO -- make assertion
    }

    /**
     * Tag:  8051766cadded0892290bc2cc06e145c
     * Line: 236
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL236_8051766cadded0892290bc2cc06e145c()
    {
        $client = $this->getClient();
        // tag::8051766cadded0892290bc2cc06e145c[]
        // TODO -- Implement Example
        // POST _watcher/watch/my_watch/_ack/action1,action2
        // end::8051766cadded0892290bc2cc06e145c[]

        $curl = 'POST _watcher/watch/my_watch/_ack/action1,action2';

        // TODO -- make assertion
    }

    /**
     * Tag:  df7dbac966b67404b8bfa9cdda5ef480
     * Line: 245
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL245_df7dbac966b67404b8bfa9cdda5ef480()
    {
        $client = $this->getClient();
        // tag::df7dbac966b67404b8bfa9cdda5ef480[]
        // TODO -- Implement Example
        // POST _watcher/watch/my_watch/_ack
        // end::df7dbac966b67404b8bfa9cdda5ef480[]

        $curl = 'POST _watcher/watch/my_watch/_ack';

        // TODO -- make assertion
    }

// %__METHOD__%







}
