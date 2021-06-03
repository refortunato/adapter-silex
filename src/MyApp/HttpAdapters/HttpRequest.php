<?php

namespace MyApp\HttpAdapters;

class HttpRequest
{
    public array $route_params = [];
    public array $query_params = [];
    public array $body = [];

    public function __construct(
        array $route_params,
        array $query_params,
        array $body
    )
    {
        $this->route_params = $route_params;
        $this->query_params = $query_params;
        $this->body = $body;
    }
}