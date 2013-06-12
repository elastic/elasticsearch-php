<?php
/**
 * User: zach
 * Date: 6/11/13
 * Time: 1:45 PM
 */


require_once '../vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);
$template = $twig->loadTemplate('namespace.twig');

$counter = 0;

if ($handle = opendir('../../elasticsearch-rest-api-spec/api/')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            generateTemplate($entry, $template);
        }

    }
    closedir($handle);
}

function snakeToCamel($val)
{
    $val = str_replace(' ', '', ucwords(str_replace('_', ' ', $val)));
    $val = strtolower(substr($val,0,1)).substr($val,1);
    return $val;
}

function generateTemplate($path, $template)
{
    $path = '../../elasticsearch-rest-api-spec/api/'.$path;
    $json = file_get_contents($path);
    $data = json_decode($json, true);

    reset($data);
    $namespace = key($data);
    $data = $data[$namespace];

    $functionName = explode(".", $namespace);
    $functionName = snakeToCamel($functionName[count($functionName)-1]);


    $namespace = str_replace('_', '.', $namespace);

    foreach (array('.put', '.get', '.delete') as $value) {
        if (strpos($namespace, $value) !== false) {
            $namespace = str_replace($value, '', $namespace);
            $namespace .= $value;
        }
    }

    //strange differences to fix
    $namespace = str_replace('exist', 'exists', $namespace);

    $namespace = explode(".", $namespace);

    if (count($namespace) > 1) {
        $firstNamespace = $namespace[0];
    } else {
        $firstNamespace = 'Client';
    }

    foreach ($namespace as &$value) {
        $value = ucfirst($value);
    }

    $namespace = implode('\\',$namespace);


    $docBlockArgsRequired = array();
    $docBlockArgsNotRequired = array();

    $longest = 0;

    foreach ($data['url']['parts'] as $key => $value){
        if (strlen($key) > $longest) {
            $longest = strlen($key);
        }
    }

    foreach ($data['url']['params'] as $key => $value){
        if (strlen($key) > $longest) {
            $longest = strlen($key);
        }
    }

    foreach ($data['url']['parts'] as $key => $value){
        if (isset($value['required']) === true) {
            $docBlockArgsRequired[$key]['type'] = isset($value['type']) ? $value['type'] : '';
            $docBlockArgsRequired[$key]['description'] = isset($value['description']) ? $value['description'] : '';
            $docBlockArgsRequired[$key]['pad'] = str_pad('',$longest - strlen($key),' ');

        } else {
            $docBlockArgsNotRequired[$key]['type'] = isset($value['type']) ? $value['type'] : '';
            $docBlockArgsNotRequired[$key]['description'] = isset($value['description']) ? $value['description'] : '';
            $docBlockArgsNotRequired[$key]['pad'] = str_pad('',$longest - strlen($key),' ');
        }
    }

    foreach ($data['url']['params'] as $key => $value){
        if (isset($value['required']) === true) {
            $docBlockArgsRequired[$key]['type'] = isset($value['type']) ? $value['type'] : '';
            $docBlockArgsRequired[$key]['description'] = isset($value['description']) ? $value['description'] : '';
            $docBlockArgsRequired[$key]['pad'] = str_pad('',$longest - strlen($key),' ');
        } else {
            $docBlockArgsNotRequired[$key]['type'] = isset($value['type']) ? $value['type'] : '';
            $docBlockArgsNotRequired[$key]['description'] = isset($value['description']) ? $value['description'] : '';
            $docBlockArgsNotRequired[$key]['pad'] = str_pad('',$longest - strlen($key),' ');
        }
    }

    if (isset($data['body']) == true) {
        if (isset($value['body']['required']) === true) {
            $docBlockArgsRequired['body']['type'] = isset($value['type']) ? $value['type'] : '';
            $docBlockArgsRequired['body']['description'] = isset($value['description']) ? $value['description'] : '';
            $docBlockArgsRequired['body']['pad'] = str_pad('',$longest - strlen('body'),' ');
        } else {
            $docBlockArgsNotRequired['body']['type'] = isset($value['type']) ? $value['type'] : '';
            $docBlockArgsNotRequired['body']['description'] = isset($value['description']) ? $value['description'] : '';
            $docBlockArgsNotRequired['body']['pad'] = str_pad('',$longest - strlen('body'),' ');
        }
    }

    $allArgs = array_keys($docBlockArgsRequired + $docBlockArgsNotRequired);

    $extractList = array();
    foreach ($data['url']['parts'] as $key => $value){
        $extractList[] = $key;
    }

    if (isset($allArgs['body']) === true) {
        $extractList[] = 'body';
    }

    $renderVars = array(
        'docBlockArgsRequired' => $docBlockArgsRequired,
        'docBlockArgsNotRequired' => $docBlockArgsNotRequired,
        'extractList' => $extractList,
        'namespace'    => $namespace,
        'functionName' => $functionName
    );


    $ret = $template->render($renderVars)."\n\n";



    $path = './output/'.$firstNamespace;
    echo $path."\n\n";
    file_put_contents($path, $ret, FILE_APPEND);
    //echo $ret;

    //fgets(STDIN);
}