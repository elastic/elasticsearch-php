<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ingest;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: IngestNode
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ingest/ingest-node.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class IngestNode extends SimpleExamplesTester {

    /**
     * Tag:  841306ff1ac69cceb5bf1c28e2f26dd3
     * Line: 186
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL186_841306ff1ac69cceb5bf1c28e2f26dd3()
    {
        $client = $this->getClient();
        // tag::841306ff1ac69cceb5bf1c28e2f26dd3[]
        // TODO -- Implement Example
        // PUT _ingest/pipeline/drop_guests_network
        // {
        //   "processors": [
        //     {
        //       "drop": {
        //         "if": "ctx.network_name == 'Guest'"
        //       }
        //     }
        //   ]
        // }
        // end::841306ff1ac69cceb5bf1c28e2f26dd3[]

        $curl = 'PUT _ingest/pipeline/drop_guests_network'
              . '{'
              . '  "processors": ['
              . '    {'
              . '      "drop": {'
              . '        "if": "ctx.network_name == 'Guest'"'
              . '      }'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  027ee5302d967b530123886906c42a90
     * Line: 203
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL203_027ee5302d967b530123886906c42a90()
    {
        $client = $this->getClient();
        // tag::027ee5302d967b530123886906c42a90[]
        // TODO -- Implement Example
        // POST test/_doc/1?pipeline=drop_guests_network
        // {
        //   "network_name" : "Guest"
        // }
        // end::027ee5302d967b530123886906c42a90[]

        $curl = 'POST test/_doc/1?pipeline=drop_guests_network'
              . '{'
              . '  "network_name" : "Guest"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9a5f1f590791012d32d29605daf82135
     * Line: 246
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL246_9a5f1f590791012d32d29605daf82135()
    {
        $client = $this->getClient();
        // tag::9a5f1f590791012d32d29605daf82135[]
        // TODO -- Implement Example
        // PUT _ingest/pipeline/drop_guests_network
        // {
        //   "processors": [
        //     {
        //       "drop": {
        //         "if": "ctx.network?.name == 'Guest'"
        //       }
        //     }
        //   ]
        // }
        // end::9a5f1f590791012d32d29605daf82135[]

        $curl = 'PUT _ingest/pipeline/drop_guests_network'
              . '{'
              . '  "processors": ['
              . '    {'
              . '      "drop": {'
              . '        "if": "ctx.network?.name == 'Guest'"'
              . '      }'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f8a8b78caaf69d44c71c476ea2a178aa
     * Line: 263
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL263_f8a8b78caaf69d44c71c476ea2a178aa()
    {
        $client = $this->getClient();
        // tag::f8a8b78caaf69d44c71c476ea2a178aa[]
        // TODO -- Implement Example
        // POST test/_doc/1?pipeline=drop_guests_network
        // {
        //   "network": {
        //     "name": "Guest"
        //   }
        // }
        // end::f8a8b78caaf69d44c71c476ea2a178aa[]

        $curl = 'POST test/_doc/1?pipeline=drop_guests_network'
              . '{'
              . '  "network": {'
              . '    "name": "Guest"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3eb75cee4c802d99bb526386349ee36b
     * Line: 279
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL279_3eb75cee4c802d99bb526386349ee36b()
    {
        $client = $this->getClient();
        // tag::3eb75cee4c802d99bb526386349ee36b[]
        // TODO -- Implement Example
        // POST test/_doc/2?pipeline=drop_guests_network
        // {
        //   "foo" : "bar"
        // }
        // end::3eb75cee4c802d99bb526386349ee36b[]

        $curl = 'POST test/_doc/2?pipeline=drop_guests_network'
              . '{'
              . '  "foo" : "bar"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  089ca88d7fd064a474e156d773211bc5
     * Line: 342
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL342_089ca88d7fd064a474e156d773211bc5()
    {
        $client = $this->getClient();
        // tag::089ca88d7fd064a474e156d773211bc5[]
        // TODO -- Implement Example
        // PUT _ingest/pipeline/drop_guests_network
        // {
        //   "processors": [
        //     {
        //       "dot_expander": {
        //         "field": "network.name"
        //       }
        //     },
        //     {
        //       "drop": {
        //         "if": "ctx.network?.name == 'Guest'"
        //       }
        //     }
        //   ]
        // }
        // end::089ca88d7fd064a474e156d773211bc5[]

        $curl = 'PUT _ingest/pipeline/drop_guests_network'
              . '{'
              . '  "processors": ['
              . '    {'
              . '      "dot_expander": {'
              . '        "field": "network.name"'
              . '      }'
              . '    },'
              . '    {'
              . '      "drop": {'
              . '        "if": "ctx.network?.name == 'Guest'"'
              . '      }'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8f6cec77f890027ad2e01f06e1290e25
     * Line: 364
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL364_8f6cec77f890027ad2e01f06e1290e25()
    {
        $client = $this->getClient();
        // tag::8f6cec77f890027ad2e01f06e1290e25[]
        // TODO -- Implement Example
        // POST test/_doc/3?pipeline=drop_guests_network
        // {
        //   "network.name": "Guest"
        // }
        // end::8f6cec77f890027ad2e01f06e1290e25[]

        $curl = 'POST test/_doc/3?pipeline=drop_guests_network'
              . '{'
              . '  "network.name": "Guest"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3b54be0a1a020edb8943f063f05b5cd7
     * Line: 412
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL412_3b54be0a1a020edb8943f063f05b5cd7()
    {
        $client = $this->getClient();
        // tag::3b54be0a1a020edb8943f063f05b5cd7[]
        // TODO -- Implement Example
        // PUT _ingest/pipeline/not_prod_dropper
        // {
        //   "processors": [
        //     {
        //       "drop": {
        //         "if": "Collection tags = ctx.tags;if(tags != null){for (String tag : tags) {if (tag.toLowerCase().contains('prod')) { return false;}}} return true;"
        //       }
        //     }
        //   ]
        // }
        // end::3b54be0a1a020edb8943f063f05b5cd7[]

        $curl = 'PUT _ingest/pipeline/not_prod_dropper'
              . '{'
              . '  "processors": ['
              . '    {'
              . '      "drop": {'
              . '        "if": "Collection tags = ctx.tags;if(tags != null){for (String tag : tags) {if (tag.toLowerCase().contains('prod')) { return false;}}} return true;"'
              . '      }'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  da19607976c3740945300c18e692bc49
     * Line: 458
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL458_da19607976c3740945300c18e692bc49()
    {
        $client = $this->getClient();
        // tag::da19607976c3740945300c18e692bc49[]
        // TODO -- Implement Example
        // POST test/_doc/1?pipeline=not_prod_dropper
        // {
        //   "tags": ["application:myapp", "env:Stage"]
        // }
        // end::da19607976c3740945300c18e692bc49[]

        $curl = 'POST test/_doc/1?pipeline=not_prod_dropper'
              . '{'
              . '  "tags": ["application:myapp", "env:Stage"]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  784dcf96b4970ce6c90d999cdfc2ef0b
     * Line: 474
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL474_784dcf96b4970ce6c90d999cdfc2ef0b()
    {
        $client = $this->getClient();
        // tag::784dcf96b4970ce6c90d999cdfc2ef0b[]
        // TODO -- Implement Example
        // POST test/_doc/2?pipeline=not_prod_dropper
        // {
        //   "tags": ["application:myapp", "env:Production"]
        // }
        // end::784dcf96b4970ce6c90d999cdfc2ef0b[]

        $curl = 'POST test/_doc/2?pipeline=not_prod_dropper'
              . '{'
              . '  "tags": ["application:myapp", "env:Production"]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  462b3cfb75b60b2df9e0567520aa9bf9
     * Line: 529
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL529_462b3cfb75b60b2df9e0567520aa9bf9()
    {
        $client = $this->getClient();
        // tag::462b3cfb75b60b2df9e0567520aa9bf9[]
        // TODO -- Implement Example
        // PUT _ingest/pipeline/logs_pipeline
        // {
        //   "description": "A pipeline of pipelines for log files",
        //   "version": 1,
        //   "processors": [
        //     {
        //       "pipeline": {
        //         "if": "ctx.service?.name == 'apache_httpd'",
        //         "name": "httpd_pipeline"
        //       }
        //     },
        //     {
        //       "pipeline": {
        //         "if": "ctx.service?.name == 'syslog'",
        //         "name": "syslog_pipeline"
        //       }
        //     },
        //     {
        //       "fail": {
        //         "message": "This pipeline requires service.name to be either `syslog` or `apache_httpd`"
        //       }
        //     }
        //   ]
        // }
        // end::462b3cfb75b60b2df9e0567520aa9bf9[]

        $curl = 'PUT _ingest/pipeline/logs_pipeline'
              . '{'
              . '  "description": "A pipeline of pipelines for log files",'
              . '  "version": 1,'
              . '  "processors": ['
              . '    {'
              . '      "pipeline": {'
              . '        "if": "ctx.service?.name == 'apache_httpd'",'
              . '        "name": "httpd_pipeline"'
              . '      }'
              . '    },'
              . '    {'
              . '      "pipeline": {'
              . '        "if": "ctx.service?.name == 'syslog'",'
              . '        "name": "syslog_pipeline"'
              . '      }'
              . '    },'
              . '    {'
              . '      "fail": {'
              . '        "message": "This pipeline requires service.name to be either `syslog` or `apache_httpd`"'
              . '      }'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  fe2d94eba550076cc27ee21a711fdb5c
     * Line: 575
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL575_fe2d94eba550076cc27ee21a711fdb5c()
    {
        $client = $this->getClient();
        // tag::fe2d94eba550076cc27ee21a711fdb5c[]
        // TODO -- Implement Example
        // PUT _ingest/pipeline/check_url
        // {
        //   "processors": [
        //     {
        //       "set": {
        //         "if": "ctx.href?.url =~ /^http[^s]/",
        //         "field": "href.insecure",
        //         "value": true
        //       }
        //     }
        //   ]
        // }
        // end::fe2d94eba550076cc27ee21a711fdb5c[]

        $curl = 'PUT _ingest/pipeline/check_url'
              . '{'
              . '  "processors": ['
              . '    {'
              . '      "set": {'
              . '        "if": "ctx.href?.url =~ /^http[^s]/",'
              . '        "field": "href.insecure",'
              . '        "value": true'
              . '      }'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  bfc92c930234ada7a3f394263b0deb1e
     * Line: 592
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL592_bfc92c930234ada7a3f394263b0deb1e()
    {
        $client = $this->getClient();
        // tag::bfc92c930234ada7a3f394263b0deb1e[]
        // TODO -- Implement Example
        // POST test/_doc/1?pipeline=check_url
        // {
        //   "href": {
        //     "url": "http://www.elastic.co/"
        //   }
        // }
        // end::bfc92c930234ada7a3f394263b0deb1e[]

        $curl = 'POST test/_doc/1?pipeline=check_url'
              . '{'
              . '  "href": {'
              . '    "url": "http://www.elastic.co/"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2ad6189aef1ecbb52bf0ddbd4e7a80cb
     * Line: 643
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL643_2ad6189aef1ecbb52bf0ddbd4e7a80cb()
    {
        $client = $this->getClient();
        // tag::2ad6189aef1ecbb52bf0ddbd4e7a80cb[]
        // TODO -- Implement Example
        // PUT _ingest/pipeline/check_url
        // {
        //   "processors": [
        //     {
        //       "set": {
        //         "if": "ctx.href?.url != null && ctx.href.url.startsWith('http://')",
        //         "field": "href.insecure",
        //         "value": true
        //       }
        //     }
        //   ]
        // }
        // end::2ad6189aef1ecbb52bf0ddbd4e7a80cb[]

        $curl = 'PUT _ingest/pipeline/check_url'
              . '{'
              . '  "processors": ['
              . '    {'
              . '      "set": {'
              . '        "if": "ctx.href?.url != null && ctx.href.url.startsWith('http://')",'
              . '        "field": "href.insecure",'
              . '        "value": true'
              . '      }'
              . '    }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%















}
