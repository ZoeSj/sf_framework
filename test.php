<?php

/**
 * Created by PhpStorm.
 * User: shengjia
 * Date: 2019/3/7
 * Time: 09:30
 */
class IndexTest extends \PHPUnit_Framework_TestCase
{
    public function testHello()
    {
        $_GET['name'] = 'Fabien';
        ob_start();
        include 'index.php';
        $content = ob_get_clean();

        $this->assertEquals('Hello Fabien', $content);
    }
}