<?php

/**
 * Created by PhpStorm.
 * User: Raymond Phua
 * Date: 9-3-2015
 * Time: 20:36
 */
class Category
{
    private $id;
    private $name;
    private $parent;


    function __construct($id, $name, $parent)
    {
        $this->name = $name;
        $this->id = $id;
        $this->parent = $parent;
    }

    static function getCategories()
    {
        $db = Database::getDatabase();

        $result = $db->getCategories();

        $categories = array();
        while ($row = $result->fetch_assoc()){
            $id = $row['CategoryId'];
            $name = $row['Name'];
            $parent = $row['Parent_CategoryId'];

            $category = new Category($id, $name, $parent);

            $categories[] = $category;
        };

        return $categories;
    }

    static function getCategory($categoryId) {
        $db = Database::getDatabase();

        $result = $db->getCategory($categoryId);

        //localvariables
        $id = $result[0]['CategoryId'];
        $name = $result[0]['Name'];
        $parent = $result[0]['ParentId'];

        //create category object
        $category = new Category($id, $name, $parent);

        return $category;
    }

    //Getters
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getParent()
    {
        return $this->parent;
    }

    //Setters
    public function setName($name)
    {
        $this->name = $name;
    }


    public function setParent($parent)
    {
        $this->parent = $parent;
    }


}