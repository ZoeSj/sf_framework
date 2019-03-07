<?php
/**
 * Created by PhpStorm.
 * User: shengjia
 * Date: 2019/3/7
 * Time: 09:23
 */
//$input = $_GET['name']; 不安全
$input = isset($_GET['name']) ? $_GET['name'] : 'world';
header('Content-Type: text/html; charset=utf-8');
printf('Hello %s', htmlspecialchars($input, ENT_QUOTES, 'utf-8'));