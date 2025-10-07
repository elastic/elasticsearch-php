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

namespace Elastic\Elasticsearch\Tests\Helper\Esql;

use Elastic\Elasticsearch\Helper\Esql\Query;
use Elastic\Elasticsearch\Helper\Esql\Expression;
use PHPUnit\Framework\TestCase;

class EsqlTest extends TestCase
{
    public function testFrom(): void
    {
   $query = Query::from("employees");
        $this->assertEquals(
            "FROM employees\n",
            $query->__toString()
        );

        $query = Query::from("<logs-{now/d}>");
        $this->assertEquals(
            "FROM <logs-{now/d}>\n",
            $query->__toString()
        );

        $query = Query::from("employees-00001", "other-employees-*");
        $this->assertEquals(
            "FROM employees-00001, other-employees-*\n",
            $query->__toString()
        );

        $query = Query::from("cluster_one:employees-00001", "cluster_two:other-employees-*");
        $this->assertEquals(
            "FROM cluster_one:employees-00001, cluster_two:other-employees-*\n",
            $query->__toString()
        );

        $query = Query::from("employees")->metadata("_id");
        $this->assertEquals(
            "FROM employees METADATA _id\n",
            $query->__toString()
        );
    }

    public function testRow(): void
    {
        $query = Query::row(a: 1, b: "two", c: null);
        $this->assertEquals(
            "ROW a = 1, b = \"two\", c = null\n",
            $query->__toString()
        );

        $query = Query::row(a: [2, 1]);
        $this->assertEquals(
            "ROW a = [2,1]\n",
            $query->__toString()
        );
    }

    public function testShow(): void
    {
        $query = Query::show("INFO");
        $this->assertEquals(
            "SHOW INFO\n",
            $query->__toString()
        );
    }

    public function testChangePoint(): void
    {
        $query = Query::row(key: range(1, 25))
            ->mvExpand("key")
            ->eval(value: "CASE(key < 13, 0, 42)")
            ->changePoint("value")
            ->on("key")
            ->where("type IS NOT NULL");
        $this->assertEquals(<<<ESQL
            ROW key = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25]
            | MV_EXPAND key
            | EVAL value = CASE(key < 13, 0, 42)
            | CHANGE_POINT value ON key
            | WHERE type IS NOT NULL\n
            ESQL,
            $query->__toString()
        );
    }

    public function testCompletion(): void
    {
        $query = Query::row(question: "What is Elasticsearch?")
            ->completion("question")->with("test_completion_model")
            ->keep("question", "completion");
        $this->assertEquals(<<<ESQL
            ROW question = "What is Elasticsearch?"
            | COMPLETION question WITH {"inference_id":"test_completion_model"}
            | KEEP question, completion\n
            ESQL,
            $query->__toString()
        );

        $query = Query::row(question: "What is Elasticsearch?")
            ->completion(answer: "question")->with("test_completion_model")
            ->keep("question", "answer");
        $this->assertEquals(<<<ESQL
            ROW question = "What is Elasticsearch?"
            | COMPLETION answer = question WITH {"inference_id":"test_completion_model"}
            | KEEP question, answer\n
            ESQL,
            $query->__toString()
        );

        $query = Query::from("movies")
            ->sort("rating DESC")
            ->limit(10)
            ->eval(prompt: "CONCAT(\n" .
                "      \"Summarize this movie using the following information: \\n\",\n" .
                "      \"Title: \", title, \"\\n\",\n" .
                "      \"Synopsis: \", synopsis, \"\\n\",\n" .
                "      \"Actors: \", MV_CONCAT(actors, \", \"), \"\\n\",\n" .
                "  )"
            )
            ->completion(summary: "prompt")->with("test_completion_model")
            ->keep("title", "summary", "rating");
        $this->assertEquals(<<<ESQL
            FROM movies
            | SORT rating DESC
            | LIMIT 10
            | EVAL prompt = CONCAT(
                  "Summarize this movie using the following information: \\n",
                  "Title: ", title, "\\n",
                  "Synopsis: ", synopsis, "\\n",
                  "Actors: ", MV_CONCAT(actors, ", "), "\\n",
              )
            | COMPLETION summary = prompt WITH {"inference_id":"test_completion_model"}
            | KEEP title, summary, rating\n
            ESQL,
            $query->__toString()
        );
    }

    public function testDissect(): void
    {
        $query = Query::row(a: "2023-01-23T12:15:00.000Z - some text - 127.0.0.1")
            ->dissect("a", "%{date} - %{msg} - %{ip}")
            ->keep("date", "msg", "ip");
        $this->assertEquals(<<<ESQL
            ROW a = "2023-01-23T12:15:00.000Z - some text - 127.0.0.1"
            | DISSECT a "%{date} - %{msg} - %{ip}"
            | KEEP date, msg, ip\n
            ESQL,
            $query->__toString()
        );
    }

    public function testDrop(): void
    {
        $query = Query::from("employees")->drop("height");
        $this->assertEquals("FROM employees\n| DROP height\n", $query->__toString());
        $query = Query::from("employees")->drop("height*");
        $this->assertEquals("FROM employees\n| DROP height*\n", $query->__toString());
    }

    public function testEnrich(): void
    {
        $query = Query::row(language_code: "1")->enrich("languages_policy");
        $this->assertEquals(<<<ESQL
            ROW language_code = "1"
            | ENRICH languages_policy\n
            ESQL,
            $query->__toString()
        );
        $query = Query::row(language_code: "1")->enrich("languages_policy")->on("a");
        $this->assertEquals(<<<ESQL
            ROW language_code = "1"
            | ENRICH languages_policy ON a\n
            ESQL,
            $query->__toString()
        );
        $query = Query::row(language_code: "1")
            ->enrich("languages_policy")->on("a")->with(name: "language_name");
        $this->assertEquals(<<<ESQL
            ROW language_code = "1"
            | ENRICH languages_policy ON a WITH name = language_name\n
            ESQL,
            $query->__toString()
        );
    }

    public function testEval(): void
    {
        $query = Query::from("employees")
            ->sort("emp_no")
            ->keep("first_name", "last_name", "height")
            ->eval(height_feet: "height * 3.281", height_cm: "height * 100");
        $this->assertEquals(<<<ESQL
            FROM employees
            | SORT emp_no
            | KEEP first_name, last_name, height
            | EVAL height_feet = height * 3.281, height_cm = height * 100\n
            ESQL,
            $query->__toString()
        );
        $query = Query::from("employees")
            ->sort("emp_no")
            ->keep("first_name", "last_name", "height")
            ->eval("height * 3.281");
        $this->assertEquals(<<<ESQL
            FROM employees
            | SORT emp_no
            | KEEP first_name, last_name, height
            | EVAL height * 3.281\n
            ESQL,
            $query->__toString()
        );
        $query = Query::from("employees")
            ->eval("height * 3.281")
            ->stats(avg_height_feet: "AVG(`height * 3.281`)");
        $this->assertEquals(<<<ESQL
            FROM employees
            | EVAL height * 3.281
            | STATS avg_height_feet = AVG(`height * 3.281`)\n
            ESQL,
            $query->__toString()
        );
    }

    public function testFork(): void
    {
        $query = Query::from("employees")
            ->fork(
                Query::branch()->where("emp_no == 10001"),
                Query::branch()->where("emp_no == 10002"),
            )
            ->keep("emp_no", "_fork")
            ->sort("emp_no");
        $this->assertEquals(<<<ESQL
            FROM employees
            | FORK ( WHERE emp_no == 10001 )
                   ( WHERE emp_no == 10002 )
            | KEEP emp_no, _fork
            | SORT emp_no\n
            ESQL,
            $query->__toString()
        );
    }

    public function testGrok(): void
    {
        $query = Query::row(a: "2023-01-23T12:15:00.000Z 127.0.0.1 some.email@foo.com 42")
            ->grok(
                "a",
                "%{TIMESTAMP_ISO8601:date} %{IP:ip} %{EMAILADDRESS:email} %{NUMBER:num}",
            )
            ->keep("date", "ip", "email", "num");
        $this->assertEquals(<<<ESQL
            ROW a = "2023-01-23T12:15:00.000Z 127.0.0.1 some.email@foo.com 42"
            | GROK a "%{TIMESTAMP_ISO8601:date} %{IP:ip} %{EMAILADDRESS:email} %{NUMBER:num}"
            | KEEP date, ip, email, num\n
            ESQL,
            $query->__toString()
        );
        $query = Query::row(a: "2023-01-23T12:15:00.000Z 127.0.0.1 some.email@foo.com 42")
            ->grok(
                "a",
                "%{TIMESTAMP_ISO8601:date} %{IP:ip} %{EMAILADDRESS:email} %{NUMBER:num:int}",
            )
            ->keep("date", "ip", "email", "num")
            ->eval(date: "TO_DATETIME(date)");
        $this->assertEquals(<<<ESQL
            ROW a = "2023-01-23T12:15:00.000Z 127.0.0.1 some.email@foo.com 42"
            | GROK a "%{TIMESTAMP_ISO8601:date} %{IP:ip} %{EMAILADDRESS:email} %{NUMBER:num:int}"
            | KEEP date, ip, email, num
            | EVAL date = TO_DATETIME(date)\n
            ESQL,
            $query->__toString()
        );
        $query = Query::from("addresses")
            ->keep("city.name", "zip_code")
            ->grok("zip_code", "%{WORD:zip_parts} %{WORD:zip_parts}");
        $this->assertEquals(<<<ESQL
            FROM addresses
            | KEEP city.name, zip_code
            | GROK zip_code "%{WORD:zip_parts} %{WORD:zip_parts}"\n
            ESQL,
            $query->__toString()
        );
    }

    public function testKeep(): void
    {
        $query = Query::from("employees")
            ->keep("emp_no", "first_name", "last_name", "height");
        $this->assertEquals(<<<ESQL
            FROM employees
            | KEEP emp_no, first_name, last_name, height\n
            ESQL,
            $query->__toString()
        );
        $query = Query::from("employees")
            ->keep("h*");
        $this->assertEquals(<<<ESQL
            FROM employees
            | KEEP h*\n
            ESQL,
            $query->__toString()
        );
        $query = Query::from("employees")
            ->keep("h*", "first_name");
        $this->assertEquals(<<<ESQL
            FROM employees
            | KEEP h*, first_name\n
            ESQL,
            $query->__toString()
        );
    }

    public function testLimit(): void
    {
        $query = Query::from("index")
            ->where("field == \"value\"")
            ->limit(1000);
        $this->assertEquals(<<<ESQL
            FROM index
            | WHERE field == "value"
            | LIMIT 1000\n
            ESQL,
            $query->__toString()
        );
        $query = Query::from("index")
            ->stats("AVG(field1)")->by("field2")
            ->limit(20000);
        $this->assertEquals(<<<ESQL
            FROM index
            | STATS AVG(field1)
                    BY field2
            | LIMIT 20000\n
            ESQL,
            $query->__toString()
        );
    }

    public function testLookupJoin(): void
    {
        $query = Query::from("firewall_logs")
            ->lookupJoin("threat_list")->on("source.IP")
            ->where("threat_level IS NOT NULL");
        $this->assertEquals(<<<ESQL
            FROM firewall_logs
            | LOOKUP JOIN threat_list ON source.IP
            | WHERE threat_level IS NOT NULL\n
            ESQL,
            $query->__toString()
        );
        $query = Query::from("system_metrics")
            ->lookupJoin("host_inventory")->on("host.name")
            ->lookupJoin("ownerships")->on("host.name");
        $this->assertEquals(<<<ESQL
            FROM system_metrics
            | LOOKUP JOIN host_inventory ON host.name
            | LOOKUP JOIN ownerships ON host.name\n
            ESQL,
            $query->__toString()
        );
        $query = Query::from("app_logs")
            ->lookupJoin("service_owners")->on("service_id");
        $this->assertEquals(<<<ESQL
            FROM app_logs
            | LOOKUP JOIN service_owners ON service_id\n
            ESQL,
            $query->__toString()
        );
        $query = Query::from("employees")
            ->eval(language_code: "languages")
            ->where("emp_no >= 10091", "emp_no < 10094")
            ->lookupJoin("languages_lookup")->on("language_code");
        $this->assertEquals(<<<ESQL
            FROM employees
            | EVAL language_code = languages
            | WHERE emp_no >= 10091 AND emp_no < 10094
            | LOOKUP JOIN languages_lookup ON language_code\n
            ESQL,
            $query->__toString()
        );
    }

    public function testMvExpand(): void
    {
        $query = Query::row(a: [1, 2, 3], b: "b", j: ["a", "b"])
            ->mvExpand("a");
        $this->assertEquals(<<<ESQL
            ROW a = [1,2,3], b = "b", j = ["a","b"]
            | MV_EXPAND a\n
            ESQL,
            $query->__toString()
        );
    }

    public function testRename(): void
    {
        $query = Query::from("employees")
            ->keep("first_name", "last_name", "still_hired")
            ->rename(still_hired: "employed");
        $this->assertEquals(<<<ESQL
            FROM employees
            | KEEP first_name, last_name, still_hired
            | RENAME still_hired AS employed\n
            ESQL,
            $query->__toString()
        );
    }

    public function testRerank(): void
    {
        $query = Query::from("books")->metadata("_score")
            ->where("MATCH(description, \"hobbit\")")
            ->sort("_score DESC")
            ->limit(100)
            ->rerank("hobbit")->on("description")->with("test_reranker")
            ->limit(3)
            ->keep("title", "_score");
        $this->assertEquals(<<<ESQL
            FROM books METADATA _score
            | WHERE MATCH(description, "hobbit")
            | SORT _score DESC
            | LIMIT 100
            | RERANK "hobbit" ON description WITH {"inference_id":"test_reranker"}
            | LIMIT 3
            | KEEP title, _score\n
            ESQL,
            $query->__toString()
        );
        $query = Query::from("books")->metadata("_score")
            ->where("MATCH(description, \"hobbit\") OR MATCH(author, \"Tolkien\")")
            ->sort("_score DESC")
            ->limit(100)
            ->rerank(rerank_score: "hobbit")->on("description", "author")->with("test_reranker")
            ->sort("rerank_score")
            ->limit(3)
            ->keep("title", "_score", "rerank_score");
        $this->assertEquals(<<<ESQL
            FROM books METADATA _score
            | WHERE MATCH(description, "hobbit") OR MATCH(author, "Tolkien")
            | SORT _score DESC
            | LIMIT 100
            | RERANK rerank_score = "hobbit" ON description, author WITH {"inference_id":"test_reranker"}
            | SORT rerank_score
            | LIMIT 3
            | KEEP title, _score, rerank_score\n
            ESQL,
            $query->__toString()
        );
        $query = Query::from("books")->metadata("_score")
            ->where("MATCH(description, \"hobbit\") OR MATCH(author, \"Tolkien\")")
            ->sort("_score DESC")
            ->limit(100)
            ->rerank(rerank_score: "hobbit")->on("description", "author")->with("test_reranker")
            ->eval(original_score: "_score", _score: "rerank_score + original_score")
            ->sort("_score")
            ->limit(3)
            ->keep("title", "original_score", "rerank_score", "_score");
        $this->assertEquals(<<<ESQL
            FROM books METADATA _score
            | WHERE MATCH(description, "hobbit") OR MATCH(author, "Tolkien")
            | SORT _score DESC
            | LIMIT 100
            | RERANK rerank_score = "hobbit" ON description, author WITH {"inference_id":"test_reranker"}
            | EVAL original_score = _score, _score = rerank_score + original_score
            | SORT _score
            | LIMIT 3
            | KEEP title, original_score, rerank_score, _score\n
            ESQL,
            $query->__toString()
        );
    }

    public function testSample(): void
    {
        $query = Query::from("employees")
            ->keep("emp_no")
            ->sample(0.05);
        $this->assertEquals(<<<ESQL
            FROM employees
            | KEEP emp_no
            | SAMPLE 0.05\n
            ESQL,
            $query->__toString()
        );
    }

    public function testSort(): void
    {
        $query = Query::from("employees")
            ->keep("first_name", "last_name", "height")
            ->sort("height");
        $this->assertEquals(<<<ESQL
            FROM employees
            | KEEP first_name, last_name, height
            | SORT height\n
            ESQL,
            $query->__toString()
        );
        $query = Query::from("employees")
            ->keep("first_name", "last_name", "height")
            ->sort("height DESC");
        $this->assertEquals(<<<ESQL
            FROM employees
            | KEEP first_name, last_name, height
            | SORT height DESC\n
            ESQL,
            $query->__toString()
        );
        $query = Query::from("employees")
            ->keep("first_name", "last_name", "height")
            ->sort("height DESC", "first_name ASC");
        $this->assertEquals(<<<ESQL
            FROM employees
            | KEEP first_name, last_name, height
            | SORT height DESC, first_name ASC\n
            ESQL,
            $query->__toString()
        );
        $query = Query::from("employees")
            ->keep("first_name", "last_name", "height")
            ->sort("first_name ASC NULLS FIRST");
        $this->assertEquals(<<<ESQL
            FROM employees
            | KEEP first_name, last_name, height
            | SORT first_name ASC NULLS FIRST\n
            ESQL,
            $query->__toString()
        );
    }

    public function testStats(): void
    {
        $query = Query::from("employees")
            ->stats(count: "COUNT(emp_no)")->by("languages")
            ->sort("languages");
        $this->assertEquals(<<<ESQL
            FROM employees
            | STATS count = COUNT(emp_no)
                    BY languages
            | SORT languages\n
            ESQL,
            $query->__toString()
        );
        $query = Query::from("employees")
            ->stats(avg_lang: "AVG(languages)");
        $this->assertEquals(<<<ESQL
            FROM employees
            | STATS avg_lang = AVG(languages)\n
            ESQL,
            $query->__toString()
        );
        $query = Query::from("employees")
            ->stats(
                avg_lang: "AVG(languages)",
                max_lang: "MAX(languages)",
            );
        $this->assertEquals(<<<ESQL
            FROM employees
            | STATS avg_lang = AVG(languages),
                    max_lang = MAX(languages)\n
            ESQL,
            $query->__toString()
        );
        $query = Query::from("employees")
            ->stats(
                avg50s: "AVG(salary) WHERE birth_date < \"1960-01-01\"",
                avg60s: "AVG(salary) WHERE birth_date >= \"1960-01-01\""
            )->by("gender")
            ->sort("gender");
        $this->assertEquals(<<<ESQL
            FROM employees
            | STATS avg50s = AVG(salary) WHERE birth_date < "1960-01-01",
                    avg60s = AVG(salary) WHERE birth_date >= "1960-01-01"
                    BY gender
            | SORT gender\n
            ESQL,
            $query->__toString()
        );
        $query = Query::from("employees")
            ->eval(Ks: "salary / 1000")
            ->stats(
                under_40K: "COUNT(*) WHERE Ks < 40",
                inbetween: "COUNT(*) WHERE (40 <= Ks) AND (Ks < 60)",
                over_60K: "COUNT(*) WHERE 60 <= Ks",
                total: "COUNT(*)",
            );
        $this->assertEquals(<<<ESQL
            FROM employees
            | EVAL Ks = salary / 1000
            | STATS under_40K = COUNT(*) WHERE Ks < 40,
                    inbetween = COUNT(*) WHERE (40 <= Ks) AND (Ks < 60),
                    over_60K = COUNT(*) WHERE 60 <= Ks,
                    total = COUNT(*)\n
            ESQL,
            $query->__toString()
        );
        $query = Query::row(i: 1, a: ["a", "b"])
            ->stats("MIN(i)")->by("a")
            ->sort("a ASC");
        $this->assertEquals(<<<ESQL
            ROW i = 1, a = ["a","b"]
            | STATS MIN(i)
                    BY a
            | SORT a ASC\n
            ESQL,
            $query->__toString()
        );
        $query = Query::from("employees")
            ->eval(hired: "DATE_FORMAT(\"yyyy\", hire_date)")
            ->stats(avg_salary: "AVG(salary)")->by("hired", "languages.long")
            ->eval(avg_salary: "ROUND(avg_salary)")
            ->sort("hired", "languages.long");
        $this->assertEquals(<<<ESQL
            FROM employees
            | EVAL hired = DATE_FORMAT("yyyy", hire_date)
            | STATS avg_salary = AVG(salary)
                    BY hired, languages.long
            | EVAL avg_salary = ROUND(avg_salary)
            | SORT hired, languages.long\n
            ESQL,
            $query->__toString()
        );
    }

    public function testWhere(): void
    {
        $query = Query::from("employees")
            ->keep("first_name", "last_name", "still_hired")
            ->where("still_hired == true");
        $this->assertEquals(<<<ESQL
            FROM employees
            | KEEP first_name, last_name, still_hired
            | WHERE still_hired == true\n
            ESQL,
            $query->__toString()
        );
        $query = Query::from("sample_data")
            ->where("@timestamp > NOW() - 1 hour");
        $this->assertEquals(<<<ESQL
            FROM sample_data
            | WHERE @timestamp > NOW() - 1 hour\n
            ESQL,
            $query->__toString()
        );
        $query = Query::from("employees")
            ->keep("first_name", "last_name", "height")
            ->where("LENGTH(first_name) < 4");
        $this->assertEquals(<<<ESQL
            FROM employees
            | KEEP first_name, last_name, height
            | WHERE LENGTH(first_name) < 4\n
            ESQL,
            $query->__toString()
        );
    }
}
