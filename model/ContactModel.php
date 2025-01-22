<?php

namespace App\Model;

class ContactModel extends Model
{
    public function insertMessage($name, $mail, $message)
    {
        $reqContact = 'INSERT INTO `message` (name, email, message, created_at) VALUES (:name, :email, :message, NOW())';
        $reqContactMe = $this->getDb()->prepare($reqContact);

        $reqContactMe->bindParam(':name', $name);
        $reqContactMe->bindParam(':email', $mail);
        $reqContactMe->bindParam(':message', $message);
        $reqContactMe->execute();
    }
}
