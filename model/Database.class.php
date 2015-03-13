<?php
/**
 * Created by PhpStorm.
 * User: Raymond Phua
 * Date: 9-3-2015
 * Time: 20:03
 */

require_once ('../config/config.inc.php');

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

    // ---------------------- READ --------------------- //

    // products from categoryId
    public function selectProductsCategory($categoryId) {
        //prepared statements + security

        //query
        $query = "SELECT * FROM Product WHERE Categories_CategoryId = ?";

        $result = $this->selectPrepareStatement($query, $categoryId);

        return $result;
    }

    public function selectProduct($productId) {
        //query
        $query = "SELECT * FROM Product WHERE ProductId = ?";

        $result = $this->selectPrepareStatement($query, $productId);

        return $result;
    }

    public function selectProductFromOrder($orderId) {
        //query
        $query = "SELECT * FROM product AS p JOIN Orders_has_Product AS o ON p.ProductId = o.Product_ProductId WHERE o.Orders_OrderId = ?";

        $result = $this->selectPrepareStatement($query, $orderId);

        return $result;
    }

    //prepared statement and returns result when selecting product from the database
    private function selectPrepareStatement($query, $id) {
        //prepare statement
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($productId, $sku, $name, $description, $price, $stock);

        while ($stmt->fetch()) {
            $result[] = [
                "ProductId" => $productId,
                "SKU" => $sku,
                "Name" => $name,
                "Description" => $description,
                "Price" => $price,
                "Stock" => $stock
            ];
        }

        $stmt->close();

        return $result;
    }

    // --------------------- CREATE PRODUCT ------------------- //
    public function createProduct($product, $categoryId) {
        //query
        $query = "INSERT INTO product (SKU, Name, Description, Price, Stock, Categories_CategoryId) VALUES (?, ?, ?, ?, ?, ?)";

        //local variables
        $return = false;

        $SKU = $product->getSKU();
        $name = $product->getName();
        $description = $product->getDescription();
        $price = $product->getPrice();
        $stock = $product->getStock();

        $stmt = $this->db->prepare($query) or die( $this->db->error);

        $stmt->bind_param('sssdii', $SKU, $name, $description, $price, $stock, $categoryId);
        $stmt->execute() or die ( $this->db->error);

        if($stmt->affected_rows == 1){
            $return = true;
        }
        $stmt->close();

        return $return;
    }

    // --------------------- UPDATE PRODUCT ------------------- //
    public function updateProduct($product, $categoryId) {
        //query
        $query = "UPDATE Product SET SKU = ?, Name = ?, Price = ?, Stock = ?, Categories_CategoryId = ? WHERE ProductId = ?";

        //local variables
        $ret = false;

        $id = $product->getId();
        $SKU = $product->getSKU();
        $name = $product->getName();
        $price = $product->getPrice();
        $stock = $product->getStock();

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssdiii', $SKU, $name, $price, $stock, $categoryId, $id);
        $stmt->execute();

        if ($stmt->affected_rows == 1) {
            $ret = true;
        }
        $stmt->close();

        return $ret;
    }

    // --------------------- DELETE PRODUCT ------------------- //
    public function deleteProduct($productId) {
        $ret = false;
        //query
        $query = "DELETE FROM Product WHERE ProductId = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $productId);
        $stmt->execute();

        if ($stmt->affected_rows == 1) {
            $ret = true;
        }
        $stmt->close();

        return $ret;
    }

    static function getDatabase() {
        if (Database::$instance == null) {
            Database::$instance = new Database();
        }
        return Database::$instance;
    }
}