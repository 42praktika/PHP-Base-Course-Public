<?php

declare(strict_types=1);

namespace app\core;

use app\exceptions\DBException;

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
        $this->logger = new Logger(PROJECT_ROOT."/runtime/".$_ENV["app_log"]);
        try {
            self::$database = new Database($_ENV["db"]["dsn"], $_ENV["db"]["user"], $_ENV["db"]["password"]);
        } catch (DBException $e) {
            $this->logger->error('Error occurred while initializing the database: ' . $e->getMessage());
        }
    }

    public function run() {
        try {
            $this->router->resolve();
        } catch (\Exception $e) {
            $this->logger->error("Can not resolve route". $e->getMessage());
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