<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\MangaMapper;
use app\mappers\UserMapper;
use app\models\Manga;
use app\viewmodels\HeaderViewModel;

class MangaProfileContoller
{

    public function getView()
    {
        session_start();
        $authorised = false;

        $userID = isset($_SESSION["userID"]);
        if($userID) $authorised = true;


        if(!$authorised){
            $header = HeaderViewModel::getView(false);
            Application::$app->getRouter()->renderTemplate("manga_profile", ["header"=>$header]);
            return;
        }

        $user = UserMapper::findUserByID($_SESSION["userID"]);

        $header = HeaderViewModel::getView(true, ["username"=>$user->getNickname()]);
        $body = Application::$app->getRequest()->getBody();

        if(!isset($body["id"])){
            Application::$app->getRouter()->renderTemplate("error", ["error_code"=>"404", "error_explanation"=>"Not found"]);
            return;
        }
        $manga = MangaMapper::FindMangaByID((int)$body["id"]);

        if(!$manga){
            Application::$app->getRouter()->renderTemplate("error", ["error_code"=>"404", "error_explanation"=>"Not found"]);
            return;
        }
        Application::$app->getRouter()->renderTemplate("manga_profile",
            ["header"=>$header,
                "title" =>$manga->getTitle(),
                "description"=>$manga->getDescription(),
                "author_name"=>$manga->getAuthorName(),
                "genre"=>$manga->getGenre(),
                "rating_id"=>$manga->getRatingId(),
                "age_rating"=>$manga->getAgeRating(),
                "release_date"=>$manga->getReleaseDate(),
                "author"=>$manga->getAuthorName(),
                "cover_image_path"=>$manga->getCoverImagePath()]);

    }

    public function handleView()
    {
//        $body = Application::$app->getRequest()->getBody();
//        var_dump($body);
          //Application::$app->getRouter()->renderView("about");
    }
}