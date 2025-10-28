<?php
/**
 * Elasticsearch PHP Client
 *
 * @link      https://github.com/elastic/elasticsearch-php
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   https://opensource.org/licenses/MIT MIT License
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the MIT License.
 * See the LICENSE file in the project root for more information.
 */
declare(strict_types = 1);

namespace Elastic\Elasticsearch\Helper\Esql;

abstract class Query {
    /**
     * The `FROM` source command returns a table with data from a data stream,
     * index, or alias.
     *
     * @param string $indices A list of indices, data streams or aliases. Supports 
     *                        wildcards and date math.
     *
     * Examples:
     *
     *     $query1 = Query::from("employees");
     *     $query2 = Query::from("<logs-{now/d}>");
     *     $query3 = Query::from("employees-00001", "other-employees-*");
     *     $query4 = Query::from("cluster_one:employees-00001", "cluster_two:other-employees-*");
     *     $query5 = Query::from("employees")->metadata("_id");
     */
    public static function from(string ...$indices): FromCommand
    {
        return new FromCommand($indices);
    }

    /**
     * The ``ROW`` source command produces a row with one or more columns with
     * values that you specify. This can be useful for testing.
     *
     * @param string ...$params the column values to produce, given as keyword
     *                          arguments.
     *
     * Examples:
     *
     *     $query1 = Query::row(a: 1, b: "two", c: null);
     *     $query2 = Query::row(a: [2, 1]);
     */
    public static function row(mixed ...$params): RowCommand
    {
        return new RowCommand($params);
    }

    /**
     * The `SHOW` source command returns information about the deployment and
     * its capabilities.
     *
     * @param string $item Can only be `INFO`.
     *
     * Examples:
     *
     *     $query = Query::show("INFO");
     */
    public static function show(string $item): ShowCommand
    {
        return new ShowCommand($item);
    }

    /**
     * The `TS` source command is similar to ``FROM``, but for time series indices.
     *
     * @param string $indices A list of indices, data streams or aliases. Supports
     * wildcards and date math.
     *
     * Examples:
     *
     *     $query = Query::ts("metrics")
     *         ->where("@timestamp >= now() - 1 day")
     *         ->stats("SUM(AVG_OVER_TIME(memory_usage))").by("host", "TBUCKET(1 hour)")
     */
    public static function ts(string ...$indices): TSCommand
    {
        return new TSCommand($indices);
    }

    /**
     * This method can only be used inside a `FORK` command to create each branch.
     *
     * Examples:
     *
     *     $query = Query::from("employees")
     *         ->fork(
     *             Query::branch()->where("emp_no == 10001"),
     *             Query::branch()->where("emp_no == 10002"),
     *         )
     */
    public static function branch(): Branch
    {
        return new Branch();
    }
}
