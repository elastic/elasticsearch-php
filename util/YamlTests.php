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

namespace Elastic\Elasticsearch\Util;

use Exception;
use ParseError;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use stdClass;
use Throwable;

use function yaml_parse;

class YamlTests
{
    const TEMPLATE_UNIT_TEST_OSS     = __DIR__ . '/template/test/unit-test-oss';
    const TEMPLATE_UNIT_TEST_XPACK   = __DIR__ . '/template/test/unit-test-xpack';
    const TEMPLATE_UNIT_TEST_SKIPPED = __DIR__ . '/template/test/unit-test-skipped';
    const TEMPLATE_FUNCTION_TEST     = __DIR__ . '/template/test/function-test';
    const TEMPLATE_FUNCTION_SKIPPED  = __DIR__ . '/template/test/function-skipped';
    const ELASTICSEARCH_GIT_URL      = 'https://github.com/elastic/elasticsearch/tree/%s/rest-api-spec/src/main/resources/rest-api-spec/test/%s';

    const YAML_FILES_TO_OMIT = [
        'platinum/eql/10_basic.yml',
        // use of _internal APIs
        'free/cluster.desired_nodes/10_basic.yml',
        'free/cluster.desired_nodes/20_dry_run.yml',
        'free/health/',
        'free/cluster.desired_balance/10_basic.yml',
        'free/cluster.prevalidate_node_removal/10_basic.yml'
    ];

    const SKIPPED_TEST_OSS = [
        'Aggregations\_HistogramTest::HistogramProfiler' => "[histogram] field doesn't support values of type: VALUE_BOOLEAN",
        'Aggregations\_Percentiles_BucketTest::*' => 'Array index with float',
        'Aggregations\_Time_SeriesTest::BasicTest' => 'Unknown aggregation type [time_series]',
        'Cat\Nodeattrs\_10_BasicTest::TestCatNodesAttrsOutput' => 'Regexp error, it seems not compatible with PHP',
        'Cat\Shards\_10_BasicTest::TestCatShardsOutput' => 'Regexp error, it seems not compatible with PHP',
        'Cat\Templates\_10_BasicTest::FilteredTemplates' => 'regex mismatch',
        'Cat\Templates\_10_BasicTest::SelectColumns' => 'regex mismatch',
        'FieldCaps\_50_Fieldtype_FilterTest::*' => 'Bool mismatch',
        'Indices\GetAlias\_10_BasicTest::GetAliasAgainstClosedIndices' => 'Failed asserting that true is false',
        'Indices\GetIndexTemplate\_10_BasicTest::*' => 'Bool mismatch',
        'Indices\PutTemplate\_10_BasicTest::PutTemplateCreate' => 'index_template [test] already exists',
        'Indices\Refresh\_10_BasicTest::IndicesRefreshTestEmptyArray' => 'empty array?',
        'Indices\SimulateIndexTemplate\_10_BasicTest::SimulateIndexTemplateWithIndexNotMatchingAnyTemplate' => 'Bool mismatch',
        'Snapshot\Create\_10_BasicTest::CreateASnapshot' => 'Invalid snapshot name [test_snapshot]',
        'Snapshot\Create\_10_BasicTest::CreateASnapshotAndCleanUpRepository' => 'Invalid snapshot name [test_snapshot]',
        'Tsdb\_20_MappingTest::UnsupportedMetricTypePosition' => 'Fixed in Elasticsearch 8.9',
    ];

    const SKIPPED_TEST_XPACK = [
        'ApiKey\_10_BasicTest::TestGetApiKey' => 'Mismatch values',
        'ApiKey\_20_QueryTest::TestQueryApiKey' => 'Mismatch values',
        'DataStream\_80_Resolve_Index_Data_StreamsTest::*' => 'Skipped all tests',
        'Health\_10_UsageTest::UsageStatsOnTheHealthAPI' => 'Undefined array key \"green\"',
        'License\_20_Put_LicenseTest::*' => 'License issue',
        'License\_30_Enterprise_LicenseTest::*' => 'Invalid license',
        'Ml\_Jobs_CrudTest::TestPutJobWithModel_memory_limitAsStringAndLazyOpen' => 'Memory limit',
        'Ml\_Data_Frame_Analytics_CrudTest::TestPutClassificationGivenNum_top_classesIsLessThanZero' => 'No error catched',
        'Ml\_Set_Upgrade_ModeTest::*' => 'Skipped all tests',
        'Ml\_Filter_CrudTest::*' => 'Skipped all tests',
        'Ml\_Inference_CrudTest::*' => 'Skipped all tests',
        'Ml\_Inference_Stats_CrudTest::*' => 'Skipped all tests',
        'Ml\_Ml_InfoTest::TestMlInfo' => 'response[\'limits\'][\'max_model_memory_limit\'] is not empty',
        'Ml\_Delete_Expired_DataTest::TestDeleteExpiredDataWithJobId' => 'Substring mismatch',
        'Ml\_Explain_Data_Frame_AnalyticsTest::TestNonemptyDataFrameGivenBody' => 'Expected a different value',
        'Ml\_Get_Trained_Model_StatsTest::*' => 'Skipped all tests',
        'Ml\_Get_Trained_Model_StatsTest::TestGetStatsGivenTrainedModels' => 'cannot assign model_alias',
        'Rollup\_Put_JobTest::TestPutJobWithTemplates' => 'version not converted from variable',
        'RuntimeFields\_100_Geo_PointTest::GetMapping' => 'Substring mismatch',
        'RuntimeFields\_10_KeywordTest::GetMapping' => 'Substring mismatch',
        'RuntimeFields\_10_KeywordTest::FetchFields' => 'Array mismatch',
        'RuntimeFields\_10_KeywordTest::Docvalue_fields' => 'Array mismatch',
        'RuntimeFields\_10_KeywordTest::ExplainTermQueryWrappedInScriptScore' => 'Substring mismatch',
        'RuntimeFields\_200_Runtime_Fields_StatsTest::UsageStatsWithRuntimeFields' => 'Count mismatch',
        'RuntimeFields\_20_LongTest::GetMapping' => 'String mismatch',
        'RuntimeFields\_30_DoubleTest::GetMapping' => 'Array mismatch',
        'RuntimeFields\_40_DateTest::GetMapping' => 'String mismatch',
        'RuntimeFields\_50_IpTest::GetMapping' => 'String mismatch',
        'RuntimeFields\_60_BooleanTest::GetMapping' => 'String mismatch',
        'SearchableSnapshots\_10_UsageTest::*' => 'Mismatch values',
        'SearchableSnapshots\_20_Synthetic_SourceTest::*' => 'no_shard_available_action_exception',
        'ServiceAccounts\_10_BasicTest::TestServiceAccountTokens' => 'Count mismatch',
        'Snapshot\_10_BasicTest::CreateASourceOnlySnapshotAndThenRestoreIt' => 'Snapshot name already exists',
        'Snapshot\_20_Operator_Privileges_DisabledTest::OperatorOnlySettingsCanBeSetAndRestoredByNonoperatorUserWhenOperatorPrivilegesIsDisabled' => 'Count mismatch',
        'Ssl\_10_BasicTest::TestGetSSLCertificates' => 'Mismatch values',
        'Token\_10_BasicTest::TestInvalidateUsersTokens' => 'Mismatch values',
        'Token\_10_BasicTest::TestInvalidateRealmsTokens' => 'Mismatch values',
        'Transform\_Transforms_CrudTest::TestDeleteTransformWhenItDoesNotExist' => 'Invalid version format: TRANSFORM HTTP/1.1',
        'UnsignedLong\*' => 'Skipped all tests',
        'Vectors\_30_Sparse_Vector_BasicTest::DeprecatedFunctionSignature' => 'Failed asserting contains string',
    ];

    const PHP_RESERVED_WORDS     = [
        'abstract', 'and', 'array', 'as', 'break', 'callable', 'case', 'catch',
        'class', 'clone', 'const', 'continue', 'declare', 'default', 'die', 'do',
        'echo', 'else', 'elseif', 'empty', 'enddeclare', 'endfor', 'endforeach',
        'endif', 'endswitch', 'endwhile', 'eval', 'exit', 'extends', 'final',
        'for', 'foreach', 'function', 'global', 'goto', 'if', 'implements',
        'include', 'include_once', 'instanceof', 'insteadof', 'interface',
        'isset', 'list', 'namespace', 'new', 'or', 'print', 'private',
        'protected', 'public', 'require', 'require_once', 'return', 'static',
        'switch', 'throw', 'trait', 'try', 'unset', 'use', 'var', 'while', 'xor'
    ];
    
    private $tests = [];
    private $testOutput;
    private $testDir;

    public static $esVersion;
    public static $minorEsVersion;
    public static $testSuite;

    public function __construct(string $testDir, string $testOutput, string $esVersion, string $testSuite)
    {
        if (!is_dir($testDir)) {
            throw new Exception(sprintf(
                "The directory %s specified does not exist",
                $testDir
            ));
        }
        if (file_exists($testOutput)) {
            $this->removeDirectory($testOutput);
        }
        self::$testSuite = ucfirst($testSuite);

        $this->testOutput = sprintf("%s/%s", $testOutput, self::$testSuite);
        $this->testDir = $testDir;
        $this->tests = $this->getAllTests($testDir);

        self::$esVersion = $esVersion;
        list($major, $minor, $patch) = explode('.',self::$esVersion);
        self::$minorEsVersion = sprintf("%s.%s", $major, $minor);
    }

    private function getAllTests(string $dir): array
    {
        $it = new RecursiveDirectoryIterator($dir);
        $parsed = [];
        // Iterate over the Yaml test files
        foreach (new RecursiveIteratorIterator($it) as $file) {
            if ($file->getExtension() !== 'yml') {
                continue;
            }
            $omit = false;
            foreach (self::YAML_FILES_TO_OMIT as $fileOmit) {
                if (false !== strpos($file->getPathname(), $fileOmit)) {
                    $omit = true;
                    break;
                }
            }
            if ($omit) {
                continue;
            }
            $content = file_get_contents($file->getPathname());
            $content = str_replace(' y:', " 'y':", $content); // replace y: with 'y': due the y/true conversion in YAML 1.1
            $content = str_replace(' n:', " 'n':", $content); // replace n: with 'n': due the n/false conversion in YAML 1.1
            try {
                $test = yaml_parse($content, -1, $ndocs, [
                    YAML_MAP_TAG => function($value, $tag, $flags) {
                        return empty($value) ? new stdClass : $value;
                    }
                ]);
            } catch (Throwable $e) {
                throw new Exception(sprintf(
                    "YAML parse error file %s: %s",
                    $file->getPathname(),
                    $e->getMessage()
                ));
            }
            if (false === $test) {
                throw new Exception(sprintf(
                    "YAML parse error file %s",
                    $file->getPathname()
                ));
            }
            $parsed[$file->getPathname()] = $test;
        }
        return $parsed;
    }

    public function build(): array
    {
        $numTest = 0;
        $numFile = 0;
        foreach ($this->tests as $testFile => $value) {
            $namespace = $this->extractTestNamespace($testFile);
            $testName = $this->extractTestName($testFile);
            $yamlFileName = substr($testFile, strlen($this->testDir) + 1);

            # Delete and create the output directory
            $testDirName = sprintf("%s/%s", $this->testOutput, str_replace ('\\', '/', $namespace));
            if (!is_dir($testDirName)) {
                mkdir ($testDirName, 0777, true);
            }

            $functions = '';
            $setup = '';
            $teardown = '';
            $alreadyAssignedNames = [];
            $allSkipped = false;
            foreach ($value as $test) {
                if (!is_array($test)) {
                    continue;
                }
                foreach ($test as $name => $actions) {
                    switch ($name) {
                        case 'setup':
                            $setup = (string) new ActionTest($actions);
                            break;
                        case 'teardown':
                            $teardown = (string) new ActionTest($actions);
                            break;
                        default:
                            $functionName = $this->filterFunctionName(ucwords($name), $alreadyAssignedNames);
                            $alreadyAssignedNames[] = $functionName;
                            
                            $skippedTest = sprintf("%s\\%s::%s", $namespace, $testName, $functionName);
                            $skippedAllTest = sprintf("%s\\%s::*", $namespace, $testName);
                            $skippedAllFiles = sprintf("%s\\*", $namespace);
                            $skip = strtolower(self::$testSuite) === 'free' 
                                ? self::SKIPPED_TEST_OSS 
                                : self::SKIPPED_TEST_XPACK;
                            if (isset($skip[$skippedAllFiles]) || isset($skip[$skippedAllTest])) {
                                $allSkipped = true;
                                $functions .= self::render(
                                    self::TEMPLATE_FUNCTION_SKIPPED,
                                    [ 
                                        ':name' => $functionName,
                                        ':skipped_msg'  => $skip[$skippedAllTest] 
                                    ]
                                );
                            } elseif (isset($skip[$skippedTest])) {
                                $functions .= self::render(
                                    self::TEMPLATE_FUNCTION_SKIPPED,
                                    [ 
                                        ':name' => $functionName,
                                        ':skipped_msg'  => $skip[$skippedTest] 
                                    ]
                                );
                            } else {
                                $functions .= self::render(
                                    self::TEMPLATE_FUNCTION_TEST,
                                    [
                                        ':name' => $functionName,
                                        ':test' => (string) new ActionTest($actions)
                                    ]
                                );
                            }
                            $numTest++;
                    }
                }
            }
            if ($allSkipped) {
                $test = self::render(
                    self::TEMPLATE_UNIT_TEST_SKIPPED,
                    [
                        ':namespace' => sprintf("Elastic\Elasticsearch\Tests\Yaml\%s\%s", self::$testSuite, $namespace),
                        ':test-name' => $testName,
                        ':tests'     => $functions,
                        ':yamlfile'  => sprintf(self::ELASTICSEARCH_GIT_URL, self::$minorEsVersion, $yamlFileName),
                        ':group'     => strtolower(self::$testSuite)
                    ]
                );
            } else {
                $test = self::render(
                    strtolower(self::$testSuite) === 'free'
                        ? self::TEMPLATE_UNIT_TEST_OSS
                        : self::TEMPLATE_UNIT_TEST_XPACK,
                    [
                        ':namespace' => sprintf("Elastic\Elasticsearch\Tests\Yaml\%s\%s", self::$testSuite, $namespace),
                        ':test-name' => $testName,
                        ':tests'     => $functions,
                        ':setup'     => $setup,
                        ':teardown'  => $teardown,
                        ':yamlfile'  => sprintf(self::ELASTICSEARCH_GIT_URL, self::$minorEsVersion, $yamlFileName),
                        ':group'     => strtolower(self::$testSuite)
                    ]
                );
            }
            // Fix ${var} string interpolation deprecated for PHP 8.2
            // @see https://php.watch/versions/8.2/$%7Bvar%7D-string-interpolation-deprecated
            $test = $this->fixStringInterpolationInCurlyBracket($test);
            file_put_contents($testDirName . '/' . $testName . '.php', $test);
            try {
                eval(substr($test, 5)); // remove <?php header
            } catch (ParseError $e) {
                throw new Exception(sprintf(
                    "The PHP code generate in %s not valid: %s",
                    $testDirName . '/' . $testName . '.php',
                    $e->getMessage()
                ));
            }
            $numFile++;
        }
        return [
            'tests' => $numTest,
            'files' => $numFile
        ];
    }

    /**
     * Convert ${var} in {$var} for PHP 8.2 deprecation notice
     * 
     * @see https://php.watch/versions/8.2/$%7Bvar%7D-string-interpolation-deprecated
     */
    private function fixStringInterpolationInCurlyBracket(string $code): string
    {
        return preg_replace('/\${([^}]+)}/', '{\$$1}', $code);
    }

    private function extractTestNamespace(string $path)
    {
        $file = substr($path, strlen($this->testDir) + 1);
        $last = strrpos($file, '/', -1);

        $namespace = substr($file, 0, $last);
        $namespace = ucwords($namespace, '._/-');
        $namespace = str_replace(['.', '_', '/', '-'], ['\\', '', '\\', ''], ucwords($namespace, '.'));

        // Check if a PHP reserved word is present in the namespace
        $parts = explode ('\\', $namespace);
        foreach ($parts as $part) {
            if (in_array(strtolower($part), self::PHP_RESERVED_WORDS)) {
                $namespace = str_replace ($part, $part . '_', $namespace);
            }
        }
        return $namespace;

    }

    private function extractTestName(string $path): string
    {
        $file = substr($path, strlen($this->testDir) + 1);
        $last = strrpos($file, '/', -1);

        $testName = substr($file, $last + 1, -4);
        $testName = ucwords($testName, '_-');
        $testName = str_replace('-', '', $testName);

        return '_' . $testName . 'Test';
    }

    public static function render(string $fileName, array $params = []): string
    {
        if (!is_file($fileName)) {
            throw new Exception(sprintf(
                "The file %s is not valid",
                $fileName
            ));
        }
        $output = file_get_contents($fileName);
        foreach ($params as $name => $value) {
            if (is_array($value)) {
                $value = var_export($value, true);
            } elseif ($value instanceof \stdClass) {
                $value = 'new \stdClass';
            } elseif (is_numeric($value)) {
                $value = var_export($value, true);
            }
            $output = str_replace($name, $value, $output);
        }
        return $output;
    }

    private function removeDirectory($directory)
    {
        foreach(glob("{$directory}/*") as $file)
        {
            if(is_dir($file)) { 
                $this->removeDirectory($file);
            } else {
                unlink($file);
            }
        }
        if (is_dir($directory)) {
            rmdir($directory);
        }
    }

    private function filterFunctionName(string $name, array $alreadyAssigned = []): string
    {
        $result = preg_replace("/[^a-zA-Z0-9_]/", "", $name);
        while (in_array($result, $alreadyAssigned)) {
            $result .= '_';
        }
        return $result;
    }
}