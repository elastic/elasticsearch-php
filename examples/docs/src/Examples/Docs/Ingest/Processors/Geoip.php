<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ingest\Processors;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Geoip
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   ingest/processors/geoip.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Geoip extends SimpleExamplesTester {

    /**
     * Tag:  0b6aa8f2d6916951959d6186b25d2b54
     * Line: 45
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL45_0b6aa8f2d6916951959d6186b25d2b54()
    {
        $client = $this->getClient();
        // tag::0b6aa8f2d6916951959d6186b25d2b54[]
        // TODO -- Implement Example
        // PUT _ingest/pipeline/geoip
        // {
        //   "description" : "Add geoip info",
        //   "processors" : [
        //     {
        //       "geoip" : {
        //         "field" : "ip"
        //       }
        //     }
        //   ]
        // }
        // PUT my_index/_doc/my_id?pipeline=geoip
        // {
        //   "ip": "8.8.8.8"
        // }
        // GET my_index/_doc/my_id
        // end::0b6aa8f2d6916951959d6186b25d2b54[]

        $curl = 'PUT _ingest/pipeline/geoip'
              . '{'
              . '  "description" : "Add geoip info",'
              . '  "processors" : ['
              . '    {'
              . '      "geoip" : {'
              . '        "field" : "ip"'
              . '      }'
              . '    }'
              . '  ]'
              . '}'
              . 'PUT my_index/_doc/my_id?pipeline=geoip'
              . '{'
              . '  "ip": "8.8.8.8"'
              . '}'
              . 'GET my_index/_doc/my_id';

        // TODO -- make assertion
    }

    /**
     * Tag:  573a466d7a3a8e31194666e2ecc1d92a
     * Line: 94
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL94_573a466d7a3a8e31194666e2ecc1d92a()
    {
        $client = $this->getClient();
        // tag::573a466d7a3a8e31194666e2ecc1d92a[]
        // TODO -- Implement Example
        // PUT _ingest/pipeline/geoip
        // {
        //   "description" : "Add geoip info",
        //   "processors" : [
        //     {
        //       "geoip" : {
        //         "field" : "ip",
        //         "target_field" : "geo",
        //         "database_file" : "GeoLite2-Country.mmdb"
        //       }
        //     }
        //   ]
        // }
        // PUT my_index/_doc/my_id?pipeline=geoip
        // {
        //   "ip": "8.8.8.8"
        // }
        // GET my_index/_doc/my_id
        // end::573a466d7a3a8e31194666e2ecc1d92a[]

        $curl = 'PUT _ingest/pipeline/geoip'
              . '{'
              . '  "description" : "Add geoip info",'
              . '  "processors" : ['
              . '    {'
              . '      "geoip" : {'
              . '        "field" : "ip",'
              . '        "target_field" : "geo",'
              . '        "database_file" : "GeoLite2-Country.mmdb"'
              . '      }'
              . '    }'
              . '  ]'
              . '}'
              . 'PUT my_index/_doc/my_id?pipeline=geoip'
              . '{'
              . '  "ip": "8.8.8.8"'
              . '}'
              . 'GET my_index/_doc/my_id';

        // TODO -- make assertion
    }

    /**
     * Tag:  c5681f52305e065ef13c3e0ad5393263
     * Line: 147
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL147_c5681f52305e065ef13c3e0ad5393263()
    {
        $client = $this->getClient();
        // tag::c5681f52305e065ef13c3e0ad5393263[]
        // TODO -- Implement Example
        // PUT _ingest/pipeline/geoip
        // {
        //   "description" : "Add geoip info",
        //   "processors" : [
        //     {
        //       "geoip" : {
        //         "field" : "ip"
        //       }
        //     }
        //   ]
        // }
        // PUT my_index/_doc/my_id?pipeline=geoip
        // {
        //   "ip": "80.231.5.0"
        // }
        // GET my_index/_doc/my_id
        // end::c5681f52305e065ef13c3e0ad5393263[]

        $curl = 'PUT _ingest/pipeline/geoip'
              . '{'
              . '  "description" : "Add geoip info",'
              . '  "processors" : ['
              . '    {'
              . '      "geoip" : {'
              . '        "field" : "ip"'
              . '      }'
              . '    }'
              . '  ]'
              . '}'
              . 'PUT my_index/_doc/my_id?pipeline=geoip'
              . '{'
              . '  "ip": "80.231.5.0"'
              . '}'
              . 'GET my_index/_doc/my_id';

        // TODO -- make assertion
    }

    /**
     * Tag:  0737ebaea33631f001fb3f4226948492
     * Line: 198
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL198_0737ebaea33631f001fb3f4226948492()
    {
        $client = $this->getClient();
        // tag::0737ebaea33631f001fb3f4226948492[]
        // TODO -- Implement Example
        // PUT my_ip_locations
        // {
        //   "mappings": {
        //     "properties": {
        //       "geoip": {
        //         "properties": {
        //           "location": { "type": "geo_point" }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::0737ebaea33631f001fb3f4226948492[]

        $curl = 'PUT my_ip_locations'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "geoip": {'
              . '        "properties": {'
              . '          "location": { "type": "geo_point" }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
