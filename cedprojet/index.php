<?php

$path = "/cedprojet/";
define('URL', '//'.$_SERVER['HTTP_HOST'].$path);
$uri = str_replace($path, "", $_SERVER['REQUEST_URI']);
$uri = parse_url($uri, PHP_URL_PATH);
$segments = array_filter(explode('/', $uri));

if (count($segments) == 0 or $segments[0] === 'index')
{
    $file = 'welcome';
}
else
{
    $file = $segments[0];
}
$controller = 'controllers/' . $file . '.php';
if (count($segments) <= 1 and file_exists($controller)) {
    include $controller;
}
else {
    include 'controllers/404.php';
}

?>
