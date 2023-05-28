<?php

namespace app\models;

class Tag extends \app\core\Model
{

    private string $title;

    /**
     * @param string $title
    */
    public function __construct(?int $id, string $title)
    {
        parent::__construct($id);
        $this->title =strtolower($title);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return strtolower($this->title);
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = strtolower($title);
    }



    public function getAttributes(): array
    {
        return ["title"];
    }
}