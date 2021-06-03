<?php

namespace MyApp\HttpHelpers;

class HttpResponse
{
    public $status;
    public $body;

    public function __construct(
        array $body,
        int $status = 200
    )
    {
        $this->body = $body;
        $this->status = $status;
    }
}