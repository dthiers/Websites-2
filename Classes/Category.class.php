<?php
/**
 * Created by PhpStorm.
 * User: Raymond Phua
 * Date: 9-3-2015
 * Time: 20:36
 */

class Category {
    private $id;
    private $name;

    //Getters
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    //Setters
    public function setName($name) {
        this->$name = $name;
    }
}