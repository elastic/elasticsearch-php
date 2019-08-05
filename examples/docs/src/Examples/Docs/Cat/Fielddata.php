<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cat;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Fielddata
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cat/fielddata.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Fielddata extends SimpleExamplesTester {

    /**
     * Tag:  b26ff669b3c88fb0872fa0a923972f54
     * Line: 40
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL40_b26ff669b3c88fb0872fa0a923972f54()
    {
        $client = $this->getClient();
        // tag::b26ff669b3c88fb0872fa0a923972f54[]
        // TODO -- Implement Example
        // GET /_cat/fielddata?v
        // end::b26ff669b3c88fb0872fa0a923972f54[]

        $curl = 'GET /_cat/fielddata?v';

        // TODO -- make assertion
    }

    /**
     * Tag:  973f2d7fbff9f310b21108b31d7ad413
     * Line: 60
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL60_973f2d7fbff9f310b21108b31d7ad413()
    {
        $client = $this->getClient();
        // tag::973f2d7fbff9f310b21108b31d7ad413[]
        // TODO -- Implement Example
        // GET /_cat/fielddata?v&fields=body
        // end::973f2d7fbff9f310b21108b31d7ad413[]

        $curl = 'GET /_cat/fielddata?v&fields=body';

        // TODO -- make assertion
    }

    /**
     * Tag:  62daf8e41b9e984d18d6cc51f247c7ad
     * Line: 79
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL79_62daf8e41b9e984d18d6cc51f247c7ad()
    {
        $client = $this->getClient();
        // tag::62daf8e41b9e984d18d6cc51f247c7ad[]
        // TODO -- Implement Example
        // GET /_cat/fielddata/body,soul?v
        // end::62daf8e41b9e984d18d6cc51f247c7ad[]

        $curl = 'GET /_cat/fielddata/body,soul?v';

        // TODO -- make assertion
    }

// %__METHOD__%




}
