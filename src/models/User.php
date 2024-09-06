<?php
require_once 'models/Database.php';

class User extends Database
{
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $id_role;


    public function getAllUser()
    {
        $query = "SELECT * FROM `yuga_users`";
        $queryExecute = $this->db->query($query);

        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }

    public function registerNew()
    {
        $query = "INSERT INTO `yuga_users`(`firstname`, `lastname`, `email`, `password`) 
        VALUES (:firstname, :lastname, :email, :password);";

        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryExecute->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryExecute->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $queryExecute->execute();
    }
    public function update()
    {
        $query = "UPDATE `yuga_users` SET `firstname`=:firstname,`lastname`=:lastname,`email`=:email,`password`=:password WHERE `id` = :id;";

        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_STR);
        $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryExecute->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryExecute->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $queryExecute->execute();
    }

    public function delete()
    {
        $query = "DELETE FROM `yuga_users` WHERE `id` = :id;";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryExecute->execute();
    }
    /**
     * get user by email
     */
    function getUserByEmail()
    {
        $query = "SELECT * FROM `yuga_users` WHERE `email` = :email;";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    function getUserById()
    {
        $query = "SELECT * FROM `yuga_users` WHERE `id` = :id;";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
}