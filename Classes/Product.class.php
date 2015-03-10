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

    public function getPrice() {
        return $this->price;
    }

    public function getStock() {
        return $this->stock;
    }


    // Setters
    public function setSKU($SKU) {
        $this->SKU = $SKU;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function __construct($SKU, $name, $price, $stock) {
        $this->setSKU($SKU);
        $this->setName($name);
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

        //query
        $query = "SELECT * FROM product WHERE ProductId = $productId";

        $db->doSQL($query);

        //get result
        $result = $db->getResult();

        //local variables
        $sku = $result['SKU'];
        $name = $result['Name'];
        $price = $result['Price'];
        $stock = $result['Stock'];

        //set product
        $product = new Product($sku, $name, $price, $stock);

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
        while ($row = $result) {
            // local values
            $sku = $row['SKU'];
            $name = $row['Name'];
            $price = $row['Price'];
            $stock = $row['Stock'];

            $product = new Product($sku, $name, $price, $stock);

            //add products to the array
            $products[] = $product;
        }

        return $products;
    }

    // -------------------------------------- CREATE ---------------------------- //
    public function createProduct() {

    }
}

