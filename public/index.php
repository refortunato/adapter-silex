<?php
// Document Silex: https://silex.symfony.com/doc/2.0/usage.html

use MyApp\Adapters\SilexControllerAdapter;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

// Test With Adapter
$app->get('/test', function (Request $request, Silex\Application $app) {
    return SilexControllerAdapter::create($request, $app)->execute('MyApp\Controllers\TestController', 'getAll');
});

// Test With Adapter
$app->get('/test/{id}', function (Request $request, Silex\Application $app) {
    return SilexControllerAdapter::create($request, $app)->execute('MyApp\Controllers\TestController', 'getById');
});


$app->run();