<?php
/**
 * @author Pawinee Mahantamak Student number 041095866
 * Course: CST8285  
 * Lab Section: 331
 * Assesment: Assignment2 
 * File Name: news.php
 * Professor: Malek El-Kouzi
 * Date Created: Nov 14, 2023
 * Date Modified: Nov 15, 2023
 * Due Date: Nov 26, 2023
 * Version: 1.0
 * Description : model a location news
 * 
 */
class News {
    private $id;
    private $title;
    private $imageUrl;
    private $content;
    private $newsdate;

    public function __construct($id, $title, $imageUrl, $content, $newsdate) {
        $this->setId($id);
        $this->setTitle($title);
        $this->setImageUrl($imageUrl);
        $this->setContent($content);
        $this->setNewsDate($newsdate);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getImageUrl() {
        return $this->imageUrl;
    }

    public function setImageUrl($imageUrl) {
        $this->imageUrl = $imageUrl;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getNewsDate() {
        return $this->newsdate;
    }

    public function setNewsDate($newsdate) {
        $this->newsdate = $newsdate;
    }
}
?>
