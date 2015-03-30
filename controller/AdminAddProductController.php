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

if (!empty($_POST)) {
    $db = Database::getDatabase();

    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $small = $_POST['smallDescription'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $categoryIds = array();
    $categoryIds = $_POST['category'];

    //image
    $filetmp = $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $filepath = '../images/'.$filename;

    move_uploaded_file($filetmp, $filepath);

    $product = new Product(null, $sku, $name, $small, $description, $price, $stock, $filepath);


    if ($db->createProduct($product)) {
        unset($_POST);
        $_POST = array();

        foreach ($categoryIds as $categoryId) {
            $db->createProductCategory($categoryId);
        }
        header("Location: ../controller/AdminAddProductController.php");
    }

}


$categories = Category::getCategories();

loadHeader();
addProduct($categories);
loadFooter();