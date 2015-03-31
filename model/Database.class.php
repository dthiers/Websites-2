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

    //return all products ordered by desc
    public function selectAllProducts() {
        //query
        $query = "SELECT * FROM product ORDER BY ProductId desc";

        $result = $this->db->query($query);

        return $result;
    }

    // products from categoryId
    public function selectProductsCategory($categoryId) {
        //query
        $query = "SELECT * FROM product AS p JOIN product_has_categories AS pc ON p.ProductId = pc.Product_ProductId WHERE pc.Categories_CategoryId = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $categoryId);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($productId, $sku, $name, $smallDescription, $description, $price, $stock, $imageURL, $x, $categoryId);

        while ($stmt->fetch()) {
            $result[] = [
                "ProductId" => $productId,
                "SKU" => $sku,
                "Name" => $name,
                "SmallDescription" => $smallDescription,
                "Description" => $description,
                "Price" => $price,
                "Stock" => $stock,
                "ImageURL" => $imageURL,
                "CategoryId" => $categoryId
            ];
        }
        $stmt->close();

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
        $query = "SELECT * FROM product AS p JOIN orders_has_product AS o ON p.ProductId = o.Product_ProductId WHERE o.Orders_OrderId = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $orderId);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($productId, $sku, $name, $smallDescription, $description, $price, $stock, $imageURL, $x, $orderId);

        while ($stmt->fetch()) {
            $result[] = [
                "ProductId" => $productId,
                "SKU" => $sku,
                "Name" => $name,
                "SmallDescription" => $smallDescription,
                "Description" => $description,
                "Price" => $price,
                "Stock" => $stock,
                "ImageURL" => $imageURL
            ];
        }
        $stmt->close();

        return $result;
    }

    //prepared statement and returns result when selecting product from the database
    private function returnProductArray($query, $id) {
        //prepare statement
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($productId, $sku, $name, $smallDescription, $description, $price, $stock, $imageURL);

        while ($stmt->fetch()) {
            $result[] = [
                "ProductId" => $productId,
                "SKU" => $sku,
                "Name" => $name,
                "SmallDescription" => $smallDescription,
                "Description" => $description,
                "Price" => $price,
                "Stock" => $stock,
                "ImageURL" => $imageURL
            ];
        }

        $stmt->close();

        return $result;
    }

    // --------------------- CREATE PRODUCT ------------------- //
    public function createProduct($product) {
        //query
        $query = "INSERT INTO product (SKU, Name, Small_Description, Description, Price, Stock, ImageURL) VALUES (?, ?, ?, ?, ?, ?, ?)";

        //local variables
        $return = false;

        $SKU = $product->getSKU();
        $name = $product->getName();
        $smallDescription = $product->getSmallDescription();
        $description = $product->getDescription();
        $price = $product->getPrice();
        $stock = $product->getStock();
        $img = $product->getImg();

        $stmt = $this->db->prepare($query) or die( $this->db->error);

        $stmt->bind_param('ssssdis', $SKU, $name, $smallDescription, $description, $price, $stock, $img);
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
        $query = "SELECT ProductId FROM product ORDER BY ProductId desc LIMIT 1";
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
        $productId = intval($this->getLastProductId());
        echo "ID = ".$productId;
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
    public function updateProduct($product) {
        //query
        $query = "UPDATE product SET SKU=?, Name=?, Small_Description=?, Description=?, Price=?, Stock=?, ImageURL=? WHERE ProductId=?";

        //local variables
        $ret = true;

        $id = $product->getId();
        $SKU = $product->getSKU();
        $name = $product->getName();
        $smallDescription = $product->getSmallDescription();
        $description = $product->getDescription();
        $price = $product->getPrice();
        $stock = $product->getStock();
        $img = $product->getImg();

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssdisi', $SKU, $name, $smallDescription, $description, $price, $stock, $img, $id) or die($stmt->error);
        $stmt->execute() or die($stmt->error);

        if ($stmt->affected_rows > 0) {
            $ret = true;
        }
        $stmt->close();

        return $ret;
    }

    // ------------------ UPDATE PRODUCT CATEGORY ID -------------- //
    public function updateProductCategory($product, $categoryId) {
        //query
        $query = "INSERT INTO `Product_has_Categories` (`Categories_CategoryId`, `Product_ProductId`) VALUES (?, ?)";

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

        $query2 = "DELETE FROM product_has_categories WHERE Product_ProductId = ?";

        $stmt2 = $this->db->prepare($query2);
        $stmt2->bind_param('i', $productId);
        $stmt2->execute();
        $stmt2->close();

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

    // --------------- CREATE CATEGORY ----------- //
    public function createCategory($category) {
        //local
        $ret = false;
        $name = $category->getName();
        $parent = $category->getParent();
        if ($parent != null) {
            $query = "INSERT INTO categories (Name, Parent_CategoryId) VALUES (?, ?)";
        }
        else {
            $query = "INSERT INTO categories (Name) VALUES (?)";
        }

        $stmt = $this->db->prepare($query);

        if ($parent != null) {
            $stmt->bind_param('si', $name, $parent);
        }
        else {
            $stmt->bind_param('s', $name);
        }

        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            $ret = true;
        }
        $stmt->close();

        return $ret;
    }

    // --------------- EDIT CATEGORY ------------ //
    public function editCategory($category) {
        //local
        $ret = false;

        $query = "UPDATE categories SET Name = ?, Parent_CategoryId = ? WHERE CategoryId = ?";

        $id = $category->getId();
        $name = $category->getName();
        $parent = $category->getParent();

        var_dump($category);

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sii', $name, $parent, $id);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            $ret = true;
        }
        $stmt->close();

        return $ret;
    }

    // --------------- GET CATEGORY -------------- //
    public function getCategory($id) {
        //query
        $query = "SELECT * FROM categories WHERE CategoryId = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->bind_result($categoryId, $name, $parentId);
        while ($stmt->fetch()) {
            $result[] = [
                "CategoryId" => $categoryId,
                "Name" => $name,
                "ParentId" => $parentId
            ];
        }
        $stmt->close();

        return $result;
    }

    // --------------- DELETE CATEGORY FROM CATEGORY TABLE -------- //
    public function deleteCategoryId($categoryId) {
        $ret = false;

        $query2 = "DELETE FROM product_has_categories WHERE Categories_CategoryId = ?";

        $stmt2 = $this->db->prepare($query2);
        $stmt2->bind_param('i', $categoryId);
        $stmt2->execute();
        $stmt2->close();

        //query
        $query = "DELETE FROM categories WHERE CategoryId = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $categoryId);
        $stmt->execute();

        if ($stmt->affected_rows == 1) {
            $ret = true;
        }
        $stmt->close();

        return $ret;
    }

    // ---------------- DELETE CATEGORIES ------------- //
    public function deleteCategory($productId) {
        $ret = false;

        //query
        $query = "DELETE FROM product_has_categories WHERE Product_ProductId = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $productId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $ret = true;
        }
        $stmt->close();

        return $ret;
    }

    // -------------------- CHECK USER ------------------- //
    public function checkUser($username, $password) {
        $ret = false;

        $newPassword = $username.$password."salt";
        $encryptedPassword = sha1($newPassword);

        $query = "SELECT * FROM users WHERE Username = ? AND Password = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $username, $encryptedPassword);
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

    // ------------------- GET USER BY ID ----------------- //
    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE UserId = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
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

    // ------------------- DELETE ORDER ---------------- //
    public function deleteOrder($orderId) {
        $ret = false;

        //query
        $query = "DELETE FROM orders_has_product WHERE Orders_OrderId = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $orderId);
        $stmt->execute();
        $stmt->close();

        //query2
        $query2 = "DELETE FROM orders WHERE OrderId = ?";

        $stmt2 = $this->db->prepare($query2);
        $stmt2->bind_param('i', $orderId);
        $stmt2->execute();

        if ($stmt2->affected_rows > 0) {
            $ret = true;
        }
        $stmt2->close();

        return $ret;
    }

    // ------------------- GET ALL ORDERS -------------- //
    public function getAllOrdersAdmin() {
        //query
        $query = "SELECT * FROM orders AS o JOIN users AS u ON o.Users_UserId = u.UserId";
        $result = $this->db->query($query);

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

    // ----------------- GET LAST ORDER ID ------------- //
    private function getLastOrderId() {
        //query
        $query = "SELECT OrderId FROM orders ORDER BY OrderId desc LIMIT 1";
        $result = $this->db->query($query);
        while ($row = $result->fetch_assoc()) {
            $id = $row['OrderId'];
        }

        return $id;
    }


    // ------------------- INSERT PRODUCTIDS + ORDERID ------------ //
    public function createProductOrder($productId) {
        $query = "INSERT INTO `orders_has_product` (`Orders_OrderId`, `Product_ProductId`) VALUES (?, ?)";

        //local variables
        $ret = false;
        $orderId = $this->getLastOrderId();

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $orderId, $productId);
        $stmt->execute();

        if ($stmt->affected_rows == 1) {
            $ret = true;
        }
        $stmt->close();

        return $ret;
    }

    // ------------------- UPDATE STOCK -------------- //
    public function updateProductStock($productId) {
        $query = "SELECT stock FROM product WHERE ProductId = ?";

        //local
        $ret = false;
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $productId);
        $stmt->execute();
        $stmt->bind_result($stock);
        while ($stmt->fetch()) {
            $result = $stock;
        }
        $stmt->close();

        $newStock = $result - 1;

        //query 2
        $query2 = "UPDATE product SET Stock = ? WHERE ProductId = ?";
        $stmt2 = $this->db->prepare($query2);
        $stmt2->bind_param('ii', $newStock, $productId);
        $stmt2->execute();
        if ($stmt2->affected_rows > 0) {
            $ret = true;
        }
        $stmt2->close();

        return $ret;
    }

    // ------------------ GET ALL ORDERS FROM USER ---------------- //
    public function getAllOrders($userId) {
        $query = "SELECT * FROM orders WHERE `Users_UserId` = ?";

        // local
        $ret = false;
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($orderId, $userId, $paid, $date, $paymentDate, $address, $zip, $city, $country);

        while ($stmt->fetch()) {
            $result[] = [
                "OrderId" => $orderId,
                "Users_UserId" => $userId,
                "Paid" => $paid,
                "Date" => $date,
                "PaymentDate" => $paymentDate,
                "Address" => $address,
                "Zip" => $zip,
                "City" => $city,
                "Country" => $country
            ];
        }
        $stmt->close();

        return $result;
    }

    // ------------------- USER CREATE ------------ //
    public function createUser($user) {
        // local variables
        $return = false;

        $username = $user->getUserName();
        $password = $user->getPassword();
        $email = $user->getEmail();
        $phone = $user->getPhone();
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $address = $user->getAddress();
        $zip = $user->getZip();
        $city = $user->getCity();
        $country = $user->getCountry();

        $newPassword = $username.$password."salt";
        $encryptedPassword = sha1($newPassword);

        $query = "INSERT INTO users (Username, Password, Email, Phone, FirstName, LastName, Address, Zip, City, Country) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssssssss', $username, $encryptedPassword, $email, $phone, $firstName, $lastName, $address, $zip, $city, $country);
        $stmt->execute() or die($stmt->error);
        if($stmt->affected_rows > 0) {
            $return = true;
        }
        $stmt->close();

        return $return;
    }

    // ------------------- NAVIGATION -------------- //
    public function getNavigation(){
        $query = "SELECT * FROM navigation";

        $result = $this->db->query($query);

        return $result;
    }

    // ------------------- CATEGORIES -------------- //
    public function getCategories(){
        $query = "SELECT * FROM categories";

        $result = $this->db->query($query);

        return $result;
    }


    // ------------------- BLOG -------------- //
    public function getBlog(){
        $query = "SELECT * FROM blog ORDER BY Id DESC";

        $result = $this->db->query($query);

        return $result;
    }

    // ---------------- CREATE BLOG ------------ //
    public function createBlog($blog){
        $return = false;

        $username = $blog->getUsername();
        $title = $blog->getTitle();
        $text = $blog->getText();

        $query = "INSERT INTO blog (Username, Title, Text) VALUES (?, ?, ?)";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sss', $username, $title, $text);
        $stmt->execute() or die($stmt->error);
        if($stmt->affected_rows > 0){
            $return = true;
        }
        $stmt->close();

        return $return;

    }

    // --------------- SEARCH PRODUCTS -------------- //
    public function searchProducts($search) {
        // query
        $query = "SELECT * FROM product WHERE Name LIKE ? OR Small_Description LIKE ? OR Description LIKE ? OR Price LIKE ?";

        $stmt = $this->db->prepare($query);
        $search = "%".$search."%";
        $stmt->bind_param('ssss', $search, $search, $search, $search);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($productId, $sku, $name, $smallDescription, $description, $price, $stock, $imageURL);

        $result = array();

        while ($stmt->fetch()) {
            $result[] = [
                "ProductId" => $productId,
                "SKU" => $sku,
                "Name" => $name,
                "SmallDescription" => $smallDescription,
                "Description" => $description,
                "Price" => $price,
                "Stock" => $stock,
                "ImageURL" => $imageURL
            ];
        }
        $stmt->close();

        return $result;
    }

    static function getDatabase() {
        if (Database::$instance == null) {
            Database::$instance = new Database();
        }
        return Database::$instance;
    }

}