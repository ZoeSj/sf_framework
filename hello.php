<?php
/**
 * Created by PhpStorm.
 * User: shengjia
 * Date: 2019/3/7
 * Time: 10:50
 */
require_once __DIR__ . '/init.php';
$input = $request->get('name', 'World');
var_dump($input);
$response->setContent(sprintf(
    'Hello %s', htmlspecialchars($input, ENT_QUOTES, 'UTF-8')
));