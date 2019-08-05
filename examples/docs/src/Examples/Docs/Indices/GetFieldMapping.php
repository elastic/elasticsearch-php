<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetFieldMapping
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/get-field-mapping.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetFieldMapping extends SimpleExamplesTester {

    /**
     * Tag:  ba3a852ba26b650bc23be38ecebda5e4
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_ba3a852ba26b650bc23be38ecebda5e4()
    {
        $client = $this->getClient();
        // tag::ba3a852ba26b650bc23be38ecebda5e4[]
        // TODO -- Implement Example
        // PUT publications
        // {
        //     "mappings": {
        //         "properties": {
        //             "id": { "type": "text" },
        //             "title":  { "type": "text"},
        //             "abstract": { "type": "text"},
        //             "author": {
        //                 "properties": {
        //                     "id": { "type": "text" },
        //                     "name": { "type": "text" }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::ba3a852ba26b650bc23be38ecebda5e4[]

        $curl = 'PUT publications'
              . '{'
              . '    "mappings": {'
              . '        "properties": {'
              . '            "id": { "type": "text" },'
              . '            "title":  { "type": "text"},'
              . '            "abstract": { "type": "text"},'
              . '            "author": {'
              . '                "properties": {'
              . '                    "id": { "type": "text" },'
              . '                    "name": { "type": "text" }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  299900fb08da80fe455cf3f1bb7d62ee
     * Line: 35
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL35_299900fb08da80fe455cf3f1bb7d62ee()
    {
        $client = $this->getClient();
        // tag::299900fb08da80fe455cf3f1bb7d62ee[]
        // TODO -- Implement Example
        // GET publications/_mapping/field/title
        // end::299900fb08da80fe455cf3f1bb7d62ee[]

        $curl = 'GET publications/_mapping/field/title';

        // TODO -- make assertion
    }

    /**
     * Tag:  9af393bb38bf098d65d00e7637824f44
     * Line: 72
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL72_9af393bb38bf098d65d00e7637824f44()
    {
        $client = $this->getClient();
        // tag::9af393bb38bf098d65d00e7637824f44[]
        // TODO -- Implement Example
        // GET /twitter,kimchy/_mapping/field/message
        // GET /_all/_mapping/field/message,user.id
        // GET /_all/_mapping/field/*.id
        // end::9af393bb38bf098d65d00e7637824f44[]

        $curl = 'GET /twitter,kimchy/_mapping/field/message'
              . 'GET /_all/_mapping/field/message,user.id'
              . 'GET /_all/_mapping/field/*.id';

        // TODO -- make assertion
    }

    /**
     * Tag:  ed3bdf4d6799b43526851e92b6a60c55
     * Line: 91
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL91_ed3bdf4d6799b43526851e92b6a60c55()
    {
        $client = $this->getClient();
        // tag::ed3bdf4d6799b43526851e92b6a60c55[]
        // TODO -- Implement Example
        // GET publications/_mapping/field/author.id,abstract,name
        // end::ed3bdf4d6799b43526851e92b6a60c55[]

        $curl = 'GET publications/_mapping/field/author.id,abstract,name';

        // TODO -- make assertion
    }

    /**
     * Tag:  b61afb7ca29a11243232ffcc8b5a43cf
     * Line: 128
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL128_b61afb7ca29a11243232ffcc8b5a43cf()
    {
        $client = $this->getClient();
        // tag::b61afb7ca29a11243232ffcc8b5a43cf[]
        // TODO -- Implement Example
        // GET publications/_mapping/field/a*
        // end::b61afb7ca29a11243232ffcc8b5a43cf[]

        $curl = 'GET publications/_mapping/field/a*';

        // TODO -- make assertion
    }

// %__METHOD__%






}
