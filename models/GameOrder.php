<?php
class GameOrder {
    private $idGame;
    private $idOrder;
    private $quantity;
    private $totalPrice;

    
    public function getIdGame() { return $this->idGame; }
    public function setIdGame($idGame) { $this->idGame = $idGame; }

    public function getIdOrder() { return $this->idOrder; }
    public function setIdOrder($idOrder) { $this->idOrder = $idOrder; }

    public function getQuantity() { return $this->quantity; }
    public function setQuantity($quantity) { $this->quantity = $quantity; }

    public function getTotalPrice() { return $this->totalPrice; }
    public function setTotalPrice($totalPrice) { $this->totalPrice = $totalPrice; }
}
