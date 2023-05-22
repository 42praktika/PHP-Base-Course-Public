<?php

namespace app\models;
use \app\core\Model;
class Wishlist extends Model
{
    private int $user_id;

    private string $title;

    /**
     * @param int $user_id
     * @param string $title
     */
    public function __construct(int $user_id, string $title)
    {
        $this->user_id = $user_id;
        $this->title = $title;
    }


    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
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
}