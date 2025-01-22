<?php
class Message {
    private $id;
    private $title;
    private $mail;
    private $description;


    
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getTitle() { return $this->title; }
    public function setTitle($title) { $this->title = $title; }

    public function getMail() { return $this->mail; }
    public function setMail($mail) { $this->mail = $mail; }

    public function getDescription() { return $this->description; }
    public function setDescription($description) { $this->description = $description; }


}
