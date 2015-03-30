<?php
/**
 * Created by PhpStorm.
 * User: dionthiers
 * Date: 30/03/15
 * Time: 18:46
 */

include '../model/Database.class.php';
include '../model/Navigation.class.php';
include '../model/Category.class.php';
include '../model/Product.class.php';

include '../view/HeaderView.php';
include '../view/ProductView.php';
include '../view/FooterView.php';

if(!empty($_POST)){
    echo "testje";

    $id = $_POST['id'];
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $small = $_POST['smallDescription'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image = $_POST['image'];

    $categoryIds = array();
    $categoryIds = $_POST['category'];


    $product = new Product($id, $sku, $name, $small, $description, $price, $stock, $image);

    // Categories moeten allemaal nog

    $db = Database::getDatabase();
    if($db->updateProduct($product)){
        unset($_POST);
        $_POST = array();

        foreach($categoryIds as $categoryId){
            $db->updateProductCategory($product, $categoryId);
        }
        header("Location: ../controller/AdminAddProductController.php");
    }

}


$categories = Category::getCategories();
$product = Product::getProduct($_GET['id']);

loadHeader();
editProduct($categories, $product);
loadFooter();