<?php
/**
 * Created by PhpStorm.
 * User: shengjia
 * Date: 2019/3/7
 * Time: 10:49
 */

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__ . '/vendor/autoload.php';
//$request = Request::createFromGlobals();
$request = Request::create('/hello?name=Fabien');
$response = new Response();

//$map 定义了 URL 路径和相关 PHP 页面脚本路径的对应关系。
$map = array(
    '/hello' => __DIR__ . '/hello.php',
    '/bye' => __DIR__ . 'bye.php'
);

$path = $request->getPathInfo();
if (isset($map[$path])) {
    require $map[$path];
} else {
    $response->setStatusCode(404);
    $response->setContent('Not Found');
}
$response->send();