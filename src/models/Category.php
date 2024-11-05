<?php
// Import the Database class for database connection
require_once '../models/Database.php';

class Category extends Database
{
    public $id;   // Stores the ID of the category
    public $name; // Stores the name of the category
    /**
     * Retrieves all categories except the one with ID 6.
     *
     * @return array Returns an array of category objects (excluding the one with ID 6).
     */
    public function getAllCategoryExceptUser()
    {
        // SQL query
        $query = "SELECT * FROM `yuga_category` WHERE `id` != 6";
        // Prepare the query for execution
        $queryExecute = $this->db->query($query);
        // Execute the query and return the result
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Creates a new category in the database.
     *
     * @return bool Returns true on successful insertion, false on failure.
     */
    public function createCategory()
    {
        $query = "INSERT INTO `yuga_category`(`name`) VALUES (:name);";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
        return $queryExecute->execute();
    }

    /**
     * Deletes an existing category from the database.
     *
     * @return bool Returns true on successful deletion, false on failure.
     */
    public function deleteCategory()
    {
        $query = "DELETE FROM `yuga_category` WHERE `id` = :id";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryExecute->execute();
    }

    /**
     * Updates the name of an existing category in the database.
     *
     * @return bool Returns true on successful update, false on failure.
     */
    public function updateCategory()
    {
        $query = "UPDATE `yuga_category` SET `name`=:name WHERE `id` = :id;";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_STR);
        $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
        return $queryExecute->execute();
    }
}
