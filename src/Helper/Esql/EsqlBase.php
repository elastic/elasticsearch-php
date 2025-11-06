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
    private ?EsqlBase $previous_command = null;

    /**
     * Formatting helper that renders an identifier using proper escaping rules.
     * Used by several ES|QL commands.
     */
    protected function formatId(string $id, bool $allow_patterns = false): string
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

    /**
     * Formatting helper that renders an associative array as needed by ES|QL.
     * Used by several ES|QL commands.
     */
    protected function formatKeyValues(
        array $map, string $joinText = "=",
        string $implodeText = ", ",
        bool $jsonEncode = false): string
    {
        return implode($implodeText, array_map(
            function(string $key, mixed $value) use ($joinText) {
                return $key . " " . $joinText . " " . $value;
            },
            array_keys($map),
            array_map($jsonEncode ? 'json_encode' : array($this, 'formatId'), $map),
        ));
    }

    /**
     * Helper function that checks if the arguments are positional or named.
     * Used by several ES|QL commands.
     */
    protected function isNamedArgumentList(array $args): bool {
        $named_count = array_sum(array_map('is_string', array_keys($args)));
        if ($named_count == sizeof($args)) {
            return true;
        }
        if ($named_count != 0) {
            throw new RuntimeException("foo");
        }
        return false;
    }

    /**
     * Helper function that checks if a forking command has been issued already.
     */
    protected function isForked(): bool
    {
        if (get_class($this) == "ForkCommand") {
            return true;
        }
        if ($this->previous_command) {
            return $this->previous_command->isForked();
        }
        return false;
    }

    public function __construct(?EsqlBase $previous_command)
    {
        $this->previous_command = $previous_command;
    }

    /**
     * Render the ES|QL command to a string.
     */
    public function render(): string
    {
        $query = "";
        if ($this->previous_command) {
            $query .= $this->previous_command->render() . "\n| ";
        }
        $query .= $this->renderInternal();
        return $query;
    }

    /**
     * Abstract method implemented by all the command subclasses.
     */
    protected abstract function renderInternal(): string;

    public function __toString(): string
    {
        return $this->render() . "\n";
    }

    /**
     * `CHANGE_POINT` detects spikes, dips, and change points in a metric.
     *
     * @param string $value The column with the metric in which you want to
     *                      detect a change point.
     *
     * Examples:
     *
     *     $query = Query::row(key: range(1, 25))
     *         ->mvExpand("key")
     *         ->eval(value: "CASE(key < 13, 0, 42)")
     *         ->changePoint("value")
     *         ->on("key")
     *         ->where("type IS NOT NULL");
     */
    public function changePoint(string $value): ChangePointCommand
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
     *     $query1 = Query::row(question: "What is Elasticsearch?")
     *         ->completion("question")->with("test_completion_model")
     *         ->keep("question", "completion");
     *     $query2 = Query::row(question: "What is Elasticsearch?")
     *         ->completion(answer: "question")->with("test_completion_model")
     *         ->keep("question", "answer");
     *     $query3 = Query::from("movies")
     *         ->sort("rating DESC")
     *         ->limit(10)
     *         ->eval(prompt: "CONCAT(\n" .
     *             "      \"Summarize this movie using the following information: \\n\",\n" .
     *             "      \"Title: \", title, \"\\n\",\n" .
     *             "      \"Synopsis: \", synopsis, \"\\n\",\n" .
     *             "      \"Actors: \", MV_CONCAT(actors, \", \"), \"\\n\",\n" .
     *             "  )"
     *         )
     *         ->completion(summary: "prompt")->with("test_completion_model")
     *         ->keep("title", "summary", "rating");
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
     *     $query = Query::row(a: "2023-01-23T12:15:00.000Z - some text - 127.0.0.1")
     *         ->dissect("a", "%{date} - %{msg} - %{ip}")
     *         ->keep("date", "msg", "ip");
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
     *     $query1 = Query::from("employees")->drop("height");
     *     $query2 = Query::from("employees")->drop("height*");
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
     *     $query1 = Query::row(language_code: "1")
     *         ->enrich("languages_policy");
     *     $query2 = Query::row(language_code: "1")
     *         ->enrich("languages_policy")->on("a");
     *     $query3 = Query::row(language_code: "1")
     *         ->enrich("languages_policy")->on("a")->with(name: "language_name");
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
     *     $query1 = Query::from("employees")
     *         ->sort("emp_no")
     *         ->keep("first_name", "last_name", "height")
     *         ->eval(height_feet: "height * 3.281", height_cm: "height * 100");
     *     $query2 = Query::from("employees")
     *         ->sort("emp_no")
     *         ->keep("first_name", "last_name", "height")
     *         ->eval("height * 3.281");
     *     $query3 = Query::from("employees")
     *         ->eval("height * 3.281")
     *         ->stats(avg_height_feet: "AVG(`height * 3.281`)");
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
     *     $query = Query::from("employees")
     *         ->fork(
     *             Query::branch()->where("emp_no == 10001"),
     *             Query::branch()->where("emp_no == 10002"),
     *         )
     *         ->keep("emp_no", "_fork")
     *         ->sort("emp_no");
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
        if ($this->isForked()) {
            throw new RuntimeException("a query can only have one fork");
        }
        return new ForkCommand($this, $fork1, $fork2, $fork3, $fork4, $fork5, $fork6, $fork7, $fork8);
    }

    /**
     * The `FUSE` processing command merges rows from multiple result sets and assigns
     * new relevance scores.
     *
     * @param string $method Defaults to `RRF`. Can be one of `RRF` (for Reciprocal Rank Fusion)
     *                       or `LINEAR` (for linear combination of scores). Designates which
     *                       method to use to assign new relevance scores.
     *
     * Examples:
     *
     */
    public function fuse(string $method = ""): FuseCommand
    {
        return new FuseCommand($this, $method);
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
     *     $query1 = Query::row(a: "2023-01-23T12:15:00.000Z 127.0.0.1 some.email@foo.com 42")
     *         ->grok(
     *             "a",
     *             "%{TIMESTAMP_ISO8601:date} %{IP:ip} %{EMAILADDRESS:email} %{NUMBER:num}",
     *         )
     *         ->keep("date", "ip", "email", "num");
     *     $query2 = Query::row(a: "2023-01-23T12:15:00.000Z 127.0.0.1 some.email@foo.com 42")
     *         ->grok(
     *             "a",
     *             "%{TIMESTAMP_ISO8601:date} %{IP:ip} %{EMAILADDRESS:email} %{NUMBER:num:int}",
     *         )
     *         ->keep("date", "ip", "email", "num")
     *         ->eval(date: "TO_DATETIME(date)");
     *     $query3 = Query::from("addresses")
     *         ->keep("city.name", "zip_code")
     *         ->grok("zip_code", "%{WORD:zip_parts} %{WORD:zip_parts}");
     */
    public function grok(string $input, string $pattern): GrokCommand
    {
        return new GrokCommand($this, $input, $pattern);
    }

    /**
     * The `INLINE STATS` processing command groups rows according to a common value
     * and calculates one or more aggregated values over the grouped rows.
     *
     * The command is identical to ``STATS`` except that it preserves all the columns from
     * the input table.
     *
     * @param string ...$expressions A list of boolean expressions, given as
     *                               positional or named arguments. These
     *                               expressions are combined with an `AND`
     *                               logical operator.
     *
     * Examples:
     */
    public function inlineStats(string ...$expressions): InlineStatsCommand
    {
        return new InlineStatsCommand($this, $expressions);
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
     *     $query1 = Query::from("employees")
     *         ->keep("emp_no", "first_name", "last_name", "height");
     *     $query2 = Query::from("employees")
     *         ->keep("h*");
     *     $query3 = Query::from("employees")
     *         ->keep("h*", "first_name");
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
     *     $query1 = Query::from("index")
     *         ->where("field == \"value\"")
     *         ->limit(1000);
     *     $query2 = Query::from("index")
     *         ->stats("AVG(field1)")->by("field2")
     *         ->limit(20000);
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
     *     $query1 = Query::from("firewall_logs")
     *         ->lookupJoin("threat_list")->on("source.IP")
     *         ->where("threat_level IS NOT NULL");
     *     $query2 = Query::from("system_metrics")
     *         ->lookupJoin("host_inventory")->on("host.name")
     *         ->lookupJoin("ownerships")->on("host.name");
     *     $query3 = Query::from("app_logs")
     *         ->lookupJoin("service_owners")->on("service_id");
     *     $query4 = Query::from("employees")
     *         ->eval(language_code: "languages")
     *         ->where("emp_no >= 10091", "emp_no < 10094")
     *         ->lookupJoin("languages_lookup")->on("language_code");
     */
    public function lookupJoin(string $lookup_index): LookupJoinCommand
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
     *     $query = Query::row(a: [1, 2, 3], b: "b", j: ["a", "b"])
     *         ->mvExpand("a");
     */
    public function mvExpand(string $column): MvExpandCommand
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
     *     $query = Query::from("employees")
     *         ->keep("first_name", "last_name", "still_hired")
     *         ->rename(still_hired: "employed");
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
     *     $query1 = Query::from("books")->metadata("_score")
     *         ->where("MATCH(description, \"hobbit\")")
     *         ->sort("_score DESC")
     *         ->limit(100)
     *         ->rerank("hobbit")->on("description")->with("test_reranker")
     *         ->limit(3)
     *         ->keep("title", "_score");
     *     $query2 = Query::from("books")->metadata("_score")
     *         ->where("MATCH(description, \"hobbit\") OR MATCH(author, \"Tolkien\")")
     *         ->sort("_score DESC")
     *         ->limit(100)
     *         ->rerank(rerank_score: "hobbit")->on("description", "author")->with("test_reranker")
     *         ->sort("rerank_score")
     *         ->limit(3)
     *         ->keep("title", "_score", "rerank_score");
     *     $query3 = Query::from("books")->metadata("_score")
     *         ->where("MATCH(description, \"hobbit\") OR MATCH(author, \"Tolkien\")")
     *         ->sort("_score DESC")
     *         ->limit(100)
     *         ->rerank(rerank_score: "hobbit")->on("description", "author")->with("test_reranker")
     *         ->eval(original_score: "_score", _score: "rerank_score + original_score")
     *         ->sort("_score")
     *         ->limit(3)
     *         ->keep("title", "original_score", "rerank_score", "_score");
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
     *     $query = Query::from("employees")
     *         ->keep("emp_no")
     *         ->sample(0.05);
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
     *     $query1 = Query::from("employees")
     *         ->keep("first_name", "last_name", "height")
     *         ->sort("height");
     *     $query2 = Query::from("employees")
     *         ->keep("first_name", "last_name", "height")
     *         ->sort("height DESC");
     *     $query3 = Query::from("employees")
     *         ->keep("first_name", "last_name", "height")
     *         ->sort("height DESC", "first_name ASC");
     *     $query4 = Query::from("employees")
     *         ->keep("first_name", "last_name", "height")
     *         ->sort("first_name ASC NULLS FIRST");
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
     * Examples:
     * 
     *     $query1 = Query::from("employees")
     *         ->stats(count: "COUNT(emp_no)")->by("languages")
     *         ->sort("languages");
     *     $query2 = Query::from("employees")
     *         ->stats(avg_lang: "AVG(languages)");
     *     $query3 = Query::from("employees")
     *         ->stats(
     *             avg_lang: "AVG(languages)",
     *             max_lang: "MAX(languages)",
     *         );
     *     $query4 = Query::from("employees")
     *         ->stats(
     *             avg50s: "AVG(salary) WHERE birth_date < \"1960-01-01\"",
     *             avg60s: "AVG(salary) WHERE birth_date >= \"1960-01-01\""
     *         )->by("gender")
     *         ->sort("gender");
     *     $query5 = Query::from("employees")
     *         ->eval(Ks: "salary / 1000")
     *         ->stats(
     *             under_40K: "COUNT(*) WHERE Ks < 40",
     *             inbetween: "COUNT(*) WHERE (40 <= Ks) AND (Ks < 60)",
     *             over_60K: "COUNT(*) WHERE 60 <= Ks",
     *             total: "COUNT(*)",
     *         );
     *     $query6 = Query::row(i: 1, a: ["a", "b"])
     *         ->stats("MIN(i)")->by("a")
     *         ->sort("a ASC");
     *     $query7 = Query::from("employees")
     *         ->eval(hired: "DATE_FORMAT(\"yyyy\", hire_date)")
     *         ->stats(avg_salary: "AVG(salary)")->by("hired", "languages.long")
     *         ->eval(avg_salary: "ROUND(avg_salary)")
     *         ->sort("hired", "languages.long");
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
     *     $query1 = Query::from("employees")
     *         ->keep("first_name", "last_name", "still_hired")
     *         ->where("still_hired == true");
     *     $query2 = Query::from("sample_data")
     *         ->where("@timestamp > NOW() - 1 hour");
     *     $query3 = Query::from("employees")
     *         ->keep("first_name", "last_name", "height")
     *         ->where("LENGTH(first_name) < 4");
     */
    public function where(string ...$expressions): WhereCommand
    {
        return new WhereCommand($this, $expressions);
    }
}
