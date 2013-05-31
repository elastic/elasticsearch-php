<?php
/**
 * User: zach
 * Date: 5/31/13
 * Time: 7:46 AM
 */
require_once '../vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);
$template = $twig->loadTemplate('endpoint.twig');

$counter = 0;

if ($handle = opendir('../../elasticsearch-rest-api-spec/api/')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            generateTemplate($entry, $template);
        }

    }
    closedir($handle);
}

function generateTemplate($path, $template)
{
    $path = '../../elasticsearch-rest-api-spec/api/'.$path;
    $json = file_get_contents($path);
    $data = json_decode($json, true);

    reset($data);
    $namespace = key($data);
    $data = $data[$namespace];
    $namespace = explode(".", $namespace);

    foreach ($data['url']['paths'] as &$path){
        $path = str_replace('}','',$path);
        $path = str_replace('{','$',$path);
    }

    $data['url']['path'] = str_replace('}','',$data['url']['path']);
    $data['url']['path'] = str_replace('{','$',$data['url']['path']);

    $renderVars = array(
        'json'      => $json,
        'data'      => $data,
        'namespace' => $namespace,
        'className' => ucfirst($namespace[count($namespace)-1]),
    );

    $ret = $template->render($renderVars);

    $dir = './output/'.implode('/', array_map("ucfirst", array_splice($namespace,0,count($namespace)-1)));

    if (substr($dir,-1) !== '/') {
        $dir .= '/';
    }
    if (!file_exists($dir)) {
        echo 'making dir: '.$dir."\n\n";
        $oldumask = umask(0);
        mkdir($dir, 0777, true);
        umask($oldumask);
    }

    echo $dir."\n\n";
    $path = $dir.$renderVars['className'].'.php';
    echo $path."\n\n";;

    file_put_contents($path, $ret);
    echo $ret;
}