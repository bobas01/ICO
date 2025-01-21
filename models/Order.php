<?php
class Order {
    private $id;
    private $totalPrice;
    private $idUser;

    
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getTotalPrice() { return $this->totalPrice; }
    public function setTotalPrice($totalPrice) { $this->totalPrice = $totalPrice; }

    public function getIdUser() { return $this->idUser; }
    public function setIdUser($idUser) { $this->idUser = $idUser; }
}
