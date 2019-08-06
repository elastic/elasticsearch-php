<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Setup\Sysconfig;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: FileDescriptors
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   setup/sysconfig/file-descriptors.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class FileDescriptors extends SimpleExamplesTester {

    /**
     * Tag:  c5bc577ff92f889225b0d2617adcb48c
     * Line: 29
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL29_c5bc577ff92f889225b0d2617adcb48c()
    {
        $client = $this->getClient();
        // tag::c5bc577ff92f889225b0d2617adcb48c[]
        // TODO -- Implement Example
        // GET _nodes/stats/process?filter_path=**.max_file_descriptors
        // end::c5bc577ff92f889225b0d2617adcb48c[]

        $curl = 'GET _nodes/stats/process?filter_path=**.max_file_descriptors';

        // TODO -- make assertion
    }

// %__METHOD__%


}
