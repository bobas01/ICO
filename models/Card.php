<?php
class Card {
    private $id;
    private $title;
    private $rules;
    private $image;
    private $type;
    private $idUser;

   
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getTitle() { return $this->title; }
    public function setTitle($title) { $this->title = $title; }

    public function getRules() { return $this->rules; }
    public function setRules($rules) { $this->rules = $rules; }

    public function getImage() { return $this->image; }
    public function setImage($image) { $this->image = $image; }

    public function getType() { return $this->type; }
    public function setType($type) { $this->type = $type; }

    public function getIdUser() { return $this->idUser; }
    public function setIdUser($idUser) { $this->idUser = $idUser; }
}
