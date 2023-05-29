<?php

declare(strict_types=1);

namespace app\core;

use app\core\MethodsEnum;

class Request
{
    public function getUri(): string
    {
        return $_SERVER["REQUEST_URI"];
    }

    public function getMethod(): string
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    public function getBody(): array
    {
        $body = [];
        if ($this->getMethod() == MethodsEnum::POST) {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->getMethod() == MethodsEnum::GET) {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }
}
