<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ilm;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: StartStopIlm
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ilm/start-stop-ilm.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class StartStopIlm extends SimpleExamplesTester {

    /**
     * Tag:  182df084f028479ecbe8d7648ddad892
     * Line: 57
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL57_182df084f028479ecbe8d7648ddad892()
    {
        $client = $this->getClient();
        // tag::182df084f028479ecbe8d7648ddad892[]
        // TODO -- Implement Example
        // GET _ilm/status
        // end::182df084f028479ecbe8d7648ddad892[]

        $curl = 'GET _ilm/status';

        // TODO -- make assertion
    }

    /**
     * Tag:  99e0bec31e49636bc0053ac66bc29352
     * Line: 65
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL65_99e0bec31e49636bc0053ac66bc29352()
    {
        $client = $this->getClient();
        // tag::99e0bec31e49636bc0053ac66bc29352[]
        // TODO -- Implement Example
        // {
        //   "operation_mode": "RUNNING"
        // }
        // end::99e0bec31e49636bc0053ac66bc29352[]

        $curl = '{'
              . '  "operation_mode": "RUNNING"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  585a34ad79aee16678b37da785933ac8
     * Line: 92
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL92_585a34ad79aee16678b37da785933ac8()
    {
        $client = $this->getClient();
        // tag::585a34ad79aee16678b37da785933ac8[]
        // TODO -- Implement Example
        // POST _ilm/stop
        // end::585a34ad79aee16678b37da785933ac8[]

        $curl = 'POST _ilm/stop';

        // TODO -- make assertion
    }

    /**
     * Tag:  8de1c258461189d65cba97dbc94600cd
     * Line: 111
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL111_8de1c258461189d65cba97dbc94600cd()
    {
        $client = $this->getClient();
        // tag::8de1c258461189d65cba97dbc94600cd[]
        // TODO -- Implement Example
        // {
        //   "operation_mode": "STOPPING"
        // }
        // end::8de1c258461189d65cba97dbc94600cd[]

        $curl = '{'
              . '  "operation_mode": "STOPPING"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  db8563ab7fe37081a9bb66c91d65d673
     * Line: 135
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL135_db8563ab7fe37081a9bb66c91d65d673()
    {
        $client = $this->getClient();
        // tag::db8563ab7fe37081a9bb66c91d65d673[]
        // TODO -- Implement Example
        // {
        //   "operation_mode": "STOPPED"
        // }
        // end::db8563ab7fe37081a9bb66c91d65d673[]

        $curl = '{'
              . '  "operation_mode": "STOPPED"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  72ae3851160fcf02b8e2cdfd4e57d238
     * Line: 150
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL150_72ae3851160fcf02b8e2cdfd4e57d238()
    {
        $client = $this->getClient();
        // tag::72ae3851160fcf02b8e2cdfd4e57d238[]
        // TODO -- Implement Example
        // POST _ilm/start
        // end::72ae3851160fcf02b8e2cdfd4e57d238[]

        $curl = 'POST _ilm/start';

        // TODO -- make assertion
    }

    /**
     * Tag:  99e0bec31e49636bc0053ac66bc29352
     * Line: 169
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL169_99e0bec31e49636bc0053ac66bc29352()
    {
        $client = $this->getClient();
        // tag::99e0bec31e49636bc0053ac66bc29352[]
        // TODO -- Implement Example
        // {
        //   "operation_mode": "RUNNING"
        // }
        // end::99e0bec31e49636bc0053ac66bc29352[]

        $curl = '{'
              . '  "operation_mode": "RUNNING"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%








}
