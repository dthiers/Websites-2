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

if (!empty($_POST)) {
    $id = $_POST['id'];
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $small = $_POST['smallDescription'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $productOld = Product::getProduct($id);
    $filepath = $productOld->getImg();
    if (!empty($_FILES['image']['name'])) {
        //image
        $filetmp = $_FILES['image']['tmp_name'];
        $filename = $_FILES['image']['name'];
        $filepath = '../images/' . $filename;

        move_uploaded_file($filetmp, $filepath);
    }

    $categoryId = $_POST['category'];
    $categoryIds = array();
    $categoryIds = $_POST['category'];

    $product = new Product($id, $sku, $name, $small, $description, $price, $stock, $filepath);
    $category = Category::getCategory($categoryId);

    $parent = $category->getParent();

    $db = Database::getDatabase();
    if ($db->updateProduct($product)) {
        unset($_POST);
        $_POST = array();
        if ($categoryId != 0) {
            $db->deleteCategory($product->getId());
            if (!empty($parent)) {
                $db->updateProductCategory($product, $parent);
            }
            $db->updateProductCategory($product, $categoryId);
        }
        header("Location: ../controller/WebshopController.php");
    }
}


$categories = Category::getCategories();
$product = Product::getProduct($_GET['id']);

loadHeader();
editProduct($categories, $product);
loadFooter();