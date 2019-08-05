<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: UpdateSettings
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/update-settings.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class UpdateSettings extends SimpleExamplesTester {

    /**
     * Tag:  8653e76676de5d327201b77512afa3a0
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_8653e76676de5d327201b77512afa3a0()
    {
        $client = $this->getClient();
        // tag::8653e76676de5d327201b77512afa3a0[]
        // TODO -- Implement Example
        // PUT /twitter/_settings
        // {
        //     "index" : {
        //         "number_of_replicas" : 2
        //     }
        // }
        // end::8653e76676de5d327201b77512afa3a0[]

        $curl = 'PUT /twitter/_settings'
              . '{'
              . '    "index" : {'
              . '        "number_of_replicas" : 2'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  42744a175125df5be0ef77413bf8f608
     * Line: 25
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL25_42744a175125df5be0ef77413bf8f608()
    {
        $client = $this->getClient();
        // tag::42744a175125df5be0ef77413bf8f608[]
        // TODO -- Implement Example
        // PUT /twitter/_settings
        // {
        //     "index" : {
        //         "refresh_interval" : null
        //     }
        // }
        // end::42744a175125df5be0ef77413bf8f608[]

        $curl = 'PUT /twitter/_settings'
              . '{'
              . '    "index" : {'
              . '        "refresh_interval" : null'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  dfac8d098b50aa0181161bcd17b38ef4
     * Line: 51
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL51_dfac8d098b50aa0181161bcd17b38ef4()
    {
        $client = $this->getClient();
        // tag::dfac8d098b50aa0181161bcd17b38ef4[]
        // TODO -- Implement Example
        // PUT /twitter/_settings
        // {
        //     "index" : {
        //         "refresh_interval" : "-1"
        //     }
        // }
        // end::dfac8d098b50aa0181161bcd17b38ef4[]

        $curl = 'PUT /twitter/_settings'
              . '{'
              . '    "index" : {'
              . '        "refresh_interval" : "-1"'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0be2c28ee65384774b1e479b47dc3d92
     * Line: 69
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL69_0be2c28ee65384774b1e479b47dc3d92()
    {
        $client = $this->getClient();
        // tag::0be2c28ee65384774b1e479b47dc3d92[]
        // TODO -- Implement Example
        // PUT /twitter/_settings
        // {
        //     "index" : {
        //         "refresh_interval" : "1s"
        //     }
        // }
        // end::0be2c28ee65384774b1e479b47dc3d92[]

        $curl = 'PUT /twitter/_settings'
              . '{'
              . '    "index" : {'
              . '        "refresh_interval" : "1s"'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  fe5763d32955e8b65eb3048e97b1580c
     * Line: 83
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL83_fe5763d32955e8b65eb3048e97b1580c()
    {
        $client = $this->getClient();
        // tag::fe5763d32955e8b65eb3048e97b1580c[]
        // TODO -- Implement Example
        // POST /twitter/_forcemerge?max_num_segments=5
        // end::fe5763d32955e8b65eb3048e97b1580c[]

        $curl = 'POST /twitter/_forcemerge?max_num_segments=5';

        // TODO -- make assertion
    }

    /**
     * Tag:  ba0b4081c98f3387f76b77847c52ee9a
     * Line: 101
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL101_ba0b4081c98f3387f76b77847c52ee9a()
    {
        $client = $this->getClient();
        // tag::ba0b4081c98f3387f76b77847c52ee9a[]
        // TODO -- Implement Example
        // POST /twitter/_close
        // PUT /twitter/_settings
        // {
        //   "analysis" : {
        //     "analyzer":{
        //       "content":{
        //         "type":"custom",
        //         "tokenizer":"whitespace"
        //       }
        //     }
        //   }
        // }
        // POST /twitter/_open
        // end::ba0b4081c98f3387f76b77847c52ee9a[]

        $curl = 'POST /twitter/_close'
              . 'PUT /twitter/_settings'
              . '{'
              . '  "analysis" : {'
              . '    "analyzer":{'
              . '      "content":{'
              . '        "type":"custom",'
              . '        "tokenizer":"whitespace"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'POST /twitter/_open';

        // TODO -- make assertion
    }

// %__METHOD__%







}
