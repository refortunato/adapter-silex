<?php

namespace MyApp\Controllers;

use MyApp\Exceptions\NotFoundException;
use MyApp\HttpHelpers\HttpRequest;

class TestController extends Controller
{
    private static $data = [
        0 => [
            'id' => '1',
            'name' => 'Joe'
        ],
        1 => [
            'id' => '2',
            'name' => 'Robert'
        ],
        2 => [
            'id' => '3',
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
            if ($data['id'] == $request->route_params['id']) {
                return $data + $request->route_params + $request->query_params;
            }
        }
        throw new NotFoundException("Test Not Found.");
    }
}