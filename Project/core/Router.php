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

    /**
     * @throws \Exception Callback not defined
     */
    public function setGetRoute(string $path, string|array $callback): void
    {

        $this->routes[MethodsEnum::GET][$path] = $callback;
    }

    public function setPostRoute(string $path, string|array $callback): void
    {
        $this->routes[MethodsEnum::POST][$path] = $callback;
    }

    /**
     * @throws \Exception
     */
    public function resolve(): void
    {
        $path = $this->request->getUri();
        $method = $this->request->getMethod();
        if (!isset($this->routes[$method]) || !isset($this->routes[$method][$path])) {
            $this->renderStatic("404.html");
            $this->response->setStatusCode(Response::HTTP_NOT_FOUND);
            return;
        }

        $callback = $this->routes[$method][$path];
        if (empty($callback)) {
            throw new \Exception("Callback not defined");
        }
        try {
            if (is_string($callback)) {
                $this->renderView($callback);
                return;
            }
            if (is_array($callback)) {
                call_user_func($callback, $this->request);
            }
        } catch (\Exception $e) {
            Application::$app->getLogger()->error($e->getMessage(), ['exception' => $e]);
            $this->renderStatic("500.html");
            $this->response->setStatusCode(Response::HTTP_SERVER_ERROR);
            return;
        }
    }

    public function renderView(string $name): void
    {

        include PROJECT_ROOT."views/$name.php";
    }

    public function renderTemplate(string $name, array $data=[]): void
    {

       Template::View($name.'.html', $data);
    }
    public function renderStatic(string $name): void
    {
        include PROJECT_ROOT."web/$name";
    }

}