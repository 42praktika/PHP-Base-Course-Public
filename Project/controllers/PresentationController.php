<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\core\Response;
use app\exceptions\FileException;

class PresentationController
{

//    public function getView()
//    {
//        Application::$app->getRouter()->renderView("presentation");
//    }

    public function getStartPage()
    {
        Application::$app->getRouter()->renderView("welcomePage");
    }

    public function getRegisterPage()
    {
        Application::$app->getRouter()->renderView("registerPage");
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

    /**
     * @throws FileException
     */
    private function writeBody(array $body)
    {
        $f = @fopen(PROJECT_ROOT . "/runtime/body.txt", "rb+");
        if ($f === false) {
//            Application::$app->getLogger()->error("Can't open file for body at ".__FILE__."(".__LINE__.")");
            throw new FileException("cannot open file");
        }
        foreach ($body as $key => $value) {
            if (!fwrite($f, "$key=$value" . PHP_EOL)) {
//                Application::$app->getLogger()->error("Can't write file for body at ".__FILE__."(".__LINE__.")");
                throw new FileException("cannot write to file");
            }
        }

        fclose($f);
    }
}