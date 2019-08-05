<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cat;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Nodeattrs
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cat/nodeattrs.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Nodeattrs extends SimpleExamplesTester {

    /**
     * Tag:  e20e2e6f949ac660a77840a9263fadef
     * Line: 8
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL8_e20e2e6f949ac660a77840a9263fadef()
    {
        $client = $this->getClient();
        // tag::e20e2e6f949ac660a77840a9263fadef[]
        // TODO -- Implement Example
        // GET /_cat/nodeattrs?v
        // end::e20e2e6f949ac660a77840a9263fadef[]

        $curl = 'GET /_cat/nodeattrs?v';

        // TODO -- make assertion
    }

    /**
     * Tag:  0c69c638073cc8518187b678dd33443c
     * Line: 53
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL53_0c69c638073cc8518187b678dd33443c()
    {
        $client = $this->getClient();
        // tag::0c69c638073cc8518187b678dd33443c[]
        // TODO -- Implement Example
        // GET /_cat/nodeattrs?v&h=name,pid,attr,value
        // end::0c69c638073cc8518187b678dd33443c[]

        $curl = 'GET /_cat/nodeattrs?v&h=name,pid,attr,value';

        // TODO -- make assertion
    }

// %__METHOD__%



}
