<?php
require_once __DIR__ . '/Database.php';

class Photo extends Database
{
    public $id; // ID of the photo
    public $name; // Name of the photo
    public $id_user; // ID of the user who uploaded the photo
    public $id_category; // ID of the category to which the photo belongs

    /**
     * Retrieves all photos from the database.
     * 
     * @return array An array of photo objects.
     */
    public function getAllPhotos()
    {
        $query = "SELECT * FROM `yuga_photos`";
        $queryExecute = $this->db->query($query);
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Uploads a new photo to the database.
     * 
     * @return bool True on success, false on failure.
     */
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

    /**
     * Retrieves all photos belonging to a specific category.
     * 
     * @return array An array of photo objects for the specified category.
     */
    public function getAllPhotosOfCategory()
    {
        $query = "SELECT * FROM `yuga_photos` WHERE `id_category` = :id_category LIMIT 60";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id_category', $this->id_category, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Deletes a specific photo from the database.
     * 
     * @return bool True on success, false on failure.
     */
    public function delete()
    {
        $query = "DELETE FROM `yuga_photos` WHERE `id` = :id;";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryExecute->execute();
    }

    /**
     * Deletes all photos uploaded by a specific user.
     * 
     * @return bool True on success, false on failure.
     */
    public function deleteAll()
    {
        $query = "DELETE FROM `yuga_photos` WHERE `id_user` = :id_user;";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        return $queryExecute->execute();
    }

    /**
     * Deletes all photos belonging to a specific category.
     * 
     * @return bool True on success, false on failure.
     */
    public function deleteAllByCategory()
    {
        $query = "DELETE FROM `yuga_photos` WHERE `id_category` = :id_category;";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id_category', $this->id_category, PDO::PARAM_INT);
        return $queryExecute->execute();
    }

    /**
     * Retrieves all photos uploaded by a specific user.
     * 
     * @return array An array of photo objects for the specified user.
     */
    function getPhotosByUserId()
    {
        $query = "SELECT * FROM `yuga_photos` WHERE `id_user` = :id_user;";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id_user', $this->id_user, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Retrieves all photos uploaded by a specific user within a specific category.
     * 
     * @return array An array of photo objects for the specified user and category.
     */
    function getPhotosByUserIdAndCat()
    {
        $query = "SELECT * FROM `yuga_photos` WHERE `id_user` = :id_user AND `id_category` = :id_category;";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id_user', $this->id_user, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_category', $this->id_category, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Retrieves a specific photo by its ID.
     * 
     * @return object|null The photo object if found, null otherwise.
     */
    function getPhotoById()
    {
        $query = "SELECT * FROM `yuga_photos` WHERE `id` = :id;";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Retrieves photos by their name.
     * 
     * @return array An array of photo objects with the specified name.
     */
    function getPhotoByName()
    {
        $query = "SELECT * FROM `yuga_photos` WHERE `name` = :name;";
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
}
