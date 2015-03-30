<?php
/**
 * Created by PhpStorm.
 * User: dionthiers
 * Date: 11/03/15
 * Time: 16:19
 */

include '../model/Database.class.php';
include '../model/Product.class.php';
include '../view/WebshopView.php';
include '../view/HeaderView.php';
include '../model/Navigation.class.php';
include '../model/Category.class.php';
include '../view/FooterView.php';

session_start();

$allProducts = Product::getAllProductsDescending();
$categories = Category::getCategories();

loadHeader();
loadProducts($allProducts, $categories);
loadFooter();