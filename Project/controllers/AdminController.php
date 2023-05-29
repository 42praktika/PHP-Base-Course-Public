<?php

namespace app\Project\controllers;

use app\core\Application;
use app\mappers\CategoryMapper;
use app\mappers\ProductMapper;

class AdminController
{

    public function getView()
    {

        try {
            session_start();
            if ($_SESSION['isAdmin'] === 1) {
                $mapperProduct = new ProductMapper();
                $products = $mapperProduct->selectAll()->rows;

                $categoryMapper = new CategoryMapper();
                $categories = $categoryMapper->SelectAll()->rows;


                Application::$app->getRouter()->renderTemplate("admin", ["products" => $products, "categories" => $categories, "showEditAction" => "showEditProduct", "deleteAction" => "deleteProduct", "addAction" => "addProduct"]);
            }
            else{
                echo "You not admin";
            }
        } catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);

        }
    }

    public function showEditProduct()
    {

        try {
            session_start();
            $body = Application::$app->getRequest()->getBody();
            $productId = intval($body['id']);
            $mapperProduct = new ProductMapper();
            $product = $mapperProduct->doSelectById($productId);
            $categoryMapper = new CategoryMapper();
            $categories = $categoryMapper->SelectAll()->rows;
            Application::$app->getRouter()->renderTemplate("edit", ["product" => $product, "categories" => $categories, "editAction" => "editProduct"]);


        } catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);

        }
    }

    public function editProduct()
    {

        try {
            session_start();
            $body = Application::$app->getRequest()->getBody();
            $id = intval($body['id']);
            $name = $body['name'];
            $image = $body['image'];
            $title = $body['title'];
            $description = $body['description'];
            $price = intval($body['price']);
            $category = intval($body['category']);

            $mapperProduct = new ProductMapper();
            $mapperProduct->doUpdateProduct($id, $name, $image, $price, $title, $description, $category);

            AdminController::getView();


        } catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);

        }
    }

    public function deleteProduct()
    {

        try {
            session_start();
            $body = Application::$app->getRequest()->getBody();
            $id = intval($body['id']);

            $mapperProduct = new ProductMapper();
            $mapperProduct->doDeleteProduct($id);

            AdminController::getView();

        } catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);

        }
    }

    public function addProduct()
    {

        try {
            $body = Application::$app->getRequest()->getBody();

            $mapperProduct = new ProductMapper();

            $data = ["name" => $body['name'], "image" => $body['image'], "price" => intval($body['price']), "title" => $body['title'], "description" => $body['description'], "categoryid" => intval($body['category'])];
            $product = $mapperProduct->createObject($data);
            $mapperProduct->Insert($product);

            AdminController::getView();


        } catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);

        }
    }
}
