<?php

namespace app\models;

use app\core\Model;

class Review extends Model
{
    private string $name_of_reviewer;
    private int $stars;
    private string $review;

    public function __construct(
        ?int $id,
        string $name_of_reviewer,
        int $stars,
        string $review
    ) {
        parent::__construct($id);
        $this->name_of_reviewer = $name_of_reviewer;
        $this->stars = $stars;
        $this->review = $review;
    }

    /**
     * @return string
     */
    public function getNameOfReviewer(): string
    {
        return $this->name_of_reviewer;
    }

    /**
     * @param string $name_of_reviewer
     */
    public function setNameOfReviewer(string $name_of_reviewer): void
    {
        $this->name_of_reviewer = $name_of_reviewer;
    }

    /**
     * @return int
     */
    public function getStars(): int
    {
        return $this->stars;
    }

    /**
     * @param int $stars
     */
    public function setStars(int $stars): void
    {
        $this->stars = $stars;
    }

    /**
     * @return string
     */
    public function getReview(): string
    {
        return $this->review;
    }

    /**
     * @param string $review
     */
    public function setReview(string $review): void
    {
        $this->review = $review;
    }

}