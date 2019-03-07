<?php
/**
 * Created by PhpStorm.
 * User: shengjia
 * Date: 2019/3/7
 * Time: 10:37
 */

use Symfony\Component\HttpFoundation\Response;

require_once __DIR__ . 'init.php';

$response = new Response('Goodbye');
$response->send();
