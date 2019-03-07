<?php
/**
 * Created by PhpStorm.
 * User: shengjia
 * Date: 2019/3/7
 * Time: 09:23
 */
require_once __DIR__ . '/vendor/autoload.php';

$input = $request->get('name', 'World');
$response->setContent(sprintf('Hello %s', htmlspecialchars($name, ENT_QUOTES, 'UTF-8')));
$response->send();

//其实调用send之前。应该先调用prepare方法（$response->prepare($request)）来确认发送一个与标准HTTP协议协议兼容的响应。
//如果客户端对一个页面发送HEAD请求，那么服务器是不应该响应正文的