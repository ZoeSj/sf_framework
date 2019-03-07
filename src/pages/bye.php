<?php
/**
 * Created by PhpStorm.
 * User: shengjia
 * Date: 2019/3/7
 * Time: 10:37
 * 此文件是通过URL完全暴露给终端用户的，PHP脚本文件名和客户端URL是完全直接相互映射的。
 * 请求的调度工作完全是由web服务器直接完成的
 * 为了灵活性，把调度工作交给自己来做
 * 将所有的请求交给一个PHP脚本来做路由处理
 * 只暴露一个脚本给终端用户，前段控制器的设计模式
 */

use Symfony\Component\HttpFoundation\Response;

require_once __DIR__ . '/init.php';

$response = new Response('Goodbye');
$response->send();
