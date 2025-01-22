<?php
class User {
    private $id;
    private $name;
    private $phoneNumber;
    private $email;
    private $password;
    private $role;
    private $stripeConnectId;

    // Getters and Setters
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }

    public function getPhoneNumber() { return $this->phoneNumber; }
    public function setPhoneNumber($phoneNumber) { $this->phoneNumber = $phoneNumber; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }

    public function getPassword() { return $this->password; }
    public function setPassword($password) { $this->password = password_hash($password, PASSWORD_DEFAULT); }

    public function getRole() { return $this->role; }
    public function setRole($role) { $this->role = $role; }

    public function getStripeConnectId() { return $this->stripeConnectId; }
    public function setStripeConnectId($stripeConnectId) { $this->stripeConnectId = $stripeConnectId; }
}
