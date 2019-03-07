<?php
/**
 * 前段控制器
 * Created by PhpStorm.
 * User: shengjia
 * Date: 2019/3/7
 * Time: 10:49
 */
require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing;

$request = Request::createFromGlobals();
$requestStack = new RequestStack();
$routes = include __DIR__ . '/../src/app.php';

$context = new Routing\RequestContext();

$matcher = new Routing\Matcher\UrlMatcher($routes, $context);
$controllerResolver = new ControllerResolver();
$argumentResolver = new ArgumentResolver();

$dispatcher = new EventDispatcher();
$errorHandler = function (FlattenException $exception) {
    $msg = 'Something went wrong!(' . $exception->getMessage() . ')';
    return new Response($msg . $exception->getStatusCode());
};
$dispatcher->addSubscriber(new HttpKernel\EventListener\ExceptionListener($errorHandler));

$framework = new Simplex\Framework($dispatcher, $matcher, $controllerResolver, $argumentResolver);

$response = $framework->handle($request);
$response->send();

function render_template($request)
{
    extract($request->attributes->all(), EXTR_SKIP);
    ob_start();
    /** @var TYPE_NAME $_route */
    include sprintf(__DIR__ . '/../src/pages/%s.php', $_route);

    return new Response(ob_get_clean());
}

$routes = include __DIR__ . '/../src/app.php';
$request = Request::createFromGlobals();

$context = new  Routing\RequestContext();
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

$controllerResolver = new ControllerResolver();
$argumentResolver = new ArgumentResolver();

$framework = new Simplex\Framework($matcher, $controllerResolver, $argumentResolver);
$response = $framework->handle($request);

$response->send();
