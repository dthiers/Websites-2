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
    private $description;
    private $price;
    private $stock;

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

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function __construct($id, $SKU, $name, $description, $price, $stock) {
        $this->setId($id);
        $this->setSKU($SKU);
        $this->setName($name);
        $this->setDescription($description);
        $this->setPrice($price);
        $this->setStock($stock);
    }

    // ------------------------------------ READ ------------------------------------------ //

    //returns an array of products of the linked category
    public function getAllProductsFromCategory($categoryId) {
        //db connection
        $db = Database::getDatabase();

        $result = $db->selectProductsCategory($categoryId);

        $products = $this->returnResults($result);

        return $products;
    }

    //returns a product of the given product id
    public function getProduct($productId) {
        //db connection
        $db = Database::getDatabase();

        $result = $db->selectProduct($productId);

        //local variables
        $id = $result[0]['ProductId'];
        $sku = $result[0]['SKU'];
        $name = $result[0]['Name'];
        $description = $result[0]['Description'];
        $price = $result[0]['Price'];
        $stock = $result[0]['Stock'];

        //set product
        $product = new Product($id, $sku, $name, $description, $price, $stock);

        return $product;
    }

    //returns all products of the linked order id
    public function getProductsFromOrder($orderId) {
        //db connection
        $db = Database::getDatabase();

        $result = $db->selectProductFromOrder($orderId);

        $products = $this->returnResults($result);

        return $products;
    }

    //return all products of the given result
    private function returnResults($result) {
        $products = array();

        //loop through all the results
        foreach ($result as $item) {
            // local values
            $productId = $item['ProductId'];
            $sku = $item['SKU'];
            $name = $item['Name'];
            $description = $item['Description'];
            $price = $item['Price'];
            $stock = $item['Stock'];

            $product = new Product($productId, $sku, $name, $description, $price, $stock);

            //add products to the array
            $products[] = $product;
        }

        return $products;
    }

    // -------------------------------------- CREATE ---------------------------- //
    public function createProduct($sku, $name, $description, $price, $stock, $categoryId) {
        $product = new Product(null, $sku, $name, $description, $price, $stock);

        //db connection
        $db = Database::getDatabase();

        $bool = $db->createProduct($product, $categoryId);

        return $bool;
    }

    // -------------------------------------- UPDATE --------------------------- //
    public function updateProduct($productId, $sku, $name, $description, $price, $stock, $categoryId) {
        $product = new Product($productId, $sku, $name, $description, $price, $stock);

        //db connection
        $db = Database::getDatabase();

        $bool = $db->updateProduct($product, $categoryId);

        return $bool;
    }

    // ---------------------------------- DELETE -------------------------------- //
    public function deleteProduct($productId) {

        //db connection
        $db = Database::getDatabase();

        $bool = $db->deleteProduct($productId);
    }
}

