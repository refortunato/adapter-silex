<?php

namespace MyApp\HttpAdapters;

class HttpResponseMaker
{
    public static function ok(array $body = [])
    {
        return new HttpResponse($body, 200);
    }

    public static function notFound(array $body = [])
    {
        return new HttpResponse($body, 404);
    }

    public static function badRequest(array $body = [])
    {
        return new HttpResponse($body, 400);
    }

    public static function serverError(array $body = [])
    {
        return new HttpResponse($body, 500);
    }
}