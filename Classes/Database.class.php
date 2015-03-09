<?php
/**
 * Created by PhpStorm.
 * User: Raymond Phua
 * Date: 9-3-2015
 * Time: 20:03
 */

include_once ('../config/config.php');

class Database {
    private $db;
    private $result;
    static $instance;

    //private constructor, using the singleton design pattern
    private function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($this->db->connect_errno != 0) //connection error
        {
            die("Couldn't connect to the database!");
        }
    }

    //misschien toch prepared statements maken
    public function doSQL($sql) {
        $this->result = $this->db->query($sql);
    }

    public function getResult() {
        return $this->result->fetch_assoc();
    }

    static function getDatabase() {
        if (Database::$instance == null) {
            Database::$instance = new Database();
        }
        return Database::$instance;
    }
}