<?php
/**
 * 前段控制器
 * Created by PhpStorm.
 * User: shengjia
 * Date: 2019/3/7
 * Time: 10:49
 */
require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();
$routes = include __DIR__ . '/../src/app.php';

$framework = new \Simplex\Framework($routes);
$framework->handle($request)->send();

