<?php
/**
 * Created by PhpStorm.
 * User: Raymond Phua
 * Date: 9-3-2015
 * Time: 19:50
 */

class Product {

    // instance variables
    private $id;
    private $SKU;
    private $name;
    private $smallDescription;
    private $description;
    private $price;
    private $stock;
    private $img;

    public function getImg()
    {
        return $this->img;
    }


    public function setImg($img)
    {
        $this->img = $img;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getSKU() {
        return $this->SKU;
    }

    public function getName(){
        return $this->name;
    }

    public function getSmallDescription() {
        return $this->smallDescription;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getStock() {
        return $this->stock;
    }


    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setSKU($SKU) {
        $this->SKU = $SKU;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setSmallDescription($smallDescription) {
        $this->smallDescription = $smallDescription;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    //Constructor
    public function __construct($id, $SKU, $name, $smallDescription, $description, $price, $stock, $img) {
        $this->setId($id);
        $this->setSKU($SKU);
        $this->setName($name);
        $this->setSmallDescription($smallDescription);
        $this->setDescription($description);
        $this->setPrice($price);
        $this->setStock($stock);
        $this->setImg($img);
    }

    // ------------------------------------ READ ------------------------------------------ //

    //returns an array of all products ordered by desc
    static function getAllProductsDescending() {
        //db connection
        $db = Database::getDatabase();

        $result = $db->selectAllProducts();

        $products = array();
        while ($row = $result->fetch_assoc()) {
            $id = $row['ProductId'];
            $sku = $row['SKU'];
            $name = $row['Name'];
            $small_description = $row['Small_Description'];
            $description = $row['Description'];
            $price = $row['Price'];
            $stock = $row['Stock'];
            $img = $row['ImageURL'];

            $product = new Product($id, $sku, $name, $small_description, $description, $price, $stock, $img);

            $products[] = $product;
        };
        return $products;
    }

    //returns an array of products of the linked category
    static function getAllProductsFromCategory($categoryId) {
        //db connection
        $db = Database::getDatabase();

        $result = $db->selectProductsCategory($categoryId);

        $products = Product::returnResults($result);

        return $products;
    }

    //returns a product of the given product id
    static function getProduct($productId) {
        //db connection
        $db = Database::getDatabase();

        $result = $db->selectProduct($productId);

        //local variables
        $id = $result[0]['ProductId'];
        $sku = $result[0]['SKU'];
        $name = $result[0]['Name'];
        $smallDescription = $result[0]['SmallDescription'];
        $description = $result[0]['Description'];
        $price = $result[0]['Price'];
        $stock = $result[0]['Stock'];
        $img = $result[0]['ImageURL'];

        //set product
        $product = new Product($id, $sku, $name, $smallDescription,$description, $price, $stock, $img);

        return $product;
    }

    // Search products
    static function searchProducts($search) {
        //db connection
        $db = Database::getDatabase();

        $result = $db->searchProducts($search);
        $products = Product::returnResults($result);

        return $products;
    }

    //returns all products of the linked order id
    static function getProductsFromOrder($orderId) {
        //db connection
        $db = Database::getDatabase();

        $result = $db->selectProductFromOrder($orderId);

        $products = Product::returnResults($result);

        return $products;
    }

    //return all products of the given result
    private static function returnResults($result) {
        $products = array();

        //loop through all the results
        foreach ($result as $item) {
            // local values
            $productId = $item['ProductId'];
            $sku = $item['SKU'];
            $name = $item['Name'];
            $smallDescription = $item['SmallDescription'];
            $description = $item['Description'];
            $price = $item['Price'];
            $stock = $item['Stock'];
            $img = $item['ImageURL'];

            $product = new Product($productId, $sku, $name, $smallDescription,$description, $price, $stock, $img);

            //add products to the array
            $products[] = $product;
        }

        return $products;
    }

    // -------------------------------------- CREATE ---------------------------- //
    public function createProduct($sku, $name, $smallDescription,$description, $price, $stock, $categoryId, $img) {
        $product = new Product(null, $sku, $name, $smallDescription, $description, $price, $stock, $img);

        //db connection
        $db = Database::getDatabase();

        $bool = $db->createProduct($product, $categoryId);

        return $bool;
    }

    // -------------------------------------- UPDATE --------------------------- //
    public function updateProduct($productId, $sku, $name, $smallDescription,$description, $price, $stock, $categoryId, $img) {
        $product = new Product($productId, $sku, $name, $smallDescription,$description, $price, $stock, $img);

        //db connection
        $db = Database::getDatabase();

        $bool = $db->updateProduct($product, $categoryId);

        return $bool;
    }

    // ---------------------------------- DELETE -------------------------------- //
    static function deleteProduct($productId) {

        //db connection
        $db = Database::getDatabase();

        $bool = $db->deleteProduct($productId);

        return $bool;
    }
}

