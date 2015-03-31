<?php
/**
 * Created by PhpStorm.
 * User: dionthiers
 * Date: 31/03/15
 * Time: 17:53
 */

include '../model/Database.class.php';
include '../model/Product.class.php';
include '../model/Navigation.class.php';
include '../model/Category.class.php';

include '../view/headerView.php';
include '../view/WebshopView.php';
include '../view/footerView.php';

$categories = Category::getCategories();

if(strlen($_GET['search']) == 0){
    header("location: WebshopController.php");
}
else {
    $foundProducts = Product::searchProducts($_GET['search']);

    loadHeader();
    loadProducts($foundProducts, $categories);
    loadFooter();
}

