<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DaterangeAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/bucket/daterange-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DaterangeAggregation extends SimpleExamplesTester {

    /**
     * Tag:  a27c42ae4897ee6d2f6be3ddf80a8b3e
     * Line: 16
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL16_a27c42ae4897ee6d2f6be3ddf80a8b3e()
    {
        $client = $this->getClient();
        // tag::a27c42ae4897ee6d2f6be3ddf80a8b3e[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs": {
        //         "range": {
        //             "date_range": {
        //                 "field": "date",
        //                 "format": "MM-yyyy",
        //                 "ranges": [
        //                     { "to": "now-10M/M" }, \<1>
        //                     { "from": "now-10M/M" } \<2>
        //                 ]
        //             }
        //         }
        //     }
        // }
        // end::a27c42ae4897ee6d2f6be3ddf80a8b3e[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs": {'
              . '        "range": {'
              . '            "date_range": {'
              . '                "field": "date",'
              . '                "format": "MM-yyyy",'
              . '                "ranges": ['
              . '                    { "to": "now-10M/M" }, \<1>'
              . '                    { "from": "now-10M/M" } \<2>'
              . '                ]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a6ef8cd8c8218d547727ffc5485bfbd7
     * Line: 79
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL79_a6ef8cd8c8218d547727ffc5485bfbd7()
    {
        $client = $this->getClient();
        // tag::a6ef8cd8c8218d547727ffc5485bfbd7[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //    "aggs": {
        //        "range": {
        //            "date_range": {
        //                "field": "date",
        //                "missing": "1976/11/30",
        //                "ranges": [
        //                   {
        //                     "key": "Older",
        //                     "to": "2016/02/01"
        //                   }, \<1>
        //                   {
        //                     "key": "Newer",
        //                     "from": "2016/02/01",
        //                     "to" : "now/d"
        //                   }
        //               ]
        //           }
        //       }
        //    }
        // }
        // end::a6ef8cd8c8218d547727ffc5485bfbd7[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '   "aggs": {'
              . '       "range": {'
              . '           "date_range": {'
              . '               "field": "date",'
              . '               "missing": "1976/11/30",'
              . '               "ranges": ['
              . '                  {'
              . '                    "key": "Older",'
              . '                    "to": "2016/02/01"'
              . '                  }, \<1>'
              . '                  {'
              . '                    "key": "Newer",'
              . '                    "from": "2016/02/01",'
              . '                    "to" : "now/d"'
              . '                  }'
              . '              ]'
              . '          }'
              . '      }'
              . '   }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  901d66919e584515717bf78ab5ca2cbb
     * Line: 271
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL271_901d66919e584515717bf78ab5ca2cbb()
    {
        $client = $this->getClient();
        // tag::901d66919e584515717bf78ab5ca2cbb[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //    "aggs": {
        //        "range": {
        //            "date_range": {
        //                "field": "date",
        //                "time_zone": "CET",
        //                "ranges": [
        //                   { "to": "2016/02/01" }, \<1>
        //                   { "from": "2016/02/01", "to" : "now/d" }, \<2>
        //                   { "from": "now/d" }
        //               ]
        //           }
        //       }
        //    }
        // }
        // end::901d66919e584515717bf78ab5ca2cbb[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '   "aggs": {'
              . '       "range": {'
              . '           "date_range": {'
              . '               "field": "date",'
              . '               "time_zone": "CET",'
              . '               "ranges": ['
              . '                  { "to": "2016/02/01" }, \<1>'
              . '                  { "from": "2016/02/01", "to" : "now/d" }, \<2>'
              . '                  { "from": "now/d" }'
              . '              ]'
              . '          }'
              . '      }'
              . '   }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  83721157085b4e5a8a5ed3ede88b3690
     * Line: 301
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL301_83721157085b4e5a8a5ed3ede88b3690()
    {
        $client = $this->getClient();
        // tag::83721157085b4e5a8a5ed3ede88b3690[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs": {
        //         "range": {
        //             "date_range": {
        //                 "field": "date",
        //                 "format": "MM-yyy",
        //                 "ranges": [
        //                     { "to": "now-10M/M" },
        //                     { "from": "now-10M/M" }
        //                 ],
        //                 "keyed": true
        //             }
        //         }
        //     }
        // }
        // end::83721157085b4e5a8a5ed3ede88b3690[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs": {'
              . '        "range": {'
              . '            "date_range": {'
              . '                "field": "date",'
              . '                "format": "MM-yyy",'
              . '                "ranges": ['
              . '                    { "to": "now-10M/M" },'
              . '                    { "from": "now-10M/M" }'
              . '                ],'
              . '                "keyed": true'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2d1c675b3cb93119219a13db93262c1e
     * Line: 351
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL351_2d1c675b3cb93119219a13db93262c1e()
    {
        $client = $this->getClient();
        // tag::2d1c675b3cb93119219a13db93262c1e[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs": {
        //         "range": {
        //             "date_range": {
        //                 "field": "date",
        //                 "format": "MM-yyy",
        //                 "ranges": [
        //                     { "from": "01-2015",  "to": "03-2015", "key": "quarter_01" },
        //                     { "from": "03-2015", "to": "06-2015", "key": "quarter_02" }
        //                 ],
        //                 "keyed": true
        //             }
        //         }
        //     }
        // }
        // end::2d1c675b3cb93119219a13db93262c1e[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs": {'
              . '        "range": {'
              . '            "date_range": {'
              . '                "field": "date",'
              . '                "format": "MM-yyy",'
              . '                "ranges": ['
              . '                    { "from": "01-2015",  "to": "03-2015", "key": "quarter_01" },'
              . '                    { "from": "03-2015", "to": "06-2015", "key": "quarter_02" }'
              . '                ],'
              . '                "keyed": true'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
