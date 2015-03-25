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
        $query = "SELECT * FROM product WHERE Parent_CategoryId = ?";

        $result = $this->returnProductArray($query, $categoryId);

        return $result;
    }

    // returns the selected product
    public function selectProduct($productId) {
        //query
        $query = "SELECT * FROM product WHERE ProductId = ?";

        $result = $this->returnProductArray($query, $productId);

        return $result;
    }

    //returns all products from an order
    public function selectProductFromOrder($orderId) {
        //query
        $query = "SELECT * FROM product AS p JOIN Orders_has_Product AS o ON p.ProductId = o.Product_ProductId WHERE o.Orders_OrderId = ?";

        $result = $this->returnProductArray($query, $orderId);

        return $result;
    }

    //prepared statement and returns result when selecting product from the database
    private function returnProductArray($query, $id) {
        //prepare statement
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($productId, $sku, $name, $smallDescription, $description, $price, $stock);

        while ($stmt->fetch()) {
            $result[] = [
                "ProductId" => $productId,
                "SKU" => $sku,
                "Name" => $name,
                "SmallDescription" => $smallDescription,
                "Description" => $description,
                "Price" => $price,
                "Stock" => $stock
            ];
        }

        $stmt->close();

        return $result;
    }

    // --------------------- CREATE PRODUCT ------------------- //
    public function createProduct($product) {
        //query
        $query = "INSERT INTO product (SKU, Name, Small_Description, Description, Price, Stock) VALUES (?, ?, ?, ?, ?, ?)";

        //local variables
        $return = false;

        $SKU = $product->getSKU();
        $name = $product->getName();
        $smallDescription = $product->getSmallDescription();
        $description = $product->getDescription();
        $price = $product->getPrice();
        $stock = $product->getStock();

        $stmt = $this->db->prepare($query) or die( $this->db->error);

        $stmt->bind_param('ssssdi', $SKU, $name, $smallDescription, $description, $price, $stock);
        $stmt->execute() or die ( $this->db->error);

        if($stmt->affected_rows == 1){
            $return = true;
        }
        $stmt->close();

        return $return;
    }

    // ----------------- GET LAST PRODUCT ID ------------- //
    private function getLastProductId() {
        //query
        $query = "SELECT ProductId FROM product ORDER BY desc LIMIT 1";
        $result = $this->db->query($query);
        while ($row = $result->fetch_assoc()) {
            $id = $row['ProductId'];
        }

        return $id;
    }

    // ----------------- INSERT PRODUCTID + CATEGORYID --------- //
    public function createProductCategory($categoryId) {
        //query
        $query = "INSERT INTO `product_has_categories` (`Product_ProductId`, `Categories_CategoryId`) VALUES (?, ?)";

        //local variables
        $ret = false;
        $productId = $this->getLastProductId();

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $productId, $categoryId);
        $stmt->execute();

        if ($stmt->affected_rows == 1) {
            $ret = true;
        }
        $stmt->close();

        return $ret;
    }
    // ---------- createProduct + createProductCategory, call the second method right after the first method to create product --------- //

    // --------------------- UPDATE PRODUCT ------------------- //
    public function updateProduct($product, $categoryId) {
        //query
        $query = "UPDATE product SET SKU = ?, Name = ?, Price = ?, Stock = ? WHERE ProductId = ?";

        //local variables
        $ret = false;

        $id = $product->getId();
        $SKU = $product->getSKU();
        $name = $product->getName();
        $smallDescription = $product->getSmallDescription();
        $description = $product->getDescription();
        $price = $product->getPrice();
        $stock = $product->getStock();

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssdii', $SKU, $name, $smallDescription, $description, $price, $stock, $id);
        $stmt->execute();

        if ($stmt->affected_rows == 1) {
            $ret = true;
        }
        $stmt->close();

        return $ret;
    }

    // ------------------ UPDATE PRODUCT CATEGORY ID -------------- //
    public function updateProductCategory($product, $categoryId) {
        //query
        $query = "UPDATE `Product_has_Categories` SET `Categories_CategoryId` = ? WHERE `Product_ProductId` = ?";

        //local variables
        $ret = false;
        $id = $product->getId();

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $categoryId, $id);
        $stmt->execute();

        if ($stmt->affected_rows == 1) {
            $ret = true;
        }
        $stmt->close();

        return $ret;
    }
    // ------- updateProduct + updateProductCategory, call updateProductCategory right after updateProduct to update product ------------ //
    

    // --------------------- DELETE PRODUCT ------------------- //
    public function deleteProduct($productId) {
        $ret = false;
        //query
        $query = "DELETE FROM product WHERE ProductId = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $productId);
        $stmt->execute();

        if ($stmt->affected_rows == 1) {
            $ret = true;
        }
        $stmt->close();

        return $ret;
    }

    // -------------------- CHECK USER ------------------- //
    public function checkUser($username, $password) {
        $ret = false;

        $query = "SELECT * FROM users WHERE Username = ? AND Password = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $ret = true;
        }
        $stmt->close();

        return $ret;
    }

    // ------------------- GET USER -------------------- //
    public function getUser($username) {
        $query = "SELECT * FROM users WHERE Username = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $username, $password, $email, $phone, $firstName, $lastName, $address, $zip, $city, $country);

        while ($stmt->fetch()) {
            $result[] = [
                "UserId" => $id,
                "Username" => $username,
                "Password" => $password,
                "Email" => $email,
                "Phone" => $phone,
                "FirstName" => $firstName,
                "LastName" => $lastName,
                "Address" => $address,
                "Zip" => $zip,
                "City" => $city,
                "Country" => $country
            ];
        }
        $stmt->close();

        return $result;
    }

    // ------------------- ORDER FOR USER -------------- //
    public function createOrder($userId, $order) {
        // local variables
        $ret = false;

        $paid = $order->getPaid();
        $date = $order->getDate();
        $paymentDate = $order->getPaymentDate();
        $address = $order->getAddress();
        $zip = $order->getZip();
        $city = $order->getCity();
        $country = $order->getCountry();

        $query = "INSERT INTO orders (`Users_UserId`, `Paid`, `Date`, `PaymentDate`, `Address`, `Zip`, `City`, `Country`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iissssss', $userId, $paid, $date, $paymentDate, $address, $zip, $city, $country);
        $stmt->execute();
        if($stmt->affected_rows > 0) {
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