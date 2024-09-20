<?php
require_once 'models/Database.php';

class Photo extends Database
{
    public $id;
    public $name;
    public $id_user;
    public $id_category;

    public function getAllPhotos()
    {
        $query = "SELECT * FROM `yuga_photos`";
        $queryExecute = $this->db->query($query);

        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }

    public function uploadNew()
    {
        $query = "INSERT INTO `yuga_photos`(`name`, `id_category`, `id_user`) 
        VALUES (:name, :id_category, :id_user);";

        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_category', $this->id_category, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_user', $this->id_user, PDO::PARAM_STR);
        return $queryExecute->execute();
    }

    public function getAllPhotosOfCategory()
    {
        $query = "SELECT * FROM `yuga_photos` WHERE `id_category` = :id_category LIMIT 60";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id_category', $this->id_category, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }

    public function delete()
    {
        $query = "DELETE FROM `yuga_photos` WHERE `id` = :id;";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryExecute->execute();
    }
    public function deleteAll()
    {
        $query = "DELETE FROM `yuga_photos` WHERE `id_user` = :id_user;";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        return $queryExecute->execute();
    }
    public function deleteAllByCategory()
    {
        $query = "DELETE FROM `yuga_photos` WHERE `id_category` = :id_category;";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id_category', $this->id_category, PDO::PARAM_INT);
        return $queryExecute->execute();
    }
    function getPhotosByUserId()
    {
        $query = "SELECT * FROM `yuga_photos` WHERE `id_user` = :id_user;";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id_user', $this->id_user, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    function getPhotosByUserIdAndCat()
    {
        $query = "SELECT * FROM `yuga_photos` WHERE `id_user` = :id_user AND `id_category` = :id_category;";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id_user', $this->id_user, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_category', $this->id_category, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }

    function getPhotoById()
    {
        $query = "SELECT * FROM `yuga_photos` WHERE `id` = :id;";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    function getPhotoByName()
    {
        $query = "SELECT * FROM `yuga_photos` WHERE `name` = :name;";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
}