<?php

namespace app\models;

use app\core\Model;

class Product extends Model
{
    private string $name;

    private string $image;

    private int $price;

    private string $title;

    private string $description;

    private int $categoryid;

    /**
     * @param int|null $id
     * @param string $name
     * @param string $image
     * @param int $price
     * @param string $title
     * @param string $description
     * @param int $categoryid
     */


    public function __construct(
        ?int   $id,
        string $name,
        string $image,
        int    $price,
        string $title,
        string $description,
        int    $categoryid

    )
    {
        parent::__construct($id);
        $this->name = $name;
        $this->image = $image;
        $this->price = $price;
        $this->title = $title;
        $this->description = $description;
        $this->categoryid = $categoryid;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getCategoryid(): int
    {
        return $this->categoryid;
    }

    /**
     * @param int $categoryid
     */
    public function setCategoryid(int $categoryid): void
    {
        $this->categoryid = $categoryid;
    }


}
