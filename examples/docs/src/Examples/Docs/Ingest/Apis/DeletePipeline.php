<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ingest\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeletePipeline
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   ingest/apis/delete-pipeline.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeletePipeline extends SimpleExamplesTester {

    /**
     * Tag:  a05925031c1bfbb10c4ef6e5b678e20a
     * Line: 29
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL29_a05925031c1bfbb10c4ef6e5b678e20a()
    {
        $client = $this->getClient();
        // tag::a05925031c1bfbb10c4ef6e5b678e20a[]
        // TODO -- Implement Example
        // DELETE _ingest/pipeline/my-pipeline-id
        // end::a05925031c1bfbb10c4ef6e5b678e20a[]

        $curl = 'DELETE _ingest/pipeline/my-pipeline-id';

        // TODO -- make assertion
    }

    /**
     * Tag:  6ae6a398b979af8231cf6753a9a73f99
     * Line: 64
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL64_6ae6a398b979af8231cf6753a9a73f99()
    {
        $client = $this->getClient();
        // tag::6ae6a398b979af8231cf6753a9a73f99[]
        // TODO -- Implement Example
        // DELETE _ingest/pipeline/*
        // end::6ae6a398b979af8231cf6753a9a73f99[]

        $curl = 'DELETE _ingest/pipeline/*';

        // TODO -- make assertion
    }

// %__METHOD__%



}
