<?php
/**
 * Generate the Elasticsearch endpoints and namespaces
 *
 * @author Enrico Zimuel (enrico.zimuel@elastic.co)
 */
declare(strict_types = 1);

use GitWrapper\GitWrapper;
use Elasticsearch\Util\ClientEndpoint;
use Elasticsearch\Util\Endpoint;
use Elasticsearch\Util\NamespaceEndpoint;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$start = microtime(true);
if (!isset($argv[1])) {
    print_usage_msg();
    exit(1);
}
if ($argv[1] < '7.3.0') {
    printf("Error: the version must be >= 7.4.0\n");
    exit(1);
}

$ver = $argv[1];
$version = 'v' . $ver;

$gitWrapper = new GitWrapper();
$git = $gitWrapper->workingCopy(dirname(__DIR__) . '/util/elasticsearch');

$git->run('fetch', ['--all']);
$tags = explode("\n", $git->run('tag'));
if (!in_array($version, $tags)) {
    $branches = explode("\n", $git->run('branch', ['-r']));
    array_walk($branches, function(&$value, &$key) {
        $value = trim($value);
    });
    $version = "origin/$ver";
    if (!in_array($version, $branches)) {
        printf("Error: the version %s specified doesnot exist\n", $version);
        exit(1);
    }
}

$git->run('checkout', [$version]);
$result = $git->run(
    'ls-files',
    [
        "rest-api-spec/src/main/resources/rest-api-spec/api/*.json",
        "x-pack/plugin/src/test/resources/rest-api-spec/api/*.json"
    ]
);
$files = explode("\n", $result);
$outputDir = __DIR__ . "/output/$ver";

// Remove the output directory
printf ("Removing %s folder\n", $outputDir);
removeDirectory($outputDir);
mkdir($outputDir);

$endpointDir = "$outputDir/Endpoints/";
printf ("Creating folder %s\n", $endpointDir);
mkdir ($endpointDir);

$countEndpoint = 0;
$namespaces = [];

// Generate endpoints
foreach ($files as $file) {
    if (empty($file) || (basename($file) === '_common.json')) {
        continue;
    }
    printf("Generation %s...", basename($file));

    $endpoint = new Endpoint($file, $git->run('show', [':' . trim($file)]), $ver);

    $dir = $endpointDir . NamespaceEndpoint::normalizeName($endpoint->namespace);
    if (!file_exists($dir)) {
        mkdir($dir);
    }
    file_put_contents(
        sprintf("%s/%s.php", $dir, $endpoint->getClassName()),
        $endpoint->renderClass()
    );

    printf("done\n");

    $namespaces[$endpoint->namespace][] = $endpoint;
    $countEndpoint++;
}

// Generate namespaces
$namespaceDir = "$outputDir/Namespaces/";
printf ("Creating folder %s\n", $namespaceDir);
mkdir($namespaceDir);

$countNamespace = 0;
$clientFile = "$outputDir/Client.php";

foreach ($namespaces as $name => $endpoints) {
    if (empty($name)) {
        $clientEndpoint = new ClientEndpoint(array_keys($namespaces), $ver);
        foreach ($endpoints as $ep) {
            $clientEndpoint->addEndpoint($ep);
        }
        file_put_contents(
            $clientFile,
            $clientEndpoint->renderClass()
        );
        $countNamespace++;
        continue;
    }
    $namespace = new NamespaceEndpoint($name, $ver);
    foreach ($endpoints as $ep) {
        $namespace->addEndpoint($ep);
    }
    file_put_contents(
        $namespaceDir . $namespace->getNamespaceName() . 'Namespace.php',
        $namespace->renderClass()
    );
    $countNamespace++;
}

$end = microtime(true);
printf("\nGenerated %d endpoints and %d namespaces in %.3f seconds\n.", $countEndpoint, $countNamespace, $end - $start);

// End

function print_usage_msg(): void
{
    printf("Usage: php %s <ES_VERSION>\n", basename(__FILE__));
    printf("where <ES_VERSION> is the Elasticsearch version to check (version must be >= 7.4.0).\n");
}

// Remove directory recursively
function removeDirectory($directory)
{
    foreach(glob("{$directory}/*") as $file)
    {
        if(is_dir($file)) { 
            removeDirectory($file);
        } else {
            unlink($file);
        }
    }
    rmdir($directory);
}