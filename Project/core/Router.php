<?php

declare(strict_types=1);

namespace app\core;

use app\core\Request;

class Router
{
    protected Request $request;
    protected Response $response;
    protected array $routes;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
        $this->routes = [];

    }

    public function setGetRoute(string $path, string|array $callback): void
    {
//        if($callback)
        $this->routes[MethodsEnum::GET][$path] = $callback;
    }

    public function setPostRoute(string $path, string|array $callback): void
    {
        $this->routes[MethodsEnum::POST][$path] = $callback;
    }

    public function resolve(): void
    {
        $path = $this->request->getUri();
        $method = $this->request->getMethod();

        if (!isset($this->routes[$method]) || !isset($this->routes[$method][$path])) {
            $this->renderStatic("error.php");
            $this->response->setStatusCode(Response::HTTP_NOT_FOUND);
            return;
        }
        $callback = $this->routes[$method][$path];

        if (is_string($callback)) {
            $this->renderView($callback);
            return;
        }
        if (is_array($callback)) {
            call_user_func($callback, $this->request);
        }

    }

    public static function renderView(string $name): void
    {

        include PROJECT_ROOT."views/$name.php";
    }

    public static function renderStatic(string $name): void
    {
        include PROJECT_ROOT."web/$name";
    }


}