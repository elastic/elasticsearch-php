<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Migration\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Deprecation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   migration/apis/deprecation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Deprecation extends SimpleExamplesTester {

    /**
     * Tag:  135819da3a4bde684357c57a49ad8e85
     * Line: 35
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL35_135819da3a4bde684357c57a49ad8e85()
    {
        $client = $this->getClient();
        // tag::135819da3a4bde684357c57a49ad8e85[]
        // TODO -- Implement Example
        // GET /_migration/deprecations
        // end::135819da3a4bde684357c57a49ad8e85[]

        $curl = 'GET /_migration/deprecations';

        // TODO -- make assertion
    }

    /**
     * Tag:  69f8b0f2a9ba47e11f363d788cee9d6d
     * Line: 114
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL114_69f8b0f2a9ba47e11f363d788cee9d6d()
    {
        $client = $this->getClient();
        // tag::69f8b0f2a9ba47e11f363d788cee9d6d[]
        // TODO -- Implement Example
        // GET /logstash-*/_migration/deprecations
        // end::69f8b0f2a9ba47e11f363d788cee9d6d[]

        $curl = 'GET /logstash-*/_migration/deprecations';

        // TODO -- make assertion
    }

// %__METHOD__%



}
