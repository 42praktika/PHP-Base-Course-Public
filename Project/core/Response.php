<?php

namespace app\core;

class Response
{
    const HTTP_OK = 200;
    const HTTP_NOT_FOUND = 404;
    const HTTP_SERVER_ERROR = 500;

    const HTTP_FORBIDDEN = 403;

    public function setStatusCode(int $status): void
    {
        \http_response_code($status);
    }

}