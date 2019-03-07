<?php
/**
 * Created by PhpStorm.
 * User: shengjia
 * Date: 2019/3/7
 * Time: 09:23
 */
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();//根据当前PHP的全局变量生成一个Request对象

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
$input = $request->get('name', 'World');

$response = new Response(sprintf(
    'Hello %s',
    htmlspecialchars($input, ENT_QUOTES, 'utf-8')
));

$response->send();//返回response对象里的内容到客户端，会根据内容发送HTTP头信息

//其实调用send之前。应该先调用prepare方法（$response->prepare($request)）来确认发送一个与标准HTTP协议协议兼容的响应。
//如果客户端对一个页面发送HEAD请求，那么服务器是不应该响应正文的