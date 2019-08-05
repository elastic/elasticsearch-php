<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DatehistogramAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/bucket/datehistogram-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DatehistogramAggregation extends SimpleExamplesTester {

    /**
     * Tag:  b789292f9cf63ce912e058c46d90ce20
     * Line: 107
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL107_b789292f9cf63ce912e058c46d90ce20()
    {
        $client = $this->getClient();
        // tag::b789292f9cf63ce912e058c46d90ce20[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "sales_over_time" : {
        //             "date_histogram" : {
        //                 "field" : "date",
        //                 "calendar_interval" : "month"
        //             }
        //         }
        //     }
        // }
        // end::b789292f9cf63ce912e058c46d90ce20[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "sales_over_time" : {'
              . '            "date_histogram" : {'
              . '                "field" : "date",'
              . '                "calendar_interval" : "month"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  73e5c88ad1488b213fb278ee1cb42289
     * Line: 127
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL127_73e5c88ad1488b213fb278ee1cb42289()
    {
        $client = $this->getClient();
        // tag::73e5c88ad1488b213fb278ee1cb42289[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "sales_over_time" : {
        //             "date_histogram" : {
        //                 "field" : "date",
        //                 "calendar_interval" : "2d"
        //             }
        //         }
        //     }
        // }
        // end::73e5c88ad1488b213fb278ee1cb42289[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "sales_over_time" : {'
              . '            "date_histogram" : {'
              . '                "field" : "date",'
              . '                "calendar_interval" : "2d"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  09ecba5814d71e4c44468575eada9878
     * Line: 203
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL203_09ecba5814d71e4c44468575eada9878()
    {
        $client = $this->getClient();
        // tag::09ecba5814d71e4c44468575eada9878[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "sales_over_time" : {
        //             "date_histogram" : {
        //                 "field" : "date",
        //                 "fixed_interval" : "30d"
        //             }
        //         }
        //     }
        // }
        // end::09ecba5814d71e4c44468575eada9878[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "sales_over_time" : {'
              . '            "date_histogram" : {'
              . '                "field" : "date",'
              . '                "fixed_interval" : "30d"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2bb2339ac055337abf753bddb7771659
     * Line: 222
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL222_2bb2339ac055337abf753bddb7771659()
    {
        $client = $this->getClient();
        // tag::2bb2339ac055337abf753bddb7771659[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "sales_over_time" : {
        //             "date_histogram" : {
        //                 "field" : "date",
        //                 "fixed_interval" : "2w"
        //             }
        //         }
        //     }
        // }
        // end::2bb2339ac055337abf753bddb7771659[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "sales_over_time" : {'
              . '            "date_histogram" : {'
              . '                "field" : "date",'
              . '                "fixed_interval" : "2w"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8a355eb25d2a01ba62dc1a22dd46f46f
     * Line: 294
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL294_8a355eb25d2a01ba62dc1a22dd46f46f()
    {
        $client = $this->getClient();
        // tag::8a355eb25d2a01ba62dc1a22dd46f46f[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "sales_over_time" : {
        //             "date_histogram" : {
        //                 "field" : "date",
        //                 "calendar_interval" : "1M",
        //                 "format" : "yyyy-MM-dd" \<1>
        //             }
        //         }
        //     }
        // }
        // end::8a355eb25d2a01ba62dc1a22dd46f46f[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "sales_over_time" : {'
              . '            "date_histogram" : {'
              . '                "field" : "date",'
              . '                "calendar_interval" : "1M",'
              . '                "format" : "yyyy-MM-dd" \<1>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  70f0aa5853697e265ef3b1df72940951
     * Line: 357
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL357_70f0aa5853697e265ef3b1df72940951()
    {
        $client = $this->getClient();
        // tag::70f0aa5853697e265ef3b1df72940951[]
        // TODO -- Implement Example
        // PUT my_index/_doc/1?refresh
        // {
        //   "date": "2015-10-01T00:30:00Z"
        // }
        // PUT my_index/_doc/2?refresh
        // {
        //   "date": "2015-10-01T01:30:00Z"
        // }
        // GET my_index/_search?size=0
        // {
        //   "aggs": {
        //     "by_day": {
        //       "date_histogram": {
        //         "field":     "date",
        //         "calendar_interval":  "day"
        //       }
        //     }
        //   }
        // }
        // end::70f0aa5853697e265ef3b1df72940951[]

        $curl = 'PUT my_index/_doc/1?refresh'
              . '{'
              . '  "date": "2015-10-01T00:30:00Z"'
              . '}'
              . 'PUT my_index/_doc/2?refresh'
              . '{'
              . '  "date": "2015-10-01T01:30:00Z"'
              . '}'
              . 'GET my_index/_search?size=0'
              . '{'
              . '  "aggs": {'
              . '    "by_day": {'
              . '      "date_histogram": {'
              . '        "field":     "date",'
              . '        "calendar_interval":  "day"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8de3206f80e18185a5ad6481f4c2ee07
     * Line: 409
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL409_8de3206f80e18185a5ad6481f4c2ee07()
    {
        $client = $this->getClient();
        // tag::8de3206f80e18185a5ad6481f4c2ee07[]
        // TODO -- Implement Example
        // GET my_index/_search?size=0
        // {
        //   "aggs": {
        //     "by_day": {
        //       "date_histogram": {
        //         "field":     "date",
        //         "calendar_interval":  "day",
        //         "time_zone": "-01:00"
        //       }
        //     }
        //   }
        // }
        // end::8de3206f80e18185a5ad6481f4c2ee07[]

        $curl = 'GET my_index/_search?size=0'
              . '{'
              . '  "aggs": {'
              . '    "by_day": {'
              . '      "date_histogram": {'
              . '        "field":     "date",'
              . '        "calendar_interval":  "day",'
              . '        "time_zone": "-01:00"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  aa6bfe54e2436eb668091fe31c2fbf4d
     * Line: 478
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL478_aa6bfe54e2436eb668091fe31c2fbf4d()
    {
        $client = $this->getClient();
        // tag::aa6bfe54e2436eb668091fe31c2fbf4d[]
        // TODO -- Implement Example
        // PUT my_index/_doc/1?refresh
        // {
        //   "date": "2015-10-01T05:30:00Z"
        // }
        // PUT my_index/_doc/2?refresh
        // {
        //   "date": "2015-10-01T06:30:00Z"
        // }
        // GET my_index/_search?size=0
        // {
        //   "aggs": {
        //     "by_day": {
        //       "date_histogram": {
        //         "field":     "date",
        //         "calendar_interval":  "day",
        //         "offset":    "+6h"
        //       }
        //     }
        //   }
        // }
        // end::aa6bfe54e2436eb668091fe31c2fbf4d[]

        $curl = 'PUT my_index/_doc/1?refresh'
              . '{'
              . '  "date": "2015-10-01T05:30:00Z"'
              . '}'
              . 'PUT my_index/_doc/2?refresh'
              . '{'
              . '  "date": "2015-10-01T06:30:00Z"'
              . '}'
              . 'GET my_index/_search?size=0'
              . '{'
              . '  "aggs": {'
              . '    "by_day": {'
              . '      "date_histogram": {'
              . '        "field":     "date",'
              . '        "calendar_interval":  "day",'
              . '        "offset":    "+6h"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9524a9b7373fa4eb2905183b0e806962
     * Line: 540
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL540_9524a9b7373fa4eb2905183b0e806962()
    {
        $client = $this->getClient();
        // tag::9524a9b7373fa4eb2905183b0e806962[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "sales_over_time" : {
        //             "date_histogram" : {
        //                 "field" : "date",
        //                 "calendar_interval" : "1M",
        //                 "format" : "yyyy-MM-dd",
        //                 "keyed": true
        //             }
        //         }
        //     }
        // }
        // end::9524a9b7373fa4eb2905183b0e806962[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "sales_over_time" : {'
              . '            "date_histogram" : {'
              . '                "field" : "date",'
              . '                "calendar_interval" : "1M",'
              . '                "format" : "yyyy-MM-dd",'
              . '                "keyed": true'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  39a6a038c4b551022afe83de0523634e
     * Line: 610
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL610_39a6a038c4b551022afe83de0523634e()
    {
        $client = $this->getClient();
        // tag::39a6a038c4b551022afe83de0523634e[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "sale_date" : {
        //              "date_histogram" : {
        //                  "field" : "date",
        //                  "calendar_interval": "year",
        //                  "missing": "2000/01/01" \<1>
        //              }
        //          }
        //     }
        // }
        // end::39a6a038c4b551022afe83de0523634e[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "sale_date" : {'
              . '             "date_histogram" : {'
              . '                 "field" : "date",'
              . '                 "calendar_interval": "year",'
              . '                 "missing": "2000/01/01" \<1>'
              . '             }'
              . '         }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6faf10a73f7d5fffbcb037bdb2cbaff8
     * Line: 644
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL644_6faf10a73f7d5fffbcb037bdb2cbaff8()
    {
        $client = $this->getClient();
        // tag::6faf10a73f7d5fffbcb037bdb2cbaff8[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs": {
        //         "dayOfWeek": {
        //             "terms": {
        //                 "script": {
        //                     "lang": "painless",
        //                     "source": "doc['date'].value.dayOfWeekEnum.value"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::6faf10a73f7d5fffbcb037bdb2cbaff8[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs": {'
              . '        "dayOfWeek": {'
              . '            "terms": {'
              . '                "script": {'
              . '                    "lang": "painless",'
              . '                    "source": "doc['date'].value.dayOfWeekEnum.value"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%












}
