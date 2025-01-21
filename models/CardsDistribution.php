<?php
class CardsDistribution {
    private $id;
    private $players;
    private $pirates;
    private $marins;
    private $siren;
    private $idUser;

   
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getPlayers() { return $this->players; }
    public function setPlayers($players) { $this->players = $players; }

    public function getPirates() { return $this->pirates; }
    public function setPirates($pirates) { $this->pirates = $pirates; }

    public function getMarins() { return $this->marins; }
    public function setMarins($marins) { $this->marins = $marins; }

    public function getSiren() { return $this->siren; }
    public function setSiren($siren) { $this->siren = $siren; }

    public function getIdUser() { return $this->idUser; }
    public function setIdUser($idUser) { $this->idUser = $idUser; }
}
