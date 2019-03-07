<?php
/**
 * Created by PhpStorm.
 * User: shengjia
 * Date: 2019/3/7
 * Time: 11:21
 */

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', [
        'year' => null,
        '_controller' => 'Calendar\Controller\LeapYearController::index',]
));
$routes->add('hello', new Routing\Route('/hello/{name}', array('name' => 'World')));
$routes->add('bye', new Routing\Route('/bye'));

return $routes;