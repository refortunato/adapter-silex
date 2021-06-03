<?php

namespace MyApp\Controllers;

use MyApp\HttpAdapters\HttpRequest;

class TestController extends Controller
{
    private static $data = [
        0 => [
            'id' => 'kopjknjhu',
            'name' => 'Joe'
        ],
        1 => [
            'id' => 'mnvjho8hjgf9h',
            'name' => 'Doe'
        ],
        2 => [
            'id' => 'kljniiv0hjvbsogh',
            'name' => 'Mark'
        ],
    ];

    protected static function getAll(): Array
    {
        return self::$data;
    }

    protected static function getById(HttpRequest $request): Array 
    {
        foreach (self::$data as $data) {
            if ($data['id'] === $request->route_params['id']) {
                return $data + $request->route_params + $request->query_params;
            }
        }
        throw new \DomainException("Test Not Found.");
    }
}