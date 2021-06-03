<?php

namespace MyApp\Adapters;

use MyApp\HttpAdapters\HttpRequest;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class SilexControllerAdapter
{
    private $request;
    private $app;
    private HttpRequest $httpRequest;

    private function __construct(Request $request, Application $app)
    {
        $this->request = $request;
        $this->app = $app;

        $this->httpRequest = new HttpRequest(
            $this->request->attributes->get('_route_params'),
            $this->request->query->all(),
            $this->request->request->all()
        );
    }

    public static function create(Request $request, Application $app)
    {
        return new static($request, $app);
    }

    public function execute(string $class, string $method )
    {
        $result = call_user_func_array($class.'::execute',[$method, $this->httpRequest]);
        return $this->app->json($result->body, $result->status);

    }
}