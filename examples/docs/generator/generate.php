<?php

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

if ($argc != 2) {
    print(sprintf("%s <report file>\n", $argv[0]));
    exit(2);
}

$report = trim($argv[1]);
$handle = fopen($report, "r");
if (!$handle) {
    print(sprintf("Unable to open file: %s for read.\n", $report));
    exit(2);
}

echo "\n";
echo "starting asciidoc parsing ..\n";

$timeStart = round(microtime(true) * 1000);

// Iterate over the report and parse content
$docs    = [];
$regex   = '/^===\s(\.\.\/){0,}[a-z0-9\-_\/]{1,}\.(asciidoc|adoc|asc):\sline\s[0-9]{1,}:\s[0-9a-z]*$/i';
$capture = false;
$ptrs    = ['f' => 0, 'e' => 0];    // map pointers
$counter = 0;                       // Count examples
$lines   = 0;
$errors  = [];
while (($line = fgets($handle)) !== false)
{
    // Match Example Header
    preg_match($regex, $line, $matches);
    if(count($matches) != 0) {
        // Check if error state is present
        if($capture === true) {
            $errors[] = $ptrs;                                  // Store Pointers
            $capture = false;                                   // Hard reset
            $docs[$ptrs['f']][$ptrs['e']]['is_valid'] = false;  // Mark Exampe as invalid
        }
        list(,$filename, ,$lineno, $hash) = explode(' ', str_replace(':', '', $line));
        ($docs[$filename]) ?? $docs[$filename] = [];
        $docs[$filename][] = [
            'line_no'  => $lineno,
            'hash'     => trim(preg_replace('/\s+/', ' ', $hash)),
            'content'  => [],
            'is_valid' => true,
        ];
        $ptrs['f'] = $filename;
        $ptrs['e'] = count($docs[$filename]) - 1;

        $counter++;
    }

    // Capture Example
    if($capture === true && trim($line) != '----') {
        $out = str_replace(PHP_EOL, '', $line);
        if(trim(strlen($out)) > 0) {
            $docs[$ptrs['f']][$ptrs['e']]['content'][] = str_replace("'", "\'", $out);
        }
    }

    // Toggle Example capturing
    if(trim($line) == '----') {
        $capture = ($capture === false);
    }

    $lines++;
}

echo "--------------------------------------- \n";
echo sprintf("traversed lines: %d\n", $lines);
echo sprintf("parsed examples: %d \n", $counter);;
echo sprintf("asciidoc files:  %d\n", count($docs));
echo sprintf("errors:          %d\n", count($errors));
echo sprintf("duration:        %dms\n", round(microtime(true) * 1000) - $timeStart);
echo "--------------------------------------- \n";

// Yield Error Pointers
if(count($errors) != 0) {
    var_dump($errors);
    exit(3);
}

echo "\n";
echo "generate example files ..\n";

$counters = [
    'new_classes'  => 0,
    'new_methods'  => 0,
    'new_asciidoc' => 0,
];

foreach($docs as $key => $examples) {
    // Sanitize filename and split
    list($path,) = explode('.', str_replace(['../'], '', ucwords($key, '/')));
    $parts    = explode('/', $path);
    $filename = array_pop($parts);
    $subDirs  = implode('/', $parts);

    // Generate directory structure files
    if(empty($subDirs) === false) {
        $dir = sprintf('./../src/Examples/Docs/%s', $subDirs);
        if(file_exists($dir) === false) {
            mkdir($dir, 0775, true);
        }
    }

    // Sanitize Filename to Classname
    $filename  = preg_replace("/[^[:alpha:]]/u", '', ucwords($filename, '-'));
    $fullpath  = sprintf('./../src/Examples/Docs/%s/%s.php', $subDirs, $filename);
    $namespace = (empty($parts)) ? '' : '\\' . str_replace('/', '\\', $subDirs);

    // Generate Stub Class
    if(file_exists($fullpath) === false) {
        $search  = ['%__NAMESPACE__%', '%__CLASSNAME__%', '%__ASCIIDOC__%'];
        $replace = [$namespace, $filename, $key];
        $skel    = file_get_contents('./skeletons/class.skel');
        $class   = str_replace($search, $replace, $skel);

        file_put_contents($fullpath, $class);
        $counters['new_classes']++;
    }

    // Bind Examples to Class
    $class = file_get_contents($fullpath);
    $fingerprint = md5($class);
    foreach($examples as $example) {
        $methodName = sprintf('testExampleL%d_%s', $example['line_no'], $example['hash']);

        // Add new Method
        if(strpos($class, $methodName) === false) {
            $curlExample = '';
            $curlString  = '';

            foreach($example['content'] as $i => $v) {
                if($i != 0) {
                    $curlExample .= '        ';
                    $curlString  .= '              . ';
                }
                $curlExample .= sprintf("// %s", $v);
                $curlString  .= sprintf("'%s'", $v);
                if($i < count($example['content'])-1) {
                    $curlExample .= "\n";
                    $curlString  .= "\n";
                }
            }

            $search  = ['%__TAG__%', '%__LINE__%', '%__METHOD_NAME__%', '%__CURL_EXAMPLE__%', '%__CURL_STRING__%'];
            $replace = [$example['hash'], $example['line_no'], $methodName, $curlExample, $curlString];
            $skel    = file_get_contents('./skeletons/method.skel');
            $method  = str_replace($search, $replace, $skel);
            $class   = str_replace('// %__METHOD__%', $method, $class);

            $counters['new_methods']++;
        }
    }
    // Write changes to disk ?
    if($fingerprint != md5($class)) {
        file_put_contents($fullpath, $class);
    }

    // Generate Ascii Doc include files
    $folders  = (empty($parts)) ? '' : implode('/', $parts) . '/';
    $filePath = sprintf('%ssrc/Examples/Docs/%s%s.php', str_repeat('../', count($parts)+2), $folders, $filename);
    $asciidir = sprintf('../asciidoc/%s%s/', $folders, $filename);

    // Build Sub directory Structure
    if(file_exists($asciidir) === false) {
        mkdir($asciidir, 0775, true);
    }

    // Generate Asciifdoc Include Files
    foreach($examples as $example) {
        if(file_exists(sprintf('%s/%s.adoc', $asciidir, $example['hash'])) === false && file_exists(sprintf('%s/_%s.adoc', $asciidir, $example['hash'])) === false) {
            $search  = ['%__FILEPATH__%', '%__TAG__%'];
            $replace = [$filePath, $example['hash']];
            $skel    = file_get_contents('./skeletons/asciidoc-include.skel');
            $content = str_replace($search, $replace, $skel);

            file_put_contents(sprintf('%s/_%s.adoc', $asciidir, $example['hash']), $content);
            $counters['new_asciidoc']++;
        }
    }
}

echo "--------------------------------------- \n";
echo sprintf("new classes:    %d\n", $counters['new_classes']);
echo sprintf("new methods:    %d\n", $counters['new_methods']);
echo sprintf("new ascii docs: %d\n", $counters['new_asciidoc']);
echo sprintf("errors:         %d\n", count($errors));
echo sprintf("duration:       %dms\n", round(microtime(true) * 1000) - $timeStart);
echo "--------------------------------------- \n";

exit(0);
