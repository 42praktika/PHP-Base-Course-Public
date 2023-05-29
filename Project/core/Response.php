<?php

namespace app\core;

class Response
{
    const HTTP_OK = 200;
    const HTTP_NOT_FOUND = 404;
    const HTTP_SERVER_ERROR = 500;

    public function setStatusCode(int $status)
    {
        \http_response_code($status);
    }

}
