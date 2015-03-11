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
        $stmt->bind_result($productId, $sku, $name, $price, $stock);

        while ($stmt->fetch()) {
            $result[] = [
                "ProductId" => $productId,
                "SKU" => $sku,
                "Name" => $name,
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
        $query = "INSERT INTO Product (ProductId, SKU, Name, Price, Stock, Categories_CategoryId VALUES ('', ?, ?, ?, ?, ?)";

        //local variables
        $SKU = $product->getSKU();
        $name = $product->getName();
        $price = $product->getPrice();
        $stock = $product->getStock();

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssdii', $SKU, $name, $price, $stock, $categoryId);
        $stmt->execute();
        $stmt->close();
    }

    public function updateProduct($product, $categoryId) {
        //query
        $query = "UPDATE Product SET SKU = ?, Name = ?, Price = ?, Stock = ?, Categories_CategoryId = ? WHERE ProductId = ?";

        //local variables
        $id = $product->getId();
        $SKU = $product->getSKU();
        $name = $product->getName();
        $price = $product->getPrice();
        $stock = $product->getStock();

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssdiii', $SKU, $name, $price, $stock, $categoryId, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteProduct($productId) {
        //query
        $query = "DELETE FROM Product WHERE ProductId = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $productId);
        $stmt->execute();
        $stmt->close();
    }

    static function getDatabase() {
        if (Database::$instance == null) {
            Database::$instance = new Database();
        }
        return Database::$instance;
    }
}