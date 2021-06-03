<?php

namespace MyApp\Controllers;

use MyApp\Exceptions\NotFoundException;
use MyApp\HttpHelpers\HttpRequest;

class TestController extends Controller
{
    private static $data = [
        0 => [
            'id' => '9aNV+y0Cck6sky0SirATrg==',
            'name' => 'Joe'
        ],
        1 => [
            'id' => 'TpK5EDzep0+l1kl6WmuN7w==',
            'name' => 'Robert'
        ],
        2 => [
            'id' => 'KSDfDjIGFkWIOTuQ7/m2ZA==',
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
        throw new NotFoundException("Test Not Found.");
    }
}