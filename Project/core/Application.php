<?php

declare(strict_types=1);

namespace app\core;

class Application
{
    public static Application $app;
    private Request $request;
    private Router $router;
    private Response $response;
    public function __construct()
    {
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run() {
        try {
            $this->router->resolve();
        }catch (\Exception $exception){
            $this->response->setStatusCode(Response::SERVER_ERROR);
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
     * @return Request
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