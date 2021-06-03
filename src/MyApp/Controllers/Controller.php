<?php

namespace MyApp\Controllers;

use MyApp\HttpAdapters\HttpRequest;
use MyApp\HttpAdapters\HttpResponse;
use MyApp\HttpAdapters\HttpResponseMaker;

abstract class Controller
{
    public static function execute(string $method_name, HttpRequest $httpRequest) : ?HttpResponse
    {
        if (method_exists(static::class, $method_name)) {
            try {
                $result = static::$method_name($httpRequest);
                return HttpResponseMaker::ok($result);
            } catch (\DomainException $e) {
                return HttpResponseMaker::badRequest(['message' => 'Error']);
            } catch (\Exception $e) {
                return HttpResponseMaker::serverError(['message' => 'Error']);
            }
        }
        return null;
    }
}