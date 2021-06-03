<?php

namespace MyApp\Controllers;

use MyApp\Exceptions\NotFoundException;
use MyApp\HttpHelpers\HttpRequest;
use MyApp\HttpHelpers\HttpResponse;
use MyApp\HttpHelpers\HttpResponseMaker;

abstract class Controller
{
    public static function execute(string $method_name, HttpRequest $httpRequest) : ?HttpResponse
    {
        if (method_exists(static::class, $method_name)) {
            try {
                $result = static::$method_name($httpRequest);
                return HttpResponseMaker::ok($result);
            } catch (NotFoundException $e) {
                return HttpResponseMaker::notFound(['message' => $e->getMessage()]);
            } catch (\DomainException $e) {
                return HttpResponseMaker::badRequest(['message' => $e->getMessage()]);
            } catch (\Exception $e) {
                return HttpResponseMaker::serverError(['message' => 'Internal Server Error.']);
            }
        }
        return null;
    }
}