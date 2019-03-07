<?php
/**
 * Created by PhpStorm.
 * User: shengjia
 * Date: 2019/3/7
 * Time: 09:52
 */
require __DIR__ . 'index.php';
$request->getPathInfo();//请求的URI

//分别得到GET参数或者POST参数
$request->query->get('foo');//GET
$request->request->get('bar', '如果没有bar的默认值');//POST

//得到服务器变量
$request->server->get('HTTP_HOST');

//得到上传文件变量
$request->files->get('foo');

//得到cookie的值
$request->cookies->get('PHPSESSID');

//得到http请求头信息
$request->headers->get('host');
$request->headers->get('content_type');
$request->getMethod();
$request->getLanguages();

//模拟一个请求
$request = Request::create('/index.php?name=Fabien');

$response = new  Response();
$response->setContent('Hello WOrld!');
$response->setStatusCode(200);
$response->headers->set('ContentType', 'text/html');
$response->setMaxAge(10);

