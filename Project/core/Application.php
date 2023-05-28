<?php

declare(strict_types=1);

namespace app\core;

class Application
{
    public static Application $app;
    public static Database $database;
    private Request $request;
    private Router $router;
    private Response $response;

    public function __construct()
    {
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        self::$database = new Database($_ENV["DB_DSN"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);
    }

    public function run() {
        try {
            $this->router->resolve();
        } catch (\Exception $exception) {
            $this->response->setStatusCode(Response::HTTP_SERVER_ERROR);
        }
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }

    /**
     * @return Router
     */
    public function getRouter(): Router
    {
        return $this->router;
    }

}