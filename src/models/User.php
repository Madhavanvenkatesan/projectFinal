<?php
require_once __DIR__ . '/Database.php';

class User extends Database
{
    public $id; // Unique identifier for the user
    public $firstname; // First name of the user
    public $lastname; // Last name of the user
    public $email; // Email address of the user
    public $password; // Password of the user
    public $id_role; // Role identifier for the user (admin or regular user)

    /**
     * Retrieves all users from the database.
     * 
     * @return array An array of user objects.
     */
    public function getAllUser()
    {
        $query = "SELECT * FROM `yuga_users`";
        $queryExecute = $this->db->query($query);

        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Registers a new user in the database.
     * 
     * @return bool True on success, false on failure.
     */
    public function registerNew()
    {
        $query = "INSERT INTO `yuga_users`(`firstname`, `lastname`, `email`, `password`) 
        VALUES (:firstname, :lastname, :email, :password);";

        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryExecute->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryExecute->bindValue(':password', $this->password, PDO::PARAM_STR); // Note: Password should be hashed before storing
        return $queryExecute->execute();
    }

    /**
     * Updates an existing user's information in the database.
     * 
     * @return bool True on success, false on failure.
     */
    public function update()
    {
        $query = "UPDATE `yuga_users` SET `firstname`=:firstname, `lastname`=:lastname, `email`=:email,
        `password`=:password WHERE `id` = :id;";

        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_STR);
        $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryExecute->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryExecute->bindValue(':password', $this->password, PDO::PARAM_STR); 
        return $queryExecute->execute();
    }

    /**
     * Deletes a user from the database by their ID.
     * 
     * @return bool True on success, false on failure.
     */
    public function delete()
    {
        $query = "DELETE FROM `yuga_users` WHERE `id` = :id;";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryExecute->execute();
    }

    /**
     * Retrieves a user from the database by their email.
     * 
     * @return object|null The user object if found, null otherwise.
     */
    function getUserByEmail()
    {
        $query = "SELECT * FROM `yuga_users` WHERE `email` = :email;";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Retrieves a user from the database by their ID.
     * 
     * @return object|null The user object if found, null otherwise.
     */
    function getUserById()
    {
        $query = "SELECT * FROM `yuga_users` WHERE `id` = :id;";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
}
