<?php

namespace app\models;

class Manga extends \app\core\Model
{

    private string $title;
    private string $description;
    private string $cover_image_path;
    private string $author_name;
    private string $genre;
    private int $rating_id;
    private int $age_rating;
    private int $chapter_list_id;
    private int $release_date;

    /**
     * @param string $title
     * @param string $description
     * @param string $cover_image_path
     * @param string $author_name
     * @param string $genre
     * @param int $rating_id
     * @param int $age_rating
     * @param int $chapter_list_id
     * @param int $release_date
     */
    public function __construct(?int $id, string $title, string $description, string $cover_image_path, string $author_name,
                                string $genre, int $rating_id, int $age_rating, int $chapter_list_id, int $release_date)
    {
        parent::__construct($id);
        $this->title = $title;
        $this->description = $description;
        $this->cover_image_path = $cover_image_path;
        $this->author_name = $author_name;
        $this->genre = $genre;
        $this->rating_id = $rating_id;
        $this->age_rating = $age_rating;
        $this->chapter_list_id = $chapter_list_id;
        $this->release_date = $release_date;
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



    public function getAttributes(): array
    {
        return ["title"];
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
     * @return string
     */
    public function getCoverImagePath(): string
    {
        return $this->cover_image_path;
    }

    /**
     * @param string $cover_image_path
     */
    public function setCoverImagePath(string $cover_image_path): void
    {
        $this->cover_image_path = $cover_image_path;
    }

    /**
     * @return string
     */
    public function getAuthorName(): string
    {
        return $this->author_name;
    }

    /**
     * @param string $author_name
     */
    public function setAuthorName(string $author_name): void
    {
        $this->author_name = $author_name;
    }

    /**
     * @return int
     */
    public function getRatingId(): int
    {
        return $this->rating_id;
    }

    /**
     * @param int $rating_id
     */
    public function setRatingId(int $rating_id): void
    {
        $this->rating_id = $rating_id;
    }

    /**
     * @return int
     */
    public function getAgeRating(): int
    {
        return $this->age_rating;
    }

    /**
     * @param int $age_rating
     */
    public function setAgeRating(int $age_rating): void
    {
        $this->age_rating = $age_rating;
    }

    /**
     * @return int
     */
    public function getChapterListId(): int
    {
        return $this->chapter_list_id;
    }

    /**
     * @param int $chapter_list_id
     */
    public function setChapterListId(int $chapter_list_id): void
    {
        $this->chapter_list_id = $chapter_list_id;
    }

    /**
     * @return int
     */
    public function getReleaseDate(): int
    {
        return $this->release_date;
    }

    /**
     * @param int $release_date
     */
    public function setReleaseDate(int $release_date): void
    {
        $this->release_date = $release_date;
    }

    /**
     * @return string
     */
    public function getGenre(): string
    {
        return $this->genre;
    }

    /**
     * @param string $genre
     */
    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }
}