<?php
/**
 * Created by PhpStorm.
 * User: dionthiers
 * Date: 25/03/15
 * Time: 17:14
 */
include '../model/Database.class.php';
include '../model/Product.class.php';
include '../view/ProductView.php';

include '../view/headerView.php';
include '../model/Navigation.class.php';
include '../model/Category.class.php';
include '../view/footerView.php';

// get everything from the model
$id = $_GET['id']; // get id from the $_GET. ['id'] because the a href link = ProductController?id=x
$product = Product::getProduct($id); // Die ID moet hier meekomen vanaf de webshop, geen idee hoe?
$categories = Category::getCategories();

// load views and if needed, give the models
loadHeader();
showProductDetails($categories, $product); // hier geef je $product mee, nu voor testen even niet.
loadFooter();
