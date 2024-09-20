<?php
require_once 'models/Database.php';
class Category extends Database
{
    public $id;
    public $name;

    public function getAllCategoryExceptUser()
    {
        $query = "SELECT * FROM `yuga_category` WHERE `id` != 6";
        $queryExecute = $this->db->query($query);
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    public function createCategory()
    {
        $query = "INSERT INTO `yuga_category`(`name`) VALUES (:name);";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
        return $queryExecute->execute();
    }
    public function deleteCategory()
    {
        $query = "DELETE FROM `yuga_category` WHERE `id` = :id";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_STR);
        return $queryExecute->execute();
    }
    public function updateCategory()
    {
        $query = "UPDATE `yuga_category` SET `name`=:name WHERE `id` = :id;";

        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_STR);
        $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
        return $queryExecute->execute();
    }
}