<?php

namespace app\core;

class Response
{
    const HTTP_OK = 200;
    const HTTP_NOT_FOUND = 404;
    const SERVER_ERROR = 500;

    public function setStatusCode(int $status){
        http_send_status($status);
    }
}