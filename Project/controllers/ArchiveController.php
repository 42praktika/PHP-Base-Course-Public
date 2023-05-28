<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\exceptions\FileException;

class ArchiveController
{
    public function getView(): void
    {
        Application::$app->getRouter()->renderTemplate("archive");
    }

    public function handleView()
    {
        $body = Application::$app->getRequest()->getBody();

        try {
            $this->writeBody($body);
        } catch (FileException $e) {
            Application::$app->getResponse()->setStatusCode(Response::HTTP_SERVER_ERROR);
        }
    }

    private function writeBody(array $body)
    {
        $f = @fopen(PROJECT_ROOT . "/runtime/body.txt", "rb+");
        if ($f === false) {
            throw new FileException("cannot open file");
        }
        foreach ($body as $key => $value) {
            if (!fwrite($f, "$key=$value" . PHP_EOL)) {
                throw new FileException("cannot write to file");
            }
        }

        fclose($f);
    }
}