<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: CompositeAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/bucket/composite-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class CompositeAggregation extends SimpleExamplesTester {

    /**
     * Tag:  118c81b8561fd9a9ead388d7971fccd9
     * Line: 116
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL116_118c81b8561fd9a9ead388d7971fccd9()
    {
        $client = $this->getClient();
        // tag::118c81b8561fd9a9ead388d7971fccd9[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "my_buckets": {
        //             "composite" : {
        //                 "sources" : [
        //                     { "product": { "terms" : { "field": "product" } } }
        //                 ]
        //             }
        //         }
        //      }
        // }
        // end::118c81b8561fd9a9ead388d7971fccd9[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "my_buckets": {'
              . '            "composite" : {'
              . '                "sources" : ['
              . '                    { "product": { "terms" : { "field": "product" } } }'
              . '                ]'
              . '            }'
              . '        }'
              . '     }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d4d4cb1e761f72aa7cd408655dbcbeac
     * Line: 135
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL135_d4d4cb1e761f72aa7cd408655dbcbeac()
    {
        $client = $this->getClient();
        // tag::d4d4cb1e761f72aa7cd408655dbcbeac[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "my_buckets": {
        //             "composite" : {
        //                 "sources" : [
        //                     {
        //                         "product": {
        //                             "terms" : {
        //                                 "script" : {
        //                                     "source": "doc[\'product\'].value",
        //                                     "lang": "painless"
        //                                 }
        //                             }
        //                         }
        //                     }
        //                 ]
        //             }
        //         }
        //     }
        // }
        // end::d4d4cb1e761f72aa7cd408655dbcbeac[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "my_buckets": {'
              . '            "composite" : {'
              . '                "sources" : ['
              . '                    {'
              . '                        "product": {'
              . '                            "terms" : {'
              . '                                "script" : {'
              . '                                    "source": "doc[\'product\'].value",'
              . '                                    "lang": "painless"'
              . '                                }'
              . '                            }'
              . '                        }'
              . '                    }'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  59d377892d4d912b216defa48e7befce
     * Line: 170
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL170_59d377892d4d912b216defa48e7befce()
    {
        $client = $this->getClient();
        // tag::59d377892d4d912b216defa48e7befce[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "my_buckets": {
        //             "composite" : {
        //                 "sources" : [
        //                     { "histo": { "histogram" : { "field": "price", "interval": 5 } } }
        //                 ]
        //             }
        //         }
        //     }
        // }
        // end::59d377892d4d912b216defa48e7befce[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "my_buckets": {'
              . '            "composite" : {'
              . '                "sources" : ['
              . '                    { "histo": { "histogram" : { "field": "price", "interval": 5 } } }'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a7ad889b26defd508889b288e076f05f
     * Line: 189
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL189_a7ad889b26defd508889b288e076f05f()
    {
        $client = $this->getClient();
        // tag::a7ad889b26defd508889b288e076f05f[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "my_buckets": {
        //             "composite" : {
        //                 "sources" : [
        //                     {
        //                         "histo": {
        //                             "histogram" : {
        //                                 "interval": 5,
        //                                 "script" : {
        //                                     "source": "doc[\'price\'].value",
        //                                     "lang": "painless"
        //                                 }
        //                             }
        //                         }
        //                     }
        //                 ]
        //             }
        //         }
        //     }
        // }
        // end::a7ad889b26defd508889b288e076f05f[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "my_buckets": {'
              . '            "composite" : {'
              . '                "sources" : ['
              . '                    {'
              . '                        "histo": {'
              . '                            "histogram" : {'
              . '                                "interval": 5,'
              . '                                "script" : {'
              . '                                    "source": "doc[\'price\'].value",'
              . '                                    "lang": "painless"'
              . '                                }'
              . '                            }'
              . '                        }'
              . '                    }'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9361db99de15d1f18233a555777c2e1f
     * Line: 222
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL222_9361db99de15d1f18233a555777c2e1f()
    {
        $client = $this->getClient();
        // tag::9361db99de15d1f18233a555777c2e1f[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "my_buckets": {
        //             "composite" : {
        //                 "sources" : [
        //                     { "date": { "date_histogram" : { "field": "timestamp", "calendar_interval": "1d" } } }
        //                 ]
        //             }
        //         }
        //     }
        // }
        // end::9361db99de15d1f18233a555777c2e1f[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "my_buckets": {'
              . '            "composite" : {'
              . '                "sources" : ['
              . '                    { "date": { "date_histogram" : { "field": "timestamp", "calendar_interval": "1d" } } }'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2fb60a596d3d996c1329fb4c50955b89
     * Line: 252
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL252_2fb60a596d3d996c1329fb4c50955b89()
    {
        $client = $this->getClient();
        // tag::2fb60a596d3d996c1329fb4c50955b89[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "my_buckets": {
        //             "composite" : {
        //                 "sources" : [
        //                     {
        //                         "date": {
        //                             "date_histogram" : {
        //                                 "field": "timestamp",
        //                                 "calendar_interval": "1d",
        //                                 "format": "yyyy-MM-dd" \<1>
        //                             }
        //                         }
        //                     }
        //                 ]
        //             }
        //         }
        //     }
        // }
        // end::2fb60a596d3d996c1329fb4c50955b89[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "my_buckets": {'
              . '            "composite" : {'
              . '                "sources" : ['
              . '                    {'
              . '                        "date": {'
              . '                            "date_histogram" : {'
              . '                                "field": "timestamp",'
              . '                                "calendar_interval": "1d",'
              . '                                "format": "yyyy-MM-dd" \<1>'
              . '                            }'
              . '                        }'
              . '                    }'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5d9aef8cd8d324049e34bf96e38814ee
     * Line: 295
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL295_5d9aef8cd8d324049e34bf96e38814ee()
    {
        $client = $this->getClient();
        // tag::5d9aef8cd8d324049e34bf96e38814ee[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "my_buckets": {
        //             "composite" : {
        //                 "sources" : [
        //                     { "date": { "date_histogram": { "field": "timestamp", "calendar_interval": "1d" } } },
        //                     { "product": { "terms": {"field": "product" } } }
        //                 ]
        //             }
        //         }
        //     }
        // }
        // end::5d9aef8cd8d324049e34bf96e38814ee[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "my_buckets": {'
              . '            "composite" : {'
              . '                "sources" : ['
              . '                    { "date": { "date_histogram": { "field": "timestamp", "calendar_interval": "1d" } } },'
              . '                    { "product": { "terms": {"field": "product" } } }'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ce182c31ce9ffb336dd26ee9899da3e7
     * Line: 318
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL318_ce182c31ce9ffb336dd26ee9899da3e7()
    {
        $client = $this->getClient();
        // tag::ce182c31ce9ffb336dd26ee9899da3e7[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "my_buckets": {
        //             "composite" : {
        //                 "sources" : [
        //                     { "shop": { "terms": {"field": "shop" } } },
        //                     { "product": { "terms": { "field": "product" } } },
        //                     { "date": { "date_histogram": { "field": "timestamp", "calendar_interval": "1d" } } }
        //                 ]
        //             }
        //         }
        //     }
        // }
        // end::ce182c31ce9ffb336dd26ee9899da3e7[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "my_buckets": {'
              . '            "composite" : {'
              . '                "sources" : ['
              . '                    { "shop": { "terms": {"field": "shop" } } },'
              . '                    { "product": { "terms": { "field": "product" } } },'
              . '                    { "date": { "date_histogram": { "field": "timestamp", "calendar_interval": "1d" } } }'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9837cab0afe4bae8d11e42411cb812ad
     * Line: 348
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL348_9837cab0afe4bae8d11e42411cb812ad()
    {
        $client = $this->getClient();
        // tag::9837cab0afe4bae8d11e42411cb812ad[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "my_buckets": {
        //             "composite" : {
        //                 "sources" : [
        //                     { "date": { "date_histogram": { "field": "timestamp", "calendar_interval": "1d", "order": "desc" } } },
        //                     { "product": { "terms": {"field": "product", "order": "asc" } } }
        //                 ]
        //             }
        //         }
        //     }
        // }
        // end::9837cab0afe4bae8d11e42411cb812ad[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "my_buckets": {'
              . '            "composite" : {'
              . '                "sources" : ['
              . '                    { "date": { "date_histogram": { "field": "timestamp", "calendar_interval": "1d", "order": "desc" } } },'
              . '                    { "product": { "terms": {"field": "product", "order": "asc" } } }'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  af056fa2f099bbf339d07b6d11a46210
     * Line: 375
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL375_af056fa2f099bbf339d07b6d11a46210()
    {
        $client = $this->getClient();
        // tag::af056fa2f099bbf339d07b6d11a46210[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "my_buckets": {
        //             "composite" : {
        //                 "sources" : [
        //                     { "product_name": { "terms" : { "field": "product", "missing_bucket": true } } }
        //                 ]
        //             }
        //         }
        //      }
        // }
        // end::af056fa2f099bbf339d07b6d11a46210[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "my_buckets": {'
              . '            "composite" : {'
              . '                "sources" : ['
              . '                    { "product_name": { "terms" : { "field": "product", "missing_bucket": true } } }'
              . '                ]'
              . '            }'
              . '        }'
              . '     }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b29c0503d688299dd1eb87ff0fe69415
     * Line: 415
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL415_b29c0503d688299dd1eb87ff0fe69415()
    {
        $client = $this->getClient();
        // tag::b29c0503d688299dd1eb87ff0fe69415[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "my_buckets": {
        //             "composite" : {
        //                 "size": 2,
        //                 "sources" : [
        //                     { "date": { "date_histogram": { "field": "timestamp", "calendar_interval": "1d" } } },
        //                     { "product": { "terms": {"field": "product" } } }
        //                 ]
        //             }
        //         }
        //     }
        // }
        // end::b29c0503d688299dd1eb87ff0fe69415[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "my_buckets": {'
              . '            "composite" : {'
              . '                "size": 2,'
              . '                "sources" : ['
              . '                    { "date": { "date_histogram": { "field": "timestamp", "calendar_interval": "1d" } } },'
              . '                    { "product": { "terms": {"field": "product" } } }'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b6dc7bb2713d7fe2eb6e480dee2e458d
     * Line: 481
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL481_b6dc7bb2713d7fe2eb6e480dee2e458d()
    {
        $client = $this->getClient();
        // tag::b6dc7bb2713d7fe2eb6e480dee2e458d[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "my_buckets": {
        //             "composite" : {
        //                 "size": 2,
        //                  "sources" : [
        //                     { "date": { "date_histogram": { "field": "timestamp", "calendar_interval": "1d", "order": "desc" } } },
        //                     { "product": { "terms": {"field": "product", "order": "asc" } } }
        //                 ],
        //                 "after": { "date": 1494288000000, "product": "mad max" } \<1>
        //             }
        //         }
        //     }
        // }
        // end::b6dc7bb2713d7fe2eb6e480dee2e458d[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "my_buckets": {'
              . '            "composite" : {'
              . '                "size": 2,'
              . '                 "sources" : ['
              . '                    { "date": { "date_histogram": { "field": "timestamp", "calendar_interval": "1d", "order": "desc" } } },'
              . '                    { "product": { "terms": {"field": "product", "order": "asc" } } }'
              . '                ],'
              . '                "after": { "date": 1494288000000, "product": "mad max" } \<1>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e4979ca30ac53864edb4871a23ad73b3
     * Line: 511
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL511_e4979ca30ac53864edb4871a23ad73b3()
    {
        $client = $this->getClient();
        // tag::e4979ca30ac53864edb4871a23ad73b3[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "my_buckets": {
        //             "composite" : {
        //                  "sources" : [
        //                     { "date": { "date_histogram": { "field": "timestamp", "calendar_interval": "1d", "order": "desc" } } },
        //                     { "product": { "terms": {"field": "product" } } }
        //                 ]
        //             },
        //             "aggregations": {
        //                 "the_avg": {
        //                     "avg": { "field": "price" }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::e4979ca30ac53864edb4871a23ad73b3[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "my_buckets": {'
              . '            "composite" : {'
              . '                 "sources" : ['
              . '                    { "date": { "date_histogram": { "field": "timestamp", "calendar_interval": "1d", "order": "desc" } } },'
              . '                    { "product": { "terms": {"field": "product" } } }'
              . '                ]'
              . '            },'
              . '            "aggregations": {'
              . '                "the_avg": {'
              . '                    "avg": { "field": "price" }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%














}
