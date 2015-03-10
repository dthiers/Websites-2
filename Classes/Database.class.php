<?php
/**
 * Created by PhpStorm.
 * User: Raymond Phua
 * Date: 9-3-2015
 * Time: 20:03
 */

require_once ('../config/config.php');

class Database {
    private $db;
    static $instance;

    //private constructor, using the singleton design pattern
    private function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($this->db->connect_errno != 0) //connection error
        {
            die("Couldn't connect to the database!");
        }
    }

    // ---------------------- PRODUCT FUNCTIONS --------------------

    // products from categoryId
    public function selectProductsCategory($categoryId) {
        //prepared statements + security

        //query
        $query = "SELECT * FROM Product WHERE Categories_CategoryId = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $categoryId);

        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($productId, $sku, $name, $price, $stock);

        while ($stmt->fetch()) {
            $result[] = [
                "ProductId" => $productId,
                "SKU"       => $sku,
                "Name"      => $name,
                "Price"     => $price,
                "Stock"     => $stock
            ];
        }

        $stmt->close();

        return $result;
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