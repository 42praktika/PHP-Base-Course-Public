<?php

namespace app\models;
use app\core\Model;

class Product extends Model
{
    private string $image;

    private string $text;

    /**
     * @param string $image
     * @param string $text
     */
    public function __construct(string $image, string $text)
    {
        $this->image = $image;
        $this->text = $text;
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
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

}
