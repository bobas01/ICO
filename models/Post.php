<?php
class Post {
    private $id;
    private $title;
    private $description;
    private $createdAt;
    private $image;
    private $idUser;

   
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getTitle() { return $this->title; }
    public function setTitle($title) { $this->title = $title; }

    public function getDescription() { return $this->description; }
    public function setDescription($description) { $this->description = $description; }

    public function getCreatedAt() { return $this->createdAt; }
    public function setCreatedAt($createdAt) { $this->createdAt = $createdAt; }

    public function getImage() { return $this->image; }
    public function setImage($image) { $this->image = $image; }

    public function getIdUser() { return $this->idUser; }
    public function setIdUser($idUser) { $this->idUser = $idUser; }
}
