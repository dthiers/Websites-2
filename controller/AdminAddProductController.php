<?php
/**
 * Created by PhpStorm.
 * User: dionthiers
 * Date: 30/03/15
 * Time: 18:13
 */

include '../model/Database.class.php';
include '../model/Navigation.class.php';
include '../model/Category.class.php';
include '../model/Product.class.php';

include '../view/HeaderView.php';
include '../view/ProductView.php';
include '../view/FooterView.php';

if(!empty($_POST)){
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $small = $_POST['smallDescription'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image = $_POST['image'];

    $categoryIds = array();
    $categoryIds = $_POST['category'];


    $product = new Product(null, $sku, $name, $small, $description, $price, $stock, $image);

    // Categories moeten allemaal nog

    $db = Database::getDatabase();
    if($db->createProduct($product)){
        unset($_POST);
        $_POST = array();

        foreach($categoryIds as $categoryId){
            $db->createProductCategory($categoryId);
        }
        header("Location: ../controller/AdminAddProductController.php");

        echo "Product toegevoegd";
    }

}


$categories = Category::getCategories();

loadHeader();
addProduct($categories);
loadFooter();