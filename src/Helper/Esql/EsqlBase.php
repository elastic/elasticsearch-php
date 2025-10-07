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

use RuntimeException;

abstract class EsqlBase {
    private ?EsqlBase $parent = null;

    protected function format_kv(array $map): string
    {
        return implode(", ", array_map(
            function($k, $v) {
                return $k . "=" . json_encode($v);
            },
            array_keys($map),
            $map,
        ));
    }

    public function render(): string
    {
        $query = "";
        if ($this->parent) {
            $query .= $this->parent->render() . "\n| ";
        }
        $query .= $this->render_internal();
        return $query;
    }

    protected abstract function render_internal(): string;

    public function __construct(?EsqlBase $parent)
    {
        $this->parent = $parent;
    }

    public function __toString(): string
    {
        return $this->render() . "\n";
    }

    protected function is_named_argument_list(array $args): bool {
        $named_count = array_sum(array_map('is_string', array_keys($args)));
        if ($named_count == sizeof($args)) {
            return true;
        }
        if ($named_count != 0) {
            throw new RuntimeException("foo");
        }
        return false;
    }

    protected function format_id(string $id, bool $allow_patterns = false): string
    {
        if ($allow_patterns && str_contains($id, "*")) {
            // patterns cannot be escaped
            return $id;
        }
        if (preg_match("/[A-Za-z_@][A-Za-z0-9_\\.]*/", $id)) {
            // all safe characters, so no need to escape
            return $id;
        }
        // apply escaping
        return "`" . str_replace("`", "``", $id) . "`";
    }

    protected function is_forked(): bool
    {
        if (get_class($this) == "ForkCommand") {
            return true;
        }
        if ($this->parent) {
            return $this->parent->is_forked();
        }
        return false;
    }

    /**
     * `CHANGE_POINT` detects spikes, dips, and change points in a metric.
     *
     * @param string $value The column with the metric in which you want to
     *                      detect a change point.
     *
     * Examples:
     *
     *     query = (
     *         ESQL.row(key=list(range(1, 26)))
     *         .mv_expand("key")
     *         .eval(value=functions.case("key<13", 0, 42))
     *         .change_point("value")
     *         .on("key")
     *         .where("type IS NOT NULL")
     *     )
     */
    public function change_point(string $value): ChangePointCommand
    {
        return new ChangePointCommand($this, $value);
    }

    /**
     * The `COMPLETION` command allows you to send prompts and context to a Large
     * Language Model (LLM) directly within your ES|QL queries, to perform text
     * generation tasks.
     * 
     * @param string ...$prompt The input text or expression used to prompt the
     *                          LLM. This can be a string literal or a reference
     *                          to a column containing text. If the prompt is
     *                          given as a positional argument, the results will
     *                          be stored in a column named `completion`. If
     *                          given as a named argument, the given name will
     *                          be used. If the specified column already exists,
     *                          it will be overwritten with the new results.
     * 
     * Examples:
     * 
     *     query1 = (
     *         ESQL.row(question="What is Elasticsearch?")
     *         .completion("question").with_("test_completion_model")
     *         .keep("question", "completion")
     *     )
     *     query2 = (
     *         ESQL.row(question="What is Elasticsearch?")
     *         .completion(answer="question").with_("test_completion_model")
     *         .keep("question", "answer")
     *     )
     *     query3 = (
     *         ESQL.from_("movies")
     *         .sort("rating DESC")
     *         .limit(10)
     *         .eval(prompt=\"\"\"CONCAT(
     *             "Summarize this movie using the following information: \\n",
     *             "Title: ", title, "\\n",
     *             "Synopsis: ", synopsis, "\\n",
     *             "Actors: ", MV_CONCAT(actors, ", "), "\\n",
     *         )\"\"\")
     *         .completion(summary="prompt").with_("test_completion_model")
     *         .keep("title", "summary", "rating")
     *     )
     */
    public function completion(string ...$prompt): CompletionCommand
    {
        return new CompletionCommand($this, $prompt);
    }

    /**
     * `DISSECT` enables you to extract structured data out of a string.
     * 
     * @param string $input The column that contains the string you want to
     *                      structure. If the column has multiple values,
     *                      `DISSECT` will process each value.
     * @param string $pattern A dissect pattern. If a field name conflicts with
     *                        an existing column, the existing column is
     *                        dropped. If a field name is used more than once,
     *                        only the rightmost duplicate creates a column.
     * 
     * Examples:
     * 
     *     query = (
     *         ESQL.row(a="2023-01-23T12:15:00.000Z - some text - 127.0.0.1")
     *         .dissect("a", "%{date} - %{msg} - %{ip}")
     *         .keep("date", "msg", "ip")
     *         .eval(date="TO_DATETIME(date)")
     *     )
     */
    public function dissect(string $input, string $pattern): DissectCommand
    {
        return new DissectCommand($this, $input, $pattern);
    }

    /**
     * The `DROP` processing command removes one or more columns.
     * 
     * @param string ...$columns The columns to drop, given as positional
     *                           arguments. Supports wildcards.
     * 
     * Examples:
     * 
     *     query1 = ESQL.from_("employees").drop("height")
     *     query2 = ESQL.from_("employees").drop("height*")
     */
    public function drop(string ...$columns): DropCommand
    {
        return new DropCommand($this, $columns);
    }

    /**
     * `ENRICH` enables you to add data from existing indices as new columns using an
     * enrich policy.
     * 
     * @param string $policy The name of the enrich policy. You need to create
     *                       and execute the enrich policy first.
     * 
     * Examples:
     * 
     *     query1 = (
     *         ESQL.row(a="1")
     *         .enrich("languages_policy").on("a").with_("language_name")
     *     )
     *     query2 = (
     *         ESQL.row(a="1")
     *         .enrich("languages_policy").on("a").with_(name="language_name")
     *     )
     */
    public function enrich(string $policy): EnrichCommand
    {
        return new EnrichCommand($this, $policy);
    }

    /**
     * The `EVAL` processing command enables you to append new columns with calculated
     * values.
     * 
     * @param string ...$columns The values for the columns, given as positional
     *                           or named arguments. Can be literals, expressions,
     *                           or functions. Can use columns defined left of
     *                           this one. When given as named arguments, the
     *                           names are used as column names in the results.
     *                           If a column with the same name already exists,
     *                           the existing column is dropped. If a column name
     *                           is used more than once, only the rightmost
     *                           duplicate creates a column.
     * 
     * Examples:
     * 
     *     query1 = (
     *         ESQL.from_("employees")
     *         .sort("emp_no")
     *         .keep("first_name", "last_name", "height")
     *         .eval(height_feet="height * 3.281", height_cm="height * 100")
     *     )
     *     query2 = (
     *         ESQL.from_("employees")
     *         .eval("height * 3.281")
     *         .stats(avg_height_feet=functions.avg("`height * 3.281`"))
     *     )
     */
    public function eval(string ...$columns): EvalCommand
    {
       return new EvalCommand($this, $columns);
    }

    /**
     * The `FORK` processing command creates multiple execution branches to operate on the
     * same input data and combines the results in a single output table.
     * 
     * @param EsqlBase $fork1 Up to 8 execution branches, created with the
     *                        `Query.branch()` method.
     * 
     * Examples:
     * 
     *     query = (
     *         ESQL.from_("employees")
     *         .fork(
     *             ESQL.branch().where("emp_no == 10001"),
     *             ESQL.branch().where("emp_no == 10002"),
     *         )
     *         .keep("emp_no", "_fork")
     *         .sort("emp_no")
     *     )
     */
    public function fork(
        EsqlBase $fork1,
        ?EsqlBase $fork2 = null,
        ?EsqlBase $fork3 = null,
        ?EsqlBase $fork4 = null,
        ?EsqlBase $fork5 = null,
        ?EsqlBase $fork6 = null,
        ?EsqlBase $fork7 = null,
        ?EsqlBase $fork8 = null,
    ): ForkCommand
    {
        if ($this->is_forked()) {
            throw new RuntimeException("a query can only have one fork");
        }
        return new ForkCommand($this, $fork1, $fork2, $fork3, $fork4, $fork5, $fork6, $fork7, $fork8);
    }

    /**
     * `GROK` enables you to extract structured data out of a string.
     * 
     * @param string $input The column that contains the string you want to
     *                      structure. If the column has multiple values, `GROK`
     *                      will process each value.
     * @param string $pattern A grok pattern. If a field name conflicts with an
     *                        existing column, the existing column is discarded.
     *                        If a field name is used more than once, a
     *                        multi-valued column will be created with one value
     *                        per each occurrence of the field name.
     * 
     * Examples:
     * 
     *     query1 = (
     *         ESQL.row(a="2023-01-23T12:15:00.000Z 127.0.0.1 some.email@foo.com 42")
     *         .grok("a", "%{TIMESTAMP_ISO8601:date} %{IP:ip} %{EMAILADDRESS:email} %{NUMBER:num}")
     *         .keep("date", "ip", "email", "num")
     *     )
     *     query2 = (
     *         ESQL.row(a="2023-01-23T12:15:00.000Z 127.0.0.1 some.email@foo.com 42")
     *         .grok(
     *             "a",
     *             "%{TIMESTAMP_ISO8601:date} %{IP:ip} %{EMAILADDRESS:email} %{NUMBER:num:int}",
     *         )
     *         .keep("date", "ip", "email", "num")
     *         .eval(date=functions.to_datetime("date"))
     *     )
     *     query3 = (
     *         ESQL.from_("addresses")
     *         .keep("city.name", "zip_code")
     *         .grok("zip_code", "%{WORD:zip_parts} %{WORD:zip_parts}")
     *     )
     */
    public function grok(string $input, string $pattern): GrokCommand
    {
        return new GrokCommand($this, $input, $pattern);
    }

    /**
     * The `KEEP` processing command enables you to specify what columns are returned
     * and the order in which they are returned.
     * 
     * @param string ...$columns The columns to keep, given as positional
     *                           arguments. Supports wildcards.
     * 
     * Examples:
     * 
     *     query1 = ESQL.from_("employees").keep("emp_no", "first_name", "last_name", "height")
     *     query2 = ESQL.from_("employees").keep("h*")
     *     query3 = ESQL.from_("employees").keep("h*", "*")
     */
    public function keep(string ...$columns): KeepCommand
    {
        return new KeepCommand($this, $columns);
    }

    /**
     * The `LIMIT` processing command enables you to limit the number of rows that are
     * returned.
     * 
     * @param int $max_number_of_rows The maximum number of rows to return.
     * 
     * Examples:
     * 
     *     query1 = ESQL.from_("employees").sort("emp_no ASC").limit(5)
     *     query2 = ESQL.from_("index").stats(functions.avg("field1")).by("field2").limit(20000)
     */
    public function limit(int $max_number_of_rows): LimitCommand
    {
        return new LimitCommand($this, $max_number_of_rows);
    }

    /**
     * `LOOKUP JOIN` enables you to add data from another index, AKA a 'lookup' index,
     * to your ES|QL query results, simplifying data enrichment and analysis workflows.
     * 
     * @param string $lookup_index The name of the lookup index. This must be a
     *                             specific index name - wildcards, aliases, and
     *                             remote cluster references are not supported.
     *                             Indices used for lookups must be configured
     *                             with the lookup index mode.
     * 
     * Examples:
     * 
     *     query1 = (
     *         ESQL.from_("firewall_logs")
     *         .lookup_join("threat_list").on("source.IP")
     *         .where("threat_level IS NOT NULL")
     *     )
     *     query2 = (
     *         ESQL.from_("system_metrics")
     *         .lookup_join("host_inventory").on("host.name")
     *         .lookup_join("ownerships").on("host.name")
     *     )
     *     query3 = (
     *         ESQL.from_("app_logs")
     *         .lookup_join("service_owners").on("service_id")
     *     )
     *     query4 = (
     *         ESQL.from_("employees")
     *         .eval(language_code="languages")
     *         .where("emp_no >= 10091 AND emp_no < 10094")
     *         .lookup_join("languages_lookup").on("language_code")
     *     )
     */
    public function lookup_join(string $lookup_index): LookupJoinCommand
    {
        return new LookupJoinCommand($this, $lookup_index);
    }

    /**
     * The `MV_EXPAND` processing command expands multivalued columns into one row per
     * value, duplicating other columns.
     * 
     * @param string $column The multivalued column to expand.
     * 
     * Examples:
     * 
     *     query = ESQL.row(a=[1, 2, 3], b="b", j=["a", "b"]).mv_expand("a")
     */
    public function mv_expand(string $column): MvExpandCommand
    {
        return new MvExpandCommand($this, $column);
    }

    /**
     * The `RENAME` processing command renames one or more columns.
     * 
     * @param string ...$columns The old and new column name pairs, given as
     *                           named arguments. If a name conflicts with an
     *                           existing column name, the existing column is
     *                           dropped. If multiple columns are renamed to the
     *                           same name, all but the rightmost column with
     *                           the same new name are dropped.
     * 
     * Examples:
     * 
     *     query = (
     *         ESQL.from_("employees")
     *         .keep("first_name", "last_name", "still_hired")
     *         .rename(still_hired="employed")
     *     )
     */
    public function rename(string ...$columns): RenameCommand
    {
        return new RenameCommand($this, $columns);
    }

    /**
     * The `RERANK` command uses an inference model to compute a new relevance score
     * for an initial set of documents, directly within your ES|QL queries.
     * 
     * @param string ...$query The query text used to rerank the documents.
     *                         This is typically the same query used in the
     *                         initial search. If given as a named argument, The
     *                         argument name is used for the column name. If the
     *                         query is given as a positional argument, the
     *                         results will be stored in a column named `_score`.
     *                         If the specified column already exists, it will
     *                         be overwritten with the new results.
     * 
     * Examples:
     * 
     *     query1 = (
     *         ESQL.from_("books").metadata("_score")
     *         .where('MATCH(description, "hobbit")')
     *         .sort("_score DESC")
     *         .limit(100)
     *         .rerank("hobbit").on("description").with_(inference_id="test_reranker")
     *         .limit(3)
     *         .keep("title", "_score")
     *     )
     *     query2 = (
     *         ESQL.from_("books").metadata("_score")
     *         .where('MATCH(description, "hobbit") OR MATCH(author, "Tolkien")')
     *         .sort("_score DESC")
     *         .limit(100)
     *         .rerank(rerank_score="hobbit").on("description", "author").with_(inference_id="test_reranker")
     *         .sort("rerank_score")
     *         .limit(3)
     *         .keep("title", "_score", "rerank_score")
     *     )
     *     query3 = (
     *         ESQL.from_("books").metadata("_score")
     *         .where('MATCH(description, "hobbit") OR MATCH(author, "Tolkien")')
     *         .sort("_score DESC")
     *         .limit(100)
     *         .rerank(rerank_score="hobbit").on("description", "author").with_(inference_id="test_reranker")
     *         .eval(original_score="_score", _score="rerank_score + original_score")
     *         .sort("_score")
     *         .limit(3)
     *         .keep("title", "original_score", "rerank_score", "_score")
     *     )
     */
    public function rerank(string ...$query): RerankCommand
    {
        return new RerankCommand($this, $query);
    }

    /**
     * The `SAMPLE` command samples a fraction of the table rows.
     * 
     * @param float $probability The probability that a row is included in the
     *                           sample. The value must be between 0 and 1,
     *                           exclusive.
     * 
     * Examples:
     * 
     *     query = ESQL.from_("employees").keep("emp_no").sample(0.05)
     */
    public function sample(float $probability): SampleCommand
    {
        return new SampleCommand($this, $probability);
    }

    /**
     * The `SORT` processing command sorts a table on one or more columns.
     * 
     * @param string ...$columns: The columns to sort on.
     * 
     * Examples:
     * 
     *     query1 = (
     *         ESQL.from_("employees")
     *         .keep("first_name", "last_name", "height")
     *         .sort("height")
     *     )
     *     query2 =  (
     *         ESQL.from_("employees")
     *         .keep("first_name", "last_name", "height")
     *         .sort("height DESC")
     *     )
     *     query3 = (
     *         ESQL.from_("employees")
     *         .keep("first_name", "last_name", "height")
     *         .sort("height DESC", "first_name ASC")
     *     )
     *     query4 = (
     *         ESQL.from_("employees")
     *         .keep("first_name", "last_name", "height")
     *         .sort("first_name ASC NULLS FIRST")
     *     )
     */
    public function sort(string ...$columns): SortCommand
    {
        return new SortCommand($this, $columns);
    }

    /**
     * The `STATS` processing command groups rows according to a common value and
     * calculates one or more aggregated values over the grouped rows.
     * 
     * @param string ...$expressions A list of expressions, given as positional
     *                               or named arguments. The argument names are
     *                               used for the returned aggregated values.
     * 
     * Note that only one of `expressions` and `named_expressions` must be provided.
     * 
     * Examples:
     * 
     *     query1 = (
     *         ESQL.from_("employees")
     *         .stats(count=functions.count("emp_no")).by("languages")
     *         .sort("languages")
     *     )
     *     query2 = (
     *         ESQL.from_("employees")
     *         .stats(avg_lang=functions.avg("languages"))
     *     )
     *     query3 = (
     *         ESQL.from_("employees")
     *         .stats(
     *             avg_lang=functions.avg("languages"),
     *             max_lang=functions.max("languages")
     *         )
     *     )
     *     query4 = (
     *         ESQL.from_("employees")
     *         .stats(
     *             avg50s=functions.avg("salary").where('birth_date < "1960-01-01"'),
     *             avg60s=functions.avg("salary").where('birth_date >= "1960-01-01"'),
     *         ).by("gender")
     *         .sort("gender")
     *     )
     *     query5 = (
     *         ESQL.from_("employees")
     *         .eval(Ks="salary / 1000")
     *         .stats(
     *             under_40K=functions.count("*").where("Ks < 40"),
     *             inbetween=functions.count("*").where("40 <= Ks AND Ks < 60"),
     *             over_60K=functions.count("*").where("60 <= Ks"),
     *             total=f.count("*")
     *         )
     *     )
     *     query6 = (
     *         ESQL.row(i=1, a=["a", "b"])
     *         .stats(functions.min("i")).by("a")
     *         .sort("a ASC")
     *     )
     *     query7 = (
     *         ESQL.from_("employees")
     *         .eval(hired=functions.date_format("hire_date", "yyyy"))
     *         .stats(avg_salary=functions.avg("salary")).by("hired", "languages.long")
     *         .eval(avg_salary=functions.round("avg_salary"))
     *         .sort("hired", "languages.long")
     * 
     *     )
     */
    public function stats(string ...$expressions): StatsCommand
    {
        return new StatsCommand($this, $expressions);
    }

    /**
     * The `WHERE` processing command produces a table that contains all the rows
     * from the input table for which the provided condition evaluates to `true`.
     * 
     * @param string ...$expressions A list of boolean expressions, given as
     *                               positional or named arguments. These
     *                               expressions are combined with an `AND`
     *                               logical operator.
     * 
     * Examples:
     * 
     *     query1 = (
     *         ESQL.from_("employees")
     *         .keep("first_name", "last_name", "still_hired")
     *         .where("still_hired == true")
     *     )
     *     query2 = (
     *         ESQL.from_("sample_data")
     *         .where("@timestamp > NOW() - 1 hour")
     *     )
     *     query3 = (
     *         ESQL.from_("employees")
     *         .keep("first_name", "last_name", "height")
     *         .where("LENGTH(first_name) < 4")
     *     )
     */
    public function where(string ...$expressions): WhereCommand
    {
        return new WhereCommand($this, $expressions);
    }
}
