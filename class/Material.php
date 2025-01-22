<?php
class Material {
    private $id;
    private $title;
    private $quantity;
    private $idUser;

    
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getTitle() { return $this->title; }
    public function setTitle($title) { $this->title = $title; }

    public function getQuantity() { return $this->quantity; }
    public function setQuantity($quantity) { $this->quantity = $quantity; }

    public function getIdUser() { return $this->idUser; }
    public function setIdUser($idUser) { $this->idUser = $idUser; }
}
