<?php
class Game {
    private $id;
    private $title;
    private $price;
    private $stripeProductId;

   
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getTitle() { return $this->title; }
    public function setTitle($title) { $this->title = $title; }

    public function getPrice() { return $this->price; }
    public function setPrice($price) { $this->price = $price; }

    public function getStripeProductId() { return $this->stripeProductId; }
    public function setStripeProductId($stripeProductId) { $this->stripeProductId = $stripeProductId; }
}
