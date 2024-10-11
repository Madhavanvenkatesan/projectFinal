<?php
class Database
{
    // This will store the PDO connection object
    protected $db;

//Establishes a connection to the database
    public function __construct()
    {
        try {
            // 'mysql' is the host, 'iniyan_studios' is the database name, 'root' is the username, 'pw' is the password
            $this->db = new PDO('mysql:host=mysql;dbname=iniyan_studios;charset=utf8', 'root', 'pw');
        } catch (Exception $e) {
            // If the connection fails, the script will stop and display the error message
            die('Erreur : ' . $e->getMessage());
        }
    }


//This method closes the database connection by setting the PDO object to NULL.
    public function __destruct()
    {
        // Close the database connection by setting the PDO object to null
        $this->db = NULL;
    }
}
