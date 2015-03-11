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
        $id = $result['ProductId'];
        $sku = $result['SKU'];
        $name = $result['Name'];
        $description = $result['Description'];
        $price = $result['Price'];
        $stock = $result['Stock'];

        //set product
        $product = new Product($id, $sku, $name, $description, $price, $stock);

        return $product;
    }

    //returns all products of the linked order id
    public function getProductFromOrder($orderId) {
        //db connection
        $db = Database::getDatabase();

        //query
        $query = "SELECT * FROM product AS p JOIN Orders_has_Product AS o ON p.ProductId = o.Product_ProductId WHERE o.Orders_OrderId = $orderId";

        $db->doSQL($query);

        $products = $this->returnResults($db->getResult());

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
    public function createProduct() {

    }
}

