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
}

