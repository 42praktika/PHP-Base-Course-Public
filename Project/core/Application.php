<?php

declare(strict_types=1);

namespace app\core;

class Application
{
    public static Application $app;
    private Request $request;
    private Router $router;
    private Response $response;
    private Logger $logger;
    public static Database $database;

    public function __construct()
    {
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->logger = new Logger(PROJECT_ROOT."/runtime/".getenv("app_log"));
        self::$database = new Database($_ENV["db"]["dsn"], $_ENV["db"]["user"], $_ENV["db"]["password"]);
    }

    public function run() {
        try {
            $this->router->resolve();
        } catch (\Exception $exception) {
            $this->logger->error("Can not resolve route");
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

    /**
     * @return Logger
     */
    public function getLogger(): Logger
    {
        return $this->logger;
    }

}