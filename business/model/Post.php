<?php

class Post{

    private $title;
    private $body;
    private $date;

    public function __construct($title, $body, $date){
        $this->title = $title; 
        $this->body = $body;
        $this->date = $date;
    }

    /* Getters */
    public function getTitle(){
        return $this->title;
    }
    public function getBody(){
        return $this->body;
    }
    public function getDate(){
        return $this->date;
    }

    /* Setters */
    public function setTitle($title){
        $this->title = $title;
    }
    public function setBody($body){
        $this->body = $body;
    }
    public function setDate($date){
        $this->date = $date;
    }
}

?>