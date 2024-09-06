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
}