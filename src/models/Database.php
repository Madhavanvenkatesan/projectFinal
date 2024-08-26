<?php
class Database
{
    protected $db;

    public function __construct()
    {
        try {

            $this->db = new PDO('mysql:host=172.18.0.2;dbname=iniyan_studios;charset=utf8', 'root', 'pw');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function __destruct()
    {
        $this->db = NULL;
    }
}