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
     *     query1 = ESQL.from_("employees")
     *     query2 = ESQL.from_("<logs-{now/d}>")
     *     query3 = ESQL.from_("employees-00001", "other-employees-*")
     *     query4 = ESQL.from_("cluster_one:employees-00001", "cluster_two:other-employees-*")
     *     query5 = ESQL.from_("employees").metadata("_id")
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
     *     query1 = ESQL.row(a=1, b="two", c=None)
     *     query2 = ESQL.row(a=[1, 2])
     *     query3 = ESQL.row(a=functions.round(1.23, 0))
     */
    public static function row(string ...$params): RowCommand
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
     *     query = ESQL.show("INFO")
     */
    public static function show(string $item): ShowCommand
    {
        return new ShowCommand($item);
    }

    /**
     * This method can only be used inside a `FORK` command to create each branch.
     *
     * Examples:
     *
     *     query = ESQL.from_("employees").fork(
     *         ESQL.branch().where("emp_no == 10001"),
     *         ESQL.branch().where("emp_no == 10002"),
     *     )
     */
    public static function branch(): Branch
    {
        return new Branch();
    }
}
